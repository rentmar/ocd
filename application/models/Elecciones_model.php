<?php

class Elecciones_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Extraer las secciones de un formulario
	public function leerSeccionesHoja($idhoja)
	{
		$sql="SELECT *  "
			."FROM uux_seccion  "
			."WHERE uux_seccion.rel_idhoja = ?  "
			."ORDER BY uux_seccion.ordinal_seccion ASC  "
			."  ";
		$q=$this->db->query($sql, [$idhoja, ]);
		return $q->result();
	}

	//Actualizar las mesas del cuestionario 1
	public function actualizarMesasAdicionales($idhoja1, $mesas){
		/** @noinspection PhpLanguageLevelInspection */
		$data = [
			'mesas' => $mesas,
		];
		$this->db->where('idfrhoja1', $idhoja1 );
		$this->db->update('form_elecc_jud_2024_resp_hoja1', $data);
	}

	//Actualizar las mesas adicionales
	public function actualizarMesasAdicionalesH2($idhoja2, $mesas){
		/** @noinspection PhpLanguageLevelInspection */
		$data = [
			'mesas' => $mesas,
		];
		$this->db->where('idfrhoja2', $idhoja2 );
		$this->db->update('form_elecc_jud_2024_resp_hoja2', $data);
	}

	//Hoja de respuestas
	public function listaPreguntasPorHoja1($idhoja){
		$sql="SELECT uux_pregunta.idpregunta, uux_pregunta.codigo_pregunta, uux_pregunta.rel_tipo_pregunta AS tipo, uux_pregunta.ordinal_pregunta AS ordinal, uux_pregunta.restriccion_departamento AS alternativa  "
			."FROM uux_hoja  "
			."LEFT JOIN uux_seccion on uux_seccion.rel_idhoja = uux_hoja.idhoja  "
			."LEFT JOIN uux_pregunta ON uux_pregunta.rel_idseccion = uux_seccion.idseccion  "
			."WHERE uux_hoja.idhoja = ?  "
			."  ";
		$q=$this->db->query($sql, [$idhoja, ]);
		return $q->result();

	}



	//Actualizar tabla de respuestas
	public function actualizarRespuestasHoja1($idhoja1, $respuestas_json){
		/** @noinspection PhpLanguageLevelInspection */
		$data = [
			'respuestas' => $respuestas_json,
		];
		$this->db->where('idfrhoja1', $idhoja1 );
		$this->db->update('form_elecc_jud_2024_resp_hoja1', $data);
	}

	//Actualizar tabla de respuestas en la hoja2
	public function actualizarRespuestasHoja2($idhoja2, $respuestas_json){
		/** @noinspection PhpLanguageLevelInspection */
		$data = [
			'respuestas' => $respuestas_json,
		];
		$this->db->where('idfrhoja2', $idhoja2 );
		$this->db->update('form_elecc_jud_2024_resp_hoja2', $data);
	}



}
