$("body").on('click',"a[name ='modal_btn']",function(event) 
{
	event.preventDefault();
	this.blur();
	$.get(this.href, function(html) {
		$("#modal_").empty();
		$(html).appendTo('#modal_').modal();
		//setTimeout("$('.focus').focus()", 500);
		$('#modal_alumno_agregar,#modal_alumno_actualizar,#modalActualizar,#modalNuevo').on('shown.bs.modal', function (e) {
			$('.focus').focus();
		});
	});
});

