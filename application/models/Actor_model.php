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
	
}
