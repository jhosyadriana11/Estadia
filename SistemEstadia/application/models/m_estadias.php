<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_estadias extends CI_Model {

	function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function obtener_catalogo()
    {
		$this->db->select("proyectos.*, empresas.nombre AS nombre_empresa, alumnos.matricula, alumnos.nombre AS alumno_nombre, career.title,career.short_title ");
		$this->db->select('(SELECT nombre FROM estatus WHERE proyectos.estatus=id) AS nombre_estatus');
		//$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE proyectos.usuarioid_can=id) AS usuario_can');
		//$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE proyectos.usuarioid_aut=id) AS usuario_aut');
		$this->db->select('(SELECT title FROM control_escolar.period WHERE proyectos.periodoid=id) AS nombre_periodo');
		$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE detalle_usuarios.Id=proyectos.aa_id) AS aa_nombre');
		$this->db->from('proyectos');
		$this->db->join('empresas','proyectos.empresa_id=empresas.id','left');
		$this->db->join('alumnos','proyectos.alumno_id=alumnos.id','left');
		$this->db->join('control_escolar.career','alumnos.carreraid=career.id','left');
		
		$user_id=$_SESSION["utc_id"];
		$tipo_usuario= $_SESSION['utc_tipo'];
		
		$periodo_id=$_SESSION['utc_periodo_id'];
		$anio=date("Y");
		
		/*if ($_SESSION["utc_es"]<4) {
			$this->db->where("(aa_id=$user_id OR aa_id IN (SELECT id FROM bd_usuarios.detalle_usuarios WHERE jefe=$user_id))");
			//$this->db->where('proyectos.aa_id', $_SESSION["utc_id"]);
		}*/
		if ($_SESSION["utc_es"]<4) {
			
			if ($tipo_usuario==3) //3=Profesor
			{
				$this->db->where("aa_id=$user_id AND anio=$anio AND periodoid=$periodo_id");
				//$this->db->where('proyectos.aa_id', $_SESSION["utc_id"]);
			}
	
			
			if ($tipo_usuario==4) //4=PTC
			{
				$this->db->where("(aa_id=$user_id OR career.ptc=$user_id) AND anio=$anio AND periodoid=$periodo_id");
			}
		}else{
			$this->db->where("anio=$anio AND periodoid=$periodo_id");
		}		
		
		$this->db->order_by('empresas.nombre', 'ASC');
		$query = $this->db->get();
		return $query;
    }

	public function obtener_datos($id)
	{
		$query = $this->db->get_where('proyectos', array('id' => $id));
		return $query;
			
	}

	public function actualizar($form, $objeto)
	{
		$id = $form['id_'.$objeto.'_a'];
		$data = array(
				'nombre' => mb_strtoupper($form['nombre_'.$objeto.'_a']),
				'descripcion' => mb_strtoupper($form['descripcion_'.$objeto.'_a']),
				'objetivos' => mb_strtoupper($form['objetivos_'.$objeto.'_a']),
				'fi' => $form['fi_'.$objeto.'_a'],
				'ff' => $form['ff_'.$objeto.'_a'],
				'responsabilidades' => mb_strtoupper($form['responsabilidades_'.$objeto.'_a']),
				'autoridades' => mb_strtoupper($form['autoridades_'.$objeto.'_a']),
				'colaboracion1n' => mb_strtoupper($form['colaboracion1n_'.$objeto.'_a']),
				'colaboracion1d' => mb_strtoupper($form['colaboracion1d_'.$objeto.'_a']),
				'colaboracion1t' => mb_strtoupper($form['colaboracion1t_'.$objeto.'_a']),
				'colaboracion2n' => mb_strtoupper($form['colaboracion2n_'.$objeto.'_a']),
				'colaboracion2d' => mb_strtoupper($form['colaboracion2d_'.$objeto.'_a']),
				'colaboracion2t' => mb_strtoupper($form['colaboracion2t_'.$objeto.'_a']),
				'colaboracion3n' => mb_strtoupper($form['colaboracion3n_'.$objeto.'_a']),
				'colaboracion3d' => mb_strtoupper($form['colaboracion3d_'.$objeto.'_a']),
				'colaboracion3t' => mb_strtoupper($form['colaboracion3t_'.$objeto.'_a']),
				'colaboracion4n' => mb_strtoupper($form['colaboracion4n_'.$objeto.'_a']),
				'colaboracion4d' => mb_strtoupper($form['colaboracion4d_'.$objeto.'_a']),
				'colaboracion4t' => mb_strtoupper($form['colaboracion4t_'.$objeto.'_a']),
				'colaboracion5n' => mb_strtoupper($form['colaboracion5n_'.$objeto.'_a']),
				'colaboracion5d' => mb_strtoupper($form['colaboracion5d_'.$objeto.'_a']),
				'colaboracion5t' => mb_strtoupper($form['colaboracion5t_'.$objeto.'_a'])
		);
		$this->db->where('id', $id);
		$this->db->update('proyectos', $data);
	}	

	public function cancelar($form, $objeto, $accion)
	{
		$id = $form['id_'.$objeto.'_'.$accion];
		$data = array(
				'motivo_can' => mb_strtoupper($form['mc_'.$objeto.'_'.$accion]),
				'estatus' => "4",
				'usuarioid_can' => $_SESSION['utc_id'],
				'fechahora_can' => date("Y-m-d H:i:s")
		);
		$this->db->where('id', $id);
		
		if ($this->db->update('proyectos', $data)){
			return true;
		}
		else
		{
			return false;
		}
	}	


	public function agregar_encuesta($form,$objeto,$accion)
	{
		$data = array(
				'proyecto_id' => $form['proyecto_id_'.$objeto.'_'.$accion],
				'res1' => $form['1p_'.$objeto.'_'.$accion],
				'res2' => $form['2p_'.$objeto.'_'.$accion],
				'res3' => $form['3p_'.$objeto.'_'.$accion],
				'res4' => $form['4p_'.$objeto.'_'.$accion],
				'res5' => $form['5p_'.$objeto.'_'.$accion],
				'res6' => $form['6p_'.$objeto.'_'.$accion],
				'res7' => $form['7p_'.$objeto.'_'.$accion],
				'res8' => $form['8p_'.$objeto.'_'.$accion],
				'res9' => $form['9p_'.$objeto.'_'.$accion],
				'res10' => $form['10p_'.$objeto.'_'.$accion],
				'res11' => $form['11p_'.$objeto.'_'.$accion],
				'res12' => $form['12p_'.$objeto.'_'.$accion],
				'res13' => $form['13p_'.$objeto.'_'.$accion],
				'res14' => $form['14p_'.$objeto.'_'.$accion],
				'res15' => $form['15p_'.$objeto.'_'.$accion],
				'res16' => $form['16p_'.$objeto.'_'.$accion],
				'res17' => $form['17p_'.$objeto.'_'.$accion],
				'res18' => $form['18p_'.$objeto.'_'.$accion],
				'res19' => $form['19p_'.$objeto.'_'.$accion],
				'res19j' => $form['19pj_'.$objeto.'_'.$accion],
				'res20' => $form['20p_'.$objeto.'_'.$accion]
			);
		if ($this->db->insert('encuestas_aa', $data))
		{
			return true;
		}else{
			return false;
		}
	}

	public function obtener_reporte_asesores($ciclo,$anio)
	{
		$this->db->select("DISTINCT(proyectos.aa_id) as aa_id, detalle_usuarios.NivelEdu AS aa_nivelaca, detalle_usuarios.Nombre AS aa_nombre,proyectos.id as proyecto_id"); 
		$this->db->from('proyectos');
		$this->db->join('bd_usuarios.detalle_usuarios','detalle_usuarios.Id=proyectos.aa_id','LEFT');
		$where = array('proyectos.periodoid' => $ciclo,'proyectos.anio' => $anio,'proyectos.estatus<' => '4','proyectos.tipo' => 'L');
		$this->db->where($where);
		$this->db->group_by('proyectos.aa_id');
		$this->db->order_by('detalle_usuarios.Nombre');
		$query = $this->db->get();
		return $query;
	}	

	public function obtener_reporte_datosciclo($ciclo_id)
	{
		//se obtienen los ciclos de las estadías realizadas
		$this->db->select("title as nombre, id");
		$this->db->where('id',$ciclo_id);
		$this->db->from('control_escolar.period');
		$query = $this->db->get();
		return $query;
		
	}
	
	public function obtener_reporte_asesorados($asesor_id,$ciclo_id,$ciclo_anio)
	{
		$this->db->select("aa_id, alumno_id, proyecto_id"); 
		$this->db->from('encuestas_aa');
		$this->db->join('proyectos','proyectos.id=encuestas_aa.proyecto_id');
		$where = array('proyectos.aa_id' => $asesor_id,'proyectos.periodoid' => $ciclo_id,'proyectos.anio' => $ciclo_anio,'proyectos.estatus<' => '4','proyectos.tipo' => 'L');
		$this->db->where($where);
		$this->db->order_by('proyecto_id');
		$query = $this->db->get();
		return $query;
	}

	public function obtener_reporte_respuesta($proyecto_id,$pregunta)
	{
		$preg="res".$pregunta;
		$this->db->select($preg.' AS res'); 
		$this->db->from('encuestas_aa');
		$where = array('proyecto_id=' => $proyecto_id);
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}
	
	public function firmar_f1($idestadia, $area)
	{
		if ($area!="ae") {
			$data = array(
				'firma_'.$area => 'SI',
				'usuarioid_firma_'.$area => $_SESSION['utc_id'],
				'fh_firma_'.$area => date("Y-m-d H:i:s")
			);
		}else{
			$data = array(
				'firma_'.$area => 'SI',
				'fh_firma_'.$area => date("Y-m-d H:i:s")
			);
		}
		
		$this->db->where('id', $idestadia);
		
		if ($this->db->update('proyectos', $data)){
			return true;
		}
		else
		{
			return false;
		}
	}
	
}