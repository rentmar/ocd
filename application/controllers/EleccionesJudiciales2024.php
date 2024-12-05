<?php

class EleccionesJudiciales2024 extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->model('Cuestionario_model');
		$this->load->model('Departamento_model');
		$this->load->model('Municipio_model');
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

		//Crea los formularios en caso de que no existasn
		//Cuestionario 1
		if(!$banderaHoja1){
			//echo "No existe formulario 1, crear <br>";
			//Crear el formulario 1
			$this->Cuestionario_model->crearHoja1($usuario->id);
		}elseif ($banderaHoja1){
			//echo "Existe formulario 1 <br>";
		}

		//Cuestionario 2
		if(!$banderaHoja2){
			//echo "No existe formulario 1, crear <br>";
			$this->Cuestionario_model->crearHoja2($usuario->id);
		}elseif ($banderaHoja2){
			//echo "Existe formulario 1 <br>";
		}


		$hoja1 = $this->Cuestionario_model->hoja1($usuario->id);
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);



		$datos['usuario'] = $usuario;
		$datos['banderaHoja1'] = $banderaHoja1;
		$datos['banderaHoja2'] = $banderaHoja2;
		$datos['hoja1'] = $hoja1;
		$datos['hoja2'] = $hoja2;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('eleccionesjud2024/vtablero', $datos);
		$this->load->view('html/pie');

	}
	public function hoja1($idhoja1){
		//Datos para el formulario
		$usuario = $this->ion_auth->user()->row();
		$departamentos = $this->Departamento_model->leerDepartamentos();

		$hoja1 = $this->Cuestionario_model->hoja1($usuario->id);

		/*var_dump($hoja1);
		echo "<br><br>";*/

		$mesas_json = $hoja1->mesas;
		$mesas = json_decode($mesas_json);
		//var_dump($mesas);

		//var_dump($departamentos);
		$departamento = $this->Departamento_model->leerDepartamento($hoja1->rel_iddepartamento);
		/*echo "<br><br>";
		echo "Departamento: ";
		var_dump($departamento);*/

		$municipio = $this->Municipio_model->leerMunicipioID($hoja1->rel_idmunicipio);
		/*echo "<br><br>";
		echo "Municipio: ";
		var_dump($municipio);*/

		$recinto = $this->Municipio_model->leerRecintoPorID($hoja1->rel_idrecinto);
		//echo "<br><br>";
		//echo "Recinto: ";
		//var_dump($recinto);


		$datos['usuario'] = $usuario;
		$datos['departamentos'] = $departamentos;
		$datos['idformulario'] = $this->_idformulario;
		$datos['hoja1'] = $hoja1;
		$datos['departamento'] = $departamento;
		$datos['municipio'] = $municipio;
		$datos['recinto'] = $recinto;
		$datos['mesas'] = $mesas;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('eleccionesjud2024/vhoja1', $datos);
		$this->load->view('html/pie');
	}

	//Metodo: Crear los registros que le corresponden
	public function hoja2($idhoja2){
		//Datos para el formulario
		$usuario = $this->ion_auth->user()->row();
		$departamentos = $this->Departamento_model->leerDepartamentos();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);

		$mesas_json = $hoja2->mesas;
		$mesas = json_decode($mesas_json);

		$departamento = $this->Departamento_model->leerDepartamento($hoja2->rel_iddepartamento);
		$municipio = $this->Municipio_model->leerMunicipioID($hoja2->rel_idmunicipio);
		$recinto = $this->Municipio_model->leerRecintoPorID($hoja2->rel_idrecinto);

		$datos['usuario'] = $usuario;
		$datos['departamentos'] = $departamentos;
		$datos['idformulario'] = $this->_idformulario;
		$datos['hoja2'] = $hoja2;
		$datos['departamento'] = $departamento;
		$datos['municipio'] = $municipio;
		$datos['recinto'] = $recinto;
		$datos['mesas'] = $mesas;


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


	//Almacenar la informacion de la seccion general Hoja 1
	public function procesarSeccionGeneralH1(){
		$sg = $this->seccionGralH1();
		//var_dump($sg);
		//echo "<br><br>";
		$hoja1 = $this->Cuestionario_model->hoja1($sg->idusuario);
		//var_dump($hoja1);
		/*echo "<br><br>";
		echo "Mesas json: ";*/
		//Extraer las mesas
		$mesas_json = $hoja1->mesas;
		//var_dump($mesas_json);
		//echo "<br><br>";
		//echo "Mesas: ";
		//Convertir el dato a objetos
		$mesas = json_decode($hoja1->mesas) ;
		//var_dump($mesas);

		//Actualizar los valores de las mesas
		$mesas->m1 = $sg->m1;
		$mesas->m2 = $sg->m2;
		$mesas->m3 = $sg->m3;
		$mesas->m4 = $sg->m4;
		$mesas->m5 = $sg->m5;
		//echo "<br><br>";
		//echo "Mesas actualizadas";
		//var_dump($mesas);
		//echo "<br><br>";
		//echo "Hoja con mesas actualizadas: ";
		$hoja1->mesas = json_encode($mesas);
		//var_dump($hoja1);
		//echo "<br><br>";
		//echo "Resto de las variables actualizadas, hoja1 inicializada: ";
		$hoja1->esta_iniciado = 1;
		$hoja1->rel_idrecinto = $sg->recinto_csej;
		$hoja1->rel_idmunicipio = $sg->municipio_csej;
		$hoja1->rel_iddepartamento = $sg->departamento_csej;
		//var_dump($hoja1);

		$this->Cuestionario_model->actualizarSgralH1($hoja1);
		redirect('eleccionesJudiciales2024/hoja1/'.$hoja1->idfrhoja1);


	}

	private function seccionGralH1()
	{
		date_default_timezone_set('America/La_Paz');
		$hoja1 = new stdClass();
		$hoja1->idusuario = $this->input->post('idusuario');
		$hoja1->idhoja1 = $this->input->post('idhoja1');
		$hoja1->departamento_csej = $this->input->post('departamento_csej');
		$hoja1->municipio_csej = $this->input->post('municipio_csej');
		$hoja1->recinto_csej = $this->input->post('recinto_csej');
		$hoja1->m1 = $this->input->post('c1-mesa1');
		$hoja1->m2 = $this->input->post('c1-mesa2');
		$hoja1->m3 = $this->input->post('c1-mesa3');
		$hoja1->m4 = $this->input->post('c1-mesa4');
		$hoja1->m5 = $this->input->post('c1-mesa5');

		return $hoja1;
	}


	public function procesarSeccionGeneralH2(){
		$sg = $this->seccionGralH2();
		$hoja2 = $this->Cuestionario_model->hoja2($sg->idusuario);

		//Extraer las mesas
		$mesas_json = $hoja2->mesas;

		//Convertir el dato a objetos
		$mesas = json_decode($hoja2->mesas) ;

		//Actualizar los valores de las mesas
		$mesas->m1 = $sg->m1;

		$hoja2->mesas = json_encode($mesas);

		$hoja2->esta_iniciado = 1;
		$hoja2->rel_idrecinto = $sg->recinto_csej;
		$hoja2->rel_idmunicipio = $sg->municipio_csej;
		$hoja2->rel_iddepartamento = $sg->departamento_csej;

		$this->Cuestionario_model->actualizarSgralH2($hoja2);
		redirect('eleccionesJudiciales2024/hoja2/'.$hoja2->idfrhoja2);

	}

	private function seccionGralH2()
	{
		date_default_timezone_set('America/La_Paz');
		$hoja2 = new stdClass();
		$hoja2->idusuario = $this->input->post('idusuario');
		$hoja2->idhoja1 = $this->input->post('idhoja2');
		$hoja2->departamento_csej = $this->input->post('departamento_csej');
		$hoja2->municipio_csej = $this->input->post('municipio_csej');
		$hoja2->recinto_csej = $this->input->post('recinto_csej');
		$hoja2->m1 = $this->input->post('c1-mesa1');
		$hoja2->m2 = $this->input->post('c1-mesa2');
		$hoja2->m3 = $this->input->post('c1-mesa3');
		$hoja2->m4 = $this->input->post('c1-mesa4');
		$hoja2->m5 = $this->input->post('c1-mesa5');

		return $hoja2;
	}





	//Metodo:
	public function editar(){
	}




}
