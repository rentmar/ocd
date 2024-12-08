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
}
