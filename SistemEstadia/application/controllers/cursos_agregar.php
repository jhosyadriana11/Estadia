<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cursos_agregar extends CI_Controller {
    function __construct()
	{
        parent::__construct();
        $this->load->database();
		$this->load->model('m_cursos_agregar');
      //$this->load->helper('form');
		//$this->load->model('m_ubicaciones');
		//$this->load->model('m_account');
		$this->load->helper('url');
		//$this->load->library('phpmailer_lib');
		
    }
    
    public function index()
	{
        $_SESSION['utc_ch']=4;
		$data = array(
            'view'	=> array ('view' => array('cursos_agregar_view'), 'title' => 'Agregar Curso'),
            'data'	=> array ()
        );
        $this->load->view('template', $data);
	}

    /*public function cursos_agregar()
	{
		
			$this->m_cursos_agregar->cursos_agregar($_POST);
			echo json_encode(true);			
	}*/
    public function savedata()
	{
		/*load registration view form*/
		//$this->load->view('cursos_agregar_view');
	
		/*Check submit button */
		if($this->input->post('save'))
		{
		    $data['nombrec']=$this->input->post('nombrec');
			$data['material']=$this->input->post('material');
			$data['examen']=$this->input->post('examen');
            $data['clasificacion']=$this->input->post('clasificacion');
			$response=$this->m_cursos_agregar->saverecords($data);
			if($response==true){
			        echo '<script type="text/javascript">
                    alert("Curso agregado correctamente");
                    window.location.href="../cursos_admin";
                    </script>';
			}
			else{
					echo "Insert error !";
			}
		}
	}

}
?>