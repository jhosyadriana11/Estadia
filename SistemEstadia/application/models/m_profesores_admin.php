<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_profesores_admin extends CI_Model {
    function __construct() 
	{
        parent::__construct();
        $this->load->database();

    }

    public function get_profesores()
    {
		$this->db->select('p.idprofesor, p.nombrep, count(d.idprofesor) as total');
		$this->db->from('profesor p');
    $this->db->join('detalleprocur d', 'p.idprofesor = d.idprofesor','left');
    $this->db->group_by('p.idprofesor');
		$query = $this->db->get();
		return $query;
    }
}