<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class practicante extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('form');
    }
    
	public function index()
	{
		$this->load->view('welcome_message');
	}
    
    public function asignar(){
        $this->load->view('/practicante/asignacion');
    }
}
