<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_proyectos extends CI_Model {

	function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function obtener_catalogo($proyecto_id=0)
    {
		$this->db->query("SET lc_time_names = 'es_ES';");
		$this->db->select("proyectos.*, empresas.nombre AS nombre_empresa, DATE_FORMAT(proyectos.fechahora_reg,'%d-%b-%Y %H:%i:%s') AS fecha_registro, alumnos.matricula, alumnos.correo, alumnos.nombre AS alumno_nombre, career.title,career.short_title ");
		$this->db->select('(SELECT nombre FROM estatus WHERE proyectos.estatus=id) AS nombre_estatus');
		$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE proyectos.usuarioid_can=id) AS usuario_can');
		$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE proyectos.usuarioid_aut=id) AS usuario_aut');
		$this->db->select('(SELECT title FROM control_escolar.period WHERE proyectos.periodoid=id) AS nombre_periodo');
		$this->db->select('(SELECT NivelEdu FROM bd_usuarios.detalle_usuarios WHERE detalle_usuarios.Id=proyectos.aa_id) AS aa_nivelaca');
		$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE detalle_usuarios.Id=proyectos.aa_id) AS aa_nombre');
		$this->db->select('(SELECT email FROM bd_usuarios.detalle_usuarios WHERE detalle_usuarios.Id=proyectos.aa_id) AS aa_email');
		$this->db->select('(SELECT telefono FROM bd_usuarios.detalle_usuarios WHERE detalle_usuarios.Id=proyectos.aa_id) AS aa_telefono');
		$this->db->select('(SELECT NivelEdu FROM bd_usuarios.detalle_usuarios WHERE detalle_usuarios.Id=(SELECT ptc FROM control_escolar.career WHERE alumnos.carreraid=id)) AS niveledu_ptc');
		$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE detalle_usuarios.Id=(SELECT ptc FROM control_escolar.career WHERE alumnos.carreraid=id)) AS nombre_ptc');
		$this->db->select('(SELECT email FROM bd_usuarios.detalle_usuarios WHERE detalle_usuarios.Id=(SELECT ptc FROM control_escolar.career WHERE alumnos.carreraid=id)) AS email_ptc');
		$this->db->select('(SELECT Id FROM bd_usuarios.detalle_usuarios WHERE detalle_usuarios.Id=(SELECT ptc FROM control_escolar.career WHERE alumnos.carreraid=id)) AS id_ptc');
		$this->db->select('(SELECT telefono FROM bd_usuarios.detalle_usuarios WHERE detalle_usuarios.Id=(SELECT ptc FROM control_escolar.career WHERE alumnos.carreraid=id)) AS telefono_ptc');
		$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE proyectos.usuarioid_firma_vin=Id) AS firma_vin_nombre');
		$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE proyectos.usuarioid_firma_aa=Id) AS firma_aa_nombre');
		$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE proyectos.usuarioid_firma_ptc=Id) AS firma_ptc_nombre');
		$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE proyectos.usuarioid_firma_cajas=Id) AS firma_cajas_nombre');
		$this->db->from('proyectos');
		$this->db->join('empresas','proyectos.empresa_id=empresas.id','left');
		$this->db->join('alumnos','proyectos.alumno_id=alumnos.id','left');
		$this->db->join('control_escolar.career','alumnos.carreraid=career.id','left');
		
		if ($proyecto_id>0) {
			$this->db->where('proyectos.id',$proyecto_id);
		}
		
		$this->db->order_by('empresas.nombre', 'ASC');
		$query = $this->db->get();
		return $query;
    }
	
	/*public function obtener_alumnos_asignados_catalogo($proyecto)
    {
		$this->db->select('proyectos_detalle.id, alumnos.nombre, alumnos.matricula');
		$this->db->from('proyectos_detalle');
		$this->db->join('alumnos','proyectos_detalle.alumno_id=alumnos.id','left');
		$this->db->where('proyectos_detalle.proyecto_id',$proyecto);
		$query = $this->db->get();
		return $query;
    }*/
	
	public function agregar($form,$objeto)
	{
		$data = array(
				'empresa_id' => $form['empresa_'.$objeto.'_n'],
				'solicitud' => mb_strtoupper($form['des_'.$objeto.'_n']),
				'usuarioid_reg' => $_SESSION["utc_id"],
				'periodoid' => $form['periodo_'.$objeto.'_n'],
				'anio' => $form['anio_'.$objeto.'_n'],
				'titulo_ae' => mb_strtoupper($form['titulo_ae_'.$objeto.'_n']),
				'nombre_ae' => mb_strtoupper($form['nombre_ae_'.$objeto.'_n']),
				'puesto_ae' => mb_strtoupper($form['puesto_ae_'.$objeto.'_n']),
				'email_ae' => $form['email_ae_'.$objeto.'_n'],
				'telefono_ae' => $form['tel_ae_'.$objeto.'_n'],
				'tipo' => $form['tipo_'.$objeto.'_n']
		);
		$this->db->insert('proyectos', $data);
	}
	
	public function obtener_datos($id)
	{
		$query = $this->db->get_where('proyectos', array('id' => $id));
		return $query;
			
	}
	
	public function actualizar($form,$objeto)
	{
		$id = $form['id_'.$objeto.'_a'];
		$data = array(
				'empresa_id' => $form['empresa_'.$objeto.'_a'],
				'solicitud' => mb_strtoupper($form['des_'.$objeto.'_a']),
				'periodoid' => $form['periodo_'.$objeto.'_a'],
				'anio' => $form['anio_'.$objeto.'_a'],
				'titulo_ae' => mb_strtoupper($form['titulo_ae_'.$objeto.'_a']),
				'nombre_ae' => mb_strtoupper($form['nombre_ae_'.$objeto.'_a']),
				'puesto_ae' => mb_strtoupper($form['puesto_ae_'.$objeto.'_a']),
				'email_ae' => $form['email_ae_'.$objeto.'_a'],
				'telefono_ae' => $form['tel_ae_'.$objeto.'_a'],
				'tipo' => $form['tipo_'.$objeto.'_a']
		);
		$this->db->where('id', $id);
		$this->db->update('proyectos', $data);
	}
	
	public function obtener_datos_eliminar($id)
	{
		$this->db->select('*');
		$this->db->select('(SELECT nombre FROM empresas WHERE empresas.id=empresa_id) AS nombre_empresa ');
		$this->db->from('proyectos');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query;
			
	}

	public function obtener_datos_autorizar($id)
	{
		$this->db->select('*');
		$this->db->select('(SELECT nombre FROM empresas WHERE empresas.id=empresa_id) AS nombre_empresa ');
		$this->db->select('(SELECT title FROM control_escolar.period WHERE proyectos.periodoid=id) AS nombre_periodo');
		$this->db->from('proyectos');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query;
			
	}
	
	public function eliminar($form,$objeto)
	{
		$id = $form['id_eliminar_'.$objeto];
		$this->db->where('id', $id);
		$this->db->delete('proyectos');
	}
	
	public function obtener_lista_estatus()
    {
		$this->db->select('nombre,id');
		$this->db->from('estatus');
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get();
		return $query;
    }
	
	/*public function autorizar($form,$objeto,$accion="autorizar")
	{
		
		$id = $form['id_'.$objeto."_".$accion];
		
		if ($form['estatus_'.$objeto."_".$accion]=="1") { //PENDIENTE
			$data = array(
				'observacion_gral' => mb_strtoupper($form['obs_'.$objeto."_".$accion]),
				'estatus' => $form['estatus_'.$objeto."_".$accion],
				'caa' => '0',
				'usuarioid_can' => "",
				'fechahora_can' => "",
				'usuarioid_aut' => "",
				'fechahora_aut' => ""
			);
		}

		if ($form['estatus_'.$objeto."_".$accion]=="6") { //CANCELADO
			$data = array(
				'observacion_gral' => mb_strtoupper($form['obs_'.$objeto."_".$accion]),
				'usuarioid_can' => $_SESSION['utc_id'],
				'estatus' => $form['estatus_'.$objeto."_".$accion],
				'caa' => '0',
				'fechahora_can' => date("Y-m-d H:i:s")
			);
		}

		if ($form['estatus_'.$objeto."_".$accion]=="2") { //AUTORIZADO
			$data = array(
				'observacion_gral' => mb_strtoupper($form['obs_'.$objeto."_".$accion]),
				'usuarioid_aut' => $_SESSION['utc_id'],
				'estatus' => $form['estatus_'.$objeto."_".$accion],
				'caa' => $form['caa_'.$objeto."_".$accion],
				'fechahora_aut' => date("Y-m-d H:i:s")
			);
		}
		
		$this->db->where('id', $id);
		$this->db->update('proyectos', $data);
	}*/

	public function obtener_lista_periodos()
    {
		$this->db->select('title,id');
		$this->db->from('control_escolar.period');
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get();
		return $query;
    }
	
	/*public function obtener_lista_alumnos()
    {
    	
		$this->db->select('id,matricula,nombre');
		$this->db->from('alumnos');
		$this->db->order_by('matricula', 'ASC');
		$query = $this->db->get();
		return $query;
    }*/
	
	public function obtener_datos_asignar_alumno($id)
	{
		$this->db->select('id,alumno_id');
		$this->db->from('proyectos');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query;
			
	}
	
	public function obtener_datos_asignar_asesor($id)
	{
		$this->db->select('id,aa_id');
		$this->db->from('proyectos');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query;
			
	}

	public function obtener_lista_alumnos_candidatos()
    {
    	$utc_id=$_SESSION['utc_id'];
		$query = $this->db->query("SELECT id,matricula,nombre, (SELECT title FROM control_escolar.career WHERE career.id=carreraid) as nombre_carrera 
									FROM estadia.alumnos WHERE PI<>'NO' AND estatus='ACTIVO' AND (id NOT IN (SELECT alumno_id FROM proyectos WHERE alumno_id>0 AND estatus<=2));");
		return $query;
    }

	public function obtener_lista_asesores_academicos()
    {
    	
		$this->db->select('cat_usuarios.Id,detalle_usuarios.Nombre');
		$this->db->from('bd_usuarios.cat_usuarios');
		$this->db->join('bd_usuarios.detalle_usuarios','detalle_usuarios.id=cat_usuarios.id','left');
		$asesores=array('3','4');
		$this->db->where_in('detalle_usuarios.TipoUsuario',$asesores);
		$this->db->where('cat_usuarios.Estado','ACTIVO');
		$this->db->order_by('detalle_usuarios.nombre', 'ASC');
		$query = $this->db->get();
		return $query;
    }

	
	/*public function obtener_cantidad_alumnos_asignados($id)
    {
    	
		$this->db->select('COUNT(id) AS alumnos_asignados');
		$this->db->from('proyectos_detalle');
		$this->db->where('proyecto_id',$id);
		$query = $this->db->get();
		return $query;
    }*/
	
	public function alumno_asignar($form)
	{
		$objeto="alumno";
		$accion="asignar";
		
		$id_proyecto = $form['id_'.$objeto.'_'.$accion];
		$data = array(
			'alumno_id' => $form['alumno_'.$objeto.'_'.$accion],
			'alumno_fh_reg' => date("Y-m-d H:i:s"),
			'alumno_usuarioid_reg' => $_SESSION['utc_id']						
		);
		$this->db->where('id',$id_proyecto);
		$this->db->update('proyectos', $data);
	}

	public function asesor_asignar($form)
	{
		$objeto="asesor";
		$accion="asignar";
		
		$id_proyecto=$form['id_'.$objeto.'_'.$accion];
		$data = array(
				'aa_id' => $form['aa_'.$objeto.'_'.$accion],
				'aa_fh_reg' => date("Y-m-d H:i:s"),
				'aa_usuarioid_reg' => $_SESSION['utc_id']			
		);
		$this->db->where('id',$id_proyecto);
		$this->db->update('proyectos', $data);
		
	}
	
	/*public function obtener_alumnos_asignados($id)
    {
		$this->db->select('proyectos_detalle.id, alumnos.matricula, alumnos.nombre AS alumno');
		$this->db->select('(SELECT nombre_ae FROM proyectos WHERE proyectos.id=proyecto_id) AS ae');
		$this->db->from('proyectos_detalle');
		$this->db->join('alumnos','alumnos.id=proyectos_detalle.alumno_id','left');
		$this->db->where('proyectos_detalle.proyecto_id',$id);
		$this->db->order_by('alumnos.nombre', 'ASC');
		$query = $this->db->get();
		return $query;
    }*/
	
	/*public function desasignar($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('proyectos_detalle');
	}*/
	
	public function cambiar_estatus($proyecto_id,$estatus)
	{
		$id = $proyecto_id;
		$data = array(
				'estatus' => $estatus,
				'usuarioid_cer' => $_SESSION['utc_id'],
				'fechahora_cer' => date("Y-m-d H:i:s")
		);
		$this->db->where('id', $id);
		$this->db->update('proyectos', $data);
	}
	
	public function obtener_proyectos_reporte()
    {

		$this->db->select("alumnos.nombre AS alumno_nombre, career.short_title, alumnos.sexo, alumnos.matricula,empresas.nombre AS empresa_nombre, empresas.dir, localidades.nombre AS colonia_nombre, municipios.nombre AS municipio_nombre, estados.nombre AS estado_nombre, empresas.nombre_contacto, empresas.puesto_contacto, empresas.email_contacto,empresas.tel_contacto, proyectos.descripcion, proyectos.observacion_gral ");
		$this->db->select('(SELECT Nombre FROM bd_usuarios.detalle_usuarios WHERE detalle_usuarios.Id=proyectos.aa_id) AS aa_nombre');
		$this->db->from('proyectos');
		$this->db->join('empresas','proyectos.empresa_id=empresas.id','left');
		$this->db->join('alumnos','proyectos.alumno_id=alumnos.id','left');
		$this->db->join('control_escolar.career','alumnos.carreraid=career.id','left');
		$this->db->join('mexico.localidades','localidades.Id=colonia_id','left');
		$this->db->join('mexico.municipios','municipios.Id=localidades.municipio_id','left');
		$this->db->join('mexico.estados','estados.Id=municipios.estado_id','left');
		$this->db->where('proyectos.aa_id>','0');
		$query = $this->db->get();
		return $query;
 
    }
    
    public function obtener_datos_jefavin()
    {
    	$this->db->select('*');
    	$this->db->from('bd_usuarios.detalle_usuarios');
    	$this->db->where('id','80');
    	$query = $this->db->get();
		return $query;
    }
    
    public function obtener_encuestas($id_proyecto)
    {
		$this->db->from('encuestas_aa');
		$this->db->where('proyecto_id',$id_proyecto);
		$query = $this->db->get();
		return $query;
    }
	
	public function obtener_ciclos()
	{
		//se obtienen los ciclos de las estadías realizadas
		$this->db->select("DISTINCT(periodoid) as id_periodo, (SELECT title FROM control_escolar.period WHERE proyectos.periodoid=id) AS nombre_periodo, proyectos.anio as anio_periodo");
		$this->db->where('proyectos.estatus<','4');
		$this->db->where('proyectos.tipo','L');
		$this->db->from('proyectos');
		$query = $this->db->get();
		return $query;
		
	}

	
}