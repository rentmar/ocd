<?php

class Instdemocratica extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->model('Cuestionario_model');
	}

	public function index()
	{
		$iddepartamento = 1;
		$idformulario = 2;

		$tipo_medio = $this->Cuestionario_model->leerTodosTiposMedio();

		$data['tipo_medio'] = $tipo_medio;
		$data['actor'] = $this->Cuestionario_model->leerActor();
		$data['tema'] = $this->Cuestionario_model->leerTema();
		$data['idformulario'] = $idformulario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vinst_democratica', $data);
		$this->load->view('html/pie');

	}

}
