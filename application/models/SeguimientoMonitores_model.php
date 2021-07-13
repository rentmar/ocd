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
}
