<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class miscursos_admin extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('m_miscursos_admin');
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
            $idprofesor=$this->input->get('idprofesor'),
            $requests = $this->m_miscursos_admin->get_cursos($idprofesor),
            'view'	=> array ('view' => array('miscursos_admin'), 'title' => 'Cursos'),
            'data'	=> array ('table' => $requests)
        );
        $this->load->view('template', $data);
	}
}
?>