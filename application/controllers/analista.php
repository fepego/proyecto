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


   }


}
