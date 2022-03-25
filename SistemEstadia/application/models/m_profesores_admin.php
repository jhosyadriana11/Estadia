<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_profesores_admin extends CI_Model {
    function __construct() 
	{
        parent::__construct();
        $this->load->database();

    }

    public function get_profesores()
    {
		$this->db->select('*');
		$this->db->from('profesor');
		$query = $this->db->get();
		return $query;
    }
}