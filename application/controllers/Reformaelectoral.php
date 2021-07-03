<?php

class Reformaelectoral extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cuestionario_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		//Extraer de la session
		$iddepartamento = 1;
		$idformulario = 1;

		$tipo_medio = $this->Cuestionario_model->leerTodosTiposMedio();

		$data['tipo_medio'] = $tipo_medio;
		$data['actor'] = $this->Cuestionario_model->leerActor();
		$data['tema'] = $this->Cuestionario_model->leerTema();
		$data['idformulario'] = $idformulario;

		//$this->load->view('html/encabezado');
		//$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vreforma_electoral', $data);
		//$this->load->view('html/pie');
	}

	public function getMedios()
	{
		$json = array();
		$this->Cuestionario_model->setTipoMedioID($this->input->post('tipomedioID'));
		$this->Cuestionario_model->setDepartamentoID(1);
		$json = $this->Cuestionario_model->leerMedios();
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	public function getsubtema()
	{
		$json = array();
		$this->Cuestionario_model->setTemaID($this->input->post('temaID'));
		$this->Cuestionario_model->setDepartamentoID(1);
		$json = $this->Cuestionario_model->leerSubtema();
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	public function preenvio()
	{
		echo "Tipo de medio: ".$this->input->post('tipo-medio');
		echo "<br>";
		echo "Medio: ".$this->input->post('medio');

	}







}