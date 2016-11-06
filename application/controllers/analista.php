<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class analista extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('form');
    }
    
	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function agregarNovedad()
	{
		$this->load->view('/Analistas/novedades_views');
	}
    
    public function leerNovedad()
	{
      if(isset($this->session->userdata['login']))
      {
        if ($this->session->userdata['login']['rol']==4)
        {
          $this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|max_length[15]|alpha_dash');
          $this->form_validation->set_rules('fechainicio','Nombre','trim|required|max_length[50]');
          $this->form_validation->set_rules('fechafin','Telefono','trim|required|max_length[20]|');
          $this->form_validation->set_rules('descripcion','Direccion','trim|required|alpha_dash');
          if ($this->form_validation->run() == FALSE) 
          {
            $this->load->view('Analistas/novedades_views');
          } else{
                $datos=array(
                'titulo' => $this->input->post('titulo',TRUE),
                'fechainicio'=> $this->input->post('fechainicio',TRUE)
            );
              
                $this->load->view('prueba',$datos);
          }
            
	
        }
	}  
    
   }
    
    
}