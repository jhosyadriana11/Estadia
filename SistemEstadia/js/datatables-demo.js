// Call the dataTables jQuery plugin

var table1 = $('#empresas').DataTable( {
        order: [ 1, "asc" ],
        fixedHeader: true,
        paging: false
    } );


var table2 = $('#alumnos').DataTable( {
	orderCellsTop: true,
    fixedHeader: true,
    paging: false,
} );

var table3 = $('#proyectos').DataTable( {
	 order: [ 1, "asc" ],
	 paging: false,
	 fixedHeader: true,
} );

var table4 = $('#proyectos_aa').DataTable( {
    orderCellsTop: true,
    fixedHeader: true,
    paging: false,
} );

var table5 = $('#estadias').DataTable( {
	order: [ 1, "asc" ],
	orderCellsTop: true,
    fixedHeader: true,
    paging: false,
    aoColumnDefs: [
          { 'bSortable': false, 'aTargets': [ 0 ] }
       ]
} );

var table6 = $('#seguimientos').DataTable( {
    orderCellsTop: true,
    fixedHeader: true,
    paging: false,
    order: [ 1, "asc" ],
} );


$('#alumnos tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('bg-secondary') ) {
        $(this).removeClass('bg-secondary');
    }
    else {
        table.$('tr.bg-primary').removeClass('bg-primary');
        //$(this).addClass('bg-danger');
    }
} );
   
     

var columna_alumnos=0;
$('#alumnos thead #filtros th').each( function (i) {
    if ((columna_alumnos==3)||(columna_alumnos==4)||(columna_alumnos==9))
    {
    	$(this).html( '<input type="text" style="max-width: 50px;" class="ocultar-al-imprimir" placeholder="Search" />' );
    	$( 'input', this).on( 'keyup change', function () {
            if (table2.column(i).search() !== this.value ) {
                table2
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
        
    } else{
    	$(this).html('');
    }
   
    columna_alumnos++;
} );

var columna_proyectos_aa=0;
$('#proyectos_aa thead #filtros_proyectos_aa th').each( function (i) {
    if ((columna_proyectos_aa==1)||(columna_proyectos_aa==11))
    {
    	$(this).html( '<input type="text" style="max-width: 100%;" class="ocultar-al-imprimir" placeholder="Search" />' );
    	$( 'input', this).on( 'keyup change', function () {
            if (table4.column(i).search() !== this.value ) {
                table4
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
        
    } else{
    	$(this).html('');
    }
   
    columna_proyectos_aa++;
} );

/*$('#proyectos_aa thead tr').clone(true).appendTo( '#proyectos_aa thead' );
$('#proyectos_aa thead tr:eq(0) th').each( function (i) {
    var title = $(this).text();
    //alert(title);
    if (title=="Carrera")
    {
    	$(this).html( '<input type="text" style="max-width: 50px;" class="ocultar-al-imprimir" placeholder="Search '+title+'" />' );
    }
    else if (title=="Matricula")
    {
    	$(this).html( '<input type="text" style="max-width: 80px;" class="ocultar-al-imprimir" placeholder="Search '+title+'" />' );
    }
    else if (title=="Sexo")
    {
    	$(this).html( '<input type="text" style="max-width: 80px;" class="ocultar-al-imprimir" placeholder="Search '+title+'" />' );
    }
    else
    {
    	$(this).html( '<input type="text" style="" class="ocultar-al-imprimir" placeholder="Search '+title+'" />' );
    }
    
 
	$( 'input', this ).on( 'keyup change', function () {
        if ( table4.column(i).search() !== this.value ) {
            table4
                .column(i)
                .search( this.value )
                .draw();
        }
    } );
} );*/

$('#proyectos_aa thead tr:eq(1) th').addClass('ocultar-al-imprimir');



