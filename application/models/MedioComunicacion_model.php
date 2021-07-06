<?php

class MedioComunicacion_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function agregarMedioComunicacion($dt,$dtchkbox)
	{
		$this->db->trans_start();
		$this->db->insert('medio_comunicacion', $dt);
		$idmc=$this->db->insert_id();
		foreach ($dtchkbox as $iddpto)
		{
			$dtm=array('rel_idmedio'=>$idmc,
					'rel_iddepartamento'=>$iddpto
					);
			$this->db->insert('medio_departamento', $dtm);
		}
		$this->db->trans_complete();
	}
	public function modificarMedioComunicacion($dt,$idm)
	{
		$this->db->where('idmedio',$idm);
		$this->db->update('medio_comunicacion',$dt);
	}
	public function leerDepartamento()
	{
		$q = $this->db->get('departamento');
		return $q->result();	
	}
	public function leerTipoMedio()
	{
		$q = $this->db->get('tipo_medio');
		return $q->result();	
	}
	public function leerMedioPorId($idm)
	{
		$this->db->select('nombre_medio,rel_idtipomedio');
		$this->db->where('idmedio',$idm);
		$q = $this->db->get('medio_comunicacion');
		return $q->row();
	}
	public function leerDepartamentoMedioId($idm)
	{
		$this->db->select('rel_iddepartamento');
		$this->db->where('rel_idmedio',$idm);
		$q = $this->db->get('medio_departamento');
		return $q->result();
	}
	public function leerMedioComunicacion()
	{
		$q = $this->db->get('medio_comunicacion');
		return $q->result();
	}
}
