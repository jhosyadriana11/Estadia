<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class evaluaciones extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		$this->load->model('m_estadias');
		$this->load->model('m_evaluaciones');
		$this->load->model('m_account');
		$this->load->model('m_proyectos');
		$this->load->library('phpmailer_lib');
		$this->load->helper('url'); //para permitir los comentarios
    }

	public function index($proyecto_id)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$proyecto = $this->m_proyectos->obtener_catalogo($proyecto_id);
			$evaluaciones = $this->m_evaluaciones->obtener_catalogo($proyecto_id);
			$data = array(
				'view'	=> array ('view' => array('evaluaciones_catalogo'), 'title' => 'evaluaciones'),
				'data'	=> array ('proyecto' => $proyecto, 'evaluaciones' => $evaluaciones)
			);
			$this->load->view('template', $data);
		}
		else
		{
			redirect('../');
		}
	}
	
	public function modalNuevo($objeto,$proyecto_id)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			//$estatus = $this->m_evaluaciones->obtener_estatus();
			//$semanas = $this->m_evaluaciones->obtener_semanas_disponibles($proyecto_id);
			$meses = $this->m_evaluaciones->obtener_meses_evaluacion_ciclo($proyecto_id)->row();
			$data = array ('objeto' => $objeto,'proyecto_id' => $proyecto_id,'meses' => $meses);
			
			$this->load->view('default/evaluacion_nuevo',$data);

		}
		else
		{
			redirect('../');
		}
		
	}

	
	public function agregar($objeto,$accion,$criterios)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			//Validar que no exista esa evaluacion
			if($this->m_evaluaciones->existe($_POST,$objeto,$accion))
			{
				echo json_encode("Ya existe evaluación!");	
			}
			else
			{
				$inserto=0;
				while ($inserto == 0)
				{
					$random=mt_rand();
					$existe_random=$this->m_evaluaciones->verificar_random($random)->row();
					
					if($existe_random->cantidad<1)
					{
						if ($this->m_evaluaciones->agregar($_POST,$objeto,$accion,$random))
						{
							$evaluacion_id = $this->db->insert_id();
							if ($this->m_evaluaciones->agregar_criterios($_POST,$objeto,$accion,$evaluacion_id,$criterios,"aa"))
							{
								echo json_encode("***OK***");	
								$inserto=1;
							}else{
								echo json_encode("Error en el registro de criterios!");
							}
						}
						else{
							echo json_encode("Error en el registro!");
						}
					}
				}
			}
		}
		else
		{
			redirect('../');
		}	
	}
	
	public function imprimir($proyecto_id,$evaluacion_id)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$datosActuales = $this->m_estadias->obtener_datos($proyecto_id)->row();
			$criterios_aa = $this->m_evaluaciones->obtener_criterios($evaluacion_id,"aa")->row();
			$criterios_ae = $this->m_evaluaciones->obtener_criterios($evaluacion_id,"ae")->row();
						
			$data = array ('datosActuales' => $datosActuales,'criterios_aa' => $criterios_aa, 'criterios_ae' => $criterios_ae);
			
			//$moy=array("moy"=> "ss");
			$this->load->view('default/imprimir-f3', $data);
		}
		else
		{
			redirect('../');
		}
	}
	
	public function reenviar_correo_evaluacion($id)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{	
			if ($datos=$this->m_evaluaciones->enviar_correo_evaluacion($id)->row())
			{
				$mail = $this->phpmailer_lib->load();
				$mail->CharSet = 'UTF-8';
				$mail->isSMTP();
				$mail->Host     = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'sistema.estadias@utcalvillo.edu.mx';
				$mail->Password = 'sistema.estadias-100621';
				$mail->SMTPSecure = 'tlc';
				$mail->Port     = 587;
				$mail->setFrom('sistema.estadias@utcalvillo.edu.mx','Sistema de Estadías');
				//$mail->addAddress('moises.alvarez@utcalvillo.edu.mx');
				$mail->addAddress($datos->email_ae);
				$mail->Subject = 'Evaluación de Periodo de Estadía UTC';
				$mail->isHTML(true);
				
				$body = "<h1>EVALUACIÓN DE ESTADÍA</h1><br>";
				$body = $body."<h3>Asesor Empresarial: <small>".$datos->nombre_ae."</small></h3>";
				$body = $body."<h3>Proyecto: <small>".$datos->nombre."</small></h3>";
				$body = $body."<h3>Alumno: <small>".$datos->alumno_nombre."</small></h3>";
				$body = $body."<h3>Periodo: <small>".$datos->nc_periodo." ".$datos->anio."</small></h3><br>";
				$body = $body."<h4>Da clic en la siguiente liga para evaluar el periodo de estadía</h4>";
				$body = $body."<b><a href='https://sistemas.utcalvillo.edu.mx/estadia/evaluaciones/evaluar_periodo_ae/".$datos->nc_idrandom."'  target='_blank' >Evaluar Periodo</a></b>";
				$body = $body."<br><br><h4 style='color:red;'>No contestar a este correo, ya que solo es de uso de envios del sistema</h4>";
				
				$mail->Body=$body;
				// Send email
				if(!$mail->send()){
					echo json_encode('Mailer Error: ' . $mail->ErrorInfo);
				}else{
					echo json_encode('***OK***');
				}
			}else{
				echo json_encode('Se registró el seguimiento pero no se pudo enviar el Correo, podría ser porque no tiene registrado o no es correcto.');
			}
					
			
		}
		else
		{
			redirect('../');
		}
			//redirect('/');
				
			
	}
	
	public function evaluar_periodo_ae($id_random)
	{
		/*if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{*/
			$datos_evaluacion = $this->m_evaluaciones->obtener_evaluacion($id_random)->row();
			
			$objeto="evaluacion";
			
			$data = array ('objeto' => $objeto, 'datos_evaluacion' => $datos_evaluacion);
						
			$this->load->view('default/evaluacion_ae',$data);

		/*}
		else
		{
			redirect('../');
		}*/
	}
	
	public function agregar_evaluacion_ae($objeto,$accion,$criterios)
	{
		/*if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{*/
			if ($this->m_evaluaciones->actualizar($_POST,$objeto,$accion))
			{
				$evaluacion_id=$_POST['evaluacion_id_'.$objeto.'_'.$accion];
				if ($this->m_evaluaciones->agregar_criterios($_POST,$objeto,$accion,$evaluacion_id,$criterios,"ae"))
				{
					echo json_encode("***OK***");	
				}else{
					echo json_encode("Error en el registro de criterios!");
				}
			}
			else{
				echo json_encode("Error en el registro!");
			}
			
		/*}
		else
		{
			redirect('../');
		}	*/
	}
	

	
	
