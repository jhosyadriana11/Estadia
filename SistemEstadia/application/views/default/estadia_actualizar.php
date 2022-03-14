<?php
	$objeto="estadia"; 
?>
<div class="modal fade" id="modalActualizar_<?php echo $objeto; ?>" tabindex="-1" role="dialog" aria-labelledby="modalActualizar_<?php echo $objeto; ?>" aria-hidden="true" >
	<form id="frmActualizar_<?php echo $objeto; ?>" method="post" enctype="multipart/form-data" action="javascript: actualizar_<?php echo $objeto; ?>('<?php echo $objeto; ?>');">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content " style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title">ACTUALIZAR <?php echo strtoupper($objeto); ?></h5>
			</div>
			 
				<input type="hidden" id="id_<?php echo $objeto; ?>_a" name="id_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->id; ?>" />
				<div class="modal-body ">
				   	<div class="mb-1 row p-2">
					    <label for="nombre_<?php echo $objeto; ?>_a" class="form-label">Nombre:</label>
					    <input type="text" class="form-control form-control-sm" id="nombre_<?php echo $objeto; ?>_a" name="nombre_<?php echo $objeto; ?>_a"  value="<?php echo $datosActuales->nombre; ?>"  >
					 </div>	
					 	  
				   	<div class="mb-1 row p-2">
					    <label for="descripcion_<?php echo $objeto; ?>_a" class="form-label">Descripción: </label>
					    <textarea class="form-control form-control-sm" id="descripcion_<?php echo $objeto; ?>_a" name="descripcion_<?php echo $objeto; ?>_a"  rows="5" style="width: 100%"><?php echo $datosActuales->descripcion; ?></textarea>
				  	</div>
				  	
				  	<div class="mb-1 row p-2">
					    <label for="objetivos_<?php echo $objeto; ?>_a" class="form-label">Objetivo(s): </label>
					    <textarea class="form-control form-control-sm" id="objetivos_<?php echo $objeto; ?>_a" name="objetivos_<?php echo $objeto; ?>_a" rows="5" style="width: 100%"><?php echo $datosActuales->objetivos; ?></textarea>
				  	</div>
				  	<div class="mb-1 row p-2">
				  		<div class="col">
				  			<div class="row">
				  				<div class="col">
									 <label for="fi_<?php echo $objeto; ?>_a" class="form-label">Fecha de Inicio:</label>
					   				 <input type="date" class="form-control form-control-sm" id="fi_<?php echo $objeto; ?>_a" name="fi_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->fi; ?>"  >				  					
				  				</div>
				  				<div class="col">
								    <label for="ff_<?php echo $objeto; ?>_a" class="form-label">Fecha de Término:</label>
								    <input type="date" class="form-control form-control-sm" id="ff_<?php echo $objeto; ?>_a" name="ff_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->ff; ?>"  >
								</div>
				  			</div>
				  		</div>
					   
					</div>
					<div class="mb-1 row p-2">
					    <label for="responsabilidades_<?php echo $objeto; ?>_a" class="form-label">Principales responsabilidades que asigna la empresa al alumno:</label>
					    <textarea class="form-control form-control-sm" id="responsabilidades_<?php echo $objeto; ?>_a" name="responsabilidades_<?php echo $objeto; ?>_a" rows="5" style="width: 100%"><?php echo $datosActuales->responsabilidades; ?></textarea>
				  	</div>	
				  	<div class="mb-1 row p-2">
					    <label for="autoridades_<?php echo $objeto; ?>_a" class="form-label">Autoridad que delega la empresa al alumno:</label>
					    <textarea class="form-control form-control-sm" id="autoridades_<?php echo $objeto; ?>_a" name="autoridades_<?php echo $objeto; ?>_a" rows="5" style="width: 100%"><?php echo $datosActuales->autoridades; ?></textarea>
				  	</div>
				  	
				  	<div class="mb-1 row p-2">
					    <label for="" class="form-label">Colaboración de otra persona:</label>
					    <input type="text" class="form-control form-control-sm" id="colaboracion1n_<?php echo $objeto; ?>_a" name="colaboracion1n_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion1n; ?>" placeholder="Nombre"  >
					    <input type="text" class="form-control form-control-sm" id="colaboracion1d_<?php echo $objeto; ?>_a" name="colaboracion1d_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion1d; ?>" placeholder="Departamento"  >
					    <input type="text" class="form-control form-control-sm" id="colaboracion1t_<?php echo $objeto; ?>_a" name="colaboracion1t_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion1t; ?>" placeholder="Tipo"  >					      
					</div>
					<div class="mb-1 row p-2">
					    <label for="" class="form-label">Colaboración de otra persona:</label>
					    <input type="text" class="form-control form-control-sm" id="colaboracion2n_<?php echo $objeto; ?>_a" name="colaboracion2n_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion2n; ?>" placeholder="Nombre"  >
					    <input type="text" class="form-control form-control-sm" id="colaboracion2d_<?php echo $objeto; ?>_a" name="colaboracion2d_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion2d; ?>" placeholder="Departamento"  >
					    <input type="text" class="form-control form-control-sm" id="colaboracion2t_<?php echo $objeto; ?>_a" name="colaboracion2t_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion2t; ?>" placeholder="Tipo"  >					      
					</div>
					<div class="mb-1 row p-2">
					    <label for="" class="form-label">Colaboración de otra persona:</label>
					    <input type="text" class="form-control form-control-sm" id="colaboracion3n_<?php echo $objeto; ?>_a" name="colaboracion3n_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion3n; ?>" placeholder="Nombre"  >
					    <input type="text" class="form-control form-control-sm" id="colaboracion3d_<?php echo $objeto; ?>_a" name="colaboracion3d_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion3d; ?>" placeholder="Departamento"  >
					    <input type="text" class="form-control form-control-sm" id="colaboracion3t_<?php echo $objeto; ?>_a" name="colaboracion3t_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion3t; ?>" placeholder="Tipo"  >					      
					</div>
					<div class="mb-1 row p-2">
					    <label for="" class="form-label">Colaboración de otra persona:</label>
					    <input type="text" class="form-control form-control-sm" id="colaboracion4n_<?php echo $objeto; ?>_a" name="colaboracion4n_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion4n; ?>" placeholder="Nombre"  >
					    <input type="text" class="form-control form-control-sm" id="colaboracion4d_<?php echo $objeto; ?>_a" name="colaboracion4d_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion4d; ?>" placeholder="Departamento"  >
					    <input type="text" class="form-control form-control-sm" id="colaboracion4t_<?php echo $objeto; ?>_a" name="colaboracion4t_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion4t; ?>" placeholder="Tipo"  >					      
					</div>
					<div class="mb-1 row p-2">
					    <label for="" class="form-label">Colaboración de otra persona:</label>
					    <input type="text" class="form-control form-control-sm" id="colaboracion5n_<?php echo $objeto; ?>_a" name="colaboracion5n_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion5n; ?>" placeholder="Nombre"  >
					    <input type="text" class="form-control form-control-sm" id="colaboracion5d_<?php echo $objeto; ?>_a" name="colaboracion5d_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion5d; ?>" placeholder="Departamento"  >
					    <input type="text" class="form-control form-control-sm" id="colaboracion5t_<?php echo $objeto; ?>_a" name="colaboracion5t_<?php echo $objeto; ?>_a" value="<?php echo $datosActuales->colaboracion5t; ?>" placeholder="Tipo"  >					      
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