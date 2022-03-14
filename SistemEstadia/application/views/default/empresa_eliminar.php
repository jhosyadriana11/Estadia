<?php 
$accion="eliminar";
?>
<div class="modal fade" id="modal_<?php echo $accion; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $accion; ?>" aria-hidden="true" >
	<form id="frm_<?php echo $accion; ?>" method="post" enctype="multipart/form-data" action="javascript: <?php echo $accion; ?>('<?php echo $accion; ?>');">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title"><?php echo strtoupper($accion); ?> EMPRESA</h5>
			</div>
			
			<div class="modal-body ">
			    <?php 
			    foreach($datosEmpresa->result() as $row):
			    	
				?>
					<input type="hidden" id="id_<?php echo $accion; ?>" name="id_<?php echo $accion; ?>" value="<?php echo $row->id; ?>" />
					
		    	 <div class="mb-2">
				    <label class="form-label">Nombre</label><br>
				    <?php echo $row->nombre; ?>
				  </div>
				  
				   <div class="mb-2">
				    <label class="form-label">Dirección y Número Exterior</label><br>
				    <?php echo $row->dir.", ".$row->colname.", ".$row->munname.", ".$row->edoname.", CP ".$row->cp; ?>
				  </div>
				  
				  <div class="mb-2">
				    <label class="form-label">Teléfono</label><br>
				    <?php echo $row->tel; ?>
				  </div>
				  
				  <div class="mb-2">
				    <label class="form-label">Código Postal</label><br>
				    <?php echo $row->cp; ?>
				  </div>
				  <?php
				  endforeach;
				?>
			  </div>
		 
			  <div class="modal-footer alert-info">
			    <button type="submit" id="btn<?php echo $accion; ?>" class="btn btn-sm btn-success btnUTCAzul"><?php echo strtoupper($accion); ?></button>
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			  </div>
		   </div>
 	 </div>
  </form>
</div>