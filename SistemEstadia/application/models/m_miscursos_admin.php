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

    public function get_profesores($idprofesor)
    {
		$this->db->select('nombrep');
		$this->db->from('profesor');
    $this->db->where('idprofesor', $idprofesor);
    $query = $this->db->get();
		return  $query;
    }

    public function get_descargas()
    {
      $archivos = scandir("uploads");
      $num=0;
      for ($i=2; $i<count($archivos); $i++)
        {
          $num++;
        }
    }
    /*public function get_count($idprofesor)
    {
      //SELECT COUNT(*) FROM detalleprocur WHERE idprofesor=3
    //$this->db->count('*'),
    $this->db->where('idprofesor', $idprofesor);
		$this->db->from('detalleprocur d');
    $this->db->join('curso c', 'c.idcurso = d.idcurso');
    $this->db->join('profesor p', 'p.idprofesor = d.idprofesor');
    $this->db->count_all_results('detalleprocur');
    //var_dump($rows);
    $query = $this->db->get();
		return  $query;
    }*/
}