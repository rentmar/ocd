<?php

class EleccionesJudiciales2024 extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->model('Cuestionario_model');
		$this->load->model('Departamento_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');


		//Identificador del formulario - Ajustar
		$this->_idformulario = 9;

		if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}

		date_default_timezone_set("America/La_Paz");
	}

	//Metodo Index
	public function index(){

	}

	//Metodo: Crear los registros que le corresponden
	public function nuevo(){
		$usuario = $this->ion_auth->user()->row();

		//Comproba si existe registro Hoja 1
		$banderaHoja1 = $this->Cuestionario_model->existeHoja1($usuario->id);

		//Comprobar si existe registro Hoja 2
		$banderaHoja2 = $this->Cuestionario_model->existeHoja2($usuario->id);

		$hoja1 = $this->Cuestionario_model->hoja1($usuario->id);
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);


		$datos['usuario'] = $usuario;
		$datos['banderaHoja1'] = $banderaHoja1;
		$datos['banderaHoja2'] = $banderaHoja2;
		$datos['hoja1'] = $hoja1;
		$datos['hoja2'] = $hoja2;
		//var_dump($hoja1);
		//echo "<br><br>";
		//var_dump($hoja2);

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('eleccionesjud2024/vtablero', $datos);
		$this->load->view('html/pie');

	}
	public function hoja1(){
		//Datos para el formulario
		$usuario = $this->ion_auth->user()->row();
		$departamentos = $this->Departamento_model->leerDepartamentos();

		//var_dump($departamentos);

		$datos['usuario'] = $usuario;
		$datos['departamentos'] = $departamentos;
		$datos['idformulario'] = $this->_idformulario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('eleccionesjud2024/vhoja1', $datos);
		$this->load->view('html/pie');
	}

	//Metodo: Crear los registros que le corresponden
	public function hoja2(){
		//Datos para el formulario
		$usuario = $this->ion_auth->user()->row();
		$departamentos = $this->Departamento_model->leerDepartamentos();

		//var_dump($departamentos);

		$datos['usuario'] = $usuario;
		$datos['departamentos'] = $departamentos;
		$datos['idformulario'] = $this->_idformulario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('eleccionesjud2024/vhoja2', $datos);
		$this->load->view('html/pie');
	}

	public function procesarHoja1(){
		//insertar y redireccionar al tablero
		$hoja1 = $this->hoja1Obj();
		$this->Cuestionario_model->insertarHoja1($hoja1);
		redirect('eleccionesJudiciales2024/nuevo');
	}

	//Capturar informacion Hoja 1
	private function hoja1Obj()
	{
		date_default_timezone_set('America/La_Paz');
		$hoja1 = new stdClass();
		$hoja1->idusuario = $this->input->post('idusuario');
		return $hoja1;
	}

	public function procesarHoja2(){
		//insertar y redireccionar al tablero
		$hoja2 = $this->hoja2Obj();
		$this->Cuestionario_model->insertarHoja2($hoja2);
		redirect('eleccionesJudiciales2024/nuevo');
	}

	private function hoja2Obj()
	{
		date_default_timezone_set('America/La_Paz');
		$hoja2 = new stdClass();
		$hoja2->idusuario = $this->input->post('idusuario');

		return $hoja2;
	}

	public function reset1($idform){
		$this->Cuestionario_model->eliminarHoja1($idform);
		redirect('eleccionesJudiciales2024/nuevo');

	}

	public function reset2($idform){
		$this->Cuestionario_model->eliminarHoja2($idform);
		redirect('eleccionesJudiciales2024/nuevo');

	}





	//Metodo:
	public function editar(){
	}




}
