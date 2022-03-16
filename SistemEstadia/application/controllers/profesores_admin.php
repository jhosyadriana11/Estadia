<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profesores_admin extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('m_profesores_admin');
        //$this->load->helper('form');
		//$this->load->model('m_ubicaciones');
		//$this->load->model('m_account');
		$this->load->helper('url');
		//$this->load->library('phpmailer_lib');
		
    }
    
    public function index()
	{
        $_SESSION['utc_ch']=4;
        $requests = $this->m_profesores_admin->get_profesores();
		$data = array(
            'view'	=> array ('view' => array('profesor_admin_view'), 'title' => 'Profesor'),
            'data'	=> array ('table' => $requests)
        );
        $this->load->view('template', $data);
	}
}
?>