
<?php
$objeto="proyecto";

?>
<div class="container-fluid mt-1">
	<div class="row">
		<div class="col">
			<div class="alert alert-info" >
			  <h5><?php echo strtoupper($objeto."S"); ?></h5>
			  <?php
				if (($_SESSION["utc_departamento_id"]==27) || ($_SESSION["utc_departamento_id"]==14) || ($_SESSION["utc_departamento_id"]==9)) { //27 Extensión Universitaria Victor, 9 Soporte Técnico
				?>
			  		<a href="<?php echo $objeto."s"; ?>/modalNuevo/<?php echo $objeto; ?>" class="btn btn-secondary btn-sm btnUTCAzul " style="float: right;position:relative; top: -30px;" name="modal_btn" >NUEVO</a>
			  	<?php
				}
				?>
			 </div>
		</div>
	</div>
	<div class="row pb-5">
		<div class="col ">
			<div class="table-responsive p-1"  style="border: 1px solid gray; border-radius: 5px;">
			<table id="proyectos" class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px" data-page-length="25">
				<thead style="" class="bg-light" >
					<tr class="" style="" >
						<th align="left" style="font-size: 12px;"></th>
						<th align="left" style="font-size: 12px;">Empresa</th>
						<th align="left" style="font-size: 12px;">Registro</th>	
						<th align="left" style="font-size: 12px;">Solicitud</th>
						<th align="left" style="font-size: 12px;">Periodo Requerido</th>	
						<th align="left" style="font-size: 12px;">Estatus</th>
						<th align="left" style="font-size: 12px;">Carrera</th>
						<th align="left" style="font-size: 12px;">Alumno Asignado</th>
						<th align="left" style="font-size: 12px;">Asesor Asignado</th>
						<th align="left" style="font-size: 12px;">Observación General</th>
						<th align="left" style="font-size: 12px;">Motivo Cancelación</th>	
					</tr>
				</thead>
				
				<tbody  style="">
				<?php
				foreach($table->result() as $row):	
					?>
					<tr class="<?php if ($row->estatus==4) { echo 'table-danger';	} elseif ($row->estatus==3) { echo 'table-success';	} elseif ($row->estatus==2) { echo 'table-info';} elseif ($row->tipo=="M") { echo 'table-warning';} ?>">
						<td valign='middle' align='left' style="width: 70px;">
							<?php
							
							//Deptos
							//27 EXTENSIÓN UNIVERSITARIA
							//14 ACTIVIDADES CULTURALES Y DEPORTIVAS
							//9 SOPORTE TÉCNICO
							//11 ACADÉMICO
							
							//Jefes
							//utc_jefe_id 71 //Subdirección Académica
							
							if ((($_SESSION["utc_departamento_id"]==27) || ($_SESSION["utc_departamento_id"]==14) || ($_SESSION["utc_departamento_id"]==9)) && ($row->estatus==1)) { 
								?> <a href="proyectos/modalActualizar/<?php echo $objeto; ?>/<?php echo $row->id; ?>" class="btn btn-sm p-0" style="" name="modal_btn" ><span class=""><i class="fas fa-sm fa-edit"></i></span></a><?php
							}
														
							if ((($_SESSION["utc_departamento_id"]==27) || ($_SESSION["utc_departamento_id"]==14) || ($_SESSION["utc_departamento_id"]==9)) && ($row->estatus==1)&&($row->aa_id<1) ) {
								?> <a href="proyectos/modal_alumno_asignar/<?php echo $row->id; ?>" class="btn btn-sm p-0" style="" name="modal_btn" ><span class=""><i class="fas fa-user-plus"></i></span></a><?php								
							}
							
							// tipo es PTC=4
							if ((($_SESSION["utc_ac"]==4) || ($_SESSION['utc_tipo']==4)) && ($row->alumno_id>0) && ($row->estatus<=2)) {
								?> <a href="proyectos/modal_asesor_asignar/<?php echo $row->id; ?>" class="btn btn-sm p-0" style="" name="modal_btn" ><span class=""><i class="fas fa-user-tie"></i></span></a><?php								
							}
							
							/*if (($_SESSION["utc_departamento_id"]==27) || ($_SESSION["utc_departamento_id"]==14) || ($_SESSION["utc_departamento_id"]==9)) {
								?> 
						 		<a href="proyectos/modal_mostrar_asignados/<?php echo $row->id; ?>/<?php echo $row->estatus; ?>" class="btn btn-sm p-0" style="" name="modal_btn" ><span class=""><i class="fas fa-users"></i></span></a> 
						 		<?php
							}*/
							
							/*if ((($_SESSION["utc_departamento_id"]==11)|| ($_SESSION["utc_departamento_id"]==9)) && ($row->estatus==1) && ($row->alumno_id>0) && ($row->aa_id>0) ) {
								?> <a href="proyectos/modalAutorizar/<?php echo $objeto; ?>/<?php echo $row->id; ?>" class="btn btn-sm p-0" style="" name="modal_btn" ><span class=""><i class="fas fa-flag-checkered"></i></span></a><?php
							}*/
							
							if (($row->aa_id==0)&&($row->alumno_id==0) && (($_SESSION["utc_departamento_id"]==27) || ($_SESSION["utc_departamento_id"]==14) || ($_SESSION["utc_departamento_id"]==9))) {
								?> <a href="proyectos/modalEliminar/<?php echo $objeto; ?>/<?php echo $row->id ?>" class="btn btn-sm p-0" style="" name="modal_btn" ><span class=""><i class="fas fa-sm fa-trash-alt"></i></span></a> <?php
							}
							
							
							
							?>
						</td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->nombre_empresa; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo strtoupper($row->fecha_registro); 
							//setlocale(LC_ALL, 'es_ES');
							//echo strtoupper(strftime("%d-%b-%Y %H:%M:%S", strtotime($row->fechahora_reg)));
							?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo mb_strtoupper($row->solicitud); ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->nombre_periodo." ".$row->anio; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->nombre_estatus; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->short_title; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->matricula."<br>".$row->alumno_nombre; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->aa_nombre; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->observacion_gral; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->motivo_can; ?></td>
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


