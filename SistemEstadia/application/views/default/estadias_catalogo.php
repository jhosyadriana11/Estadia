
<?php
$objeto="estadia";

?>
<div class="container-fluid mt-1">
	<div class="row">
		<div class="col">
			<div class="alert alert-info" >
			  <h5><?php echo strtoupper($objeto."S"); ?></h5>
			  
			</div>
		</div>
	</div>
	<div class="row pb-5">
		<div class="col ">
			<div class="table-responsive p-1"  style="border: 1px solid gray; border-radius: 5px;">
			<table id="estadias" class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px" data-page-length="25">
				<thead style="" class="bg-light" >
					<tr class="" style="" >
						<th align="left" style="font-size: 12px;"></th>
						<th align="left" style="font-size: 12px;">Empresa</th>
						<th align="left" style="font-size: 12px;">Proyecto</th>
						<th align="left" style="font-size: 12px;">Periodo Requerido</th>
						<th align="left" style="font-size: 12px;">Asesor Académico</th>
						<th align="left" style="font-size: 12px;">Carrera</th>
						<th align="left" style="font-size: 12px;">Alumno Asignado</th>
						<th align="left" style="font-size: 12px;">Observación General</th>	
						<th align="left" style="font-size: 12px;">Estatus</th>
						<th align="left" style="font-size: 12px;">Motivo Cancelación</th>							
						<th align="left" style="font-size: 12px;" title="Encuestada">Enc.</th>	
					</tr>
				</thead>
				
				<tbody  style="">
				<?php
				foreach($table->result() as $row):	
					
					$encuestas = $this->m_proyectos->obtener_encuestas($row->id);
					$filas_encuestas=$encuestas->num_rows();
					
					$encuestada="SI";
					if($filas_encuestas<1){
						$encuestada="NO";
					}
								
					?>
					<tr class="<?php if ($row->estatus==4) { echo 'table-danger';	} if (($row->estatus==3)||($encuestada=="SI")) { echo 'table-success';	} if ($row->estatus==2) { echo 'table-info';	} ?>">
						<td valign='middle' align='left' style="width: 80px;">
							<?php
							
							//Deptos
							//27 EXTENSIÓN UNIVERSITARIA
							//14 ACTIVIDADES CULTURALES Y DEPORTIVAS
							//9 SOPORTE TÉCNICO
							//11 ACADÉMICO
							//41 ACADÉMICO TDPA
							
							//Jefes
							//utc_jefe_id 71 //Subdirección Académica
							
							//if ((($_SESSION["utc_departamento_id"]==27) || ($_SESSION["utc_departamento_id"]==14) || ($_SESSION["utc_departamento_id"]==9)) && ($row->estatus==1)) {
								if (($_SESSION["utc_id"]==$row->aa_id)||($_SESSION["utc_es"]==4)) {
									
									$semana_activa=$this->m_seguimientos->obtener_semana_activa()->row();
									if ($semana_activa->semana<=6) {
										?> <a href="estadias/modalActualizar/<?php echo $row->id; ?>" class="btn btn-sm p-0" style="" name="modal_btn" title="Actualizar Estadía" ><span class=""><i class="fas fa-edit"></i></span></a><?php
									}
									
									?> <a href="<?php echo site_url();?>seguimientos/index/<?php echo $row->id; ?>" class="btn btn-sm p-0" style="" title="Seguimientos" ><span style="font-size:16px;"><i class="fas fa-clipboard-list"></i></a><?php
									
									
									?> <a href="<?php echo site_url();?>evaluaciones/index/<?php echo $row->id; ?>" class="btn btn-sm p-0" style="" title="Evaluaciones" ><span style="font-size:16px;"><i class="fas fa-check-double"></i><?php
								}
								
								//4-depto Jefatura de Vinculación
									
									if (($row->firma_vin=="NO")||($row->firma_ae=="NO")||($row->firma_aa=="NO")||($row->firma_cajas=="NO")||($row->firma_ptc=="NO")) {
										$txt="Firmas Faltantes:&#010;";
										if (($row->firma_vin=="NO")&&(($_SESSION["utc_departamento_id"]==4)||($_SESSION["utc_es"]==4))) {
											$txt=$txt."-Vinculación&#010;";
										}	
										if ($row->firma_ae=="NO") {
											$txt=$txt."-Asesor Empresarial&#010;";
										}
										if ($row->firma_aa=="NO") {
											$txt=$txt."-Asesor Académico&#010;";
										}
										if ($row->firma_cajas=="NO") {
											$txt=$txt."-Cajas&#010;";
										}
										if ($row->firma_ptc=="NO") {
											$txt=$txt."-PTC&#010;";
										}
										?> <a href="javascript: imprimir_f1(<?php echo $row->id; ?>)" class="btn btn-sm btn-warning p-0 pl-1 pr-1  border border-2" style="font-size: 12px;font-weight: bold;" name="" title="<?php echo $txt; ?>" >F1</a><?php							
									}else{
										?> <a href="javascript: imprimir_f1(<?php echo $row->id; ?>)" class="btn btn-sm btn-success p-0 pl-1 pr-1  border border-2" style="font-size: 12px;font-weight: bold;" name="" title="Imprimir F1" >F1</a><?php																	
									}
									
								
								
								
								if (($_SESSION["utc_es"]==4) && ($row->estatus<=2)) {
									?> <a href="estadias/modalCancelar/<?php echo $objeto; ?>/<?php echo $row->id; ?>" class="btn btn-sm p-0" style="" name="modal_btn" title="Cancelar Estadía" ><span class=""><i class="fas fa-minus-circle"></i></span></a><?php
								}
								
								
								
								$seguimientos_firmados=$this->m_seguimientos->obtener_seguimientos_firmados($row->id)->num_rows();
								if (($_SESSION["utc_es"]==4) && ($row->estatus<=2) && ($encuestada=="NO") && ($seguimientos_firmados>=15)) {
									
									$fecha_registro=str_replace(array("-", " ", ":"),"",$row->fechahora_reg);								
									$idcompuesto=substr($fecha_registro,8).str_pad($row->id,3,"0",STR_PAD_LEFT).substr($fecha_registro,9,2);
																	
									?> <a id="btn_rce_<?php echo $idcompuesto; ?>" href="javascript: reenviar_correo_encuesta('<?php echo $idcompuesto; ?>')" class="btn btn-sm p-0" style="" title="Reenviar Liga de Encuesta al Correo" ><span class=""><i class="fas fa-paper-plane"></i></span></a><?php
								}
							
							?>
						</td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->nombre_empresa;  ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->nombre;  ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->nombre_periodo." ".$row->anio; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->aa_nombre; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->short_title; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->matricula."<br>".$row->alumno_nombre; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->observacion_gral; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->nombre_estatus; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->motivo_can; ?></td>
						<td valign='middle' align='center' style='font-size:10px;'><?php echo $encuestada; ?></td>
					</tr>
					
				<?php
				endforeach;
				?>
				</tbody>
				<tfoot class="bg-light" >
					<tr style="border-top: 1px solid #000000;" >
					<td colspan="11" align="left" style="font-size: 12px;"></td>
					</tr>
				</tfoot>
			</table>
			</div>
		</div>
	</div>
</div>


