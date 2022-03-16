<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_cursos_agregar extends CI_Model {
    function __construct() 
	{
        parent::__construct();
        $this->load->database();

    }

   /*public function cursos_agregar()
	{
		
		$data = array(
				//'usuarioid_reg' => $_SESSION["utc_id"],
				'nombrec' => $this->input->post('nombrec'),
				'material' => $this->input->post('material'),
				'examen' => $this->input->post('examen'),
				'clasificacion' => $this->select->post('clasificacion')
		);
		$this->db->insert('curso', $data);
	}*/
    /*public function insert($dato){
        $this->db->insert('curso', $dato);
        return true;
    }*/
    function saverecords($data)
	{
        $this->db->insert('curso', $data);
        return true;
	}

}