<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alumnos extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		$this->load->model('m_alumnos');
		//$this->load->helper('form');
		//$this->load->model('m_ubicaciones');
		$this->load->model('m_account');
		$this->load->helper('url');
		//$this->load->library('phpmailer_lib');
    }

	public function index()
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$requests = $this->m_alumnos->get_alumnos();
			$data = array(
				'view'	=> array ('view' => array('alumnos_catalogo'), 'title' => 'Alumnos'),
				'data'	=> array ('table' => $requests)
			);
			$this->load->view('template', $data);
		}
		else
		{
			redirect('../');
		}
	}
	
	
	public function modal_agregar()
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$carreras = $this->m_alumnos->obtener_carreras();
			$data = array ('carreras' => $carreras);
			
			$this->load->view('default/alumno_agregar',$data);
		}
		else
		{
			redirect('../');
		}
		
	}
	
	public function agregar()
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$this->m_alumnos->agregar($_POST);
			echo json_encode(true);			
		}
		else
		{
			redirect('../');
		}	
	}
/*
	public function estado($id)
	{
		$muns = $this->m_ubicaciones->obtener_municipios($id);
		echo json_encode($muns->result());
	}
	
	public function municipio($id)
	{
		$cols = $this->m_ubicaciones->obtener_colonias($id);
		echo json_encode($cols->result());
	}

	*/
	
	
	public function modal_actualizar($id)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$carreras = $this->m_alumnos->obtener_carreras();
			$request = $this->m_alumnos->obtener_datos($id)->row();
			$datos = array ('datos'=> $request,'carreras'=> $carreras);
			
			$this->load->view('default/alumno_actualizar', $datos);
		}
		else
		{
			redirect('../');
		}
	}
	
	public function actualizar()
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$this->m_alumnos->actualizar($_POST);
			echo json_encode(true);
		}
		else
		{
			redirect('../');
		}
	}
	
	public function modal_eliminar($id)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$request = $this->m_alumnos->obtener_datos($id)->row();
			$datos = array ('datos'=> $request);
			
			$this->load->view('default/alumno_eliminar', $datos);
		}
		else
		{
			redirect('../');
		}
	}
	
	public function eliminar()
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$this->m_alumnos->eliminar($_POST);
			echo json_encode(true);
		}
		else
		{
			redirect('../');
		}
	}
	
	public function modal_registrarpago($id)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$request = $this->m_alumnos->obtener_datos($id)->row();
			$datos = array ('datos'=> $request);
			
			$this->load->view('default/alumno_registrarpago', $datos);
		}
		else
		{
			redirect('../');
		}
	}
	
	public function pago_registrar()
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$this->m_alumnos->pago_registrar($_POST);
			echo json_encode(true);
		}
		else
		{
			redirect('../');
		}
	}
}