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
			redirect('inicio/', 'refresh');
		}
	}

	public function validar(){
		if($this->ion_auth->login($this->input->post('identidad'), $this->input->post('password'), false ))
		{
			$log_user = $this->ion_auth->user()->row();
			//$this->session->set_userdata('usuario', []);
			//$this->session->set_userdata('usuario', $log_user);
			redirect('inicio/', 'refresh');

		}
		else
		{
			$this->session->set_flashdata('log_mensaje', $this->ion_auth->errors());
			$this->session->sess_destroy();
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
