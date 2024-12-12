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
		$this->load->model('Interfaz_model');
		$this->load->model('Elecciones_model');
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

		//Preguntas layout
		$hoja1 = $this->Cuestionario_model->hoja1($usuario->id);
		$secciones = $this->Interfaz_model->leerSeccionesHoja(1);
		$preguntas_hoja = $this->Elecciones_model->listaPreguntasPorHoja1(1);

		//Extraer las respuestas
		$respuestas = json_decode($hoja1->respuestas);






		//Mesas
		$mesas_json = $hoja1->mesas;
		$mesas = json_decode($mesas_json);

		//Crear las Secciones
		$datos_secciones['secciones'] = $secciones;
		$datos_secciones['color_encabezado'] = 'cuest2';
		$datos_secciones['mesas'] = $mesas;
		$datos_secciones['hoja1'] = $hoja1;
		$datos_secciones['respuestas'] = $respuestas;
		$datos_secciones['idhoja_preguntas'] = 1;

		$seccionesUI = $this->load->view('interfaz/secciones/vsecciones', $datos_secciones, TRUE);


		//var_dump($departamentos);
		$departamento = $this->Departamento_model->leerDepartamento($hoja1->rel_iddepartamento);
		$municipio = $this->Municipio_model->leerMunicipioID($hoja1->rel_idmunicipio);
		$recinto = $this->Municipio_model->leerRecintoPorID($hoja1->rel_idrecinto);


		//Rutina para la comprobacion y despliegue de restricciones por departamento
		//Preguntas por seccion

		$datos['usuario'] = $usuario;
		$datos['departamentos'] = $departamentos;
		$datos['idformulario'] = $this->_idformulario;
		$datos['hoja1'] = $hoja1;
		$datos['departamento'] = $departamento;
		$datos['municipio'] = $municipio;
		$datos['recinto'] = $recinto;
		$datos['mesas'] = $mesas;
		$datos['seccionesUI'] = $seccionesUI;

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
		//Preguntas layout
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);
		$secciones = $this->Interfaz_model->leerSeccionesHoja(2);
		$preguntas_hoja = $this->Elecciones_model->listaPreguntasPorHoja1(2);

		//Extraer las respuestas
		$respuestas = json_decode($hoja2->respuestas);



		//mesas
		$mesas_json = $hoja2->mesas;
		$mesas = json_decode($mesas_json);

		//Crear las Secciones
		$datos_secciones['secciones'] = $secciones;
		$datos_secciones['color_encabezado'] = 'cuest2';
		$datos_secciones['mesas'] = $mesas;
		$datos_secciones['hoja2'] = $hoja2;
		$datos_secciones['respuestas'] = $respuestas;
		$datos_secciones['idhoja_preguntas'] = 2;

		$seccionesUI = $this->load->view('interfaz/secciones/vsecciones', $datos_secciones, TRUE);


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
		$datos['seccionesUI'] = $seccionesUI;


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
		$hoja1 = $this->Cuestionario_model->hoja1($sg->idusuario);
		//Convertir el dato a objetos
		$mesas = json_decode($hoja1->mesas);

		//Actualizar los valores de las mesas
		$mesas->m1 = $sg->m1;
		$mesas->m2 = $sg->m2;
		$mesas->m3 = $sg->m3;
		$mesas->m4 = $sg->m4;
		$mesas->m5 = $sg->m5;
		$mesas->m6 = $sg->m6;
		$mesas->m7 = $sg->m7;
		$mesas->m8 = $sg->m8;
		$mesas->m9 = $sg->m9;
		$mesas->m10 = $sg->m10;
		$mesas->m11 = $sg->m11;
		$mesas->m12 = $sg->m12;

		$hoja1->mesas = json_encode($mesas);

		$hoja1->esta_iniciado = 1;
		$hoja1->rel_idrecinto = $sg->recinto_csej;
		$hoja1->rel_idmunicipio = $sg->municipio_csej;
		$hoja1->rel_iddepartamento = $sg->departamento_csej;

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
		$hoja1->m6 = $this->input->post('c1-mesa6');
		$hoja1->m7 = $this->input->post('c1-mesa7');
		$hoja1->m8 = $this->input->post('c1-mesa8');
		$hoja1->m9 = $this->input->post('c1-mesa9');
		$hoja1->m10 = $this->input->post('c1-mesa10');
		$hoja1->m11 = $this->input->post('c1-mesa11');
		$hoja1->m12 = $this->input->post('c1-mesa12');

		return $hoja1;
	}



	//Agregar mesas al formulario
	public function updateMesasAdicionalesH1(){

		//Mesas enviadas
		$mesas_adicionales_json = $this->input->post('mesas');
		$mesas_adicionales = json_decode($mesas_adicionales_json);

		//Extraer mesas adicionales
		$hoja1 = $this->Cuestionario_model->hoja1($mesas_adicionales->idusuario);

		$mesas_actuales = json_decode($hoja1->mesas);

		//Adicionar las mesas adicionales a las mesas actuales
		$mesas_actuales->m6 = $mesas_adicionales->c1mesa6;
		$mesas_actuales->m7 = $mesas_adicionales->c1mesa7;
		$mesas_actuales->m8 = $mesas_adicionales->c1mesa8;
		$mesas_actuales->m9 = $mesas_adicionales->c1mesa9;
		$mesas_actuales->m10 = $mesas_adicionales->c1mesa10;
		$mesas_actuales->m11 = $mesas_adicionales->c1mesa11;
		$mesas_actuales->m12 = $mesas_adicionales->c1mesa12;

		$mesas_actuales_json = json_encode($mesas_actuales);

		//Actualizar informacion
		$this->Elecciones_model->actualizarMesasAdicionales($hoja1->idfrhoja1, $mesas_actuales_json);
	}
	//Agregar mesas al formulario
	public function updateMesasAdicionalesH2(){

		//Mesas enviadas
		$mesas_adicionales_json = $this->input->post('mesas');
		$mesas_adicionales = json_decode($mesas_adicionales_json);


		//Extraer mesas adicionales
		$hoja2 = $this->Cuestionario_model->hoja2($mesas_adicionales->idusuario);

		$mesas_actuales = json_decode($hoja2->mesas);

		//Adicionar las mesas adicionales a las mesas actuales
		$mesas_actuales->m2 = $mesas_adicionales->c2mesa2;
		$mesas_actuales->m3 = $mesas_adicionales->c2mesa3;
		$mesas_actuales->m4 = $mesas_adicionales->c2mesa4;
		$mesas_actuales->m5 = $mesas_adicionales->c2mesa5;
		$mesas_actuales->m6 = $mesas_adicionales->c2mesa6;
		$mesas_actuales->m7 = $mesas_adicionales->c2mesa7;
		$mesas_actuales->m8 = $mesas_adicionales->c2mesa8;
		$mesas_actuales->m9 = $mesas_adicionales->c2mesa9;
		$mesas_actuales->m10 = $mesas_adicionales->c2mesa10;
		$mesas_actuales->m11 = $mesas_adicionales->c2mesa11;
		$mesas_actuales->m12 = $mesas_adicionales->c2mesa12;

		$mesas_actuales_json = json_encode($mesas_actuales);

		//Actualizar informacion
		$this->Elecciones_model->actualizarMesasAdicionalesH2($hoja2->idfrhoja2, $mesas_actuales_json);
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
		$mesas->m2 = $sg->m2;
		$mesas->m3 = $sg->m3;
		$mesas->m4 = $sg->m4;



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
		//$hoja2->m5 = $this->input->post('c1-mesa5');

		return $hoja2;
	}


	//Metodo:
	public function editar(){
	}

	//Seccion para la captura de datos
	public function seccion1(){
		//Leer el cuestionario 1 y a quien pertenece
		$usuario = $this->ion_auth->user()->row();
		$hoja1 = $this->Cuestionario_model->hoja1($usuario->id);

		//Extraer las mesas registradas
		$mesas = json_decode($hoja1->mesas) ;

		//Extraer la info a llenar
		$respuestas = json_decode($hoja1->respuestas);

		//Capturar los datos enviados
		$datos_json = $this->input->post('formulario');
		$datos = json_decode($datos_json); //Datos enviados por el formulario

		//Bandera de validacion
		$formulario_correcto = 1;


		//Las mesas q se consideraran las respuestas
		echo "Mesas: "."<br>";
		$mesas = json_decode($hoja1->mesas);
		$mesas = (array)$mesas;
		var_dump($mesas);
		echo "<br><br>";

		//Eliminar las mesas vacias
		function filtro($var){
			return ($var !== NULL && $var != false && $var !=='');
		}
		$mesas_registradas = array_filter($mesas, "filtro");

		echo "Mesas Registradas: <br>";
		var_dump($mesas_registradas);
		echo "<br><br>";

		$mesas_claves = array_keys($mesas_registradas);

		echo "Mesas Registradas claves: <br>";
		var_dump($mesas_claves);
		echo "<br><br>";

		$mesas_indice = array();
		foreach ($mesas_claves as $mk){
			if($mk == 'm1'){
				
			}
			elseif ($mk == 'm2'){

			}
			elseif ($mk == 'm3'){

			}elseif ($mk == 'm4'){

			}elseif ($mk == 'm5'){

			}elseif ($mk == 'm6'){

			}elseif ($mk == 'm7'){

			}elseif ($mk == 'm8'){

			}
			elseif ($mk == 'm9'){

			}elseif ($mk == 'm10'){

			}
			elseif ($mk == 'm11'){

			}
			elseif ($mk == 'm12'){

			}

		}





		echo "Datos recibidos"."<br>";
		var_dump($datos);
		echo "<br><br>";


		echo "Respuestas a llenar"."<br>";
		var_dump($respuestas);
		echo "<br><br><br>";

		//Rutina para guardar la informacion recibida
		echo "INICIO"."<br>";
		foreach ($respuestas as $rp):
			echo "CP: ".$rp->codigo_pregunta.' '.'Tipo: '.$rp->tipo;
			echo "<br>";

			//Comprobar el tipo de respuesta

			if($rp->tipo == 6){
				echo "tipo 6";
				echo "<br>";
				//Buscar las respuestas de las mesas




			}
			elseif ($rp->tipo == 10){
				echo "tipo 10";
				echo "<br>";

			}
			elseif ($rp->tipo == 9){
				echo "tipo 9";
				echo "<br>";

			}
			elseif ($rp->tipo == 11){
				echo "tipo 11";
				echo "<br>";

			}
			elseif ($rp->tipo == 5){
				echo "tipo 5";
				echo "<br>";

			}
			else{};

			echo "<br><br>";

		endforeach;












	}

	//Seccion para la captura de datos
	public function seccion2(){
		$usuario = $this->ion_auth->user()->row();
		$hoja1 = $this->Cuestionario_model->hoja1($usuario->id);
		$datos_json = $this->input->post('respuesta');
		$datos = json_decode($datos_json);

		//Extraer las preguntas
		$respuestas_json = $hoja1->respuestas;
		$respuestas = json_decode($respuestas_json);

		$codigopregunta = $datos->codigopregunta;
		$r = $respuestas->$codigopregunta;
		$r->respuesta = $datos->$codigopregunta;
		$respuestas->$codigopregunta = $r;
		$respuestas_json_actualizada = json_encode($respuestas);
		//var_dump($respuestas_json_actualizada);
		$this->Elecciones_model->actualizarRespuestasHoja1($hoja1->idfrhoja1, $respuestas_json_actualizada);
	}

	//Seccion para la captura de datos
	public function seccion3(){

	}

	//Seccion para la captura de datos
	public function seccion4(){
		/*$usuario = $this->ion_auth->user()->row();

		echo "<br><br>";
		echo "Hoja1"."<br>";
		$hoja1 = $this->Cuestionario_model->hoja1($usuario->id);
		var_dump($hoja1);

		echo "<br><br>";
		echo "Seccion json recivida"."<br>";
		$datos_seccion_recibido = $this->input->post('mesas');
		var_dump($datos_seccion_recibido);*/



	}

	//Seccion para la captura de datos
	public function seccion5(){

	}

	//Seccion para la captura de datos
	public function seccion6(){

	}

	//Seccion para la captura de datos
	public function seccion7(){

	}

	//Seccion para la captura de datos
	public function seccion8(){

	}
	//Seccion para la captura de datos
	public function seccion9(){

	}

	//Seccion para la captura de datos
	public function seccion10(){

	}

	//Seccion para la captura de datos
	public function seccion11(){

	}

	//Seccion para la captura de datos
	public function seccion12(){
		//Capturar los datos de la seccion

		//Extraer la seccion de la base de datos

		//Extraer la hoja


	}


	//Extraer las preguntas de una seccion
	public function getpreguntasseccion(){
		$json = array();
		$idseccion = $this->input->post('idseccion');
		$json = $this->Interfaz_model->preguntasPorSeccion($idseccion);
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	//Extraer las mesas obligatorias del cuestionario 1
	public function getmesasoblc1(){
		$json = array();

		$usuario = $this->ion_auth->user()->row();
		$hoja1 = $this->Cuestionario_model->hoja1($usuario->id);

		//Extraer las preguntas
		$mesas = json_decode($hoja1->mesas);
		$mesas = (array)$mesas;

		function filtro($var){
			return ($var !== NULL && $var != false && $var !=='');
		}

		$mesas = array_filter($mesas, "filtro");

		//Filtrar las mesas vacias

		//var_dump($mesas);
		$i=1;
		$mesas_obligatorias = array();
		$mesas_opcionales = array();
		/** @noinspection PhpLanguageLevelInspection */
		$mesa = [
			'numero' => '',
			'valor' => '',
		];

		for($i; $i<6; $i++ ){
			$mstr = 'mesa'.$i;
			$key = 'm'.$i;
			$mesa['numero'] = $i;
			$mesa['valor'] = $mesas[$key];
			array_push($mesas_obligatorias, $mesa);
		}
		//var_dump($mesas_obligatorias);
		header('Content-Type: application/json');
		echo json_encode($mesas_obligatorias);
	}

	//Extraer las mesas opcionales
	public function getmesasopc1(){
		$json = array();

		$usuario = $this->ion_auth->user()->row();
		$hoja1 = $this->Cuestionario_model->hoja1($usuario->id);

		//Extraer las preguntas
		$mesas = json_decode($hoja1->mesas);
		$mesas = (array)$mesas;
		var_dump($mesas);

		$mesas_opcionales = array();
		/** @noinspection PhpLanguageLevelInspection */
		$mesa = [
			'numero' => '',
			'valor' => '',
		];
		$i= 6;
		for($i; $i<13; $i++ ){
			$mstr = 'mesa'.$i;
			$key = 'm'.$i;
			$mesa['numero'] = $i;
			$mesa['valor'] = $mesas[$key];
			array_push($mesas_opcionales, $mesa);
		}


		function filtro($var){
			return ($var !== NULL && $var != false && $var !=='');
		}

		$mesasOpcionales = array_filter($mesas, "filtro");
		var_dump($mesasOpcionales);

	}

	//Extraer la mesas de la hoja 1
	public function getmesashoja1(){
		$json = array();

		$usuario = $this->ion_auth->user()->row();
		$hoja1 = $this->Cuestionario_model->hoja1($usuario->id);

		//Extraer las preguntas
		$mesas = $hoja1->mesas;

		header('Content-Type: application/json');
		echo json_encode($mesas);
	}




}
