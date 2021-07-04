<?php

class Reformaelectoral extends CI_Controller
{
	protected $_idformulario;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cuestionario_model');
		$this->load->model('Noticia_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->library('ion_auth');
		$this->_idformulario = 1;
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
		$data['iddepartamento'] = $usuario->rel_iddepartamento;
		$data['tipo_medio'] = $tipo_medio;
		$data['actor'] = $this->Cuestionario_model->leerActor();
		$data['tema'] = $tema;
		$data['idformulario'] = $this->_idformulario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vreforma_electoral', $data);
		$this->load->view('html/pie');
	}

	public function getMedios()
	{
		$json = array();
		$this->Cuestionario_model->setTipoMedioID($this->input->post('tipomedioID'));
		$this->Cuestionario_model->setDepartamentoID($this->session->iddepartamento);
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
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vreforma_preenvio');
		$this->load->view('html/pie');

	}

	public function editar()
	{
		$usuario = $this->ion_auth->user()->row();
		//echo $usuario->id;
		$noticias = $this->Noticia_model->leerTodasNoticiasUsuario($usuario->id, $this->_idformulario);
		//var_dump($noticias);

		$data['noticias'] = $noticias;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vreforma_lista_noticias', $data);
		$this->load->view('html/pie');
	}

	public function editarNoticia($idnoticia)
	{

	}







}
