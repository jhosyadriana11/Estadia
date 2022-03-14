
<?php
$accion="agregar";


/*foreach($semana_ultima->result() as $row2):
	$semana_ultima_registrada=$row2->semana_ultima;
endforeach*/
						
?>

<div class="modal fade" id="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $objeto; ?>_<?php echo $accion; ?>" aria-hidden="true" >
	<form id="frm_<?php echo $objeto; ?>_<?php echo $accion; ?>" method="post" enctype="multipart/form-data" action="javascript: <?php echo $objeto; ?>_<?php echo $accion; ?>('<?php echo $objeto; ?>','<?php echo $accion; ?>');">
	  <div class="modal-dialog modal-lg p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
	    <div id="" class="modal-content" style="">
			<div class="modal-header alert-info" >
				<h5 class="modal-title">NUEVA <?php echo strtoupper($objeto); ?>
					<input type="hidden" id="proyecto_id_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="proyecto_id_<?php echo $objeto; ?>_<?php echo $accion; ?>" value="<?php echo $proyecto_id; ?>" >
				</h5>
			</div>
			
			<div class="modal-body ">
				<div class="row justify-content-end mb-3">
					<div class="col-lg-auto">
					    <label style="font-size: 14px;" for="periodo_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="form-label ">Periodo</label>
				    	<select id="periodo_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="periodo_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control-sm" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<?php
				    		$meses_nombre = array('01' =>'ENERO' , '02' =>'FEBRERO','03' =>'MARZO','04' =>'ABRIL','05' =>'MAYO','06' =>'JUNIO','07' =>'JULIO','08' =>'AGOSTO','09' =>'SEPTIEMBRE','10' =>'OCTUBRE','11' =>'NOVIEMBRE','12' =>'DICIEMBRE');
							$meses=explode(",",$meses->month_num);
				    		for ($i=0; $i < 3; $i++) { 
								?><option value="<?php echo ($i+1).'.'.$meses_nombre[$meses[$i]]; ?>"><?php echo $meses_nombre[$meses[$i]]; ?></option><?php
							}
							?>
				    	</select>
			    	</div>
				</div>
				<div class="row">
			   		<div class="col">
			   			<p style="font-size: 14px;text-align: justify;">Marque el Nivel de Competencia Alcanzado para cada uno de los criterios, considerando que NC es el valor más bajo y CA es el valor más alto.</p>
			   			<p style="font-size: 12px;text-align: center;"><b>NA</b> = No Aplica, <b>NC</b> = No Competente, <b>CO</b> = Competente, <b>CD</b> = Competente Destacado, <b>CA</b> = Competente Autónomo</p>
			   		</div>
			   	</div>
			   	
			   	<div class="row">
			   		<div class="col-lg text-center bg-secondary text-white ">
			   			Criterio
			   		</div>
			   		<div class="col-lg text-center bg-secondary text-white ">
			   			NCA
			   		</div>
			   	</div>
			   	<div class="row ">
			   		<div class="col-lg text-center bg-light border mb-2">
			   			Conocimientos y Habilidades
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-lg">
			   			<label class="">1. Conocimientos técnicos</label>
			   		</div>
			   		<div class="col-lg-auto">
			   			<select id="1e_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="1e_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<option value="0">NA</option>
				    		<option value="1">NC</option>
				    		<option value="2">CO</option>
				    		<option value="3">CD</option>
				    		<option value="4">CA</option>
				    	</select>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-lg">
			   			<label class="">2. Desenvolvimiento laboral</label>
			   		</div>
			   		<div class="col-lg-auto">
			   			<select id="2e_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="2e_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<option value="0">NA</option>
				    		<option value="1">NC</option>
				    		<option value="2">CO</option>
				    		<option value="3">CD</option>
				    		<option value="4">CA</option>
				    	</select>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-lg">
			   			<label class="">3. Trabajo en equipo</label>
			   		</div>
			   		<div class="col-lg-auto">
			   			<select id="3e_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="3e_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<option value="0">NA</option>
				    		<option value="1">NC</option>
				    		<option value="2">CO</option>
				    		<option value="3">CD</option>
				    		<option value="4">CA</option>
				    	</select>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-lg">
			   			<label class="">4. Avance de proyecto</label>
			   		</div>
			   		<div class="col-lg-auto">
			   			<select id="4e_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="4e_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<option value="0">NA</option>
				    		<option value="1">NC</option>
				    		<option value="2">CO</option>
				    		<option value="3">CD</option>
				    		<option value="4">CA</option>
				    	</select>
			   		</div>
			   	</div>
			   	
			   	<div class="row border mb-2">
			   		<div class="col-lg text-center bg-light">
			   			Actitudes y Valores
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-lg">
			   			<label class="">5. Presentación de personal</label>
			   		</div>
			   		<div class="col-lg-auto">
			   			<select id="5e_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="5e_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<option value="0">NA</option>
				    		<option value="1">NC</option>
				    		<option value="2">CO</option>
				    		<option value="3">CD</option>
				    		<option value="4">CA</option>
				    	</select>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-lg">
			   			<label class="">6. Asistencia y puntualidad</label>
			   		</div>
			   		<div class="col-lg-auto">
			   			<select id="6e_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="6e_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<option value="0">NA</option>
				    		<option value="1">NC</option>
				    		<option value="2">CO</option>
				    		<option value="3">CD</option>
				    		<option value="4">CA</option>
				    	</select>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-lg">
			   			<label class="">7. Respeto</label>
			   		</div>
			   		<div class="col-lg-auto">
			   			<select id="7e_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="7e_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<option value="0">NA</option>
				    		<option value="1">NC</option>
				    		<option value="2">CO</option>
				    		<option value="3">CD</option>
				    		<option value="4">CA</option>
				    	</select>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-lg">
			   			<label class="">8. Disposición</label>
			   		</div>
			   		<div class="col-lg-auto">
			   			<select id="8e_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="8e_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<option value="0">NA</option>
				    		<option value="1">NC</option>
				    		<option value="2">CO</option>
				    		<option value="3">CD</option>
				    		<option value="4">CA</option>
				    	</select>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-lg">
			   			<label class="">9. Iniciativa</label>
			   		</div>
			   		<div class="col-lg-auto">
			   			<select id="9e_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="9e_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<option value="0">NA</option>
				    		<option value="1">NC</option>
				    		<option value="2">CO</option>
				    		<option value="3">CD</option>
				    		<option value="4">CA</option>
				    	</select>
			   		</div>
			   	</div>
			   	<div class="row">
			   		<div class="col-lg">
			   			<label class="">10. Responsabilidad</label>
			   		</div>
			   		<div class="col-lg-auto">
			   			<select id="10e_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="10e_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<option value="0">NA</option>
				    		<option value="1">NC</option>
				    		<option value="2">CO</option>
				    		<option value="3">CD</option>
				    		<option value="4">CA</option>
				    	</select>
			   		</div>
			   	</div>
				<div class="row">
			   		<div class="col-lg">
			   			<label class="">11. Orden y disciplina</label>
			   		</div>
			   		<div class="col-lg-auto">
			   			<select id="11e_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="11e_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
				    		<option value="" selected="true"></option>
				    		<option value="0">NA</option>
				    		<option value="1">NC</option>
				    		<option value="2">CO</option>
				    		<option value="3">CD</option>
				    		<option value="4">CA</option>
				    	</select>
			   		</div>
			   	</div>
			   	
			   	<div class="row border mb-2">
			   		<div class="col-lg text-center bg-light">
			   			Fortalezas
			   		</div>
			   		<div class="col-lg text-center bg-light">
			   			Áreas de mejora
			   		</div>
			   	</div>
			   	<div class="row mb-2">
			   		<div class="col-lg">
			   			<textarea class="form-control form-control-sm" id="fortaleza_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="fortaleza_<?php echo $objeto; ?>_<?php echo $accion; ?>" rows="4" ></textarea>
			   		</div>
			   		<div class="col-lg">
			   			<textarea class="form-control form-control-sm" id="mejora_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="mejora_<?php echo $objeto; ?>_<?php echo $accion; ?>" rows="4"></textarea>
			   		</div>
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