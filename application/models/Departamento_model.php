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
	public function leerUniversidades()
	{
		$qry = $this->db->get('universidad');
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
	public function leerUsuarioPorIdGrupo($idgrupo)
	{
		$sql = "SELECT *  "
		 	. "FROM users as u  "
		 	. "LEFT JOIN departamento ON departamento.iddepartamento = u.rel_iddepartamento  "
			. "LEFT JOIN universidad ON universidad.iduniversidad = u.rel_iduniversidad "
			. "LEFT JOIN users_groups ON users_groups.user_id = u.id  "
			. "LEFT JOIN groups ON groups.id = users_groups.group_id  "
			. "WHERE groups.id = ?  ";
		$qry = $this->db->query($sql, [$idgrupo, ]);
		return $qry->result();
	}
	public function leerGrupoPorIdUser($idu)
	{
		$this->db->where('user_id',$idu);
		$this->db->select('group_id');
		$q=$this->db->get('users_groups');
		return $q->row();
	}

}
