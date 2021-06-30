<?php

class Login extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->library('session');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');

	}
	public function index(){
	    if(!$this->ion_auth->logged_in())
		{
			//No inicio de session
			$this->session->sess_destroy();
			$this->load->view('login/login.php');

		}
		else
		{
			//Sesion iniciada
			echo "Sesion iniciada";
			//redirect('dashboard', 'refresh');
		}
	}

	public function validar(){
		if($this->ion_auth->login($this->input->post('identidad'), $this->input->post('password'), false ))
		{
			//$log_user = $this->ion_auth->user()->row();
			//$empresa = $this->Empresa_model->leerEmpresaPorIdentificador($log_user->rel_empresa);
			//$this->session->set_userdata('sucursal', [ ]);
			//$this->session->set_userdata('sucursal', $empresa);
			//$this->session->set_userdata('sesion_activa', true);
			redirect('inicio/', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('log_mensaje', $this->ion_auth->errors());
			redirect('login/', 'refresh');
		}
	}

	public function logout()
	{
		$this->ion_auth->logout();
		//Terminar sesion
		$this->load->library('session');
		$this->session->sess_destroy();
		//Redirigir al login
		redirect('login/', 'refresh');
	}
}
