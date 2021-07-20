<?php

class Instdemocratica extends CI_Controller
{
	protected $_idformulario;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('Cuestionario_model');
		$this->load->model('Noticia_model');
		$this->load->library('ion_auth');


		$this->_idformulario = 2;
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
			if(isset($reforma->fecha_noticia)){
				$data['fecha'] = $reforma->fecha_noticia;
			}
			if(isset($reforma->titular)){
				$data['titular'] = $reforma->titular;
			}
			if(isset($reforma->resumen)){
				$data['resumen'] = $reforma->resumen;
			}
			if(isset($reforma->url_noticia)){
				$data['url'] = $reforma->url_noticia;
			}
			if(isset($reforma->actores)){
				$data['idactores'] = $reforma->actores;
			}
			if(isset($reforma->temas)){
				$data['idtemas'] = $reforma->temas;
			}
			//Extraer los temas seleccionados
			if(isset($reforma->temas)) {
				$this->Cuestionario_model->setTemaIDs($reforma->temas);
				$temas_sel = $this->Cuestionario_model->leerTemasPorIDs();
				$subtemas_sel = $this->Cuestionario_model->leerSubtemasPorIDs();
				$data['temas_sel'] = $temas_sel;
				$data['subtemas_sel'] = $subtemas_sel;
			}
		}
		$data['idusuario'] = $usuario->id;
		$data['iddepartamento'] = $usuario->rel_iddepartamento;
		$data['tipo_medio'] = $tipo_medio;
		$data['actor'] = $this->Cuestionario_model->leerActor();
		$data['tema'] = $tema;
		$data['idformulario'] = $this->_idformulario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vinst_democratica', $data);
		$this->load->view('html/pie');

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
			$this->load->view('cuestionarios/vinst_preenvio',$datos);
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

			redirect('instdemocratica/');


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
		$this->load->view('cuestionarios/vinst_preenvio',$datos);
		$this->load->view('html/pie');


		/*$idusr=$this->input->post('idusuario');
		$actor=$this->Cuestionario_model->leerActorPorId($this->input->post('idactor'));
		$medio=$this->Cuestionario_model->leerMedioPorId($this->input->post('idmedio'));
		$DatosNoticia=[
            'fecha_registro'=>$this->fecha_unix(date("Y-m-d")),
            'fecha_noticia'=>$this->fecha_unix($this->input->post('fecha')),
            'titular'=>$this->input->post('titular'),
            'resumen'=>$this->input->post('resumen'),
            'url_noticia'=>$this->input->post('url'),
            'idactor'=>$this->input->post('idactor'),
			'idmedio'=>$this->input->post('idmedio'),
			'idtema'=>$this->input->post('tema'),
			'idsubtema'=>$this->input->post('idsubtema'),
			'idcuestionario'=>$this->input->post('idformulario'),
			'idusr'=>$idusr,
			'actor'=>$actor->nombre_actor,
			'medio'=>$medio->nombre_medio
            ];
		if ($this->input->post('tema')==0)
		{
			$DatosNoticia['tema']=$this->input->post('otrotema');
			$DatosNoticia['subtema']="Subtema no definido";
		}
		elseif  ($this->input->post('idsubtema')==0)
		{
			$DatosNoticia['tema']='Pertenece al tema '.$this->input->post('idtema');
			$DatosNoticia['subtema']=$this->input->post('otrossubtema');
		}
		else
		{
			$DatosNoticia['tema']=$this->Cuestionario_model->leerTemaPorId($this->input->post('tema'))->nombre_tema;
			$DatosNoticia['subtema']=$this->Cuestionario_model->leerSubTemaPorId($this->input->post('idsubtema'))->nombre_subtema;
		}

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vinst_preenvio',$DatosNoticia);
		$this->load->view('html/pie');*/

	}

	public function editar()
	{
		$usuario = $this->ion_auth->user()->row();
		//echo $usuario->id;
		//$noticias = $this->Noticia_model->leerTodasNoticiasUsuario($usuario->id, $this->_idformulario);
		//var_dump($noticias);
		$noticias = $this->Noticia_model->leerTodasNoticiasCuestionarioUsuario($this->_idformulario, $usuario->id);
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
		//Comprobar si la edicion esta activa
		//$all = $this->session->userdata();
		//var_dump($all);
		//echo "<br>";
		//echo "<br>";

		/*$ed = $this->session->edicion_activa;
		var_dump($ed);*/

		//Comprobar si hay edicion activa
		if(!$this->session->edicion_activa)
		{
			$noticia = $this->Noticia_model->leerNoticiaID($idnoticia);
			//Noticia original
			$noticia_original = $this->Noticia_model->leerNoticiaID($idnoticia);
			//Limpiar la variable de edicion_activa
			$this->session->set_userdata('edicion_activa', true);
			$this->session->set_userdata('edicion_cuestionario', $this->_idformulario);
			//Cargar la noticia a la session
			$this->session->set_userdata('noticia', [ ]);
			$this->session->set_userdata('noticia', $noticia);
			//redirect('reformaelectoral/editarNoticia/'.$idnoticia);
			$this->session->set_userdata('noticia_original', [ ]);
			$this->session->set_userdata('noticia_original', $noticia_original);
		}

		/*$all = $this->session->userdata();
		var_dump($all);
		echo "<br>";
		echo "<br>";*/
		$data['idnoticia'] = $idnoticia;
		if($this->session->edicion_activa)
		{
			//Noticia editada
			$noticia_edicion = $this->session->noticia;
			//Noticia original
			$noticia_original = $this->session->noticia_original;

			var_dump($noticia_edicion);


			$data['noticia'] = $noticia_edicion;
			$data['idcuestionario'] = $this->_idformulario;
			$data['actor'] = $this->Cuestionario_model->leerActor();
			$data['tipo_medio'] = $this->Cuestionario_model->leerTodosTiposMedio();
			$this->Cuestionario_model->setCuestionarioID($this->_idformulario);
			$tema = $this->Cuestionario_model->leerTema();
			$data['tema']=$tema;

		}
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vnoticia_editar', $data);
		$this->load->view('html/pie');
	}

}
