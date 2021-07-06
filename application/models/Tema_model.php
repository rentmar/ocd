<?php

class Tema_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function agregarActor($dt)
	{
		$this->db->insert('actor', $dt);
	}
	public function modificarActor($dt,$ida)
	{
		$this->db->where('idactor',$ida);
		$this->db->update('actor',$dt);
	}

	public function leerActorID($idactor)
	{
		$sql = "SELECT * "
			."FROM actor AS a  "
			."WHERE a.idactor = ?  ";
		$qry = $this->db->query($sql, [$idactor,  ]);
		return $qry->row();
	}
	public function leerTemas()
	{
		$q=$this->db->get('tema');
		return $q->result();
	}
	public function leerSubTemas()
	{
		$q=$this->db->get('subtema');
		return $q->result();
	}
	
}
