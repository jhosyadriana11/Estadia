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
    
    /*Update*/
    public function update_records($idcurso, $data)
    {
      //return $this->db->where(['idcurso', $idcurso])->update('curso', $data);
      //$this->db->where('idcurso', $idcurso);
      $this->db->update('curso', $data);
      //$query=$this->db->query("update curso SET nombrec="$data['nombrec']",material="$data['material']",examen="$data['examen']",clasificacion="$data['clasificacion']" where idcurso='".$idcurso."'");
    }
    function displayrecordsById($idcurso)
    {
    $query=$this->db->query("select * from curso where idcurso='".$idcurso."'");
    return $query->result();
    }
}