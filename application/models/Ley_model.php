<?php
class Ley_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function leerLeyes()
    {
        $qry=$this->db->query("SELECT nombre_ley, nombre_estadoley, codigo_ley "
                . "FROM nombreley A "
                . "LEFT JOIN estadoley B "
                . "ON A.rel_idestadoley = B.idestadoley "
                . "LEFT JOIN codigoley C "
                . "ON C.rel_idestadoley = B.idestadoley "
                . "GROUP BY idnombreley");
        return $qry->result();
    }
    public function leerEstadoDeLeyes00()
    {
        $qry=$this->db->query("SELECT * "
                . "FROM estadoley "
                . "GROUP BY idestadoley");
        return $qry->result();
    }
    public function insertarEstadoDeLey($dtestado,$dttitulo,$dtcodigo,$dturl)
	{
		$this->db->trans_start();
		$this->db->insert('leyes_estadoley',$dtestado);
		$this->db->insert('nombreley',$dttitulo);
		$this->db->insert('codigoley',$dtcodigo);
		$this->db->insert('urlley',$dturl);
		$this->db->trans_complete();
	} 
	
	public function leerLeyPorId($idley)
	{
		$this->db->where('idleyes',$idley);
		$q=$this->db->get('leyes');
        return $q->row();
	}
	public function leerFuentes()
	{
		$q=$this->db->get('fuente');
		return $q->result();
	}
	public function leerFuenteLey($idl)
	{
		$this->db->where('rel_idleyes',$idl);
		$q=$this->db->get('leyes_fuente');
		return $q->row();
	}
	public function leerEstadosDeLey($idl)
	{
		$sql="SELECT leyes_estadoley.rel_idestadoley,estadoley.nombre_estadoley,leyes_estadoley.fecha_estadoley FROM "
			."leyes_estadoley "
			."LEFT JOIN estadoley ON leyes_estadoley.rel_idestadoley=estadoley.idestadoley "
			."WHERE rel_idleyes =  ".$idl;
		$q=$this->db->query($sql);
        return $q->result();
	}
	public function leerEstadoLey($idl,$ide)
	{
		$this->db->where('rel_idleyes',$idl);
		$this->db->where('rel_idestadoley',$ide);
		$q=$this->db->get('leyes_estadoley');
		return $q->result();
	}
	public function leerEstadosEnLey($idl)
	{
		$this->db->where('rel_idleyes',$idl);
		$q=$this->db->get('leyes_estadoley');
		return $q->result();
	}
	public function leerNombreLeyIdEstado($idl,$ids)
	{
		$this->db->where('rel_idley',$idl);
		$this->db->where('rel_idestadoley',$ids);
		$q=$this->db->get('nombreley');
		return $q->row();
	}
	public function leerCodigoLeyIdEstado($idl,$ids)
	{
		$this->db->where('rel_idley',$idl);
		$this->db->where('rel_idestadoley',$ids);
		$q=$this->db->get('codigoley');
		return $q->row();
	}
	public function leerUrlLeyIdEstado($idl,$ids)
	{
		$this->db->where('rel_idley',$idl);
		$this->db->where('rel_idestadoley',$ids);
		$q=$this->db->get('urlley');
		return $q->row();
	}
	public function leerTemasCuestionario($idc)
	{
		$this->db->where('rel_idcuestionario',$idc);
		$q= $this->db->get('tema');
		return $q->result();
	}
	public function leerTemasLey($idl)
	{
		$sql = "SELECT DISTINCT tema.idtema,tema.nombre_tema "
			."FROM ley_subtema "
			."LEFT JOIN subtema ON ley_subtema.rel_idsubtema=subtema.idsubtema "
			."LEFT JOIN tema ON subtema.rel_idtema=tema.idtema "
			."WHERE ley_subtema.rel_idleyes = ".$idl;
		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public function leerSubtemasLey($idl)
	{
		$sql = "SELECT subtema.idsubtema,subtema.nombre_subtema "
			."FROM ley_subtema "
			."LEFT JOIN subtema ON ley_subtema.rel_idsubtema=subtema.idsubtema "
			."WHERE ley_subtema.rel_idleyes = ".$idl;
		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public function leerSubtemasPorTema($idt)
	{
		$this->db->where('rel_idtema',$idt);
		$q= $this->db->get('subtema');
		return $q->result();
	}
	public function leerOtroTemaLey($idley)
	{
		$sql = "SELECT otrotema.idotrotema,otrotema.nombre_otrotema,otrotema.rel_idcuestionario "
			."FROM ley_otrotema "
			."LEFT JOIN otrotema ON ley_otrotema.rel_idotrotema=otrotema.idotrotema "
			."WHERE ley_otrotema.rel_idleyes = ".$idley;
		$qry = $this->db->query($sql);
		return $qry->row();
	}
	public function leerOtroSubTemaLey($idley)
	{
		$sql = "SELECT otrosubtema.idotrosubtema,otrosubtema.nombre_otrosubtema,otrosubtema.rel_idtema "
			."FROM ley_otrosubtema "
			."LEFT JOIN otrosubtema ON ley_otrosubtema.rel_idotrosubtema=otrosubtema.idotrosubtema "
			."WHERE ley_otrosubtema.rel_idleyes = ".$idley;
		$qry = $this->db->query($sql);
		return $qry->row();
	}
	public function modificarFechaLey($idl,$f)
	{
		$this->db->set('fecha_ley',$f);
		$this->db->where('idleyes', $idl);
		$this->db->update('leyes');
	}
	public function modificarFuenteLey($idl,$idf)
	{
		$this->db->set('rel_idfuente',$idf);
		$this->db->where('rel_idleyes', $idl);
		$this->db->update('leyes_fuente');
	}

	public function leerAllLeyes()
	{
		$sql = "SELECT *"
			."FROM leyes AS l "
			."LEFT JOIN leyes_estadoley ON leyes_estadoley.rel_idleyes = l.idleyes "
			."LEFT JOIN estadoley ON estadoley.idestadoley = leyes_estadoley.rel_idestadoley ";
		$qry = $this->db->query($sql);
		return $qry->result();
	}
	
}
