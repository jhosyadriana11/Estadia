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
		
		$idprofesor=$this->input->get('idprofesor');
		$_SESSION['utc_ch']=$idprofesor;
		$_SESSION['utc_ch'];
		$data = array(
            $requests = $this->m_cursos_usuario->get_cursos(),
			$requests2 = $this->m_cursos_usuario->get_profesores($idprofesor),
            'view'	=> array ('view' => array('cursos_catalogo'), 'title' => 'Cursos'),
            'data'	=> array ('table' => $requests, 'ver' => $requests2)
        );
        $this->load->view('template', $data);
	
	}
    
    public function savec()
	{
		$idprofesor=$this->input->get('idprofesor');
		$idcurso=$this->input->get('idcurso');
		$_SESSION['utc_ch']=$idprofesor;
		$_SESSION['utc_ch'];
		/*load registration view form*/
		//$this->load->view('cursos_agregar_view');
		/*Check submit button */
		if($this->input->post('inscribirme'))
		{
			$idprofesor=$this->input->get('idprofesor');
			$idcurso=$this->input->get('idcurso');
			$response=$this->m_cursos_usuario->savecurso($idprofesor, $idcurso);
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