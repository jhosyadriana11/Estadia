<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class miscursos extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('m_miscursos');
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
            $requests = $this->m_miscursos->get_cursos(),
            'view'	=> array ('view' => array('miscursos_view'), 'title' => 'Mis cursos'),
            'data'	=> array ('table' => $requests)
        );
        $this->load->view('template', $data);
	}

    /*public function add(){
        if($this->input->post('evidencia')){
            
                //Load upload library and initialize here configuration
                $this->load->library('upload');
                $this->upload->initialize();
                
                if($this->upload->do_upload('evidencia')){
                    $uploadData = $this->upload->data();
                    $evidencia = $uploadData['file_name'];
                }else{
                    $evidencia = '';
                }
            }else{
                $evidencia = '';
            }
            
            //Prepare array of Member data
            $evidenciaData = array(
                'evidencia' => $evidencia
            );
            
            //Pass Member data to model
            $insertevidenciaData = $this->m_miscursos->insert($evidenciaData);
            
            //Storing insertion status message.
            if($insertevidenciaData){
                echo 'Member data have been added successfully.';
            }else{
                echo 'Some problems occured, please try again.';
            }
    }*/
    function cargar_archivo() {

        $mi_archivo = 'file';
        $config['upload_path'] = "uploads/";
        $config['file_name'] = "nombre_archivo";
        $config['allowed_types'] = "pdf";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            //$data['uploadError'] = $this->upload->display_errors();
            echo '<script type="text/javascript">
                    alert("Evidencia no agregada correctamente");
                    window.location.href="../miscursos";
                    </script>';
        }
        //$this->m_miscursos->save($config);
        echo '<script type="text/javascript">
                    alert("Evidencia agregada correctamente");
                    window.location.href="../miscursos";
                    </script>';
        
    }
}
?>