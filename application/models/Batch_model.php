<?php

class  Batch_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function tablacsv(){
		$sql = "SELECT *    "
			."FROM usuarioscsv   "
			."    "
			."   "
			."  "
			."  "
			." "
			." ";

		$qry = $this->db->query($sql);
		return $qry->result();
	}
}
