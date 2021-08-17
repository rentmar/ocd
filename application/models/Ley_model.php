<?php
class Ley_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function leerLeyes()
    {
        $qry=$this->db->query("SELECT nombre_ley, nombre_estadoley, codigo_ley "
                . "FROM nombreley A "
                . "LEFT JOIN estadoley B "
                . "ON A.rel_idestadoley = B.idestadoley "
                . "LEFT JOIN codigoley C "
                . "ON C.rel_idestadoley = B.idestadoley "
                . "GROUP BY idnombreley");
        return $qry->result();
    }
    public function leerEstadoDeLeyes00()
    {
        $qry=$this->db->query("SELECT * "
                . "FROM estadoley "
                . "GROUP BY idestadoley");
        return $qry->result();
    }
    public function insertarEstadoDeLey($dtestado,$dttitulo,$dtcodigo,$dturl)
	{
		$this->db->trans_start();
		$this->db->insert('leyes_estadoley',$dtestado);
		$this->db->insert('nombreley',$dttitulo);
		$this->db->insert('codigoley',$dtcodigo);
		$this->db->insert('urlley',$dturl);
		$this->db->trans_complete();
	} 
	
	public function leerLeyPorId($idley)
	{
		$this->db->where('idleyes',$idley);
		$q=$this->db->get('leyes');
        return $q->row();
	}
	public function leerFuentes()
	{
		$q=$this->db->get('fuente');
		return $q->result();
	}
	public function leerFuenteLey($idl)
	{
		$this->db->where('rel_idleyes',$idl);
		$q=$this->db->get('leyes_fuente');
		return $q->row();
	}
	public function leerEstadosDeLey($idl)
	{
		$sql="SELECT leyes_estadoley.rel_idestadoley,estadoley.nombre_estadoley,leyes_estadoley.fecha_estadoley FROM "
			."leyes_estadoley "
			."LEFT JOIN estadoley ON leyes_estadoley.rel_idestadoley=estadoley.idestadoley "
			."WHERE rel_idleyes =  ".$idl;
		$q=$this->db->query($sql);
        return $q->result();
	}
	public function leerEstadoLey($idl,$ide)
	{
		$this->db->where('rel_idleyes',$idl);
		$this->db->where('rel_idestadoley',$ide);
		$q=$this->db->get('leyes_estadoley');
		return $q->result();
	}
	public function leerEstadosEnLey($idl)
	{
		$this->db->where('rel_idleyes',$idl);
		$q=$this->db->get('leyes_estadoley');
		return $q->result();
	}
	public function leerNombreLeyIdEstado($idl,$ids)
	{
		$this->db->where('rel_idley',$idl);
		$this->db->where('rel_idestadoley',$ids);
		$q=$this->db->get('nombreley');
		return $q->row();
	}
	public function leerCodigoLeyIdEstado($idl,$ids)
	{
		$this->db->where('rel_idley',$idl);
		$this->db->where('rel_idestadoley',$ids);
		$q=$this->db->get('codigoley');
		return $q->row();
	}
	public function leerUrlLeyIdEstado($idl,$ids)
	{
		$this->db->where('rel_idley',$idl);
		$this->db->where('rel_idestadoley',$ids);
		$q=$this->db->get('urlley');
		return $q->row();
	}
	public function leerTemasCuestionario($idc)
	{
		$this->db->where('rel_idcuestionario',$idc);
		$q= $this->db->get('tema');
		return $q->result();
	}
	public function leerTemasLey($idl)
	{
		$sql = "SELECT DISTINCT tema.idtema,tema.nombre_tema "
			."FROM ley_subtema "
			."LEFT JOIN subtema ON ley_subtema.rel_idsubtema=subtema.idsubtema "
			."LEFT JOIN tema ON subtema.rel_idtema=tema.idtema "
			."WHERE ley_subtema.rel_idleyes = ".$idl;
		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public function leerSubtemasLey($idl)
	{
		$sql = "SELECT subtema.idsubtema,subtema.nombre_subtema "
			."FROM ley_subtema "
			."LEFT JOIN subtema ON ley_subtema.rel_idsubtema=subtema.idsubtema "
			."WHERE ley_subtema.rel_idleyes = ".$idl;
		$qry = $this->db->query($sql);
		return $qry->result();
	}
	public function leerSubtemasPorTema($idt)
	{
		$this->db->where('rel_idtema',$idt);
		$q= $this->db->get('subtema');
		return $q->result();
	}
	public function leerOtroTemaLey($idley)
	{
		$sql = "SELECT otrotema.idotrotema,otrotema.nombre_otrotema,otrotema.rel_idcuestionario "
			."FROM ley_otrotema "
			."LEFT JOIN otrotema ON ley_otrotema.rel_idotrotema=otrotema.idotrotema "
			."WHERE ley_otrotema.rel_idleyes = ".$idley;
		$qry = $this->db->query($sql);
		return $qry->row();
	}
	public function leerOtroSubTemaLey($idley)
	{
		$sql = "SELECT otrosubtema.idotrosubtema,otrosubtema.nombre_otrosubtema,otrosubtema.rel_idtema "
			."FROM ley_otrosubtema "
			."LEFT JOIN otrosubtema ON ley_otrosubtema.rel_idotrosubtema=otrosubtema.idotrosubtema "
			."WHERE ley_otrosubtema.rel_idleyes = ".$idley;
		$qry = $this->db->query($sql);
		return $qry->row();
	}
	public function modificarFechaLey($idl,$f)
	{
		/*$this->db->set('fecha_ley',$f);
		$this->db->where('idleyes', $idl);
		$this->db->update('leyes');*/
	}
	public function modificarFuenteLey($idl,$idf)
	{
		$this->db->set('rel_idfuente',$idf);
		$this->db->where('rel_idleyes', $idl);
		$this->db->update('leyes_fuente');
	}

	public function leerAllLeyes()
	{
		$sql = "SELECT *"
			."FROM leyes AS l "
			."LEFT JOIN leyes_estadoley ON leyes_estadoley.rel_idleyes = l.idleyes "
			."LEFT JOIN estadoley ON estadoley.idestadoley = leyes_estadoley.rel_idestadoley ";
		$qry = $this->db->query($sql);
		return $qry->result();
	}

	//Metodo para comprobar el primer estado de ley
	public function leerEstadoDeLey($idley, $idestado)
	{
		$sql = "SELECT *     "
			."FROM leyes AS l    "
			."LEFT JOIN leyes_estadoley ON l.idleyes = leyes_estadoley.rel_idleyes   "
			."LEFT JOIN estadoley ON estadoley.idestadoley = leyes_estadoley.rel_idestadoley   "
			."LEFT JOIN codigoley ON codigoley.rel_idestadoley = estadoley.idestadoley AND codigoley.rel_idley = l.idleyes   "
			."WHERE l.idleyes = ? AND estadoley.idestadoley = ?   ";
		$qry = $this->db->query($sql, [$idley, $idestado, ]);
		return $qry->row();
	}

	public function leerUltimaDescripcion($idley, $idestado)
	{
		$this->db->where('rel_idley',$idley);
		$this->db->where('rel_idestadoley',$idestado);
		$qry=$this->db->get('nombreley');
		return $qry->row();
	}

	//Array ley y estados
	private function leyArray()
	{
		/** @noinspection PhpLanguageLevelInspection */
		$ley = [
			'idley' => ' ',
			'resumen' => ' ',
			'rel_idcuestionario' => ' ',
			'rel_idusuario' => ' ',
			'tratamiento' => [],
			'sancionado' => [],
			'aprobado' => [],
			'modificacion' => [],
			'promulgada' => [],
		];
		return $ley;
	}


	public function leerLeyesEstado($idusuario)
	{
		$leyes_resultado = [];
		$ley = $this->leyArray();
		//Extraer las leyes definidas por el usuario
		$leyes_usuario = $this->Ley_model->leerLeyesIdUsuario($idusuario);

		foreach ($leyes_usuario as $lu)
		{
			$ley['idley'] = $lu->idleyes;
			$ley['resumen'] = $lu->resumen;
			$ley['descripcion'] = '';

			//$idley, $idestado
			$ley['tratamiento']  = $this->Ley_model->leerEstadoDeLey($ley['idley'], 1);
			$t = $this->Ley_model->leerUltimaDescripcion($ley['idley'], 1);
			$ley['sancionado']   = $this->Ley_model->leerEstadoDeLey($ley['idley'], 2);
			$s = $this->Ley_model->leerUltimaDescripcion($ley['idley'], 2);
			$ley['aprobado']     = $this->Ley_model->leerEstadoDeLey($ley['idley'], 3);
			$a = $this->Ley_model->leerUltimaDescripcion($ley['idley'], 3);
			$ley['modificacion'] = $this->Ley_model->leerEstadoDeLey($ley['idley'], 4);
			$m = $this->Ley_model->leerUltimaDescripcion($ley['idley'], 4);
			$ley['promulgada']    = $this->Ley_model->leerEstadoDeLey($ley['idley'], 5);
			$p = $this->Ley_model->leerUltimaDescripcion($ley['idley'], 5);

			if(isset($t))
			{
				$ley['descripcion'] = $t->nombre_ley;
			}
			if(isset($s))
			{
				$ley['descripcion'] = $s->nombre_ley;
			}
			if(isset($a))
			{
				$ley['descripcion'] = $a->nombre_ley;
			}
			if(isset($m))
			{
				$ley['descripcion'] = $m->nombre_ley;
			}
			if(isset($p))
			{
				$ley['descripcion'] = $p->nombre_ley;
			}

			$leyes_resultado[] = $ley;
		}
		return $leyes_resultado;
	}
	public function leerTodasLeyesEstado()
	{
		$leyes_resultado = [];
		$ley = $this->leyArray();
		//Extraer las leyes definidas por el usuario
		$leyes = $this->Ley_model->leerLeyesIdUsuario($idusuario);

		foreach ($leyes_usuario as $lu)
		{
			$ley['idley'] = $lu->idleyes;
			$ley['resumen'] = $lu->resumen;
			$ley['descripcion'] = '';

			//$idley, $idestado
			$ley['tratamiento']  = $this->Ley_model->leerEstadoDeLey($ley['idley'], 1);
			$t = $this->Ley_model->leerEstadoDeLey($ley['idley'], 1);
			$ley['sancionado']   = $this->Ley_model->leerEstadoDeLey($ley['idley'], 2);
			$s = $this->Ley_model->leerEstadoDeLey($ley['idley'], 2);
			$ley['aprobado']     = $this->Ley_model->leerEstadoDeLey($ley['idley'], 3);
			$a = $this->Ley_model->leerEstadoDeLey($ley['idley'], 3);
			$ley['modificacion'] = $this->Ley_model->leerEstadoDeLey($ley['idley'], 4);
			$m = $this->Ley_model->leerEstadoDeLey($ley['idley'], 4);
			$ley['promulgada']    = $this->Ley_model->leerEstadoDeLey($ley['idley'], 5);
			$p = $this->Ley_model->leerEstadoDeLey($ley['idley'], 5);

			if(isset($t))
			{
				$ley['descripcion'] = $t->nombre_estadoley;
			}
			if(isset($s))
			{
				$ley['descripcion'] = $s->nombre_estadoley;
			}
			if(isset($a))
			{
				$ley['descripcion'] = $a->nombre_estadoley;
			}
			if(isset($m))
			{
				$ley['descripcion'] = $m->nombre_estadoley;
			}
			if(isset($p))
			{
				$ley['descripcion'] = $p->nombre_estadoley;
			}

			$leyes_resultado[] = $ley;
		}
		return $leyes_resultado;
	}
	public function leerLeyeId($id)
	{
		$sql="SELECT leyes.idleyes,leyes.fecha_registro,leyes.resumen,fuente.nombre_fuente FROM "
			."leyes_fuente "
			."LEFT JOIN leyes ON leyes_fuente.rel_idleyes=leyes.idleyes "
			."LEFT JOIN fuente ON leyes_fuente.rel_idfuente=fuente.idfuente "
			."WHERE leyes.idleyes = ".$id;
		$q=$this->db->query($sql);
		return $q->result();
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
	public function leerTemaPorId($idt)
	{
		$this->db->where('idtema',$idt);
		$q= $this->db->get('tema');
		return $q->row();
	}

	//Leer todas las leyes y estado
	public function leerTodasLasLeyesEstado()
	{
		$leyes_resultado = [];
		$ley = $this->leyArray();
		//Extraer las leyes definidas por el usuario
		$leyes = $this->leerTodasLeyes();
		foreach ($leyes as $l)
		{
			$ley['idley'] = $l->idleyes;
			$ley['resumen'] = $l->resumen;
			$ley['descripcion'] = '';


			$ley['tratamiento']  = $this->Ley_model->leerEstadoDeLey($ley['idley'], 1);
			$ley['sancionado']   = $this->Ley_model->leerEstadoDeLey($ley['idley'], 2);
			$ley['aprobado']     = $this->Ley_model->leerEstadoDeLey($ley['idley'], 3);
			$ley['modificacion'] = $this->Ley_model->leerEstadoDeLey($ley['idley'], 4);
			$ley['promulgada']    = $this->Ley_model->leerEstadoDeLey($ley['idley'], 5);
			$leyes_resultado[] = $ley;
		}

		/*foreach ($leyes_usuario as $lu)
		{
			$ley['idley'] = $lu->idleyes;
			$ley['resumen'] = $lu->resumen;
			$ley['descripcion'] = '';

			//$idley, $idestado
			$ley['tratamiento']  = $this->Ley_model->leerEstadoDeLey($ley['idley'], 1);
			$t = $this->Ley_model->leerUltimaDescripcion($ley['idley'], 1);
			$ley['sancionado']   = $this->Ley_model->leerEstadoDeLey($ley['idley'], 2);
			$s = $this->Ley_model->leerUltimaDescripcion($ley['idley'], 2);
			$ley['aprobado']     = $this->Ley_model->leerEstadoDeLey($ley['idley'], 3);
			$a = $this->Ley_model->leerUltimaDescripcion($ley['idley'], 3);
			$ley['modificacion'] = $this->Ley_model->leerEstadoDeLey($ley['idley'], 4);
			$m = $this->Ley_model->leerUltimaDescripcion($ley['idley'], 4);
			$ley['promulgada']    = $this->Ley_model->leerEstadoDeLey($ley['idley'], 5);
			$p = $this->Ley_model->leerUltimaDescripcion($ley['idley'], 5);

			if(isset($t))
			{
				$ley['descripcion'] = $t->nombre_ley;
			}
			if(isset($s))
			{
				$ley['descripcion'] = $s->nombre_ley;
			}
			if(isset($a))
			{
				$ley['descripcion'] = $a->nombre_ley;
			}
			if(isset($m))
			{
				$ley['descripcion'] = $m->nombre_ley;
			}
			if(isset($p))
			{
				$ley['descripcion'] = $p->nombre_ley;
			}

			$leyes_resultado[] = $ley;
		}*/
		return $leyes_resultado;
	}

	public function leerTodasLeyes()
	{
		$sql="SELECT *   "
			."FROM leyes AS l   "
			."   "
			."   "
			."   ";
		$q=$this->db->query($sql);
		return $q->result();
	}
        public function leerEstadosLey()
        {
            $sql="SELECT * "
                    . "FROM estadoley "
                    . " ";
            $qry=$this->db->query($sql);
            return $qry->result();
        }
        public function leyPorEstado($consulta)
        {
            		$fecha_inicio = $consulta->fecha_inicio;
		$fecha_fin = $consulta->fecha_fin;
		$idestadosley = $consulta->idestadoley;

		$sql = "SELECT le.idleyes, le.fecha_registro, leyes_estadoley.fecha_estadoley, fuente.nombre_fuente, estadoley.nombre_estadoley, codigoley.codigo_ley, nombreley.nombre_ley, le.resumen, urlley.url_ley, tema.nombre_tema, users.first_name, users.last_name "
                        . "FROM leyes AS le "
                        . "LEFT JOIN leyes_estadoley ON leyes_estadoley.rel_idleyes = le.idleyes "
                        . "LEFT JOIN estadoley ON estadoley.idestadoley = leyes_estadoley.rel_idestadoley "
                        . "LEFT JOIN codigoley ON codigoley.rel_idley = le.idleyes "
                        . "LEFT JOIN leyes_fuente ON leyes_fuente.rel_idleyes = le.idleyes "
                        . "LEFT JOIN fuente ON fuente.idfuente = leyes_fuente.rel_idfuente "
                        . "LEFT JOIN nombreley ON nombreley.rel_idley = le.idleyes "
                        . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = le.rel_idcuestionario "
                        . "LEFT JOIN users ON users.id = le.rel_idusuario "
                        . "LEFT JOIN urlley ON urlley.rel_idley = le.idleyes "
                        . "LEFT JOIN tema ON tema.rel_idcuestionario = le.rel_idcuestionario "
                        . "WHERE estadoley.idestadoley = ?  AND (leyes_estadoley.fecha_estadoley BETWEEN ? AND ?) "
                        . "GROUP BY leyes_estadoley.fecha_estadoley ASC ";
		$qry = $this->db->query($sql, [$idestadosley, $fecha_inicio, $fecha_fin,  ]);
		return $qry->result();
        }
        	public function leerestadoleyId($ide)
	{
		$this->db->where('idestadoley',$ide);
		$q= $this->db->get('estadoley');
		return $q->row();
	}
        	public function leerCuestionario($idcuestionario)
	{
		$qry = $this->db->get_where('cuestionario', [ 'idcuestionario' => $idcuestionario ]);
		return $qry->row();
	}
        public function leyPorUniversidad($consulta)
        {
            $fecha_inicio = $consulta->fecha_inicio;
            $fecha_fin = $consulta->fecha_fin;
            $iduniversidad = $consulta->iduniversidad;
            
            $sql = "SELECT le.idleyes, le.fecha_registro, leyes_estadoley.fecha_estadoley, fuente.nombre_fuente, estadoley.nombre_estadoley, codigoley.codigo_ley, nombreley.nombre_ley, le.resumen, urlley.url_ley, tema.nombre_tema, users.first_name, users.last_name "
                        . "FROM leyes AS le "
                        . "LEFT JOIN leyes_estadoley ON leyes_estadoley.rel_idleyes = le.idleyes "
                        . "LEFT JOIN estadoley ON estadoley.idestadoley = leyes_estadoley.rel_idestadoley "
                        . "LEFT JOIN codigoley ON codigoley.rel_idley = le.idleyes "
                        . "LEFT JOIN leyes_fuente ON leyes_fuente.rel_idleyes = le.idleyes "
                        . "LEFT JOIN fuente ON fuente.idfuente = leyes_fuente.rel_idfuente "
                        . "LEFT JOIN nombreley ON nombreley.rel_idley = le.idleyes "
                        . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = le.rel_idcuestionario "
                        . "LEFT JOIN users ON users.id = le.rel_idusuario "
                        . "LEFT JOIN urlley ON urlley.rel_idley = le.idleyes "
                        . "LEFT JOIN tema ON tema.rel_idcuestionario = le.rel_idcuestionario "
                    . "LEFT JOIN universidad ON universidad.iduniversidad = users.rel_iduniversidad "
                        . "WHERE universidad.iduniversidad = ?  AND (leyes_estadoley.fecha_estadoley BETWEEN ? AND ?) "
                        . "GROUP BY leyes_estadoley.fecha_estadoley ASC ";
		$qry = $this->db->query($sql, [$iduniversidad, $fecha_inicio, $fecha_fin,  ]);
		return $qry->result();
        }
        	public function leeruniversidadlId($idul)
	{
		$this->db->where('iduniversidad',$idul);
		$q= $this->db->get('universidad');
		return $q->row();
	}
        public function leyPorTema($consulta)
        {
            $fecha_inicio = $consulta->fecha_inicio;
            $fecha_fin = $consulta->fecha_fin;
            $idtema = $consulta->idtema;
            
            $sql = "SELECT le.idleyes, le.fecha_registro, leyes_estadoley.fecha_estadoley, fuente.nombre_fuente, estadoley.nombre_estadoley, codigoley.codigo_ley, nombreley.nombre_ley, le.resumen, urlley.url_ley, tema.nombre_tema, users.first_name, users.last_name "
                        . "FROM leyes AS le "
                        . "LEFT JOIN leyes_estadoley ON leyes_estadoley.rel_idleyes = le.idleyes "
                        . "LEFT JOIN estadoley ON estadoley.idestadoley = leyes_estadoley.rel_idestadoley "
                        . "LEFT JOIN codigoley ON codigoley.rel_idley = le.idleyes "
                        . "LEFT JOIN leyes_fuente ON leyes_fuente.rel_idleyes = le.idleyes "
                        . "LEFT JOIN fuente ON fuente.idfuente = leyes_fuente.rel_idfuente "
                        . "LEFT JOIN nombreley ON nombreley.rel_idley = le.idleyes "
                        . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = le.rel_idcuestionario "
                        . "LEFT JOIN users ON users.id = le.rel_idusuario "
                        . "LEFT JOIN urlley ON urlley.rel_idley = le.idleyes "
                        . "LEFT JOIN tema ON tema.rel_idcuestionario = le.rel_idcuestionario "
//                    . "LEFT JOIN universidad ON universidad.iduniversidad = users.rel_iduniversidad "
                        . "WHERE tema.idtema = ?  AND (leyes_estadoley.fecha_estadoley BETWEEN ? AND ?) "
                        . "GROUP BY leyes_estadoley.fecha_estadoley ASC ";
		$qry = $this->db->query($sql, [$idtema, $fecha_inicio, $fecha_fin,  ]);
		return $qry->result();
        }
        	public function leertemaleyId($idtl)
	{
		$this->db->where('idtema',$idtl);
		$q= $this->db->get('tema');
		return $q->row();
	}
        public function leyPorSubtema($consulta)
        {
            $fecha_inicio = $consulta->fecha_inicio;
            $fecha_fin = $consulta->fecha_fin;
            $idsubtema = $consulta->idsubtema;
            
            $sql = "SELECT le.idleyes, le.fecha_registro, leyes_estadoley.fecha_estadoley, fuente.nombre_fuente, estadoley.nombre_estadoley, codigoley.codigo_ley, nombreley.nombre_ley, le.resumen, urlley.url_ley, tema.nombre_tema, users.first_name, users.last_name "
                        . "FROM leyes AS le "
                        . "LEFT JOIN leyes_estadoley ON leyes_estadoley.rel_idleyes = le.idleyes "
                        . "LEFT JOIN estadoley ON estadoley.idestadoley = leyes_estadoley.rel_idestadoley "
                        . "LEFT JOIN codigoley ON codigoley.rel_idley = le.idleyes "
                        . "LEFT JOIN leyes_fuente ON leyes_fuente.rel_idleyes = le.idleyes "
                        . "LEFT JOIN fuente ON fuente.idfuente = leyes_fuente.rel_idfuente "
                        . "LEFT JOIN nombreley ON nombreley.rel_idley = le.idleyes "
                        . "LEFT JOIN cuestionario ON cuestionario.idcuestionario = le.rel_idcuestionario "
                        . "LEFT JOIN users ON users.id = le.rel_idusuario "
                        . "LEFT JOIN urlley ON urlley.rel_idley = le.idleyes "
                        . "LEFT JOIN tema ON tema.rel_idcuestionario = le.rel_idcuestionario "
                    . "LEFT JOIN subtema ON subtema.rel_idtema = tema.idtema "
//                    . "LEFT JOIN universidad ON universidad.iduniversidad = users.rel_iduniversidad "
                        . "WHERE subtema.idsubtema = ?  AND (leyes_estadoley.fecha_estadoley BETWEEN ? AND ?) "
                        . "GROUP BY leyes_estadoley.fecha_estadoley ASC ";
		$qry = $this->db->query($sql, [$idsubtema, $fecha_inicio, $fecha_fin,  ]);
		return $qry->result();
        }

}
