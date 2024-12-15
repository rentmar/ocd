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

		//var_dump($hoja1);

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
		//var_dump($respuestas);



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
		/*
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
		$this->Elecciones_model->actualizarMesasAdicionales($hoja1->idfrhoja1, $mesas_actuales_json);*/
	}
	//Agregar mesas al formulario
	public function updateMesasAdicionalesH2(){
		$sg2 = $this->seccionGralH2();
		//Datos para el formulario
		$usuario = $this->ion_auth->user()->row();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);

		//mesas
		$mesas_json = $hoja2->mesas;
		$mesas = json_decode($mesas_json);

		$mesas->m2 = $sg2->m2;
		$mesas->m3 = $sg2->m3;
		$mesas->m4 = $sg2->m4;


		$mesas_actuales_json = json_encode($mesas);



		//Actualizar informacion
		$this->Elecciones_model->actualizarMesasAdicionalesH2($hoja2->idfrhoja2, $mesas_actuales_json);
		redirect('eleccionesJudiciales2024/hoja2/'.$hoja2->idfrhoja2);
	}





	public function procesarSeccionGeneralH2(){
		$sg = $this->seccionGralH2();
		$hoja2 = $this->Cuestionario_model->hoja2($sg->idusuario);
		var_dump($sg);
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
		$hoja2->m1 = $this->input->post('c2-mesa1');
		$hoja2->m2 = $this->input->post('c2-mesa2');
		$hoja2->m3 = $this->input->post('c2-mesa3');
		$hoja2->m4 = $this->input->post('c2-mesa4');
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
		//var_dump($respuestas);

		//Capturar los datos enviados
		$datos_json = $this->input->post('formulario');
		$datos = json_decode($datos_json); //Datos enviados por el formulario

		//Bandera de validacion
		$formulario_correcto = 1;




		//Las mesas q se consideraran las respuestas
		$mesas = json_decode($hoja1->mesas);
		$mesas = (array)$mesas;

		//var_dump($mesas);

		//Eliminar las mesas vacias
		function filtro($var){
			return ($var !== NULL && $var != false && $var !=='');
		}
		$mesas_registradas = array_filter($mesas, "filtro");
		$mesas_claves = array_keys($mesas_registradas);
		$mesas_indice = array();
		foreach ($mesas_claves as $mk){
			if($mk == 'm1'){
				$mesas_indice['m1'] = 'mesa1';
			}
			elseif ($mk == 'm2'){
				$mesas_indice['m2'] = 'mesa2';
			}
			elseif ($mk == 'm3'){
				$mesas_indice['m3'] = 'mesa3';

			}elseif ($mk == 'm4'){
				$mesas_indice['m4'] = 'mesa4';

			}elseif ($mk == 'm5'){
				$mesas_indice['m5'] = 'mesa5';

			}elseif ($mk == 'm6'){
				$mesas_indice['m6'] = 'mesa6';

			}elseif ($mk == 'm7'){
				$mesas_indice['m7'] = 'mesa7';

			}elseif ($mk == 'm8'){
				$mesas_indice['m8'] = 'mesa8';
			}
			elseif ($mk == 'm9'){
				$mesas_indice['m9'] = 'mesa9';
			}elseif ($mk == 'm10'){
				$mesas_indice['m10'] = 'mesa10';
			}
			elseif ($mk == 'm11'){
				$mesas_indice['m11'] = 'mesa11';
			}
			elseif ($mk == 'm12'){
				$mesas_indice['m12'] = 'mesa12';
			}
		}
		//var_dump($mesas_indice);
		$datos_array = (array)$datos;
		//var_dump($datos_array);
		//Matriz de respuestas
		$respuestas_capturadas_matriz = array();
		//Repuesta pivote
		/** @noinspection PhpLanguageLevelInspection */
		$resp_pivote =[
			'mesa1' => '',
			'mesa2' => '',
			'mesa3' => '',
			'mesa4' => '',
			'mesa5' => '',
			'mesa6' => '',
			'mesa7' => '',
			'mesa8' => '',
			'mesa9' => '',
			'mesa10' => '',
			'mesa11' => '',
			'mesa12' => '',
			'valor' => '',
		];

		//Rutina para guardar la informacion recibida
		//echo "INICIO"."<br>";
		foreach ($respuestas as $rp):
			//Comprobar el tipo de respuesta
			if($rp->tipo == 6){
				//Buscar las respuestas de las mesas
				foreach($mesas_indice as $mi){
					$key = $rp->codigo_pregunta.'-'.$mi;
					//Comprobar si existe la respuesta
					if(isset($datos_array[$key])){
						//Almacenar la respuesta
						$resp_pivote[$mi] = $datos_array[$key];
						$respuestas_capturadas_matriz[$rp->codigo_pregunta] = $resp_pivote;
					}else{
						//Faltan datos
						$formulario_correcto = 0;
						break;
					}
				}
			}
			elseif ($rp->tipo == 10){
				//Etiqueta sin respuesta
			}
			elseif ($rp->tipo == 9){
				//Buscar las respuestas de las mesas
				foreach($mesas_indice as $mi){
					$key = $rp->codigo_pregunta.'-'.$mi;
					//Comprobar si existe la respuesta
					if(isset($datos_array[$key])){
						//Almacenar la respuesta
						$resp_pivote[$mi] = $datos_array[$key];
						$respuestas_capturadas_matriz[$rp->codigo_pregunta] = $resp_pivote;
					}else{
						//Faltan datos
						$formulario_correcto = 0;
						break;
					}
				}
			}
			elseif ($rp->tipo == 11){
				//Comprobar si existe la respuesta
				//Buscar las respuestas de las mesas
				foreach($mesas_indice as $mi){
					$key = $rp->codigo_pregunta.'-'.$mi;
					//Comprobar si existe la respuesta
					if(isset($datos_array[$key])){
						//Almacenar la respuesta
						$resp_pivote[$mi] = $datos_array[$key];
						$respuestas_capturadas_matriz[$rp->codigo_pregunta] = $resp_pivote;
					}else{
						//Faltan datos
						$formulario_correcto = 0;
						break;
					}
				}
			}
			elseif ($rp->tipo == 5){
				//Sin validacion
			}
			else{};
		endforeach;

//		echo $formulario_correcto;
		//echo "<br><br>";

		if($formulario_correcto == 1){
			//Guardar la informacion
			foreach ($respuestas as $sp){
				//echo "Codigo pregunta: ".$sp->codigo_pregunta.' ';
				//echo "<br>";
				if($sp->tipo == 6){
					//echo "tipo 6";
					//echo "<br>";
					//Iterar respuesta
					$resp_cap = $respuestas_capturadas_matriz[$sp->codigo_pregunta];
					//var_dump($resp_cap);
					$sp->m1 = $resp_cap['mesa1'];
					$sp->m2 = $resp_cap['mesa2'];
					$sp->m3 = $resp_cap['mesa3'];
					$sp->m4 = $resp_cap['mesa4'];
					$sp->m5 = $resp_cap['mesa5'];
					$sp->m6 = $resp_cap['mesa6'];
					$sp->m7 = $resp_cap['mesa7'];
					$sp->m8 = $resp_cap['mesa8'];
					$sp->m9 = $resp_cap['mesa9'];
					$sp->m10 = $resp_cap['mesa10'];
					$sp->m11 = $resp_cap['mesa11'];
					$sp->m12 = $resp_cap['mesa12'];
					//echo "<br>";
				}elseif ($sp->tipo == 10){
					//Respuesta etiqueta matricial s/r

				}elseif ($sp->tipo == 9){
					//Input numerico matricial con limite inferior
					//echo "Codigo pregunta: ".$sp->codigo_pregunta.' ';
					//echo "<br>";
					//echo "tipo 6";
					//echo "<br>";
					//Iterar respuesta
					$resp_cap = $respuestas_capturadas_matriz[$sp->codigo_pregunta];
					//var_dump($resp_cap);
					$sp->m1 = $resp_cap['mesa1'];
					$sp->m2 = $resp_cap['mesa2'];
					$sp->m3 = $resp_cap['mesa3'];
					$sp->m4 = $resp_cap['mesa4'];
					$sp->m5 = $resp_cap['mesa5'];
					$sp->m6 = $resp_cap['mesa6'];
					$sp->m7 = $resp_cap['mesa7'];
					$sp->m8 = $resp_cap['mesa8'];
					$sp->m9 = $resp_cap['mesa9'];
					$sp->m10 = $resp_cap['mesa10'];
					$sp->m11 = $resp_cap['mesa11'];
					$sp->m12 = $resp_cap['mesa12'];
					//echo "<br>";
				}elseif ($sp->tipo == 11){
					//Input hora matricial
					//echo "tipo 6";
					//echo "<br>";
					//Iterar respuesta
					$resp_cap = $respuestas_capturadas_matriz[$sp->codigo_pregunta];
					//var_dump($resp_cap);
					$sp->m1 = $resp_cap['mesa1'];
					$sp->m2 = $resp_cap['mesa2'];
					$sp->m3 = $resp_cap['mesa3'];
					$sp->m4 = $resp_cap['mesa4'];
					$sp->m5 = $resp_cap['mesa5'];
					$sp->m6 = $resp_cap['mesa6'];
					$sp->m7 = $resp_cap['mesa7'];
					$sp->m8 = $resp_cap['mesa8'];
					$sp->m9 = $resp_cap['mesa9'];
					$sp->m10 = $resp_cap['mesa10'];
					$sp->m11 = $resp_cap['mesa11'];
					$sp->m12 = $resp_cap['mesa12'];
					//echo "<br>";

				}elseif ($sp->tipo == 5){
					//Text con label

				}

			}

			//Actualizar la base de datos
			$respuestas_json_actualizada = json_encode($respuestas);
			$this->Elecciones_model->actualizarRespuestasHoja1($hoja1->idfrhoja1, $respuestas_json_actualizada);
			/** @noinspection PhpLanguageLevelInspection */
			$banderas =[
				'validado' => $formulario_correcto,
				'mensaje' => 'Informacion Almacenada'
			];
		}else{

			/** @noinspection PhpLanguageLevelInspection */
			$banderas =[
				'validado' => $formulario_correcto,
				'mensaje' => 'Informacion incompleta, revise las respuestas',
			];

		}
		$bandera = (object)$banderas;
		$json = array();
		$json = json_encode($banderas) ;
		header('Content-Type: application/json');
		echo json_encode($json);
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

/*********************************  Hoja 2  *****************************************************************/

	//Seccion para la captura de datos
	public function h2seccion1(){

		//Leer el cuestionario 1 y a quien pertenece
		$usuario = $this->ion_auth->user()->row();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);

		//Extraer las mesas registradas
		$mesas = json_decode($hoja2->mesas) ;

		//Extraer la info a llenar
		$respuestas = json_decode($hoja2->respuestas);
		//var_dump($respuestas);

		//Capturar los datos enviados
		$datos_json = $this->input->post('formulario');
		$datos = json_decode($datos_json); //Datos enviados por el formulario

		//Bandera de validacion
		$formulario_correcto = 1;




		//Las mesas q se consideraran las respuestas
		$mesas = json_decode($hoja2->mesas);
		$mesas = (array)$mesas;

		//var_dump($mesas);

		//Eliminar las mesas vacias
		function filtro($var){
			return ($var !== NULL && $var != false && $var !=='');
		}
		$mesas_registradas = array_filter($mesas, "filtro");
		$mesas_claves = array_keys($mesas_registradas);
		$mesas_indice = array();
		foreach ($mesas_claves as $mk){
			if($mk == 'm1'){
				$mesas_indice['m1'] = 'mesa1';
			}
			elseif ($mk == 'm2'){
				$mesas_indice['m2'] = 'mesa2';
			}
			elseif ($mk == 'm3'){
				$mesas_indice['m3'] = 'mesa3';

			}elseif ($mk == 'm4'){
				$mesas_indice['m4'] = 'mesa4';

			}elseif ($mk == 'm5'){
				$mesas_indice['m5'] = 'mesa5';

			}elseif ($mk == 'm6'){
				$mesas_indice['m6'] = 'mesa6';

			}elseif ($mk == 'm7'){
				$mesas_indice['m7'] = 'mesa7';

			}elseif ($mk == 'm8'){
				$mesas_indice['m8'] = 'mesa8';
			}
			elseif ($mk == 'm9'){
				$mesas_indice['m9'] = 'mesa9';
			}elseif ($mk == 'm10'){
				$mesas_indice['m10'] = 'mesa10';
			}
			elseif ($mk == 'm11'){
				$mesas_indice['m11'] = 'mesa11';
			}
			elseif ($mk == 'm12'){
				$mesas_indice['m12'] = 'mesa12';
			}
		}
		//var_dump($mesas_indice);
		$datos_array = (array)$datos;
		//var_dump($datos_array);
		//Matriz de respuestas
		$respuestas_capturadas_matriz = array();
		//Repuesta pivote
		/** @noinspection PhpLanguageLevelInspection */
		$resp_pivote =[
			'mesa1' => '',
			'mesa2' => '',
			'mesa3' => '',
			'mesa4' => '',
			'valor' => '',
		];

		//Rutina para guardar la informacion recibida
		//echo "INICIO"."<br>";
		foreach ($respuestas as $rp):
			//Comprobar el tipo de respuesta
			if($rp->tipo == 6){
				//Buscar las respuestas de las mesas
				foreach($mesas_indice as $mi){
					$key = $rp->codigo_pregunta.'-'.$mi;
					//Comprobar si existe la respuesta
					if(isset($datos_array[$key])){
						//Almacenar la respuesta
						$resp_pivote[$mi] = $datos_array[$key];
						$respuestas_capturadas_matriz[$rp->codigo_pregunta] = $resp_pivote;
					}else{
						//Faltan datos
						//$formulario_correcto = 0;
						break;
					}
				}
			}
			elseif ($rp->tipo == 10){
				//Etiqueta sin respuesta
			}
			elseif ($rp->tipo == 9){
				//Buscar las respuestas de las mesas
				foreach($mesas_indice as $mi){
					$key = $rp->codigo_pregunta.'-'.$mi;
					//Comprobar si existe la respuesta
					if(isset($datos_array[$key])){
						//Almacenar la respuesta
						$resp_pivote[$mi] = $datos_array[$key];
						$respuestas_capturadas_matriz[$rp->codigo_pregunta] = $resp_pivote;
					}else{
						//Faltan datos
						//$formulario_correcto = 0;
						break;
					}
				}
			}
			elseif ($rp->tipo == 11){
				//Comprobar si existe la respuesta
				//Buscar las respuestas de las mesas
				foreach($mesas_indice as $mi){
					$key = $rp->codigo_pregunta.'-'.$mi;
					//Comprobar si existe la respuesta
					if(isset($datos_array[$key])){
						//Almacenar la respuesta
						$resp_pivote[$mi] = $datos_array[$key];
						$respuestas_capturadas_matriz[$rp->codigo_pregunta] = $resp_pivote;
					}else{
						//Faltan datos
						//$formulario_correcto = 0;
						break;
					}
				}
			}
			elseif ($rp->tipo == 5){
				//Sin validacion
			}
			else{};
		endforeach;

//		echo $formulario_correcto;
		//echo "<br><br>";

		if($formulario_correcto == 1){
			//Guardar la informacion
			foreach ($respuestas as $sp){
				//echo "Codigo pregunta: ".$sp->codigo_pregunta.' ';
				//echo "<br>";
				if($sp->tipo == 6){
					//echo "tipo 6";
					//echo "<br>";
					//Iterar respuesta
					$resp_cap = $respuestas_capturadas_matriz[$sp->codigo_pregunta];
					var_dump($resp_cap);
					$sp->m1 = $resp_cap['mesa1'];
					$sp->m2 = $resp_cap['mesa2'];
					$sp->m3 = $resp_cap['mesa3'];
					$sp->m4 = $resp_cap['mesa4'];

					//echo "<br>";
				}elseif ($sp->tipo == 10){
					//Respuesta etiqueta matricial s/r

				}elseif ($sp->tipo == 9){
					//Input numerico matricial con limite inferior
					//echo "Codigo pregunta: ".$sp->codigo_pregunta.' ';
					//echo "<br>";
					//echo "tipo 6";
					//echo "<br>";
					//Iterar respuesta
					$resp_cap = $respuestas_capturadas_matriz[$sp->codigo_pregunta];
					//var_dump($resp_cap);
					$sp->m1 = $resp_cap['mesa1'];
					$sp->m2 = $resp_cap['mesa2'];
					$sp->m3 = $resp_cap['mesa3'];
					$sp->m4 = $resp_cap['mesa4'];

					//echo "<br>";
				}elseif ($sp->tipo == 11){
					//Input hora matricial
					//echo "tipo 6";
					//echo "<br>";
					//Iterar respuesta
					$resp_cap = $respuestas_capturadas_matriz[$sp->codigo_pregunta];
					//var_dump($resp_cap);
					$sp->m1 = $resp_cap['mesa1'];
					$sp->m2 = $resp_cap['mesa2'];
					$sp->m3 = $resp_cap['mesa3'];
					$sp->m4 = $resp_cap['mesa4'];

					//echo "<br>";

				}elseif ($sp->tipo == 5){
					//Text con label

				}

			}

			//Actualizar la base de datos
			$respuestas_json_actualizada = json_encode($respuestas);
			var_dump($respuestas);
			//$this->Elecciones_model->actualizarRespuestasHoja1($hoja2->idfrhoja2, $respuestas_json_actualizada);
			/** @noinspection PhpLanguageLevelInspection */
			$banderas =[
				'validado' => $formulario_correcto,
				'mensaje' => 'Informacion Almacenada'
			];
		}else{

			/** @noinspection PhpLanguageLevelInspection */
			$banderas =[
				'validado' => $formulario_correcto,
				'mensaje' => 'Informacion incompleta, revise las respuestas',
			];

		}
		$bandera = (object)$banderas;
		$json = array();
		$json = json_encode($banderas) ;
		header('Content-Type: application/json');
		echo json_encode($json);



	}

	//Seccion Cierre --- Listo
	public function formulario2_s1(){
		//echo "Hola Mundo";
		$usuario = $this->ion_auth->user()->row();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);
		$datos_json = $this->input->post('formulario');
		$datos = json_decode($datos_json);
		$datos_array = (array) $datos;
		$respuestas = json_decode($hoja2->respuestas);
		$respuestas_array = (array)$respuestas;

		//Llave de mesas
		//Las mesas q se consideraran las respuestas
		$mesas = json_decode($hoja2->mesas);
		$mesas = (array)$mesas;

		function filtro($var){
			return ($var !== NULL && $var != false && $var !=='');
		}
		$mesas_registradas = array_filter($mesas, "filtro");
		$mesas_claves = array_keys($mesas_registradas);

		$mesas_indice = array();
		foreach ($mesas_claves as $mk) {
			if ($mk == 'm1') {
				$mesas_indice['m1'] = 'mesa1';
			} elseif ($mk == 'm2') {
				$mesas_indice['m2'] = 'mesa2';
			} elseif ($mk == 'm3') {
				$mesas_indice['m3'] = 'mesa3';

			} elseif ($mk == 'm4') {
				$mesas_indice['m4'] = 'mesa4';
			}
		}
		var_dump($datos_array);

		echo "<br><br><br>";

		$idseccion = $datos->idseccion;
		$preguntas_seccion = $this->Interfaz_model->preguntasPorSeccion($idseccion);
		echo "Preguntas de seccion";
		var_dump($preguntas_seccion);
		echo "<br><br><br>";
		var_dump($mesas_indice);
		echo "<br><br><br>";
		//var_dump($respuestas_array);
		echo  "<br>";
		//Matriz de respuestas
		$recolector = array();

		//Iterar las respuestas
		foreach ($respuestas_array as $ra)
		{
			echo "CP: ".$ra->codigo_pregunta;
			echo "<br>";
			if($ra->tipo == 6){
				foreach ($mesas_indice as $mi){
					$keydatos = $ra->codigo_pregunta.'-'.$mi;
					if($mi === 'mesa1'){
						$keyrec = 'm1';
					}
					elseif($mi === 'mesa2'){
						$keyrec = 'm2';
					}
					elseif($mi === 'mesa3'){
						$keyrec = 'm3';
					}
					elseif($mi === 'mesa4'){
						$keyrec = 'm4';
					}

					if(isset($datos_array[$keydatos])){
						$resp_pivote[$keyrec] = $datos_array[$keydatos];
						$recolector[$ra->codigo_pregunta] =  $resp_pivote;
					}
				}
			}elseif($ra->tipo == 8){
				foreach ($mesas_indice as $mi){
					$keydatos = $ra->codigo_pregunta.'-'.$mi;
					if($mi === 'mesa1'){
						$keyrec = 'm1';
					}
					elseif($mi === 'mesa2'){
						$keyrec = 'm2';
					}
					elseif($mi === 'mesa3'){
						$keyrec = 'm3';
					}
					elseif($mi === 'mesa4'){
						$keyrec = 'm4';
					}

					if(isset($datos_array[$keydatos])){
						$resp_pivote[$keyrec] = $datos_array[$keydatos];
						$recolector[$ra->codigo_pregunta] =  $resp_pivote;
					}
				}
			}elseif($ra->tipo == 11){
				foreach ($mesas_indice as $mi){
					$keydatos = $ra->codigo_pregunta.'-'.$mi;
					if($mi === 'mesa1'){
						$keyrec = 'm1';
					}
					elseif($mi === 'mesa2'){
						$keyrec = 'm2';
					}
					elseif($mi === 'mesa3'){
						$keyrec = 'm3';
					}
					elseif($mi === 'mesa4'){
						$keyrec = 'm4';
					}

					if(isset($datos_array[$keydatos])){
						$resp_pivote[$keyrec] = $datos_array[$keydatos];
						$recolector[$ra->codigo_pregunta] =  $resp_pivote;
					}
				}
			}
		}

		echo "<br><br><br>";
		var_dump($recolector);
		echo "<br><br><br>";
		var_dump($mesas_indice);
		echo "<br>";
		var_dump($preguntas_seccion);
		echo "<br>";
		var_dump($mesas_claves);
		echo "br";

		foreach ($preguntas_seccion as $ps){
			echo 'CP: '.$ps->codigo_pregunta;
			echo "<br>";
			//var_dump($recolector[$ps->codigo_pregunta]);;
			echo "<br>";
			//var_dump($respuestas_array[$ps->codigo_pregunta]);
			echo "<br><br>";
			foreach ($mesas_claves as $c){
				$respuestas_array[$ps->codigo_pregunta]->$c = $recolector[$ps->codigo_pregunta][$c];
				echo $c;
				 echo "<br>";
			}
		}

		echo "<br><br><br>";
		echo "Respuestas <br>";
		var_dump($respuestas);
		$respuestas_json_actualizada = json_encode($respuestas);
		$this->Elecciones_model->actualizarRespuestasHoja2($hoja2->idfrhoja2, $respuestas_json_actualizada);

	}

	//Seccion recoleccion de datos escrutinio  -- completo
	public function formulario2_s2(){

		echo "ESCRUTINIO";
		$usuario = $this->ion_auth->user()->row();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);
		$datos_json = $this->input->post('formulario');
		$datos = json_decode($datos_json);
		$datos_array = (array) $datos;
		$respuestas = json_decode($hoja2->respuestas);
		$respuestas_array = (array)$respuestas;

		//Llave de mesas
		//Las mesas q se consideraran las respuestas
		$mesas = json_decode($hoja2->mesas);
		$mesas = (array)$mesas;

		function filtro($var){
			return ($var !== NULL && $var != false && $var !=='');
		}
		$mesas_registradas = array_filter($mesas, "filtro");
		$mesas_claves = array_keys($mesas_registradas);

		$mesas_indice = array();
		foreach ($mesas_claves as $mk) {
			if ($mk == 'm1') {
				$mesas_indice['m1'] = 'mesa1';
			} elseif ($mk == 'm2') {
				$mesas_indice['m2'] = 'mesa2';
			} elseif ($mk == 'm3') {
				$mesas_indice['m3'] = 'mesa3';

			} elseif ($mk == 'm4') {
				$mesas_indice['m4'] = 'mesa4';
			}
		}
		echo "Mesas indice: <br>";
		var_dump($mesas_indice);
		echo "<br><br><br>";

		$idseccion = $datos->idseccion;
		$preguntas_seccion = $this->Interfaz_model->preguntasPorSeccion($idseccion);
		echo "Preguntas de seccion:  ";
		var_dump($preguntas_seccion);
		echo "<br><br><br>";

		//Matriz de respuestas
		$recolector = array();

		foreach ($respuestas_array as $ra)
		{
			echo "CP: ".$ra->codigo_pregunta;
			echo "<br>";
			if($ra->tipo == 6){
				foreach ($mesas_indice as $mi){
					$keydatos = $ra->codigo_pregunta.'-'.$mi;
					if($mi === 'mesa1'){
						$keyrec = 'm1';
					}
					elseif($mi === 'mesa2'){
						$keyrec = 'm2';
					}
					elseif($mi === 'mesa3'){
						$keyrec = 'm3';
					}
					elseif($mi === 'mesa4'){
						$keyrec = 'm4';
					}

					if(isset($datos_array[$keydatos])){
						$resp_pivote[$keyrec] = $datos_array[$keydatos];
						$recolector[$ra->codigo_pregunta] =  $resp_pivote;
					}
				}
			}elseif($ra->tipo == 8){
				foreach ($mesas_indice as $mi){
					$keydatos = $ra->codigo_pregunta.'-'.$mi;
					if($mi === 'mesa1'){
						$keyrec = 'm1';
					}
					elseif($mi === 'mesa2'){
						$keyrec = 'm2';
					}
					elseif($mi === 'mesa3'){
						$keyrec = 'm3';
					}
					elseif($mi === 'mesa4'){
						$keyrec = 'm4';
					}

					if(isset($datos_array[$keydatos])){
						$resp_pivote[$keyrec] = $datos_array[$keydatos];
						$recolector[$ra->codigo_pregunta] =  $resp_pivote;
					}
				}
			}elseif($ra->tipo == 11){
				foreach ($mesas_indice as $mi){
					$keydatos = $ra->codigo_pregunta.'-'.$mi;
					if($mi === 'mesa1'){
						$keyrec = 'm1';
					}
					elseif($mi === 'mesa2'){
						$keyrec = 'm2';
					}
					elseif($mi === 'mesa3'){
						$keyrec = 'm3';
					}
					elseif($mi === 'mesa4'){
						$keyrec = 'm4';
					}

					if(isset($datos_array[$keydatos])){
						$resp_pivote[$keyrec] = $datos_array[$keydatos];
						$recolector[$ra->codigo_pregunta] =  $resp_pivote;
					}
				}
			}
		}

		echo "<br><br><br>";
		echo "recolector: "."<br>";
		var_dump($recolector);
		echo "<br><br><br>";
		echo "Mesas Indice: "."<br>";
		var_dump($mesas_indice);
		echo "<br>";
		echo "Mesas claves: <br>";
		var_dump($mesas_claves);
		echo "<br><br>";

		foreach ($preguntas_seccion as $ps){
			echo 'CP: '.$ps->codigo_pregunta;
			echo "<br>";
			//var_dump($recolector[$ps->codigo_pregunta]);;
			echo "<br>";
			//var_dump($respuestas_array[$ps->codigo_pregunta]);
			echo "<br><br>";
			foreach ($mesas_claves as $c){
				if(isset($recolector[$ps->codigo_pregunta][$c])){
					$respuestas_array[$ps->codigo_pregunta]->$c = $recolector[$ps->codigo_pregunta][$c];
				}

				echo $c;
				echo "<br>";
			}
		}

		echo "<br><br><br>";
		echo "Respuestas <br>";
		var_dump($respuestas);

		$respuestas_json_actualizada = json_encode($respuestas);
		$this->Elecciones_model->actualizarRespuestasHoja2($hoja2->idfrhoja2, $respuestas_json_actualizada);


	}

	//Conteo de votos
	public function formulario2_s3(){
		echo "Conteo de votos";
		$usuario = $this->ion_auth->user()->row();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);
		$datos_json = $this->input->post('formulario');
		$datos = json_decode($datos_json);
		$datos_array = (array) $datos;
		$respuestas = json_decode($hoja2->respuestas);
		$respuestas_array = (array)$respuestas;

		//Llave de mesas
		//Las mesas q se consideraran las respuestas
		$mesas = json_decode($hoja2->mesas);
		$mesas = (array)$mesas;

		function filtro($var){
			return ($var !== NULL && $var != false && $var !=='');
		}
		$mesas_registradas = array_filter($mesas, "filtro");
		$mesas_claves = array_keys($mesas_registradas);

		$mesas_indice = array();
		foreach ($mesas_claves as $mk) {
			if ($mk == 'm1') {
				$mesas_indice['m1'] = 'mesa1';
			} elseif ($mk == 'm2') {
				$mesas_indice['m2'] = 'mesa2';
			} elseif ($mk == 'm3') {
				$mesas_indice['m3'] = 'mesa3';

			} elseif ($mk == 'm4') {
				$mesas_indice['m4'] = 'mesa4';
			}
		}
		echo "Mesas indice: <br>";
		var_dump($mesas_indice);
		echo "<br><br><br>";

		$idseccion = $datos->idseccion;
		$preguntas_seccion = $this->Interfaz_model->preguntasPorSeccion($idseccion);
		echo "Preguntas de seccion:  ";
		var_dump($preguntas_seccion);
		echo "<br><br><br>";

		//Matriz de respuestas
		$recolector = array();

		foreach ($respuestas_array as $ra)
		{
			echo "CP: ".$ra->codigo_pregunta;
			echo "<br>";
			if($ra->tipo == 6){
				foreach ($mesas_indice as $mi){
					$keydatos = $ra->codigo_pregunta.'-'.$mi;
					if($mi === 'mesa1'){
						$keyrec = 'm1';
					}
					elseif($mi === 'mesa2'){
						$keyrec = 'm2';
					}
					elseif($mi === 'mesa3'){
						$keyrec = 'm3';
					}
					elseif($mi === 'mesa4'){
						$keyrec = 'm4';
					}

					if(isset($datos_array[$keydatos])){
						$resp_pivote[$keyrec] = $datos_array[$keydatos];
						$recolector[$ra->codigo_pregunta] =  $resp_pivote;
					}
				}
			}elseif($ra->tipo == 8){
				foreach ($mesas_indice as $mi){
					$keydatos = $ra->codigo_pregunta.'-'.$mi;
					if($mi === 'mesa1'){
						$keyrec = 'm1';
					}
					elseif($mi === 'mesa2'){
						$keyrec = 'm2';
					}
					elseif($mi === 'mesa3'){
						$keyrec = 'm3';
					}
					elseif($mi === 'mesa4'){
						$keyrec = 'm4';
					}

					if(isset($datos_array[$keydatos])){
						$resp_pivote[$keyrec] = $datos_array[$keydatos];
						$recolector[$ra->codigo_pregunta] =  $resp_pivote;
					}
				}
			}elseif($ra->tipo == 11){
				foreach ($mesas_indice as $mi){
					$keydatos = $ra->codigo_pregunta.'-'.$mi;
					if($mi === 'mesa1'){
						$keyrec = 'm1';
					}
					elseif($mi === 'mesa2'){
						$keyrec = 'm2';
					}
					elseif($mi === 'mesa3'){
						$keyrec = 'm3';
					}
					elseif($mi === 'mesa4'){
						$keyrec = 'm4';
					}

					if(isset($datos_array[$keydatos])){
						$resp_pivote[$keyrec] = $datos_array[$keydatos];
						$recolector[$ra->codigo_pregunta] =  $resp_pivote;
					}
				}
			}
		}

		echo "<br><br><br>";
		echo "recolector: "."<br>";
		var_dump($recolector);
		echo "<br><br><br>";
		echo "Mesas Indice: "."<br>";
		var_dump($mesas_indice);
		echo "<br>";
		echo "Mesas claves: <br>";
		var_dump($mesas_claves);
		echo "<br><br>";

		foreach ($preguntas_seccion as $ps){
			echo 'CP: '.$ps->codigo_pregunta;
			echo "<br>";
			//var_dump($recolector[$ps->codigo_pregunta]);;
			echo "<br>";
			//var_dump($respuestas_array[$ps->codigo_pregunta]);
			echo "<br><br>";
			foreach ($mesas_claves as $c){
				if(isset($recolector[$ps->codigo_pregunta][$c])){
					$respuestas_array[$ps->codigo_pregunta]->$c = $recolector[$ps->codigo_pregunta][$c];
				}

				echo $c;
				echo "<br>";
			}
		}

		echo "<br><br><br>";
		echo "Respuestas <br>";
		var_dump($respuestas);

		$respuestas_json_actualizada = json_encode($respuestas);
		$this->Elecciones_model->actualizarRespuestasHoja2($hoja2->idfrhoja2, $respuestas_json_actualizada);


	}

	//Seccion Sobre el reciento electoral -- listo
	public function formulario2_s4(){
		$usuario = $this->ion_auth->user()->row();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);
		$datos_json = $this->input->post('formulario');
		$datos = json_decode($datos_json);
		$datos_array = (array) $datos;

		$respuestas_json = $hoja2->respuestas;
		$respuestas = json_decode($respuestas_json);
		$respuestas_array = (array)$respuestas;
		//var_dump($respuestas_array);
		//echo "<br><br><br>";

		var_dump($datos_array);
		echo "<br><br><br>";

		$idseccion = $datos->idseccion;
		$preguntas_seccion = $this->Interfaz_model->preguntasPorSeccion($idseccion);
		//var_dump($preguntas_seccion);
		//echo "<br><br><br>";

		foreach ($preguntas_seccion as $ps){
			echo "CP: ".$ps->codigo_pregunta.'  Tipo: '.$ps->rel_tipo_pregunta;
			echo "<br>";
			if($ps->rel_tipo_pregunta == 10){
					//Etiqueta SIN respuesta
			}elseif ($ps->rel_tipo_pregunta == 1){
				//Opcion simple si/no
				if( isset($datos_array[$ps->codigo_pregunta])){
					$respuestas_array[$ps->codigo_pregunta]->respuesta = $datos_array[$ps->codigo_pregunta];
				}

			}elseif ($ps->rel_tipo_pregunta == 12){
				//Input numerico
				if( isset($datos_array[$ps->codigo_pregunta])){
					$respuestas_array[$ps->codigo_pregunta]->respuesta = $datos_array[$ps->codigo_pregunta];
				}

			}elseif ($ps->rel_tipo_pregunta == 2){
				//Boton radio tres opciones
				if( isset($datos_array[$ps->codigo_pregunta])){
					$respuestas_array[$ps->codigo_pregunta]->respuesta = $datos_array[$ps->codigo_pregunta];
				}
			}
		}


		echo "<br>";




		echo "<br><br><br>";
		echo "Matriz resultado: <br>";
		var_dump($respuestas_array);
		$respuestas_json_actualizada = json_encode($respuestas_array);
		$this->Elecciones_model->actualizarRespuestasHoja2($hoja2->idfrhoja2, $respuestas_json_actualizada);





	}






	//Seccion tercera total
	public function formulario2_s5(){

		$usuario = $this->ion_auth->user()->row();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);
		$datos_json = $this->input->post('formulario');
		$datos = json_decode($datos_json);
		$datos_array = (array) $datos;

		//var_dump($datos_array);
		//echo "<br><br><br>";

		$respuestas_json = $hoja2->respuestas;
		$respuestas = json_decode($respuestas_json);
		$respuestas_array = (array)$respuestas;
		//var_dump($respuestas_array);
		//echo "<br><br><br>";


		$idseccion = $datos->idseccion;

		$preguntas_seccion = $this->Interfaz_model->preguntasPorSeccion($idseccion);
		//var_dump($preguntas_seccion);
		//echo "<br><br><br>";

		foreach ($preguntas_seccion as $ps){
			//echo "CP: ".$ps->codigo_pregunta.'  Tipo: '.$ps->rel_tipo_pregunta;
			//echo "<br>";
			if( isset($datos_array[$ps->codigo_pregunta])){
				$respuestas_array[$ps->codigo_pregunta]->respuesta = $datos_array[$ps->codigo_pregunta];
			}
			//echo "<br>";


		}
		//echo "<br><br><br>";
		//echo "Matriz resultado: <br>";
		//var_dump($respuestas_array);
		$respuestas_json_actualizada = json_encode($respuestas_array);
		$this->Elecciones_model->actualizarRespuestasHoja2($hoja2->idfrhoja2, $respuestas_json_actualizada);




	}


	//Seccion cuarta
	public function formulario2_s6(){
		$usuario = $this->ion_auth->user()->row();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);
		$datos_json = $this->input->post('formulario');
		$datos = json_decode($datos_json);
		$datos_array = (array) $datos;

		//var_dump($datos_array);
		//echo "<br><br><br>";

		$respuestas_json = $hoja2->respuestas;
		$respuestas = json_decode($respuestas_json);
		$respuestas_array = (array)$respuestas;
		//var_dump($respuestas_array);
		//echo "<br><br><br>";


		$idseccion = $datos->idseccion;

		$preguntas_seccion = $this->Interfaz_model->preguntasPorSeccion($idseccion);
		//var_dump($preguntas_seccion);
		//echo "<br><br><br>";

		foreach ($preguntas_seccion as $ps){
			//echo "CP: ".$ps->codigo_pregunta.'  Tipo: '.$ps->rel_tipo_pregunta;
			//echo "<br>";
			if( isset($datos_array[$ps->codigo_pregunta])){
				$respuestas_array[$ps->codigo_pregunta]->respuesta = $datos_array[$ps->codigo_pregunta];
			}
			//echo "<br>";


		}
		//echo "<br><br><br>";
		//echo "Matriz resultado: <br>";
		//var_dump($respuestas_array);
		$respuestas_json_actualizada = json_encode($respuestas_array);
		$this->Elecciones_model->actualizarRespuestasHoja2($hoja2->idfrhoja2, $respuestas_json_actualizada);






	}




	//Seccion para la captura de datos
	public function formulario2_s7(){
		$usuario = $this->ion_auth->user()->row();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);
		$datos_json = $this->input->post('formulario');
		$datos = json_decode($datos_json);
		$datos_array = (array) $datos;


		//var_dump($datos_array);
		//echo "<br><br><br>";

		$respuestas_json = $hoja2->respuestas;
		$respuestas = json_decode($respuestas_json);
		$respuestas_array = (array)$respuestas;
		//var_dump($respuestas_array);
		//echo "<br><br><br>";


		$idseccion = $datos->idseccion;

		$preguntas_seccion = $this->Interfaz_model->preguntasPorSeccion($idseccion);
		//var_dump($preguntas_seccion);
		//echo "<br><br><br>";

		foreach ($preguntas_seccion as $ps){
			//echo "CP: ".$ps->codigo_pregunta.'  Tipo: '.$ps->rel_tipo_pregunta;
			//echo "<br>";
			if( isset($datos_array[$ps->codigo_pregunta])){
				$respuestas_array[$ps->codigo_pregunta]->respuesta = $datos_array[$ps->codigo_pregunta];
			}
			//echo "<br>";


		}
		//echo "<br><br><br>";
		//echo "Matriz resultado: <br>";
		//var_dump($respuestas_array);
		$respuestas_json_actualizada = json_encode($respuestas_array);
		$this->Elecciones_model->actualizarRespuestasHoja2($hoja2->idfrhoja2, $respuestas_json_actualizada);
	}

	//Seccion observaciones
	public function formulario2_s8(){
		$usuario = $this->ion_auth->user()->row();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);
		$datos_json = $this->input->post('formulario');
		$datos = json_decode($datos_json);

		//Extraer las preguntas
		$respuestas_json = $hoja2->respuestas;
		$respuestas = json_decode($respuestas_json);

		$codigopregunta = $datos->codigopregunta;
		$r = $respuestas->$codigopregunta;
		$r->respuesta = $datos->$codigopregunta;
		$respuestas->$codigopregunta = $r;
		$respuestas_json_actualizada = json_encode($respuestas);
		//var_dump($respuestas_json_actualizada);
		$this->Elecciones_model->actualizarRespuestasHoja2($hoja2->idfrhoja2, $respuestas_json_actualizada);
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


	public function reportes(){

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('manejodb/vmanejodbeljud');
		//$this->load->view('manejodb/vmanejodb_listanot', $dt);
		$this->load->view('html/pie');
	}

	public function cerrarHoja1(){

		$usuario = $this->ion_auth->user()->row();
		$hoja1 = $this->Cuestionario_model->hoja1($usuario->id);
		//echo $hoja1->idfrhoja1;
		$this->Cuestionario_model->cerrarHoja1($hoja1->idfrhoja1);
		redirect('eleccionesJudiciales2024/nuevo');
	}

	public function cerrarHoja2(){

		$usuario = $this->ion_auth->user()->row();
		$hoja2 = $this->Cuestionario_model->hoja2($usuario->id);
		//echo $hoja1->idfrhoja1;
		$this->Cuestionario_model->cerrarHoja2($hoja2->idfrhoja2);
		redirect('eleccionesJudiciales2024/nuevo');
	}


}
