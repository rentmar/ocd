<?php

class Partida_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Comprueba el documento de identidad
	public function buscaCI($numero_ci)
	{
		$this->db->select('numero_ci');
		$this->db->from('partida');
		$this->db->where('numero_ci', $numero_ci);
		return $this->db->count_all_results();
	}

	//Crea un registro de entrada
	public function crearPartida(){

	}

}
