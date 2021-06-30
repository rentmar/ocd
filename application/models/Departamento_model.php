<?php

class Departamento_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function leerDepartamentos()
	{
		$qry = $this->db->get('departamento');
		return $qry->result();
	}
}
