<?php

date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
setlocale(LC_TIME, 'spanish');
?>

<html>
	<head>
		<title>Estadías UTC: F1</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="https://sistemas.utcalvillo.edu.mx/img/Icono.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		
		<style>
			body{
				font-family: "Trebuchet MS",Tahoma;
			}
			.BordeTotal {
				border: 1px solid #000000;
			}
			.BordeInferior {
				border-bottom: 1px solid #000000;
			}
		</style>
		
		<script>
			function firmar_f1(idestadia,area)
			{
				if(confirm("¿Quiéres continuar con la firma?"))
				{
					$('#btn_'+idestadia).attr("disabled", true);
					
					fetch('/estadia/estadias/firmar_f1/'+idestadia+'/'+area)
					.then(function(res){
						return res.json();
					})
					.then(function(datos){
						if(datos==true)
						{
							alert('MENSAJE:\nLa Estadía ha sido firmada correctamente.');
							if(!window.close())
							{
								window.location.reload(true);
							}
						}
						else
						{
							alert("ERROR:\nError de Ejecución de Acción, ¡reportar al administrador del Sistema!");
						}
					});
				}
				else 
				{
					$('#btn_'+idestadia).attr("disabled", true);
				}
			}
			
			
			
			function reenviar_correo_ae_f1(idestadia)
			{
				$('#btn_'+idestadia+'_ae').attr("disabled", false);
				$('#btn_'+idestadia+'_ae').attr("value", "Enviando...");
				
				fetch('/estadia/estadias/reenviar_correo_ae_f1/'+idestadia,{
					method:'POST',
					body:null
				})
				.then(function(res){
					return res.json();
				})
				.then(function(datos){
					if(datos.indexOf("***OK***")>=0)
					{
						alert("MENSAJE:\nCorreo se envió correctamente.");
						window.close();
					}
					else
					{
						alert("Error:\n"+datos);
						
					}
					$('#btn_'+idestadia+'_ae').attr("disabled", true);
				});
				
			}
		</script>
	</head>
	<body>
		<div align="center">
			<table  cellspacing="0px" cellpadding="0px" width="900px" style="">
				<tr>
					<td class="BordeTotal" align="center" valign="middle">
						<img src="/img/logo-legacy-100px.png" width="100px" title="logo-utc">
					</td>
					<td  class="BordeTotal">
						<table border="0" width="100%" cellspacing="0px" cellpadding="5px">
							<tr>
								<td align="center" valign="top" class="BordeInferior" style="font-size: 18px;font-weight: bold;">UNIVERSIDAD TECNOLÓGICA DE CALVILLO</td>
							</tr>
							<tr>
								<td align="center" valign="middle" style="font-size: 12px;font-weight: bold;">ACTA DE PROYECTO Y AUTORIZACIÓN DE ESTADÍA</td>
							</tr>
						</table>
					</td>
					<td>
						<table class="BordeTotal" border="0" width="100%" cellspacing="0px" cellpadding="5px" style="font-size: 10px;">
							<tr>
								<td align="left" valign="middle" style="" class="BordeInferior"><label>REVISIÓN:03</label></td>
							</tr>
							<tr>
								<td align="left" valign="middle" style="" class="BordeInferior"><label>CÓDIGO: P-ESTA-F1</label></td>
							</tr>
							<tr>
								<td align="left" valign="middle" style="" class="BordeInferior"><label>REF. NORMATIVA: 8.5</label></td>
							</tr>
							<tr>
								<td align="left" valign="middle" style="" ><label>HOJA 1 DE 1</label></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br><br>
			<table cellspacing="0px" cellpadding="3px" width="900px" style="font-size: 10px;" border="1" >
				<tr>
					<td colspan="100%" style="text-align: center; background-color: rgb(20,129,171);color: #FFFFFF;">DATOS PERSONALES DEL ALUMNO</td>
				</tr>
				<tr>
					<td>Nombre Completo:</td>
					<td colspan="3"><?php echo $alumno->nombre; ?></td>
				</tr>
				<!--<tr>
					<td>Domicilio:</td>
					<td colspan="3">**Agregar a Base de Datos**</td>
				</tr>-->
				<tr>
					<td>Teléfono:</td>
					<td><?php echo $alumno->telefono; ?></td>
					<td>Correo electrónico:</td>
					<td><?php echo $alumno->correo; ?></td>
				</tr>
			</table>
			<br>
			<table cellspacing="0px" cellpadding="3px" width="900px" style="font-size: 10px;" border="1" >
				<tr>
					<td colspan="100%" style="text-align: center; background-color: rgb(20,129,171);color: #FFFFFF;">DATOS ACADÉMICOS DEL ALUMNO</td>
				</tr>
				<tr>
					<td width="150px">Programa Educativo:</td>
					<td colspan="3"><?php echo $alumno->carrera;  ?></td>
				</tr>
				<tr>
					<td colspan="100%" style="padding: 0px;">
						<table width="100%" style="font-size: 10px;" border="0" cellspacing="0" cellpadding="3px"> 
							<tr>
								<td width="100px">Cuatrimestre: </td>
								<td><?php echo $proyecto->nombre_periodo." ".$proyecto->anio; ?></td>
								<td width="100px">Matrícula:</td>
								<td><?php echo $alumno->matricula; ?></td>
								<td width="100px">IMSS:</td>
								<td><?php echo $alumno->imss; ?></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="100%" style="padding: 0px;">
						<table width="100%" style="font-size: 10px;" border="0" cellspacing="0" >
							<tr>
								<td width="150px" style="padding: 3px;border-right: 1px solid #000;">Asesor Académico: </td>
								<td width="50px" align="center"><?php echo $proyecto->aa_nivelaca; ?><div style="border-top: dotted 1px #000000;" >Título</div></td>
								<td align="center"><?php echo $proyecto->aa_nombre; ?><div style="border-top: dotted 1px #000000;">Nombre y apellidos</div></td>
								<td width="100px" align="center"><?php echo $proyecto->aa_telefono; ?><div style="border-top: dotted 1px #000000;">Teléfono</div></td>
								<td width="250px" align="center"><?php echo $proyecto->aa_email; ?><div style="border-top: dotted 1px #000000;">Correo electrónico</div></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="100%" style="padding: 0px;">
						<table width="100%" style="font-size: 10px;" border="0" cellspacing="0">
							<tr>
								<td width="150px" style="padding: 3px;border-right: 1px solid #000;">Jefe de P.E.:</td>
								<td width="50px" align="center"><?php echo $proyecto->niveledu_ptc; ?><div style="border-top: dotted 1px #000000;" >Título</div></td>
								<td align="center"><?php echo $proyecto->nombre_ptc; ?><div style="border-top: dotted 1px #000000;">Nombre y apellidos</div></td>
								<td width="100px" align="center"><?php echo $proyecto->telefono_ptc; ?><div style="border-top: dotted 1px #000000;">Teléfono</div></td>
								<td width="250px" align="center"><?php echo $proyecto->email_ptc; ?><div style="border-top: dotted 1px #000000;">Correo electrónico</div></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="100%" style="padding: 0px;">
						<table width="100%" style="font-size: 10px;" border="0" cellspacing="0">
							<tr>
								<td width="150px" style="padding: 3px;border-right: 1px solid #000;">Jefe de Vinculación:</td>
								<td width="50px" align="center"><?php echo $jefavin->NivelEdu; ?><div style="border-top: dotted 1px #000000;" >Título</div></td>
								<td align="center"><?php echo $jefavin->Nombre; ?><div style="border-top: dotted 1px #000000;">Nombre y apellidos</div></td>
								<td width="100px" align="center"><?php echo $jefavin->telefono; ?><div style="border-top: dotted 1px #000000;">Teléfono</div></td>
								<td width="250px" align="center"><?php echo $jefavin->email; ?><div style="border-top: dotted 1px #000000;">Correo electrónico</div></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br>
			<table cellspacing="0px" cellpadding="3px" width="900px" style="font-size: 10px;" border="1" >
				<tr>
					<td colspan="100%" style="text-align: center; background-color: rgb(20,129,171);color: #FFFFFF;">DATOS DE LA EMPRESA DONDE REALIZA LA ESTADÍA</td>
				</tr>
				<tr>
					<td width="150px">Nombre o Razón Social:</td>
					<td colspan="3"><?php echo $empresa->nombre;  ?></td>
				</tr>
				<tr>
					<td colspan="100%" style="padding: 0px;">
						<table width="100%" style="font-size: 10px;" border="0" cellspacing="0" cellpadding="3px"> 
							<tr>
								<td width="">Giro de la empresa: </td>
								<td><?php echo $empresa->giro; ?></td>
								<td width="500px"></td>
								<td width="">Núm. Aprox. de trabajadores:</td>
								<td><?php echo $empresa->trabajadores; ?></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td >
						Domicilio:
					</td>
					<td style="padding: 0px;">
						<table width="100%" style="font-size: 10px;" border="0" cellspacing="0">
							<tr>
								<td width="" align="center"><?php echo $empresa->dir; ?><div style="border-top: dotted 1px #000000;" >Calle y Número</div></td>
								<td align="center"><?php echo strtoupper($empresa->col); ?><div style="border-top: dotted 1px #000000;">Colonia</div></td>
								<td width="100px" align="center"><?php echo $empresa->cp; ?><div style="border-top: dotted 1px #000000;">C.P.</div></td>
							</tr>
						</table>
						<table width="100%" style="font-size: 10px;" border="0" cellspacing="0">
							<tr>
								<td width="" align="center"><?php echo strtoupper($empresa->mun); ?><div style="border-top: dotted 1px #000000;" >Ciudad o localidad</div></td>
								<td align="center"><?php echo strtoupper($empresa->mun); ?><div style="border-top: dotted 1px #000000;">Municipio</div></td>
								<td width="" align="center"><?php echo strtoupper($empresa->edo); ?><div style="border-top: dotted 1px #000000;">Estado</div></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td >
						Contacto:
					</td>
					<td style="padding: 0px;">
						<table width="100%" style="font-size: 10px;" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<table width="100%" style="font-size: 10px;" border="0" cellspacing="0">
										<tr>
											<td width="50px" align="center"><?php echo "&nbsp; "; ?><div style="border-top: dotted 1px #000000;" >Título</div></td>
											<td align="center"><?php echo $empresa->nombre_contacto ?><div style="border-top: dotted 1px #000000;">Nombre y apellidos</div></td>
											<td width="" align="center"><?php echo $empresa->puesto_contacto; ?><div style="border-top: dotted 1px #000000;">Puesto</div></td>
										</tr>
									</table>
								</td>
								
							</tr>
							<tr>
								<td>
									<table width="100%" style="font-size: 10px;" border="0" cellspacing="0">
										<tr>
											<td align="center"><?php echo $empresa->tel_contacto; ?><div style="border-top: dotted 1px #000000;" >Teléfono</div></td>
											<td align="center"><?php echo $empresa->email_contacto; ?><div style="border-top: dotted 1px #000000;">Correo Electrónico</div></td>
										</tr>
									</table>
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td >
						Asesor Empresarial:
					</td>
					<td style="padding: 0px;">
						<table width="100%" style="font-size: 10px;" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<table width="100%" style="font-size: 10px;" border="0" cellspacing="0">
										<tr>
											<td width="50px" align="center"><?php echo "&nbsp; "; ?><div style="border-top: dotted 1px #000000;" >Título</div></td>
											<td align="center"><?php echo $proyecto->nombre_ae ?><div style="border-top: dotted 1px #000000;">Nombre y apellidos</div></td>
											<td width="" align="center"><?php  ?>S/R<div style="border-top: dotted 1px #000000;">Puesto</div></td>
										</tr>
									</table>
								</td>
								
							</tr>
							<tr>
								<td>
									<table width="100%" style="font-size: 10px;" border="0" cellspacing="0">
										<tr>
											<td align="center"><?php echo $proyecto->telefono_ae; ?><div style="border-top: dotted 1px #000000;" >Teléfono</div></td>
											<td align="center"><?php echo $proyecto->email_ae; ?><div style="border-top: dotted 1px #000000;">Correo Electrónico</div></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br>
			<table cellspacing="0px" cellpadding="3px" width="900px" style="font-size: 10px;" border="1" >
				<tr>
					<td colspan="100%" style="text-align: center; background-color: rgb(20,129,171);color: #FFFFFF;">DATOS DEL PROYECTO</td>
				</tr>
				<tr>
					<td width="150px">Nombre del proyecto:</td>
					<td colspan="3"><?php echo $proyecto->nombre; ?></td>
				</tr>
				<tr>
					<td>Descripción general:</td>
					<td colspan="3"><?php echo $proyecto->descripcion; ?></td>
				</tr>
				<tr>
					<td>Objetivo(s):</td>
					<td colspan="3"><?php echo $proyecto->objetivos; ?></td>
				</tr>
				<tr>
					<td>Fecha de inicio:</td>
					<td><?php 
					$datefi = new DateTime($proyecto->fi);
					echo $datefi->format("d-m-Y"); ?>
					</td>
					<td>Fecha de término:</td>
					<td><?php 
					$dateff = new DateTime($proyecto->ff);
					echo $dateff->format("d-m-Y"); ?>
					</td>
				</tr>
				<tr>
					<td>Principales responsabilidaddes que asigna la empresa al alumno:</td>
					<td colspan="3"><?php echo $proyecto->responsabilidades; ?></td>
				</tr>
				<tr>
					<td>Autoridad que delega la empresa al alumno:</td>
					<td colspan="3"><?php echo $proyecto->autoridades; ?></td>
				</tr>
				<tr>
					<td>Otras personas a quienes se les solicita su colaboración:</td>
					<td colspan="3" style="padding: 0px;">
						<table width="100%" style="font-size: 10px;" border="0" cellspacing="0">
							<tr >
								<td align="center" style="border-bottom: solid 1px #000;">Nombre</td><td align="center" style="border-bottom: solid 1px #000;">Departamento</td><td align="center" style="border-bottom: solid 1px #000;">Tipo de colaboración</td>
							</tr>
							<?php 
							if ($proyecto->colaboracion1n!="") {
								?>
								<tr>
									<td align="center"><?php echo $proyecto->colaboracion1n; ?></td><td align="center"><?php echo $proyecto->colaboracion1d; ?></td><td align="center"><?php echo $proyecto->colaboracion1t; ?></td>
								</tr>
								<?php 
								if ($proyecto->colaboracion2n!="") {
									?>
									<tr>
										<td align="center"><?php echo $proyecto->colaboracion2n; ?></td><td align="center"><?php echo $proyecto->colaboracion2d; ?></td><td align="center"><?php echo $proyecto->colaboracion2t; ?></td>
									</tr>
									<?php 
								}
								
								if ($proyecto->colaboracion3n!="") {
									?>
									<tr>
										<td align="center"><?php echo $proyecto->colaboracion3n; ?></td><td align="center"><?php echo $proyecto->colaboracion3d; ?></td><td align="center"><?php echo $proyecto->colaboracion3t; ?></td>
									</tr>
									<?php 
								}
								
								if ($proyecto->colaboracion4n!="") {
									?>
									<tr>
										<td align="center"><?php echo $proyecto->colaboracion4n; ?></td><td align="center"><?php echo $proyecto->colaboracion4d; ?></td><td align="center"><?php echo $proyecto->colaboracion4t; ?></td>
									</tr>
									<?php 
								}
								
								if ($proyecto->colaboracion5n!="") {
									?>
									<tr>
										<td align="center"><?php echo $proyecto->colaboracion5n; ?></td><td align="center"><?php echo $proyecto->colaboracion5d; ?></td><td align="center"><?php echo $proyecto->colaboracion5t; ?></td>
									</tr>
									
									<?php
								}
								
							}else{
								?>
								<tr>
									<td align="center" colspan="100%">NINGUNO</td>
								</tr>
								<?php 
							}
							?>
							
						</table>
						
					</td>
				</tr>
			</table>
			<br>
			<table cellspacing="0px" cellpadding="3px" width="900px" style="font-size: 10px;" border="1" >
				<tr>
					<td colspan="100%" style="text-align: center; background-color: rgb(20,129,171);color: #FFFFFF;">FIRMAS DE AUTORIZACIÓN DE ESTADÍA</td>
				</tr>
				<tr>
					<td align="center" style="height: 50px;">
						<?php
						if ($proyecto->firma_ae=="NO" ) {
							if ($para_firma_ae=="SI") {
								?> <a href="javascript: firmar_f1('<?php echo $proyecto->id; ?>','ae');" id="btn_<?php echo $proyecto->id;?>_ae" class="btn btn-sm btn-success p-1" style="" title="" >Firmar</a><?php
							}else{
								?> <small>***SIN FIRMA***</small><br><?php
								
								if ((($_SESSION["utc_id"]==$proyecto->aa_id)||($_SESSION["utc_es"]==4))&& $alumno->estatus=="ACTIVO") {
								?> <a href="javascript: reenviar_correo_ae_f1('<?php echo $proyecto->id; ?>');" id="btn_<?php echo $proyecto->id;?>_ae" class="btn btn-sm btn-success" style="" title="" >Enviar Liga</a><?php				
								}
							}
						}else{
						?>
						<div><b><?php echo $proyecto->nombre_ae; ?></b> </div>
						<div><b><?php echo strftime("%A %d/%B/%Y", strtotime($proyecto->fh_firma_ae))." ".substr($proyecto->fh_firma_ae, 10); ?></b> </div>
						<small>(SISTEMA)</small>
						<?php	
						}
						?>
					</td>
					<td align="center">
						<?php
						if ($proyecto->firma_aa=="NO") {
							if (isset($_SESSION["utc_id"]))
							{
								if ((($_SESSION["utc_id"]==$proyecto->aa_id)||($_SESSION["utc_es"]==4)) && $alumno->estatus=="ACTIVO") {
								
									?> <a href="javascript: firmar_f1('<?php echo $proyecto->id; ?>','aa');" id="btn_<?php echo $proyecto->id;?>_aa" class="btn btn-sm btn-success p-1" style="" title="" >Firmar</a><?php									
								}else{
									?> <small>***SIN FIRMA***</small><?php
								}
							}else{
								?> <small>***SIN FIRMA***</small><?php
							}
						}else{
							?>
							<div><b><?php echo $proyecto->firma_aa_nombre; ?></b> </div>
							<div><b><?php echo strftime("%A %d/%B/%Y", strtotime($proyecto->fh_firma_aa))." ".substr($proyecto->fh_firma_aa, 10); ?></b> </div>
							<small>(EN SISTEMA)</small>
							<?php	
						}
						?>
					</td>				
					<td align="center">
						<?php
						if ($proyecto->firma_ptc=="NO") {
							if (isset($_SESSION["utc_id"]))
							{
								if ((($_SESSION["utc_id"]==$proyecto->id_ptc)||($_SESSION["utc_es"]==4))&& $alumno->estatus=="ACTIVO") {
								
									?> <a href="javascript: firmar_f1('<?php echo $proyecto->id; ?>','ptc');" id="btn_<?php echo $proyecto->id;?>_ptc" class="btn btn-sm btn-success p-1" style="" title="" >Firmar</a><?php									
								}else{
									?> <small>***SIN FIRMA***</small><?php
								}
							}else{
								?> <small>***SIN FIRMA***</small><?php
							}
						}else{
							?>
							<div><b><?php echo $proyecto->firma_ptc_nombre; ?></b> </div>
							<div><b><?php echo strftime("%A %d/%B/%Y", strtotime($proyecto->fh_firma_ptc))." ".substr($proyecto->fh_firma_ptc, 10);; ?></b> </div>
							<small>(EN SISTEMA)</small>
							<?php	
						}
						?>
					</td>				
					<td align="center">
						<?php
						if ($proyecto->firma_vin=="NO") {
							if (isset($_SESSION["utc_id"]))
							{
								if ((($_SESSION["utc_departamento_id"]==4)||($_SESSION["utc_es"]==4))&& $alumno->estatus=="ACTIVO") {
								
									?> <a href="javascript: firmar_f1('<?php echo $proyecto->id; ?>','vin');" id="btn_<?php echo $proyecto->id;?>_vin" class="btn btn-sm btn-success p-1" style="" title="" >Firmar</a><?php									
								}else{
									?> <small>***SIN FIRMA***</small><?php
								}
							}else{
								?> <small>***SIN FIRMA***</small><?php
							}
						}else{
							?>
							<div><b><?php echo $proyecto->firma_vin_nombre; ?></b> </div>
							<div><b><?php echo strftime("%A %d/%B/%Y", strtotime($proyecto->fh_firma_vin))." ".substr($proyecto->fh_firma_vin, 10); ?></b> </div>
							<small>(EN SISTEMA)</small>
							<?php	
						}
						?>
					</td>				
					<td align="center">
						<?php
						if ($proyecto->firma_cajas=="NO") {
							if (isset($_SESSION["utc_id"]))
							{
								//Depto de Cajas=19
								if ((($_SESSION["utc_departamento_id"]==19)||($_SESSION["utc_es"]==4)||($_SESSION["utc_usuario"]=="MAYRA.LOPEZ"))&& $alumno->estatus=="ACTIVO") {
								
									?> <a href="javascript: firmar_f1('<?php echo $proyecto->id; ?>','cajas');" id="btn_<?php echo $proyecto->id;?>_cajas" class="btn btn-sm btn-success p-1" style="" title="" >Firmar</a><?php									
								}else{
									?> <small>***SIN FIRMA***</small><?php
								}
							}else{
								?> <small>***SIN FIRMA***</small><?php
							}
						}else{
							?>
							<div><b><?php echo $proyecto->firma_cajas_nombre; ?></b> </div>
							<div><b><?php echo strftime("%A %d/%B/%Y", strtotime($proyecto->fh_firma_cajas))." ".substr($proyecto->fh_firma_cajas, 10); ?></b> </div>
							<small>(EN SISTEMA)</small>
							<?php	
						}
						
						?>
					</td>				
				</tr>
				<tr>
					<td align="center">Asesor Empresarial</td>
					<td align="center">Asesor Académico</td>				
					<td align="center">PTC de Programa Educativo</td>				
					<td align="center">Jefe de Vinculación</td>				
					<td align="center">Inscripción (Sello de Caja)</td>				
				</tr>
			</table>
			<br>
			<table cellspacing="0px" cellpadding="3px" width="900px" style="font-size: 10px;" border="0" >
				<tr>
					<td style="color: gray;"><b>NOTA IMPORTANTE: </b>El proyecto lo debe proponer y planear el alumno para dar solución a una problemática o necesidad específica
						de la empresa, con el apoyo y supervisión de sus asesores empresarial y académico. Este formato debe contener todas las firmas y el sello de caja para que 
						quede formalmente autorizada la estadía.
					</td>
				</tr>
			</table>
			
		</div>	
		
		
		<script src="<?php echo site_url(); ?>js/jquery-3.5.1.min.js"></script>
		<script src="<?php echo site_url(); ?>js/estadias.js"></script>
	</body>
</html>


					
