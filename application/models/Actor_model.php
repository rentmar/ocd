<?php

class Actor_model extends CI_Model
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
	
}
