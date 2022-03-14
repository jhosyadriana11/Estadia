<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_empresas extends CI_Model {

	function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function get_empresas($idEmpresa=0)
    {
    	if ($idEmpresa>0)
		{
			$this->db->where('empresas.id',$idEmpresa);
		}
		$this->db->select('empresas.*, localidades.nombre AS col, municipios.nombre AS mun, estados.nombre AS edo');
		$this->db->select('(SELECT COUNT(id) FROM proyectos WHERE empresa_id=empresas.id) AS CantProyectos ');
		$this->db->from('empresas');
		$this->db->join('mexico.localidades','empresas.colonia_id=localidades.id','left');
		$this->db->join('mexico.municipios','localidades.municipio_id=municipios.id','left');
		$this->db->join('mexico.estados','municipios.estado_id=estados.id','left');
		$this->db->order_by('empresas.nombre', 'ASC');
		$query = $this->db->get();
		return $query;
    }
	
	public function obtener_lista_empresas()
    {
		$this->db->select('nombre,id');
		$this->db->from('empresas');
		$this->db->order_by('empresas.nombre', 'ASC');
		$query = $this->db->get();
		return $query;
    }
	
	
	public function guardar_nuevo($form)
	{
		$data = array(
				'nombre' => mb_strtoupper($form['nombre']),
				'dir' => mb_strtoupper($form['dir']),
				'colonia_id' => $form['col'],
				'tel' => $form['tel'],
				'cp' => $form['cp'],
				'titulo_contacto' => mb_strtoupper($form['titulo_con']),
				'nombre_contacto' => mb_strtoupper($form['nombre_con']),
				'puesto_contacto' => mb_strtoupper($form['puesto_con']),
				'tel_contacto' => $form['tel_con'],
				'email_contacto' => $form['email_con'],
				'giro' => mb_strtoupper($form['giro']),
				'trabajadores' => $form['trabajadores']
				
		);
		$this->db->insert('empresas', $data);
	}
	
	public function obtenerDatosEmpresa($idEmpresa)
	{
		$this->db->select('empresas.*, localidades.id AS col, municipios.id AS mun, estados.id AS edo');
		$this->db->select('localidades.nombre AS colname, municipios.nombre AS munname, estados.nombre AS edoname');
		$this->db->from('empresas');
		$this->db->join('mexico.localidades','empresas.colonia_id=localidades.id','left');
		$this->db->join('mexico.municipios','localidades.municipio_id=municipios.id','left');
		$this->db->join('mexico.estados','municipios.estado_id=estados.id','left');
		$this->db->where('empresas.id',$idEmpresa);
		$query = $this->db->get();
		return $query;
		/*$query = $this->db->query('SELECT * FROM my_table WHERE id=1 LIMIT 1');
		$row = $query->row();
		return $query;*/
			
	}
	
	public function actualizar($form)
	{
		$id = $form['id_act'];
		$data = array(
				'nombre' => strtoupper($form['nombre_act']),
				'dir' => strtoupper($form['dir_act']),
				'colonia_id' => $form['col_act'],
				'tel' => $form['tel_act'],
				'cp' => $form['cp_act'],
				'titulo_contacto' => mb_strtoupper($form['titulo_con_act']),
				'nombre_contacto' => mb_strtoupper($form['nombre_con_act']),
				'puesto_contacto' => mb_strtoupper($form['puesto_con_act']),
				'tel_contacto' => $form['tel_con_act'],
				'email_contacto' => $form['email_con_act']				,
				'giro' => strtoupper($form['giro_act']),
				'trabajadores' => $form['trabajadores_act']
		);
		$this->db->where('id', $id);
		$this->db->update('empresas', $data);
	}

	public function eliminar($form)
	{
		$id = $form['id_eliminar'];
		$this->db->where('id', $id);
		$this->db->delete('empresas');
	}
	
}