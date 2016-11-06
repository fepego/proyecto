<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
     }
	public function index()
	{
        if(isset($this->session->userdata['login']))
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
                $this->load->view('Usuarios/lider_view');
             }
            if($this->session->userdata['login']['rol']==4)
             {
                $this->load->view('Usuarios/analista_view');
             }
        }
        else
        {
            $this->load->view('welcome_message');
        }
		
	}
}
