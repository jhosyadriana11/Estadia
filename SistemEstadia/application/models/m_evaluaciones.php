<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_evaluaciones extends CI_Model {

	function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function obtener_catalogo($estadia)
    {
    	//$this->db->select('seguimientos.*, (SELECT descripcion FROM seguimientos_estatus WHERE id=seguimientos.estatus) AS txt_estatus');
		$this->db->from('evaluaciones');
		$this->db->where('proyecto_id',$estadia);
		$query = $this->db->get();
		return $query;
    }
	
	public function existe($form,$objeto,$accion)
    {
    	$proyecto_id=$form['proyecto_id_'.$objeto.'_'.$accion];
    	$datosnc=explode(".", $form['periodo_'.$objeto.'_'.$accion]);
		
    	$this->db->select('id');
		$this->db->from('evaluaciones');
		$this->db->where('proyecto_id',$proyecto_id);
		$this->db->where('nc',trim($datosnc[0]));
		$query = $this->db->get();
		
		if ($query->num_rows()>0) {
			return true;
		}else{
			return false;
		}
    }

	public function obtener_meses_evaluacion_ciclo($proyecto_id)
	{
		$this->db->select('month_num');
		$this->db->from('proyectos');
		$this->db->join('control_escolar.period','period.id=proyectos.periodoid');
		$this->db->where('proyectos.id',$proyecto_id);
		$query = $this->db->get();
		return $query;
	}
	
	public function agregar($form,$objeto,$accion,$random)
	{
		$datosnc=explode(".", $form['periodo_'.$objeto.'_'.$accion]);
		$data = array(
				'proyecto_id' => $form['proyecto_id_'.$objeto.'_'.$accion],
				'nc_fortalezas' => mb_strtoupper($form['fortaleza_'.$objeto.'_'.$accion]),
				'nc_mejoras' => mb_strtoupper($form['mejora_'.$objeto.'_'.$accion]),
				'nc' => trim($datosnc[0]),
				'nc_periodo' => trim($datosnc[1]),
				'nc_fhr' => date("Y-m-d H:i:s"),
				'nc_usuarioidr' => $_SESSION["utc_id"],
				'nc_idrandom' => $random
		);
		
		if ($this->db->insert('evaluaciones', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function verificar_random($numero_random)
	{
		$this->db->select('COUNT(nc_idrandom) AS cantidad');
		$this->db->from('evaluaciones');
		$this->db->where('nc_idrandom',$numero_random);
		$query = $this->db->get();
		return $query;
	}
	
	public function agregar_criterios($form,$objeto,$accion,$evaluacion_id, $criterios,$tipo)
	{
		/*for ($i=1; $i <= $criterios ; $i++) 
		{ 
			$data = array(
				'evaluacion_id' => $evaluacion_id,
				'criterio' => mb_strtoupper($form[$i.'c_'.$objeto.'_'.$accion]),
				'evaluacion' => mb_strtoupper($form[$i.'e_'.$objeto.'_'.$accion]),
				'tipo' => mb_strtoupper($form[$i.'t_'.$objeto.'_'.$accion])
			);
			
			$registros_criterios[]=$data;
			
		}
		
		if ($this->db->insert_batch('evaluaciones_criterios', $registros_criterios))
		{
			return true;
		}
		*/
		
		$data = array(
				'evaluacion_id' => $evaluacion_id,
				'tipo_asesor' => $tipo,
				'criterio1' => $form['1e_'.$objeto.'_'.$accion],
				'criterio2' => $form['2e_'.$objeto.'_'.$accion],
				'criterio3' => $form['3e_'.$objeto.'_'.$accion],
				'criterio4' => $form['4e_'.$objeto.'_'.$accion],
				'criterio5' => $form['5e_'.$objeto.'_'.$accion],
				'criterio6' => $form['6e_'.$objeto.'_'.$accion],
				'criterio7' => $form['7e_'.$objeto.'_'.$accion],
				'criterio8' => $form['8e_'.$objeto.'_'.$accion],
				'criterio9' => $form['9e_'.$objeto.'_'.$accion],
				'criterio10' => $form['10e_'.$objeto.'_'.$accion],
				'criterio11' => $form['11e_'.$objeto.'_'.$accion]
			);
		if ($this->db->insert('evaluaciones_criterios', $data))
		{
			return true;
		}else{
			return false;
		}
	}
	
	public function obtener_criterios($evaluacion_id,$tipo_asesor)
	{
		$this->db->from('evaluaciones');
		$this->db->join('evaluaciones_criterios','evaluaciones.id=evaluaciones_criterios.evaluacion_id','left');
		$this->db->where('evaluacion_id',$evaluacion_id);
		$this->db->where('evaluaciones_criterios.tipo_asesor',$tipo_asesor);
		
		$query = $this->db->get();
		return $query;
	}
	
	/*public function obtener_criterios_ae($evaluacion_id,$tipo)
	{
		$this->db->from('evaluaciones');
		$this->db->join('evaluaciones_criterios_ae','evaluaciones.id=evaluaciones_criterios_ae.evaluacion_id','left');
		$this->db->where('evaluaciones.id='.$evaluacion_id.' AND evaluaciones_criterios_ae.tipo='.$tipo);
		
		$query = $this->db->get();
		return $query;
	}*/
	
	public function obtener_evaluacion($numero_random)
	{
		$this->db->select('id,nc_ae_evaluacion,nc_idrandom');
		$this->db->from('evaluaciones');
		$this->db->where('nc_idrandom',$numero_random);
		$query = $this->db->get();
		return $query;
	}
	
	public function enviar_correo_evaluacion($id)
	{
		$this->db->select('evaluaciones.nc_idrandom, evaluaciones.nc_periodo, evaluaciones.nc_ae_evaluacion, proyectos.anio, proyectos.nombre, proyectos.nombre_ae, proyectos.email_ae, alumnos.nombre AS alumno_nombre, alumnos.matricula');
		$this->db->from('evaluaciones');
		$this->db->join('proyectos','evaluaciones.proyecto_id=proyectos.id');
		$this->db->join('alumnos','proyectos.alumno_id=alumnos.id');
		$this->db->where('evaluaciones.id='.$id);
		$query = $this->db->get();
		return $query;
	}

	public function actualizar($form,$objeto,$accion)
	{
	    $evaluacion_id=$form['evaluacion_id_'.$objeto.'_'.$accion];
		$random_id=$form['random_id_'.$objeto.'_'.$accion];
		$data = array(
				'nc_ae_fortalezas' => mb_strtoupper($form['fortaleza_'.$objeto.'_'.$accion]),
				'nc_ae_mejoras' => mb_strtoupper($form['mejora_'.$objeto.'_'.$accion]),
				'nc_ae_fhr' => date("Y-m-d H:i:s"),
				'nc_ae_evaluacion' => "SI"
		);
		
		$this->db->where('nc_idrandom', $random_id);
		
		if ($this->db->update('evaluaciones', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/*public function agregar_criterios_ae($form,$objeto,$accion,$evaluacion_id, $criterios)
	{
		for ($i=1; $i <= $criterios ; $i++) 
		{ 
			$data = array(
				'evaluacion_id' => $evaluacion_id,
				'criterio' => mb_strtoupper($form[$i.'c_'.$objeto.'_'.$accion]),
				'evaluacion' => mb_strtoupper($form[$i.'e_'.$objeto.'_'.$accion]),
				'tipo' => mb_strtoupper($form[$i.'t_'.$objeto.'_'.$accion])
			);
			
			$registros_criterios[]=$data;
			
		}
		
		if ($this->db->insert_batch('evaluaciones_criterios_ae', $registros_criterios))
		{
			return true;
		}
		
	}*/

	/*public function obtener_semanas_disponibles($proyecto_id)
	{
		$this->db->select('semana');
		$this->db->from('semanas');
		$this->db->where('(WEEK(fi)=WEEK(now()) OR abierta="SI") AND semana NOT IN (SELECT semana FROM seguimientos WHERE proyecto_id='.$proyecto_id.')');
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
		$this->db->select('semana ');
		$this->db->from('semanas');
		$this->db->where('(WEEK(fi)=WEEK(now()) OR abierta="SI")');
		
		$query = $this->db->get();
		return $query;
	}
	
	public function obtener_semana_ultima($proyecto_id)
	{
		$this->db->select('MAX(semana) as semana_ultima');
		$this->db->from('seguimientos');
		$this->db->where('proyecto_id='.$proyecto_id);
		$query = $this->db->get();
		return $query;
	}
	
	public function obtener_enviar_correo($seguimiento_id)
	{
		$this->db->select('seguimientos.*, alumnos.correo');
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
	
	*/
	
}