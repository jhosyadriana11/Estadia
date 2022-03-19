<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class miscursos extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('m_miscursos');
      //$this->load->helper('form');
		//$this->load->model('m_ubicaciones');
		//$this->load->model('m_account');
		$this->load->helper('url');
		//$this->load->library('phpmailer_lib');
		
    }
    
    public function index()
	{
        $_SESSION['utc_ch']=2;
		$data = array(
            $requests = $this->m_miscursos->get_cursos(),
            'view'	=> array ('view' => array('miscursos_view'), 'title' => 'Mis cursos'),
            'data'	=> array ('table' => $requests)
        );
        $this->load->view('template', $data);
	}
}
?>