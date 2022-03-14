<?php 
	$objeto="alumno";
	$accion="agregar"; 
?>
<div class="modal fade" id="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" aria-hidden="true" >
	<form id="frm_<?php echo $objeto; ?>_<?php echo $accion; ?>" method="post" enctype="multipart/form-data" action="javascript: <?php echo $objeto; ?>_<?php echo $accion; ?>();">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title">NUEVO <?php echo strtoupper($objeto); ?></h5>
			</div>
			
			<div class="modal-body ">
			    
			     <div class="row">
				 	<div class="col pl-0">
				 		<div class="mb-3">
						    <label for="matricula_<?php echo $objeto; ?>__<?php echo $accion; ?>" class="form-label">Matrícula</label>
						    <input type="text" class="form-control form-control-sm text-uppercase focus" id="matricula_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="matricula_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" value=""  >
						    
						  </div>
				 	</div>
				 	<div class="col-auto p-0">
				 		<div class="mb-3 ">
						    <label for="tipo_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Tipo</label>
					    	<select id="tipo_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="tipo_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" onchange="">
					    		<option value="REGULAR" selected="true">REGULAR</option>
					    		<option value="REINGRESO">REINGRESO</option>
					    	</select>
						 </div>
				 	</div>
				 	<div class="col-auto pr-0">
				 		<div class="mb-3 ">
						    <label for="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Estatus</label>
					    	<select id="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" onchange="RequerirCampo('observacion_<?php echo $objeto; ?>_<?php echo $accion; ?>', this.value)">
					    		<option value="ACTIVO" selected="true">ACTIVO</option>
					    		<option value="DETENIDO">DETENIDO</option>
					    	</select>
						 </div>
				 	</div>
				 </div>
				  
		    	 <div class="mb-2 row">
				    <label for="nombre_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Nombre</label>
				    <input type="text" class="form-control form-control-sm text-uppercase" id="nombre_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="nombre_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" value=""  >
				  </div>
				  
				 <div class="mb-2 row">
				    <label for="carrera_<?php echo $objeto; ?>__<?php echo $accion; ?>" class="form-label">Carrera</label>
			    	<select id="carrera_<?php echo $objeto; ?>__<?php echo $accion; ?>" name="carrera_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" onchange="">
			    		<option value="" selected="true"></option>
			    		<?php foreach($carreras->result() as $row): ?>
						<option value="<?php echo $row->id; ?>"><?php echo $row->short_title." ".$row->title; ?></option>
						<?php endforeach; ?>
			    	</select>
				 </div>
				 
				 <div class="row">
					 <div class="col mb-2">
					    <label for="sexo_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Sexo</label>
				    	<select id="sexo_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="sexo_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" onchange="">
				    		<option value="" selected="true"></option>
				    		<option value="H">HOMBRE</option>
				    		<option value="M">MUJER</option>
				    	</select>
					 </div>
					
					 <div class="col mb-2">
					    <label for="imss_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">IMSS</label>
					    <input type="text" class="form-control form-control-sm text-uppercase" id="imss_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="imss_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" value=""  >
					  </div>
				</div>
				  
				 <div class="row">
					 <div class="col-8 mb-2">
					    <label for="correo_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Email</label>
					    <input type="email" class="form-control form-control-sm" id="correo_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="correo_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" value=""  >
					  </div>
				  
					  <div class="col mb-2">
					    <label for="tel_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Teléfono</label>
					    <input type="tel" class="form-control form-control-sm" id="tel_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="tel_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" maxlength="10" value="" pattern="[0-9]{10}"  >
					  </div>
				</div>
				
				 <div class="mb-2 row">
				    <label for="observacion_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Observacion</label>
				    <textarea class="form-control form-control-sm text-uppercase" name="observacion_<?php echo $objeto; ?>_<?php echo $accion; ?>" id="observacion_<?php echo $objeto; ?>_<?php echo $accion; ?>" rows="4"></textarea>
				    
				  </div>
			  </div>
		 
			  <div class="modal-footer alert-info">
			    <button type="submit" id="btn_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="btn btn-sm btn-primary btnUTCAzul">Agregar</button>
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			  </div>
		   </div>
 	 </div>
  </form>
</div>
