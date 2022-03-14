function agregar_proyecto(objeto)
{
	$('#btnAgregar_'+objeto).attr("disabled", true);
	
	var validate = document.getElementById("frmAgregar_"+objeto);
	var form_data = new FormData(document.getElementById("frmAgregar_"+objeto));	
	if(validate.checkValidity())
	{
		fetch('/estadia/'+objeto+'s/agregar/',{
			method:'POST',
			body: form_data
		})
		.then(function(res){
			return res.json();
		})
		.then(function(datos){
			if(datos==true)
			{
				$("#modalAgregar_"+objeto).modal('hide');
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
		$('#btnAgregar_'+objeto).attr("disabled", false);
	}
}

function actualizar_proyecto(objeto)
{
	$('#btnActualizar_'+objeto).attr("disabled", true);
	
	var validate = document.getElementById("frmActualizar_"+objeto);
	var form_data = new FormData(document.getElementById("frmActualizar_"+objeto));	
	if(validate.checkValidity())
	{
		fetch('/estadia/'+objeto+'s/actualizar/'+objeto,{
			method:'POST',
			body: form_data
		})
		.then(function(res){
			return res.json();
		})
		.then(function(datos){
			if(datos==true)
			{
				$("#modalActualizar_"+objeto).modal('hide');
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
		$('#btnActualizar_'+objeto).attr("disabled", false);
	}
}

function eliminar_proyecto(objeto)
{
	if (confirm("¿Quieres continuar con la Eliminación?"))
	{
		$('#btn_eliminar'+objeto).attr("disabled", true);
		
		var validate = document.getElementById("frm_eliminar_"+objeto);
		var form_data = new FormData(document.getElementById("frm_eliminar_"+objeto));	
		if(validate.checkValidity())
		{
			fetch('/estadia/'+objeto+'s/eliminar/'+objeto,{
				method:'POST',
				body: form_data
			})
			.then(function(res){
				return res.json();
			})
			.then(function(datos){
				if(datos==true)
				{
					$("#modal_eliminar_"+objeto).modal('hide');
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
			$('#btn_eliminar_'+objeto).attr("disabled", false);
		}
	}
}

function proyecto_autorizar(objeto)
{
	if ($('#estatus_'+objeto+'_autorizar').val()=="6" && (document.getElementById('obs_'+objeto+'_autorizar').value).trim()=="") {
		document.getElementById('caa_'+objeto+'_autorizar').value="0";
		alert("Si cancelas, tienes que poner motivo de cancelación.");
		return false;
	};
	
	if ($('#estatus_'+objeto+'_autorizar').val()=="2" && (document.getElementById('caa_'+objeto+'_autorizar').value).trim()<1) {
		alert("Falta registrar los alumnos autorizados para el proyecto.");
		return false;
	};
	
	$('#btn_'+objeto+'_autorizar').attr("disabled", true);
	
	var validate = document.getElementById("frm_"+objeto+"_autorizar");
	var form_data = new FormData(document.getElementById("frm_"+objeto+"_autorizar"));	
	if(validate.checkValidity())
	{
		fetch('/estadia/'+objeto+'s/autorizar/'+objeto,{
			method:'POST',
			body: form_data
		})
		.then(function(res){
			return res.json();
		})
		.then(function(datos){
			if(datos==true)
			{
				$("#modal_"+objeto+"_autorizar").modal('hide');
				alert('Cambios Guardados');
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
		$('#btn_'+objeto+'_autorizar').attr("disabled", false);
	}
}

function alumno_asignar()
{
	var objeto="alumno";
	var accion="asignar";
	
	//if (document.getElementById('alumno_'+objeto+'_'+accion).value!="")
	//{
		$('#btn_'+objeto+'_'+accion).attr("disabled", true);
		
		var validate = document.getElementById("frm_"+objeto+'_'+accion);
		var form_data = new FormData(document.getElementById("frm_"+objeto+'_'+accion));	
		if(validate.checkValidity())
		{
			fetch('/estadia/proyectos/'+objeto+'_'+accion,{
				method:'POST',
				body: form_data
			})
			.then(function(res){
				return res.json();
			})
			.then(function(datos){
				if(datos==true)
				{
					$("#modal_"+objeto+'_'+accion).modal('hide');
					//alert('Cambios Guardados');
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
			$('#btn_'+objeto+'_'+accion).attr("disabled", false);
		}
	//}else{
		//alert("Falta Información para procesarla!");
	//}
}

function asesor_asignar()
{
	var objeto="asesor";
	var accion="asignar";
	
	//if (document.getElementById('aa_'+objeto+'_'+accion).value!="")
	//{
		$('#btn_'+objeto+'_'+accion).attr("disabled", true);
		
		var validate = document.getElementById("frm_"+objeto+'_'+accion);
		var form_data = new FormData(document.getElementById("frm_"+objeto+'_'+accion));	
		if(validate.checkValidity())
		{
			fetch('/estadia/proyectos/asesor_asignar',{
				method:'POST',
				body: form_data
			})
			.then(function(res){
				return res.json();
			})
			.then(function(datos){
				if(datos==true)
				{
					$("#modal_"+objeto+'_'+accion).modal('hide');
					//alert('Cambios Guardados');
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
			$('#btn_'+objeto+'_'+accion).attr("disabled", false);
		}
	/*}else{
		alert("Falta Información para procesarla!");
	}*/
}

function proyecto_desasignar(id)
{
	if (confirm("¿Quieres continuar?"))
	{
		var objeto="proyecto";
		var accion="desasignar";
		
		$('#btn_'+objeto+'_'+id).attr("disabled", true);
			
		
		fetch('/estadia/'+objeto+'s/'+accion+'/'+id,{
			method:'POST'
		})
		.then(function(res){
			return res.json();
		})
		.then(function(datos){
			if(datos==true)
			{
				//$("#modal_"+objeto+'_'+accion).modal('hide');
				//alert('Cambios Guardados');
				//location.href="proyectos/modal_mostrar_asignados/3";
				$("#"+id).remove();
				
				var nFilas = $("#tbasignados tbody tr").length;
				if (nFilas<1){
					//document.getElementById("btn_cerrar_"+objeto+"_mostrar_asignados").style.display="none";
					
				}
				
				$("#modal_"+objeto+'_'+accion).modal('hide');
					//alert('Cambios Guardados');
				location.reload();
				
			}
			else
			{
				alert("Error!");
			}
		});
		
	}
}

function cambiar_estatus_proyecto(proyecto_id,nuevoestatus)
{
	//alert(proyecto_id);
	var objeto="proyecto";
	var accion="mostrar_asignados";

	if (confirm("¿Quieres continuar?, una vez cerrada la asignación ya no se podrá reasignar sin previa autorización"))
	{
		$('#btn_cerrar_'+objeto+'_'+accion).attr("disabled", true);
			
		
		fetch('/estadia/'+objeto+'s/cambiar_estatus/'+proyecto_id+'/'+nuevoestatus)
		.then(function(res){
			return res.json();
		})
		.then(function(datos){
			if(datos==true)
			{
				location.reload();
				$("#modal_"+objeto+'_'+accion).modal('hide');
			}
			else
			{
				alert("Error!");
			}
		});
		
		$('#btn_cerrar_'+objeto+'_'+accion).attr("disabled", false);
	}
	
	return false;
}

function mostrar_proyectos_aa(aa_id)
{

	//$('#btnAgregar_'+objeto).attr("disabled", true);
	
	//var validate = document.getElementById("frmAgregar_"+objeto);
	//var form_data = new FormData(document.getElementById("frmAgregar_"+objeto));	
	//if(validate.checkValidity())
	//{
		fetch('/estadia/reportes/mostrar_proyectos_aa/'+aa_id,{
			method:'POST',
			//body: form_data
		})
		.then(function(res){
			return res.json();
		})
		.then(function(datos){
			if(datos==true)
			{
				//$("#modalAgregar_"+objeto).modal('hide');
				alert('Se agregó correctamente');
				location.reload();
				$("#reporte_filtro").html(datos);
			}
			else
			{
				alert("Error!");
			}
		});
	//}
	//else 
	//{
		//validate.reportValidity();
		//$('#btnAgregar_'+objeto).attr("disabled", false);
	//}
	
}


function imprimir_reporte(info,title,info_extra){
	  var mywindow = window.open('', 'Imprimir', '');
	  mywindow.document.write('<head><title>Imprimir Reporte</title><link href="css/my_styles_print.css" rel="stylesheet" media="print"/><script languaje="javascript">setTimeout(function () { window.print(); window.close();}, 500);</script></head>');
	  mywindow.document.write('<body>');
	  mywindow.document.write('<h2>'+title+' <small> ('+info_extra+')</small></h2><table id="proyectos_aa" cellspacing="0" cellpadding="2">'+info+'</table>');
      mywindow.document.write('</body>');
      mywindow.document.close();
}


function mostrar_modal_actualizar(id)
{
	$.get("/estadia/empresas/modalActualizar/"+id, function(html) {
		$("#modal_").empty();
		$(html).appendTo('#modal_').modal();
		//setTimeout("$('.focus').focus()", 500);
		$('#modal_alumno_agregar,#modal_alumno_actualizar,#modalActualizar,#modalNuevo').on('shown.bs.modal', function (e) {
			$('.focus').focus();
		});
	});
}

