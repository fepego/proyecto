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
    public function agregarUsuario()
    {
        $datos= array('roles'=>$this->Usuario_model->obtenerRoles());
        $this->load->view("Usuarios/AgregarUsuario_view",$datos);
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
            'password' => hash('sha256',$this->input->post('password',TRUE))
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
    public function setUsuario()
    {
        if ($this->session->userdata['login']['rol']==1) {
            $this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|max_length[20]|alpha_dash');
            $this->form_validation->set_rules('nombreUsuario','Nombre','trim|required|max_length[50]');
            $this->form_validation->set_rules('email','email','required|valid_email|max_length[60]');
            if ($this->form_validation->run() == FALSE) {
                $this->agregarUsuario();
            }
            else
            {
                $datos= array(
                    'ID_usuario'=>$this->input->post("usuario",TRUE),
                    'Pass'=> hash("sha256",$this->input->post('usuario',TRUE)),
                    'Nombre'=>$this->input->post("nombreUsuario",TRUE),
                    'Email'=>$this->input->post("email",TRUE),
                    'ID_rol'=>$this->Usuario_model->obtenerIDRol($this->input->post("rol",TRUE))
                );
                if($this->Usuario_model->buscarIDUsuario($datos)==TRUE and $this->Usuario_model->buscarEmail($datos)==TRUE)
                {
                    $this->Usuario_model->insertarUsuario($datos);
                    $res['roles']=$this->Usuario_model->obtenerRoles();
                    $res['insert_message']="Se Agrego correctamente el usuario";
                    $this->load->view('Usuarios/AgregarUsuario_view',$res);
                }
                else
                {
                    $datos['roles']=$this->Usuario_model->obtenerRoles();
                    $datos['error_message']="usuario no disponible o el correo asociado ya tiene una cuenta registrada";
                    $this->load->view('Usuarios/AgregarUsuario_view',$datos);

                }
            }
        }
        else
        {
            $this->iniciarSesion();
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
            $this->load->view('Usuarios/Analista_view');
         }
        if($this->session->userdata['login']['rol']==4)
         {
            $this->load->view('Usuarios/lider_view');
         }
    }
    public function cerrarSesion()
     {
       $sess_array = array(
         'username' => '',
         'email' => '',
         'rol'  => '',
       );
       $this->session->unset_userdata('login',$sess_array);
       $data['message_display'] = 'Successfully Logout';
       $this->session->sess_destroy();
       $this->load->view('Usuarios/login_view', $data);
     }
    public function actualizarPass()
{
  $this->form_validation->set_rules('passAct', 'Pass Actual', 'trim|required');
  $this->form_validation->set_rules('passNuev', 'Pass Nuevo', 'trim|required');
  $this->form_validation->set_rules('passConf', 'Pass Confirmación', 'trim|required');
  if ($this->form_validation->run() == true) {
    if($this->input->post('passNuev',true)==$this->input->post('passConf',true))
    {
      $datos=array(
        'usuario'=>$this->session->userdata['login']['username'],
        'passAct'=>hash('sha256',$this->input->post('passAct',true)),
        'passNuevo'=>hash('sha256',$this->input->post('passNuev',true))
      );
      if($this->Usuario_model->consPass($datos))
      {
        if($this->Usuario_model->cambiarPass($datos))
        {
          $res['insert_message']="Se actualizó correctamente la contraseña";
          $res['usu']=$arr['usu']=$this->session->userdata['login']['username'];
          $this->load->view('Usuarios/modificarPass_view',$res);
        }
        else {
          $res['error_message']="error de actualización";
          $res['usu']=$arr['usu']=$this->session->userdata['login']['username'];
          $this->load->view('Usuarios/modificarPass_view',$res);
        }
      }
      else {
        $res['error_message']="La contraseña actual no es correcta";
        $res['usu']=$arr['usu']=$this->session->userdata['login']['username'];
        $this->load->view('Usuarios/modificarPass_view',$res);
      }
    }
    else {
      $res['error_message']="La contraseña nueva y su confirmación no son iguales";
      $res['usu']=$arr['usu']=$this->session->userdata['login']['username'];
      $this->load->view('Usuarios/modificarPass_view',$res);
    }

  }
  else {
    $res['usu']=$arr['usu']=$this->session->userdata['login']['username'];
    $this->load->view('Usuarios/modificarPass_view',$res);
  }

}
public function restaurarPass($id)
{
  $datos = array(
    'passNuevo' =>  $pass=hash("sha256",$id),
    'usuario'=>$id
  );
  if($this->Usuario_model->restPass($datos))
  {
    $msj['assert_message']='Recuperado con exito';
    $msj['id']=$id;
    $this->load->view('confirmacion/recuperar_view',$msj);
  }
  else {
    $msj['error_message']='Error de recuperación';
    $this->load->view('confirmacion/recuperar_view');
  }
}

}
