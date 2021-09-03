<?php
class Radial_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function leerMactores($fecha)
    {
        $fecha_inicio = $fecha->fecha_inicio;
        $fecha_fin = $fecha->fecha_fin;
        		$sql = "SELECT idactor, nombre_actor, idcuestionario, nombre_cuestionario, COUNT(*) ncuestionario "
                                . "FROM actor "
                                . "LEFT JOIN noticia_actor ON noticia_actor.rel_idactor = actor.idactor "
                                . "LEFT JOIN noticia ON noticia.idnoticia = noticia_actor.rel_idnoticia "
                                . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = noticia.rel_idcuestionario "
                                . "GROUP BY idactor, idcuestionario";
                $qry = $this->db->query($sql);
		return $qry->result();
    }
    public function leerMmedioDcomunicacion($fecha)
    {
        $fecha_inicio = $fecha->fecha_inicio;
        $fecha_fin = $fecha->fecha_fin;
                $sql = "SELECT idactor, nombre_actor, idcuestionario, nombre_cuestionario, COUNT(*) ncuestionario "
                                . "FROM actor "
                                . "LEFT JOIN noticia_actor ON noticia_actor.rel_idactor = actor.idactor "
                                . "LEFT JOIN noticia ON noticia.idnoticia = noticia_actor.rel_idnoticia "
                                . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = noticia.rel_idcuestionario "
                                . "GROUP BY idactor, idcuestionario";
                $qry = $this->db->query($sql);
        return $qry->result();
    }
}