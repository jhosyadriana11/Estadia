<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_seguimientos extends CI_Model {

	function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function obtener_catalogo($estadia)
    {
    	$this->db->select('seguimientos.*, (SELECT descripcion FROM seguimientos_estatus WHERE id=seguimientos.estatus) AS txt_estatus');
		$this->db->from('seguimientos');
		$this->db->where('proyecto_id',$estadia);
		$query = $this->db->get();
		return $query;
    }
	
	public function obtener_seguimientos_firmados($estadia)
    {
		$this->db->from('seguimientos');
		$this->db->where('proyecto_id',$estadia);
		$this->db->where('conformidad_alumno','SI');
		$query = $this->db->get();
		return $query;
    }
	
	public function agregar($form,$objeto,$accion,$random)
	{
		$data = array(
				'proyecto_id' => $form['proyecto_id_'.$objeto.'_'.$accion],
				'semana' => $form['semana_'.$objeto.'_'.$accion],
				'act_pro' => mb_strtoupper($form['ap_'.$objeto.'_'.$accion]),
				'act_real' => mb_strtoupper($form['ar_'.$objeto.'_'.$accion]),
				'obs' => mb_strtoupper($form['obs_'.$objeto.'_'.$accion]),
				'estatus' => $form['estatus_'.$objeto.'_'.$accion],
				'id_random_conformidad' => $random,
				'usuario_id_reg' => $_SESSION["utc_id"]
		);
		
		if ($this->db->insert('seguimientos', $data)){
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function obtener_semanas_disponibles($proyecto_id)
	{
		$this->db->select('semana');
		$this->db->from('semanas');
		$this->db->where('(WEEK(fi)=WEEK(now(),5) OR abierta="SI") AND semana NOT IN (SELECT semana FROM seguimientos WHERE proyecto_id='.$proyecto_id.')');
		$this->db->order_by('semana ASC');
		$this->db->limit(1);
		//$this->db->or_where('abierta="SI"');
		
		$query = $this->db->get();
		return $query;
	}
	
	public function obtener_estatus()
	{
		$this->db->select('id,descripcion');
		$this->db->from('seguimientos_estatus');
		$this->db->order_by('id','ASC');
		$query = $this->db->get();
		return $query;
	}
	
	public function obtener_semanas_activas()
	{
		$this->db->select('semana');
		$this->db->from('semanas');
		$this->db->where('(WEEK(fi)=WEEK(now(),5) OR abierta="SI")');
		
		$query = $this->db->get();
		return $query;
	}
	
	public function obtener_semana_activa()
	{
		$this->db->select('semana');
		$this->db->from('semanas');
		$this->db->where('WEEK(fi)=WEEK(now(),5)');
		$this->db->limit('1');
		$query = $this->db->get();
		return $query;
	}
	
	public function obtener_semana_ultima($proyecto_id)
	{
		$this->db->select('semana AS registrada, conformidad_alumno AS firmada');
		$this->db->from('seguimientos');
		$this->db->where('proyecto_id',$proyecto_id);
		$this->db->limit(1);
		$this->db->order_by('semana DESC');
		$query = $this->db->get();
		return $query;
	}
	
	public function obtener_enviar_correo($seguimiento_id)
	{
		$this->db->select('seguimientos.*, alumnos.correo, proyectos.nombre');
		$this->db->from('seguimientos');
		$this->db->join('proyectos','seguimientos.proyecto_id=proyectos.id');
		$this->db->join('alumnos','proyectos.alumno_id=alumnos.id');
		$this->db->where('seguimientos.id='.$seguimiento_id);
		$query = $this->db->get();
		return $query;
	}
	
	public function verificar_random($numero_random)
	{
		$this->db->select('COUNT(id_random_conformidad) AS cantidad');
		$this->db->from('seguimientos');
		$this->db->where('id_random_conformidad',$numero_random);
		$query = $this->db->get();
		return $query;
	}
	
	public function verificar_conformidad($id)
	{
		$this->db->select('conformidad_alumno');
		$this->db->from('seguimientos');
		$this->db->where('id_random_conformidad',$id);
		$query = $this->db->get();
		return $query;
	}
	
	public function registrar_conformidad($id)
	{
		$data = array(
				'fh_conformidad' => date("Y-m-d H:i:s"),
				'conformidad_alumno' => "SI"
				
		);
		$this->db->where('id_random_conformidad', $id);
		
		
		if ($this->db->update('seguimientos', $data)){
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	
}