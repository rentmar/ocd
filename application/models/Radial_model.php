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
                $sql = "SELECT idmedio, nombre_medio, idcuestionario, nombre_cuestionario, rel_idtipomedio, COUNT(*) ncuestionario "
                . "FROM noticia "
                . "LEFT JOIN medio_comunicacion ON medio_comunicacion.idmedio = noticia.rel_idmedio "
                . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = noticia.rel_idcuestionario "
                . "GROUP BY idmedio, idcuestionario";
                $qry = $this->db->query($sql);
        return $qry->result();
    }
    public function leerMCredSocial($fecha)
    {
        $fecha_inicio = $fecha->fecha_inicio;
        $fecha_fin = $fecha->fecha_fin;
                $sql = "SELECT idmedio, nombre_medio, idcuestionario, nombre_cuestionario, COUNT(*) ncuestionario "
                . "FROM noticia "
                . "LEFT JOIN medio_comunicacion ON medio_comunicacion.idmedio = noticia.rel_idmedio "
                . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = noticia.rel_idcuestionario "
                . "WHERE medio_comunicacion.rel_idtipomedio = 1 "
                . "GROUP BY idmedio, idcuestionario";
                $qry = $this->db->query($sql);
        return $qry->result();
    }
    public function leerMCcanalDtv($fecha)
    {
        $fecha_inicio = $fecha->fecha_inicio;
        $fecha_fin = $fecha->fecha_fin;
                $sql = "SELECT idmedio, nombre_medio, idcuestionario, nombre_cuestionario, COUNT(*) ncuestionario "
                . "FROM noticia "
                . "LEFT JOIN medio_comunicacion ON medio_comunicacion.idmedio = noticia.rel_idmedio "
                . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = noticia.rel_idcuestionario "
                . "WHERE medio_comunicacion.rel_idtipomedio = 2 "
                . "GROUP BY idmedio, idcuestionario";
                $qry = $this->db->query($sql);
        return $qry->result();
    }
    public function leerMCemisoraRadial($fecha)
    {
        $fecha_inicio = $fecha->fecha_inicio;
        $fecha_fin = $fecha->fecha_fin;
                $sql = "SELECT idmedio, nombre_medio, idcuestionario, nombre_cuestionario, COUNT(*) ncuestionario "
                . "FROM noticia "
                . "LEFT JOIN medio_comunicacion ON medio_comunicacion.idmedio = noticia.rel_idmedio "
                . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = noticia.rel_idcuestionario "
                . "WHERE medio_comunicacion.rel_idtipomedio = 3 "
                . "GROUP BY idmedio, idcuestionario";
                $qry = $this->db->query($sql);
        return $qry->result();
    }
    public function leerMCprensaEscrita($fecha)
    {
        $fecha_inicio = $fecha->fecha_inicio;
        $fecha_fin = $fecha->fecha_fin;
                $sql = "SELECT idmedio, nombre_medio, idcuestionario, nombre_cuestionario, COUNT(*) ncuestionario "
                . "FROM noticia "
                . "LEFT JOIN medio_comunicacion ON medio_comunicacion.idmedio = noticia.rel_idmedio "
                . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = noticia.rel_idcuestionario "
                . "WHERE medio_comunicacion.rel_idtipomedio = 4 "
                . "GROUP BY idmedio, idcuestionario";
                $qry = $this->db->query($sql);
        return $qry->result();
    }
    public function leerMCtvRural($fecha)
    {
        $fecha_inicio = $fecha->fecha_inicio;
        $fecha_fin = $fecha->fecha_fin;
                $sql = "SELECT idmedio, nombre_medio, idcuestionario, nombre_cuestionario, COUNT(*) ncuestionario "
                . "FROM noticia "
                . "LEFT JOIN medio_comunicacion ON medio_comunicacion.idmedio = noticia.rel_idmedio "
                . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = noticia.rel_idcuestionario "
                . "WHERE medio_comunicacion.rel_idtipomedio = 5 "
                . "GROUP BY idmedio, idcuestionario";
                $qry = $this->db->query($sql);
        return $qry->result();
    }
        public function leerMCradioRural($fecha)
    {
        $fecha_inicio = $fecha->fecha_inicio;
        $fecha_fin = $fecha->fecha_fin;
                $sql = "SELECT idmedio, nombre_medio, idcuestionario, nombre_cuestionario, COUNT(*) ncuestionario "
                . "FROM noticia "
                . "LEFT JOIN medio_comunicacion ON medio_comunicacion.idmedio = noticia.rel_idmedio "
                . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = noticia.rel_idcuestionario "
                . "WHERE medio_comunicacion.rel_idtipomedio = 6 "
                . "GROUP BY idmedio, idcuestionario";
                $qry = $this->db->query($sql);
        return $qry->result();
    }
}