
<div class="container-fluid mt-1">
	<div class="row">
		<div class="col">
			<div class="alert alert-info" >
			  <h5>EMPRESAS</h5>
			  <?php 
				//27 EXTENSIÓN UNIVERSITARIA
				//14 ACTIVIDADES CULTURALES Y DEPORTIVAS
				//9 SOPORTE TÉCNICO
				if (($_SESSION["utc_departamento_id"]==9)||($_SESSION["utc_departamento_id"]==27)||($_SESSION["utc_departamento_id"]==14)) {
				?>
				  <a href="empresas/nuevo" class="btn btn-secondary btn-sm btnUTCAzul " style="float: right;position:relative; top: -30px;" name="modal_btn" >NUEVO</a>
				  <?php
				}
				?>
			</div>
		</div>
	</div>
	<div class="row pb-5">
		<div class="col ">
			<div class="table-responsive p-1"  style="border: 1px solid gray; border-radius: 5px;">
			<table id="empresas" class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px" >
				<thead style="" class="bg-light" >
					<tr class="" style="" >
						<th align="center" class="text-center" style="min-width: 25px;"></th>
						<th align="left" style="font-size: 12px;">Nombre</th>	
						<th align="left" style="font-size: 12px;">Giro</th>	
						<th align="left" style="font-size: 12px;">Cant. Trabaj.</th>	
						<th align="left" style="font-size: 12px;">Direccion</th>
						<th align="left" style="font-size: 12px;">Teléfono</th>	
						<th align="left" style="font-size: 12px;">Nombre Contacto</th>
						<th align="left" style="font-size: 12px;">Puesto Contacto</th>
						<th align="left" style="font-size: 12px;">Email Contacto</th>
						<th align="left" style="font-size: 12px;">Tel. Contacto</th>
					</tr>
				</thead>
				
				<tbody  style="">
				<?php
				foreach($table->result() as $row):			
					?>
					<tr class="">
						<td valign='middle' align='left'>
							
							<?php 
							//27 EXTENSIÓN UNIVERSITARIA
							//14 ACTIVIDADES CULTURALES Y DEPORTIVAS
							//9 SOPORTE TÉCNICO
							if (($_SESSION["utc_departamento_id"]==9)||($_SESSION["utc_departamento_id"]==27)||($_SESSION["utc_departamento_id"]==14)) {
								?>
								<button onclick="mostrar_modal_actualizar('<?php echo $row->id ?>');" class="btn btn-sm p-0" style="" ><span class=""><i class="fas fa-sm fa-edit"></i></span></button>
								  
								<?php
							}
							
							if (($row->CantProyectos<1)&&(($_SESSION["utc_departamento_id"]==9)||($_SESSION["utc_departamento_id"]==27)||($_SESSION["utc_departamento_id"]==14))) {
								?>
								<a href="empresas/modalEliminar/<?php echo $row->id ?>" class="btn btn-sm p-0" style="" name="modal_btn" ><span class=""><i class="fas fa-sm fa-trash-alt"></i></span></a> 
								<?php
							}
							?>
						</td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->nombre; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo mb_strtoupper($row->giro); ?></td>
						<td valign='middle' align='center' style='font-size:10px;'><?php echo $row->trabajadores; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo mb_strtoupper($row->dir.", ".$row->col.", ".$row->mun.", ".$row->edo.", CP ".$row->cp); ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->tel; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo mb_strtoupper($row->nombre_contacto); ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo mb_strtoupper($row->puesto_contacto); ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->email_contacto; ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->tel_contacto; ?></td>
						
					</tr>
					
				<?php
				endforeach;
				?>
				</tbody>
				<tfoot class="bg-light" >
					<tr style="border-top: 1px solid #000000;" >
					<td colspan="10" align="left" style="font-size: 12px;"></td>
					</tr>
				</tfoot>
			</table>
			</div>
		</div>
	</div>
</div>


