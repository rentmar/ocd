<?php

class Inicio extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->model('Encuesta_model');
		$this->load->model('Instanciaseguimiento_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		
		if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}

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
			//nueva noticia
			$this->session->set_userdata('nueva_noticia', false);
			$this->session->set_userdata('noticia_nueva', []);
			$this->session->set_userdata('noticia_nueva1', []);
			$this->session->set_userdata('nueva_noticia_ids', [ ]);
			//redirect('reformaelectoral/editarNoticia/'.$idnoticia);
		}

		//var_dump($this->session->userdata());
		$usuario = $this->ion_auth->user()->row();
		$idusuario = $usuario->id;
		$datos['encuestas'] = $this->Encuesta_model->leerEncuestasAsignadasUsuario($idusuario);
		$datos['usuario'] = $usuario;
		$datos['instancia'] = $this->Instanciaseguimiento_model->leerInstancias();

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('inicio/vinicio_index', $datos);
		$this->load->view('html/pie');
	}

	public function exito()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('mensajes/vde_confirmacion');
		$this->load->view('html/pie');
	}

	public function fracaso()
	{
		$this->load->view('mensajes/vde_error');

	}
}
