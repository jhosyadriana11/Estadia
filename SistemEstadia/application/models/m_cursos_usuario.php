<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_cursos_usuario extends CI_Model {
    function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }
    public function get_cursos()
    {
		$this->db->select('*');
		$this->db->from('curso');
		$query = $this->db->get();
		return $query;
    }

    function savecurso($data)
	{
        $this->db->insert('detalleprocur', $data);
        return true;
	}
}