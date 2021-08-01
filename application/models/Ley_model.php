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
    public function leerEstadoDeLeyes()
    {
        $qry=$this->db->query("SELECT * "
                . "FROM estadoley "
                . "GROUP BY idestadoley");
        return $qry->result();
    }
}