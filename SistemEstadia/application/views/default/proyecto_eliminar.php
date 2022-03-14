<?php
$accion="eliminar";
?>

<div class="modal fade" id="modal_<?php echo $accion; ?>_<?php echo $objeto; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $accion; ?>_<?php echo $objeto; ?>" aria-hidden="true" >
	<form id="frm_<?php echo $accion; ?>_<?php echo $objeto; ?>" method="post" enctype="multipart/form-data" action="javascript: <?php echo $accion; ?>_<?php echo $objeto; ?>('<?php echo $objeto; ?>');">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title"><?php echo strtoupper($accion); ?> <?php echo strtoupper($objeto); ?></h5>
			</div>
			
			<div class="modal-body ">
			    <?php 
			    foreach($datosActuales->result() as $datos):
			    	
				?>
					<input type="hidden" id="id_<?php echo $accion; ?>_<?php echo $objeto; ?>" name="id_<?php echo $accion; ?>_<?php echo $objeto; ?>" value="<?php echo $datos->id; ?>" />
				
				 <div class="mb-2">
				    <label class="form-label">Empresa</label><br>
				    <?php echo $datos->nombre_empresa; ?>
				  </div>
		    	 <div class="mb-2">
				    <label class="form-label">Nombre</label><br>
				    <?php echo $datos->nombre; ?>
				  </div>
				  
				   <div class="mb-2">
				    <label class="form-label">Descripción</label><br>
				    <?php echo $datos->descripcion; ?>
				  </div>
				  
				  <div class="mb-2">
				    <label class="form-label">Alumnos Requeridos</label><br>
				    <?php echo $datos->car; ?>
				  </div>
				  
				  <?php
				  endforeach;
				?>
			  </div>
		 
			  <div class="modal-footer alert-info">
			    <button type="submit" id="btn_<?php echo $accion; ?>_<?php echo $objeto; ?>" class="btn btn-sm btn-success btnUTCAzul"><?php echo strtoupper($accion); ?></button>
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			  </div>
		   </div>
 	 </div>
  </form>
</div>