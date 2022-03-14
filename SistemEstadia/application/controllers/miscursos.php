<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class miscursos extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('m_cursos_admin');
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
            'view'	=> array ('view' => array('miscursos_view'), 'title' => 'Mis cursos'),
            'data'	=> array ()
        );
        $this->load->view('template', $data);
	}

    
}
?>