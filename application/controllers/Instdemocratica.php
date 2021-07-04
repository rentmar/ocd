<?php

class Instdemocratica extends CI_Controller
{
	protected $_idformulario;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->model('Cuestionario_model');
		$this->load->library('ion_auth');

		$this->_idformulario = 2;
	}

	public function index()
	{
		$usuario = $this->ion_auth->user()->row();

		$tipo_medio = $this->Cuestionario_model->leerTodosTiposMedio();

		$data['idusuario'] = $usuario->id;
		$data['tipo_medio'] = $tipo_medio;
		$data['actor'] = $this->Cuestionario_model->leerActor();
		$data['tema'] = $this->Cuestionario_model->leerTema();
		$data['idformulario'] = $this->_idformulario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vinst_democratica', $data);
		$this->load->view('html/pie');

	}

	public function preenvio()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vinst_preenvio');
		$this->load->view('html/pie');
	}

}
