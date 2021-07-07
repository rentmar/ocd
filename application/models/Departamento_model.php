<?php

class Departamento_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Leer todos los departamentos
	public function leerDepartamentos()
	{
		$qry = $this->db->get('departamento');
		return $qry->result();
	}
	
	//Leer un solo departamento
	public function leerDepartamento($identificador)
	{
		$sql = "SELECT * "
			."FROM departamento "
			."WHERE iddepartamento = ?";
		$qry = $this->db->query($sql,$identificador);
		return $qry->row();
	}

	public function crearDepartamento($datos){
		$sql = $this->db->insert('departamento', $datos);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	public function updateDepartamento($iddepartamento, $departamento)
	{
		$this->db->where('iddepartamento', $iddepartamento);
		$sql = $this->db->update('departamento', $departamento );
		return $sql;
	}


}
