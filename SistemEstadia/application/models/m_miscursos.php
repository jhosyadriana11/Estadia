<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_miscursos extends CI_Model {
    function __construct() 
	{
        parent::__construct();
        $this->load->database();
        /*$DB1 = $this->load->database('default', TRUE);
        $DB1->from('curso');
        $query = $DB1->get();
        if (!$DB1->conn_id) {
        echo 'DB connection error!';*/

    }
    public function get_cursos($idprofesor)
    {
		$this->db->select('*');
		$this->db->from('curso c');
    $this->db->join('detalleprocur d', 'c.idcurso = d.idcurso');
    $this->db->join('profesor p', 'p.idprofesor = d.idprofesor');
    $this->db->where('d.idprofesor', $idprofesor);
    $query = $this->db->get();
		return  $query;
    }

    public function get_profesores($idprofesor)
    {
		$this->db->select('nombrep');
		$this->db->from('profesor');
    $this->db->where('idprofesor', $idprofesor);
    $query = $this->db->get();
		return  $query;
    }
    
    function save()
	{
        $this->db->set('evidencia', $config['file_name']);
        $this->db->insert('detalleprocur');
        return true;
	}
}