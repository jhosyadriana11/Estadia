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
        $_SESSION['utc_es']=2;
        $_SESSION['utc_id']=2;
        if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
        {
            $data = array(
                $idprofesor=$this->input->get('idprofesor'),
                $requests = $this->m_miscursos->get_cursos($idprofesor),
                $requests2 = $this->m_miscursos->get_profesores($idprofesor),
                'view'	=> array ('view' => array('miscursos_view'), 'title' => 'Cursos'),
                'data'	=> array ('table' => $requests, 'ver' => $requests2),
        );
        $this->load->view('template', $data);
        }else
		{
		    redirect('../');
        }
        //$_SESSION['utc_es']=4;
        //$_SESSION['utc_id']=2;
        //if(isset($_SESSION['utc_id']) && $_SESSION['utc_es']>1)
		//{
			/*$data = array(
                $requests = $this->m_miscursos->get_cursos(),
                'view'	=> array ('view' => array('miscursos_view'), 'title' => 'Mis cursos'),
                'data'	=> array ('table' => $requests)
            );
            $this->load->view('template', $data);*/
		//else
		//{
		//	redirect('../');
		//}
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
            /*$filename= $_FILES["file"]["name"];
            $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
            $mi_archivo = 'file';
            $config['upload_path'] = "uploads/";
            $config['file_name'] = "";
            $config['allowed_types'] = "pdf";
            $config['max_size'] = "50000";
            $config['max_width'] = "2000";
            $config['max_height'] = "2000";
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload($mi_archivo)) {
                //*** ocurrio un error
                $data['error_msg'] = $this->upload->display_errors();
                $data['file_name'] =  $config['file_name'];
                return  $data;
            }
            $data['status'] = 'True';
            $data['file_name'] = $config['file_name'];
            return $data;*/
    

        $mi_archivo = 'file';
        $config['upload_path'] = "uploads/";
        $config['file_name'] = "";
        $config['allowed_types'] = "pdf";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            //$data['uploadError'] = $this->upload->display_errors();
            echo '<script type="text/javascript">
                    alert("Evidencia no agregada correctamente, debe ser un archivo pdf");
                    window.location.href="../miscursos";
                    </script>';
        }
        $this->m_miscursos->save($config);
        echo '<script type="text/javascript">
                    alert("Evidencia agregada correctamente");
                    window.location.href="../miscursos";
                    </script>';
    }
}
?>