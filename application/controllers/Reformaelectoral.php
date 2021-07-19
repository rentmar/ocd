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
		/*$accion = $this->input->post('action');
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
		//var_dump($noticias);
		$dt['noticias'] =$this->Noticia_model->leerNoticiasUsuario($usuario->id,$this->_idformulario);
		$dt['cuestionario'] = $this->Cuestionario_model->leerCuestionario($this->_idformulario);
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vreforma_lista_noticias', $dt);
		$this->load->view('html/pie');
	}

	public function editarNoticia($idnoticia)
	{
		$usuario = $this->ion_auth->user()->row();
		$n=$this->Noticia_model->leerNoticiaPorId($idnoticia);
		$medio=$this->Noticia_model->leerMedioPorId($n->rel_idmedio);
		$dt['actores']=$this->Noticia_model->leerTodoActores();
		$dt['medios']=$this->Noticia_model->leerMediosPorTipoDepartamento($medio->rel_idtipomedio,$usuario->rel_iddepartamento);
		$dt['tipos']=$this->Noticia_model->leerTipos();
		$dt['noticia']= $n;
		$dt['na']=$this->Noticia_model->leerNoticiaActores($idnoticia);
		$dt['medio']=$medio;
		$dt['temas']=$this->Noticia_model->leerTemasCuestionario($this->_idformulario);
		$dt['temase']=$this->Noticia_model->leerTemasNoticia($idnoticia);
		$dt['subtemase']=$this->Noticia_model->leerSubtemasNoticia($idnoticia);
		foreach ($dt['temase'] as $te)
		{
			$subtemas[$te->idtema]=$this->Noticia_model->leerSubtemasPorTema($te->idtema);
		}
		$dt['subtemas']=$subtemas;
		
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vnoticia_editar', $dt);
		$this->load->view('html/pie');
	}
	public function editarMedio()
	{
		$usuario = $this->ion_auth->user()->row();
		$dt['idnoticia']=$this->input->post('idnoticia');
		$dt['medios']=$this->Noticia_model->leerMediosPorTipoDepartamento($this->input->post('rel_idtipomedio'),$usuario->rel_iddepartamento);
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/veditarmedio',$dt);
		$this->load->view('html/pie');
	}
	public function editarTemas()
	{
		$usuario = $this->ion_auth->user()->row();
		$dt['idnoticia']=$this->input->post('idnoticia');
		$temas=$this->Noticia_model->leerTemasCuestionario($this->_idformulario);
		foreach ($temas as $t)
		{	
			if ($this->input->post('t'.$t->idtema)!=null)
			{
				$temase[$t->idtema]=$this->Noticia_model->leerTemaPorId($t->idtema);
				$subtemase[$t->idtema]=$this->Noticia_model->leerSubtemasPorTema($t->idtema);
			}
		}
		$dt['temase']=$temase;
		$dt['subtemase']=$subtemase;
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/veditartema',$dt);
		$this->load->view('html/pie');
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



