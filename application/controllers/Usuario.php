<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->library('form_validation');
          $this->load->model('Usuario_model');
          $this->load->library('encrypt');
     }
	public function index()
	{
		$this->load->view('AgregarUsuario_view');
	}
    public function IniciarSesion()
    {
        $this->load->view('Usuarios/login_view.php');
    }
    public function inicio()
    {
        $this->form_validation->set_rules('username', 'Usuario', 'trim|required');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required');
       if ($this->form_validation->run() == FALSE) {
            $this->load->view('Usuarios/login_view');
       }
       else {
         $data = array(
            'username' => $this->input->post('username',TRUE),
             'password'=>$this->input->post('password',TRUE)
            //'password' => hash('sha256',$this->input->post('password',TRUE))
          );
          $result = $this->Usuario_model->login($data);
          if ($result == TRUE) {
            $username = $this->input->post('username',TRUE);
            $result = $this->Usuario_model->leerUsuario($username);
            if ($result != false) {
              $datosSesion = array(
                'username' => $result[0]->ID_usuario,
                'email' => $result[0]->Email,
                'rol'  => $result[0]->ID_rol,
              );
              $this->session->set_userdata('login',$datosSesion);
              $this->verificarUsuario();
          }
          else {
            $data = array(
                'error_message' => 'Usuario o contraseña incorrectos'
              );
              $this->load->view('Usuarios/login_view', $data);
          }

       }
       else {
         $data = array(
             'error_message' => 'Usuario o contraseña incorrectos'
           );
           $this->load->view('Usuarios/login_view', $data);
       }
     }
    }
    public function verificarUsuario()
    {
        if($this->session->userdata['login']['rol']==1)
         {
            $this->load->view('Usuarios/jefe_view');
         }
        if($this->session->userdata['login']['rol']==2)
         {
            $this->load->view('Usuarios/practicante_view');
         }
        if($this->session->userdata['login']['rol']==3)
         {
            $this->load->view('gestionUsuarios/lider_view');
         }
        if($this->session->userdata['login']['rol']==4)
         {
            $this->load->view('gestionUsuarios/analista_view');
         }
    }
    public function agregarUsuario()
    {
        $array= $this->Usuario_model->getUsuarios();
        $datos= array('nombre'=> $array[0]->ID_usuario);
        $this->load->view("prueba",$datos);
        
    }
}