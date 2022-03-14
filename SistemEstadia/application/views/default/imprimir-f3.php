<?php
$evaluacion_tx= array("NA","NC","CO","CD","CA");
?>

<html>
	<head>
		<title>Estadías UTC: F3</title>
		<link rel="shortcut icon" href="https://www.utcalvillo.edu.mx/Icono.ico">
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
							<td align="center" valign="middle" style="font-size: 12px;font-weight: bold;">EVALUACIÓN MENSUAL DEL ALUMNO EN ESTADÍA</td>
						</tr>
					</table>
				</td>
				<td>
					<table class="BordeTotal" border="0" width="100%" cellspacing="0px" cellpadding="5px" style="font-size: 10px;">
						<tr>
							<td align="left" valign="middle" style="" class="BordeInferior"><label>REVISIÓN:03</label></td>
						</tr>
						<tr>
							<td align="left" valign="middle" style="" class="BordeInferior"><label>CÓDIGO: P-ESTA-F3</label></td>
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
		<br>
		<table  cellspacing="0px" cellpadding="0px" width="900px" style="" >
			<tr>
				<td style="text-align: center;">
					<p style="font-size: 10px;text-align: center;"><b>NA</b> = No Aplica, <b>NC</b> = No Competente, <b>CO</b> = Competente, <b>CD</b> = Competente Destacado, <b>CA</b> = Competente Autónomo</p>
				</td>
			</tr>
		</table>
		<table  cellspacing="0px" cellpadding="3px" width="900px" style="" border=1>
			<tr>
				<td width="50%" style="text-align: center;background-color: rgb(100,100,100);color: #FFFFFF;">Criterio</td>
				<td style="text-align: center;background-color: rgb(100,100,100);color: #FFFFFF;">Evaluación <br>Asesor Académico</td>
				<td style="text-align: center;background-color: rgb(100,100,100);color: #FFFFFF;">Evaluación <br>Asesor Empresarial</td>
			</tr>
			<tr>
				<td colspan="100%" style="background-color: rgb(180,180,180);color: #FFFFFF;">Conocimientos y Habilidades</td>
			</tr>
			<tr>
				<td style="font-size: 12px;">1.Conocimientos Técnicos</td>
				<td style="font-size: 12px;text-align: center; "><?php echo $evaluacion_tx[$criterios_aa->criterio1]; ?></td>
				<td style="font-size: 12px;text-align: center; "><?php if (isset($criterios_ae)) {echo $evaluacion_tx[$criterios_ae->criterio1];} ?></td>
			</tr>
			<tr>
				<td style="font-size: 12px;">2.Desenvolvimiento Laboral</td>
				<td style="font-size: 12px;text-align: center; "><?php echo $evaluacion_tx[$criterios_aa->criterio2]; ?></td>
				<td style="font-size: 12px;text-align: center; "><?php if (isset($criterios_ae)) {echo $evaluacion_tx[$criterios_ae->criterio2];} ?></td>
			</tr>
			<tr>
				<td style="font-size: 12px;">3.Trabajo en Equipo</td>
				<td style="font-size: 12px;text-align: center; "><?php echo $evaluacion_tx[$criterios_aa->criterio3]; ?></td>
				<td style="font-size: 12px;text-align: center; "><?php if (isset($criterios_ae)) {echo $evaluacion_tx[$criterios_ae->criterio3];} ?></td>
			</tr>
			<tr>
				<td style="font-size: 12px;">4.Avance de Proyecto</td>
				<td style="font-size: 12px;text-align: center; "><?php echo $evaluacion_tx[$criterios_aa->criterio4]; ?></td>
				<td style="font-size: 12px;text-align: center; "><?php if (isset($criterios_ae)) {echo $evaluacion_tx[$criterios_ae->criterio4];} ?></td>
			</tr>
			<tr>
				<td colspan="100%" style=" background-color: rgb(180,180,180);color: #FFFFFF;">Actitudes y Valores</td>
			</tr>
			<tr>
				<td style="font-size: 12px;">5.Presentación Personal</td>
				<td style="font-size: 12px;text-align: center; "><?php echo $evaluacion_tx[$criterios_aa->criterio5]; ?></td>
				<td style="font-size: 12px;text-align: center; "><?php if (isset($criterios_ae)) {echo $evaluacion_tx[$criterios_ae->criterio5];} ?></td>
			</tr>
			<tr>
				<td style="font-size: 12px;">6.Asistencia y Puntualidad</td>
				<td style="font-size: 12px;text-align: center; "><?php echo $evaluacion_tx[$criterios_aa->criterio6]; ?></td>
				<td style="font-size: 12px;text-align: center; "><?php if (isset($criterios_ae)) {echo $evaluacion_tx[$criterios_ae->criterio6];} ?></td>
			</tr>
			<tr>
				<td style="font-size: 12px;">7.Respeto</td>
				<td style="font-size: 12px;text-align: center; "><?php echo $evaluacion_tx[$criterios_aa->criterio7]; ?></td>
				<td style="font-size: 12px;text-align: center; "><?php if (isset($criterios_ae)) {echo $evaluacion_tx[$criterios_ae->criterio7];} ?></td>
			</tr>
			<tr>
				<td style="font-size: 12px; ">8.Disposición</td>
				<td style="font-size: 12px;text-align: center; "><?php echo $evaluacion_tx[$criterios_aa->criterio8]; ?></td>
				<td style="font-size: 12px;text-align: center; "><?php if (isset($criterios_ae)) {echo $evaluacion_tx[$criterios_ae->criterio8];} ?></td>
			</tr>
			<tr>
				<td style="font-size: 12px;">9.Iniciativa</td>
				<td style="font-size: 12px;text-align: center; "><?php echo $evaluacion_tx[$criterios_aa->criterio9]; ?></td>
				<td style="font-size: 12px;text-align: center; "><?php if (isset($criterios_ae)) {echo $evaluacion_tx[$criterios_ae->criterio9];} ?></td>
			</tr>
			<tr>
				<td style="font-size: 12px;">10.Responsabilidad</td>
				<td style="font-size: 12px;text-align: center; "><?php echo $evaluacion_tx[$criterios_aa->criterio10]; ?></td>
				<td style="font-size: 12px;text-align: center; "><?php if (isset($criterios_ae)) {echo $evaluacion_tx[$criterios_ae->criterio10];} ?></td>
			</tr>
			<tr>
				<td style="font-size: 12px;">11.Orden y Disciplina</td>
				<td style="font-size: 12px;text-align: center; "><?php echo $evaluacion_tx[$criterios_aa->criterio11]; ?></td>
				<td style="font-size: 12px;text-align: center; "><?php if (isset($criterios_ae)) {echo $evaluacion_tx[$criterios_ae->criterio11];} ?></td>
			</tr>
			<tr>
				<td colspan="3" style="height: 15px;"></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center; background-color: rgb(180,180,180);color: #FFFFFF;">Asesor Académico</td>
			</tr>
			<tr>
				<td colspan="1" style="text-align: center; background-color: rgb(180,180,180);color: #FFFFFF;">Fortalezas</td>
				<td colspan="2" style="text-align: center; background-color: rgb(180,180,180);color: #FFFFFF;">Áreas de Mejora</td>
			</tr>
			<tr>
				<td colspan="1" style="font-size: 12px; padding: 5px;"><?php if($criterios_aa->nc_fortalezas!=""){ echo ucfirst($criterios_aa->nc_fortalezas); }else{echo "(SIN REGISTRO)";}?></td>
				<td colspan="2" style="font-size: 12px; padding: 5px;"><?php if($criterios_aa->nc_mejoras!=""){ echo ucfirst($criterios_aa->nc_mejoras);} else{echo "(SIN REGISTRO)";}?></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center; background-color: rgb(180,180,180);color: #FFFFFF;">Asesor Empresarial</td>
			</tr>
			<tr>
				<td colspan="1" style="text-align: center; background-color: rgb(180,180,180);color: #FFFFFF;">Fortalezas</td>
				<td colspan="2" style="text-align: center; background-color: rgb(180,180,180);color: #FFFFFF;">Áreas de Mejora</td>
			</tr>
			<tr>
				<td colspan="1" style="font-size: 12px;padding: 5px;"><?php if (isset($criterios_ae)) {if($criterios_ae->nc_ae_fortalezas!=""){ echo ucfirst($criterios_ae->nc_ae_fortalezas); }else{echo "(SIN REGISTRO)";}}?></td>
				<td colspan="2" style="font-size: 12px;padding: 5px;"><?php if (isset($criterios_ae)) {if($criterios_ae->nc_ae_mejoras!=""){ echo ucfirst($criterios_ae->nc_ae_mejoras);} else{echo "(SIN REGISTRO)";}}?></td>
			</tr>
			
		</table>
		<h5><?php if (!isset($criterios_ae)) {echo "* No hay evaluación de Asesor Empresarial.";} ?></h5>
		</div>	
	</body>
</html>


					
