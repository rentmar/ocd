<?php
class SeguimientoMonitores_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function leerSeguimientoMonitores()
    {
        $qry=$this->db->query("SELECT first_name, last_name, nombre_departamento, COUNT(DISTINCT nombre_cuestionario) AS nombre_cuestionario "
                . "FROM cuestionario A "
                . "INNER JOIN tema B "
                . "ON A.idcuestionario = B.rel_idcuestionario "
                . "LEFT JOIN users C "
                . "ON C.id = B.rel_idusuario "
                . "LEFT JOIN departamento D "
                . "ON D.iddepartamento = C.rel_iddepartamento ");
        return $qry->result();
    }
}
