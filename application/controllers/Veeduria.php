<?php
class Veeduria extends CI_Controller{
	protected $_idformulario;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->model('Cuestionario_model');
		$this->load->model('Veeduria_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');

		//Identificador del formulario - Ajustar
		$this->_idformulario = 7;

		date_default_timezone_set("America/La_Paz");


		if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}
	}

	public function index(){
	}

	public function seleccion($tipo){
		if($tipo == 1){
			redirect('veeduria/encuestadoresSupervisores');
		}elseif ($tipo == 2){
			redirect('veeduria/ciudadania');
		} elseif ($tipo == 3){
			redirect('veeduria/veedores');
		}else{
			redirect('veeduria/');
		}
	}

	//Formulatio tipo 1: Encuestadores y supervisores
	public function encuestadoresSupervisores(){
		//Informacion del usuario logueado
		$usuario = $this->ion_auth->user()->row();

		//Informacion del formulario
		$formulario = $this->Veeduria_model->formEncuestadoresSupervisores();
		$secciones = $this->Veeduria_model->formSecciones($formulario->idfv);
		$preguntas = $this->Veeduria_model->leerPreguntasFormularios($formulario->idfv);




		$datos['formulario'] = $formulario;
		$datos['secciones'] = $secciones;
		$datos['preguntas'] = $preguntas;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vveed_enc_sup', $datos);
		$this->load->view('html/pie');
	}

	//Formulario tipo 2: Ciudadania
	public function ciudadania(){
		//Informacion del usuario logueado
		$usuario = $this->ion_auth->user()->row();

		//Informacion del formulario
		$formulario = $this->Veeduria_model->formCiudadania();
		$secciones = $this->Veeduria_model->formSecciones($formulario->idfv);
		$preguntas = $this->Veeduria_model->leerPreguntasFormularios($formulario->idfv);

		/*var_dump($formulario);
		echo "<br><br>";
		var_dump($secciones);
		echo "<br><br>";
		var_dump($preguntas);
		echo "<br><br>";*/


		$datos['formulario'] = $formulario;
		$datos['secciones'] = $secciones;
		$datos['preguntas'] = $preguntas;



		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vveed_ciudadania', $datos);
		$this->load->view('html/pie');
	}

	//Formulario tipo 3: Veedores
	public function veedores(){
		//Informacion del usuario logueado
		$usuario = $this->ion_auth->user()->row();

		//Informacion del formulario
		$formulario = $this->Veeduria_model->formVeedores();
		$secciones = $this->Veeduria_model->formSecciones($formulario->idfv);
		$preguntas = $this->Veeduria_model->leerPreguntasFormularios($formulario->idfv);

		/*var_dump($formulario);
		echo "<br><br>";
		var_dump($secciones);
		echo "<br><br>";
		var_dump($preguntas);
		echo "<br><br>";*/


		$datos['formulario'] = $formulario;
		$datos['secciones'] = $secciones;
		$datos['preguntas'] = $preguntas;


		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vveed_veedores', $datos);
		$this->load->view('html/pie');
	}






}
