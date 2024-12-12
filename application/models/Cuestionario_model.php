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
			'esta_iniciado' => false,
			'rel_id' => $idusuario,
			'mesas' => '{"m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""}',
			'respuestas' => '{"p1":{"idpregunta":"1","codigo_pregunta":"p1","tipo":"6","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p2":{"idpregunta":"2","codigo_pregunta":"p2","tipo":"6","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p3":{"idpregunta":"3","codigo_pregunta":"p3","tipo":"10","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p3a":{"idpregunta":"4","codigo_pregunta":"p3a","tipo":"6","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p3b":{"idpregunta":"5","codigo_pregunta":"p3b","tipo":"6","ordinal":"5","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p3c":{"idpregunta":"6","codigo_pregunta":"p3c","tipo":"6","ordinal":"6","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p3d":{"idpregunta":"7","codigo_pregunta":"p3d","tipo":"6","ordinal":"7","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p3e":{"idpregunta":"8","codigo_pregunta":"p3e","tipo":"6","ordinal":"8","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p3f":{"idpregunta":"9","codigo_pregunta":"p3f","tipo":"6","ordinal":"9","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p3g":{"idpregunta":"10","codigo_pregunta":"p3g","tipo":"6","ordinal":"10","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p4":{"idpregunta":"11","codigo_pregunta":"p4","tipo":"9","ordinal":"11","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p5":{"idpregunta":"12","codigo_pregunta":"p5","tipo":"6","ordinal":"12","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p6":{"idpregunta":"13","codigo_pregunta":"p6","tipo":"9","ordinal":"13","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p7":{"idpregunta":"14","codigo_pregunta":"p7","tipo":"6","ordinal":"14","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p8":{"idpregunta":"15","codigo_pregunta":"p8","tipo":"9","ordinal":"15","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p9":{"idpregunta":"16","codigo_pregunta":"p9","tipo":"6","ordinal":"16","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p10":{"idpregunta":"17","codigo_pregunta":"p10","tipo":"11","ordinal":"18","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p11":{"idpregunta":"18","codigo_pregunta":"p11","tipo":"6","ordinal":"19","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""},"p12":{"idpregunta":"19","codigo_pregunta":"p12","tipo":"5","ordinal":"20","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""}}',
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
			'esta_iniciado' => false,
			'rel_id' => $idusuario,
			'mesas' => '{"m1":"","m2":"","m3":"","m4":"","m5":"","m6":"","m7":"","m8":"","m9":"","m10":"","m11":"","m12":""}',
			'respuestas' => '{"p1":{"idpregunta":"20","codigo_pregunta":"p1","tipo":"11","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p2":{"idpregunta":"21","codigo_pregunta":"p2","tipo":"6","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p3":{"idpregunta":"22","codigo_pregunta":"p3","tipo":"8","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p4":{"idpregunta":"23","codigo_pregunta":"p4","tipo":"8","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p5":{"idpregunta":"24","codigo_pregunta":"p5","tipo":"6","ordinal":"5","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p6":{"idpregunta":"25","codigo_pregunta":"p6","tipo":"6","ordinal":"6","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p7":{"idpregunta":"26","codigo_pregunta":"p7","tipo":"6","ordinal":"7","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p8":{"idpregunta":"27","codigo_pregunta":"p8","tipo":"6","ordinal":"8","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p9":{"idpregunta":"28","codigo_pregunta":"p9","tipo":"6","ordinal":"9","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p10":{"idpregunta":"29","codigo_pregunta":"p10","tipo":"6","ordinal":"10","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p11":{"idpregunta":"30","codigo_pregunta":"p11","tipo":"6","ordinal":"11","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p12":{"idpregunta":"31","codigo_pregunta":"p12","tipo":"6","ordinal":"12","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p13":{"idpregunta":"32","codigo_pregunta":"p13","tipo":"6","ordinal":"13","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p14":{"idpregunta":"33","codigo_pregunta":"p14","tipo":"6","ordinal":"14","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p15":{"idpregunta":"34","codigo_pregunta":"p15","tipo":"6","ordinal":"1","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p16":{"idpregunta":"35","codigo_pregunta":"p16","tipo":"6","ordinal":"2","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p17":{"idpregunta":"36","codigo_pregunta":"p17","tipo":"10","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p17a":{"idpregunta":"37","codigo_pregunta":"p17a","tipo":"6","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p17b":{"idpregunta":"38","codigo_pregunta":"p17b","tipo":"6","ordinal":"5","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p17c":{"idpregunta":"39","codigo_pregunta":"p17c","tipo":"6","ordinal":"6","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p17d":{"idpregunta":"40","codigo_pregunta":"p17d","tipo":"6","ordinal":"7","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p17e":{"idpregunta":"41","codigo_pregunta":"p17e","tipo":"6","ordinal":"8","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p17f":{"idpregunta":"42","codigo_pregunta":"p17f","tipo":"6","ordinal":"9","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p18":{"idpregunta":"43","codigo_pregunta":"p18","tipo":"6","ordinal":"10","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p19":{"idpregunta":"44","codigo_pregunta":"p19","tipo":"6","ordinal":"11","alternativa":"1","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p20":{"idpregunta":"45","codigo_pregunta":"p20","tipo":"6","ordinal":"12","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p21":{"idpregunta":"46","codigo_pregunta":"p21","tipo":"6","ordinal":"13","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p22":{"idpregunta":"47","codigo_pregunta":"p22","tipo":"6","ordinal":"14","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p23":{"idpregunta":"48","codigo_pregunta":"p23","tipo":"6","ordinal":"15","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p24":{"idpregunta":"49","codigo_pregunta":"p24","tipo":"6","ordinal":"16","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p25":{"idpregunta":"50","codigo_pregunta":"p25","tipo":"6","ordinal":"17","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p26":{"idpregunta":"51","codigo_pregunta":"p26","tipo":"6","ordinal":"18","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p27":{"idpregunta":"52","codigo_pregunta":"p27","tipo":"6","ordinal":"19","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p28":{"idpregunta":"53","codigo_pregunta":"p28","tipo":"6","ordinal":"20","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p29":{"idpregunta":"54","codigo_pregunta":"p29","tipo":"6","ordinal":"21","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p30":{"idpregunta":"55","codigo_pregunta":"p30","tipo":"6","ordinal":"22","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p31":{"idpregunta":"56","codigo_pregunta":"p31","tipo":"10","ordinal":"23","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p31a":{"idpregunta":"57","codigo_pregunta":"p31a","tipo":"6","ordinal":"24","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p31b":{"idpregunta":"58","codigo_pregunta":"p31b","tipo":"6","ordinal":"25","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p31c":{"idpregunta":"59","codigo_pregunta":"p31c","tipo":"6","ordinal":"26","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p31d":{"idpregunta":"60","codigo_pregunta":"p31d","tipo":"6","ordinal":"27","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p32":{"idpregunta":"61","codigo_pregunta":"p32","tipo":"6","ordinal":"28","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p33":{"idpregunta":"62","codigo_pregunta":"p33","tipo":"10","ordinal":"29","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p33a":{"idpregunta":"63","codigo_pregunta":"p33a","tipo":"6","ordinal":"30","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p34":{"idpregunta":"64","codigo_pregunta":"p34","tipo":"6","ordinal":"31","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p35":{"idpregunta":"65","codigo_pregunta":"p35","tipo":"10","ordinal":"32","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p35a":{"idpregunta":"66","codigo_pregunta":"p35a","tipo":"6","ordinal":"33","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p35b":{"idpregunta":"67","codigo_pregunta":"p35b","tipo":"6","ordinal":"34","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p35c":{"idpregunta":"68","codigo_pregunta":"p35c","tipo":"6","ordinal":"35","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p36":{"idpregunta":"69","codigo_pregunta":"p36","tipo":"6","ordinal":"36","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p37":{"idpregunta":"70","codigo_pregunta":"p37","tipo":"6","ordinal":"37","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p38":{"idpregunta":"71","codigo_pregunta":"p38","tipo":"6","ordinal":"38","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p39":{"idpregunta":"72","codigo_pregunta":"p39","tipo":"6","ordinal":"39","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p40":{"idpregunta":"73","codigo_pregunta":"p40","tipo":"6","ordinal":"40","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p41":{"idpregunta":"74","codigo_pregunta":"p41","tipo":"6","ordinal":"41","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p42":{"idpregunta":"75","codigo_pregunta":"p42","tipo":"6","ordinal":"42","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p43":{"idpregunta":"76","codigo_pregunta":"p43","tipo":"6","ordinal":"43","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p44":{"idpregunta":"77","codigo_pregunta":"p44","tipo":"6","ordinal":"44","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p45":{"idpregunta":"78","codigo_pregunta":"p45","tipo":"6","ordinal":"45","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p46":{"idpregunta":"79","codigo_pregunta":"p46","tipo":"6","ordinal":"46","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p47":{"idpregunta":"80","codigo_pregunta":"p47","tipo":"10","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p47a":{"idpregunta":"81","codigo_pregunta":"p47a","tipo":"1","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p47b":{"idpregunta":"82","codigo_pregunta":"p47b","tipo":"1","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p47c":{"idpregunta":"83","codigo_pregunta":"p47c","tipo":"1","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p48":{"idpregunta":"84","codigo_pregunta":"p48","tipo":"12","ordinal":"5","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p49":{"idpregunta":"85","codigo_pregunta":"p49","tipo":"2","ordinal":"6","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p50":{"idpregunta":"86","codigo_pregunta":"p50","tipo":"2","ordinal":"7","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p51":{"idpregunta":"87","codigo_pregunta":"p51","tipo":"2","ordinal":"8","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p52":{"idpregunta":"88","codigo_pregunta":"p52","tipo":"2","ordinal":"9","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p53":{"idpregunta":"89","codigo_pregunta":"p53","tipo":"1","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p54":{"idpregunta":"90","codigo_pregunta":"p54","tipo":"1","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p55":{"idpregunta":"91","codigo_pregunta":"p55","tipo":"1","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p56":{"idpregunta":"92","codigo_pregunta":"p56","tipo":"1","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p57":{"idpregunta":"93","codigo_pregunta":"p57","tipo":"1","ordinal":"5","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p58":{"idpregunta":"94","codigo_pregunta":"p58","tipo":"1","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p59":{"idpregunta":"95","codigo_pregunta":"p59","tipo":"1","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p60":{"idpregunta":"96","codigo_pregunta":"p60","tipo":"1","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p61":{"idpregunta":"97","codigo_pregunta":"p61","tipo":"1","ordinal":"4","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p62":{"idpregunta":"98","codigo_pregunta":"p62","tipo":"1","ordinal":"5","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p63":{"idpregunta":"99","codigo_pregunta":"p63","tipo":"3","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p64":{"idpregunta":"100","codigo_pregunta":"p64","tipo":"3","ordinal":"2","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p65":{"idpregunta":"101","codigo_pregunta":"p65","tipo":"3","ordinal":"3","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""},"p66":{"idpregunta":"102","codigo_pregunta":"p66","tipo":"5","ordinal":"1","alternativa":"0","respuesta":"","respuesta1":"","respuesta2":"","respuesta3":"","respuesta4":"","respuesta5":"","respuesta6":"","respuesta7":"","respuesta8":"","respuesta9":"","m1":"","m2":"","m3":"","m4":""}}',

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

















}
