<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class analista extends CI_Controller {

	public function __construct(){
        parent::__construct();
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->helper('html');
				$this->load->library('form_validation');
				$this->load->model('Usuario_model');
				$this->load->model('Novedad_model');
				$this->load->model('Casos_model');
				$this->load->library('encrypt');
        $this->load->helper('form');
    }
/**
 * function defectopara navegar a vista en carpeta usuarios Analista_view
 *
 */
	public function index()
	{
		$this->load->view('Usuarios/Analista_view');
	}
/**
 * función para navegar a la vista novedades_views y generar un nuevo reporte
 *
 */
    public function agregarNovedad()
	{
		$this->load->view('/Analistas/novedades_views');
	}
	/**
	 * Función para consultar a la base de datos por sus novedades
	 * @return [type] [description]
	 */
	public function consultarNovedad()
	{
		if(isset($this->session->userdata['login']))
		{
		 if ($this->session->userdata['login']['rol']==3)
		 {
			 $datos = array('novedad' => $this->Novedad_model->consultarNovedad($this->session->userdata['login']['username']) );
			 $this->load->view('Analistas/consultarNovedad_view',$datos);
		 }
		 else {
		 	 $this->load->view('Usuarios/login_view');
		 }
	 }
	}
/**
 * Función para guardar una nueva novedad en la base de datos
 */
    public function addNovedad()
	{
		 if(isset($this->session->userdata['login']))
		 {
		 	if ($this->session->userdata['login']['rol']==3)
		 	{
				$this->form_validation->set_rules('fechaInicio', 'Fecha Inicial', 'required');
				$this->form_validation->set_rules('fechaFin', 'Fecha Fin', 'required');
				$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|max_length[50]');
				$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|max_length[1000]');
		 		if ($this->form_validation->run() == FALSE)
		 		{
		 			$this->agregarNovedad();
		 		}
		 		else{
					$datos = array('Titulo' => $this->input->post('titulo',true),
													'FechaInicio' =>$this->input->post('fechaInicio',true),
													'FechaFin'=> $this->input->post('fechaFin',true),
													'descripcion'=>$this->input->post('descripcion',true),
													'Estado' => 'PENDIENTE',
													'Usuario' =>$this->session->userdata['login']['username']
				 );
				 if($this->Novedad_model->agregarNovedad($datos))
				 {
					$this->load->view('confirmacion/archivo');
				 }
				 else {
					 $error = array('error_message' => 'Error de datos no se pudo guardar en la base de datos consulte con el administrador');
					$this->load->view('Analistas/novedades_views', $error);
				 }
				}
			}
		}

  }

}
