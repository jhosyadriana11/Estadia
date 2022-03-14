<div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="modalActualizar" aria-hidden="true" >
	<form id="frmActualizar" method="post" enctype="multipart/form-data" action="javascript: actualizar();">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title">ACTUALIZAR EMPRESA</h5>
			</div>
			
			<div class="modal-body ">
			    <?php 
			    foreach($datosEmpresa->result() as $row):
			    	
				?>
					<input type="hidden" id="id_act" name="id_act" value="<?php echo $row->id; ?>" />
					
		    	 <div class="mb-3 row">
				    <label for="nombre_act" class="form-label">Nombre</label>
				    <input type="text" class="form-control form-control-sm focus" id="nombre_act" name="nombre_act" required="true" value="<?php echo $row->nombre; ?>"  >
				  </div>
				 
				  <div class="row  mb-3">
				 	<div class="col pl-0">
					    <label for="giro_act" class="form-label">Giro</label>
					    <input type="text" class="form-control form-control-sm text-uppercase" id="giro_act" name="giro_act" required="true" value="<?php echo $row->giro; ?>"  >
					</div>
				  
					  <div class="col-auto pr-0">
					    <label for="trabajadores_act" class="form-label">Cant. Trabajadores</label>
					    <input type="number" class="form-control form-control-sm " id="trabajadores_act" min="1" name="trabajadores_act" required="true" value="<?php echo $row->trabajadores; ?>"  >
					  </div>
				</div>
				 
				  <div class="mb-3 row">
				    <label for="edo_act" class="form-label">Estado</label>
			    	<select id="edo_act" name="edo_act" required="true" class="form-control form-control-sm" onchange="obtenerMunicipios(this.value);">
			    		<?php 
			    		foreach($estados->result() as $state): 
			    			if ($state->id==$row->edo) {
								?>	    			
								<option value="<?php echo $state->id; ?>" selected><?php echo $state->nombre; ?></option>
								<?php
							} else {
								?>
								<option value="<?php echo $state->id; ?>"><?php echo $state->nombre; ?></option>
								<?php
							}
							
			    		endforeach;
						?>
			    	</select>
				  </div>
				  
				   <div class="mb-3 row">
				    <label for="mun_act" class="form-label">Municipio</label>
				    	<select id="mun_act" name="mun_act" required="true" class="form-control form-control-sm" onchange="obtenerColonias(this.value);">
				    		<?php 
				    		foreach($datosMuns->result() as $muns): 
			    			if ($muns->id==$row->mun) {
								?>	    			
								<option value="<?php echo $muns->id; ?>" selected><?php echo $muns->nombre; ?></option>
								<?php
							} else {
								?>
								<option value="<?php echo $muns->id; ?>"><?php echo $muns->nombre; ?></option>
								<?php
							}
							
			    		endforeach;
						?>
				    	</select>
				    
				  </div>
				  <div class="mb-3 row">
				    <label for="col_act" class="form-label">Colonia</label>
				    	<select id="col_act" name="col_act" required="true" class="form-control form-control-sm" >
				    		<?php 
				    		foreach($datosCols->result() as $cols): 
			    			if ($cols->id==$row->col) {
								?>	    			
								<option value="<?php echo $cols->id; ?>" selected><?php echo $cols->nombre; ?></option>
								<?php
							} else {
								?>
								<option value="<?php echo $cols->id; ?>"><?php echo $cols->nombre; ?></option>
								<?php
							}
							
				    		endforeach;
							?>
				    	</select>
				   
				  </div>
				   <div class="mb-3 row">
				    <label for="dir_act" class="form-label">Dirección y Número Exterior</label>
				      <input type="text" class="form-control form-control-sm" id="dir_act" name="dir_act" required="true" value="<?php echo $row->dir; ?>"  >
				  </div>
				  
				  <div class="mb-3 row">
				    <label for="tel_act" class="form-label">Teléfono</label>
				      <input type="tel" class="form-control form-control-sm" id="tel_act" name="tel_act" required="true" value="<?php echo $row->tel; ?>" pattern="[0-9]{10}"  >
				  </div>
				  
				  <div class="mb-3 row">
				    <label for="cp_act" class="form-label">Código Postal</label>
				      <input type="number" class="form-control form-control-sm" id="cp_act" name="cp_act" required="true" value="<?php echo $row->cp; ?>" pattern="[0-9]{1,5}"  >
				  </div>
				  
				  
				  <br>
				  <h6>Datos del Contacto</h6>
				  <hr>
				  <div class="mb-3 row">
					  <div class="col-lg-auto">
					    <label for="titulo_con" class="form-label">Titulo</label>
					    <input type="text" class="form-control form-control-sm" id="titulo_con_act" name="titulo_con_act" required="true" value="<?php echo $row->titulo_contacto; ?>"  style="width: 60px;">
					  </div>
					  <div class="col-lg">
					    <label for="nombre_con" class="form-label">Nombre</label>
					    <input type="text" class="form-control form-control-sm" id="nombre_con_act" name="nombre_con_act" required="true" value="<?php echo $row->nombre_contacto; ?>"  >
				    </div>
				  </div>
				  <div class="mb-3 row">
				  	<div class="col-lg">
				    <label for="puesto_con" class="form-label">Puesto</label>
				    <input type="text" class="form-control form-control-sm" id="puesto_con_act" name="puesto_con_act" required="true" value="<?php echo $row->puesto_contacto; ?>"  >
				    </div>
				  </div>
				  <div class="mb-3 row">
				  	<div class="col-lg">
				    <label for="email_con" class="form-label">Email</label>
				      <input type="email" class="form-control form-control-sm" id="email_con_act" name="email_con_act" required="true" value="<?php echo $row->email_contacto; ?>"  >
				    </div>
				  
				   	<div class="col-lg-auto">
				    <label for="tel_con" class="form-label">Teléfono</label>
				      <input type="tel" class="form-control form-control-sm" id="tel_con_act" name="tel_con_act" required="true" maxlength="10" value="<?php echo $row->tel_contacto; ?>" pattern="[0-9]{10}"  style="width: 100px;">
				    </div>
				  </div>
				  				 
				  <?php
				  endforeach;
				?>
			  </div>
		 
			  <div class="modal-footer alert-info">
			    <button type="submit" id="btnActualizar" class="btn btn-sm btn-primary btnUTCAzul">Actualizar</button>
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			  </div>
		   </div>
 	 </div>
  </form>
</div>