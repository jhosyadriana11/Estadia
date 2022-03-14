<?php
$accion="autorizar";
?>
<div class="modal fade" id="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" aria-hidden="true" >
	<form id="frm_<?php echo $objeto; ?>_<?php echo $accion; ?>" method="post" enctype="multipart/form-data" action="javascript: <?php echo $objeto; ?>_<?php echo $accion; ?>('<?php echo $objeto; ?>');">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title"><?php echo strtoupper($accion." ".$objeto); ?></h5>
			</div>

			<input type="hidden" id="id_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="id_<?php echo $objeto; ?>_<?php echo $accion; ?>" value="<?php echo $datos->id; ?>" />
			<div class="modal-body ">
				  <div class="mb-3 row">
				    <label for="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Estatus</label>
				    <select id="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" onchange="">
			    		<?php foreach($estatus->result() as $row): 
							if ($row->id==1 || $row->id==2 || $row->id==6) {
								if ($datos->estatus==$row->id) {
									?><option value="<?php echo $row->id; ?>" selected><?php echo $row->nombre; ?></option><?php
								} else {
									?><option value="<?php echo $row->id; ?>"><?php echo $row->nombre; ?></option><?php
								}
							}
			    			
						endforeach; ?>
			    	</select>
				  </div>
				  
				  <div class="mb-3 row">
				    <label for="obs_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Motivo de Cancelación</label>
				    <textarea class="form-control form-control-sm" id="obs_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="obs_<?php echo $objeto; ?>_<?php echo $accion; ?>" rows="5" style="width: 100%"><?php echo $datos->observacion_gral; ?></textarea>
				  </div>
			  </div>

			  <div class="modal-footer alert-info">
			    <button type="submit" id="btn_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="btn btn-sm btn-primary btnUTCAzul">GUARDAR</button>
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			  </div>
		   </div>
 	 </div>
  </form>
</div>