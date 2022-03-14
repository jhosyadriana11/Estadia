<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account extends CI_Controller {
	
	function __construct()
	{
        parent::__construct();
		$this->load->helper('url');
    }

	public function logout()
	{
		session_destroy();
		redirect('../');
	}
}
