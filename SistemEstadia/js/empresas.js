function obtenerMunicipios(id_edo)
{
	if (document.getElementById('mun'))
	{
		if (id_edo!="")
		{
			
			fetch('/estadia/empresas/estado/'+id_edo)
			.then(function(res){
				return res.json();
			})
			.then(function(data){
				$("#col").find('option').remove();
				
				$("#mun").find('option').remove();
				$("#mun").append('<option value="" selected disabled hidden></option>');
				for(var x=0; x<data.length;x++)
				{
					$("#mun").append('<option value=' + data[x].id + '>' + data[x].nombre + '</option>');
				}
			});
		}else{
			$("#mun").find('option').remove();
			$("#loc").find('option').remove();
		}
	}
	
	if (document.getElementById('mun_act'))
	{
		if (id_edo!="")
		{
			
			fetch('/estadia/empresas/estado/'+id_edo)
			.then(function(res){
				return res.json();
			})
			.then(function(data){
				$("#col_act").find('option').remove();
				
				$("#mun_act").find('option').remove();
				$("#mun_act").append('<option value="" selected disabled hidden></option>');
				for(var x=0; x<data.length;x++)
				{
					$("#mun_act").append('<option value=' + data[x].id + '>' + data[x].nombre + '</option>');
				}
			});
		}else{
			$("#mun_act").find('option').remove();
			$("#loc_act").find('option').remove();
		}
	}
	
}

function obtenerColonias(id_mun)
{
	if (document.getElementById('col'))
	{
		if (id_mun!="")
		{
			fetch('/estadia/empresas/municipio/'+id_mun)
			.then(function(res){
				return res.json();
			})
			.then(function(data){
				$("#col").find('option').remove();
				$("#col").append('<option value="" selected disabled hidden></option>');
				for(var x=0; x<data.length;x++)
				{
					$("#col").append('<option value=' + data[x].id + '>' + data[x].nombre + '</option>');
				}
			});
		}else{
			$("#col").find('option').remove();
		}
	}
	
	if (document.getElementById('col_act'))
	{
		if (id_mun!="")
		{
			fetch('/estadia/empresas/municipio/'+id_mun)
			.then(function(res){
				return res.json();
			})
			.then(function(data){
				$("#col_act").find('option').remove();
				$("#col_act").append('<option value="" selected disabled hidden></option>');
				for(var x=0; x<data.length;x++)
				{
					$("#col_act").append('<option value=' + data[x].id + '>' + data[x].nombre + '</option>');
				}
			});
		}else{
			$("#col_act").find('option').remove();
		}
	}
}

function guardarEmpresa()
{
	$('#btnAgregar').attr("disabled", true);
	
	var validate = document.getElementById("frmNuevo");
	var form_data = new FormData(document.getElementById("frmNuevo"));	
	if(validate.checkValidity())
	{
		fetch('/estadia/empresas/guadarNuevo/',{
			method:'POST',
			body: form_data
		})
		.then(function(res){
			return res.json();
		})
		.then(function(datos){
			if(datos==true)
			{
				$("#modalNuevo").modal('hide');
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
		$('#btnAgregar').attr("disabled", false);
	}
}


function actualizar()
{
	$('#btnActualizar').attr("disabled", true);
	
	var validate = document.getElementById("frmActualizar");
	var form_data = new FormData(document.getElementById("frmActualizar"));	
	if(validate.checkValidity())
	{
		fetch('/estadia/empresas/actualizar/',{
			method:'POST',
			body: form_data
		})
		.then(function(res){
			return res.json();
		})
		.then(function(datos){
			if(datos==true)
			{
				$("#modalActualizar").modal('hide');
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
		$('#btnActualizar').attr("disabled", false);
	}
}

function eliminar(accion)
{
	$('#btn'+accion).attr("disabled", true);
	
	var validate = document.getElementById("frm_"+accion);
	var form_data = new FormData(document.getElementById("frm_"+accion));	
	if(validate.checkValidity())
	{
		fetch('/estadia/empresas/'+accion+'/',{
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
		$('#btn'+accion).attr("disabled", false);
	}
}

