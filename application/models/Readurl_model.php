<?php

class Readurl_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function autenticar($token)
	{
		$sql = "SELECT *   "
			."FROM encuesta as en     "
			."WHERE en.hash_text = ?   "
			."  "
			."  "
			."  "
			." "
			."  ";

		$qry = $this->db->query($sql, [$token,]);
		$encuesta =  $qry->row();
		if(is_null($encuesta))
		{
			return false;
		}else{
			return $encuesta;
		}
	}

	//Recolectar la informacion del cuestionario
	public function guardarDatos($informacion, $preguntas, $respuestas)
	{
		$info_general = $informacion;
		$idpreguntas_form = $preguntas;
		$idrespuestas_form = $respuestas;

		//Iniciar la transaccion
		$this->db->trans_begin();
		//Crear la entrada del formulario completado
		/** @noinspection PhpLanguageLevelInspection */
		$form_comp_datos = [
			'fecha_fc' => $info_general->fecha,
			'hash_fc' => $info_general->hash,
			'latidud_fc' => $info_general->latitud,
			'longitud_fc' => $info_general->longitud,
			'edad'=> $info_general->edad,
			'sexo'=>$info_general->sexo,
			'area '=>$info_general->area,
			'ciudad'=>$info_general->ciudad,
			'zona'=>$info_general->zona,
			'tiempo' => $info_general->tiempo,
			'rel_idusuario' => $info_general->idusuario,
			'rel_iduiencuesta' => $info_general->iduiencuesta,
		];
		$this->db->insert('formulariocompletado', $form_comp_datos);
		$idformcomp = $this->db->insert_id();
		//Insertar el identificador del formulario completado
		//Junto a los identificadores de preguntas y respuestas correspondientes
		foreach ($idpreguntas_form as $r)
		{
			$idrespuesta = $idrespuestas_form[$r];
			foreach ($idrespuesta as $rp)
			{
				/** @noinspection PhpLanguageLevelInspection */
				$form_preg_resp = [
					'rel_idformcomp' => $idformcomp,
					'rel_idpregunta' => $r,
					'rel_idrespuesta' => $rp,
				];
				$this->db->insert('formulariocomp_respuestas', $form_preg_resp);
			}
		}

		//Inhabilitar el formulario asignado al usuario

		/** @noinspection PhpLanguageLevelInspection */
		$actualizar_form_asignado = [
			'usado' => 1,
		];
		$this->db->where('idencuesta', $info_general->idencuesta);
		$this->db->update('encuesta ', $actualizar_form_asignado);

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

	public function autenticarSegundo($token)
	{
		$this->db->where('hash_fc', $token);
		$this->db->from('formulariocompletado');
		$num_resultados = $this->db->count_all_results();
		if($num_resultados==0)
		{
			return true;
		}else{
			return false;
		}
	}

}