/*
	public function firmar($id)
	{
		$firmado=$this->m_evaluaciones->verificar_conformidad($id)->row();
		
		if ($firmado->conformidad_alumno!="SI") {
			if ($this->m_evaluaciones->registrar_conformidad($id))
			{
				echo "<head><meta http-equiv='Refresh' content='2;url=http://www.utcalvillo.edu.mx'></head><br><br><br><div style='width:100%; text-align:center; padding: 20px; border: 2px solid gray;'><h2>Se ha firmado tu seguimiento de estadía</h2><h1>Gracias</h1></div>";
			}
			else
			{
				echo "Error de Registro";
			}
		}
		else
		{
			echo  "<head><meta http-equiv='Refresh' content='2;url=http://www.utcalvillo.edu.mx'></head><br><br><br><div style='width:100%; text-align:center; padding: 20px; border: 2px solid gray;'><h2>Seguimiento ya se encontraba firmado</h2><h1>Gracias</h1></div>";	
		}
	
	}

/*
	public function modalActualizar($id)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$datosActuales = $this->m_estadias->obtener_datos($id)->row();
			$data = array ('datosActuales' => $datosActuales);
			
			$this->load->view('default/estadia_actualizar', $data);
		}
		else
		{
			redirect('../');
		}
	}
	
	public function actualizar($objeto)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$this->m_estadias->actualizar($_POST,$objeto);
			echo json_encode(true);
		}
		else
		{
			redirect('../');
		}
	}*/
	

}