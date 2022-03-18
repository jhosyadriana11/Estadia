<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_cursos_admin extends CI_Model {
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
    /*function display_records()
  {
    $query=$this->db->get("curso");
    return $query->result();
  }*/
  public function get_cursos()
    {
		$this->db->select('*');
		$this->db->from('curso');
		$query = $this->db->get();
		return $query;
    }
    public function deleterecords($idcurso)
    {
      $this->db->where('idcurso', $idcurso);
      $this->db->delete("curso");
      return true;
    }
    function displayrecordsById($idcurso)
    {
    $query=$this->db->query("select * from curso where idcurso='".$idcurso."'");
    return $query->result();
    }
}