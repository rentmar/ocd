<?php

class Universidad_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function leerUniversidades()
	{
		$qry = $this->db->get('universidad');
		return $qry->result();
	}

	public function leerUniverdiadID($id)
	{
		$this->db->where('iduniversidad',$id);
		$q=$this->db->get('universidad');
		return $q->row();

	}
	
	

}
