
<?php
$objeto="proyecto";

?>
<div class="container-fluid mt-1">
	<div class="row">
		<div class="col">
			<div class="alert alert-info" >
			  <h5>REPORTE <small>Proyectos</small></h5>
			  <button class="btn btn-sm btn-secondary float-right " style="position:relative; top: -30px;" onclick="imprimir_reporte(document.getElementById('proyectos_aa').innerHTML,'Proyectos',document.getElementById('info_extra').value);"><span class=""><i class="fas fa-sm fa-print"></i></span></button>
			</div>
		</div>
	</div>
	<div class="row pb-5">
		<div class="col ">
			<div id="contiene_info" class="table-responsive p-1"  style="border: 1px solid gray; border-radius: 5px;">
			<input id="info_extra" type="hidden" value="Impresion <?php echo date('d-m-Y H:i:s'); ?>: Sistema de Estadías " />
			<table id="proyectos_aa" class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px" width="100%" >
				<thead class="bg-light"  >
					<tr  >
						<th align="left" style="min-width: 100px;">Alumno</th>
						<th align="left" >Carrera</th>	
						<th align="left" >Sexo</th>
						<th align="left" >Matricula</th>	
						<th align="left" style="min-width: 120px;">Empresa</th>
						<th align="left" style="min-width: 320px;">Dirección</th>
						<th align="left" style="min-width: 100px;">Contacto</th>
						<th align="left" >Puesto</th>
						<th align="left" >Email</th>
						<th align="left" >Teléfono</th>
						<th align="left" >Proyecto</th>
						<th align="left" style="min-width: 100px;">Asesor Académico</th>
							
					</tr>
					<tr id="filtros_proyectos_aa">
						<th ></th>
						<th ></th>
						<th ></th>
						<th ></th>	
						<th ></th>
						<th ></th>
						<th ></th>
						<th ></th>
						<th ></th>	
						<th ></th>
						<th ></th>	
						<th ></th>	
					</tr>
				</thead>
				
				<tbody  >
				<?php
				$txt_sexo= array('H' => 'MASCULINO', 'M' => 'FEMENINO','' => '');
				foreach($table->result() as $row):	
					?>
					<tr class="">
						<td valign='top' align='left' ><?php echo $row->alumno_nombre; ?></td>
						<td valign='top' align='left' ><?php echo $row->short_title; ?></td>
						<td valign='top' align='left' ><?php echo $txt_sexo[$row->sexo]; ?></td>
						<td valign='top' align='left' ><?php echo $row->matricula; ?></td>
						<td valign='top' align='left' ><?php echo $row->empresa_nombre; ?></td>
						<td valign='top' align='left' ><?php echo strtoupper($row->dir.", ".$row->colonia_nombre.", ".$row->municipio_nombre.", ".$row->estado_nombre); ?></td>
						<td valign='top' align='left' ><?php echo strtoupper($row->nombre_contacto); ?></td>
						<td valign='top' align='left' ><?php echo strtoupper($row->puesto_contacto); ?></td>
						<td valign='top' align='left' ><?php echo $row->email_contacto; ?></td>
						<td valign='top' align='left' ><?php echo $row->tel_contacto; ?></td>
						<td valign='top' align='left' ><?php echo strtoupper($row->descripcion); ?></td>
						<td valign='top' align='left' ><?php echo $row->aa_nombre; ?></td>
					</tr>
					
				<?php
				endforeach;
				?>
				</tbody>
				<tfoot class="bg-light" >
					<tr style="border-top: 1px solid #000000;" >
					<td colspan="12" align="left" style="font-size: 12px;"></td>
					</tr>
				</tfoot>
			</table>
			</div>
		</div>
	</div>
</div>


