<?php

class Reformaelectoral extends CI_Controller
{
	protected $_idformulario;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cuestionario_model');
		$this->load->model('Noticia_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->library('ion_auth');
		$this->_idformulario = 1;
                $this->load->library('form_validation');
		//Comprobacion de session
		if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}
	}

	public function index()
	{
		$usuario = $this->ion_auth->user()->row();
		$tipo_medio = $this->Cuestionario_model->leerTodosTiposMedio();
		//Todos los temas referidos al formulario
		$this->Cuestionario_model->setCuestionarioID($this->_idformulario);
		$tema = $this->Cuestionario_model->leerTema();


		//Inicializar las variables de session
		if(!$this->session->nuevo_c1)
		{
			//echo "Nueva noticia no activada";
			//Activar la bandera nueva noticia
			$this->session->set_userdata("nuevo_c1", true);
			//Actualizar la variable de session
			$noticia = new stdClass();
			$this->session->set_userdata("reforma", []);
			$this->session->set_userdata("reforma", $noticia);
		}
		else{
			$reforma = $this->session->reforma;
			//var_dump($reforma);
			//echo "<br><br>";
			$data['fecha'] = $reforma->fecha_noticia;
			$data['titular'] = $reforma->titular;
			$data['resumen'] = $reforma->resumen;
			$data['url'] = $reforma->url_noticia;
			$data['idactores'] = $reforma->actores;
			$data['idtemas'] = $reforma->temas;
			//Extraer los temas seleccionados
			$this->Cuestionario_model->setTemaIDs($reforma->temas);
			$temas_sel = $this->Cuestionario_model->leerTemasPorIDs();
			$subtemas_sel = $this->Cuestionario_model->leerSubtemasPorIDs();
			//var_dump($temas_sel);
			//echo "<br><br>";
			//var_dump($subtemas_sel);
			//echo "<br><br>";
			//var_dump($reforma->actores);
			$data['temas_sel'] = $temas_sel;
			$data['subtemas_sel'] = $subtemas_sel;

			//echo "Nueva noticia activada";
			//Actualizar la variable de session

			//$this->session->set_userdata("reforma", []);
			//$this->session->set_userdata("reforma", $noticia);*/
		}
		$data['idusuario'] = $usuario->id;
		$data['iddepartamento'] = $usuario->rel_iddepartamento;
		$data['tipo_medio'] = $tipo_medio;
		$data['actor'] = $this->Cuestionario_model->leerActor();
		$data['tema'] = $tema;
		$data['idformulario'] = $this->_idformulario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vreforma_electoral', $data);
		$this->load->view('html/pie');
	}

	public function valores()
	{
		var_dump($this->session->userdata());
	}

	public function getMedios()
	{
		$json = array();
		$this->Cuestionario_model->setTipoMedioID($this->input->post('tipomedioID'));
		$this->Cuestionario_model->setDepartamentoID($this->session->iddepartamento);
		$json = $this->Cuestionario_model->leerMedios();
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	public function getsubtema()
	{
		$json = array();
		$this->Cuestionario_model->setTemaID($this->input->post('temaID'));
		$this->Cuestionario_model->setDepartamentoID(1);
		$json = $this->Cuestionario_model->leerSubtema();
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	public function actualizar()
	{
		$html = array();
		$not = $this->input->post('noticia');
		$noticia = json_decode($not) ;
		if(!$this->session->nuevo_c1)
		{
			//echo "Nueva noticia no activada";
			//Activar la bandera nueva noticia
			$this->session->set_userdata("nuevo_c1", true);
			//Actualizar la variable de session
			$this->session->set_userdata("reforma", []);
			$this->session->set_userdata("reforma", $noticia);
		}
		else{
			//echo "Nueva noticia activada";
			//Actualizar la variable de session
			$this->session->set_userdata("reforma", []);
			$this->session->set_userdata("reforma", $noticia);
		}

		if($noticia->idformulario == 1)
		{
			$html = "reformaelectoral";
		}elseif ($noticia->idformulario == 2){
			$html = "instdemocratica";
		}

		echo $html;


	}

	public function getprueba()
	{
		$json = array();
		$not = $this->input->post('noticia');
		$noticia = json_decode($not);
		var_dump($noticia);
		echo "<br><br>";
		echo $noticia->titular;


		//$this->load->view('welcome');

		/*$json = array();
		$usuario = $this->ion_auth->user()->row();
		$this->Cuestionario_model->setUsuarioID($usuario->id);
		$this->Cuestionario_model->setCuestionarioID($this->_idformulario);
		$this->Cuestionario_model->setTemaIDs(json_decode($this->input->post('temaID')));
		$this->session->set_userdata('nueva_noticia_ids', []);
		$this->session->set_userdata('nueva_noticia_ids', json_decode($this->input->post('temaID')) );
		$json = $this->Cuestionario_model->leerSubtemasPorIDs();
		header('Content-Type: application/json');
		echo json_encode($json);*/
	}

	private function fecha_unix($fecha)
	{
		list($anio, $mes, $dia) = explode('-', $fecha);
		$fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
		return $fecha_unix;
	}

	public function preenvio()
	{
		$accion = $this->input->post('action');
		if($accion == 1){
			//Procesar formulario
			//echo "Procesar formulario";
			$noticia = $this->session->reforma;
			$noticia->fecha_registro = now();
			$noticia->fecha_noticia = $this->fecha_unix($this->input->post('fecha'));
			$noticia->titular = $this->input->post('titular');
			$noticia->resumen = $this->input->post('resumen');
			$noticia->url_noticia = $this->input->post('url');
			$noticia->rel_idusuario = $this->input->post('idusuario');
			$noticia->idformulario = $this->input->post('idformulario');
			$noticia->rel_idmedio = $this->input->post('idmedio');


			//Capturar los actores
			$actores = $this->input->post('idactor[]');
			$noticia->actores = $actores;

			//Capturar los temas
			$temas = $this->input->post('idtema[]');

			//Capturar otro tema
			$otro_tema = $this->input->post('tema0');
			$noticia->otro_tema = $otro_tema;


			//Capturar subtemas
			$subtemas = [];
			foreach ($temas as $t)
			{
				$subtemas[$t] = $this->input->post('tema'.$t);
			}

			$noticia->subtemas = $subtemas;


			//Capturar otros subtemas
			$otros_subtemas = [];
			foreach ($temas as $t)
			{
				$otros_subtemas[$t] = $this->input->post('otrosubtema'.$t);
			}

			$noticia->otros_subtemas = $otros_subtemas;

			//var_dump($noticia);

			$this->session->set_userdata('noticia_insert', []);
			$this->session->set_userdata('noticia_insert', $noticia);


			$datos['noticia'] = $noticia;

			$this->load->view('html/encabezado');
			$this->load->view('html/navbar');
			$this->load->view('cuestionarios/vreforma_preenvio',$datos);
			$this->load->view('html/pie');

		}elseif ($accion == 0){
			//Seleccionar temas
			//echo "Seleccionar temas"."<br>";
			$noticia = $this->session->reforma;
			$noticia->fecha_registro = now();
			$noticia->fecha_noticia = $this->fecha_unix($this->input->post('fecha'));
			$noticia->titular = $this->input->post('titular');
			$noticia->resumen = $this->input->post('resumen');
			$noticia->url_noticia = $this->input->post('url');
			$noticia->rel_idusuario = $this->input->post('idusuario');
			$noticia->idformulario = $this->input->post('idformulario');
			$noticia->rel_idmedio = $this->input->post('idmedio');

			//Capturar los actores
			$actores = $this->input->post('idactor[]');
			$noticia->actores = $actores;

			//Capturar los temas
			$temas = $this->input->post('idtema[]');
			$noticia->temas = $temas;

			//var_dump($noticia);

			$this->session->set_userdata('reforma', []);
			$this->session->set_userdata('reforma', $noticia);

			redirect('reformaelectoral/');


		}else{

		}


		//Capturar la noticia
		/*$noticia = $this->session->reforma;
		$noticia->fecha_registro = now();
		$noticia->fecha_noticia = $this->fecha_unix($this->input->post('fecha'));
		$noticia->titular = $this->input->post('titular');
		$noticia->resumen = $this->input->post('resumen');
		$noticia->url_noticia = $this->input->post('url');
		$noticia->rel_idusuario = $this->input->post('idusuario');
		$noticia->idformulario = $this->input->post('idformulario');
		$noticia->rel_idmedio = $this->input->post('idmedio');


		//Capturar los actores
		$actores = $this->input->post('idactor[]');
		$noticia->actores = $actores;

		//Capturar los temas
		$temas = $this->input->post('idtema[]');

		//Capturar otro tema
		$otro_tema = $this->input->post('tema0');
		$noticia->otro_tema = $otro_tema;


		//Capturar subtemas
		$subtemas = [];
		foreach ($temas as $t)
		{
			$subtemas[$t] = $this->input->post('tema'.$t);
		}

		$noticia->subtemas = $subtemas;


		//Capturar otros subtemas
		$otros_subtemas = [];
		foreach ($temas as $t)
		{
			$otros_subtemas[$t] = $this->input->post('otrosubtema'.$t);
		}

		$noticia->otros_subtemas = $otros_subtemas;

		//var_dump($noticia);

		$this->session->set_userdata('noticia_insert', []);
		$this->session->set_userdata('noticia_insert', $noticia);


		$datos['noticia'] = $noticia;





		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vreforma_preenvio',$datos);
		$this->load->view('html/pie');*/









	}

	public function editar()
	{
		$usuario = $this->ion_auth->user()->row();
		$cantidad_noticia = $this->session->noticia_editable;
		//echo $usuario->id;
		//echo $cantidad_noticia;
		$noticias = $this->Noticia_model->leerTodasNoticiasUsuario($usuario->id, $this->_idformulario);
		//var_dump($noticias);

		$data['noticias'] = $noticias;
		$data['cuestionario'] = $this->Cuestionario_model->leerCuestionario($this->_idformulario);

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vreforma_lista_noticias', $data);
		$this->load->view('html/pie');
	}


	public function editarNoticia($idnoticia)
	{
		$idnoticia = $idnoticia;
		if(!$this->session->edicion_activa)
		{
			//Noticia
			$noticia = $this->Noticia_model->leerNoticiaID($idnoticia);
			//Actores
			$actores = $this->Noticia_model->leerActores($idnoticia);
			//Temas
			$temas = $this->Noticia_model->leerTemas($idnoticia);
			//Subtemas
			$subtemas = $this->Noticia_model->leerSubtemas($idnoticia);
			//Otro tema
			$otrotema = $this->Noticia_model->leerOtrotema($idnoticia);
			//Otros subtemas
			$otrosubtemas = $this->Noticia_model->leerOtrosubtemas($idnoticia);

			//Limpiar la variable de edicion_activa
			$this->session->set_userdata('edicion_activa', true);
			$this->session->set_userdata('edicion_cuestionario', $this->_idformulario);
			$this->session->set_userdata('noticia_ed', []);
			$this->session->set_userdata('noticia_ed', $noticia);
			$this->session->set_userdata('actores_ed', []);
			$this->session->set_userdata('actores_ed', $actores);
			$this->session->set_userdata('temas_ed', []);
			$this->session->set_userdata('temas_ed', $actores);
			$this->session->set_userdata('actores_ed', []);
			$this->session->set_userdata('actores_ed', $actores);



		}

		$data['noticia'] = $noticia ;
		$data['actores'] = $actores;
		$data['temas'] = $temas ;
		$data['subtemas'] = $subtemas;
		$data['otrotema'] = $otrotema;
		$data['otrosubtemas'] = $otrosubtemas;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vnoticia_editar', $data);
		$this->load->view('html/pie');


		/*//Comprobar si hay edicion activa
		if(!$this->session->edicion_activa)
		{
			$noticia = $this->Noticia_model->leerNoticiaID($idnoticia);
			//Noticia original
			$noticia_original = $this->Noticia_model->leerNoticiaID($idnoticia);
			//Limpiar la variable de edicion_activa
			$this->session->set_userdata('edicion_activa', true);
			$this->session->set_userdata('edicion_cuestionario', $this->_idformulario);
			//Cargar la noticia y la noticia original a la session
			$this->session->set_userdata('noticia', []);
			$this->session->set_userdata('noticia', $noticia);
			$this->session->set_userdata('noticia_original', []);
			$this->session->set_userdata('noticia_original', $noticia_original);
			//redirect('reformaelectoral/editarNoticia/'.$idnoticia);
		}

		$data['idnoticia'] = $idnoticia;
		if($this->session->edicion_activa)
		{
			//Noticia editada
			$noticia_edicion = $this->session->noticia;
			//Noticia original
			$noticia_original = $this->session->noticia_original;
			//var_dump($noticia_original);

			$data['noticia'] = $noticia_edicion;
			$data['idcuestionario'] = $this->_idformulario;
			$data['actor'] = $this->Cuestionario_model->leerActor();
			$data['tipo_medio'] = $this->Cuestionario_model->leerTodosTiposMedio();
			$this->Cuestionario_model->setCuestionarioID($this->_idformulario);
			$tema = $this->Cuestionario_model->leerTema();
			$data['tema']=$tema;

		}*/
		/*$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vnoticia_editar', $data);
		$this->load->view('html/pie');*/
	}

	//Actualizar los valores del titular, resumen y url
	private function updateDatosGenerales()
	{

	}

	public function capturarDatos()
	{
		echo "Capturar la informacion del Formulario";
		echo "Reforma electoral";
		echo "<br><br><br><br>";
		echo "";
		/** @noinspection PhpLanguageLevelInspection */
		$datos_cuestionario = [

		];

		echo "Noticia: "."<br>";
		$noticia = $this->session->reforma;
		var_dump($noticia);
		echo "<br><br><br><br>";



		echo "Actores: "."<br>";
		$actores = $this->input->post('idactor[]');

		var_dump($actores);
		echo "<br><br><br><br>";

		echo "Temas: "."<br>";


		$temas = $this->input->post('idtema[]');

		var_dump($temas);
		echo "<br><br><br><br>";

		$subtemas = [];
		echo "Capturar Temas"."<br>";
		foreach ($temas as $t)
		{
			$subtemas[$t] = $this->input->post('tema'.$t);
		}

		var_dump($subtemas);
		echo "<br><br><br><br>";
		$otros_subtemas = [];
		foreach ($temas as $t)
		{
			$otros_subtemas[$t] = $this->input->post('otrosubtema'.$t);
		}
		var_dump($otros_subtemas);
	}

	public function cancelarNuevo()
	{
		//Limpiar las variables de session y colocar la bandera en su estado original
		$this->session->set_userdata('nuevo_c1', false);
		$this->session->set_userdata('reforma', []);
		//Redireccionar al inicio
		redirect('inicio/');
	}

}



