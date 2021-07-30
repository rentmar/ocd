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
		$sql="SELECT users.id as idusuario,
					users.username,
					users.first_name,
					users.last_name,
					departamento.nombre_departamento 
					FROM users "
		."LEFT JOIN users_groups ON users.id=users_groups.user_id "
		."LEFT JOIN groups ON users_groups.group_id=groups.id "
		."LEFT JOIN departamento ON users.rel_iddepartamento=departamento.iddepartamento "
		."WHERE groups.id =".$idgrupo;
		$qry = $this->db->query($sql);
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
