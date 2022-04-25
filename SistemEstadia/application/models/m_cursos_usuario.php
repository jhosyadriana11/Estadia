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

    public function savecurso($idprofesor, $idcurso)
    {
      $sql = "insert into detalleprocur (idprofesor, idcurso, evidencia)
      values ('.$idprofesor.','.$idcurso.','')";
      $this->db->query($sql);
      return true;
      /*$this->db->select('idcurso');
      $this->db->from('curso c');
      $this->db->join('detalleprocur d', 'c.idcurso = d.idcurso');
      $this->db->join('profesor p', 'p.idprofesor = d.idprofesor');
      $this->db->where('d.idprofesor', $idprofesor);
      $this->db->where('d.idcurso', $idcurso);
      $this->db->insert('detalleprocur');
      return true;*/
      /*9$this->db->select('idprofesor');
      $this->db->from('profesor');
      $this->db->where('idprofesor', $idprofesor);
      $this->db->select('idcurso');
      $this->db->from('curso');
      $this->db->where('idcurso', $idcurso);
      $query = $this->db->get();
      return  $query;
      $this->db->set('idprofesor', $idprofesor);
      $this->db->set('idcurso', $idcurso);
      $this->db->insert('detalleprocur');
      return  true;*/
	}
}