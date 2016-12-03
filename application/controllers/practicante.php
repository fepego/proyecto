<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class practicante extends CI_Controller {

	public function __construct(){
        parent::__construct();
				$this->load->library('session');
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->helper('html');
				$this->load->library('form_validation');
				$this->load->model('Usuario_model');
				$this->load->model('Casos_model');
				$this->load->library('encrypt');

    }

	public function index()
	{
		$this->load->view('Usuarios/practicante_view');
	}

    public function asignar(){
				$datos = array('usuarios' => $this->Usuario_model->getAnalitas() );
        $this->load->view('/practicante/agregarReporte_view',$datos);
    }
		public function agregarReporte()
		{
			if(isset($this->session->userdata['login']))
			{
				if ($this->session->userdata['login']['rol']==2)
				{
					$this->form_validation->set_rules('fecha', 'Fecha', 'required');
					$this->form_validation->set_rules('analista','Analista','trim|required');
					$this->form_validation->set_rules('numCasos','Número de casos','trim|required|numeric');
					$this->form_validation->set_rules('novedad','Novedad','trim|required|max_length[1000]');
					if ($this->form_validation->run() == FALSE)
					{
						$this->asignar();
					}
					else{
								$datos=array(
								'Fecha' => date('Y-m-d H:i:s',strtotime($this->input->post('fecha',TRUE))),
								'Analista'=> $this->input->post('analista',TRUE),
								'CantidadCasos'=> $this->input->post('numCasos',TRUE),
								'Novedad'=> $this->input->post('novedad',TRUE),
						);
						if($this->Casos_model->agregarReporte($datos))
						{
							$datos = array('hora' => $this->input->post('fecha',TRUE) );
							$this->load->view('practicante/confirmacionReporte',$datos);
						}
						else{
							$datos = array('usuarios' => $this->Usuario_model->getAnalitas(),
														'error_message'=>'Se generó un error de datos, no se pudo guardar el reporte'
						 	);
			        $this->load->view('/practicante/agregarReporte_view',$datos);
						}
					}
				}
				else {
							$this->view('Usuarios/login_view');
				}
			}
		}
		public function consultarReportes()
		{
			$this->load->view("practicante/consultarReporte");
		}
		public function getReportes()
		{
			if(isset($this->session->userdata['login']))
			{
				if ($this->session->userdata['login']['rol']==2 || $this->session->userdata['login']['rol']==1)
				{
					$this->form_validation->set_rules('fechaInicio', 'Fecha Inicial', 'required');
					$this->form_validation->set_rules('fechaFin', 'Fecha Final', 'required');
					if ($this->form_validation->run() == FALSE)
					{
						$this->consultarReportes();
					}
					else{
						$fechas = array('fechaInicio' => date('Y-m-d H:i:s',strtotime($this->input->post('fechaInicio',TRUE))),
														'fechaFin'=>date('Y-m-d H:i:s',strtotime($this->input->post('fechaFin',TRUE)))
					 );
						$datos = array('registros' => $this->Casos_model->consultarReportes($fechas) );
						$this->load->view("practicante/listaRegistros_view",$datos);
					}
				}
			}
		}
}
