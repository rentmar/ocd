<?php

class SubTema_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function agregarSubTema($dt)
	{
		$this->db->insert('subtema', $dt);
	}
	public function modificarSubTema($dt,$idt)
	{
		$this->db->where('idsubtema',$idt);
		$this->db->update('subtema',$dt);
	}
	public function leerSubTemas()
	{
		$q=$this->db->get('subtema');
		return $q->result();
	}
	public function leerSubTemaPorId($idt)
	{
		$this->db->where('idsubtema',$idt);
		$q=$this->db->get ('subtema');
		return $q->row();
	}
	public function leerTemas()
	{
		$q=$this->db->get('tema');
		return $q->result();
	}
	//Rutina para extraer los subtemas de los tres primero formularios
	public function leerSubtemasForms()
	{
		$sql = "SELECT *  "
			."FROM subtema AS s  "
			."LEFT JOIN tema ON s.rel_idtema = tema.idtema  "
			."WHERE tema.rel_idcuestionario != 4 ";

		$qry = $this->db->query($sql);
		return $qry->result();
	}

	//Extrae Subtemas, temas y cuestionario
	public function leerSubtemaTemaCuestionario()
	{
		$sql = "SELECT *  "
			."FROM subtema AS s   "
			."LEFT JOIN tema ON tema.idtema = s.rel_idtema  "
			."LEFT JOIN cuestionario ON tema.rel_idcuestionario = cuestionario.idcuestionario  "
			."ORDER BY s.idsubtema   "
			."  ";

		$qry = $this->db->query($sql);
		return $qry->result();

	}

	//Rutina para extraer los subtemas del formulario leyes
	public function leerSubtemasLeyes()
	{
		$sql = "SELECT *  "
			."FROM subtema AS s  "
			."LEFT JOIN tema ON s.rel_idtema = tema.idtema  "
			."WHERE tema.rel_idcuestionario = 4 ";

		$qry = $this->db->query($sql);
		return $qry->result();
	}




}
