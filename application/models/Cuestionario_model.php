<?php

class Cuestionario_model extends CI_Model
{
	private $_tipomedioID;
	private $_temaID;
	private $_departamentoID;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Colocar el id del tipo de medio

	/**
	 * @param mixed $tipomedioID
	 * Colocar el id del tipo de medio
	 */
	public function setTipomedioID($tipomedioID)
	{
		$this->_tipomedioID = $tipomedioID;
	}

	//Colocar el id del tema
	public function setTemaID($temaID)
	{
		$this->_temaID = $temaID;
	}

	//Colocar el id del departamento
	public function setDepartamentoID($depID)
	{
		$this->_departamentoID = $depID;
	}

	//Leer todos los tipos de medios
	public function leerTodosTiposMedio()
	{
		$this->db->select(array('c.idtipomedio as tipo_id', 'c.nombre_tipo as tipo_nombre'));
		$this->db->from('tipo_medio as c');
		$this->db->order_by('tipo_nombre', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function leerMedios() {
		$sql = "SELECT medio_comunicacion.idmedio AS medio_id, medio_comunicacion.rel_idtipomedio, medio_comunicacion.nombre_medio AS medio_name "
			."FROM departamento "
			."RIGHT JOIN medio_departamento ON medio_departamento.rel_iddepartamento = departamento.iddepartamento "
			."RIGHT JOIN medio_comunicacion ON medio_comunicacion.idmedio = medio_departamento.rel_idmedio  "
			."RIGHT JOIN tipo_medio ON tipo_medio.idtipomedio = medio_comunicacion.rel_idtipomedio "
			."WHERE tipo_medio.idtipomedio = ? AND departamento.iddepartamento = ? ";
		$qry = $this->db->query($sql, [$this->_tipomedioID, $this->_departamentoID, ]);
		return $qry->result_array();

		/*$this->db->select(array('s.idmedio as medio_id', 's.rel_idtipomedio', 's.nombre_medio as medio_name'));
		$this->db->from('medio_comunicacion as s');
		$this->db->where('s.rel_idtipomedio', $this->_tipomedioID);
		$query = $this->db->get();
		return $query->result_array();*/
	}

	public function leerActor()
	{
		$query = $this->db->get('actor');
		return $query->result_array();
	}

	public function leerTema()
	{
		$query = $this->db->get('tema');
		return $query->result_array();
	}

	public function leerSubtema()
	{
		$this->db->select(array('s.idsubtema as stema_id', 's.rel_idtema', 's.nombre_subtema as stema_name'));
		$this->db->from('subtema as s');
		$this->db->where('s.rel_idtema', $this->_temaID);
		$query = $this->db->get();
		return $query->result_array();
	}


}