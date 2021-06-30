<?php

class Usuarios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('Departamento_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		echo "Lista de Usuarios";
	}

	public function crearUsuario()
	{
		$data['grupos'] = $this->ion_auth->groups()->result();
		$data['departamentos'] = $this->Departamento_model->leerDepartamentos();
		$this->load->view('usuarios/vformulario_usuario', $data);
	}

}
