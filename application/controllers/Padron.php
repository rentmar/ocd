<?php

class Padron extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->model('Partida_model');
		$this->load->model('Departamento_model');
	}

	public function index(){

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('padron/vpadron_inicio');
		$this->load->view('html/pie');
	}

	//Datos json Comprobacion de CI
	public function getnumeroci()
	{
		$json = array();
		$numeroci = $this->input->post('numeroci');
		$json = $this->Partida_model->buscaCI($numeroci);
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	//Crear partida
	public function crearPartida(){

		$datos['departamentos'] = $this->Departamento_model->leerDepartamentos();

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('padron/vpadron_crearpartida', $datos);
		$this->load->view('html/pie');
	}

	//Insertar partida
	public function insertarPartida(){


	}

	private function partida(){
		$partida = new stdClass();
		$partida->numero_ci = $this->input->post('');
		$partida->iddepartamento = $this->input->post('');

		return $partida;
	}
}
