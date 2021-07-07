<?php

class Cuestionario_model extends CI_Model
{
	private $_tipomedioID;
	private $_temaID;
	private $_departamentoID;
	private $_cuestionarioID;

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

	public function setCuestionarioID($cuestID)
	{
		$this->_cuestionarioID = $cuestID;
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
		$sql = "SELECT tema.idtema, tema.nombre_tema "
			."FROM groups AS g "
			."LEFT JOIN users_groups ON users_groups.group_id = g.id  "
			."LEFT JOIN users ON users.id = users_groups.user_id "
			."LEFT JOIN tema ON tema.rel_idusuario = users.id "
			."WHERE g.id = 1 AND tema.rel_idcuestionario = ?  ";
		$qry = $this->db->query($sql, [$this->_cuestionarioID,  ]);
		return $qry->result_array();

		/*$sql = "SELECT tema.idtema, tema.nombre_tema "
			."FROM tema "
			."WHERE tema.rel_idcuestionario = ?  ";
		$qry = $this->db->query($sql, [$this->_cuestionarioID,  ]);
		return $qry->result_array();*/
	}
	public function leerGrupoPorIdTema($idt)
	{
		$sql = "SELECT users_groups.group_id "
			."FROM tema "
			."LEFT JOIN users_groups ON tema.rel_idusuario = users_groups.user_id  "
			."WHERE tema.idtema =".$idt;
		$qry = $this->db->query($sql);
		return $qry->row();
	}
	public function leerGrupoPorSubTema($idt)
	{
		$sql = "SELECT users_groups.group_id "
			."FROM tema "
			."LEFT JOIN users_groups ON tema.rel_idusuario = user_groups.user_id  "
			."WHERE tema.idtema =".$idt;
		$qry = $this->db->query($sql);
		return $qry;
	}
	public function leerSubtema()
	{
		$sql = "SELECT s.idsubtema AS stema_id, s.nombre_subtema AS stema_name "
			."FROM subtema as s "
			."WHERE s.rel_idtema = ?  ";
		$qry = $this->db->query($sql, [$this->_temaID,  ]);
		return $qry->result_array();
		/*$this->db->select(array('s.idsubtema as stema_id', 's.rel_idtema', 's.nombre_subtema as stema_name'));
		$this->db->from('subtema as s');
		$this->db->where('s.rel_idtema', $this->_temaID);
		$query = $this->db->get();
		return $query->result_array();*/
	}

	public function leerDepartamento($iddep)
	{
		$sql = "SELECT d.iddepartamento, d.nombre_departamento "
			."FROM departamento AS d  "
			."WHERE d.iddepartamento = ?  ";
		$qry = $this->db->query($sql, [$iddep,  ]);
		return $qry->row();
	}

	public function leerTipoMedio($iddep)
	{
		$sql = "SELECT * "
			."FROM tipo_medio AS t   "
			."WHERE t.idtipomedio = ?  ";
		$qry = $this->db->query($sql, [$iddep,  ]);
		return $qry->row();
	}



	public function leerCuestionario($idcuestionario)
	{
		$qry = $this->db->get_where('cuestionario', [ 'idcuestionario' => $idcuestionario ]);
		return $qry->row();
	}

	public function leerTemaPorId($idt)
	{
		$this->db->where('idtema',$idt);
		$q= $this->db->get('tema');
		return $q->row();
	}
	public function leerSubTemaPorId($id)
	{
		$this->db->where('idsubtema',$id);
		$q= $this->db->get('subtema');
		return $q->row();
	}
	public function leerActorPorId($id)
	{
		$this->db->where('idactor',$id);
		$q= $this->db->get('actor');
		return $q->row();
	}
	public function leerMedioPorId($id)
	{
		$this->db->where('idmedio',$id);
		$q= $this->db->get('medio_comunicacion');
		return $q->row();
	}

}
