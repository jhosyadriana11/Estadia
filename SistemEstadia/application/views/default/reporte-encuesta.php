
<?php
$objeto="encuesta";

?>
<div class="container-fluid mt-1">
	<div class="row">
		<div class="col">
			<div class="alert alert-info" >
				<div class="row">
					<div class="col-lg"> <h5>REPORTE <small>Encuesta</small></h5></div>
					<div class="col-lg-auto">
					  <div class="row">
					    <label for="ciclo-reporte-encuesta" class="col-sm-2 col-form-label pr-2">Ciclo</label>
					    <div class="col-sm-10">
					      <select id="ciclo-reporte-encuesta" class="form-control form-control-sm float-right " style="" onchange="obtener_reporte_encuestas(this.value);">
					      	<option value=""></option>
						  	<?php
						  	foreach($ciclos->result() as $row1):	
								?>
									<option value="<?php echo $row1->id_periodo."_".$row1->anio_periodo; ?>"><?php echo $row1->nombre_periodo." ".$row1->anio_periodo; ?></option>
								<?php
							endforeach;
							?>
						  </select>
					    </div>
					  </div>
					</div>
				</div>
			 
			  
			  <!--<button class="btn btn-sm btn-secondary float-right " style="position:relative; top: -30px;" onclick="imprimir_reporte(document.getElementById('proyectos_aa').innerHTML,'Proyectos',document.getElementById('info_extra').value);"><span class=""><i class="fas fa-sm fa-print"></i></span></button>-->
			</div>
		</div>
	</div>
	<div class="row pb-5 justify-content-center">
		<div class="col-sm-6 " id="reporte-encuesta-general">
			
		</div>
	</div>
</div>


