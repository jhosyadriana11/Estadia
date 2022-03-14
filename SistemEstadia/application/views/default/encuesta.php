
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
		<link  rel="icon" href="/img/logo-legacy.png" type="image/png" />
		<meta name="description" content="">
		 <!-- Required meta tags -->
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <style>
	    	label {
	    		font-size: 14px;
	    	}
	    </style>
	    
		<!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 		
 		<script>
 			function agregar_encuesta(objeto,accion)
			{
				$('#btn_'+objeto+'_'+accion).attr("disabled", true);
				$('#btn_'+objeto+'_'+accion).attr("value", "...");
				
				var validate = document.getElementById("frm_"+objeto+'_'+accion);
				var form_data = new FormData(document.getElementById("frm_"+objeto+'_'+accion));	
	
				if(validate.checkValidity())
				{
					fetch('/estadia/estadias/agregar_encuesta/'+objeto+'/'+accion,{
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
					$('#btn_'+objeto+'_'+accion).attr("disabled", false);
				}
			}

			function validar(campo,rowcampoporque,textporque)
			{
				document.getElementById(rowcampoporque).style.display="none";
				document.getElementById(rowcampoporque).value="";
				$('#'+textporque).removeAttr("required");
				
				if (campo==0)
				{
					document.getElementById(rowcampoporque).style.display="block";
					$('#'+textporque).prop("required", true);
				}
			}
 		</script>
  	</head>

<body>

	<div class="justify-content-center">			
			
				<?php
				if ($filas_encuestas<1) {
					
				$option='<option value="" selected="true"></option>
			    		<option value="5">EXCELENTE</option>
			    		<option value="4">MUY BIEN</option>
			    		<option value="3">BIEN</option>
			    		<option value="2">REGULAR</option>
			    		<option value="1">MAL</option>';
				
				$option2='<option value="" selected="true"></option>
			    		<option value="1">SI</option>
			    		<option value="0">NO</option>';
							    		
				?>
				<form id="frm_<?php echo $objeto; ?>_<?php echo $accion; ?>" method="post" enctype="multipart/form-data" action="javascript: agregar_encuesta('<?php echo $objeto; ?>','<?php echo $accion; ?>');">
				  <div class="modal-dialog modal-lg p-1 rounded" role="document" style="background: linear-gradient(180deg, rgb(0,4,40), rgb(0,78,146 ));">
				    <div id="" class="modal-content" style="">
						<div class="modal-header alert-info" >
							<img src="/img/logo-legacy.png" class="img col-lg-auto d-none d-lg-block" style="width: 100px;"  />
							<div class="col">
								<h5 class="modal-title">
									<small>UNIVERSIDAD TECNOLÓGICA DE CALVILLO</small>
								</h5>
								<h5 class="modal-title"><?php echo strtoupper($objeto); ?> DE ASESOR(A) ACADÉMICO(A) DE ESTADÍA
									<input type="hidden" id="proyecto_id_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="proyecto_id_<?php echo $objeto; ?>_<?php echo $accion; ?>" value="<?php echo $datos_proyecto->id; ?>" >
									<input type="hidden" value="<?php echo $filas_encuestas; ?>" />
								</h5>
							</div>
							
							
						</div>
						
						<div class="modal-body ">
							
							<div class="row">
						   		<div class="col">
						   			<h6 class="text-success">ASESOR(A) ACADÉMICO(A): <small><?php echo $datos_proyecto->aa_nivelaca.". ".$datos_proyecto->aa_nombre; ?></small></h6>
						   			<p style="font-size: 14px;text-align: justify;">Selecciona una opción de la derecha según corresponda a la pregunta de la izquierda:</p>
						   		</div>
						   	</div>
						   	<hr> <!-------------------------------------------->
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">1. ¿Cómo consideras a tu asesor(a) en cuanto a la puntualidad de las sesiones semanales?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="1p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="1p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   					   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">2. ¿Cómo consideras la calidad de las sesiones semanales?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto" >
						   			<select id="2p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="2p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">3. ¿Como consideras la capacidad para de tu asesor(a) para guiar tu trabajo teórico?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="3p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="3p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">4. ¿Cómo consideras el conocimiento que mostró tu asesor(a) para estructurar textos, contenidos y redacción?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="4p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="4p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">5. ¿Cómo consideras la actitud profesional de tu asesor(a) durante tu proceso de estadías?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="5p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="5p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">6. ¿Cómo consideras la disponibilidad de tu asesor(a) para guiarte en este proceso?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="6p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="6p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">7. ¿Cómo consideras que la comunicación con tu asesor(a)?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="7p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="7p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">8. ¿Cómo consideras la disposición de tu asesor(a) para atender tus dudas?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="8p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="8p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">9. ¿Cómo consideras la disposición de tu asesor(a) para escucharte?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="9p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="9p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">10. ¿Cómo consideras el respeto que te mostró tu asesor(a)?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="10p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="10p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">11. ¿Cómo te pareció la ayuda que te brindó tu asesor(a) sobre la orientación para realizar gestiones y trámites?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="11p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="11p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">12. ¿Cómo consideras la capacidad de tu asesor(a) para guiar tu trabajo práctico?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="12p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="12p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">13. En general, ¿cómo fué el desempeño de tu asesor(a)?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="13p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="13p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
					   		<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">14. ¿Cómo consideras que el trabajo de tu asesor(a) te ayudó para concretar tu estadía?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="14p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="14p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
		
						   	
						   	<hr> <!-------------------------------------------->
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">15. ¿Tu asesor(a) académico(a) en conjunto con tu asesor(a) empresarial determinaron el nombre de tu proyecto?   </label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="15p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="15p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option2; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">16. ¿Tu asesor(a) estableció comunicación con tu asesor(a) empresarial?   </label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="16p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="16p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option2; ?>
							    	</select>
						   		</div>
						   	</div>
						   		<div class="row p-1 ">
						   		<div class="col-lg col-sm">
						   			<label class="">17. ¿Tu proyecto de estadía se realizó conforme a lo establecido desde un inicio?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="17p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="17p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<?php echo $option2; ?>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	
						   	<div class="row p-1">
						   		<div class="col-lg col-sm">
						   			<label class="">18. ¿Cuántas visitas realizó tu asesor(a) a la empresa?   </label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="18p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="18p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="">    		
							    		<option value="" selected="true"></option>
							    		<option value="0">0</option>
							    		<option value="1">1</option>
							    		<option value="2">2</option>
							    		<option value="3">3</option>
							    		<option value="4">4</option>
							    		<option value="5">5</option>
							    	</select>
						   		</div>
						   	</div>
						   	
						   	<hr> <!-------------------------------------------->
						   	
						   	<div class="row p-1 ">
						   		<div class="col-lg col-sm">
						   			<label class="">19. ¿Recomendarías a tu asesor(a) para futuras estadías?</label>
						   		</div>
						   		<div class="col-lg-auto col-sm-auto">
						   			<select id="19p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="19p_<?php echo $objeto; ?>_<?php echo $accion; ?>" required="true" class="form-control form-control-sm criterio" onchange="validar(this.value,'porque19','19pj_<?php echo $objeto; ?>_<?php echo $accion; ?>');">    		
							    		<?php echo $option2; ?>
							    	</select>
							   	</div>
						   	</div>
						   	<div class="row p-1 " id="porque19" style="display:none;">
						   		<div class="col-lg col-sm">
						   			<label class="">¿Por qué?</label>
							    	<textarea id="19pj_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="19pj_<?php echo $objeto; ?>_<?php echo $accion; ?>" style="width: 100%; height: 100px;" class="form-control form-control-sm criterio"></textarea>
						   		</div>
						   	</div>
						   	
						   	<div class="row p-1 ">
						   		<div class="col-lg col-sm">
						   			<label class="">20. Observaciones generales o comentarios extras</label>
						   			<textarea id="20p_<?php echo $objeto; ?>_<?php echo $accion; ?>" name="20p_<?php echo $objeto; ?>_<?php echo $accion; ?>" style="width: 100%; height: 100px;" class="form-control form-control-sm criterio"></textarea>
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
		<h2>¡Ya haz realizado la encuesta y con tus respuestas mejoraremos!</h2>
		<h5>Gracias</h5>
		</div>
		<?php
	}
	?>
	</div>
</body>
</html>