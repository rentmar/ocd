<?php
class Noticia_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function escribirFila($DatosNoticia)
    {
        $this->db->insert('noticia',$DatosNoticia);
        return $this->db->insert_id();
    }
    public function escribirFila1($DatosNoticiaMedio)
    {
        $this->db->insert('noticia_medio',$DatosNoticiaMedio);
        return $this->db->insert_id();
    }
    public function borrarFila($id)
    {
        $this->db->delete('noticia', array('idnoticia' => $id));
    }
    function actualizaDato($id,$columna)
    {
        $this->db->where('idnoticia', $id);
        $this->db->set('titular', $columna);
        return $this->db->update('noticia');
    }
    
}