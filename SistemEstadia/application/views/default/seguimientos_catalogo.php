
<?php
$objeto="seguimiento";
setlocale(LC_ALL,"es_ES");

?>
<div class="container-fluid mt-1">
	<?php
		foreach($proyecto->result() as $row1):
		?>
		<div class="row">
			<div class="col">
				<div class="alert alert-info" >
				  <h5><?php echo strtoupper($objeto."S"); ?></h5>
				  <?php
				  if ($row1->estatus<=2) {
					?><a href="javascript: mostrar_modal_nuevo_seguimiento('<?php echo $objeto; ?>','<?php echo $row1->id; ?>');" class="btn btn-secondary btn-sm btnUTCAzul " style="float: right;position:relative; top: -30px;"  >NUEVO</a><?php  
				  }
				  ?>
				  <a href="javascript: window.history.back();" class="btn btn-secondary btn-sm btnUTCAzul mr-1" style="float: right;position:relative; top: -30px;"  >REGRESAR</a>
				</div>
			</div>
		</div>
		<div class="row pb-3" style="font-size: 12px;">
			<div class="col-auto">
				<b>Nombre del alumno:</b><br>
				<b>Asesor Académico:</b><br>
				<b>Programa Educativo:</b><br>
				<b>Jefe de P.E.:</b><br>
				<b>Nombre del proyecto:</b><br>
				<b>Empresa:</b><br>
			</div>
			<div class="col">
				<?php
					echo $row1->alumno_nombre.'<br>';
					echo $row1->aa_nombre.'<br>';
					echo $row1->short_title.'<br>';
					echo $row1->nombre_ptc.'<br>';
					echo $row1->nombre.'<br>';
					echo $row1->nombre_empresa.'<br>';
					
				?>
				
			</div>
		</div>
		<?php
		endforeach
	?>
	<div class="row pb-5">
		<div class="col ">
			<div class="table-responsive p-1"  style="border: 1px solid gray; border-radius: 5px;">
			<table id="<?php echo $objeto."s"; ?>" class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px" data-page-length="25">
				<thead style="" class="bg-light" >
					<tr class="" style="" >
						<th align="left" style="font-size: 12px;"></th>
						<th align="left" style="font-size: 12px;width: 20px;">Sem.</th>
						<th align="left" style="font-size: 12px;width: 100px;">Fecha</th>
						<th align="left" style="font-size: 12px;">Actividades Programadas</th>
						<th align="left" style="font-size: 12px;">Actividades Realizadas</th>
						<th align="left" style="font-size: 12px;">Observaciones</th>
						<th align="left" style="font-size: 12px;width: 40px;">Conformidad</th>
						<th align="left" style="font-size: 12px;width: 40px;">Estatus</th>	
					</tr>
				</thead>
				
				<tbody  style="">
				<?php
				foreach($seguimientos->result() as $row):
					$txt_date_conformidad="";
					if ($row->fh_conformidad!=NULL) {
						//$date_conformidad = new DateTime($row->fh_conformidad); 
						$txt_date_conformidad=strtoupper(strftime("%d-%b-%Y %T", strtotime($row->fh_conformidad)));
					}
						
					?>
					<tr class="<?php if ($row->estatus==3) { echo 'table-success';	} if ($row->estatus==2) { echo 'table-info';	} ?>">
						<td valign='middle' align='left' style="width: auto;">
							<?php
							if ($row->conformidad_alumno=="NO" && $row1->estatus<4) {
									?> <a id="btn_rcc_<?php echo $row->id; ?>" href="javascript: reenviar_correo_conformidad('<?php echo $row->id; ?>')" class="btn btn-sm p-0" style="" title="Reenviar Correo de conformidad" ><span class=""><i class="fas fa-paper-plane"></i></span></a><?php
								}
							/*foreach($semanas->result() as $row2):
								if ($row2->semana==$row->semana) {
									?> <a href="#" onclick="mostrar_modal_actualizar_seguimiento();" class="btn btn-sm p-0" style="" name="modal_btn" title="Actualizar Seguimiento" ><span class=""><i class="fas fa-sm fa-edit"></i></span></a><?php
								}
							endforeach*/
							?>
						</td>
						<td valign='middle' align='center' style='font-size:10px;'><?php echo $row->semana;  ?></td>
						<td valign='middle' align='left' style='font-size:10px;'>
							<?php
								echo strtoupper(strftime("%d-%b-%Y %T", strtotime($row->fecha_hora)));
							?>
						</td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->act_pro;  ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo $row->act_real;  ?></td>
						<td valign='middle' align='left' style='font-size:10px;'><?php echo str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $row->obs); ?></td>
						<td valign='middle' align='center' style='font-size:10px;' title="<?php echo $txt_date_conformidad; ?> "><?php echo $row->conformidad_alumno; ?></td>
						<td valign='middle' align='center' style='font-size:10px;' title="<?php echo $row->txt_estatus; ?>"><?php echo $row->estatus; ?></td>
						
					</tr>
					
				<?php
				endforeach;
				?>
				</tbody>
				<tfoot class="bg-light" >
					<tr style="border-top: 1px solid #000000;" >
					<td colspan="8" align="left" style="font-size: 12px;"></td>
					</tr>
				</tfoot>
			</table>
			</div>
		</div>
	</div>
</div>


