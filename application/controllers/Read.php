<?php

class Read extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Readurl_model');
		$this->load->model('Encuesta_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
	}

	public function url($identificador)
	{
		$hash = $identificador;
		$encuesta = $this->Readurl_model->autenticar($hash);
		if(!$encuesta){
			echo "No existe encuesta";
		}else{
			if(!$encuesta->usado){
				//Encuesta vigente
				redirect('read/encuesta/'.$hash);

			}else{
				//Encuesta usada
				redirect('read/encuestaExpirada');
			}
		}
	}

	public function encuesta($hash){
		if(!$this->Readurl_model->autenticar($hash))
		{
			redirect('read/encuestaExpirada');
		}
		$bandera = $this->Readurl_model->autenticarSegundo($hash);
		if(!$bandera){
			redirect('read/encuestaExpirada');
		}
		$encuesta = $this->Readurl_model->autenticar($hash);
		$datos_generales = $encuesta;
		$iduiencuesta = $encuesta->rel_iduiencuesta;

		//Temporizador
		$fecha = new DateTime();

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


		$preguntas_validar = [];
		foreach ($preguntas as $pr)
		{
			$preguntas_validar[] = $pr->iduipregunta;
		}


		//Subvista para la Seleccion de modulos
		$datos_modulo['modulos'] = $modulos;
		$datos_modulo['orden_mod_min'] = $orden_modulos_min;
		$datos_modulo['secciones'] = $secciones;
		$datos_modulo['preguntas'] = $preguntas;
		$datos_modulo['respuestas'] = $respuestas;
		$sel_modulos = $this->load->view('encuesta/svencuesta_plantilla_selmodulo', $datos_modulo, TRUE);


		//Subvista para los modulos
		$cont_modulos = $this->load->view('encuesta/svencuesta_plantilla_contmodulo', '', TRUE);

		$datos['encuesta'] = $encuesta;
		$datos['modulos'] = $modulos;
		$datos['secciones'] = $secciones;
		$datos['preguntas'] = $preguntas;
		$datos['respuestas'] = $respuestas;
		$datos['orden_mod_min'] = $orden_modulos_min;
		$datos['orden_mod_max'] = $orden_modulos_max;

		//Datos del formulario
		$datos['sel_modulos'] = $sel_modulos;
		$datos['cont_modulo'] = $cont_modulos;
		$datos['no_es_vista_previa'] = true;
		$datos['datos_generales'] = $datos_generales;
		$datos['tiempo'] = $fecha->getTimestamp();

		//Dato para validar formulario
		$datos['preguntas_validar'] = $preguntas_validar;

		$this->load->view('encuesta/vencuesta_plantilla', $datos);

	}

	public function encuestaExpirada()
	{
		$this->load->view('mensajes/vde_expirada');
	}

	public function capturar()
	{
		$info_general = $this->datos();
		//Extraer las preguntas de una encuesta
		$preguntas = $this->Encuesta_model->leerPreguntasDeUnaEncuesta($info_general->iduiencuesta);
		//Extraer las respuestas de una encuesta
		$respuestas = $this->Encuesta_model->leerRespuestasDeUnaEncuesta($info_general->iduiencuesta);

		$idpreguntas_form = [];
		foreach ($preguntas as $p)
		{
			$idpreguntas_form[] = $p->iduipregunta;
		}
		$idrespuestas_form = [];
		foreach ($idpreguntas_form as $r)
		{
			$idrespuestas_form[$r] = $this->input->post('pregunta'.$r);
		}

		$info_general->fecha = now('America/La_Paz');

		if($this->Readurl_model->guardarDatos($info_general, $idpreguntas_form, $idrespuestas_form))
		{
			//Informacion guardada con exito
			$this->success();

		}else{
			//Informacion no guardada
			$this->failure();
		}
	}

	private function datos()
	{
		$fecha = new DateTime();
		$datos = new stdClass();
		$datos->fecha = '';
		$datos->iduiencuesta = $this->input->post('iduiencuesta'); //El identificador del formulario vacio
		$datos->hash = $this->input->post('numero_formh'); //El identificador del formulario asignado
		$datos->idusuario = $this->input->post('idusuario'); //El identificador del encuestador
		$datos->idgeolocal = $this->input->post('idgeolocal'); //El identificador del area asignada
		$datos->latitud = $this->input->post('latitud_f'); //Latitud donde el formulario es llenado
		$datos->longitud = $this->input->post('longitud_f'); //Longitud donde el formulario es llenado
		$datos->idencuesta = $this->input->post('idencuesta_asignada'); //Identificador de la encuesta asigmafa
		$datos->area = $this->input->post('area');

		//Informacion General
		$datos->edad = $this->input->post('edad');
		$datos->sexo = $this->input->post('sexo');
		$datos->ciudad = $this->input->post('ciudad');
		$datos->zona = $this->input->post('zona');
		$tiempo_calculado = ($fecha->getTimestamp()-$this->input->post('tiempoinicio'))/60;
		$datos->tiempo = round($tiempo_calculado, 0, PHP_ROUND_HALF_UP);
		return $datos;
	}

	public function success()
	{
		$this->load->view('mensajes/vde_confirmacion');
	}
	public function failure()
	{
		$this->load->view('mensajes/vde_error');
	}

}
