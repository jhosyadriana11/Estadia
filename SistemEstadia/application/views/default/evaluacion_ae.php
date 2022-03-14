
<?php
$accion="enviar";


/*foreach($semana_ultima->result() as $row2):
	$semana_ultima_registrada=$row2->semana_ultima;
endforeach*/
						
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Estadías UTC</title>
		<link rel="shortcut icon" href="http://www.utcalvillo.edu.mx/Icono.ico">
		<meta name="description" content="">
		
		 <!-- Required meta tags -->
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 		
 		<script>
 			function agregar_evaluacion_ae(objeto,accion)
			{
				$('#btn_'+objeto+'_'+accion).attr("disabled", true);
				$('#btn_'+objeto+'_'+accion).attr("value", "...");
				
				var validate = document.getElementById("frm_"+objeto+'_'+accion);
				var form_data = new FormData(document.getElementById("frm_"+objeto+'_'+accion));	
				
				var criterios=document.getElementsByClassName("criterio").length;
				
				if(validate.checkValidity())
				{
					fetch('/estadia/'+objeto+'es/agregar_evaluacion_ae/'+objeto+'/'+accion+'/'+criterios,{
						method:'POST',
						body: form_data
					})
					.then(function(res){
						return res.json();
					})
					.then(function(datos){
						if(datos.indexOf("***OK***")>=0)
						{
							/*$("#modal_"+objeto+'_'+accion).modal('hide');*/
							alert('Mensaje:\nSe agregó correctamente, se cerrará la ventana. Gracias');
							window.close();
						}
						else
						{
							alert("Error:\n"+datos);
							$('#btn_'+objeto+'_'+accion).attr("disabled", false);
							$('#btn_'+objeto+'_'+accion).attr("value", "Enviar");
						}
					});
				}
				else 
				{
					validate.reportValidity();
					$('#btn'+objeto+'_'+accion).attr("disabled", false);
				}
			}

 		</script>
  	</head>

<body>
	<div id="modal">
		<?php
		if ($datos_evaluacion->nc_ae_evaluacion=="NO") {
			
		
		?>
		<form id="frm_<?php echo $objeto; ?>_<?php echo $accion; ?>" method="post" enctype="multipart/form-data" action="javascript: agregar_evaluacion_ae('<?php echo $objeto; ?>','<?php echo $accion; ?>');">
		  <div class="modal-dialog modal-lg p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
		    <div id="" class="modal-content" style="">
				<div class="modal-header alert-info" >
					<h5 class="modal-title"><?php echo strtoupper($objeto); ?> DE PERIODO DE ESTADÍA
						<input type="hidden" id="evaluacion_id_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="evaluacion_id_<?php echo $objeto; ?>_<?php echo $accion; ?>" value="<?php echo $datos_evaluacion->id; ?>" >
						<input type="hidden" id="random_id_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="random_id_<?php echo $objeto; ?>_<?php echo $accion; ?>" value="<?php echo $datos_evaluacion->nc_idrandom; ?>" >
					</h5>
				</div>
				
				<div class="modal-body ">
					
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
				    <input type="submit" id="btn_<?php echo $objeto; ?>_<?php echo $accion; ?>" class="btn btn-sm btn-primary btnUTCAzul" value="Enviar">
			  	</div>
		   	</div>
	 	 </div>
	  </form>
	  
	  <?php
	  }
	else
	{
		?>
		<br><br>
		<div class="alert alert-warning" role="alert" align="center" style="width: 100%;">
		<h2>Ya está evaluado el periodo.</h2>
		<h5>Gracias</h5>
		</div>
		<?php
	}
	?>
	</div>
</body>
</html>