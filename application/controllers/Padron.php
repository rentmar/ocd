<?php

class Padron extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->model('Partida_model');
		$this->load->model('Departamento_model');
	}

	public function index(){

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('padron/vpadron_inicio');
		$this->load->view('html/pie');
	}

	//Datos json Comprobacion de CI
	public function getnumeroci()
	{
		$json = array();
		$numeroci = $this->input->post('numeroci');
		$json = $this->Partida_model->buscaCI($numeroci);
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	//Crear partida
	public function crearPartida(){
		$usuario = $this->ion_auth->user()->row();

		$datos['departamentos'] = $this->Departamento_model->leerDepartamentos();
		$datos['usuario'] = $usuario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('padron/vpadron_crearpartida', $datos);
		$this->load->view('html/pie');
	}

	//Insertar partida
	public function insertarPartida(){
		$partida = $this->partida();
		//var_dump($partida);
		//echo "<br><br><br>";
		//$inf_json = json_encode($partida);
		//var_dump($inf_json);
		$idregistro = $this->Partida_model->crearPartida($partida);
		if($idregistro !== false){
			redirect('padron/registroPartida/'.$idregistro);
		}
	}


	public function registroPartida($idregistro){
		$registro = $this->Partida_model->registroId($idregistro);
		$inform = json_decode($registro->datos_partida);
		$dep = $this->Departamento_model->leerDepartamento($inform->departamento);
		$dep_adh = $this->Departamento_model->leerDepartamento($inform->lugar_adhesion);

		$datos['registro'] = $inform;
		$datos['dep'] = $dep;
		$datos['dep_adh'] = $dep_adh;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('padron/vpadron_partida', $datos);
		$this->load->view('html/pie');


	}

	private function partida(){
		$partida = new stdClass();
		$partida->libro = $this->input->post('num_libro');
		$partida->folio = $this->input->post('num_folio');
		$partida->partida = $this->input->post('num_partida');
		$partida->nombres = $this->input->post('nombres');
		$partida->primer_apellido = $this->input->post('primer_apellido');
		$partida->segundo_apellido = $this->input->post('segundo_apellido');
		$partida->apellido_esposo = $this->input->post('apellido_esposo');
		$partida->numero_documento = $this->input->post('numero_ci');
		$partida->complemento = $this->input->post('complemento_ci');
		$partida->fecha_nacimiento = $this->input->post('fecha_nacimiento');
		$partida->sexo = $this->input->post('sexo');
		$partida->lugar_domicilio = $this->input->post('domicilio');
		$partida->zona = $this->input->post('zona');
		$partida->calle = $this->input->post('calle');
		$partida->numero = $this->input->post('num_dom');
		$partida->departamento = $this->input->post('departamento');
		$partida->provincia = $this->input->post('provincia');
		$partida->localidad = $this->input->post('localidad');
		$partida->otra_localidad = $this->input->post('localidad_otr');
		$partida->lugar_adhesion = $this->input->post('departamento_adh');
		$partida->fecha_adhesion = $this->input->post('fecha_adh');
		$partida->usuario = $this->input->post('idusuario');

		return $partida;
	}
}
