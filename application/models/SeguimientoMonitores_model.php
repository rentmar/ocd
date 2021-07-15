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
        $qry=$this->db->query("SELECT idnoticia, rel_idusuario, COUNT(rel_idusuario) nCuestionarios "
                . "FROM noticia "
                . "GROUP BY rel_idusuario "
                . "ORDER BY rel_idusuario ");
        return $qry->result();
    }
    public function leerUsuariosMonitor()
    {
        $qry=$this->db->query("SELECT name, first_name, last_name "
                . "FROM groups A "
                . "LEFT JOIN users_groups B "
                . "ON A.id = B.group_id "
                . "LEFT JOIN users C "
                . "ON C.id = B.user_id "
                . "WHERE name = 'monitores' "
                . "GROUP BY first_name "
                . "ORDER BY first_name ");
        return $qry->result();        
    }
    public function blabla()
    {
        $qry=$this->db->query("SELECT first_name, COUNT(first_name) nCuestionarios "
                . "FROM noticia "
                . "LEFT JOIN users "
                . "ON noticia.rel_idusuario = users.id "
                . "LEFT JOIN tema "
                . "ON tema.rel_idusuario = users.id "
                . "LEFT JOIN cuestionario "
                . "ON tema.rel_idcuestionario = cuestionario.idcuestionario"
                . "GROUP BY first_name");
        return $qry->result();        
    }
}
