<?php
class Noticia_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function insertarNoticia($DatosNoticia)
    {
		$this->db->insert('noticia',$DatosNoticia);
    }
	public function insertarOtroTema($dtot,$ost)
	{
		$this->db->trans_start();
			$this->db->insert('tema',$dtot);
			$idtema=$this->db->insert_id();
			$datoOtroSubTema=[
			   'nombre_subtema'=>$ost,
			   'rel_idtema'=>$idtema];
			$this->db->insert('subtema',$datoOtroSubTema);
			$q=$this->db->insert_id();
		$this->db->trans_complete();
		return $q;
	}
	public function leerNoticiaPorId($idnoticia)
	{
		$this->db->where('idnoticia',$idnoticia);
		$q= $this->db->get('noticia');
		return $q->row();
	}
	public function leerNoticiaMedioPorId($idnoticia)
	{
		$this->db->where('rel_idnoticia',$idnoticia);
		$q= $this->db->get('noticia_medio');
		return $q->row();
	}
	public function leerTemaPorSubtema($ids)
	{
		$this->db->where('idsubtema',$ids);
		$q= $this->db->get('subtema');
		return $q->row();
	}
	public function leerTemaPorId($idt)
	{
		$this->db->where('idtema',$idt);
		$q= $this->db->get('tema');
		return $q->row();
	}
	public function editarNoticia($idnoticia)
	{
		
	}
}