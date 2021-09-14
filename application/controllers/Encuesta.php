<?php

class Encuesta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->model('Encuesta_model');

		if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}
	}

	//Vista para las encuestas definidas
	public function index()
	{
		//Leer todas las encuestas
		$data['encuestas'] = $this->Encuesta_model->leerTodasLasEncuestas();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_index', $data);
		$this->load->view('html/pie');
	}

	//Vista para los Modulos
	public function moduloUI()
	{
		//Leer todos los modulos
		$datos['modulos'] = $this->Encuesta_model->leerTodosLosModulos();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_modulo', $datos);
		$this->load->view('html/pie');
	}

	public  function seccionUI()
	{
		//Leer todas las secciones
		$datos['secciones'] = $this->Encuesta_model->leerTodasLasSecciones();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_seccion', $datos);
		$this->load->view('html/pie');
	}

	public function preguntaUI()
	{
		//Leer todas las preguntas
		$datos['preguntas'] = $this->Encuesta_model->leerTodasLasPreguntas();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_pregunta', $datos);
		$this->load->view('html/pie');
	}

	public function respuestaUI()
	{
		//Leer Todas las respuestas
		$datos['respuestas'] = $this->Encuesta_model->leerTodasLasRespuestas();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_respuesta', $datos);
		$this->load->view('html/pie');
	}

}
