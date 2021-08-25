<?php

class Graficos_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->dbutil();
	}
	public function xmlDepartamento()
	{
		$sql = "SELECT * FROM departamento";
		$config = array(
				'root'=>'root',
				'element'=>'element',
				'newline'=>"\n",
				'tab'=>"\t");
		$q = $this->db->query($sql);
		
		return $this->dbutil->xml_from_result($q,$config);
	}
	public function leerDepartamentos()
	{
		$q=$this->db->get("departamento");
		return $q->result();
	}
	public function leerCuestionarios()
	{
		$q=$this->db->get("cuestionario");
		return $q->result();
	}
	public function leerTemasIdCuestionaro($idc)
	{	
		$this->db->where('rel_idcuestionario',$idc);
		$q=$this->db->get("tema");
		return $q->result();
	}
	public function leerActores()
	{
		$q=$this->db->get("actor");
		return $q->result();
	}
	public function leerActorId($ida)
	{
		$this->db->where('idactor',$ida);
		$q=$this->db->get("actor");
		return $q->row();
	}
	public function leerCuestionarioId($idc)
	{
		$this->db->where('idcuestionario',$idc);
		$q=$this->db->get("cuestionario");
		return $q->row();
	}
	public function leerNumLeyes()
	{
		$q=$this->db->get("Leyes");
		return count($q->result());
	}
	public function leerNumCuestionarioDepartamento($idd,$idc)
	{
		$sql="SELECT departamento.iddepartamento,departamento.nombre_departamento,cuestionario.nombre_cuestionario
			FROM noticia
			LEFT JOIN users ON noticia.rel_idusuario = users.id
			LEFT JOIN cuestionario ON noticia.rel_idcuestionario = cuestionario.idcuestionario
			LEFT JOIN departamento ON users.rel_iddepartamento = departamento.iddepartamento "
			."WHERE departamento.iddepartamento=".$idd
			." AND cuestionario.idcuestionario=".$idc;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerNumLeyDepartamento($idd,$idc)
	{
		$sql="SELECT departamento.iddepartamento,departamento.nombre_departamento,cuestionario.nombre_cuestionario
			FROM leyes
			LEFT JOIN users ON leyes.rel_idusuario = users.id
			LEFT JOIN cuestionario ON leyes.rel_idcuestionario = cuestionario.idcuestionario
			LEFT JOIN departamento ON users.rel_iddepartamento = departamento.iddepartamento "
			."WHERE departamento.iddepartamento=".$idd
			." AND cuestionario.idcuestionario=".$idc;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerNumActorDepartamento($idd,$ida)
	{
		$sql="SELECT departamento.iddepartamento,departamento.nombre_departamento,actor.idactor,actor.nombre_actor
			FROM noticia_actor
			LEFT JOIN actor on noticia_actor.rel_idactor=actor.idactor
			LEFT JOIN noticia ON noticia_actor.rel_idnoticia=noticia.idnoticia
			LEFT JOIN users ON noticia.rel_idusuario = users.id
			LEFT JOIN departamento ON users.rel_iddepartamento = departamento.iddepartamento "
			."WHERE departamento.iddepartamento=".$idd
			." AND actor.idactor=".$ida;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerNumCuestionarioNoticia($idc)
	{
		$sql="SELECT cuestionario.idcuestionario,cuestionario.nombre_cuestionario
			FROM noticia
			LEFT JOIN cuestionario on noticia.rel_idcuestionario=cuestionario.idcuestionario "
			."WHERE cuestionario.idcuestionario=".$idc;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerNumTemaNoticia($idt)
	{
		$sql="SELECT DISTINCT noticia_subtema.rel_idnoticia,tema.idtema 
			FROM noticia_subtema
			LEFT JOIN subtema ON noticia_subtema.rel_idsubtema=subtema.idsubtema
			LEFT JOIN tema ON subtema.rel_idtema=tema.idtema "
			."WHERE tema.idtema=".$idt;
		$q = $this->db->query($sql);
		return count($q->result());
	}
}
