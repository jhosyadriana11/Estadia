
<?php
$objeto="evaluacion";


?>
<div class="container-fluid mt-1">
	<?php
		foreach($proyecto->result() as $row1):
		?>
		<div class="row">
			<div class="col">
				<div class="alert alert-info" >
				  <h5><?php echo strtoupper($objeto."ES"); ?></h5>
				  <?php
				  if (($row1->estatus<=2)&&($evaluaciones->num_rows()<3)) {
					?><a href="#" onclick="mostrar_modal_nueva_<?php echo $objeto; ?>('<?php echo $objeto; ?>','<?php echo $row1->id; ?>');" class="btn btn-secondary btn-sm btnUTCAzul " style="float: right;position:relative; top: -30px;"  >NUEVA</a><?php  
				  }
				  ?>
				  <a href="#" onclick="window.history.back();" class="btn btn-secondary btn-sm btnUTCAzul mr-1" style="float: right;position:relative; top: -30px;"  >REGRESAR</a>
				</div>
			</div>
		</div>
		<div class="row pb-3" style="font-size: 12px;">
			<div class="col-auto">
				<b>Cuatrimestre:</b><br>
				<b>Nombre del alumno:</b><br>
				<b>Programa Educativo:</b><br>
				<b>Nombre del proyecto:</b><br>
				<b>Empresa:</b><br>
				<b>Asesor Académico:</b><br>
				<b>Asesor Empresarial:</b><br>
			</div>
			<div class="col">
				<?php
					echo $row1->nombre_periodo.' '.$row1->anio.'<br>';
					echo $row1->alumno_nombre.'<br>';
					echo $row1->short_title.'<br>';
					echo $row1->nombre.'<br>';
					echo $row1->nombre_empresa.'<br>';
					echo $row1->aa_nombre.'<br>';
					echo $row1->nombre_ae.'<br>';
				?>
				
			</div>
		</div>
		<?php
		endforeach
	?>
	<div class="row pb-5">
		<div class="col ">
			<div class="table-responsive p-1"  style="border: 1px solid gray; border-radius: 5px;">
			<table id="<?php echo $objeto."s"; ?>" class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px" data-page-length="25">
				<thead style=""  >
					<tr class="bg-dark text-light">
						<th colspan="3" class="bg-light"></th>
						<th colspan="3">Asesor Académico</th>
						<th colspan="3">Asesor Empresarial</th>
					</tr>
					<tr class="bg-light" style="" >
						<th align="left" style="width: 20px;"></th>
						<th align="left" style="width: 20px;" title="Nivel de Competencia">NC</th>
						<th align="left" style="width: 100px;">Periodo</th>
						<th align="left" style="width: 100px;" title="Fecha Hora de Registro">FHR AA</th>
						<th align="left" style="">Fortalezas AA</th>
						<th align="left" style="">Áreas de Mejora AA</th>
						<th align="left" style="width: 100px;" title="Fecha Hora de Registro">FHR AE</th>
						<th align="left" style="">Fortalezas AE</th>
						<th align="left" style="">Áreas de Mejora AE</th>
					</tr>
				</thead>
				
				<tbody  style="">
				<?php
				foreach($evaluaciones->result() as $row):
					/*$txt_date_conformidad="";
					if ($row->fh_conformidad!=NULL) {
						$date_conformidad = new DateTime($row->fh_conformidad); 
						$txt_date_conformidad=$date_conformidad->format('d-M-Y H:i:s');
					}*/
						
					?>
					<tr class="">
						<td valign='middle' align='left' style="width: 60px;">
							<?php
							if ($row->nc_ae_evaluacion=="NO" && $row1->estatus<4) {
									?> <a id="btn_rce_<?php echo $row->id; ?>" href="javascript: reenviar_correo_evaluacion('<?php echo $row->id; ?>')" class="btn btn-sm p-0" style="" title="Reenviar Correo a Asesor Empresarial" ><span class=""><i class="fas fa-paper-plane"></i></span></a><?php
								}
							/*foreach($semanas->result() as $row2):
								if ($row2->semana==$row->semana) {
									?> <a href="#" onclick="mostrar_modal_actualizar_seguimiento();" class="btn btn-sm p-0" style="" name="modal_btn" title="Actualizar Seguimiento" ><span class=""><i class="fas fa-sm fa-edit"></i></span></a><?php
								}
							endforeach*/
							?>
							<a href="javascript: imprimir_f3(<?php echo $row1->id; ?>,<?php echo $row->id; ?>)" class="btn btn-sm btn-warning p-0 pl-1 pr-1  border border-2" style="font-size: 12px;font-weight: bold;" name="" title="Imprimir F3" >F3</a>
							
						</td>
						<td valign='middle' align='center' style='font-size:10px;'><?php echo $row->nc;  ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->nc_periodo;  ?></td>
						<td valign='middle' align='left' style='font-size:10px;'>
							<?php
							if ($row->nc_fhr!="" && $row->nc_fhr!="0000-00-00 00:00:00") {
								$date = new DateTime($row->nc_fhr);
								echo strtoupper($date->format('d-M-Y H:i:s')); 
							}
							?>
						</td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->nc_fortalezas;  ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->nc_mejoras;  ?></td>
						<td valign='middle' align='left' style='font-size:10px;'>
							<?php
							if ($row->nc_ae_fhr!="" && $row->nc_ae_fhr!="0000-00-00 00:00:00") {
								$date = new DateTime($row->nc_ae_fhr);
								echo strtoupper($date->format('d-M-Y H:i:s')); 
							}
							?>
						</td>
						<td valign='middle' align='left' style='font-size:10px;'><?php if($row->nc_ae_fortalezas=="" AND $row->nc_ae_evaluacion=="SI") {echo "(SIN REGISTRO)";} else {echo $row->nc_ae_fortalezas;}  ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php if($row->nc_ae_mejoras=="" AND $row->nc_ae_evaluacion=="SI") {echo "(SIN REGISTRO)";} else {echo $row->nc_ae_mejoras;}  ?></td>
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


