<?php

class Cuestionario_model extends CI_Model
{
	private $_tipomedioID;
	private $_temaID;
	private $_departamentoID;
	private $_cuestionarioID;
	private $_usuarioID;
	private $_temaIDs = array();

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

	public function setTemaIDs($temas)
	{
		$this->_temaIDs = $temas;
	}

	public function setUsuarioID($usuarioID)
	{
		$this->_usuarioID = $usuarioID;
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
			."FROM tema "
			."WHERE tema.rel_idcuestionario = ?  "
			."AND tema.activo = 1  ";
		/*$sql = "SELECT tema.idtema, tema.nombre_tema "
			."FROM groups AS g "
			."LEFT JOIN users_groups ON users_groups.group_id = g.id  "
			."LEFT JOIN users ON users.id = users_groups.user_id "
			."LEFT JOIN tema ON tema.rel_idusuario = users.id "
			."WHERE g.id = 1 AND tema.rel_idcuestionario = ?  ";*/
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
	public function leerTipoMedioPorId($id)
	{
		$this->db->where('idtipomedio',$id);
		$q= $this->db->get('tipo_medio');
		return $q->row();
	}

	public function leerSubtemasPorIDs()
	{
		$sql = "SELECT * "
		."FROM tema as t  "
		."LEFT JOIN subtema ON subtema.rel_idtema = t.idtema  "
		."WHERE t.idtema = ?  ";
		$tema_subtema = array();


		foreach ($this->_temaIDs as $i=>$id)
		{
			if($id != 0)
			{
				$qry = $this->db->query($sql, [$id,  ]);
				$registro = $qry->result_array();

				$tema_subtema = array_merge($tema_subtema, $registro);
			}
		}
		return $tema_subtema;
	}

	public function leerTemasPorIDs()
	{
		$sql = "SELECT * "
			."FROM tema as t  "
			."WHERE t.idtema = ?  ";
		$tema_subtema = array();


		foreach ($this->_temaIDs as $i=>$id)
		{
			if($id != 0)
			{
				$qry = $this->db->query($sql, [$id,  ]);
				$registro = $qry->result_array();

				$tema_subtema = array_merge($tema_subtema, $registro);
			}
		}
		return $tema_subtema;
	}

	public function leerActoresPorIDs($actores)
	{
		$sql = "SELECT * "
			."FROM actor as ac  "
			."WHERE ac.idactor = ?  ";
		$tema_subtema = array();


		foreach ($actores as $i=>$id)
		{
			if($id != 0)
			{
				$qry = $this->db->query($sql, [$id,  ]);
				$registro = $qry->result_array();

				$tema_subtema = array_merge($tema_subtema, $registro);
			}
		}
		return $tema_subtema;
	}

	//Leer los estados de ley definidos
	public function leerEstadosDeLey()
	{
		$sql = "SELECT * "
			."FROM estadoley "
			."ORDER BY estadoley.porcentaje_estadoley ASC ";
		$qry = $this->db->query($sql);
		return $qry->result();
	}

	//Leer por estado de ley definidos por id
	public function leerEstadosDeLeyID($id)
	{
		$sql = "SELECT * "
			."FROM estadoley "
			."WHERE estadoley.idestadoley = ? ";
		$qry = $this->db->query($sql, [$id, ]);
		return $qry->row();
	}

	//Leer las fuentes de la ley
	public function leerFuentesDeLey()
	{
		$sql = "SELECT * "
			."FROM fuente ";
		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public function leerLeyesIdUsuario($idu)
	{
		$sql="SELECT leyes.idleyes,leyes.fecha_registro,leyes.resumen,fuente.nombre_fuente FROM "
			."leyes_fuente "
			."LEFT JOIN leyes ON leyes_fuente.rel_idleyes=leyes.idleyes "
			."LEFT JOIN fuente ON leyes_fuente.rel_idfuente=fuente.idfuente "
			."WHERE leyes.rel_idusuario = ".$idu;
		$q=$this->db->query($sql);
        return $q->result();
	}

	public function leerLeyesEstadoIdUsuario()
	{
		$sql = "SELECT * "
			."FROM leyes AS l "
			."LEFT JOIN leyes_estadoley ON leyes_estadoley.rel_idleyes = l.idleyes "
			."LEFT JOIN estadoley ON estadoley.idestadoley = leyes_estadoley.rel_idestadoley "
			."WHERE l.rel_idusuario = ? "
			."ORDER BY estadoley.porcentaje_estadoley ASC";
		$qry = $this->db->query($sql);
		return $qry->result();
	}


	public function leerPreguntasCSJC()
	{
		$sql = "SELECT * "
			."FROM form_csjc_preguntas "
			."ORDER BY form_csjc_preguntas.ordinal ASC";
		$qry = $this->db->query($sql);
		return $qry->result();
	}

	public function registrarFormCSJC($info, $respuestas){
		//Matriz de datos
		$form_infogeneral = $info;
		$form_respuestas = $respuestas;
		//Iniciar la transaccion
		$this->db->trans_begin();

		//Insertar la respuesta en la tabla
		/** @noinspection PhpUnusedLocalVariableInspection */
		/** @noinspection PhpLanguageLevelInspection */
		$datos_formulario_respuesta = [
			'fecha_reg' => $form_infogeneral->fecha_registro,
			'fecha_reg_lit' => $form_infogeneral->fecha_registro_literal,
			'sexo' => $form_infogeneral->sexo,
			'edad' => $form_infogeneral->edad,
			'municipio' => $form_infogeneral->municipio,
			'activo' => 1,
			'repuestas_csjc' => json_encode($form_respuestas),
			'rel_iddepartamento' => $form_infogeneral->iddepartamento,
			'rel_id' => $form_infogeneral->idusuario,
			'rel_idcuestionario' => $form_infogeneral->idformulario,
		];
		$this->db->insert('form_csjc_respuestas', $datos_formulario_respuesta);

		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}

	public function leerTodosFormulariosCSJC()
	{
		$sql = "SELECT * "
			."FROM form_csjc_respuestas "
			."LEFT JOIN departamento ON departamento.iddepartamento = form_csjc_respuestas.rel_iddepartamento "
			."LEFT JOIN users ON users.id = form_csjc_respuestas.rel_id "
			."LEFT JOIN cuestionario ON cuestionario.idcuestionario = form_csjc_respuestas.rel_idcuestionario "
			." "
			." "
			." ";
		$qry = $this->db->query($sql);
		return $qry->result();
	}

	//Extraer un formulario por identificador
	public function leerFormularioJC($idfcsjc)
	{
		$sql = "SELECT * "
			."FROM form_csjc_respuestas "
			."WHERE form_csjc_respuestas.idfcsjc = ? "
			." "
			." "
			." "
			." "
			." ";
		$qry = $this->db->query($sql, [$idfcsjc,]);
		return $qry->row();
	}
	//Actualizar el estado de un formulario
	public function cambiarEstadoJC($identificador, $estado)
	{
		/** @noinspection PhpLanguageLevelInspection */
		$data = [
			'activo' => $estado,
		];
		$this->db->where('idfcsjc', $identificador);
		$this->db->update(' form_csjc_respuestas ', $data);
	}

	//Extraer todos lod formularios validos para un reporte general
	public function leerFormulariosValidos()
	{
		$sql = "SELECT * "
			."FROM form_csjc_respuestas "
			."LEFT JOIN departamento ON departamento.iddepartamento = form_csjc_respuestas.rel_iddepartamento "
			."LEFT JOIN users ON users.id = form_csjc_respuestas.rel_id "
			."LEFT JOIN cuestionario ON cuestionario.idcuestionario = form_csjc_respuestas.rel_idcuestionario "
			."WHERE form_csjc_respuestas.activo = 1  "
			." "
			." ";
		$qry = $this->db->query($sql);
		return $qry->result();
	}

	//Contar el numero de formularios de un usario
	public function contarFormulariosUsuario($idusuario)
	{
		$this->db->where('rel_id', $idusuario);
		$this->db->from('form_csjc_respuestas ');
		return $this->db->count_all_results();
	}

	//Extraer el formulario del usuario
	public function leerFormularioUsuario($idusuario)
	{
		$sql = "SELECT * "
			."FROM form_csjc_respuestas "
			."WHERE form_csjc_respuestas.rel_id = ? "
			." "
			." "
			." "
			." "
			." ";
		$qry = $this->db->query($sql, [$idusuario,]);
		return $qry->row();		
	}

	//Eliminar un formulario
	public function eliminarFormulario($idformulario)
	{
		$this->db->where('idfcsjc', $idformulario);
		$this->db->delete('form_csjc_respuestas');		
	}


	//Leer el estado del modo test del formulario
	public function modosCuestionario($idformulario)
	{
		$sql = "SELECT * "
			."FROM cuestionario_opciones "
			."WHERE cuestionario_opciones.rel_idcuestionario = ? "
			." "
			." "
			." "
			." "
			." ";
		$qry = $this->db->query($sql, [$idformulario,]);
		return $qry->row();
	}

	//Actualizar la ultima pregunta
	public function actualizarCuestionario($idformulario, $respuestas_json){
		/** @noinspection PhpLanguageLevelInspection */
		$data = [
			"repuestas_csjc" => $respuestas_json,
			"esta_incompleto" => 0,
		];
		$this->db->where('idfcsjc', $idformulario);
		$this->db->update(' form_csjc_respuestas', $data);
	}

	//Comprobar si hay formularios
	public function existenRegistrosEJ2024($idusuario)
	{
		$this->db->where('rel_id', $idusuario);
		$this->db->from('form_elecc_jud_2024_resp_hoja1');
		$hoja1 = $this->db->count_all_results();

		$this->db->where('rel_id', $idusuario);
		$this->db->from('form_elecc_jud_2024_resp_hoja2');
		$hoja2 = $this->db->count_all_results();

		if($hoja1 == 1 and $hoja2 == 1){
			$bandera = true;
		}else{
			$bandera = false;
		}
		return $bandera;
	}

	//Comprobar registro de hoja 1
	public function existeHoja1($idusuario)
	{
		$this->db->where('rel_id', $idusuario);
		$this->db->from('form_elecc_jud_2024_resp_hoja1');
		$hoja1 = $this->db->count_all_results();

		if($hoja1 == 1 ){
			$bandera = true;
		}else{
			$bandera = false;
		}
		return $bandera;
	}
	//Comprobar registro de hoja 2
	public function existeHoja2($idusuario)
	{
		$this->db->where('rel_id', $idusuario);
		$this->db->from('form_elecc_jud_2024_resp_hoja2');
		$hoja2 = $this->db->count_all_results();

		if($hoja2 == 1){
			$bandera = true;
		}else{
			$bandera = false;
		}
		return $bandera;
	}

	//Leer el estado del modo test del formulario
	public function hoja1($idusr)
	{
		$sql = "SELECT * "
			."FROM form_elecc_jud_2024_resp_hoja1 "
			."WHERE form_elecc_jud_2024_resp_hoja1.rel_id = ? "
			." "
			." "
			." "
			." "
			." ";
		$qry = $this->db->query($sql, [$idusr,]);
		return $qry->row();
	}

	public function hoja2($idusr)
	{
		$sql = "SELECT * "
			."FROM form_elecc_jud_2024_resp_hoja2 "
			."WHERE form_elecc_jud_2024_resp_hoja2.rel_id = ? "
			." "
			." "
			." "
			." "
			." ";
		$qry = $this->db->query($sql, [$idusr,]);
		return $qry->row();
	}

	//Insertar hojas
	public function insertarHoja1($datos){
		$data = array(
			'rel_id' => $datos->idusuario,
		);

		$this->db->insert('form_elecc_jud_2024_resp_hoja1', $data);
	}
	public function insertarHoja2($datos){
		$data = array(
			'rel_id' => $datos->idusuario,
		);

		$this->db->insert('form_elecc_jud_2024_resp_hoja2', $data);
	}

	//Eliminar hojas
	public function eliminarHoja1($idhoja1){
		$this->db->where('idfrhoja1', $idhoja1);
		$this->db->delete('form_elecc_jud_2024_resp_hoja1');

	}
	public function eliminarHoja2($idhoja2){
		$this->db->where('idfrhoja2', $idhoja2);
		$this->db->delete('form_elecc_jud_2024_resp_hoja2');

	}

	//Crear el formulario 1
	public function crearHoja1($idusuario){
		$data = array(
			'esta_abierto' => true,
			'esta_iniciado' => false,
			'rel_id' => $idusuario,
			'mesas' => '{"m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""}',
			'respuestas' => '{"p1":{"idpregunta":"1","codigo_pregunta":"p1","tipo":"6","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p1-mesa1","codigom2":"p1-mesa2","codigom3":"p1-mesa3","codigom4":"p1-mesa4","codigom5":"p1-mesa5","codigom6":"p1-mesa6","codigom7":"p1-mesa7","codigom8":"p1-mesa8","codigom9":"p1-mesa9","codigom10":"p1-mesa10","codigom11":"p1-mesa11","codigom12":"p1-mesa12"},"p2":{"idpregunta":"2","codigo_pregunta":"p2","tipo":"6","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p2-mesa1","codigom2":"p2-mesa2","codigom3":"p2-mesa3","codigom4":"p2-mesa4","codigom5":"p2-mesa5","codigom6":"p2-mesa6","codigom7":"p2-mesa7","codigom8":"p2-mesa8","codigom9":"p2-mesa9","codigom10":"p2-mesa10","codigom11":"p2-mesa11","codigom12":"p2-mesa12"},"p3":{"idpregunta":"3","codigo_pregunta":"p3","tipo":"10","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p3-mesa1","codigom2":"p3-mesa2","codigom3":"p3-mesa3","codigom4":"p3-mesa4","codigom5":"p3-mesa5","codigom6":"p3-mesa6","codigom7":"p3-mesa7","codigom8":"p3-mesa8","codigom9":"p3-mesa9","codigom10":"p3-mesa10","codigom11":"p3-mesa11","codigom12":"p3-mesa12"},"p3a":{"idpregunta":"4","codigo_pregunta":"p3a","tipo":"6","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p3a-mesa1","codigom2":"p3a-mesa2","codigom3":"p3a-mesa3","codigom4":"p3a-mesa4","codigom5":"p3a-mesa5","codigom6":"p3a-mesa6","codigom7":"p3a-mesa7","codigom8":"p3a-mesa8","codigom9":"p3a-mesa9","codigom10":"p3a-mesa10","codigom11":"p3a-mesa11","codigom12":"p3a-mesa12"},"p3b":{"idpregunta":"5","codigo_pregunta":"p3b","tipo":"6","ordinal":"5","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p3b-mesa1","codigom2":"p3b-mesa2","codigom3":"p3b-mesa3","codigom4":"p3b-mesa4","codigom5":"p3b-mesa5","codigom6":"p3b-mesa6","codigom7":"p3b-mesa7","codigom8":"p3b-mesa8","codigom9":"p3b-mesa9","codigom10":"p3b-mesa10","codigom11":"p3b-mesa11","codigom12":"p3b-mesa12"},"p3c":{"idpregunta":"6","codigo_pregunta":"p3c","tipo":"6","ordinal":"6","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p3c-mesa1","codigom2":"p3c-mesa2","codigom3":"p3c-mesa3","codigom4":"p3c-mesa4","codigom5":"p3c-mesa5","codigom6":"p3c-mesa6","codigom7":"p3c-mesa7","codigom8":"p3c-mesa8","codigom9":"p3c-mesa9","codigom10":"p3c-mesa10","codigom11":"p3c-mesa11","codigom12":"p3c-mesa12"},"p3d":{"idpregunta":"7","codigo_pregunta":"p3d","tipo":"6","ordinal":"7","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p3d-mesa1","codigom2":"p3d-mesa2","codigom3":"p3d-mesa3","codigom4":"p3d-mesa4","codigom5":"p3d-mesa5","codigom6":"p3d-mesa6","codigom7":"p3d-mesa7","codigom8":"p3d-mesa8","codigom9":"p3d-mesa9","codigom10":"p3d-mesa10","codigom11":"p3d-mesa11","codigom12":"p3d-mesa12"},"p3e":{"idpregunta":"8","codigo_pregunta":"p3e","tipo":"6","ordinal":"8","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p3e-mesa1","codigom2":"p3e-mesa2","codigom3":"p3e-mesa3","codigom4":"p3e-mesa4","codigom5":"p3e-mesa5","codigom6":"p3e-mesa6","codigom7":"p3e-mesa7","codigom8":"p3e-mesa8","codigom9":"p3e-mesa9","codigom10":"p3e-mesa10","codigom11":"p3e-mesa11","codigom12":"p3e-mesa12"},"p3f":{"idpregunta":"9","codigo_pregunta":"p3f","tipo":"6","ordinal":"9","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p3f-mesa1","codigom2":"p3f-mesa2","codigom3":"p3f-mesa3","codigom4":"p3f-mesa4","codigom5":"p3f-mesa5","codigom6":"p3f-mesa6","codigom7":"p3f-mesa7","codigom8":"p3f-mesa8","codigom9":"p3f-mesa9","codigom10":"p3f-mesa10","codigom11":"p3f-mesa11","codigom12":"p3f-mesa12"},"p3g":{"idpregunta":"10","codigo_pregunta":"p3g","tipo":"6","ordinal":"10","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p3g-mesa1","codigom2":"p3g-mesa2","codigom3":"p3g-mesa3","codigom4":"p3g-mesa4","codigom5":"p3g-mesa5","codigom6":"p3g-mesa6","codigom7":"p3g-mesa7","codigom8":"p3g-mesa8","codigom9":"p3g-mesa9","codigom10":"p3g-mesa10","codigom11":"p3g-mesa11","codigom12":"p3g-mesa12"},"p4":{"idpregunta":"11","codigo_pregunta":"p4","tipo":"9","ordinal":"11","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p4-mesa1","codigom2":"p4-mesa2","codigom3":"p4-mesa3","codigom4":"p4-mesa4","codigom5":"p4-mesa5","codigom6":"p4-mesa6","codigom7":"p4-mesa7","codigom8":"p4-mesa8","codigom9":"p4-mesa9","codigom10":"p4-mesa10","codigom11":"p4-mesa11","codigom12":"p4-mesa12"},"p5":{"idpregunta":"12","codigo_pregunta":"p5","tipo":"6","ordinal":"12","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p5-mesa1","codigom2":"p5-mesa2","codigom3":"p5-mesa3","codigom4":"p5-mesa4","codigom5":"p5-mesa5","codigom6":"p5-mesa6","codigom7":"p5-mesa7","codigom8":"p5-mesa8","codigom9":"p5-mesa9","codigom10":"p5-mesa10","codigom11":"p5-mesa11","codigom12":"p5-mesa12"},"p6":{"idpregunta":"13","codigo_pregunta":"p6","tipo":"9","ordinal":"13","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p6-mesa1","codigom2":"p6-mesa2","codigom3":"p6-mesa3","codigom4":"p6-mesa4","codigom5":"p6-mesa5","codigom6":"p6-mesa6","codigom7":"p6-mesa7","codigom8":"p6-mesa8","codigom9":"p6-mesa9","codigom10":"p6-mesa10","codigom11":"p6-mesa11","codigom12":"p6-mesa12"},"p7":{"idpregunta":"14","codigo_pregunta":"p7","tipo":"6","ordinal":"14","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p7-mesa1","codigom2":"p7-mesa2","codigom3":"p7-mesa3","codigom4":"p7-mesa4","codigom5":"p7-mesa5","codigom6":"p7-mesa6","codigom7":"p7-mesa7","codigom8":"p7-mesa8","codigom9":"p7-mesa9","codigom10":"p7-mesa10","codigom11":"p7-mesa11","codigom12":"p7-mesa12"},"p8":{"idpregunta":"15","codigo_pregunta":"p8","tipo":"9","ordinal":"15","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p8-mesa1","codigom2":"p8-mesa2","codigom3":"p8-mesa3","codigom4":"p8-mesa4","codigom5":"p8-mesa5","codigom6":"p8-mesa6","codigom7":"p8-mesa7","codigom8":"p8-mesa8","codigom9":"p8-mesa9","codigom10":"p8-mesa10","codigom11":"p8-mesa11","codigom12":"p8-mesa12"},"p9":{"idpregunta":"16","codigo_pregunta":"p9","tipo":"6","ordinal":"16","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p9-mesa1","codigom2":"p9-mesa2","codigom3":"p9-mesa3","codigom4":"p9-mesa4","codigom5":"p9-mesa5","codigom6":"p9-mesa6","codigom7":"p9-mesa7","codigom8":"p9-mesa8","codigom9":"p9-mesa9","codigom10":"p9-mesa10","codigom11":"p9-mesa11","codigom12":"p9-mesa12"},"p10":{"idpregunta":"17","codigo_pregunta":"p10","tipo":"11","ordinal":"18","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p10-mesa1","codigom2":"p10-mesa2","codigom3":"p10-mesa3","codigom4":"p10-mesa4","codigom5":"p10-mesa5","codigom6":"p10-mesa6","codigom7":"p10-mesa7","codigom8":"p10-mesa8","codigom9":"p10-mesa9","codigom10":"p10-mesa10","codigom11":"p10-mesa11","codigom12":"p10-mesa12"},"p11":{"idpregunta":"18","codigo_pregunta":"p11","tipo":"6","ordinal":"19","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p11-mesa1","codigom2":"p11-mesa2","codigom3":"p11-mesa3","codigom4":"p11-mesa4","codigom5":"p11-mesa5","codigom6":"p11-mesa6","codigom7":"p11-mesa7","codigom8":"p11-mesa8","codigom9":"p11-mesa9","codigom10":"p11-mesa10","codigom11":"p11-mesa11","codigom12":"p11-mesa12"},"p12":{"idpregunta":"19","codigo_pregunta":"p12","tipo":"5","ordinal":"20","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":"","codigom1":"p12-mesa1","codigom2":"p12-mesa2","codigom3":"p12-mesa3","codigom4":"p12-mesa4","codigom5":"p12-mesa5","codigom6":"p12-mesa6","codigom7":"p12-mesa7","codigom8":"p12-mesa8","codigom9":"p12-mesa9","codigom10":"p12-mesa10","codigom11":"p12-mesa11","codigom12":"p12-mesa12"}}',
		);
		if($this->db->insert('form_elecc_jud_2024_resp_hoja1', $data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	//Crear el formulario 2
	public function crearHoja2($idusuario){
		$data = array(
			'esta_abierto' => true,
			'esta_iniciado' => false,
			'rel_id' => $idusuario,
			'mesas' => '{"m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""}',
			'respuestas' => '{"p1":{"idpregunta":"20","codigo_pregunta":"p1","tipo":"11","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p1-mesa1","codigom2":"p1-mesa2","codigom3":"p1-mesa3","codigom4":"p1-mesa4"},"p2":{"idpregunta":"21","codigo_pregunta":"p2","tipo":"6","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p2-mesa1","codigom2":"p2-mesa2","codigom3":"p2-mesa3","codigom4":"p2-mesa4"},"p3":{"idpregunta":"22","codigo_pregunta":"p3","tipo":"8","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p3-mesa1","codigom2":"p3-mesa2","codigom3":"p3-mesa3","codigom4":"p3-mesa4"},"p4":{"idpregunta":"23","codigo_pregunta":"p4","tipo":"8","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p4-mesa1","codigom2":"p4-mesa2","codigom3":"p4-mesa3","codigom4":"p4-mesa4"},"p5":{"idpregunta":"24","codigo_pregunta":"p5","tipo":"6","ordinal":"5","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p5-mesa1","codigom2":"p5-mesa2","codigom3":"p5-mesa3","codigom4":"p5-mesa4"},"p6":{"idpregunta":"25","codigo_pregunta":"p6","tipo":"6","ordinal":"6","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p6-mesa1","codigom2":"p6-mesa2","codigom3":"p6-mesa3","codigom4":"p6-mesa4"},"p7":{"idpregunta":"26","codigo_pregunta":"p7","tipo":"6","ordinal":"7","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p7-mesa1","codigom2":"p7-mesa2","codigom3":"p7-mesa3","codigom4":"p7-mesa4"},"p8":{"idpregunta":"27","codigo_pregunta":"p8","tipo":"6","ordinal":"8","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p8-mesa1","codigom2":"p8-mesa2","codigom3":"p8-mesa3","codigom4":"p8-mesa4"},"p9":{"idpregunta":"28","codigo_pregunta":"p9","tipo":"6","ordinal":"9","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p9-mesa1","codigom2":"p9-mesa2","codigom3":"p9-mesa3","codigom4":"p9-mesa4"},"p10":{"idpregunta":"29","codigo_pregunta":"p10","tipo":"6","ordinal":"10","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p10-mesa1","codigom2":"p10-mesa2","codigom3":"p10-mesa3","codigom4":"p10-mesa4"},"p11":{"idpregunta":"30","codigo_pregunta":"p11","tipo":"6","ordinal":"11","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p11-mesa1","codigom2":"p11-mesa2","codigom3":"p11-mesa3","codigom4":"p11-mesa4"},"p12":{"idpregunta":"31","codigo_pregunta":"p12","tipo":"6","ordinal":"12","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p12-mesa1","codigom2":"p12-mesa2","codigom3":"p12-mesa3","codigom4":"p12-mesa4"},"p13":{"idpregunta":"32","codigo_pregunta":"p13","tipo":"6","ordinal":"13","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p13-mesa1","codigom2":"p13-mesa2","codigom3":"p13-mesa3","codigom4":"p13-mesa4"},"p14":{"idpregunta":"33","codigo_pregunta":"p14","tipo":"6","ordinal":"1","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p14-mesa1","codigom2":"p14-mesa2","codigom3":"p14-mesa3","codigom4":"p14-mesa4"},"p15":{"idpregunta":"34","codigo_pregunta":"p15","tipo":"6","ordinal":"2","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p15-mesa1","codigom2":"p15-mesa2","codigom3":"p15-mesa3","codigom4":"p15-mesa4"},"p16":{"idpregunta":"35","codigo_pregunta":"p16","tipo":"10","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p16-mesa1","codigom2":"p16-mesa2","codigom3":"p16-mesa3","codigom4":"p16-mesa4"},"p16a":{"idpregunta":"36","codigo_pregunta":"p16a","tipo":"6","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p16a-mesa1","codigom2":"p16a-mesa2","codigom3":"p16a-mesa3","codigom4":"p16a-mesa4"},"p16b":{"idpregunta":"37","codigo_pregunta":"p16b","tipo":"6","ordinal":"5","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p16b-mesa1","codigom2":"p16b-mesa2","codigom3":"p16b-mesa3","codigom4":"p16b-mesa4"},"p16c":{"idpregunta":"38","codigo_pregunta":"p16c","tipo":"6","ordinal":"6","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p16c-mesa1","codigom2":"p16c-mesa2","codigom3":"p16c-mesa3","codigom4":"p16c-mesa4"},"p16d":{"idpregunta":"39","codigo_pregunta":"p16d","tipo":"6","ordinal":"7","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p16d-mesa1","codigom2":"p16d-mesa2","codigom3":"p16d-mesa3","codigom4":"p16d-mesa4"},"p16e":{"idpregunta":"40","codigo_pregunta":"p16e","tipo":"6","ordinal":"8","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p16e-mesa1","codigom2":"p16e-mesa2","codigom3":"p16e-mesa3","codigom4":"p16e-mesa4"},"p16f":{"idpregunta":"41","codigo_pregunta":"p16f","tipo":"6","ordinal":"9","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p16f-mesa1","codigom2":"p16f-mesa2","codigom3":"p16f-mesa3","codigom4":"p16f-mesa4"},"p17":{"idpregunta":"42","codigo_pregunta":"p17","tipo":"6","ordinal":"10","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p17-mesa1","codigom2":"p17-mesa2","codigom3":"p17-mesa3","codigom4":"p17-mesa4"},"p18":{"idpregunta":"43","codigo_pregunta":"p18","tipo":"6","ordinal":"11","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p18-mesa1","codigom2":"p18-mesa2","codigom3":"p18-mesa3","codigom4":"p18-mesa4"},"p19":{"idpregunta":"44","codigo_pregunta":"p19","tipo":"6","ordinal":"12","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p19-mesa1","codigom2":"p19-mesa2","codigom3":"p19-mesa3","codigom4":"p19-mesa4"},"p20":{"idpregunta":"45","codigo_pregunta":"p20","tipo":"6","ordinal":"13","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p20-mesa1","codigom2":"p20-mesa2","codigom3":"p20-mesa3","codigom4":"p20-mesa4"},"p21":{"idpregunta":"46","codigo_pregunta":"p21","tipo":"6","ordinal":"14","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p21-mesa1","codigom2":"p21-mesa2","codigom3":"p21-mesa3","codigom4":"p21-mesa4"},"p22":{"idpregunta":"47","codigo_pregunta":"p22","tipo":"6","ordinal":"15","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p22-mesa1","codigom2":"p22-mesa2","codigom3":"p22-mesa3","codigom4":"p22-mesa4"},"p23":{"idpregunta":"48","codigo_pregunta":"p23","tipo":"6","ordinal":"16","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p23-mesa1","codigom2":"p23-mesa2","codigom3":"p23-mesa3","codigom4":"p23-mesa4"},"p24":{"idpregunta":"49","codigo_pregunta":"p24","tipo":"6","ordinal":"17","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p24-mesa1","codigom2":"p24-mesa2","codigom3":"p24-mesa3","codigom4":"p24-mesa4"},"p25":{"idpregunta":"50","codigo_pregunta":"p25","tipo":"6","ordinal":"18","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p25-mesa1","codigom2":"p25-mesa2","codigom3":"p25-mesa3","codigom4":"p25-mesa4"},"p26":{"idpregunta":"51","codigo_pregunta":"p26","tipo":"6","ordinal":"19","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p26-mesa1","codigom2":"p26-mesa2","codigom3":"p26-mesa3","codigom4":"p26-mesa4"},"p27":{"idpregunta":"52","codigo_pregunta":"p27","tipo":"6","ordinal":"20","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p27-mesa1","codigom2":"p27-mesa2","codigom3":"p27-mesa3","codigom4":"p27-mesa4"},"p28":{"idpregunta":"53","codigo_pregunta":"p28","tipo":"6","ordinal":"21","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p28-mesa1","codigom2":"p28-mesa2","codigom3":"p28-mesa3","codigom4":"p28-mesa4"},"p29":{"idpregunta":"54","codigo_pregunta":"p29","tipo":"6","ordinal":"22","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p29-mesa1","codigom2":"p29-mesa2","codigom3":"p29-mesa3","codigom4":"p29-mesa4"},"p30":{"idpregunta":"55","codigo_pregunta":"p30","tipo":"10","ordinal":"23","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p30-mesa1","codigom2":"p30-mesa2","codigom3":"p30-mesa3","codigom4":"p30-mesa4"},"p30a":{"idpregunta":"56","codigo_pregunta":"p30a","tipo":"6","ordinal":"24","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p30a-mesa1","codigom2":"p30a-mesa2","codigom3":"p30a-mesa3","codigom4":"p30a-mesa4"},"p30b":{"idpregunta":"57","codigo_pregunta":"p30b","tipo":"6","ordinal":"25","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p30b-mesa1","codigom2":"p30b-mesa2","codigom3":"p30b-mesa3","codigom4":"p30b-mesa4"},"p30c":{"idpregunta":"58","codigo_pregunta":"p30c","tipo":"6","ordinal":"26","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p30c-mesa1","codigom2":"p30c-mesa2","codigom3":"p30c-mesa3","codigom4":"p30c-mesa4"},"p30d":{"idpregunta":"59","codigo_pregunta":"p30d","tipo":"6","ordinal":"27","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p30d-mesa1","codigom2":"p30d-mesa2","codigom3":"p30d-mesa3","codigom4":"p30d-mesa4"},"p31":{"idpregunta":"60","codigo_pregunta":"p31","tipo":"6","ordinal":"28","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p31-mesa1","codigom2":"p31-mesa2","codigom3":"p31-mesa3","codigom4":"p31-mesa4"},"p32":{"idpregunta":"61","codigo_pregunta":"p32","tipo":"10","ordinal":"29","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p32-mesa1","codigom2":"p32-mesa2","codigom3":"p32-mesa3","codigom4":"p32-mesa4"},"p32a":{"idpregunta":"62","codigo_pregunta":"p32a","tipo":"6","ordinal":"30","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p32a-mesa1","codigom2":"p32a-mesa2","codigom3":"p32a-mesa3","codigom4":"p32a-mesa4"},"p33":{"idpregunta":"63","codigo_pregunta":"p33","tipo":"6","ordinal":"31","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p33-mesa1","codigom2":"p33-mesa2","codigom3":"p33-mesa3","codigom4":"p33-mesa4"},"p34":{"idpregunta":"64","codigo_pregunta":"p34","tipo":"10","ordinal":"32","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p34-mesa1","codigom2":"p34-mesa2","codigom3":"p34-mesa3","codigom4":"p34-mesa4"},"p34a":{"idpregunta":"65","codigo_pregunta":"p34a","tipo":"6","ordinal":"33","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p34a-mesa1","codigom2":"p34a-mesa2","codigom3":"p34a-mesa3","codigom4":"p34a-mesa4"},"p34b":{"idpregunta":"66","codigo_pregunta":"p34b","tipo":"6","ordinal":"34","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p34b-mesa1","codigom2":"p34b-mesa2","codigom3":"p34b-mesa3","codigom4":"p34b-mesa4"},"p34c":{"idpregunta":"67","codigo_pregunta":"p34c","tipo":"6","ordinal":"35","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p34c-mesa1","codigom2":"p34c-mesa2","codigom3":"p34c-mesa3","codigom4":"p34c-mesa4"},"p35":{"idpregunta":"68","codigo_pregunta":"p35","tipo":"6","ordinal":"36","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p35-mesa1","codigom2":"p35-mesa2","codigom3":"p35-mesa3","codigom4":"p35-mesa4"},"p36":{"idpregunta":"69","codigo_pregunta":"p36","tipo":"6","ordinal":"37","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p36-mesa1","codigom2":"p36-mesa2","codigom3":"p36-mesa3","codigom4":"p36-mesa4"},"p37":{"idpregunta":"70","codigo_pregunta":"p37","tipo":"6","ordinal":"38","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p37-mesa1","codigom2":"p37-mesa2","codigom3":"p37-mesa3","codigom4":"p37-mesa4"},"p38":{"idpregunta":"71","codigo_pregunta":"p38","tipo":"6","ordinal":"39","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p38-mesa1","codigom2":"p38-mesa2","codigom3":"p38-mesa3","codigom4":"p38-mesa4"},"p39":{"idpregunta":"72","codigo_pregunta":"p39","tipo":"6","ordinal":"40","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p39-mesa1","codigom2":"p39-mesa2","codigom3":"p39-mesa3","codigom4":"p39-mesa4"},"p40":{"idpregunta":"73","codigo_pregunta":"p40","tipo":"6","ordinal":"41","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p40-mesa1","codigom2":"p40-mesa2","codigom3":"p40-mesa3","codigom4":"p40-mesa4"},"p41":{"idpregunta":"74","codigo_pregunta":"p41","tipo":"6","ordinal":"42","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p41-mesa1","codigom2":"p41-mesa2","codigom3":"p41-mesa3","codigom4":"p41-mesa4"},"p42":{"idpregunta":"75","codigo_pregunta":"p42","tipo":"6","ordinal":"43","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p42-mesa1","codigom2":"p42-mesa2","codigom3":"p42-mesa3","codigom4":"p42-mesa4"},"p43":{"idpregunta":"76","codigo_pregunta":"p43","tipo":"6","ordinal":"44","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p43-mesa1","codigom2":"p43-mesa2","codigom3":"p43-mesa3","codigom4":"p43-mesa4"},"p44":{"idpregunta":"77","codigo_pregunta":"p44","tipo":"6","ordinal":"45","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p44-mesa1","codigom2":"p44-mesa2","codigom3":"p44-mesa3","codigom4":"p44-mesa4"},"p45":{"idpregunta":"78","codigo_pregunta":"p45","tipo":"6","ordinal":"46","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p45-mesa1","codigom2":"p45-mesa2","codigom3":"p45-mesa3","codigom4":"p45-mesa4"},"p46":{"idpregunta":"79","codigo_pregunta":"p46","tipo":"10","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p46-mesa1","codigom2":"p46-mesa2","codigom3":"p46-mesa3","codigom4":"p46-mesa4"},"p46a":{"idpregunta":"80","codigo_pregunta":"p46a","tipo":"1","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p46a-mesa1","codigom2":"p46a-mesa2","codigom3":"p46a-mesa3","codigom4":"p46a-mesa4"},"p46b":{"idpregunta":"81","codigo_pregunta":"p46b","tipo":"1","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p46b-mesa1","codigom2":"p46b-mesa2","codigom3":"p46b-mesa3","codigom4":"p46b-mesa4"},"p46c":{"idpregunta":"82","codigo_pregunta":"p46c","tipo":"1","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p46c-mesa1","codigom2":"p46c-mesa2","codigom3":"p46c-mesa3","codigom4":"p46c-mesa4"},"p47":{"idpregunta":"83","codigo_pregunta":"p47","tipo":"12","ordinal":"5","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p47-mesa1","codigom2":"p47-mesa2","codigom3":"p47-mesa3","codigom4":"p47-mesa4"},"p48":{"idpregunta":"84","codigo_pregunta":"p48","tipo":"2","ordinal":"6","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p48-mesa1","codigom2":"p48-mesa2","codigom3":"p48-mesa3","codigom4":"p48-mesa4"},"p49":{"idpregunta":"85","codigo_pregunta":"p49","tipo":"2","ordinal":"7","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p49-mesa1","codigom2":"p49-mesa2","codigom3":"p49-mesa3","codigom4":"p49-mesa4"},"p50":{"idpregunta":"86","codigo_pregunta":"p50","tipo":"2","ordinal":"8","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p50-mesa1","codigom2":"p50-mesa2","codigom3":"p50-mesa3","codigom4":"p50-mesa4"},"p51":{"idpregunta":"87","codigo_pregunta":"p51","tipo":"2","ordinal":"9","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p51-mesa1","codigom2":"p51-mesa2","codigom3":"p51-mesa3","codigom4":"p51-mesa4"},"p52":{"idpregunta":"88","codigo_pregunta":"p52","tipo":"1","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p52-mesa1","codigom2":"p52-mesa2","codigom3":"p52-mesa3","codigom4":"p52-mesa4"},"p53":{"idpregunta":"89","codigo_pregunta":"p53","tipo":"1","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p53-mesa1","codigom2":"p53-mesa2","codigom3":"p53-mesa3","codigom4":"p53-mesa4"},"p54":{"idpregunta":"90","codigo_pregunta":"p54","tipo":"1","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p54-mesa1","codigom2":"p54-mesa2","codigom3":"p54-mesa3","codigom4":"p54-mesa4"},"p55":{"idpregunta":"91","codigo_pregunta":"p55","tipo":"1","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p55-mesa1","codigom2":"p55-mesa2","codigom3":"p55-mesa3","codigom4":"p55-mesa4"},"p56":{"idpregunta":"92","codigo_pregunta":"p56","tipo":"1","ordinal":"5","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p56-mesa1","codigom2":"p56-mesa2","codigom3":"p56-mesa3","codigom4":"p56-mesa4"},"p57":{"idpregunta":"93","codigo_pregunta":"p57","tipo":"1","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p57-mesa1","codigom2":"p57-mesa2","codigom3":"p57-mesa3","codigom4":"p57-mesa4"},"p58":{"idpregunta":"94","codigo_pregunta":"p58","tipo":"1","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p58-mesa1","codigom2":"p58-mesa2","codigom3":"p58-mesa3","codigom4":"p58-mesa4"},"p59":{"idpregunta":"95","codigo_pregunta":"p59","tipo":"1","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p59-mesa1","codigom2":"p59-mesa2","codigom3":"p59-mesa3","codigom4":"p59-mesa4"},"p60":{"idpregunta":"96","codigo_pregunta":"p60","tipo":"1","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p60-mesa1","codigom2":"p60-mesa2","codigom3":"p60-mesa3","codigom4":"p60-mesa4"},"p61":{"idpregunta":"97","codigo_pregunta":"p61","tipo":"1","ordinal":"5","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p61-mesa1","codigom2":"p61-mesa2","codigom3":"p61-mesa3","codigom4":"p61-mesa4"},"p62":{"idpregunta":"98","codigo_pregunta":"p62","tipo":"3","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p62-mesa1","codigom2":"p62-mesa2","codigom3":"p62-mesa3","codigom4":"p62-mesa4"},"p63":{"idpregunta":"99","codigo_pregunta":"p63","tipo":"3","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p63-mesa1","codigom2":"p63-mesa2","codigom3":"p63-mesa3","codigom4":"p63-mesa4"},"p64":{"idpregunta":"100","codigo_pregunta":"p64","tipo":"3","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p64-mesa1","codigom2":"p64-mesa2","codigom3":"p64-mesa3","codigom4":"p64-mesa4"},"p65":{"idpregunta":"101","codigo_pregunta":"p65","tipo":"5","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","codigom1":"p65-mesa1","codigom2":"p65-mesa2","codigom3":"p65-mesa3","codigom4":"p65-mesa4"}}',

		);
		if($this->db->insert('form_elecc_jud_2024_resp_hoja2 ', $data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	//Extraer recintos electorales por municipio
	public function recintoPorMunicipio($idmunicipio){
		$sql = "SELECT * "
			."FROM recinto_electoral  "
			."WHERE recinto_electoral.rel_idmun = ? "
			." "
			." "
			."  "
			." "
			." ";
		$qry = $this->db->query($sql, [$idmunicipio, ]);
		return $qry->result();
	}

	//Actualizar los datos de la hoja1
	public function actualizarSgralH1($hoja)
	{
		/** @noinspection PhpLanguageLevelInspection */
		$data = [
			'esta_iniciado' => $hoja->esta_iniciado,
			'rel_id' => $hoja->rel_id,
			'mesas' => $hoja->mesas,
			'rel_idrecinto' => $hoja->rel_idrecinto,
			'rel_idmunicipio' => $hoja->rel_idmunicipio,
			'rel_iddepartamento' => $hoja->rel_iddepartamento,
		];
		$this->db->where('idfrhoja1', $hoja->idfrhoja1 );
		$this->db->update('form_elecc_jud_2024_resp_hoja1', $data);
	}

	//Actualizar los datos de la hoja1
	public function actualizarSgralH2($hoja)
	{
		/** @noinspection PhpLanguageLevelInspection */
		$data = [
			'esta_iniciado' => $hoja->esta_iniciado,
			'rel_id' => $hoja->rel_id,
			'mesas' => $hoja->mesas,
			'rel_idrecinto' => $hoja->rel_idrecinto,
			'rel_idmunicipio' => $hoja->rel_idmunicipio,
			'rel_iddepartamento' => $hoja->rel_iddepartamento,
		];
		$this->db->where('idfrhoja2', $hoja->idfrhoja2 );
		$this->db->update('form_elecc_jud_2024_resp_hoja2', $data);

	}

	//Actualizar los datos de la hoja1
	public function cerrarHoja1($idhoja1)
	{
		/** @noinspection PhpLanguageLevelInspection */
		$data = [
			'esta_abierto' => false,
		];
		$this->db->where('idfrhoja1', $idhoja1 );
		$this->db->update('form_elecc_jud_2024_resp_hoja1', $data);
	}

	//Actualizar los datos de la hoja1
	public function cerrarHoja2($idhoja2)
	{
		/** @noinspection PhpLanguageLevelInspection */
		$data = [
			'esta_abierto' => false,
		];
		$this->db->where('idfrhoja2', $idhoja2 );
		$this->db->update('form_elecc_jud_2024_resp_hoja2', $data);
	}
















}
