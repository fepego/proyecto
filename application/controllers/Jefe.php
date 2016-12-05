<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jefe extends CI_Controller {

	public function __construct(){
        parent::__construct();
				$this->load->library('session');
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->helper('html');
				$this->load->library('form_validation');
				$this->load->model('Usuario_model');
        $this->load->model('Novedad_model');
				$this->load->model('Casos_model');
				$this->load->library('encrypt');

    }
		/**
		 * Función para navegar a bandeja de entrada de jefe
		 *
		 */
  public function index()
  {
    $this->load->view("Usuarios/jefe_view");
  }
	/**
	 * Función para buscar un analista en la base de datos
	 * @return [type] [description]
	 */
  public function buscarUsuario()
  {
		$datos = array('usuarios' => $this->Usuario_model->getAnalitas() );
    $this->load->view("Jefe/consultarAnalista_view",$datos);
  }
	/**
	 * Función para ver novedades del analista seleccionado
	 * @return [type] [description]
	 */
  public function verNovedadesUsuario()
  {
    $datos = array('novedad' => $this->Novedad_model->consultarNovedad($this->input->post("analista",true)) );
    $this->load->view("Jefe/consultarNovedad_view",$datos);
  }
	/**
	 * Función para ver en detalle la novedad del analista.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
  public function detalleNovedad($id)
  {
    $novedad=$this->Novedad_model->getNovedad($id);
    foreach ($novedad as $n) {
      $datos = array('novedad' => $n );
      $this->load->view("Jefe/novedades_views",$datos);
    }
  }
	/**
	 * Función que permite actualziar el estado de la novedad de acuerdo a los 3 estados
	 * PENDIENTE, ACEPTADA, DENEGADA
	 * @return [type] [description]
	 */
	public function actualizarNovedad()
	{
		if(isset($this->session->userdata['login']))
		{
		 if ($this->session->userdata['login']['rol']==1)
		 {
			 $datos = array('ID' => $this->input->post("id",true),
			 								'Estado'=>$this->input->post("estado",true)
		  );
			if($this->Novedad_model->actualizarNovedad($datos))
			{
				$msj = array('insert_message' => "Se actualizó correctemente el estado de la novedad." );
				$this->load->view('confirmacion/confirmacionNovedad_view',$msj);
			}
			else {
				$msj = array('error_message' => "No se actualizó el estado de la novedad." );
				$this->load->view('confirmacion/confirmacionNovedad_view',$msj);
			}
		 }
	 	}
	}
}
