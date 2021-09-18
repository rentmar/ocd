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
	}

	public function url($identificador)
	{
		$hash = $identificador;
		$encuesta = $this->Readurl_model->autenticar($hash);
		if(!$encuesta){
			echo "No existe encuesta";
		}else{
			var_dump($encuesta);
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
		$encuesta = $this->Readurl_model->autenticar($hash);
		$iduiencuesta = $encuesta->rel_iduiencuesta;
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

	public function encuestaExpirada()
	{
		echo "La encuesta no esta vigente";

	}

}
