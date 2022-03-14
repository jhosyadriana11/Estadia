<?php 
	$objeto="pago";
	$accion="registrar"; 
?>
<div class="modal fade" id="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" aria-hidden="true" >
	<form id="frm_<?php echo $objeto; ?>_<?php echo $accion; ?>" method="post" enctype="multipart/form-data" action="javascript: <?php echo $objeto; ?>_<?php echo $accion; ?>();">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title"> <?php echo strtoupper($accion)." ".strtoupper($objeto); ?></h5>
			</div>
			
			<div class="modal-body ">
			    <input type="hidden" id="id_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="id_<?php echo $objeto; ?>_<?php echo $accion; ?>" value="<?php echo $datos->id; ?>" />
			    
				 
				 <div class="row">
					 <div class="col-auto mb-3">
					    <label for="pi_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Pago de Inscripción</label>
				    	<select id="pi_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="pi_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" onchange="if (this.value=='NO') {document.getElementById('pif_<?php echo $objeto; ?>_<?php echo $accion; ?>').value='';}else{document.getElementById('pif_<?php echo $objeto; ?>_<?php echo $accion; ?>').value='<?php echo date('Y-m-d'); ?>'}">
				    		<?php
				    		if ($datos->pi=="SI") {
								?><option value="SI" selected="true">SI</option><?php
								?><option value="NO">NO</option><?php
								?><option value="CO">CONVENIO</option><?php
							} 
							if ($datos->pi=="NO") {
								?><option value="SI">SI</option><?php
								?><option value="NO" selected="true">NO</option><?php
								?><option value="CO">CONVENIO</option><?php
							}
							if ($datos->pi=="CO") {
								?><option value="SI">SI</option><?php
								?><option value="NO" >NO</option><?php
								?><option value="CO" selected="true">CONVENIO</option><?php
							}
							?>
				    	</select>
					 </div>
					
					 <div class="col mb-3">
					    <label for="pif_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Fecha de Pago</label>
					    <input type="date" class="form-control form-control-sm text-uppercase" id="pif_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="pif_<?php echo $objeto; ?>_<?php echo $accion; ?>" value="<?php echo $datos->pi_fecha; ?>"  >
					  </div>
				</div>
				<div class="row">
					<div class="col text-danger text-center" id="error_<?php echo $objeto; ?>_<?php echo $accion; ?>" ></div>
				</div>
			  </div>  
			  <div class="modal-footer alert-info">
			    <button type="submit" id="btn_<?php echo $objeto; ?>_<?php echo $accion; ?>_<?php echo $datos->id; ?>" class="btn btn-sm btn-primary btnUTCAzul"><?php echo strtoupper($accion); ?></button>
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			  </div>
		   </div>
 	 </div>
  </form>
</div>
