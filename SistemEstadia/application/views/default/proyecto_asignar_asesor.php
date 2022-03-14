<?php
$accion="asignar";
$objeto="asesor";
?>
<div class="modal fade" id="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" aria-hidden="true" >
	<form id="frm_<?php echo $objeto; ?>_<?php echo $accion; ?>" method="post" enctype="multipart/form-data" action="javascript: <?php echo $objeto; ?>_<?php echo $accion; ?>();">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title"><?php echo strtoupper($accion." ".$objeto); ?> </h5>
				<input type="hidden" id="id_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="id_<?php echo $objeto; ?>_<?php echo $accion; ?>" value="<?php echo $datos->id; ?>" />
			</div>

			<div class="modal-body ">
				 <div class="mb-3 row">
				    <label for="aa_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Asesor Académico</label>
			    	<select id="aa_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="aa_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-control form-control-sm" onchange="">
			    		<option value="" selected="true"></option>
			    		<?php 
			    		
			    		foreach($asesores_aca->result() as $row2): 
							
							if ($row2->Id==$datos->aa_id)
							{
								?><option selected="true" value="<?php echo $row2->Id; ?>"><?php echo $row2->Nombre; ?></option><?php
							}else{
								?><option value="<?php echo $row2->Id; ?>"><?php echo $row2->Nombre; ?></option><?php
							}
						endforeach; ?>
			    	</select>
				 </div>
			</div>

			<div class="modal-footer alert-info">
			    <button type="submit" id="btn_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="btn btn-sm btn-primary btnUTCAzul"><?php echo strtoupper($accion); ?></button>
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			</div>
		</div>
 	 </div>
  </form>
</div>