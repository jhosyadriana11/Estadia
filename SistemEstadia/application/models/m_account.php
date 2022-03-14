<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_account extends CI_Model {

	function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }
	
	/*public function get_accounts($user)
    {
		$this->db->select('*');
		$this->db->from('bd_usuarios.detalle_usuarios');
		$this->db->where('Id', $user);
		$query = $this->db->get();
		return $query;
    }*/
	
	public function get_systems()
	{
		$this->db->select('nombre,ubicacion');
		$this->db->from('bd_usuarios.sistema');
		$this->db->join('bd_usuarios.permisos_sistemas', "bd_usuarios.permisos_sistemas.Sistema=bd_usuarios.sistema.id");
		$access = array('permisos_sistemas.Id' => $_SESSION['utc_id'], 'Acceso >' => 1);
		$this->db->where($access);
		$this->db->order_by('nombre', 'ASC');
		$query = $this->db->get();
		return $query;
	}
}