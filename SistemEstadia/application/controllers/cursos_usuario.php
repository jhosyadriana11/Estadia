<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cursos_usuario extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('m_cursos_usuario');
      //$this->load->helper('form');
		//$this->load->model('m_ubicaciones');
		//$this->load->model('m_account');
		$this->load->helper('url');
		//$this->load->library('phpmailer_lib');
		
    }
    
    public function index()
	{
        $_SESSION['utc_ch']=2;
		$data = array(
            $requests = $this->m_cursos_usuario->get_cursos(),
            'view'	=> array ('view' => array('cursos_catalogo'), 'title' => 'Cursos'),
            'data'	=> array ('table' => $requests)
        );
        $this->load->view('template', $data);
	}
    
    public function savec()
	{
		/*load registration view form*/
		//$this->load->view('cursos_agregar_view');
		/*Check submit button */
		if($this->input->post('inscribirme'))
		{
			$data['idprofesor']=$this->input->post('idprofesor');
            $data['idcurso']=$this->input->post('idcurso');
			$response=$this->m_cursos_usuario>savecurso($data);
			if($response==true){
			        echo '<script type="text/javascript">
                    alert("Curso agregado correctamente");
                    window.location.href="../miscursos";
                    </script>';
			}
			else{
					echo "Insert error !";
			}
		}
	}
}
?>