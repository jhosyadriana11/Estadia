<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cursos_admin extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('m_cursos_admin');
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
            $requests = $this->m_cursos_admin->get_cursos(),
            'view'	=> array ('view' => array('cursos_catalogo_admin'), 'title' => 'Cursos'),
            'data'	=> array ('table' => $requests)
        );
        $this->load->view('template', $data);
	}

    /*public function displaydata()
    {
        $result['data']=$this->m_cursos_admin->display_records();
        $this->load->view('template',$result);
    }*/
    public function deletedata()
    {
    $id=$this->input->get('idcurso');
    $response=$this->m_cursos_admin->deleterecords($id);
    if($response==true){
        echo '<script type="text/javascript">
                    alert("Curso eliminado correctamente");
                    window.location.href="../cursos_admin";
                    </script>';
    }
    else{
        echo '<script type="text/javascript">
                    alert("Error");
                    window.location.href="../cursos_admin";
                    </script>';
    }
    }
}
?>