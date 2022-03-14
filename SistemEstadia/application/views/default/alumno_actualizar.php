<?php 
	$objeto="alumno";
	$accion="actualizar"; 
?>
<div class="modal fade" id="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" aria-hidden="true" >
	<form id="frm_<?php echo $objeto; ?>_<?php echo $accion; ?>" method="post" enctype="multipart/form-data" action="javascript: <?php echo $objeto; ?>_<?php echo $accion; ?>();">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title"> <?php echo strtoupper($accion." ".$objeto); ?></h5>
			</div>
			
			<div class="modal-body ">
			    <input type="hidden" id="id_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="id_<?php echo $objeto; ?>_<?php echo $accion; ?>" value="<?php echo $datos->id; ?>" />
			    
				 <div class="row">
				 	<div class="col pl-0">
				 		<div class="mb-3">
						    <label for="matricula_<?php echo $objeto; ?>__<?php echo $accion; ?>" class="form-label">Matrícula</label>
						    <input type="text" class="form-control form-control-sm text-uppercase focus" id="matricula_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="matricula_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" value="<?php echo $datos->matricula; ?>"   >
						    
						  </div>
				 	</div>
				 	<div class="col-auto p-0">
				 		<div class="mb-3 ">
						    <label for="tipo_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Tipo</label>
					    	<select id="tipo_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="tipo_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" >
					    		<?php 
					    		if ($datos->tipo=="REGULAR") {
									?>
									<option value="REGULAR" selected="true">REGULAR</option>
					    			<option value="REINGRESO">REINGRESO</option>
					    			<?php
								} else {
									?>
									<option value="REGULAR" >REGULAR</option>
					    			<option value="REINGRESO" selected="true">REINGRESO</option>
					    			<?php
								}
								?>
					    	</select>
						 </div>
				 	</div>
				 	<div class="col-auto pr-0">
				 		<div class="mb-3 ">
						    <label for="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Estatus</label>
					    	<select id="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" onchange="RequerirCampo('observacion_<?php echo $objeto; ?>_<?php echo $accion; ?>', this.value)">
					    		<?php 
					    		if ($datos->estatus=="ACTIVO") {
									?>
									<option value="ACTIVO" selected="true">ACTIVO</option>
					    			<option value="DETENIDO">DETENIDO</option>
					    			<?php
								} else {
									?>
									<option value="ACTIVO" >ACTIVO</option>
					    		<option value="DETENIDO" selected="true">DETENIDO</option>
					    			<?php
								}
								?>
					    		
					    	</select>
						 </div>
				 	</div>
				 </div>
				  
		    	 <div class="mb-3 row">
				    <label for="nombre_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Nombre</label>
				    <input type="text" class="form-control form-control-sm text-uppercase" id="nombre_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="nombre_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" value="<?php echo $datos->nombre; ?>"  >
				  </div>
				  
				 <div class="mb-3 row">
				    <label for="carrera_<?php echo $objeto; ?>__<?php echo $accion; ?>" class="form-label">Carrera</label>
			    	<select id="carrera_<?php echo $objeto; ?>__<?php echo $accion; ?>" name="carrera_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" onchange="">
			    		<?php 
			    		foreach($carreras->result() as $row): 
			    			if ($datos->carreraid==$row->id) {
								?><option value="<?php echo $row->id; ?>" selected><?php echo $row->short_title." ".$row->title; ?></option><?php
							} else {
								?><option value="<?php echo $row->id; ?>"><?php echo $row->short_title." ".$row->title; ?></option><?php
							}
							  ?>
						
						<?php endforeach; ?>
			    	</select>
				 </div>
				 
				 <div class="row">
					 <div class="col mb-3">
					    <label for="sexo_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Sexo</label>
				    	<select id="sexo_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="sexo_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" onchange="">
				    		<?php
				    		if ($datos->correo=="H") {
								?><option value="H" selected="true">HOMBRE</option><?php
								?><option value="M">MUJER</option><?php
							} else {
								?><option value="H">HOMBRE</option><?php
								?><option value="M" selected="true">MUJER</option><?php
							}
							?>
				    	</select>
					 </div>
					
					 <div class="col mb-3">
					    <label for="imss_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">IMSS</label>
					    <input type="text" class="form-control form-control-sm text-uppercase" id="imss_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="imss_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" value="<?php echo $datos->imss; ?>"  >
					  </div>
				</div>
				  
				 <div class="row">
					 <div class="col-8 mb-3">
					    <label for="correo_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Email</label>
					    <input type="email" class="form-control form-control-sm" id="correo_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="correo_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" value="<?php echo $datos->correo; ?>"  >
					  </div>
				  
					  <div class="col mb-3">
					    <label for="tel_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Teléfono</label>
					    <input type="tel" class="form-control form-control-sm" id="tel_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="tel_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" maxlength="10" value="<?php echo $datos->telefono; ?>" pattern="[0-9]{10}"  >
					  </div>
				</div>
				
				<div class="mb-2 row">
				    <label for="observacion_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Observacion</label>
				    <textarea class="form-control form-control-sm text-uppercase" name="observacion_<?php echo $objeto; ?>_<?php echo $accion; ?>" id="observacion_<?php echo $objeto; ?>_<?php echo $accion; ?>" rows="4"><?php echo $datos->observacion; ?></textarea>
				    
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
