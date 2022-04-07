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
        $idprofesor=$this->input->get('idprofesor');
        
        //$requests2 = $this->m_profesores_admin->get_count($idprofesor)
		$data = array(
            $requests = $this->m_profesores_admin->get_profesores(),
            'view'	=> array ('view' => array('profesor_admin_view'), 'title' => 'Profesor'),
            'data'	=> array ('table' => $requests)
        );
        $this->load->view('template', $data);
	}

    /*public function get_count2()
    {
        $idprofesor=$this->input->get('idprofesor');
        if($num = $this->m_profesores_admin->get_count($idprofesor))
        {
            $count[''] = $num;
        }
        $this->load->view('profesor_admin_view',$count);
    
    }*/
}
?>