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
		$this->load->model('Noticia_model');
		$this->load->library('ion_auth');

		$this->_idformulario = 2;
		//Comprobacion de session
		/*if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}*/
	}

	public function index()
	{
		$usuario = $this->ion_auth->user()->row();

		$tipo_medio = $this->Cuestionario_model->leerTodosTiposMedio();

		$this->Cuestionario_model->setCuestionarioID($this->_idformulario);
		$tema = $this->Cuestionario_model->leerTema();

		$data['idusuario'] = $usuario->id;
		$data['tipo_medio'] = $tipo_medio;
		$data['actor'] = $this->Cuestionario_model->leerActor();
		$data['tema'] = $tema;
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

	public function editar()
	{
		$usuario = $this->ion_auth->user()->row();
		//echo $usuario->id;
		$noticias = $this->Noticia_model->leerTodasNoticiasUsuario($usuario->id, $this->_idformulario);
		//var_dump($noticias);
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vreforma_lista_noticias', $noticias);
		$this->load->view('html/pie');
	}

}
