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
}
