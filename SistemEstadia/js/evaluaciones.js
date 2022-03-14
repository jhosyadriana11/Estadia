function mostrar_modal_nueva_evaluacion(objeto,id)
{
	$.get("/estadia/evaluaciones/modalNuevo/"+objeto+"/"+id, function(html) {
		$("#modal_").empty();
		$(html).appendTo('#modal_').modal();
		//setTimeout("$('.focus').focus()", 500);
		/*$('#modal_').on('shown.bs.modal', function (e) {
			$('.focus').focus();
		});*/
	});
}

function evaluacion_agregar(objeto,accion)
{
	$('#btn_'+objeto+'_'+accion).attr("disabled", true);
	$('#btn_'+objeto+'_'+accion).attr("value", "...");
	
	var validate = document.getElementById("frm_"+objeto+'_'+accion);
	var form_data = new FormData(document.getElementById("frm_"+objeto+'_'+accion));	
	
	var criterios=document.getElementsByClassName("criterio").length;
	
	if(validate.checkValidity())
	{
		fetch('/estadia/'+objeto+'es/agregar/'+objeto+'/'+accion+'/'+criterios,{
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
				//alert('Se agregó correctamente');
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

function imprimir_f3(proyecto_id,evaluacion_id)
{
	$.ajax({
        url : '/estadia/evaluaciones/imprimir/'+proyecto_id+'/'+evaluacion_id,
       data : "",
        //method : 'post', //en este caso
        //dataType : 'json',
        success : function(response){
            //alert("funciona bien");
            newWin= window.open("","");
		    newWin.document.write(response);
		    //myvar=window.setTimeout(imprimirformato, 500);
        },
        error: function(error){
            alert("No funciona");
        }
       
    });
    
}

function reenviar_correo_evaluacion(id)
{
	document.getElementById('btn_rce_'+id).style.display="none";
	document.getElementById('fade').classList.add('fade-in');
	document.getElementById('fade').classList.remove('fade-out');
	
	fetch('/estadia/evaluaciones/reenviar_correo_evaluacion/'+id,{
		method:'POST',
		body:null
	})
	.then(function(res){
		return res.json();
	})
	.then(function(datos){
		if(datos.indexOf("***OK***")>=0)
		{
			alert("MENSAJE:\nCorreo Enviado correctamente al Asesor Empresarial");
			
		}
		else
		{
			alert("Error:\n"+datos);
		}
		document.getElementById('btn_rce_'+id).style.display="inline";
		document.getElementById("fade").classList.remove("fade-in");
		document.getElementById("fade").classList.add("fade-out");
	});
	
}

