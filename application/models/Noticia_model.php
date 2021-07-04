<?php
class Noticia_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function escribirNoticia($DatosNoticia,$idmedio)
    {
		$this->db->trans_start();
			$this->db->insert('noticia',$DatosNoticia);
			$idnoticia=$this->db->insert_id();
			$DatosNoticiaMedio=[
			   'rel_idnoticia'=>$idnoticia,
			   'rel_idmedio'=>$idmedio];
			$this->db->insert('noticia_medio',$DatosNoticiaMedio);
		$this->db->trans_complete();
    }
	public function insertarOtroSubTema($dtot,$ost)
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
	public function leerNoticiasUsuario($idusr)
	{
		$sql = "SELECT ent_registro_compra.idregcompra,
				ent_marca.fabricante,
				ent_linea.nombre,
				ent_producto.item,
				ent_producto.codigo,
				ent_producto.dimension,
				ent_registro_compra.cantidad_recibida,
				ent_registro_compra.nota_recepcion,
				ent_compra_venta.fecha, 						
				t_detalle.cantidad_producto,
				t_detalle.total_producto 
				FROM ent_registro_compra 
				LEFT JOIN t_detalle ON ent_registro_compra.rel_iddetalle=t_detalle.iddetalle 
				LEFT JOIN ent_compra_venta ON t_detalle.rel_idcomven=ent_compra_venta.idcomven 
				LEFT JOIN ent_producto ON t_detalle.rel_idproducto=ent_producto.idproducto 
				LEFT JOIN ent_linea ON ent_producto.rel_idlinea = ent_linea.idlinea
				LEFT JOIN ent_marca on ent_producto.rel_idmarca = ent_marca.idmarca 
				WHERE ent_registro_compra.confirmacion=0";
        $qry = $this->db->query($sql);
        return $qry->result();
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


    
}
