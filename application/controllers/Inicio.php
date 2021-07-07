<?php

class Inicio extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');

	}

	public function index()
	{

		if($this->session->edicion_activa)
		{

			//Limpiar la variable de edicion_activa
			$this->session->set_userdata('edicion_activa', false);
			$this->session->set_userdata('edicion_cuestionario', 0);
			//Cargar la noticia y la noticia original a la session
			$this->session->set_userdata('noticia', []);
			$this->session->set_userdata('noticia_original', []);
			//redirect('reformaelectoral/editarNoticia/'.$idnoticia);
		}

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('inicio/vinicio_index');
		$this->load->view('html/pie');
	}
}
