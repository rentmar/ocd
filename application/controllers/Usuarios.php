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

	public function procesarCrear()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usuario', 'Nombre de usuario', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('carnet', 'Carnet de Identidad', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('passwd', 'Password', 'required');
		$this->form_validation->set_rules('passwdc', 'Confirmar Password', 'required|matches[passwd]');

		if($this->form_validation->run()==false)
		{
			$data['grupos'] = $this->ion_auth->groups()->result();
			$data['departamentos'] = $this->Departamento_model->leerDepartamentos();
			$this->load->view('usuarios/vformulario_usuario', $data);
		}else{
			echo "Valido";
		}

	}

	public function editarUsuario($idusuario)
	{
		$usuario = $this->ion_auth->user($idusuario)->row();
		$data['usuario'] = $usuario;
		$data['grupos'] = $this->ion_auth->groups()->result();
		$data['departamentos'] = $this->Departamento_model->leerDepartamentos();
		$this->load->view('usuarios/vformulario_usuario_editar', $data);
	}





}
