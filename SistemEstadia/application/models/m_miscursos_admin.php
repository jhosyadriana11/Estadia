<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_miscursos_admin extends CI_Model {
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
}