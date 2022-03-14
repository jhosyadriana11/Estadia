<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_ubicaciones extends CI_Model {

	function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function obtener_estados()
    {
		$this->db->select('*');
		$this->db->from('mexico.estados');
		$query = $this->db->get();
		return $query;
    }
	
	public function obtener_municipios($edo_id)
    {
		$this->db->select('*');
		$this->db->from('mexico.municipios');
		$this->db->where('estado_id',$edo_id);
		$this->db->order_by('nombre');
		$query = $this->db->get();
		return $query;
    }
	
	public function obtener_colonias($mun_id)
    {
		$this->db->select('*');
		$this->db->from('mexico.localidades');
		$this->db->where('municipio_id',$mun_id);
		$this->db->order_by('nombre');
		$query = $this->db->get();
		return $query;
    }
	
}