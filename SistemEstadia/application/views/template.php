<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="/img/Icono.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="<?php echo site_url(); ?>css/styles.css" rel="stylesheet" />
		<link href="<?php echo site_url(); ?>css/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="<?php echo site_url(); ?>css/fixedHeader.dataTables.min.css" rel="stylesheet" />
		<title>Capital Humano UTC: <?php echo $view['title']; ?></title>
		<style>
			.page-item.active .page-link  {
				background-color: gray;
				border-color: black;
			}
			
			.form-label{
				font-size: 12px;
			}
						
			#dropdown-menuCatalogo{
				width: auto;
				position: absolute;
				left: -80px;
				top:45px;
			}
			
			.fade-in{
				display: block;
				position: fixed;
				width: 100%;
				height: 100%; 
				background-color: rgba(0,0,0,.8);
				z-index: 999999;
				
			}
			
			.fade-out{
				display: none;
				position: fixed;
				width: 100%;
				height: 100%; 
				background-color: rgba(0,0,0,.8);
			}
			
			.fila_pregunta{
				background-color: transparent;
			}
			
			.fila_pregunta:hover{
				background-color: rgba(0,0,0,.1);
			}
			
			@media print { .no_imprimible{display: none; } }
			
			@media (max-width: 991.98px) { 
				#dropdown-menuCatalogo{
					position: relative;
					left: 0px;
					top:0px;
				}
			}

		</style>
		
	</head>


	<body onload = "" style="" >
		<div class="fade-out content-fluid" id="fade">
			<div class="row h-100 align-items-center justify-content-center">
				<div class="col text-light text-center  " >
					<h1>Procesando... espere un momento.</h1>
				</div>
			</div>
		</div>
		<?php
	        $this->load->view('default/sections/headeradmin');
	    ?>
		
		<?php
			/*$sistemas=$this->m_account->get_systems();
			$dataSistemas= array('sistemas'=>$sistemas);
	        $this->load->view('default/sections/nav',$dataSistemas);*/
			$this->load->view('default/sections/nav');
	    ?>
	   
	    <?php
		foreach($view['view'] as $row):
        $this->load->view('default/'.$row,$data);
		endforeach;
    	?>
	   
	    
	    
		<?php
	        $this->load->view('default/sections/footer');
	    ?>
	    
		<div class="modal_" id="modal_">

		</div>
		
		
		
 		<script src="<?php echo site_url(); ?>js/jquery-3.5.1.min.js"></script>
		<script src="<?php echo site_url(); ?>js/all.js"></script>
	    <script src="<?php echo site_url(); ?>js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo site_url(); ?>js/scripts.js"></script>
		<script src="<?php echo site_url(); ?>js/jquery.dataTables.min.js"></script>
		<script src="<?php echo site_url(); ?>js/dataTables.bootstrap4.min.js"></script>
		<script src="<?php echo site_url(); ?>js/dataTables.fixedHeader.min.js"></script>
		<script src="<?php echo site_url(); ?>js/dataTables.select.min.js"></script>
		<script src="<?php echo site_url(); ?>js/datatables-demo.js"></script>
		<script src="<?php echo site_url(); ?>js/estadias.js"></script>
		<script src="<?php echo site_url(); ?>js/empresas.js"></script>
		<script src="<?php echo site_url(); ?>js/proyectos.js"></script>
		<script src="<?php echo site_url(); ?>js/seguimientos.js"></script>
		<script src="<?php echo site_url(); ?>js/evaluaciones.js"></script>
		<script src="<?php echo site_url(); ?>js/alumnos.js"></script>
		<script src="<?php echo site_url(); ?>js/general.js"></script>
	</body>
</html>