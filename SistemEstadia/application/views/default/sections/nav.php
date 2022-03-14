<nav class="navbar navbar-expand-lg bg-dark navbar-dark m-0" style="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div>
  		<a class="navbar-brand" href="#"><img src="/img/logo-legacy.png" style="height: 30px;" /></a>
  		
  </div>
  <div style="font-size: 12px; font-weight: bold; color: white;">
  	<?php echo $_SESSION['utc_nombre']; ?><br><?php echo $_SESSION['utc_usuario']; ?>
  </div>
  

  <div class="collapse navbar-collapse " id="navbarTogglerDemo03" >
    <ul class="navbar-nav ml-auto mt-1 mt-lg-0">
    	<?php
    	//27 EXTENSIÓN UNIVERSITARIA
		//14 ACTIVIDADES CULTURALES Y DEPORTIVAS
		//9 SOPORTE TÉCNICO
		//if (($_SESSION["utc_departamento_id"]==9)||($_SESSION["utc_departamento_id"]==27)||($_SESSION["utc_departamento_id"]==14)) 
		//{
		?>
	    	<li class="nav-item" >
		    	<a class="nav-link" href="<?php echo site_url(); ?>profesores_admin" style="">PROFESORES</a>
		    </li>
	    
	    <?php
		//}
		
		//if (($_SESSION["utc_departamento_id"]==9)||($_SESSION["utc_departamento_id"]==27)||($_SESSION["utc_departamento_id"]==14) || ($_SESSION["utc_jefe_id"]==71) || ($_SESSION['utc_usuario']=="JOSE.SANTANA")) 
		//{
		?>
		
	        <li class="nav-item" >
	          <a class="nav-link" href="<?php echo site_url(); ?>cursos_admin" style="">CURSOS</a>
		    </li>
	    
		<?php
		//}
		
		
		//10=servicios escolares
		//if (($_SESSION["utc_departamento_id"]==10)||($_SESSION["utc_departamento_id"]==9)||($_SESSION["utc_departamento_id"]==19)|| ($_SESSION['utc_usuario']=="KARINA.GUTIERREZ")|| ($_SESSION['utc_usuario']=="JOSE.DURAN")) 
		//{
		?>
			<!--<li class="nav-item" >
		      <a class="nav-link" href="<?php echo site_url(); ?>miscursos" style="">MIS CURSOS</a>
		    </li>-->
		<?php
		//}
		?>
		
	    <?php
	    //if ($_SESSION["utc_departamento_id"]==9) {  
								?> 
	    <li class="nav-item" >
	      <a class="nav-link" href="<?php echo site_url(); ?>examenes_admin" style="">EXÁMENES</a>
	    </li>
	    <?php //} ?>
	    
	    <?php
				
		
		?>
	    	<!-- <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_reportes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          REPORTES
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 12px;">
					 <a class="dropdown-item" href="<?php echo site_url(); ?>reportes">Proyectos</a>
					 <a class="dropdown-item" href="<?php echo site_url(); ?>reportes/encuesta">Encuesta</a>
		        </div>
	      	</li>-->
	 	<?php
		
		?>
		
		
    </ul>
  </div>
</nav>