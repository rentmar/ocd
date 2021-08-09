<?php

class Tema_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function agregarTema($dt)
	{
		$this->db->insert('tema', $dt);
	}
	public function leerCustionarios()
	{
		$q=$this->db->get('cuestionario');
		return $q->result();
	}
	public function modificarTema($dt,$idt)
	{
		$this->db->where('idtema',$idt);
		$this->db->update('tema',$dt);
	}
	public function leerTemas()
	{
		$q=$this->db->get('tema');
		return $q->result();
	}
	public function leerTemaPorId($idt)
	{
		$this->db->where('idtema',$idt);
		$q=$this->db->get ('tema');
		return $q->row();
	}
	//Rutina para extraer los temas de los tres primeros formularios
	public function leerTemasForms()
	{
		$sql = "SELECT *  "
			."FROM tema as t  "
			."WHERE t.rel_idcuestionario != 4  "
			."ORDER by t.idtema ";

		$qry = $this->db->query($sql);
		return $qry->result();
	}


}
