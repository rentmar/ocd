<?php


class Interfaz_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Extraer las secciones de un formulario
	public function leerSeccionesHoja($idhoja)
	{
		$sql = "SELECT *  "
			. "FROM uux_seccion  "
			. "WHERE uux_seccion.rel_idhoja = ?  "
			. "ORDER BY uux_seccion.ordinal_seccion ASC  "
			. "  ";
		$q = $this->db->query($sql, [$idhoja,]);
		return $q->result();
	}

	//Extraer las preguntas por seccion
	public function preguntasPorSeccion($idseccion){
		$sql = "SELECT *  "
			. "FROM uux_pregunta  "
			. "WHERE uux_pregunta.rel_idseccion = ?  "
			. "ORDER BY uux_pregunta.ordinal_pregunta  "
			. "  ";
		$q = $this->db->query($sql, [$idseccion,]);
		return $q->result();
	}

	//Extraer la alternativa a una pregunta
	public function preguntaAlternativa($idpregunta, $iddepartamento){
		$sql = "SELECT *  "
			. "FROM uux_pregunta_alternativa  "
			. "WHERE uux_pregunta_alternativa.rel_idpregunta = ?  "
			. "AND uux_pregunta_alternativa.rel_iddepartamento = ?  "
			. "  ";
		$q = $this->db->query($sql, [$idpregunta, $iddepartamento,]);
		return $q->row();
	}




}

