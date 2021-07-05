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
	public function leerTodasNoticiasUsuario($idusuario, $idcuestionario)
	{
		$sql = "SELECT * "
			."FROM noticia AS n  "
			."LEFT JOIN actor ON actor.idactor = n.rel_idactor  "
			."LEFT JOIN subtema ON subtema.idsubtema = n.rel_idsubtema  "
			."LEFT JOIN medio_comunicacion ON medio_comunicacion.idmedio = n.rel_idmedio  "
			."LEFT JOIN tema ON tema.idtema = subtema.rel_idtema  "
			."LEFT JOIN cuestionario ON cuestionario.idcuestionario = tema.rel_idcuestionario  "
			."WHERE n.rel_idusuario = ? AND cuestionario.idcuestionario = ?  ";
		$qry = $this->db->query($sql, [$idusuario, $idcuestionario,  ]);
		return $qry->result();
	}

	public function leerNoticiaID($idnoticia){
		$sql = "SELECT * "
			."FROM noticia AS n  "
			."WHERE n.idnoticia = ?  ";
		$qry = $this->db->query($sql, [$idnoticia,  ]);
		return $qry->row();
	}


    
}
