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
    $this->db->where('estatus', 'Activo');
		$query = $this->db->get();
		return $query;
    }
    public function get_profesores($idprofesor)
    {
		$this->db->select('nombrep');
		$this->db->from('profesor');
    $this->db->where('idprofesor', $idprofesor);
    $query = $this->db->get();
		return  $query;
    }
    public function savecurso($data)
	{
      $this->db->insert('detalleprocur', $data);
      return true;
	}
}