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
			."  "
			."  "
			." "
			."  ";

		$qry = $this->db->query($sql);
		return $qry->result();
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

}
