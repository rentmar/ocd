<?php
class SeguimientoMonitores_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function leerSeguimientoMonitores()
    {
        $qry=$this->db->query("SELECT first_name,last_name,nombre_departamento,fecha_registro,nombre_cuestionario,count(*) ncuestionario "
                . "FROM noticia "
                . "LEFT JOIN users "
                . "ON users.id = noticia.rel_idusuario "
                . "LEFT JOIN cuestionario "
                . "ON noticia.rel_idcuestionario = cuestionario.idcuestionario "
                . "LEFT JOIN departamento "
                . "ON departamento.iddepartamento = users.rel_iddepartamento "
                . "GROUP BY first_name, nombre_cuestionario");
        return $qry->result();
    }
    public function leerSeguimientoMonitoresDocentes()
    {
        $qry=$this->db->query("SELECT first_name,last_name,nombre_departamento,fecha_registro,nombre_cuestionario,count(*) ncuestionario "
                . "FROM noticia "
                . "LEFT JOIN users "
                . "ON users.id = noticia.rel_idusuario "
                . "LEFT JOIN cuestionario "
                . "ON noticia.rel_idcuestionario = cuestionario.idcuestionario "
                . "LEFT JOIN departamento "
                . "ON departamento.iddepartamento = users.rel_iddepartamento "
                . "WHERE iddepartamento = 2 "
                . "GROUP BY first_name, nombre_cuestionario");
        return $qry->result();
    }
    public function leerCuestionarios()
    {
        $qry=$this->db->query("SELECT * "
                . "FROM cuestionario "
                . "GROUP BY nombre_cuestionario");
        return $qry->result();
    }
}
