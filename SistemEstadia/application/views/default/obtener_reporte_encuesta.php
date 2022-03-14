
<?php
foreach($asesores->result() as $row):
	
	$asesorados = $this->m_estadias->obtener_reporte_asesorados($row->aa_id, $ciclo->id, $datos_ciclo[1]);
	?>	
	<div class="row pb-5 justify-content-center" id="asesor_<?php echo $row->aa_id; ?>">
		<div class="col-lg " id="reporte-encuesta-general">
			<div class="border p-3 justify-content-center" style="">
				<div class="row d-none d-print-block">
					<div class="col-lg">
						<h3 class="">ENCUESTA DE DESEMPEÑO DEL ASESOR ACADÉMICO<br><small>UNIVERSIDAD TECNOLÓGICA DE CALVILLO</small> </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<h6 class="">ASESOR(A) ACADÉMICO(A): </h6>
					</div>
					<div class="col-lg">
						<h6 class=""><small><?php echo $row->aa_nivelaca." ".$row->aa_nombre; ?></small></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<h6 class="">CUATRIMESTRE: </h6>
					</div>
					<div class="col-lg">
						<h6 class=""><small><?php echo $ciclo->nombre." ".$datos_ciclo[1]; ?></small></h6>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<p style="font-size: 10px;">
							* Los valores se indican en el siguiente rango: 1=MAL, 2=REGULAR, 3=BIEN, 4=MUY BIEN y 5=EXCELENTE.<br>
							** Los valores se indican en el siguiente rango: 1=SI, 0=NO.</p>
					</div>
				</div>
			 	
			  	<hr class="my-4">
			   	
			   	<table width="100%">
			   		<thead>
			   			<th>Pregunta</th>
			   			<?php 
			   				for ($i=1; $i <= $asesorados->num_rows(); $i++) 
			   				{
		   					 ?> 
							 <th class="text-center" title="Asesorado">Ases. <?php echo $i; ?></th>
							 <?php  
						    }
			   				?>
			   			<th align="center">Prom.</th>
			   		</thead>
			   		<tbody>
			   			
			   				<?php 
			   				
			   				$preguntas=array();
							array_push($preguntas, "1. ¿Cómo consideras a tu asesor(a) en cuanto a la puntualidad de las sesiones semanales?*");
							array_push($preguntas, "2. ¿Cómo consideras la calidad de las sesiones semanales?*");
							array_push($preguntas, "3. ¿Cómo consideras la capacidad para de tu asesor(a) para guiar tu trabajo teórico?*");
							array_push($preguntas, "4. ¿Cómo consideras el conocimiento que mostró tu asesor(a) para estructurar textos, contenidos y redacción?*");
							array_push($preguntas, "5. ¿Cómo consideras la actitud profesional de tu asesor(a) durante tu proceso de estadías?*");
							array_push($preguntas, "6. ¿Cómo consideras la disponibilidad de tu asesor(a) para guiarte en este proceso?*");
							array_push($preguntas, "7. ¿Cómo consideras que la comunicación con tu asesor(a)?*");
							array_push($preguntas, "8. ¿Cómo consideras la disposición de tu asesor(a) para atender tus dudas?*");
							array_push($preguntas, "9. ¿Cómo consideras la disposición de tu asesor(a) para escucharte?*");
							array_push($preguntas, "10. ¿Cómo consideras el respeto que te mostró tu asesor(a)?*");
							array_push($preguntas, "11. ¿Cómo te pareció la ayuda que te brindó tu asesor(a) sobre la orientación para realizar gestiones y trámites?*");
							array_push($preguntas, "12. ¿Cómo consideras la capacidad de tu asesor(a) para guiar tu trabajo práctico?*");
							array_push($preguntas, "13. En general, ¿cómo fué el desempeño de tu asesor(a)?*");
							array_push($preguntas, "14. ¿Cómo consideras que el trabajo de tu asesor(a) te ayudó para concretar tu estadía?*");
							array_push($preguntas, "15. ¿Tu asesor(a) académico(a) en conjunto con tu asesor(a) empresarial determinaron el nombre de tu proyecto?**");
							array_push($preguntas, "16. ¿Tu asesor(a) estableció comunicación con tu asesor(a) empresarial?**");
							array_push($preguntas, "17. ¿Tu proyecto de estadía se realizó conforme a lo establecido desde un inicio?**");
							array_push($preguntas, "18. ¿Cuántas visitas realizó tu asesor(a) a la empresa?");
							array_push($preguntas, "19. ¿Recomendarías a tu asesor(a) para futuras estadías?**");
							
							
			   				
			   				
								$i=1;
								$promediogral=0;
								
								foreach ($preguntas as $valor): 
									if ($i==15) {
										
										?>
										<tr style="border-top: 1px solid gray;font-weight: bold;">
											<td colspan="<?php echo $asesorados->num_rows()+1; ?>" style="padding-bottom: 10px;" align="right">Promedio Final (En base a las preguntas anteriores): </td>
											<td align="center" style="padding-bottom: 10px;"><?php echo number_format(($promediogral/($i-1)),1) //ceil($promediogral/15); ?></td>
										</tr>
										<?php
									}								
								?> 
								<tr class="fila_pregunta">
		   							<td><?php echo $valor; ?></td>
		   							<?php 
		   								$suma=0;
						   				foreach ($asesorados->result() as $row2):
						   					$respuesta = $this->m_estadias->obtener_reporte_respuesta($row2->proyecto_id,$i)->row();
						   					?> 
											<td class="text-center" ><?php if($respuesta) {echo $respuesta->res; } ?></td>
											<?php 
											
											$suma=$suma+($respuesta->res*1);
								    	endforeach;
										$i++; 
					   				?>
					   				<td class="text-center">
									<?php 
										if ($suma>0 && $i<=15)
										{
											
											$promedio=$suma/$asesorados->num_rows();
											echo number_format($promedio,1);
											
											$promediogral=$promediogral+$promedio;
										}
									?>
									</td>
					   			</tr>
					   			<?php
								endforeach;
			   				?>
			   				<tr >
			   					<td colspan="100%" style="padding-top: 10px;">
			   						<b>Justificaciones de la recomendación:</b>
			   						<ul style="border: 1px solid black;">
			   						<?php
					   				foreach ($asesorados->result() as $row3):
					   					$respuesta3 = $this->m_estadias->obtener_reporte_respuesta($row3->proyecto_id,'19j')->row();
										
										if($respuesta3) {
											if($respuesta3->res!="") {
							   					?> 
												<li ><?php echo $respuesta3->res;  ?></li>
												<?php 
											}
										}
							    	endforeach;
					   				?>
					   				</ul>
			   					</td>
			   				</tr>
			   				<tr >
			   					<td colspan="100%" style="padding-top: 10px;">
			   						<b>Observaciones Generales:</b>
			   						<ul style="border: 1px solid black;">
			   						<?php
					   				foreach ($asesorados->result() as $row4):
					   					$respuesta4 = $this->m_estadias->obtener_reporte_respuesta($row4->proyecto_id,'20')->row();
										
										if($respuesta4) {
											if($respuesta4->res!="") {
							   					?>  
												<li ><?php echo $respuesta4->res;  ?></li>
												<?php 
											}
										}
							    	endforeach;
					   				?>
					   				</ul>
			   					</td>
			   				</tr>
			   		</tbody>
			   		<tfoot >
			   			<th class=""><td colspan="100%" align="right"><a href="javascript: printDiv('asesor_<?php echo $row->aa_id; ?>')" class="btn btn-secondary no_imprimible"><span style="font-size: 15px;"><i class="fas fa-print"></i></span></a></td></th>
			   		</tfoot>
			   	</table>
			</div>
		</div>
	</div>

<?php
endforeach;
?>

