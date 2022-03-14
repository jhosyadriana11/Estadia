<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	
	
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_account');
		$this->load->helper('url');
		$this->load->library('phpmailer_lib');
    }

	public function index()
	{

		$_SESSION['utc_id']="utcalvillo";
		$_SESSION['utc_ch']=2;
		$_SESSION['utc_nombre']="UTCalvillo CH";
		$_SESSION['utc_usuario']="utcalvillo";
		
		if(isset($_SESSION['utc_id']) && $_SESSION['utc_ch']>1)
		{
		
			//$requests = $this->m_home->get_empresas();
			$data = array(
				'view'	=> array ('view' => array('bienvenido'), 'title' => 'home'),
				'data'	=> null
			);
			$this->load->view('template', $data);
		}
		else
		{
			redirect('../');
		}
	}
	
}