<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_alumnos extends CI_Model {

	function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function get_alumnos()
    {
		$this->db->select('alumnos.*,career.title,career_level.short_title, career.short_title AS SiglaCarrera');
		$this->db->select('(SELECT nombre FROM proyectos WHERE proyectos.alumno_id=id LIMIT 1) AS alumno_asignado');
		$this->db->from('alumnos');
		$this->db->join('control_escolar.career','alumnos.carreraid=career.id','left');
		$this->db->join('control_escolar.career_level','career.level=career_level.id','left');
		$query = $this->db->get();
		return $query;
    }
	
	public function obtener_carreras()
    {
		$this->db->select('career.id, career.title, career_level.short_title');
		$this->db->from('control_escolar.career');
		$this->db->join('control_escolar.career_level','career.level=career_level.id');
		$this->db->order_by('career_level.id', 'ASC');
		$this->db->order_by('career.title', 'ASC');
		$query = $this->db->get();
		return $query;
    }
	
	public function agregar($form)
	{
		$accion="alumno_agregar";
		$data = array(
				'usuarioid_reg' => $_SESSION["utc_id"],
				'matricula' => $form['matricula_'.$accion],
				'nombre' => strtoupper($form['nombre_'.$accion]),
				'carreraid' => strtoupper($form['carrera_'.$accion]),
				'sexo' => $form['sexo_'.$accion],
				'imss' => $form['imss_'.$accion],
				'correo' => $form['correo_'.$accion],
				'telefono' => $form['tel_'.$accion],
				'tipo' => $form['tipo_'.$accion],
				'estatus' => $form['estatus_'.$accion],
				'observacion' => strtoupper($form['observacion_'.$accion])
		);
		$this->db->insert('alumnos', $data);
	}

	public function obtener_datos($id)
	{
		$this->db->select('alumnos.*,CONCAT(career_level.short_title," ",career.title) AS carrera');
		$this->db->from('alumnos');
		$this->db->join('control_escolar.career','alumnos.carreraid=career.id','left');
		$this->db->join('control_escolar.career_level','career.level=career_level.id','left');
		$this->db->where('alumnos.id',$id);
		
		$query = $this->db->get();
		return $query;
			
	}
	
	public function eliminar($form)
	{
		$accion="alumno_eliminar";
		
		$id = $form['id_'.$accion];
		$this->db->where('id', $id);
		$this->db->delete('alumnos');
	}
	
	public function actualizar($form)
	{
		$accion="alumno_actualizar";
		
		$id = $form['id_'.$accion];
		$data = array(
				'usuarioid_reg' => $_SESSION["utc_id"],
				'matricula' => $form['matricula_'.$accion],
				'nombre' => strtoupper($form['nombre_'.$accion]),
				'carreraid' => strtoupper($form['carrera_'.$accion]),
				'sexo' => $form['sexo_'.$accion],
				'imss' => $form['imss_'.$accion],
				'correo' => $form['correo_'.$accion],
				'telefono' => $form['tel_'.$accion],
				'tipo' => $form['tipo_'.$accion],
				'estatus' => $form['estatus_'.$accion],
				'observacion' => strtoupper($form['observacion_'.$accion])
		);
		$this->db->where('id', $id);
		$this->db->update('alumnos', $data);
	}

	public function pago_registrar($form)
	{
		$accion="pago_registrar";
		
		$id = $form['id_'.$accion];
		$data = array(
				'pi_usuarioid_reg' => $_SESSION["utc_id"],
				'pi' => $form['pi_'.$accion],
				'pi_fecha' => $form['pif_'.$accion],
				'pi_fechahora_reg' => date('Y-m-d')
		);
		$this->db->where('id', $id);
		$this->db->update('alumnos', $data);
	}
}