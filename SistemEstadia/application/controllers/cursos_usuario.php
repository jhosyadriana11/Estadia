<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cursos_usuario extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('m_cursos_usuario');
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
            'view'	=> array ('view' => array('cursos_catalogo'), 'title' => 'Cursos'),
            'data'	=> array ()
        );
        $this->load->view('template', $data);
	}

    
}
?>