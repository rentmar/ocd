<?php
class Noticia_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function insertarNoticia($DatosNoticia)
    {
		$this->db->insert('noticia',$DatosNoticia);
    }
	public function insertarOtroTema($dtot,$ost)
	{
		$this->db->trans_start();
			$this->db->insert('tema',$dtot);
			$idtema=$this->db->insert_id();
			$datoOtroSubTema=[
			   'nombre_subtema'=>$ost,
			   'rel_idtema'=>$idtema];
			$this->db->insert('subtema',$datoOtroSubTema);
			$q=$this->db->insert_id();
		$this->db->trans_complete();
		return $q;
	}
	public function leerNoticiaPorId($idnoticia)
	{
		$this->db->where('idnoticia',$idnoticia);
		$q= $this->db->get('noticia');
		return $q->row();
	}
	public function leerActores()
	{
		$q= $this->db->get('actor');
		return $q->result();
	}
	public function leerTipos()
	{
		$q= $this->db->get('tipo_medio');
		return $q->result();
	}
	public function leerMedioPorId($idm)
	{
		$this->db->where('idmedio',$idm);
		$q= $this->db->get('medio_comunicacion');
		return $q->row();
	}
	public function leerMediosPorDepartamento($idd)
	{
		$sql = "SELECT medio_comunicacion.idmedio,medio_comunicacion.nombre_medio "
			."FROM medio_departamento "
			."LEFT JOIN medio_comunicacion ON medio_departamento.rel_idmedio=medio_comunicacion.idmedio "
			."WHERE medio_departamento.rel_iddepartamento = ".$idd;
		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public function leerNoticiaMedioPorId($idnoticia)
	{
		$this->db->where('rel_idnoticia',$idnoticia);
		$q= $this->db->get('noticia_medio');
		return $q->row();
	}
	public function leerTemaPorSubtema($ids)
	{
		$this->db->where('idsubtema',$ids);
		$q= $this->db->get('subtema');
		return $q->row();
	}
	public function leerTemaPorId($idt)
	{
		$this->db->where('idtema',$idt);
		$q= $this->db->get('tema');
		return $q->row();
	}
	public function leerNoticiaActores($idn)
	{
		$this->db->where('rel_idnoticia',$idn);
		$q= $this->db->get('noticia_actor');
		return $q->result();
	}
	public function leerNoticiasUsuario($idusuario,$idcuestionario)
	{
		$sql = "SELECT idnoticia,fecha_registro,fecha_noticia,titular,nombre_medio "
			."FROM noticia "
			."LEFT JOIN medio_comunicacion ON noticia.rel_idmedio=medio_comunicacion.idmedio "
			."WHERE noticia.rel_idusuario = ".$idusuario." AND noticia.rel_idcuestionario=".$idcuestionario;
		$qry = $this->db->query($sql);
		return $qry->result();
	}
	//Extrae una noticia por su identificador
	public function leerNoticiaID($idnoticia){
		$sql = "SELECT * "
			."FROM noticia AS n  "
			."LEFT JOIN actor ON actor.idactor = n.rel_idactor "
			."LEFT JOIN subtema ON subtema.idsubtema = n.rel_idsubtema "
			."LEFT JOIN tema ON tema.idtema = subtema.rel_idtema  "
			."LEFT JOIN medio_comunicacion ON medio_comunicacion.idmedio = n.rel_idmedio "
			."LEFT JOIN tipo_medio ON tipo_medio.idtipomedio = medio_comunicacion.rel_idtipomedio "
			."WHERE n.idnoticia = ?  ";
		$qry = $this->db->query($sql, [$idnoticia,  ]);
		return $qry->row();
	}
	public function modificarNoticia($idn,$dts)
	{
		$this->db->where('idnoticia', $idn);
		$this->db->update('noticia', $dts);
	}

	public function crearNoticia($noticia)
	{
		/*
		 *
		 * INICIAR LA TRANSACCION
		 */
		$this->db->trans_begin();
		//Insertar la noticia
		/** @noinspection PhpLanguageLevelInspection */
		$ntc = [
			'fecha_registro' => now() ,
			'fecha_noticia' => $noticia->fecha_noticia ,
			'titular' => $noticia->titular,
			'resumen' => $noticia->resumen,
			'url_noticia' => $noticia->url_noticia,
			'rel_idsubtema' => 1, //Campo de compatibilidad
			'rel_idmedio' => $noticia->rel_idmedio,
			'rel_idusuario' => $noticia->rel_idusuario,
			'rel_idcuestionario' => $noticia->idformulario,
		];
		$this->db->insert('noticia', $ntc);
		$noticia_id = $this->db->insert_id();

		//Insertar actores
		$actrs = $noticia->actores;

		foreach ($actrs as $a){
			/** @noinspection PhpLanguageLevelInspection */
			$actores = [
				'rel_idnoticia' => $noticia_id ,
				'rel_idactor' => $a,
			];
			$this->db->insert('noticia_actor', $actores);
		}
		//Insertar otro tema
		//Insertar subtema
		//insertar otrosubtema
		$temas = $noticia->temas;
		$subtemas = $noticia->subtemas;
		$otrossubtemas = $noticia->otros_subtemas;
		$otrotema = $noticia->otro_tema;

		foreach ($temas as $t)
		{
			//Tema es una bandera
			$idtema = $t;
			if($idtema!=0)
			{
				$stemas = $subtemas[$idtema];
				foreach ($stemas as $st)
				{
					$idsubtema = $st;
					if($idsubtema!=0)
					{
						//Insertar la relacion noticia subtema
						//echo $idsubtema." / ";
						/** @noinspection PhpLanguageLevelInspection */
						$not_subt = [
							'rel_idnoticia' => $noticia_id,
							'rel_idsubtema' => $idsubtema,
						];
						$this->db->insert('noticia_subtema', $not_subt);
					}else{
						echo "insertar otro subtema: ".$otrossubtemas[$idtema];
						//Insertar el otro subtema
						/** @noinspection PhpLanguageLevelInspection */
						$ot_st = [
							'nombre_otrosubtema' => $otrossubtemas[$idtema],
							'rel_idtema' => $idtema,
						];
						$this->db->insert('otrosubtema', $ot_st);
						$otro_st_id = $this->db->insert_id();
						//Relacion de otrosubtema con la noticia
						/** @noinspection PhpLanguageLevelInspection */
						$not_ost = [
							'rel_idnoticia' => $noticia_id,
							'rel_idotrosubtema '=>$otro_st_id,
						];
						$this->db->insert('noticia_otrosubtema', $not_ost);
					}
				}

			}else{
				//Insertar otro tema
				//echo "Registrar otro tema: ".$otrotema;
				/** @noinspection PhpLanguageLevelInspection */
				$ot = [
					'nombre_otrotema' => $otrotema,
					'rel_idcuestionario' => $noticia->idformulario,
					'rel_idusuario' => $noticia->rel_idusuario,
				];
				$this->db->insert('otrotema', $ot);
				$otro_tema_id = $this->db->insert_id();
				//Relacion de otro con la noticia
				/** @noinspection PhpLanguageLevelInspection */
				$not_ot =[
					'rel_idnoticia' => $noticia_id,
					'rel_idotrotema' => $otro_tema_id,
				];
				$this->db->insert('noticia_otrotema', $not_ot);
			}
		}



		if ($this->db->trans_status() === FALSE){
			//Hubo errores en la consulta, entonces se cancela la transacción.
			$this->db->trans_rollback();
			return false;
		}else{
			//Todas las consultas se hicieron correctamente.
			$this->db->trans_commit();
			return true;
		}


	}

    
}
