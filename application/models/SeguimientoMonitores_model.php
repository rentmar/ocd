<?php
class SeguimientoMonitores_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function leerSeguimientoMonitores()
    {
        $qry=$this->db->query("SELECT first_name, last_name, nombre_departamento, nombre_cuestionario,COUNT(nombre_cuestionario) nombre_cuestionario1 "
                . "FROM cuestionario A "
                . "JOIN tema B "
                . "ON A.idcuestionario = B.rel_idcuestionario "
                . "JOIN users C "
                . "ON C.id = B.rel_idusuario "
                . "JOIN departamento D "
                . "ON D.iddepartamento = C.rel_iddepartamento "
                . "GROUP BY nombre_cuestionario ");
        return $qry->result();
    }
    public function leerCuestionarios()
    {
        $qry=$this->db->query("SELECT * "
                . "FROM cuestionario ");
        return $qry->result();
    }
    public function leerCuestionariosPorMonitor()
    {
        $qry=$this->db->query("SELECT * "
                . "FROM noticia N "
                . "LEFT JOIN noticia_subtema NS "
                . "ON N.idnoticia = NS.rel_idnoticia "
                . "LEFT JOIN subtema S "
                . "ON NS.rel_idsubtema = S.idsubtema "
                . "LEFT JOIN tema T "
                . "ON S.rel_idtema = T.idtema "
                . "LEFT JOIN cuestionario C "
                . "ON T.rel_idcuestionario = C.idcuestionario");
        return $qry->result();
    }
}
