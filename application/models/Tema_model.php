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
}
