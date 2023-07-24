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


		/*var_dump($formulario);
		echo "<br><br>";
		var_dump($usuario);
		echo "<br><br>";*/



		$datos['formulario'] = $formulario;
		$datos['secciones'] = $secciones;
		$datos['preguntas'] = $preguntas;
		$datos['usuario'] = $usuario;

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
		$datos['usuario'] = $usuario;




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
		$datos['usuario'] = $usuario;



		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vveed_veedores', $datos);
		$this->load->view('html/pie');
	}


	//Capturar informacion
	public function capturarDatos(){
		$idformulario = $this->input->post('idformulario');
		if($idformulario ==1):
			$form1 = $this->datosForm1();
			$this->Veeduria_model->registrarForm($form1);
		elseif ($idformulario == 2):
			$form2 = $this->datosForm2();
			$preguntas = $this->Veeduria_model->leerPreguntasFormularios($idformulario);
			$this->Veeduria_model->registrarForm($form2);
		elseif ($idformulario == 3):
			$form3 = $this->datosForm3();
			$this->Veeduria_model->registrarForm($form3);
		else:
		endif;
		redirect('/');
	}

	//Captura de datos para el formulario31
	private function datosForm1(){
		$form1 = new stdClass();
		$idusuario = $this->input->post('idusuario');
		$idformulario = $this->input->post('idformulario');

		//Captura de los datos escondidos
		$form1->idusuario = $idusuario;
		$form1->idformulario = $idformulario;

		//Captura de los datos generales
		$form1->area = $this->input->post('areageneral');
		$form1->direccion = $this->input->post('direccion');
		$form1->grupo = $this->input->post('grupo');

		//Genera la matriz de preguntas
		$preguntas = $this->Veeduria_model->leerPreguntasFormularios($idformulario);

		//Genera la matriz de respuestas
		/** @noinspection PhpLanguageLevelInspection */
		$respuestas = [];
		foreach ($preguntas as $p):
			$llave = $p->codigo_pregunta;
			if($p->tipo_pregunta == 1):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo1($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 2):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo2($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 3):
				$respuestas[$llave] = "tipo 3";
			elseif ($p->tipo_pregunta == 4):
				$respuestas[$llave] = "tipo 4";
			elseif ($p->tipo_pregunta == 5):
				$respuestas[$llave] = "tipo 5";
			elseif ($p->tipo_pregunta == 6):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo6($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 7):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo7($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 8):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo8($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 9):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo9($nombre, $p->codigo_pregunta);
			else:
			endif;
		endforeach;
		$form1->preguntas = $preguntas;
		$form1->respuestas = $respuestas;

		return $form1;
	}

	//Captura de datos para el formulario 2
	private function datosForm2(){
		$form2 = new stdClass();
		$idusuario = $this->input->post('idusuario');
		$idformulario = $this->input->post('idformulario');

		//Captura de los datos escondidos
		$form2->idusuario = $idusuario;
		$form2->idformulario = $idformulario;

		//Captura de los datos generales
		$form2->area = $this->input->post('areageneral');
		$form2->grupo = $this->input->post('grupo');

		//Genera la matriz de preguntas
		$preguntas = $this->Veeduria_model->leerPreguntasFormularios($idformulario);

		//Genera la matriz de respuestas
		/** @noinspection PhpLanguageLevelInspection */
		$respuestas = [];
		foreach ($preguntas as $p):
			$llave = $p->codigo_pregunta;
			if($p->tipo_pregunta == 1):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo1($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 2):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo2($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 3):
				$respuestas[$llave] = "tipo 3";
			elseif ($p->tipo_pregunta == 4):
				$respuestas[$llave] = "tipo 4";
			elseif ($p->tipo_pregunta == 5):
				$respuestas[$llave] = "tipo 5";
			elseif ($p->tipo_pregunta == 6):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo6($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 7):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo7($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 8):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo8($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 9):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo9($nombre, $p->codigo_pregunta);
			else:
			endif;
		endforeach;
		$form2->preguntas = $preguntas;
		$form2->respuestas = $respuestas;

		return $form2;
	}

	//Captura de datos para el formulario 3
	private function datosForm3(){
		$form1 = new stdClass();
		$idusuario = $this->input->post('idusuario');
		$idformulario = $this->input->post('idformulario');

		//Captura de los datos escondidos
		$form1->idusuario = $idusuario;
		$form1->idformulario = $idformulario;
		$form1->direccion = $this->input->post('direccion');


		//Captura de los datos generales
		$form1->area = $this->input->post('areageneral');
		$form1->grupo = $this->input->post('grupo');

		//Genera la matriz de preguntas
		$preguntas = $this->Veeduria_model->leerPreguntasFormularios($idformulario);

		//Genera la matriz de respuestas
		/** @noinspection PhpLanguageLevelInspection */
		$respuestas = [];
		foreach ($preguntas as $p):
			$llave = $p->codigo_pregunta;
			if($p->tipo_pregunta == 1):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo1($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 2):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo2($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 3):
				$respuestas[$llave] = "tipo 3";
			elseif ($p->tipo_pregunta == 4):
				$respuestas[$llave] = "tipo 4";
			elseif ($p->tipo_pregunta == 5):
				$respuestas[$llave] = "tipo 5";
			elseif ($p->tipo_pregunta == 6):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo6($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 7):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo7($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 8):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo8($nombre, $p->codigo_pregunta);
			elseif ($p->tipo_pregunta == 9):
				$nombre = 'pregunta'.$p->codigo_pregunta;
				$respuestas[$llave] = $this->rtipo9($nombre, $p->codigo_pregunta);
			else:
			endif;
		endforeach;
		$form1->preguntas = $preguntas;
		$form1->respuestas = $respuestas;

		return $form1;
	}


	//Respuesta tipo 1 - comentario
	//
	private function rtipo1($nombre, $codigo){
		$tipo_respuesta = 1;
		$respuesta = $this->input->post($nombre);
		$r = new stdClass();
		$r->tipo = $tipo_respuesta;
		$r->comentario = $respuesta;
		$r->codigo = $codigo;
		return $r;
	}
	//Respuesta tipo 2 - seleccion simple SI/NO
	private function rtipo2($nombre, $codigo){
		$tipo_respuesta = 2;
		$respuesta = $this->input->post($nombre);
		$r = new stdClass();
		$r->tipo = $tipo_respuesta;
		$r->respuesta = $respuesta;
		$r->codigo = $codigo;
		return $r;
	}
	//Respuesta tipo 3 - seleccion multiple
	private function rtipo3($nombre){

	}
	//Respuesta tipo 4 - Seleccion variada
	private function rtipo4($nombre){

	}
	//Respuesta tipo 5 - input numerico tiempo
	private function rtipo5($nombre){

	}
	//Respuesta tipo 6 - input text
	private function rtipo6($nombre, $codigo){
		$tipo_respuesta = 6;
		$respuesta = $this->input->post($nombre);
		$r = new stdClass();
		$r->tipo = $tipo_respuesta;
		$r->respuesta = $respuesta;
		$r->codigo = $codigo;
		return $r;
	}
	//Respuesta tipo 7 - input numerico
	private function rtipo7($nombre, $codigo){
		$tipo_respuesta = 7;
		$respuesta = $this->input->post($nombre);
		$r = new stdClass();
		$r->tipo = $tipo_respuesta;
		$r->respuesta = $respuesta;
		$r->codigo = $codigo;
		return $r;
	}
	//Respuesta tipo 8 - input seleccion text
	private function rtipo8($nombre, $codigo){
		$tipo_respuesta = 8;
		$respuesta = $this->input->post($nombre);
		$r = new stdClass();
		$r->tipo = $tipo_respuesta;
		$r->respuesta = $respuesta;
		$r->codigo = $codigo;
		return $r;
	}
	//Respuesta tipo 9 - textarea
	private function rtipo9($nombre, $codigo){
		$tipo_respuesta = 9;
		$respuesta = $this->input->post($nombre);
		$r = new stdClass();
		$r->tipo = $tipo_respuesta;
		$r->respuesta = $respuesta;
		$r->codigo = $codigo;
		return $r;
	}

	/*****
		EDICION DE FORMULARIOS
	 *******/

	public function editarFormularios(){
		//Usuario
		$usuario = $this->ion_auth->user()->row();
		$idusuario = $usuario->id;

		//Extraer todos los formularios llenados por el usuario
		$formularios = $this->Veeduria_model->leerFormUsuario($idusuario);

		$datos['formularios'] = $formularios;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vveduria_lista', $datos);
		$this->load->view('html/pie');
	}

	public function editar($idformulario){
		$idformulario = $idformulario;
		$form = $this->Veeduria_model->leerFormulario($idformulario);
		if($form->rel_idfv == 1):
			redirect('veeduria/editForm1/'.$idformulario);
		elseif ($form->rel_idfv == 2):
			redirect('veeduria/editForm2/'.$idformulario);
		elseif ($form->rel_idfv == 3):
			redirect('veeduria/editForm3/'.$idformulario);
		else:
		endif;
	}

	//Editar el formulario tipo 1
	public function editForm1($idformulario){
		//echo $idformulario.' tipo 1';
		$form = $this->Veeduria_model->leerFormulario($idformulario);
		//var_dump($form);
		//echo "<br><br>";
		$respuestas_json = $form->form_respuesta;
		//var_dump($respuestas_json);
		//echo "<br><br>";
		$respuestas = json_decode($respuestas_json);
		//var_dump($respuestas);
		//echo "<br><br>";
		$respuestas_encuesta = $respuestas->respuestas;
		//var_dump($respuestas_encuesta);
		//echo "<br><br>";
		$respuestas_encuesta_array = (array)$respuestas_encuesta;
		//var_dump($respuestas_encuesta_array);
		//echo "<br><br>";
		//$respuesta = $respuestas_encuesta_array["p1"];
		//var_dump($respuesta);

		//Informacion del usuario logueado
		$usuario = $this->ion_auth->user()->row();
		$secciones = $this->Veeduria_model->formSecciones($form->idfv);
		$preguntas = $this->Veeduria_model->leerPreguntasFormularios($form->idfv);

		//Informacion del formulario
		$datos['usuario'] = $usuario;
		$datos['formulario'] = $form;
		$datos['secciones'] = $secciones;
		$datos['preguntas'] = $preguntas;
		$datos['respuestas'] = $respuestas;
		$datos['respuestas_encuesta'] = $respuestas_encuesta_array;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vveed_enc_sup_edit', $datos);
		$this->load->view('html/pie');

	}
	//Editar el formulario tipo 2
	public function editForm2($idformulario){
		//echo $idformulario.' tipo 2';
		$form = $this->Veeduria_model->leerFormulario($idformulario);
		//var_dump($form);
		//echo "<br><br>";
		$respuestas_json = $form->form_respuesta;
		//var_dump($respuestas_json);
		//echo "<br><br>";
		$respuestas = json_decode($respuestas_json);
		//var_dump($respuestas);
		//echo "<br><br>";
		$respuestas_encuesta = $respuestas->respuestas;
		//var_dump($respuestas_encuesta);
		//echo "<br><br>";
		$respuestas_encuesta_array = (array)$respuestas_encuesta;
		//var_dump($respuestas_encuesta_array);
		//echo "<br><br>";
		//$respuesta = $respuestas_encuesta_array["p1"];
		//var_dump($respuesta);

		//Informacion del usuario logueado
		$usuario = $this->ion_auth->user()->row();
		$secciones = $this->Veeduria_model->formSecciones($form->idfv);
		$preguntas = $this->Veeduria_model->leerPreguntasFormularios($form->idfv);

		//Informacion del formulario
		$datos['usuario'] = $usuario;
		$datos['formulario'] = $form;
		$datos['secciones'] = $secciones;
		$datos['preguntas'] = $preguntas;
		$datos['respuestas'] = $respuestas;
		$datos['respuestas_encuesta'] = $respuestas_encuesta_array;


		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vveed_ciudadania_edit', $datos);
		$this->load->view('html/pie');


	}
	//Editar el formulario tipo 3
	public function editForm3($idformulario){
		//echo $idformulario.' tipo 2';
		$form = $this->Veeduria_model->leerFormulario($idformulario);
		//var_dump($form);
		//echo "<br><br>";
		$respuestas_json = $form->form_respuesta;
		//var_dump($respuestas_json);
		//echo "<br><br>";
		$respuestas = json_decode($respuestas_json);
		//var_dump($respuestas);
		//echo "<br><br>";
		$respuestas_encuesta = $respuestas->respuestas;
		//var_dump($respuestas_encuesta);
		//echo "<br><br>";
		$respuestas_encuesta_array = (array)$respuestas_encuesta;
		//var_dump($respuestas_encuesta_array);
		//echo "<br><br>";
		//$respuesta = $respuestas_encuesta_array["p1"];
		//var_dump($respuesta);

		//Informacion del usuario logueado
		$usuario = $this->ion_auth->user()->row();
		$secciones = $this->Veeduria_model->formSecciones($form->idfv);
		$preguntas = $this->Veeduria_model->leerPreguntasFormularios($form->idfv);

		//Informacion del formulario
		$datos['usuario'] = $usuario;
		$datos['formulario'] = $form;
		$datos['secciones'] = $secciones;
		$datos['preguntas'] = $preguntas;
		$datos['respuestas'] = $respuestas;
		$datos['respuestas_encuesta'] = $respuestas_encuesta_array;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vveed_veedores_edit', $datos);
		$this->load->view('html/pie');

	}


	//Capturar informacion editada
	public function capturarEditDatos(){
		$idformulario = $this->input->post('idformulario');
		if($idformulario ==1):
			$form1 = $this->datosForm1();
			$idfresp = $this->input->post('idformresp');
			//var_dump($form1);
			//echo '<br>';
			//echo $idfresp;
			$this->Veeduria_model->registrarFormEdicion($form1, $idfresp);
		elseif ($idformulario == 2):
			$form2 = $this->datosForm2();
			$idfresp = $this->input->post('idformresp');
			//var_dump($form2);
			//echo '<br>';
			//echo $idfresp;
			$this->Veeduria_model->registrarFormEdicion($form2, $idfresp);
		elseif ($idformulario == 3):
			$form3 = $this->datosForm3();
			$idfresp = $this->input->post('idformresp');
			/*var_dump($form3);
			echo '<br>';
			echo $idfresp;*/
			$this->Veeduria_model->registrarFormEdicion($form3, $idfresp);
		else:
		endif;
		//redirect('veeduria/editarFormularios/');
		redirect('/');
	}





}
