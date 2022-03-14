<div class="modal fade" id="modalActualizar_<?php echo $objeto; ?>" tabindex="-1" role="dialog" aria-labelledby="modalActualizar_<?php echo $objeto; ?>" aria-hidden="true" >
	<form id="frmActualizar_<?php echo $objeto; ?>" method="post" enctype="multipart/form-data" action="javascript: actualizar_<?php echo $objeto; ?>('<?php echo $objeto; ?>');">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title">ACTUALIZAR <?php echo strtoupper($objeto); ?></h5>
			</div>
			 
				<input type="hidden" id="id_<?php echo $objeto; ?>_a" name="id_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->id; ?>" />
				<div class="modal-body ">
				    <div class="mb-3 row">
					    <label for="empresa_<?php echo $objeto; ?>_a" class="form-label">Empresa</label>
				    	<select id="empresa_<?php echo $objeto; ?>_a" name="empresa_<?php echo $objeto; ?>_a" required="true" class="form-control form-control-sm" onchange="">
				    		<?php foreach($empresas->result() as $row): 
				    			if ($datosActuales->empresa_id==$row->id) {
									?><option value="<?php echo $row->id; ?>" selected><?php echo $row->nombre; ?></option><?php
								} else {
									?><option value="<?php echo $row->id; ?>"><?php echo $row->nombre; ?></option><?php
								}
							endforeach; ?>
				    	</select>
					  </div>
					  
					   <div class="mb-3 row">
					    <label for="des_<?php echo $objeto; ?>_a" class="form-label">Descripción de Proyecto Requerido</label>
					    <textarea class="form-control form-control-sm" id="des_<?php echo $objeto; ?>_a" name="des_<?php echo $objeto; ?>_a" required="true" rows="5" style="width: 100%"><?php echo $datosActuales->solicitud; ?></textarea>
					  </div>

				
					<div class="mb-3 row">
						<div class="col-auto pl-0">
						    <label for="tipo_<?php echo $objeto; ?>_a" class="form-label">Tipo</label>
					    	<select id="tipo_<?php echo $objeto; ?>_a" name="tipo_<?php echo $objeto; ?>_a" required="true" class="form-control form-control-sm" onchange="">
								<?php
								if ($datosActuales->tipo=="L") 
								{
									?><option value="L" selected>LOCAL</option><?php
									?><option value="M">MOVILIDAD</option><?php
								} else {
									?><option value="L">LOCAL</option><?php
									?><option value="M" selected>MOVILIDAD</option><?php
									
								} 
								?>
					    	</select>
				    	</div>
					  	<div class="col-lg p-0">
						    <label for="periodo_<?php echo $objeto; ?>_a" class="form-label">Periodo</label>
					    	<select id="periodo_<?php echo $objeto; ?>_a" name="periodo_<?php echo $objeto; ?>_a" required="true" class="form-control form-control-sm" onchange="">
					    		<?php 
					    		foreach($periodos->result() as $row1): 
					    			if ($row1->id==$datosActuales->periodoid) {
										?><option value="<?php echo $row1->id; ?>" selected><?php echo $row1->title; ?></option><?php
									} else {
										?><option value="<?php echo $row1->id; ?>"><?php echo $row1->title; ?></option><?php
									} 
								endforeach; 
								?>
					    	</select>
				    	</div>
				    	<div class="col-lg-auto pr-0">
					    	<label for="anio_<?php echo $objeto; ?>_a" class="form-label">Año</label>
					    	<select id="anio_<?php echo $objeto; ?>_a" name="anio_<?php echo $objeto; ?>_a" required="true" class="form-control form-control-sm" onchange="">
					    		<?php
					    		
					    			$Anio=date("Y");
									for ($i=1; $i <=2 ; $i++) { 
										if ($Anio==$datosActuales->anio) 
										{
											?><option value="<?php echo $Anio; ?>" selected="true"><?php echo $Anio; ?></option><?php
										} else {
											?><option value="<?php echo $Anio; ?>"><?php echo $Anio; ?></option><?php
										} 
										$Anio=date("Y",strtotime('+1 year' , strtotime($Anio)));
									}
								 ?>
					    	</select>
				    	</div>
					 </div>
					 
					 <br>
					<h6>Informacion Asesor Empresarial</h6>
					<hr>
					<div class="mb-3 row">
						<div class="col-lg-auto">
						    <label for="titulo_ae_<?php echo $objeto; ?>_a" class="form-label">Título</label>
						    <input type="text" class="form-control form-control-sm" id="titulo_ae_<?php echo $objeto; ?>_a" name="titulo_ae_<?php echo $objeto; ?>_a"  value="<?php echo $datosActuales->titulo_ae; ?>" required style="width: 60px;">
					 	</div>
					 	<div class="col-lg">
						    <label for="nombre_ae_<?php echo $objeto; ?>_a" class="form-label">Nombre Completo</label>
						    <input type="text" class="form-control form-control-sm" id="nombre_ae_<?php echo $objeto; ?>_a" name="nombre_ae_<?php echo $objeto; ?>_a"  value="<?php echo $datosActuales->nombre_ae; ?>" required >
						</div>
					  </div>
					  <div class="mb-3 row">
					  	<div class="col-lg">
					    <label for="puesto_ae_<?php echo $objeto; ?>_a" class="form-label">Puesto</label>
					    <input type="text" class="form-control form-control-sm" id="puesto_ae_<?php echo $objeto; ?>_a" name="puesto_ae_<?php echo $objeto; ?>_a"  value="<?php echo $datosActuales->puesto_ae; ?>" required >
					    </div>
					  </div>
					  <div class="mb-3 row">
					  	<div class="col-lg">
					    <label for="email_ae_<?php echo $objeto; ?>_a" class="form-label">Email</label>
					      <input type="email" class="form-control form-control-sm" id="email_ae_<?php echo $objeto; ?>_a" name="email_ae_<?php echo $objeto; ?>_a"  value="<?php echo $datosActuales->email_ae; ?>"  required>
					     </div>
					 
					   	<div class="col-lg-auto">
					    	<label for="tel_ae_<?php echo $objeto; ?>_a" class="form-label">Teléfono</label>
					      	<input type="tel" class="form-control form-control-sm" id="tel_ae_<?php echo $objeto; ?>_a" name="tel_ae_<?php echo $objeto; ?>_a" maxlength="10" value="<?php echo $datosActuales->telefono_ae; ?>" pattern="[0-9]{10}"  required style="width: 100px;">
					     </div>
					  </div>
				  
				  </div>
			 	  
			  <div class="modal-footer alert-info">
			    <button type="submit" id="btnActualizar_<?php echo $objeto; ?>_a" class="btn btn-sm btn-primary btnUTCAzul">Actualizar</button>
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			  </div>
		   </div>
 	 </div>
  </form>
</div>