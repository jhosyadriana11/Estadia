function actualizar_estadia(objeto)
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


function imprimir_f1(id)
{
	$.ajax({
        url : '/estadia/estadias/imprimir_f1/'+id,
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
            alert("ERROR:\nExiste un error, favor de reportar a Soporte Técnico");
        }
       
    });
    
}

function imprimirformato()
{
	newWin.print();
	newWin.close();
}

function estadia_cancelar(objeto,accion)
{
	$('#btn'+objeto+'_'+accion).attr("disabled", true);
	$('#btn'+objeto+'_'+accion).attr("value", "...");
	
	var validate = document.getElementById('frm_'+objeto+'_'+accion);
	var form_data = new FormData(document.getElementById('frm_'+objeto+'_'+accion));	
	if(validate.checkValidity())
	{
		fetch('/estadia/'+objeto+'s/'+accion+'/'+objeto+'/'+accion,{
			method:'POST',
			body: form_data
		})
		.then(function(res){
			return res.json();
		})
		.then(function(datos){
			if(datos==true)
			{
				$('#modal_'+objeto+'_'+accion).modal('hide');
				alert('MENSAJE:\nLa Estadía ha sido cancelada y puedes volver a asignar al estudiante.');
				location.reload();
			}
			else
			{
				alert("ERROR:\nError de Ejecución de Acción, ¡reportar al administrador del Sistema!");
			}
		});
	}
	else 
	{
		validate.reportValidity();
		$('#btnActualizar_'+objeto).attr("disabled", false);
	}
}

function reenviar_correo_encuesta(id_compuesto)
{
	document.getElementById('btn_rce_'+id_compuesto).style.display="none";
	document.getElementById('fade').classList.add('fade-in');
	document.getElementById('fade').classList.remove('fade-out');
	
	fetch('/estadia/estadias/reenviar_correo_encuesta/'+id_compuesto,{
		method:'POST',
		body:null
	})
	.then(function(res){
		return res.json();
	})
	.then(function(datos){
		if(datos.indexOf("***OK***")>=0)
		{
			//alert("MENSAJE:\nCorreo se envió correctamente.");
			
			//location.reload();
		}
		else
		{
			alert("Error:\n"+datos);
			
		}
		document.getElementById('btn_rce_'+id_compuesto).style.display="inline";
		document.getElementById("fade").classList.remove("fade-in");
		document.getElementById("fade").classList.add("fade-out");
	});
	
}

function obtener_reporte_encuestas(periodo_id)
{
	if (periodo_id!="")
	{
		fetch('/estadia/reportes/obtener_reporte_encuestas/'+periodo_id)
		.then(function(res){
			document.getElementById("reporte-encuesta-general").innerHTML="<div width='100%' class='col-lg' align='center'>Cargando... Espere</center>";
			return res.json();
			
		})
		.then(function(datos){
			document.getElementById("reporte-encuesta-general").innerHTML=datos;
		});
	}else{
		document.getElementById("reporte-encuesta-general").innerHTML="";
	}
	
	
}

function devolverhtml(contenidoOriginal){
	document.body.innerHTML = contenidoOriginal;
}

function printDiv(nombreDiv) {
	
     /*var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();
	 
	 setTimeout(devolverhtml(contenidoOriginal),6000);
     //document.body.innerHTML = contenidoOriginal;*/
     
     var ficha=document.getElementById(nombreDiv);
	var ventimp=window.open(' ','popimpr');
  	ventimp.document.write("<html>");
 	ventimp.document.write("<head>");
 	ventimp.document.write("<title>Encuesta</title>");
 	ventimp.document.write("<style type='text/css' media='print' > @media { .no_imprimible{ display: none !important;  } } </style>");
 	ventimp.document.write("<link href='https://sistemas.utcalvillo.edu.mx/estadia/css/styles.css' rel='stylesheet' />");
 	ventimp.document.write("<link href='https://sistemas.utcalvillo.edu.mx/estadia/css/dataTables.bootstrap4.min.css' rel='stylesheet' />");
	  ventimp.document.write("</head>");
	  ventimp.document.write("<body onload='window.print(); window.close();'>");
	  ventimp.document.write(ficha.innerHTML);
	  ventimp.document.write("<script src='https://sistemas.utcalvillo.edu.mx/estadia/js/jquery-3.5.1.min.js'></script>");
	  ventimp.document.write("</body>");
	  ventimp.document.write("</html>");
	  ventimp.document.close();
	  //ventimp.print();
	  //ventimp.close();
}


