<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class examenes_usuario extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('m_examenes_usuario');
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
            'view'	=> array ('view' => array('examen_usuario'), 'title' => 'Examen'),
            'data'	=> array ()
        );
        $this->load->view('template', $data);
	}
}
?>