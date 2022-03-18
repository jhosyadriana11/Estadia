<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_cursos_actualizar extends CI_Model {
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
    public function get_cursos($idcurso)
    {
		$this->db->select('*');
		$this->db->from('curso');
    $this->db->where('idcurso', $idcurso);
		$query = $this->db->get();
		return $query;
    }
    function displayrecordsById($idcurso)
    {
    $query=$this->db->query("select * from curso where idcurso='".$idcurso."'");
    return $query->result();
    }
    /*Update*/
    public function update_records($idcurso,$datos)
    {
      $this->db->where('idcurso', $idcurso);
      $this->db->update('curso', $datos);
      return true;
    }
}