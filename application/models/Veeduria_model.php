<?php

class Veeduria_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function leerFormularios()
	{
		$sql = "SELECT *    "
			."FROM form_veeduria      "
			."    "
			."  "
			." "
			."  "
			." "
			."  ";
		$qry = $this->db->query($sql, [ ]);
		return $qry->result();
	}

	//Extraer el formulario tipo 1
	public function formEncuestadoresSupervisores(){
		$sql = "SELECT *    "
			."FROM form_veeduria_enc_sup      "
			."LEFT JOIN form_veeduria ON form_veeduria.idfv = form_veeduria_enc_sup.idfv    "
			."  "
			." "
			."  "
			." "
			."  ";
		$qry = $this->db->query($sql, [ ]);
		return $qry->row();
	}

	//Extraer el formulario tipo 2
	public function formCiudadania(){
		$sql = "SELECT *    "
			."FROM form_veeduria_ciudadania     "
			."LEFT JOIN form_veeduria ON form_veeduria.idfv = form_veeduria_ciudadania.idfv "
			."  "
			." "
			."  "
			." "
			."  ";
		$qry = $this->db->query($sql, [ ]);
		return $qry->row();
	}

	//Extraer el formulario tipo 3
	public function formVeedores(){
		$sql = "SELECT *    "
			."FROM form_veeduria_veedores     "
			."LEFT JOIN form_veeduria ON form_veeduria.idfv = form_veeduria_veedores.idfv "
			."  "
			." "
			."  "
			." "
			."  ";
		$qry = $this->db->query($sql, [ ]);
		return $qry->row();
	}

	//Extraer las secciones de un formulario
	public function formSecciones($idformulario){
		$sql = "SELECT *    "
			."FROM form_veeduria_seccion      "
			."WHERE form_veeduria_seccion.rel_idfv = ? "
			."ORDER BY ordinal ASC  "
			." "
			."  "
			." "
			."  ";
		$qry = $this->db->query($sql, [$idformulario, ]);
		return $qry->result();
	}

	//Extraer las secciones de un formulario
	public function leerPreguntasFormularios($idformulario){
		$sql = "SELECT form_veeduria_pregunta.idfvpreg AS idpregunta, form_veeduria_pregunta.pregunta AS pregunta, form_veeduria_pregunta.tipo AS tipo_pregunta, form_veeduria_pregunta.ordinal AS ordinal_pregunta, form_veeduria_pregunta.cod_preg AS codigo_pregunta, form_veeduria_pregunta.rel_idfvsec, form_veeduria_seccion.idfvsec AS idseccion, form_veeduria_seccion.nombre_seccion AS seccion, form_veeduria_seccion.cod_secc, form_veeduria_seccion.rel_idfv    "
			."FROM form_veeduria_pregunta      "
			."LEFT JOIN form_veeduria_seccion ON form_veeduria_seccion.idfvsec = form_veeduria_pregunta.rel_idfvsec   "
			."WHERE form_veeduria_seccion.rel_idfv = ?    "
			."ORDER BY form_veeduria_pregunta.ordinal ASC   "
			."  "
			." "
			."  ";
		$qry = $this->db->query($sql, [$idformulario, ]);
		return $qry->result();
	}
}
