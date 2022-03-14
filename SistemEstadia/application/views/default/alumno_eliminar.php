<?php
$objeto="alumno";
$accion="eliminar";
?>

<div class="modal fade" id="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" aria-hidden="true" >
	<form id="frm_<?php echo $objeto; ?>_<?php echo $accion; ?>" method="post" enctype="multipart/form-data" action="javascript: <?php echo $objeto; ?>_<?php echo $accion; ?>();">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title"><?php echo strtoupper($accion); ?> <?php echo strtoupper($objeto); ?></h5>
			</div>
			
			<div class="modal-body ">
				<input type="hidden" id="id_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="id_<?php echo $objeto; ?>_<?php echo $accion; ?>" value="<?php echo $datos->id; ?>" />
				
				 <div class="mb-2">
				    <label class="form-label">Nombre</label><br>
				    <?php echo $datos->nombre; ?>
				  </div>
		    	 <div class="mb-2">
				    <label class="form-label">Matrícula</label><br>
				    <?php echo $datos->matricula; ?>
				  </div>
				  <div class="mb-2">
				    <label class="form-label">Carrera</label><br>
				    <?php echo $datos->carrera; ?>
				  </div>
			  </div>
		 
			  <div class="modal-footer alert-info">
			    <button type="submit" id="btn_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="btn btn-sm btn-success btnUTCAzul"><?php echo strtoupper($accion); ?></button>
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			  </div>
		   </div>
 	 </div>
  </form>
</div>