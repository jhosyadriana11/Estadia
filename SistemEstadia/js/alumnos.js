
function alumno_agregar()
{
	var accion="alumno_agregar";
	$('#btn_'+accion).attr("disabled", true);
	
	var validate = document.getElementById("frm_"+accion);
	var form_data = new FormData(document.getElementById("frm_"+accion));	
	if(validate.checkValidity())
	{
		fetch('/estadia/alumnos/agregar/',{
			method:'POST',
			body: form_data
		})
		.then(function(res){
			return res.json();
		})
		.then(function(datos){
			if(datos==true)
			{
				$("#modal_"+accion).modal('hide');
				alert('Se agregó correctamente');
				location.reload();
			}
			else
			{
				alert("Error!");
			}
		});
	}
	else 
	{
		validate.reportValidity();
		$('#btn'+accion).attr("disabled", false);
	}
}


function alumno_actualizar()
{
	if(confirm("¿Quieres continuar con la actualización?"))
	{
		var objeto="alumno";
		var accion="actualizar";
		var fullaccion=objeto+"_"+accion;
			
		$('#btn_'+fullaccion).attr("disabled", true);
		
		var validate = document.getElementById("frm_"+fullaccion);
		var form_data = new FormData(document.getElementById("frm_"+fullaccion));	
		if(validate.checkValidity())
		{
			fetch('/estadia/'+objeto+'s/'+accion+'/',{
				method:'POST',
				body: form_data
			})
			.then(function(res){
				return res.json();
			})
			.then(function(datos){
				if(datos==true)
				{
					$("#modal_"+fullaccion).modal('hide');
					alert('Actualizado');
					location.reload();
				}
				else
				{
					alert("Error!");
				}
			});
		}
		else 
		{
			validate.reportValidity();
			$('#btn_'+fullaccion).attr("disabled", false);
		}
	}
}

function alumno_eliminar()
{
	if(confirm("¿Quieres continuar con la eliminación?"))
	{
		var objeto="alumno";
		var accion="eliminar";
		var fullaccion=objeto+"_"+accion;
		$('#btn_'+fullaccion).attr("disabled", true);
		
		var validate = document.getElementById("frm_"+fullaccion);
		var form_data = new FormData(document.getElementById("frm_"+fullaccion));	
		if(validate.checkValidity())
		{
			fetch('/estadia/'+objeto+'s/'+accion+'/',{
				method:'POST',
				body: form_data
			})
			.then(function(res){
				return res.json();
			})
			.then(function(datos){
				if(datos==true)
				{
					$("#modal_"+fullaccion).modal('hide');
					alert('Eliminado');
					location.reload();
				}
				else
				{
					alert("Error!");
				}
			});
		}
		else 
		{
			validate.reportValidity();
			$('#btn_'+fullaccion).attr("disabled", false);
		}
	}
}

function pago_registrar()
{
	var objeto="pago";
	var accion="registrar";
	var fullaccion=objeto+"_"+accion;
	
	if (((document.getElementById("pi_"+fullaccion).value == "SI") && ((document.getElementById("pif_"+fullaccion).value).trim() != ""))||(document.getElementById("pi_"+fullaccion).value == "NO")||(document.getElementById("pi_"+fullaccion).value == "CO"))
	{
		if(confirm("¿Quieres continuar?"))
		{
			$('#btn_'+fullaccion).attr("disabled", true);
			
			var validate = document.getElementById("frm_"+fullaccion);
			var form_data = new FormData(document.getElementById("frm_"+fullaccion));	
			if(validate.checkValidity())
			{
				fetch('/estadia/alumnos/'+fullaccion+'/',{
					method:'POST',
					body: form_data
				})
				.then(function(res){
					return res.json();
				})
				.then(function(datos){
					if(datos==true)
					{
						$("#modal_"+fullaccion).modal('hide');
						//alert('PagoRegistrado');
						location.reload();
					}
					else
					{
						alert("Error!");
					}
				});
			}
			else 
			{
				validate.reportValidity();
				$('#btn_'+fullaccion).attr("disabled", false);
			}
		}
	}else{
			document.getElementById("error_"+fullaccion).innerHTML="<hr><b>ERROR: </b>Información incompleta";
	}
}


function RequerirCampo(camporequerido, valor){
	if (valor=="DETENIDO") {
		$("#"+camporequerido).attr('required', 'required');
	}else{
		$("#"+camporequerido).removeAttr('required');
	};	
}
