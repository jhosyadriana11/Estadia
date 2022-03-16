
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
    /*public function get_cursos()
    {
		$this->db->select('*');
		$this->db->from('curso');
		$query = $this->db->get();
		return $query;
    }*/
    function display_records()
	{
	$query=$this->db->query("select * from curso");
	return $query->result();
	}
      function displayrecordsById($idcurso)
      {
      $query=$this->db->query("select * from curso where idcurso='".$idcurso."'");
      return $query->result();
      }
      /*Update*/
      function update_records($nombrec,$material,$examen, $clasificacion, $idcurso)
      {
      $query=$this->db->query("update curso SET nombrec='$nombrec',material='$material',examen='$examen',clasificacion='$clasificacion' where idcurso='$idcurso'");
      }
}