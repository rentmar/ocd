<?php

class Encuesta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->model('Encuesta_model');
		$this->load->helper('form');

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
//		echo "<pre>";var_dump($datos);echo "</pre>";
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
	public function crearPregunta()
	{
		$datos['secciones'] = $this->Encuesta_model->leerTodasLasSecciones();
		$datos['respuestas'] = $this->Encuesta_model->leerTodasLasRespuestas();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vcrearpregunta', $datos);
		$this->load->view('html/pie');
	}
	public function agregarPreguntaUI()
	{
		$dtcheck=[];
		$respuestas=$this->Encuesta_model->leerTodasLasRespuestas();
		$dts=array(
			"uipregunta_nombre"=>$this->input->post("nombre_pregunta"),
			"uiorden_pregunta"=>$this->input->post("ordenpregunta"),
			"rel_iduiseccion"=>$this->input->post("idseccion"));
		foreach ($respuestas as $r)
		{
			if ($this->input->post("resp".$r->iduirespuesta)!=null)
			{
				array_push($dtcheck,$this->input->post("resp".$r->iduirespuesta));
			}
		}
		if (count($dtcheck)!=0)
		{
			$this->Encuesta_model->agregarPreguntaUI($dts,$dtcheck);
			redirect('Encuesta/preguntaUI');
		}
	}
	public function editarPreguntaUI($idp)
	{
		$dt['pregunta']=$this->Encuesta_model->leerPreguntaId($idp);
		$dt['secciones'] = $this->Encuesta_model->leerTodasLasSecciones();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/veditarpregunta', $dt);
		$this->load->view('html/pie');
	}
	public function modificarPreguntaUI($idp)
	{
		$dts=array(
			"uipregunta_nombre"=>$this->input->post("nombre_pregunta"),
			"uiorden_pregunta"=>$this->input->post("ordenpregunta"),
			"rel_iduiseccion"=>$this->input->post("idseccion"));
		$this->Encuesta_model->modificarPreguntaUI($dts,$idp);
		redirect('Encuesta/preguntaUI');
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
	public function crearRespuestaUI()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vcrearrespuesta');
		$this->load->view('html/pie');
	}
	public function agregarRespuestaUI()
	{
		$dts=array(
			"uinombre_respuesta"=>$this->input->post("nombre_respuesta"));
		$this->Encuesta_model->agregarRespuestaUI($dts);
		redirect('Encuesta/respuestaUI');
	}
	//Rutina para creacion de encuestas
	public function crearEncuesta()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_crearencuesta');
		$this->load->view('html/pie');
	}

	public function procesarCrearEncuesta()
	{
		$nombre_encuesta = $this->input->post('nombre_cuestionario');
		if($this->Encuesta_model->crearNuevaEncuesta($nombre_encuesta)){
			$this->mensaje('Encuesta creada', 'success');
			redirect('inicio');
		}else{
			$this->mensaje('No se creo la encuesta, intente otra vez', 'warning');
			redirect('inicio');
		}
	}

	public function editarEncuesta($id)
	{
		$idencuesta = $id;
		$encuesta = $this->Encuesta_model->leerEncuestaPorID($idencuesta);
		$datos['encuesta'] = $encuesta;
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_editarencuesta', $datos );
		$this->load->view('html/pie');

	}

	public function procesarEditarEncuesta()
	{
		$iduiencuesta = $this->input->post('iduiencuesta');
		$nombre_encuesta = $this->input->post('nombre_cuestionario');

		if($this->Encuesta_model->actualizarEncuesta($iduiencuesta, $nombre_encuesta)){
			$this->mensaje('Encuesta editada', 'success');
			redirect('inicio');
		}else{
			$this->mensaje('No se pudo editar, intente otra vez', 'warning');
			redirect('inicio');
		}

	}

	//Despliegue de mensaje
	public function mensaje($mensaje, $clase){
		/** @noinspection PhpLanguageLevelInspection */
		$this->session->set_flashdata([
			'mensaje' => $mensaje,
			'clase' => $clase,
		]);
	}

	public function crearModulo()
	{
		$data['encuestas'] = $this->Encuesta_model->leerTodasLasEncuestas();

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_crearmodulo', $data);
		$this->load->view('html/pie');
	}

	public function procesarCrearModulo()
	{
		$nombre_modulo = $this->input->post('nombre_modulo');
		$orden_modulo = $this->input->post('orden_modulo');
		$idencuesta = $this->input->post('idencuesta');

		if($this->Encuesta_model->crearModulo($nombre_modulo, $orden_modulo, $idencuesta)){
			$this->mensaje('Modulo creado', 'success');
			redirect('inicio');
		}else{
			$this->mensaje('No se pudo crear modulo, intente otra vez', 'warning');
			redirect('inicio');
		}
	}
	public function crearSeccion()
	{
		$data['modulos'] = $this->Encuesta_model->leerModulos();
		$data['subtemas'] = $this->Encuesta_model->leerSubtemas();

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vcrearseccion', $data);
		$this->load->view('html/pie');
	}
	public function escrituraEnUiseccion()
	{
		$orden_seccion = $this->input->post('ordenDseccion');
		$modulo = $this->input->post('modulo');
		$subtema = $this->input->post('subtema');


		if($this->Encuesta_model->crearSeccion($orden_seccion, $modulo, $subtema)){
			$this->mensaje('Seccion creado', 'success');
			redirect('inicio');
		}else{
			$this->mensaje('No se pudo crear seccion, intente otra vez', 'warning');
			redirect('inicio');
		}
	}
	public function editarSeccion($id)
	{
		$iduiseccion = $id;
		$seccion0 = $this->Encuesta_model->leerUiseccion($iduiseccion);
		$seccion1 = $this->Encuesta_model->leerModulo($seccion0[0]->rel_iduimodulo);
		$seccion2 = $this->Encuesta_model->leerSubtema($seccion0[0]->rel_idsubtema);
//echo "<pre>";var_dump($seccion0,$seccion1, $seccion2);echo "</pre>";
		$datos['seccion0'] = $seccion0;
		$datos['seccion1'] = $seccion1;
		$datos['seccion2'] = $seccion2;
		$datos['modulos'] = $this->Encuesta_model->leerModulos();
		$datos['subtemas'] = $this->Encuesta_model->leerSubtemas();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/veditarseccion', $datos );
		$this->load->view('html/pie');
	}
	public function edicionEnUiseccion()
	{
		$ordenDseccion0 = $this->input->post('ordenDseccion0');
		$orden_seccion = $this->input->post('ordenDseccion');
		$modulo = $this->input->post('modulo');
		$subtema = $this->input->post('subtema');
//echo "<pre>";var_dump($ordenDseccion0,$orden_seccion,$modulo,$subtema);echo "</pre>";
		$this->Encuesta_model->actualizarSeccion($ordenDseccion0,$orden_seccion, $modulo, $subtema);
		redirect('inicio');
	}
	public function editarModulo($id)
	{
		$idmodulo = $id;
		$datos['encuestas'] = $this->Encuesta_model->leerTodasLasEncuestas();

		$modulo = $this->Encuesta_model->leerModuloPorID($idmodulo);
		$datos['modulo'] = $modulo;
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_editarmodulo', $datos );
		$this->load->view('html/pie');
	}
	public function procesarEditarModulo()
	{
		$idmodulo = $this->input->post('idmodulo');
		$nombre_modulo = $this->input->post('nombre_modulo');
		$orden_modulo = $this->input->post('orden_modulo');
		$idencuesta = $this->input->post('idencuesta');;

		if($this->Encuesta_model->actualizarModulo($idmodulo, $nombre_modulo, $orden_modulo, $idencuesta)){
			$this->mensaje('Modulo editado', 'success');
			redirect('inicio');
		}else{
			$this->mensaje('No se pudo editar, intente otra vez', 'warning');
			redirect('inicio');
		}

	}


	//Despliegue de tarjetas
	public function encuestaInicio()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_inicio');
		$this->load->view('html/pie');
	}

	//Vista de los formularios
	public function formulariosEncuesta()
	{
		$datos['encuestas'] = $this->Encuesta_model->leerTodasLasEncuestas();

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_lista', $datos);
		$this->load->view('html/pie');
	}

	//generar la vista de un formulario
	public function verFormEncuesta($identificador)
	{
		$iduiencuesta = $identificador;
		$encuesta = $this->Encuesta_model->leerEncuestaPorID($iduiencuesta);
		$modulos = $this->Encuesta_model->leerModulosPorIdEncuesta($iduiencuesta);

		//Array de orden
		$orden_modulos = [];
		foreach ($modulos as $m)
		{
			$orden_modulos[] = $m->uiorden_modulo;
		}
		$orden_modulos_min = min($orden_modulos);
		$orden_modulos_max = max($orden_modulos);

		//Extraer las secciones de una encuesta
		$secciones = $this->Encuesta_model->leerSeccionesDeUnaEncuesta($iduiencuesta);

		//Extraer las preguntas de una encuesta
		$preguntas = $this->Encuesta_model->leerPreguntasDeUnaEncuesta($iduiencuesta);
		//Extraer las respuestas de una encuesta
		$respuestas = $this->Encuesta_model->leerRespuestasDeUnaEncuesta($iduiencuesta);


		$datos['encuesta'] = $encuesta;
		$datos['modulos'] = $modulos;
		$datos['secciones'] = $secciones;
		$datos['preguntas'] = $preguntas;
		$datos['respuestas'] = $respuestas;
		$datos['orden_mod_min'] = $orden_modulos_min;
		$datos['orden_mod_max'] = $orden_modulos_max;

		$this->load->view('encuesta/vencuesta_plantilla', $datos);

	}

	public function cambiarEstado($identificador)
	{

		$iduiencuesta = $identificador;
		$encuesta = $this->Encuesta_model->leerEncuestaPorID($iduiencuesta);
		$datos['encuesta'] = $encuesta;


		if($encuesta->encuesta_activa)
		{
			//Esta activa, funcion complementaria
			$estado = 0;
		}else{
			//No esta activa, funcion complementaria
			$estado = 1;
		}
		$this->Encuesta_model->cambiarEstado($iduiencuesta, $estado);
		redirect('encuesta/formulariosEncuesta');
	}

	public function capturarDatosEncuesta()
	{
		$n = $this->input->post('nombre');
		$a = $this->input->post('apellido');
		$e = $this->input->post('edad');

		echo "Nombre: ".$n." ".$a."<br>";
		echo "Edad: ".$e;

	}
	public function encuestaAusuarios()
	{
		//Leer a todos los usuarios en el grupo encuestadores
		$datos['usuariose'] = $this->ion_auth->users('encuestadores')->result();
//		echo "<pre>";var_dump($datos);echo "</pre>";
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_ausuarios', $datos);
		$this->load->view('html/pie');
	}
	public function asignarEncuesta($identificador)
	{
		$usuario=$this->Encuesta_model->leerUsuarioID($identificador);
		$encuestass=$this->Encuesta_model->leerTodasLasEncuestas();
		$datos['usuario']=$usuario;
		$datos['encuestas']=$encuestass;
//		echo "<pre>";var_dump($datos);echo "</pre>";
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vasignar_encuesta', $datos);
		$this->load->view('html/pie');
	}
	public function guardarAsignacionDencuesta()
	{
		$idencuestador = $this->input->post('idusuario1');
		$idencuesta = $this->input->post('idencuesta1');
		$nencuestas = $this->input->post('nencuestas1');
		$latitud = $this->input->post('ubicacionlttd');
		$longitud = $this->input->post('ubicacionlgtd');
		$datos['idencuestador'] = $idencuestador;
		$datos['idencuesta'] = $idencuesta;
		$datos['nencuestas'] = $nencuestas;
		$datos['latitud'] = $latitud;
		$datos['longitud'] = $longitud;


		echo "<pre>";var_dump($datos);echo "</pre>";
/*		if($this->Encuesta_model->crearNuevaEncuesta($nombre_encuesta)){
			$this->mensaje('Encuesta creada', 'success');
			redirect('inicio');
		}else{
			$this->mensaje('No se creo la encuesta, intente otra vez', 'warning');
			redirect('inicio');
		}*/
	}
}
