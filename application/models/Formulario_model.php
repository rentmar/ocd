<?php

class Formulario_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function agregarFormulario($dt)
	{
		$this->db->insert('cuestionario', $dt);
	}
	public function modificarFormulario($dt,$idf)
	{
		$this->db->where('idcuestionario',$idf);
		$this->db->update('cuestionario',$dt);
	}
	public function leerCuestionarios()
	{
		$q=$this->db->get('cuestionario');
		return $q->result();
	}
	public function leerCuestionarioPorId($idf)
	{
		$this->db->where('idcuestionario',$idf);
		$q=$this->db->get('cuestionario');
		return $q->row();
	}
}
