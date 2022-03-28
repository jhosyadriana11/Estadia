<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_profesores_admin extends CI_Model {
    function __construct() 
	{
        parent::__construct();
        $this->load->database();

    }

    public function get_profesores()
    {
		$this->db->select('*');
		$this->db->from('profesor');
		$query = $this->db->get();
		return $query;
    }
    
    public function get_count($idprofesor)
    {
    //$query=$this->db->query("select count(*) AS numero from detalleprocur where idprofesor='$idprofesor'");
      //SELECT COUNT(*) FROM detalleprocur WHERE idprofesor=3
    //$this->db->count('*')
    $this->db->where('idprofesor', $idprofesor);
    $this->db->select('count(idprofesor) as cursos');
		$this->db->from('detalleprocur');
    //$this->db->join('detalleprocur d', 'c.idcurso = d.idcurso');
    //$this->db->join('profesor p', 'p.idprofesor = d.idprofesor');
    //return $this->db->count_all_results('detalleprocur');  
    $query=$this->db->get();
    return $query;
    //return $query->num_rows();
    //$this->db->from('detalleprocur d');
    //$query = $this->db->get();
		//return  $query;
    //$total=$this->db->count_all('detalleprocur');
    /*$this->db->join('curso c', 'c.idcurso = d.idcurso');
    $this->db->join('profesor p', 'p.idprofesor = d.idprofesor');*/
    //$this->db->count_all('detalleprocur');
    //var_dump($rows);
    }
}