<div class="modal fade" id="modalAgregar_<?php echo $objeto; ?>" tabindex="-1" role="dialog" aria-labelledby="modalAgregar_<?php echo $objeto; ?>" aria-hidden="true" >
	<form id="frmAgregar_<?php echo $objeto; ?>" method="post" enctype="multipart/form-data" action="javascript: agregar_<?php echo $objeto; ?>('<?php echo $objeto; ?>');">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title">NUEVO <?php echo strtoupper($objeto); ?></h5>
			</div>
			
			<div class="modal-body ">
			    <div class="mb-3 row">
				    <label for="empresa_<?php echo $objeto; ?>_n" class="form-label">Empresa</label>
			    	<select id="empresa_<?php echo $objeto; ?>_n" name="empresa_<?php echo $objeto; ?>_n" required="true" class="form-control form-control-sm" onchange="">
			    		<option value="" selected="true"></option>
			    		<?php foreach($empresas->result() as $row): ?>
						<option value="<?php echo $row->id; ?>"><?php echo $row->nombre; ?></option>
						<?php endforeach; ?>
			    	</select>
				 </div>
				 
				  <div class="mb-3 row">
				    <label for="des_<?php echo $objeto; ?>_n" class="form-label">Descripción de Proyecto Requerido</label>
				    <textarea class="form-control form-control-sm" id="des_<?php echo $objeto; ?>_n" name="des_<?php echo $objeto; ?>_n" required="true" rows="5" style="width: 100%"></textarea>
				  </div>
				
				<div class="mb-3 row">
					<div class="col-auto pl-0">
					    <label for="tipo_<?php echo $objeto; ?>_n" class="form-label">Tipo</label>
				    	<select id="tipo_<?php echo $objeto; ?>_n" name="tipo_<?php echo $objeto; ?>_n" required="true" class="form-control form-control-sm" onchange="">
							<option value="L" selected>LOCAL</option>
							<option value="M">MOVILIDAD</option>
				    	</select>
			    	</div>
				  	<div class="col pl-0">
					    <label for="periodo_<?php echo $objeto; ?>_n" class="form-label">Periodo</label>
				    	<select id="periodo_<?php echo $objeto; ?>_n" name="periodo_<?php echo $objeto; ?>_n" required="true" class="form-control form-control-sm" onchange="">
				    		<?php 
				    		foreach($periodos->result() as $row1): 
				    			if ($row1->id==3) {
									?><option value="<?php echo $row1->id; ?>" selected><?php echo $row1->title; ?></option><?php
								} else {
									?><option value="<?php echo $row1->id; ?>"><?php echo $row1->title; ?></option><?php
								} 
							endforeach; 
							?>
				    	</select>
			    	</div>
			    	<div class="col-auto pr-0">
				    	<label for="anio_<?php echo $objeto; ?>_n" class="form-label">Año</label>
				    	<select id="anio_<?php echo $objeto; ?>_n" name="anio_<?php echo $objeto; ?>_n" required="true" class="form-control form-control-sm" onchange="">
				    		<?php
				    			$anio_actual=date("Y");
							 	$NuevoAnio=date("Y",strtotime('+1 year' , strtotime($anio_actual)));
							 ?>
				    		<option value="<?php echo $anio_actual; ?>" selected="true"><?php echo $anio_actual; ?></option>
				    		<option value="<?php echo $NuevoAnio;?>" ><?php echo $NuevoAnio;?></option>
				    	</select>
			    	</div>
				 </div>
				
				<br>
				<h6>Informacion Asesor Empresarial</h6>
				<hr>
				<div class="mb-3 row">
					<div class="col-lg-auto">
					    <label for="titulo_ae_<?php echo $objeto; ?>_n" class="form-label">Título</label>
					    <input type="text" class="form-control form-control-sm" id="titulo_ae_<?php echo $objeto; ?>_n" name="titulo_ae_<?php echo $objeto; ?>_n"  value="" required style="width: 60px;">
				 	</div>
				 	<div class="col-lg">
					    <label for="nombre_ae_<?php echo $objeto; ?>_n" class="form-label">Nombre Completo</label>
					    <input type="text" class="form-control form-control-sm" id="nombre_ae_<?php echo $objeto; ?>_n" name="nombre_ae_<?php echo $objeto; ?>_n"  value="" required >
					</div>
				  </div>
				  <div class="mb-3 row">
				  	<div class="col-lg">
				    <label for="puesto_ae_<?php echo $objeto; ?>_n" class="form-label">Puesto</label>
				    <input type="text" class="form-control form-control-sm" id="puesto_ae_<?php echo $objeto; ?>_n" name="puesto_ae_<?php echo $objeto; ?>_n"  value="" required >
				    </div>
				  </div>
				  <div class="mb-3 row">
				  	<div class="col-lg">
				    <label for="email_ae_<?php echo $objeto; ?>_n" class="form-label">Email</label>
				      <input type="email" class="form-control form-control-sm" id="email_ae_<?php echo $objeto; ?>_n" name="email_ae_<?php echo $objeto; ?>_n"  value=""  required>
				     </div>
				 
				   	<div class="col-lg-auto">
				    	<label for="tel_ae_<?php echo $objeto; ?>_n" class="form-label">Teléfono</label>
				      	<input type="tel" class="form-control form-control-sm" id="tel_ae_<?php echo $objeto; ?>_n" name="tel_ae_<?php echo $objeto; ?>_n" maxlength="10" value="" pattern="[0-9]{10}"  required style="width: 100px;">
				     </div>
				  </div>
			  </div>
		 
			  <div class="modal-footer alert-info">
			    <button type="submit" id="btnAgregar_<?php echo $objeto; ?>_n" class="btn btn-sm btn-primary btnUTCAzul">Agregar</button>
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			  </div>
		   </div>
 	 </div>
  </form>
</div>