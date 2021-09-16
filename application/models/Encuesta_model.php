<?php
class  Encuesta_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Leer todas las encuestas
	public function leerTodasLasEncuestas()
	{
		$q=$this->db->get('uiencuesta');
		return $q->result();
	}

	//Leer todos los modulos
	public function leerTodosLosModulos()
	{
		$sql = "SELECT *   "
			."FROM uimodulo     "
			."LEFT JOIN uiencuesta ON uiencuesta.iduiencuesta = uimodulo.rel_iduiencuesta   "
			."  "
			."  "
			."  "
			." "
			."  ";

		$qry = $this->db->query($sql);
		return $qry->result();
	}
	//Leer todas las secciones
	public  function  leerTodasLasSecciones()
	{
		$sql = "SELECT *   "
			."FROM uiseccion     "
			."LEFT JOIN uimodulo ON uiseccion.rel_iduimodulo = uimodulo.iduimodulo   "
			."LEFT JOIN uiencuesta ON uimodulo.rel_iduiencuesta = uiencuesta.iduiencuesta  "
			."LEFT JOIN subtema ON subtema.idsubtema = uiseccion.rel_idsubtema "
			."  "
			." "
			."  ";

		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public  function  leerModulos()
	{
		$sql = "SELECT * "
			."FROM uimodulo ";
		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public  function  leerSubtemas()
	{
		$sql = "SELECT * "
			."FROM subtema ";
		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public function crearSeccion($ordenSeccion, $modulo, $subtema)
	{
		$this->db->trans_begin();

		$data = array(
			'uiorden_seccion' => $ordenSeccion,
			'rel_iduimodulo' => $modulo,
			'rel_idsubtema' => $subtema,
		);

		$this->db->insert('uiseccion', $data);


		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}
	public function leerUiseccion($iduiseccion)
	{
		$sql = "SELECT * "
			."FROM uiseccion "
			."WHERE $iduiseccion = iduiseccion ";
		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public function leerModulo($iduimodulo)
	{
		$sql = "SELECT * "
			."FROM uimodulo "
			."WHERE $iduimodulo = iduimodulo ";
		$qry = $this->db->query($sql);
		return $qry->result();
	}
public function leerSubtema($idsubtema)
	{
		$sql = "SELECT * "
			."FROM subtema "
			."WHERE $idsubtema = idsubtema ";
		$qry = $this->db->query($sql);
		return $qry->result();
	}
public function actualizarSeccion($iduiseccion,$uiorden_seccion,$rel_iduimodulo,$rel_idsubtema)
	{
		$sql = "UPDATE uiseccion "
			."SET uiorden_seccion = ?, rel_iduimodulo = ?, rel_idsubtema = ? "
			."WHERE iduiseccion = ? ";
			$qry = $this->db->query($sql, [$uiorden_seccion, $rel_iduimodulo, $rel_idsubtema, $iduiseccion ]);
//		$qry = $this->db->query($sql);
		return; //$qry->result();




	}

	//Leer todas las preguntas
	public  function  leerTodasLasPreguntas()
	{
		$sql = "SELECT *   "
			."FROM uipregunta    "
			."LEFT JOIN uiseccion ON uipregunta.rel_iduiseccion = uiseccion.iduiseccion   "
			."LEFT JOIN uimodulo ON uiseccion.rel_iduimodulo = uimodulo.iduimodulo  "
			."LEFT JOIN uiencuesta ON uimodulo.rel_iduiencuesta = uiencuesta.iduiencuesta  "
			."  "
			." "
			."  ";

		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public function agregarPreguntaUI($dts,$dtcheck)
	{
		$orden=1;
		$this->db->trans_start();
			$this->db->insert("uipregunta",$dts);
			$id=$this->db->insert_id();
			foreach ($dtcheck as $r)
			{
				$dt= array(
						'rel_iduipregunta'=>$id,
						'rel_iduirespuesta'=>$r,
						'uiorden_respuesta'=>$orden);
				$this->db->insert('uirespuesta_pregunta',$dt);
				$orden=$orden+1;
			}
		$this->db->trans_complete();
		
	}
	public function leerPreguntaId($idp)
	{
		$this->db->where("iduipregunta",$idp);
		$q=$this->db->get("uipregunta");
		return $q->row();
	}
	public function modificarPreguntaUI($dts,$idp)
	{
		$this->db->where("iduipregunta",$idp);
		$this->db->update("uipregunta",$dts);
	}
	//Leer todas las respuestas
	public  function  leerTodasLasRespuestas()
	{
		$sql = "SELECT *   "
			."FROM uirespuesta    "
			."   "
			."  "
			."  "
			."  "
			." "
			."  ";

		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public function agregarRespuestaUI($dts)
	{
		$this->db->insert("uirespuesta",$dts);
	}
	//Insertar la encuesta
	public function crearNuevaEncuesta($nombre_encuesta)
	{

		$this->db->trans_begin();

		$data = array(
			'uinombre_encuesta' => $nombre_encuesta,
			'encuesta_activa ' => 1,
		);

		$this->db->insert('uiencuesta', $data);


		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

	//
	public function leerEncuestaPorID($idencuesta)
	{
		$this->db->where('iduiencuesta',$idencuesta);
		$q=$this->db->get ('uiencuesta');
		return $q->row();
	}

	public function actualizarEncuesta($idencuesta, $nombre)
	{
		$this->db->trans_begin();

		$data = array(
			'uinombre_encuesta' => $nombre,
		);

		$this->db->where('iduiencuesta', $idencuesta);
		$this->db->update('uiencuesta ', $data);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

	public function crearModulo($nombre, $orden, $encuesta)
	{
		$this->db->trans_begin();

		$data = array(
			'uinombre_modulo' => $nombre,
			'uiorden_modulo' => $orden,
			'rel_iduiencuesta' => $encuesta,
		);

		$this->db->insert('uimodulo', $data);


		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}


	}

	public function leerModuloPorID($idmodulo)
	{
		$this->db->where('iduimodulo',$idmodulo);
		$q=$this->db->get ('uimodulo');
		return $q->row();
	}

	public function actualizarModulo($idmodulo, $nombre, $orden, $idencuesta)
	{
		$this->db->trans_begin();

		$data = array(
			'uinombre_modulo' => $nombre,
			'uiorden_modulo' => $orden,
			'rel_iduiencuesta' => $idencuesta,
		);
		$this->db->where('iduimodulo', $idmodulo);
		$this->db->update('uimodulo ', $data);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

	//Habilitar/Deshabilitar Encuesta
	public function cambiarEstado($identificador, $estado)
	{
		/** @noinspection PhpLanguageLevelInspection */
		$data = [
			'encuesta_activa' => $estado,
		];
		$this->db->where('iduiencuesta', $identificador);
		$this->db->update('uiencuesta ', $data);
	}

	//Lee los modulos que pertenecen a una encuesta en orden ascendente
	public function leerModulosPorIdEncuesta($idencuesta)
	{
		$sql = "SELECT *   "
			."FROM uimodulo   "
			."WHERE uimodulo.rel_iduiencuesta = ?   "
			."   "
			."   "
			."  "
			."   "
			."   "
			."   "
			."   "
			."   ";
		$qry = $this->db->query($sql, [$idencuesta,  ]);
		return $qry->result();
	}

	//Leer las secciones de un modulo
	public function leerSeccionesDeUnaEncuesta($idencuesta)
	{
		$sql = "SELECT *   "
			."FROM uiseccion   "
			."LEFT JOIN uimodulo ON uiseccion.rel_iduimodulo = uimodulo.iduimodulo   "
			."LEFT JOIN uiencuesta ON uimodulo.rel_iduiencuesta = uiencuesta.iduiencuesta   "
			."WHERE uiencuesta.iduiencuesta = ?   "
			."ORDER BY uimodulo.uiorden_modulo, uiseccion.uiorden_seccion  "
			."   "
			."   "
			."   "
			."   "
			."   ";
		$qry = $this->db->query($sql, [$idencuesta,  ]);
		return $qry->result();
	}

	//Leer las respuestas de una encuesta
	public function leerRespuestasDeUnaEncuesta($idencuesta)
	{
		$sql = "SELECT uiencuesta.iduiencuesta, uimodulo.iduimodulo, uiseccion.iduiseccion, uiseccion.uiorden_seccion, uipregunta.iduipregunta, uipregunta.uipregunta_nombre, uipregunta.uiorden_pregunta, uirespuesta.iduirespuesta, uirespuesta.uinombre_respuesta   "
			."FROM uipregunta   "
			."LEFT JOIN uiseccion ON uipregunta.rel_iduiseccion = uiseccion.iduiseccion   "
			."LEFT JOIN uimodulo ON uiseccion.rel_iduimodulo = uimodulo.iduimodulo   "
			."LEFT JOIN uiencuesta ON uimodulo.rel_iduiencuesta = uiencuesta.iduiencuesta   "
			."LEFT JOIN uirespuesta_pregunta ON uirespuesta_pregunta.rel_iduipregunta = uipregunta.iduipregunta  "
			."LEFT JOIN uirespuesta ON uirespuesta_pregunta.rel_iduirespuesta = uirespuesta.iduirespuesta   "
			."WHERE uiencuesta.iduiencuesta = ?   "
			."   "
			."   "
			."   ";
		$qry = $this->db->query($sql, [$idencuesta,  ]);
		return $qry->result();
	}

	//Leer las respuestas de una pregunta
	public function leerPreguntasDeUnaEncuesta($idencuesta)
	{
		$sql = "SELECT uiencuesta.iduiencuesta, uimodulo.iduimodulo, uimodulo.uiorden_modulo, uiseccion.iduiseccion, uiseccion.uiorden_seccion, uipregunta.iduipregunta, uipregunta.uipregunta_nombre, uipregunta.uiorden_pregunta   "
			."FROM uipregunta   "
			."LEFT JOIN uiseccion ON uipregunta.rel_iduiseccion = uiseccion.iduiseccion   "
			."LEFT JOIN uimodulo ON uiseccion.rel_iduimodulo = uimodulo.iduimodulo   "
			."LEFT JOIN uiencuesta ON uimodulo.rel_iduiencuesta = uiencuesta.iduiencuesta   "
			."WHERE uiencuesta.iduiencuesta = 3  "
			."ORDER BY uimodulo.uiorden_modulo, uiseccion.uiorden_seccion, uipregunta.uiorden_pregunta   "
			."   "
			."   "
			."   "
			."   ";
		$qry = $this->db->query($sql, [$idencuesta,  ]);
		return $qry->result();
	}

}
