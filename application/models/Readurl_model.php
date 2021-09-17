<?php

class Readurl_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function autenticar($token)
	{
		$sql = "SELECT *   "
			."FROM encuesta as en     "
			."WHERE en.hash_text = ?   "
			."  "
			."  "
			."  "
			." "
			."  ";

		$qry = $this->db->query($sql, [$token,]);
		$encuesta =  $qry->row();
		if(is_null($encuesta))
		{
			return false;
		}else{
			return $encuesta;
		}
	}

}
