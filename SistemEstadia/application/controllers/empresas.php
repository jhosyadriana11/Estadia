<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class empresas extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		$this->load->model('m_empresas');
		$this->load->model('m_ubicaciones');
		$this->load->model('m_account');
		$this->load->helper('url');
		//$this->load->library('phpmailer_lib');
    }

	public function index()
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$requests = $this->m_empresas->get_empresas();
			$data = array(
				'view'	=> array ('view' => array('empresas_catalogo'), 'title' => 'Empresas'),
				'data'	=> array ('table' => $requests)
			);
			$this->load->view('template', $data);
		}
		else
		{
			redirect('../');
		}
	}
	
	
	public function nuevo()
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$requests = $this->m_ubicaciones->obtener_estados();
			$data = array ('estados' => $requests);
			
			$this->load->view('default/empresa_nueva', $data);
		}
		else
		{
			redirect('../');
		}
		
	}

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

	
	public function guadarNuevo()
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$this->m_empresas->guardar_nuevo($_POST);
			echo json_encode(true);			
		}
		else
		{
			redirect('../');
		}	
	}
	
	public function modalActualizar($id_empresa)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$datosEmpresa = $this->m_empresas->obtenerDatosEmpresa($id_empresa);
			foreach($datosEmpresa->result() as $datos): 
				$datosEdos = $this->m_ubicaciones->obtener_estados();
				$datosMuns = $this->m_ubicaciones->obtener_municipios($datos->edo);
				$datosCols = $this->m_ubicaciones->obtener_colonias($datos->mun);
			endforeach;
			
			
			
			$data = array ('datosEmpresa'=> $datosEmpresa,'estados' => $datosEdos,'datosMuns'=>$datosMuns,'datosCols'=>$datosCols);
			
			$this->load->view('default/empresa_actualizar', $data);
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
			$this->m_empresas->actualizar($_POST);
			echo json_encode(true);
		}
		else
		{
			redirect('../');
		}
	}
	
	public function modalEliminar($id_empresa)
	{
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		{
			$datosEmpresa = $this->m_empresas->obtenerDatosEmpresa($id_empresa);
			$data = array ('datosEmpresa'=> $datosEmpresa);
			
			$this->load->view('default/empresa_eliminar', $data);
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
			$this->m_empresas->eliminar($_POST);
			echo json_encode(true);
		}
		else
		{
			redirect('../');
		}
	}
}