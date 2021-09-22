<?php

class Encuesta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->model('Encuesta_model');
		$this->load->library('encryption');
		$this->load->helper('form');

		if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}
	}

	//Vista para las encuestas definidas
	public function index()
	{
		//Leer todas las encuestas
		$data['encuestas'] = $this->Encuesta_model->leerTodasLasEncuestas();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_index', $data);
		$this->load->view('html/pie');
	}

	//Vista para los Modulos
	public function moduloUI()
	{
		//Leer todos los modulos
		$datos['modulos'] = $this->Encuesta_model->leerTodosLosModulos();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_modulo', $datos);
		$this->load->view('html/pie');
	}

	public  function seccionUI()
	{
		//Leer todas las secciones
		$datos['secciones'] = $this->Encuesta_model->leerTodasLasSecciones();
//		echo "<pre>";var_dump($datos);echo "</pre>";
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_seccion', $datos);
		$this->load->view('html/pie');
	}

	public function preguntaUI()
	{
		//Leer todas las preguntas
		$datos['preguntas'] = $this->Encuesta_model->leerTodasLasPreguntas();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_pregunta', $datos);
		$this->load->view('html/pie');
	}
	public function crearPregunta()
	{
		$datos['secciones'] = $this->Encuesta_model->leerTodasLasSecciones();
		$datos['respuestas'] = $this->Encuesta_model->leerTodasLasRespuestas();
		$datos['tipo_pregunta'] = $this->Encuesta_model->leerTiposDePregunta();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vcrearpregunta', $datos);
		$this->load->view('html/pie');
	}
	public function agregarPreguntaUI()
	{
		$dtcheck=[];
		$respuestas=$this->Encuesta_model->leerTodasLasRespuestas();
		$dts=array(
			"uipregunta_nombre"=>$this->input->post("nombre_pregunta"),
			"uiorden_pregunta"=>$this->input->post("ordenpregunta"),
			"rel_iduiseccion"=>$this->input->post("idseccion"),
			"rel_iduitipopregunta"=>$this->input->post('idtipopregunta'));
		foreach ($respuestas as $r)
		{
			if ($this->input->post("resp".$r->iduirespuesta)!=null)
			{
				array_push($dtcheck,$this->input->post("resp".$r->iduirespuesta));
			}
		}
		if (count($dtcheck)!=0)
		{
			$this->Encuesta_model->agregarPreguntaUI($dts,$dtcheck);
			redirect('Encuesta/preguntaUI');
		}
	}
	public function editarPreguntaUI($idp)
	{
		$dt['tipos']=$this->Encuesta_model->leerTiposPreguntas();
		$dt['tipo']=$this->Encuesta_model->leerTipoPreguntaId($idp);
		$dt['pregunta']=$this->Encuesta_model->leerPreguntaId($idp);
		$dt['respuestas'] = $this->Encuesta_model->leerTodasLasRespuestas();
		$dt['respuestas_pregunta']=$this->Encuesta_model->leerRespuestasPreguntaId($idp);
		$dt['secciones'] = $this->Encuesta_model->leerTodasLasSecciones();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/veditarpregunta', $dt);
		$this->load->view('html/pie');
	}
	public function modificarPreguntaUI($idp)
	{
		$dtcheck=[];
		$respuestas=$this->Encuesta_model->leerTodasLasRespuestas();
		foreach ($respuestas as $r)
		{
			if ($this->input->post("resp".$r->iduirespuesta)!=null)
			{
				array_push($dtcheck,$this->input->post("resp".$r->iduirespuesta));
			}
		}
		$dts=array(
			"uipregunta_nombre"=>$this->input->post("nombre_pregunta"),
			"uiorden_pregunta"=>$this->input->post("ordenpregunta"),
			"rel_iduiseccion"=>$this->input->post("idseccion"),
			"rel_iduitipopregunta"=>$this->input->post("idtipo"));
		$this->Encuesta_model->modificarPreguntaUI($dts,$dtcheck,$idp);
		redirect('Encuesta/preguntaUI');
	}
	public function respuestaUI()
	{
		//Leer Todas las respuestas
		$datos['respuestas'] = $this->Encuesta_model->leerTodasLasRespuestas();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_respuesta', $datos);
		$this->load->view('html/pie');
	}
	public function crearRespuestaUI()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vcrearrespuesta');
		$this->load->view('html/pie');
	}
	public function agregarRespuestaUI()
	{
		$dts=array(
			"uinombre_respuesta"=>$this->input->post("nombre_respuesta"));
		$this->Encuesta_model->agregarRespuestaUI($dts);
		redirect('Encuesta/respuestaUI');
	}
	//Rutina para creacion de encuestas
	public function crearEncuesta()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_crearencuesta');
		$this->load->view('html/pie');
	}

	public function procesarCrearEncuesta()
	{
		$nombre_encuesta = $this->input->post('nombre_cuestionario');
		if($this->Encuesta_model->crearNuevaEncuesta($nombre_encuesta)){
			$this->mensaje('Encuesta creada', 'success');
			redirect('inicio');
		}else{
			$this->mensaje('No se creo la encuesta, intente otra vez', 'warning');
			redirect('inicio');
		}
	}
	public function editarEncuesta($id)
	{
		$idencuesta = $id;
		$encuesta = $this->Encuesta_model->leerEncuestaPorID($idencuesta);
		$datos['encuesta'] = $encuesta;
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_editarencuesta', $datos );
		$this->load->view('html/pie');

	}

	public function procesarEditarEncuesta()
	{
		$iduiencuesta = $this->input->post('iduiencuesta');
		$nombre_encuesta = $this->input->post('nombre_cuestionario');

		if($this->Encuesta_model->actualizarEncuesta($iduiencuesta, $nombre_encuesta)){
			$this->mensaje('Encuesta editada', 'success');
			redirect('inicio');
		}else{
			$this->mensaje('No se pudo editar, intente otra vez', 'warning');
			redirect('inicio');
		}

	}

	//Despliegue de mensaje
	public function mensaje($mensaje, $clase){
		/** @noinspection PhpLanguageLevelInspection */
		$this->session->set_flashdata([
			'mensaje' => $mensaje,
			'clase' => $clase,
		]);
	}

	public function crearModulo()
	{
		$data['encuestas'] = $this->Encuesta_model->leerTodasLasEncuestas();

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_crearmodulo', $data);
		$this->load->view('html/pie');
	}

	public function procesarCrearModulo()
	{
		$nombre_modulo = $this->input->post('nombre_modulo');
		$orden_modulo = $this->input->post('orden_modulo');
		$idencuesta = $this->input->post('idencuesta');

		if($this->Encuesta_model->crearModulo($nombre_modulo, $orden_modulo, $idencuesta)){
			$this->mensaje('Modulo creado', 'success');
			redirect('inicio');
		}else{
			$this->mensaje('No se pudo crear modulo, intente otra vez', 'warning');
			redirect('inicio');
		}
	}
	public function crearSeccion()
	{
		$data['modulos'] = $this->Encuesta_model->leerModulos();
		$data['subtemas'] = $this->Encuesta_model->leerSubtemas();

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vcrearseccion', $data);
		$this->load->view('html/pie');
	}
	public function escrituraEnUiseccion()
	{
		$orden_seccion = $this->input->post('ordenDseccion');
		$modulo = $this->input->post('modulo');
		$subtema = $this->input->post('subtema');


		if($this->Encuesta_model->crearSeccion($orden_seccion, $modulo, $subtema)){
			$this->mensaje('Seccion creado', 'success');
			redirect('inicio');
		}else{
			$this->mensaje('No se pudo crear seccion, intente otra vez', 'warning');
			redirect('inicio');
		}
	}
	public function editarSeccion($id)
	{
		$iduiseccion = $id;
		$seccion0 = $this->Encuesta_model->leerUiseccion($iduiseccion);
		$seccion1 = $this->Encuesta_model->leerModulo($seccion0[0]->rel_iduimodulo);
		$seccion2 = $this->Encuesta_model->leerSubtema($seccion0[0]->rel_idsubtema);
//echo "<pre>";var_dump($seccion0,$seccion1, $seccion2);echo "</pre>";
		$datos['seccion0'] = $seccion0;
		$datos['seccion1'] = $seccion1;
		$datos['seccion2'] = $seccion2;
		$datos['modulos'] = $this->Encuesta_model->leerModulos();
		$datos['subtemas'] = $this->Encuesta_model->leerSubtemas();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/veditarseccion', $datos );
		$this->load->view('html/pie');
	}
	public function edicionEnUiseccion()
	{
		$ordenDseccion0 = $this->input->post('ordenDseccion0');
		$orden_seccion = $this->input->post('ordenDseccion');
		$modulo = $this->input->post('modulo');
		$subtema = $this->input->post('subtema');
//echo "<pre>";var_dump($ordenDseccion0,$orden_seccion,$modulo,$subtema);echo "</pre>";
		$this->Encuesta_model->actualizarSeccion($ordenDseccion0,$orden_seccion, $modulo, $subtema);
		redirect('inicio');
	}
	public function editarModulo($id)
	{
		$idmodulo = $id;
		$datos['encuestas'] = $this->Encuesta_model->leerTodasLasEncuestas();

		$modulo = $this->Encuesta_model->leerModuloPorID($idmodulo);
		$datos['modulo'] = $modulo;
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_editarmodulo', $datos );
		$this->load->view('html/pie');
	}
	public function procesarEditarModulo()
	{
		$idmodulo = $this->input->post('idmodulo');
		$nombre_modulo = $this->input->post('nombre_modulo');
		$orden_modulo = $this->input->post('orden_modulo');
		$idencuesta = $this->input->post('idencuesta');;

		if($this->Encuesta_model->actualizarModulo($idmodulo, $nombre_modulo, $orden_modulo, $idencuesta)){
			$this->mensaje('Modulo editado', 'success');
			redirect('inicio');
		}else{
			$this->mensaje('No se pudo editar, intente otra vez', 'warning');
			redirect('inicio');
		}

	}
	public function geolocalizacionUI()
	{
		$datos['localizaciones'] = $this->Encuesta_model->leerLocalizaciones();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_localizacion', $datos);
		$this->load->view('html/pie');
	}
	public function crearLocalizacion()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_crearlocalizacion');
		$this->load->view('html/pie');
	}
	public function agregarLocalizacion()
	{
		$dts=array(
		'nombre_geolocal'=>$this->input->post('nombrelocalizacion'),
		'latitud_geolocal'=>$this->input->post('latitud'),
		'longitud_geolocal'=>$this->input->post('longitud'));
		$this->Encuesta_model->agregarLocalizacion($dts);
		redirect('encuesta/geolocalizacionUI');
	}
	public function editarLocalizacion($idl)
	{
		$datos['localizacion'] = $this->Encuesta_model->leerLocalizacionId($idl);
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_editarlocalizacion',$datos);
		$this->load->view('html/pie');
	}
	public function modificarLocalizacion($idl)
	{
		$dts=array(
		'nombre_geolocal'=>$this->input->post('nombrelocalizacion'),
		'latitud_geolocal'=>$this->input->post('latitud'),
		'longitud_geolocal'=>$this->input->post('longitud'));
		$this->Encuesta_model->modificarLocalizacion($idl,$dts);
		redirect('encuesta/geolocalizacionUI');
	}
	//Despliegue de tarjetas
	public function encuestaInicio()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_inicio');
		$this->load->view('html/pie');
	}

	//Vista de los formularios
	public function formulariosEncuesta()
	{
		$datos['encuestas'] = $this->Encuesta_model->leerTodasLasEncuestas();

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_lista', $datos);
		$this->load->view('html/pie');
	}

	//generar la vista de un formulario
	public function verFormEncuesta($identificador)
	{
		$iduiencuesta = $identificador;
		$encuesta = $this->Encuesta_model->leerEncuestaPorID($iduiencuesta);
		$modulos = $this->Encuesta_model->leerModulosPorIdEncuesta($iduiencuesta);

		//Array de orden
		$orden_modulos = [];
		foreach ($modulos as $m)
		{
			$orden_modulos[] = $m->uiorden_modulo;
		}
		$orden_modulos_min = min($orden_modulos);
		$orden_modulos_max = max($orden_modulos);

		//Extraer las secciones de una encuesta
		$secciones = $this->Encuesta_model->leerSeccionesDeUnaEncuesta($iduiencuesta);

		//Extraer las preguntas de una encuesta
		$preguntas = $this->Encuesta_model->leerPreguntasDeUnaEncuesta($iduiencuesta);
		//Extraer las respuestas de una encuesta
		$respuestas = $this->Encuesta_model->leerRespuestasDeUnaEncuesta($iduiencuesta);

		//Subvista para la Seleccion de modulos
		$datos_modulo['modulos'] = $modulos;
		$datos_modulo['orden_mod_min'] = $orden_modulos_min;
		$datos_modulo['secciones'] = $secciones;
		$datos_modulo['preguntas'] = $preguntas;
		$datos_modulo['respuestas'] = $respuestas;
		$sel_modulos = $this->load->view('encuesta/svencuesta_plantilla_selmodulo', $datos_modulo, TRUE);


		//Subvista para los modulos
		$cont_modulos = $this->load->view('encuesta/svencuesta_plantilla_contmodulo', '', TRUE);

		$datos['encuesta'] = $encuesta;
		$datos['modulos'] = $modulos;
		$datos['secciones'] = $secciones;
		$datos['preguntas'] = $preguntas;
		$datos['respuestas'] = $respuestas;
		$datos['orden_mod_min'] = $orden_modulos_min;
		$datos['orden_mod_max'] = $orden_modulos_max;

		//Datos del formulario
		$datos['sel_modulos'] = $sel_modulos;
		$datos['cont_modulo'] = $cont_modulos;



		$this->load->view('encuesta/vencuesta_plantilla', $datos);

	}

	public function cambiarEstado($identificador)
	{

		$iduiencuesta = $identificador;
		$encuesta = $this->Encuesta_model->leerEncuestaPorID($iduiencuesta);
		$datos['encuesta'] = $encuesta;


		if($encuesta->encuesta_activa)
		{
			//Esta activa, funcion complementaria
			$estado = 0;
		}else{
			//No esta activa, funcion complementaria
			$estado = 1;
		}
		$this->Encuesta_model->cambiarEstado($iduiencuesta, $estado);
		redirect('encuesta/formulariosEncuesta');
	}

	public function capturarDatosEncuesta()
	{
		$n = $this->input->post('nombre');
		$a = $this->input->post('apellido');
		$e = $this->input->post('edad');

		echo "Nombre: ".$n." ".$a."<br>";
		echo "Edad: ".$e;

	}
	public function encuestaAusuarios()
	{
		//Leer a todos los usuarios en el grupo encuestadores

		$datos['usuariose'] = $this->ion_auth->users('encuestadores')->result();

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_ausuarios', $datos);
		$this->load->view('html/pie');
	}
	public function agregarAsignacion($idu)
	{
		$dt="ecuestador-alfredoRamos|3|4837195"; //nombre usuario | numero encuestas asignadas | carnet identidad
		$dtcif=$this->cifrar($dt);
		echo $dtcif;
		echo "<br>";
		echo $this->decifrar($dtcif);
		
	}
	public function asignarEncuesta($identificador)
	{
		$usuario=$this->Encuesta_model->leerUsuarioID($identificador);
		$encuestass=$this->Encuesta_model->leerTodasLasEncuestas();
		$geolocal = $this->Encuesta_model->leerTodasLasAreasTrabajo();
		$datos['usuario']=$usuario;
		$datos['encuestas']=$encuestass;
		$datos['geolocal'] = $geolocal;
//		echo "<pre>";var_dump($datos);echo "</pre>";
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vasignar_encuesta', $datos);
		$this->load->view('html/pie');

	}
	public function guardarAsignacionDencuesta()
	{
		$idencuestador = $this->input->post('idusuario1');
		$encuestador = $this->input->post('usuario1');
		$carnet = $this->input->post('carnetid1');
		$idencuesta = $this->input->post('idencuesta1');
		$nencuestas = $this->input->post('nencuestas1');
		$idgeolocal = $this->input->post('idgeolocal');

		$datos['idencuestador'] = $idencuestador;
		$datos['idencuesta'] = $idencuesta;
		$datos['encuestador'] = $encuestador;
		$datos['carnet'] = $carnet;
		$datos['nencuestas'] = $nencuestas;
		$datos['idgeolocal'] = $idgeolocal;

		$cifrado = new stdClass();
		for($i=1;$i<=$nencuestas;$i++)
		{
			$dt = $encuestador."|".$i."|".$carnet;
			$cifrado->$i = substr(md5(uniqid(Rand(), true)), 16, 16);
		}

		if($this->Encuesta_model->escribirEncuestaAsignada($datos,$cifrado)){
			$this->mensaje('Encuestas asignadas', 'success');
			redirect('encuesta/encuestaAusuarios');
		}else{
			$this->mensaje('No se pudo asignar encuestas', 'warning');
			redirect('encuesta/encuestaAusuarios');
		}

	}
	public function cifrar($cdt)
	{
		$ri=rand(10,99);
		$ro=rand(10,99);
		$dt=strval($ri).$cdt.strval($ro);
		$num=strlen($dt);
		$inicio=round($num/2)-1;
		$cant=$num;
		if (fmod($num,2)==0)
		{
			$cant=$num-1;
		}
		$encnom="";
		$j=-1;
		$cad="";
		for ($i=0;$i<=$cant;$i++)
		{	
			$inicio=$inicio+$j*$i;
			$cad=substr($dt,$inicio,1);
			//$encnom=$encnom.$cad;
			switch ($cad)
			{
				case 'a':$encnom=$encnom.'u';break;
				case 'A':$encnom=$encnom.'U';break;
				case 'e':$encnom=$encnom.'o';break;
				case 'E':$encnom=$encnom.'O';break;
				case 'o':$encnom=$encnom.'e';break;
				case 'O':$encnom=$encnom.'E';break;
				case 'u':$encnom=$encnom.'a';break;
				case 'U':$encnom=$encnom.'A';break;
				case '-':$encnom=$encnom.'+';break;
				case '_':$encnom=$encnom.'(';break;
				default:$encnom=$encnom.$cad;
			}
			$j=$j*(-1);
		}
		return $encnom;
	}
	public function decifrar($dtcif)
	{
		$dtdecif="";
		$num=strlen($dtcif);
		if (fmod($num,2)==0)
		{
			$num=$num-1;
			$n=round($num/2);
			for ($i=0;$i<=$n-1;$i++)
			{
				$cad=$dtcif[$num-(2*$i+1)];
				switch ($cad)
				{
				case 'u':$dtdecif=$dtdecif.'a';break;
				case 'U':$dtdecif=$dtdecif.'A';break;
				case 'o':$dtdecif=$dtdecif.'e';break;
				case 'O':$dtdecif=$dtdecif.'E';break;
				case 'e':$dtdecif=$dtdecif.'o';break;
				case 'E':$dtdecif=$dtdecif.'O';break;
				case 'a':$dtdecif=$dtdecif.'u';break;
				case 'A':$dtdecif=$dtdecif.'U';break;
				case '+':$dtdecif=$dtdecif.'-';break;
				case '(':$dtdecif=$dtdecif.'_';break;
				default:$dtdecif=$dtdecif.$cad;
				}
				
			}
		}
		else
		{
			$n=round($num/2)-1;
			for ($i=0;$i<=$n;$i++)
			{
				$cad=$dtcif[$num-(2*$i+1)];
				switch ($cad)
				{
				case 'u':$dtdecif=$dtdecif.'a';break;
				case 'U':$dtdecif=$dtdecif.'A';break;
				case 'o':$dtdecif=$dtdecif.'e';break;
				case 'O':$dtdecif=$dtdecif.'E';break;
				case 'e':$dtdecif=$dtdecif.'o';break;
				case 'E':$dtdecif=$dtdecif.'O';break;
				case 'a':$dtdecif=$dtdecif.'u';break;
				case 'A':$dtdecif=$dtdecif.'U';break;
				case '+':$dtdecif=$dtdecif.'-';break;
				case '(':$dtdecif=$dtdecif.'_';break;
				default:$dtdecif=$dtdecif.$cad;
				}
			}
		}
		
		for ($i=0;$i<=$n-1;$i++)
		{
			$cad=$dtcif[(2*$i+1)];
			switch ($cad)
				{
				case 'u':$dtdecif=$dtdecif.'a';break;
				case 'U':$dtdecif=$dtdecif.'A';break;
				case 'o':$dtdecif=$dtdecif.'e';break;
				case 'O':$dtdecif=$dtdecif.'E';break;
				case 'e':$dtdecif=$dtdecif.'o';break;
				case 'E':$dtdecif=$dtdecif.'O';break;
				case 'a':$dtdecif=$dtdecif.'u';break;
				case 'A':$dtdecif=$dtdecif.'U';break;
				case '+':$dtdecif=$dtdecif.'-';break;
				case '(':$dtdecif=$dtdecif.'_';break;
				default:$dtdecif=$dtdecif.$cad;
				}
		}
		return substr($dtdecif,2,-2);
	}
	

		private function fecha_unix($fecha)
	{
		list($anio, $mes, $dia) = explode('-', $fecha);
		$fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
		return $fecha_unix;
	}

	public function verEncuestasAsignadas($identificador)
	{
		$idusuario = $identificador;
		$datos['encuestas'] = $this->Encuesta_model->leerEncuestasAsignadasUsuario($idusuario);
		$datos['usuario'] = $user = $this->ion_auth->user($idusuario)->row();

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('encuesta/vencuesta_asignadas', $datos);
		$this->load->view('html/pie');
	}

}
