<?php 
	$objeto="proyecto";
	$accion="mostrar_asignados"; 
?>
<div class="modal fade" id="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" aria-hidden="true" >

	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title">
					ALUMNOS ASIGNADOS
					<small></small>
				</h5>
			</div>
			
			<div class="modal-body ">
				<div class="table-responsive p-1"  style="border: 1px solid gray; border-radius: 5px;">
				<table id="tbasignados" class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px">
					<thead style="" class="bg-light" >
						<tr class="" style="" >
							<th align="center" class="text-center" style=""></th>
							<th align="left" style="font-size: 12px;">Matrícula</th>
							<th align="left" style="font-size: 12px;">Alumno</th>
						</tr>
					</thead>
					
					<tbody  style="">
					<?php
					foreach($asignados->result() as $row):			
						?>
						<tr class="" id="<?php echo $row->id ?>">
							<td valign='middle' align='left'>
								<?php
								//if ($estatus==2) {
									?><a href="javascript: proyecto_desasignar('<?php echo $row->id ?>');" id="btn_<?php echo $objeto; ?>_<?php echo $row->id; ?>" class="btn btn-sm p-0" style="" name="modal_btn" ><span class=""><i class="fas fa-user-times"></i></span></a><?php	
								//}
								
								?>
							</td>
							<td valign='middle' align='left' style='font-size:10px;' title=""><?php echo $row->matricula;?></td>
							<td valign='middle' align='left' style='font-size:10px;' title=""><?php echo $row->alumno; ?></td>
						</tr>
						
					<?php
					endforeach;
					?>
					</tbody>
					<tfoot class="bg-light" >
						<tr style="border-top: 1px solid #000000;" >
						<td colspan="3" align="left" style="font-size: 12px;"></td>
						</tr>
					</tfoot>
				</table>
				</div>
			</div>
		 
			<div class="modal-footer alert-info">
				<div class="row w-100  justify-content-between align-items-end ">
					<div class="col-auto ">
						<?php
						if ($estatus==2 && $asignados->num_rows()>0) {
							?><button id="btn_cerrar_<?php echo $objeto; ?>_<?php echo $accion; ?>" onclick="cambiar_estatus_proyecto('<?php echo $proyecto_id?>','3');" class="btn btn-sm btn-warning btnUTCCancelar" data-dismiss="modal">Cerrar Asignación</button><?php	
						}
						?>
					</div>
					<div class="col-auto">
						<button id="btn_regresar_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
					</div>
				</div>
			</div>
	   </div>
 	 </div>

</div>
