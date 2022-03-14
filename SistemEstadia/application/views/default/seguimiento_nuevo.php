
<?php
$accion="agregar";

$semana_ultima_registrada = (isset($semana_ultima->registrada)) ? $semana_ultima->registrada : '0' ;
$semana_ultima_firmada = (isset($semana_ultima->firmada)) ? $semana_ultima->firmada : '0' ;
//$semana_ultima_registrada=$semana_ultima->registrada;
//$semana_ultima_firmada=$semana_ultima->firmada;

/*foreach($semana_ultima->result() as $row2):
	$semana_ultima_registrada=$row2->semana_ultima;
	$semana_ultima_firmada=$row2->semana_ultima_firmada;
endforeach;*/

if (($semana_ultima_registrada<=2)||($semana_ultima_registrada>2 && $semana_ultima_firmada=='SI')) 
{
					
?>

<div class="modal fade" id="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" aria-hidden="true" >
	<form id="frm_<?php echo $objeto; ?>_<?php echo $accion; ?>" method="post" enctype="multipart/form-data" action="javascript: <?php echo $accion; ?>_<?php echo $objeto; ?>('<?php echo $objeto; ?>','<?php echo $accion; ?>');">
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title">NUEVO <?php echo strtoupper($objeto); ?>
					<input type="hidden" name="proyecto_id_<?php echo $objeto; ?>_<?php echo $accion; ?>" value="<?php echo $proyecto_id; ?>" >
				</h5>
			</div>
			
			<div class="modal-body ">
			   	<div class="mb-3 row ">
			   		<div class="col-auto p-0 m-0">
					    <label for="semana_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Semana</label> 
				    	<select id="semana_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="semana_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<?php 
				    		
							
								
				    		for ($i=($semanas->semana-1); $i <= $semanas->semana; $i++) {
								//if (($i==$semanas->semana)||(($semanas->semana-1)>$semana_ultima_registrada) && ($i<=$semana_ultima_registrada)) {
								if ($i>$semana_ultima_registrada){
									if (($_SESSION['utc_usuario']=="DENIS.MARTINEZ" || $_SESSION['utc_usuario']=="ALEJANDRO.DELGADO") && date("Y-m-d")<="2022-02-18")
									{
										 ?><option value="3" selected>3</option><?php
									}
									
									if (($_SESSION['utc_usuario']=="LUZ.ZAMORA" ) && date("Y-m-d")<="2022-02-18")
									{
										 ?><option value="3" selected>3</option><?php
										 ?><option value="4" selected>4</option><?php
									}
									
									if (($_SESSION['utc_usuario']=="SILVESTRE.LUNA") && date("Y-m-d")<="2022-02-18")
									{
										 ?><option value="3" selected>3</option><?php
										 ?><option value="4" selected>4</option><?php
										 ?><option value="5" selected>5</option><?php
									}
									
									if (($_SESSION['utc_usuario']=="DIANA.MONTOYA") && date("Y-m-d")<="2022-02-25")
									{
										 ?><option value="4" selected>4</option><?php
										 ?><option value="5" selected>5</option><?php
									}
									
									?><option value="<?php echo $i; ?>" ><?php echo $i; ?></option><?php
									
									break;
								}
							}
							
							 
								
				    		/*foreach($semanas->result() as $row1):
								?><option value="<?php echo $row1->semana; ?>" ><?php echo $semana_ultima_registrada.'- '.$row1->semana; ?></option><?php
								/*if ($semana_ultima_registrada<=15 AND (($semana_ultima_registrada+1)<= $semanas->semana))) {
									?><option value="<?php echo $row1->semana; ?>" ><?php echo $semana_ultima_registrada.'- '.$row1->semana; ?></option><?php
								}
							endforeach*/
							
							/*if (($semana_ultima_registrada<=15) AND (($semana_ultima_registrada+1)<= $semanas->semana)) {
								if ($semanas->semana>1) {
									?><option value="<?php echo $semanas->semana-1; ?>" ><?php echo $semanas->semana-1; ?></option><?php
								}
								?><option value="<?php echo $semanas->semana; ?>" ><?php echo $semanas->semana; ?></option><?php
							}*/
							
							
							?>
				    	</select>
			    	</div>
			    	<div class="col m-0 pl-2 p-0">
			    		<label for="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Estatus del Seguimiento</label>
				    	<select id="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="estatus_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm" onchange="">
				    		
				    		<?php 
				    		foreach($estatus->result() as $row2):
								?><option value="<?php echo $row2->id; ?>"><?php echo $row2->id.". ".$row2->descripcion; ?></option><?php
							endforeach
							?>
				    	</select>
			    	</div>
				 </div>
				 
				  <div class="mb-3 row" style=" ">
				    <label for="ap_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Actividades Programadas</label>
				    <textarea class="form-control form-control-sm" id="ap_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="ap_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" rows="5" style="width: 100%"></textarea>
				  </div>
				  
				  <div class="mb-3 row">
				    <label for="ar_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Actividades Realizadas</label>
				    <textarea class="form-control form-control-sm" id="ar_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="ar_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" rows="5" style="width: 100%"></textarea>
				  </div>
				  
				  <div class="mb-3 row">
				    <label for="obs_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label">Observaciones del Asesor</label>
				    <textarea class="form-control form-control-sm" id="obs_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="obs_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" rows="5" style="width: 100%"></textarea>
				  </div>
				
			  </div>
		 
			  <div class="modal-footer alert-info">
			    <input type="submit" id="btn_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="btn btn-sm btn-primary btnUTCAzul" value="Agregar">
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			  </div>
		   </div>
 	 </div>
  </form>
</div>
<?php
	
}	
else
{
	
?>
	<div class="modal fade" id="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" aria-hidden="true" >	
	  <div class="modal-dialog p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title">NUEVO <?php echo strtoupper($objeto); ?></h5>
			</div>
			
			<div class="modal-body ">
			   	<div class="alert alert-warning" role="alert">
				  El último seguimiento despúes de la semana 2 no tiene <b>firma de conformidad</b> del alumno.<br><br>Revisa que el correo del alumno sea correcto, reenvíale el correo para su firma y
				  pide al Alumno accesar a su correo y firmar en el correo del Sistema de Estadías.
				  <br><br>
				  Solo teniendo firmado el último seguimiento firmado de conformidad por el alumno se podrá continuar con el siguiente seguimiento.
				</div>
			</div>
		 
			<div class="modal-footer alert-info">
			    <button class="btn btn-sm btn-secondary btnUTCCancelar" data-dismiss="modal">Regresar</button>
			</div>
		</div>
 	  </div>
    </div>
<?php
}
?>
