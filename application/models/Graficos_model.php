<?php

class Graficos_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->dbutil();
	}
	public function xmlDepartamento()
	{
		$sql = "SELECT * FROM departamento";
		$config = array(
				'root'=>'root',
				'element'=>'element',
				'newline'=>"\n",
				'tab'=>"\t");
		$q = $this->db->query($sql);
		
		return $this->dbutil->xml_from_result($q,$config);
	}
	public function leerDepartamentos()
	{
		$q=$this->db->get("departamento");
		return $q->result();
	}
	public function leerCuestionarios()
	{
		$q=$this->db->get("cuestionario");
		return $q->result();
	}
	public function leerTemasIdCuestionaro($idc)
	{	
		$this->db->where('rel_idcuestionario',$idc);
		$q=$this->db->get("tema");
		return $q->result();
	}
	public function leerActores()
	{
		$q=$this->db->get("actor");
		return $q->result();
	}
	public function leerActorId($ida)
	{
		$this->db->where('idactor',$ida);
		$q=$this->db->get("actor");
		return $q->row();
	}
	public function leerTipoMedioId($idtm)
	{
		$this->db->where('idtipomedio',$idtm);
		$q=$this->db->get("tipo_medio");
		return $q->row();
	}
	public function leerCuestionarioId($idc)
	{
		$this->db->where('idcuestionario',$idc);
		$q=$this->db->get("cuestionario");
		return $q->row();
	}
	public function leerTiposMedio()
	{
		$q=$this->db->get("tipo_medio");
		return $q->result();
	}
	public function leerNumLeyes()
	{
		$q=$this->db->get("leyes");
		return count($q->result());
	}
	public function leerNumCuestionarioDepartamento($idd,$idc)
	{
		$sql="SELECT departamento.iddepartamento,departamento.nombre_departamento,cuestionario.nombre_cuestionario
			FROM noticia
			LEFT JOIN users ON noticia.rel_idusuario = users.id
			LEFT JOIN cuestionario ON noticia.rel_idcuestionario = cuestionario.idcuestionario
			LEFT JOIN departamento ON users.rel_iddepartamento = departamento.iddepartamento "
			."WHERE departamento.iddepartamento=".$idd
			." AND cuestionario.idcuestionario=".$idc;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerNumLeyDepartamento($idd,$idc)
	{
		$sql="SELECT departamento.iddepartamento,departamento.nombre_departamento,cuestionario.nombre_cuestionario
			FROM leyes
			LEFT JOIN users ON leyes.rel_idusuario = users.id
			LEFT JOIN cuestionario ON leyes.rel_idcuestionario = cuestionario.idcuestionario
			LEFT JOIN departamento ON users.rel_iddepartamento = departamento.iddepartamento "
			."WHERE departamento.iddepartamento=".$idd
			." AND cuestionario.idcuestionario=".$idc;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerNumActorDepartamento($idd,$ida)
	{
		$sql="SELECT departamento.iddepartamento,departamento.nombre_departamento,actor.idactor,actor.nombre_actor
			FROM noticia_actor
			LEFT JOIN actor on noticia_actor.rel_idactor=actor.idactor
			LEFT JOIN noticia ON noticia_actor.rel_idnoticia=noticia.idnoticia
			LEFT JOIN users ON noticia.rel_idusuario = users.id
			LEFT JOIN departamento ON users.rel_iddepartamento = departamento.iddepartamento "
			."WHERE departamento.iddepartamento=".$idd
			." AND actor.idactor=".$ida;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerNumTipoMedioDepartamento($idd,$idtm)
	{
		$sql="SELECT departamento.iddepartamento,departamento.nombre_departamento,tipo_medio.idtipomedio,tipo_medio.nombre_tipo
			FROM noticia
			LEFT JOIN medio_comunicacion ON noticia.rel_idmedio=medio_comunicacion.idmedio
			LEFT JOIN tipo_medio ON medio_comunicacion.rel_idtipomedio=tipo_medio.idtipomedio
			LEFT JOIN users ON noticia.rel_idusuario = users.id
			LEFT JOIN departamento ON users.rel_iddepartamento = departamento.iddepartamento "
			."WHERE departamento.iddepartamento=".$idd
			." AND tipo_medio.idtipomedio=".$idtm;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerNumCuestionarioNoticia($idc)
	{
		$sql="SELECT cuestionario.idcuestionario,cuestionario.nombre_cuestionario
			FROM noticia
			LEFT JOIN cuestionario on noticia.rel_idcuestionario=cuestionario.idcuestionario "
			."WHERE cuestionario.idcuestionario=".$idc;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerNumTemaNoticia($idt)
	{
		$sql="SELECT DISTINCT noticia_subtema.rel_idnoticia,tema.idtema 
			FROM noticia_subtema
			LEFT JOIN subtema ON noticia_subtema.rel_idsubtema=subtema.idsubtema
			LEFT JOIN tema ON subtema.rel_idtema=tema.idtema "
			."WHERE tema.idtema=".$idt;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerNumTemaLey($idt)
	{
		$sql="SELECT DISTINCT ley_subtema.rel_idleyes,tema.idtema 
			FROM ley_subtema
			LEFT JOIN subtema ON ley_subtema.rel_idsubtema=subtema.idsubtema
			LEFT JOIN tema ON subtema.rel_idtema=tema.idtema "
			."WHERE tema.idtema=".$idt;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerSubTemasIdTema($idt)
	{	
		$this->db->where('rel_idtema',$idt);
		$q=$this->db->get("subtema");
		return $q->result();
	}
	public function leerCantSubTemasIdTema($idt)
	{	
		$this->db->where('rel_idtema',$idt);
		$q=$this->db->get("subtema");
		return count($q->result());
	}
	public function leerNumSubTemaNoticia($idst)
	{
		$sql="SELECT DISTINCT noticia_subtema.rel_idnoticia,subtema.idsubtema,subtema.nombre_subtema,subtema.rel_idtema 
			FROM noticia_subtema
			LEFT JOIN subtema ON noticia_subtema.rel_idsubtema=subtema.idsubtema "
			."WHERE subtema.idsubtema=".$idst;
		$q = $this->db->query($sql);
		return count($q->result());
	}
	public function leerNumSubTemaLey($idst)
	{
		$sql="SELECT DISTINCT ley_subtema.rel_idleyes,subtema.idsubtema,subtema.nombre_subtema,subtema.rel_idtema 
			FROM ley_subtema
			LEFT JOIN subtema ON ley_subtema.rel_idsubtema=subtema.idsubtema "
			."WHERE subtema.idsubtema=".$idst;
		$q = $this->db->query($sql);
		return count($q->result());
	}


	//Grafico cuerdas - Dato Reforma electoral inicial
	public function datoRef0($fecha, $idactor)
	{
		$sql = "SELECT *"
			."FROM leyes AS l "
			."LEFT JOIN leyes_estadoley ON leyes_estadoley.rel_idleyes = l.idleyes "
			."LEFT JOIN estadoley ON estadoley.idestadoley = leyes_estadoley.rel_idestadoley "
			."WHERE l.rel_idusuario = ? "
			."ORDER BY estadoley.porcentaje_estadoley ASC";
		$qry = $this->db->query($sql);
		return $qry->result();

	}

	/**
	 * GRAFICO DE CUERDAS
	 **/



	//Grafico cuerdas - Dato Reforma electoral final
	public function datoActorCuestionario($fecha0, $fechaf, $actor, $formulario)
	{
		$fecha_minima = $this->fecha_unix($fecha0) ;
		$fecha_maxima = $this->fecha_unix($fechaf) ;
		$idactor = $actor;
		$idformulario = $formulario;

		$sql = "SELECT COUNT(*) AS cuenta "
			."FROM noticia AS n "
			."LEFT JOIN noticia_actor ON n.idnoticia =  noticia_actor.rel_idnoticia  "
			."LEFT JOIN actor ON noticia_actor.rel_idactor = actor.idactor  "
			."WHERE n.esta_activa = 1  "
			."AND actor.idactor = ?  "
			."AND n.rel_idcuestionario = ?  "
			."AND (n.fecha_noticia BETWEEN ? AND ?)   "
			." ";
		$qry = $this->db->query($sql, [$idactor, $idformulario, $fecha_minima, $fecha_maxima, ]);
		$result = $qry->row();
		return (int)$result->cuenta;
	}



	//Numero total de noticias activas
	//Devuelve un entero no signado
	public function numeroNoticiasActivas()
	{
		$this->db->select('idnoticia');
		$this->db->from('noticia');
		$this->db->where('esta_activa', true);
		$resultado = $this->db->count_all_results();
		return $resultado;
	}

	//Numero de noticias por id de formulario
	public function numeroNoticiasPorFormulario($idformulario)
	{
		$sql = "SELECT COUNT(*) AS cuenta "
			."FROM noticia AS n "
			."LEFT JOIN cuestionario ON n.rel_idcuestionario = cuestionario.idcuestionario "
			."WHERE n.esta_activa = 1  "
			."AND cuestionario.idcuestionario = ? "
			." ";
		$qry = $this->db->query($sql, [$idformulario ]);
		$result = $qry->row();
		return (int)$result->cuenta;
	}

	//Fecha minima
	public function fechaMinimaNoticia()
	{
		$sql = "SELECT MIN(n.fecha_noticia) AS fecha  "
			."FROM noticia AS n  "
			."WHERE n.esta_activa = 1  "
			."  "
			."  "
			." ";
		$qry = $this->db->query($sql);
		$result = $qry->row();
		return (int)$result->fecha;
	}

	//Fecha maxima
	public function fechaMaximaNoticia()
	{
		$sql = "SELECT MAX(n.fecha_noticia) AS fecha  "
			."FROM noticia AS n  "
			."WHERE n.esta_activa = 1  "
			."  "
			."  "
			." ";
		$qry = $this->db->query($sql);
		$result = $qry->row();
		return (int)$result->fecha;
	}

	//Fecha minima
	public function fechaMinimaRegistroNoticia()
	{
		$sql = "SELECT MIN(n.fecha_registro) AS fecha  "
			."FROM noticia AS n  "
			."WHERE n.esta_activa = 1  "
			."  "
			."  "
			." ";
		$qry = $this->db->query($sql);
		$result = $qry->row();
		return (int)$result->fecha;
	}

	//Fecha maxima
	public function fechaMaximaRegistroNoticia()
	{
		$sql = "SELECT MAX(n.fecha_registro) AS fecha  "
			."FROM noticia AS n  "
			."WHERE n.esta_activa = 1  "
			."  "
			."  "
			." ";
		$qry = $this->db->query($sql);
		$result = $qry->row();
		return (int)$result->fecha;
	}

	//Cantidad de noticias totales activas
	public function numeroTotalDeNoticiasActivas()
	{
		$sql = "SELECT COUNT(*) AS cantidad  "
			."FROM noticia AS n   "
			."WHERE n.esta_activa = 1  "
			."  "
			."  "
			." ";
		$qry = $this->db->query($sql);
		$result = $qry->row();
		return (int)$result->cantidad;
	}

	//Rutina de dd/mm/AA a unix timestamp
	private function fecha_unix($fecha)
	{
		$fecha_std = str_replace('/', '-', $fecha);
		$fecha_unix = strtotime($fecha_std);
		return $fecha_unix;
	}


	/**
	 * FIN GRAFICO DE CUERDAS
	 **/


}
