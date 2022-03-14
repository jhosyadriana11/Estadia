
<div class="container-fluid mt-1 pb-5">
	<div class="row">
		<div class="col">
			<div class="alert alert-info" >
			  <h5>ALUMNOS</h5>
			    <?php
				//10=servicios escolares
				if (($_SESSION["utc_departamento_id"]==10)||($_SESSION["utc_departamento_id"]==9)) {
				  ?><a href="alumnos/modal_agregar" class="btn btn-secondary btn-sm btnUTCAzul " style="float: right;position:relative; top: -30px;" name="modal_btn" >NUEVO</a><?php
				}
				?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col ">
			<div class="table-responsive p-1"  style="border: 1px solid gray; border-radius: 5px;">
			<table id="alumnos" class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px" >
				<thead style="" class="bg-light" >
					<tr class="" style="" >
						<th align="center" class="text-center" style="width: auto;"></th>
						<th align="left" style="font-size: 12px;">Matrícula</th>
						<th align="left" style="font-size: 12px;">Tipo</th>
						<th align="left" style="font-size: 12px;">Nombre</th>	
						<th align="left" style="font-size: 12px;">Carrera</th>
						<th align="left" style="font-size: 12px;">Sexo</th>
						<th align="left" style="font-size: 12px;">IMSS</th>
						<th align="left" style="font-size: 12px;">Correo</th>
						<th align="left" style="font-size: 12px;">Teléfono</th>	
						<th align="left" style="font-size: 12px;" title="Pago Inscripción">PI</th>
						<th align="left" style="font-size: 12px;" title="Pago Inscripción">P.I. Fecha</th>	
						<th align="left" style="font-size: 12px;">Estatus</th>
						<th align="left" style="font-size: 12px;">Observacion</th>
					</tr>
					<tr id="filtros">
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
						<th ></th>	
					</tr>
				</thead>
				
				<tbody  style="">
				<?php
				foreach($table->result() as $row):	
					$classDetenido="";
					if ($row->estatus=="DETENIDO") $classDetenido="bg-warning";		
					?>
					<tr class="<?php echo $classDetenido; ?>">
						<td valign='middle' align='left' style="width: 70px;">
							
							<?php
							// 19=cajas, 9=soporte tecnico, 22=contabilidad
							if (($_SESSION["utc_departamento_id"]==19)||($_SESSION["utc_departamento_id"]==9)||($_SESSION["utc_departamento_id"]==22)||($_SESSION['utc_usuario']=="ANAHI.GARCIA")||($_SESSION['utc_usuario']=="BRENDA.MARES")){
								?><a href="alumnos/modal_registrarpago/<?php echo $row->id ?>" class="btn btn-sm p-0" style="" name="modal_btn" ><span class="" style=""><i class="fas fa-hand-holding-usd"></i></span></a><?php	
							}
							
							//10=servicios escolares
							if (($_SESSION["utc_departamento_id"]==10)||($_SESSION["utc_departamento_id"]==9)|| ($_SESSION['utc_usuario']=="KARINA.GUTIERREZ")|| ($_SESSION['utc_usuario']=="JOSE.DURAN")) {
								?>
								<a href="alumnos/modal_actualizar/<?php echo $row->id ?>" class="btn btn-sm p-0" style="" name="modal_btn" ><span class="" style=""><i class="fas fa-sm fa-edit"></i></span></a>
								<?php
							}
							
							if (($row->estatus=="DETENIDO")&&(($_SESSION["utc_departamento_id"]==10)||($_SESSION["utc_departamento_id"]==9))) {
								?>
								<a href="alumnos/modal_eliminar/<?php echo $row->id ?>" class="btn btn-sm p-0" style="" name="modal_btn" ><span class="" style="color: red;"><i class="fas fa-sm fa-trash-alt"></i></span></a>
								<?php
							}
							?>
							
						</td>
						<td valign='middle' align='left' style=''><?php echo $row->matricula; ?></td>
						<td valign='middle' align='left' style=''><?php echo $row->tipo; ?></td>
						<td valign='middle' align='left' style=''><?php echo $row->nombre; ?></td>
						<td valign='middle' align='left' style=''><?php echo $row->SiglaCarrera; ?></td>
						<td valign='middle' align='left' style=''><?php echo $row->sexo; ?></td>
						<td valign='middle' align='left' style=''><?php echo $row->imss; ?></td>
						<td valign='middle' align='left' style=''><?php echo $row->correo; ?></td>						
						<td valign='middle' align='left' style=''><?php echo $row->telefono; ?></td>
						<td valign='middle' align='left' style=''><?php echo $row->pi; ?></td>
						<td valign='middle' align='left' style=''>
							<?php 
							setlocale(LC_ALL, 'es_ES');
							if ($row->pi_fecha!="") {echo strtoupper(strftime("%d-%b-%Y", strtotime($row->pi_fecha)));}
							?>
						</td>
						
						<td valign='middle' align='left' style=''><?php echo $row->estatus; ?></td>
						<td valign='middle' align='left' style=''><?php echo $row->observacion; ?></td>
					</tr>
					
				<?php
				endforeach;
				?>
				</tbody>
				<tfoot class="bg-light" >
					<tr style="border-top: 1px solid #000000;" >
					<td colspan="13" align="left" style="font-size: 12px;"></td>
					</tr>
				</tfoot>
			</table>
			</div>
		</div>
	</div>
</div>


