<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cursos_actualizar extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('m_cursos_actualizar');
      //$this->load->helper('form');
		//$this->load->model('m_ubicaciones');
		//$this->load->model('m_account');
		$this->load->helper('url');
		//$this->load->library('phpmailer_lib');
		
    }
    public function index()
	{
        $_SESSION['utc_ch']=4;
		
	}
    
    public function updatedata()
	{
        $data = array(
            $idcurso=$this->input->get('idcurso'),
            $requests = $this->m_cursos_actualizar->get_cursos($idcurso),
            'view'	=> array ('view' => array('cursos_actualizar_view'), 'title' => 'Cursos'),
            'data'	=> array ('table' => $requests)
        );
        $this->load->view('template', $data);
	
    if($this->input->post('update'))
    {
        $datos=array(
            'nombrec'=>$this->input->post('nombrec'),
            'material'=>$this->input->post('material'),
            'examen'=>$this->input->post('examen'),
            'clasificacion'=>$this->input->post('clasificacion')
        );
        $response=$this->m_cursos_actualizar->update_records($idcurso,$datos);
        if($response==true){
			        echo '<script type="text/javascript">
                    alert("Curso actualizado correctamente");
                    window.location.href="../cursos_admin";
                    </script>';
			}
			else{
                    echo '<script type="text/javascript">
                    alert("Curso no actualizado");
                    window.location.href="../cursos_admin";
                    </script>';
			}
    }
	}
}

