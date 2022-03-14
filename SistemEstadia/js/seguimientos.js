function mostrar_modal_nuevo_seguimiento(objeto,id)
{
	$.get("/estadia/seguimientos/modalNuevo/"+objeto+"/"+id, function(html) {
		$("#modal_").empty();
		$(html).appendTo('#modal_').modal();
		//setTimeout("$('.focus').focus()", 500);
		/*$('#modal_').on('shown.bs.modal', function (e) {
			$('.focus').focus();
		});*/
	});
}

function agregar_seguimiento(objeto,accion)
{
	$('#btn_'+objeto+'_'+accion).attr("disabled", true);
	$('#btn_'+objeto+'_'+accion).attr("value", "...");
	
	var validate = document.getElementById("frm_"+objeto+'_'+accion);
	var form_data = new FormData(document.getElementById("frm_"+objeto+'_'+accion));	
	if(validate.checkValidity())
	{
		fetch('/estadia/seguimientos/agregar/'+objeto+'/'+accion,{
			method:'POST',
			body: form_data
		})
		.then(function(res){
			return res.json();
		})
		.then(function(datos){
			if(datos.indexOf("***OK***")>=0)
			{
				$("#modal_"+objeto+'_'+accion).modal('hide');
				var MensajeExtra=(datos.trim()).substring(9);
				if (MensajeExtra!="")
				{
					alert("MENSAJE:\n"+MensajeExtra);
				}
				location.reload();
			}
			else
			{
				alert("Error:\n"+datos);
				$('#btn_'+objeto+'_'+accion).attr("disabled", false);
				$('#btn_'+objeto+'_'+accion).attr("value", "Agregar");
			}
		});
	}
	else 
	{
		validate.reportValidity();
		$('#btn'+objeto+'_'+accion).attr("disabled", false);
	}
}

function reenviar_correo_conformidad(id_seguimiento)
{
	document.getElementById('btn_rcc_'+id_seguimiento).style.display="none";
	
	document.getElementById('fade').classList.add('fade-in');
	document.getElementById('fade').classList.remove('fade-out');
	/*$('#fade').removeClass("fade-out");
	$('#fade').addClass("fade-in");*/
	fetch('/estadia/seguimientos/reenviar_correo_conformidad/'+id_seguimiento,{
		method:'POST',
		body:null
	})
	.then(function(res){
		return res.json();
	})
	.then(function(datos){
		if(datos.indexOf("***OK***")>=0)
		{
			alert("MENSAJE:\nSe envió correctamente el correo.");
			//location.reload();
		}
		else
		{
			alert("Error:\n"+datos);
			
		}
		document.getElementById('btn_rcc_'+id_seguimiento).style.display="inline";
		document.getElementById("fade").classList.remove("fade-in");
		document.getElementById("fade").classList.add("fade-out");
	});
	
}