<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="modalNuevo" aria-hidden="true" >
	<form id="frmNuevo" method="post" enctype="multipart/form-data" action="javascript: guardarEmpresa();">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title">NUEVA EMPRESA</h5>
			</div>
			
			<div class="modal-body ">
			    
		    	 <div class="mb-3 row">
				    <label for="nombre" class="form-label">Nombre</label>
				    <input type="text" class="form-control form-control-sm focus" id="nombre" name="nombre" required="true" value=""  >
				  </div>
				 
				 <div class="row  mb-3">
				 	<div class="col pl-0">
					    <label for="giro" class="form-label">Giro</label>
					    <input type="text" class="form-control form-control-sm text-uppercase" id="giro" name="giro" required="true" value=""  >
					</div>
				  
					  <div class="col-auto pr-0">
					    <label for="trabajadores" class="form-label">Cant. Trabajadores</label>
					    <input type="number" class="form-control form-control-sm " id="trabajadores" min="1" name="trabajadores" required="true" value="1"  >
					  </div>
				</div>
				  
				  <div class="mb-3 row">
				    <label for="edo" class="form-label">Estado</label>
			    	<select id="edo" name="edo" required="true" class="form-control form-control-sm" onchange="obtenerMunicipios(this.value);">
			    		<option value="" selected="true"></option>
			    		<?php foreach($estados->result() as $state): ?>
						<option value="<?php echo $state->id; ?>"><?php echo $state->nombre; ?></option>
						<?php endforeach; ?>
			    	</select>
				  </div>
				  
				   <div class="mb-3 row">
				    <label for="mun" class="form-label">Municipio</label>
				    	<select id="mun" name="mun" required="true" class="form-control form-control-sm" onchange="obtenerColonias(this.value);">
				    	</select>
				    
				  </div>
				  <div class="mb-3 row">
				    <label for="col" class="form-label">Colonia</label>
				    	<select id="col" name="col" required="true" class="form-control form-control-sm" >
				    	</select>
				   
				  </div>
				   <div class="mb-3 row">
				    <label for="dir" class="form-label">Dirección y Número Exterior</label>
				      <input type="text" class="form-control form-control-sm" id="dir" name="dir" required="true" value=""  >
				  </div>
				  
				  <div class="mb-3 row">
				    <label for="tel" class="form-label">Teléfono</label>
				      <input type="tel" class="form-control form-control-sm" id="tel" name="tel" required="true" maxlength="10" value="" pattern="[0-9]{10}"  >
				  </div>
				  
				  <div class="mb-3 row">
				    <label for="cp" class="form-label">Código Postal</label>
				      <input type="number" class="form-control form-control-sm" id="cp" name="cp" required="true" value="" pattern="[0-9]{1,5}"  >
				  </div>
				  
				  <br>
				  <h6>Datos del Contacto</h6>
				  <hr>
				  <div class="mb-3 row">
					  <div class="col-lg-auto">
					    <label for="titulo_con" class="form-label">Titulo</label>
					    <input type="text" class="form-control form-control-sm" id="titulo_con" name="titulo_con" required="true" value=""  style="width: 60px;">
					  </div>
					  <div class="col-lg">
					    <label for="nombre_con" class="form-label">Nombre</label>
					    <input type="text" class="form-control form-control-sm" id="nombre_con" name="nombre_con" required="true" value=""  >
				    </div>
				  </div>
				  <div class="mb-3 row">
				  	<div class="col-lg">
				    <label for="puesto_con" class="form-label">Puesto</label>
				    <input type="text" class="form-control form-control-sm" id="puesto_con" name="puesto_con" required="true" value=""  >
				    </div>
				  </div>
				  <div class="mb-3 row">
				  	<div class="col-lg">
				    <label for="email_con" class="form-label">Email</label>
				      <input type="email" class="form-control form-control-sm" id="email_con" name="email_con" required="true" value=""  >
				    </div>
				  
				   	<div class="col-lg-auto">
				    <label for="tel_con" class="form-label">Teléfono</label>
				      <input type="tel" class="form-control form-control-sm" id="tel_con" name="tel_con" required="true" maxlength="10" value="" pattern="[0-9]{10}"  style="width: 100px;">
				    </div>
				  </div>
			  </div>
		 
			  <div class="modal-footer alert-info">
			    <button type="submit" id="btnAgregar" class="btn btn-sm btn-primary btnUTCAzul">Agregar</button>
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			  </div>
		   </div>
 	 </div>
  </form>
</div>