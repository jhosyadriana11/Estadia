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
      if($this->db->delete("curso")){
        return true;
      }else{
        return false;
      }
      /*if ($this->db->error() == 1451){
        try{
          $this->db->where('idcurso', $idcurso);
          $this->db->delete("curso");
          return true;    
      }
       catch (Exception $e) {
                  echo '<script type="text/javascript">
                  alert("No se puede eliminar un curso que tiene algún profesor inscrito");
                  window.location.href="../cursos_admin";
                  </script>';
       }
      }*/

    
    }
    
    function displayrecordsById($idcurso)
    {
    $query=$this->db->query("select * from curso where idcurso='".$idcurso."'");
    return $query->result();
    }
}