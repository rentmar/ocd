<?php

class Partida_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Comprueba el documento de identidad
	public function buscaCI($numero_ci)
	{
		$this->db->select('numero_ci');
		$this->db->from('partida');
		$this->db->where('numero_ci', $numero_ci);
		return $this->db->count_all_results();
	}

	//Crea un registro de entrada
	public function crearPartida($datos)
	{
		/*
		 *
		 * INICIAR LA TRANSACCION
		 */
		$this->db->trans_begin();

		$partida = $datos;
		$numero_ci = $partida->numero_documento;
		$iddepartamento = $partida->departamento;
		$idusuario = $partida->usuario;
		$informacion = json_encode($partida);


		//Insertar la noticia
		/** @noinspection PhpLanguageLevelInspection */
		$registro_part = [
			'numero_ci' => $numero_ci,
			'rel_iddepartamento' => $iddepartamento,
			'rel_idusuario ' => $idusuario,
			'datos_partida' => $informacion,
		];
		$this->db->insert('partida', $registro_part);
		$padron_id = $this->db->insert_id();

		if ($this->db->trans_status() === FALSE){
			//Hubo errores en la consulta, entonces se cancela la transacción.
			$this->db->trans_rollback();
			return false;
		}else{
			//Todas las consultas se hicieron correctamente.
			$this->db->trans_commit();
			return $padron_id;
		}
	}

	public function insertarNumeroCarnet(){

	}

	//Plenaria tipo plenaria
	public function registroId($identificador)
	{
		$idpartida = $identificador;
		$sql = "SELECT *  "
			."FROM partida      "
			."WHERE partida.idpartida = ?   "
			."   "
			."   "
			."   "
			."   "
			."   ";
		$qry = $this->db->query($sql, [$idpartida, ]);
		return $qry->row();
	}
}
