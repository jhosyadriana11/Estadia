<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class estadias extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		$this->load->model('m_proyectos');
		$this->load->model('m_seguimientos');
		$this->load->model('m_estadias');
		$this->load->model('m_alumnos');
		$this->load->model('m_empresas');
		$this->load->model('m_account');
		$this->load->helper('url');
		$this->load->library('phpmailer_lib');
		$this->load->helper('url'); //para permitir los comentarios
    }

	public function index()
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$requests = $this->m_estadias->obtener_catalogo();
			$data = array(
				'view'	=> array ('view' => array('estadias_catalogo'), 'title' => 'Estadias'),
				'data'	=> array ('table' => $requests)
			);
			$this->load->view('template', $data);
		}
		else
		{
			redirect('../');
		}
	}


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
	}
	
	public function imprimir_f1($id)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$jefavin=$this->m_proyectos->obtener_datos_jefavin()->row();
			$proyecto = $this->m_proyectos->obtener_catalogo($id)->row();
			$alumno=$this->m_alumnos->obtener_datos($proyecto->alumno_id)->row();
			$empresa=$this->m_empresas->get_empresas($proyecto->empresa_id)->row();
			//$datosActuales = $this->m_estadias->obtener_datos($id)->row();
			$data = array ('alumno' => $alumno,'proyecto' => $proyecto,'jefavin' => $jefavin,'empresa' => $empresa,'para_firma_ae' => 'NO');
			
			//$moy=array("moy"=> "ss");
			$this->load->view('default/imprimir-f1', $data);
		}
		else
		{
			redirect('../');
		}
	}
	
	public function imprimir_f1_ae($id)
	{
		$id=substr($id,6,3);	
		
		$jefavin=$this->m_proyectos->obtener_datos_jefavin()->row();
		$proyecto = $this->m_proyectos->obtener_catalogo($id)->row();
		$alumno=$this->m_alumnos->obtener_datos($proyecto->alumno_id)->row();
		$empresa=$this->m_empresas->get_empresas($proyecto->empresa_id)->row();
		//$datosActuales = $this->m_estadias->obtener_datos($id)->row();
		$data = array ('alumno' => $alumno,'proyecto' => $proyecto,'jefavin' => $jefavin,'empresa' => $empresa,'para_firma_ae' => 'SI');
		
		//$moy=array("moy"=> "ss");
		$this->load->view('default/imprimir-f1', $data);
		
	}
	
	public function modalCancelar($objeto,$id)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$datosActuales = $this->m_estadias->obtener_datos($id)->row();
			$datos = array ('datos' => $datosActuales, 'objeto' => $objeto);
			
			$this->load->view('default/estadia_cancelar', $datos);
		}
		else
		{
			redirect('../');
		}
	}	
	
	public function cancelar($objeto,$accion)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			if ($this->m_estadias->cancelar($_POST,$objeto,$accion))
			{
				echo json_encode(true);
			}
			
		}
		else
		{
			redirect('../');
		}
	}
	
	public function reenviar_correo_encuesta($id_compuesto)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{

			$id_proyecto=substr($id_compuesto,6,3);			
			if ($datos=$this->m_proyectos->obtener_catalogo($id_proyecto)->row())
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
				$mail->addAddress($datos->correo);
				$mail->Subject = 'Seguimiento de Estadía UTC';
				$mail->isHTML(true);
				
				$body = "<head><style>a:hover{background-color: gray;color: #ffffff;}</style></head>";
				$body = $body."<h2>ENCUESTA DE DESEMPEÑO DEL ASESOR ACADÉMICO</h2><hr>";
				$body = $body."<h3>Proyecto: <small>".$datos->nombre."</small></h3>";
				$body = $body."<h3>Asesor Académico: <small>".$datos->aa_nivelaca.". ".$datos->aa_nombre."</small></h3>";
				$body = $body."<h3>Cuatrimestre: <small>".$datos->nombre_periodo." ".$datos->anio."</small></h3>";
				$body = $body."<h4>Da clic en la siguiente liga para ir a la encuesta</h4>";
				$body = $body."<b><a href='https:\\sistemas.utcalvillo.edu.mx/estadia/estadias/mostrar_encuesta/".$id_compuesto."' target='_blank' style='border: 1px solid blue;padding: 5px;text-decoration:none;' >Contestar Encuesta</a></b><hr>";
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
			};
					
						
			
		}
		else
		{
			redirect('../');
		}
	}

	public function mostrar_encuesta($id_compuesto)
	{
		/*if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{*/
			$id_proyecto=substr($id_compuesto,6,3);	
			$datos_proyecto = $this->m_proyectos->obtener_catalogo($id_proyecto)->row();
			$encuestas = $this->m_proyectos->obtener_encuestas($id_proyecto);
			$filas_encuestas=$encuestas->num_rows();
			$objeto="encuesta";
			$data = array ('objeto' => $objeto, 'datos_proyecto' => $datos_proyecto, 'filas_encuestas' => $filas_encuestas);
			$this->load->view('default/encuesta',$data);

		/*}
		else
		{
			redirect('../');
		}*/
	}
	
	public function agregar_encuesta($objeto,$accion)
	{
		/*if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{*/
			if ($this->m_estadias->agregar_encuesta($_POST,$objeto,$accion))
			{
				echo json_encode("***OK***");	
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
	
	public function firmar_f1($idestadia,$area)
	{
		if ($area=="ae") 
		{
			if ($this->m_estadias->firmar_f1($idestadia,$area)) {echo json_encode(true);};
		} 
		else 
		{
			if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
			{
				if ($this->m_estadias->firmar_f1($idestadia,$area)) {echo json_encode(true);};
			}
			else
			{
				redirect('../');
			}
		}
		
		
	}
	
	public function reenviar_correo_ae_f1($idestadia)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			//$idestadia=substr($id_compuesto,6,3);
			if ($datos=$this->m_proyectos->obtener_catalogo($idestadia)->row())
			{
				$fecha_registro=str_replace(array("-", " ", ":"),"",$datos->fechahora_reg);
				$idestadia_compuesto=substr($fecha_registro,8).str_pad($datos->id,3,"0",STR_PAD_LEFT).substr($fecha_registro,9,2);
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
				$mail->Subject = 'Seguimiento de Estadía UTC';
				$mail->isHTML(true);
				
				$body = "<head><style>a:hover{background-color: gray;color: #ffffff;}</style></head>";
				$body = $body."<h2>UNIVERSIDAD TECNOLÓGICA DE CALVILLO</h2><hr>";
				$body = $body."<h2>ACTA DE PROYECTO Y AUTORIZACIÓN DE ESTADÍA</h2><hr>";
				$body = $body."<h3>Proyecto: <small>".$datos->nombre."</small></h3>";
				$body = $body."<h3>Asesor Académico: <small>".$datos->aa_nivelaca.". ".$datos->aa_nombre."</small></h3>";
				$body = $body."<h3>Cuatrimestre: <small>".$datos->nombre_periodo." ".$datos->anio."</small></h3>";
				$body = $body."<b><a href='https://sistemas.utcalvillo.edu.mx/estadia/estadias/imprimir_f1_ae/".$idestadia_compuesto."' target='_blank' style='border: 1px solid blue;padding: 5px;text-decoration:none;' >Ver y Firmar Acta</a></b><hr>";
				$body = $body."<br><br><h4 style='color:red;'>No contestar a este correo, ya que solo es de uso de envios del sistema</h4>";
				
				$mail->Body=$body;
				// Send email
				if(!$mail->send()){
					echo json_encode('Mailer Error: ' . $mail->ErrorInfo);
				}else{
					echo json_encode('***OK***');
				}
			}
		}
		else
		{
			redirect('../');
		}
	}

}