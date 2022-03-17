<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cursos_actualizar extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('m_cursos_actualizar');
      //$this->load->helper('form');
		//$this->load->model('m_ubicaciones');
		//$this->load->model('m_account');
		$this->load->helper('url');
		//$this->load->library('phpmailer_lib');
		
    }
    public function index()
	{
        $_SESSION['utc_ch']=4;
		$data = array(
            $requests = $this->m_cursos_actualizar->get_cursos(),
            'view'	=> array ('view' => array('cursos_actualizar_view'), 'title' => 'Cursos'),
            'data'	=> array ('table' => $requests)
        );
        $this->load->view('template', $data);
	}
    public function updatedata()
	{
	$idcurso=$this->input->get('idcurso');
	$result['data']=$this->m_cursos_actualizar->displayrecordsById($idcurso);
	$this->load->view('cursos_actualizar_view',$result);
	
    if($this->input->post('update'))
    {
    $nombrec=$this->input->post('nombrec');
    $material=$this->input->post('material');
    $examen=$this->input->post('examen');
    $clasificacion=$this->input->post('clasificacion');
    $this->m_cursos_actualizar->update_records($nombrec, $material, $examen, $clasificacion, $idcurso);
    echo "Date updated successfully !";
    }
	}
}
