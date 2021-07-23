<?php

class Censo extends CI_Controller
{
	protected $_idformulario;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Censo_model');
		$this->load->model('Cuestionario_model');
		$this->load->model('Noticia_model');
		$this->load->model('MedioComunicacion_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->library('ion_auth');
		$this->_idformulario = 3;
        $this->load->library('form_validation');
		//Comprobacion de session
		if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}

	}

	public function index()
	{

		//Variables de sesion
		//var_dump($this->session->userdata());
		//echo "<br><br>";

		/*
		 * COMPROBAR SI SE CREA NUEVA NUEVA NOTICIA
		 */
		if(!$this->session->es_nueva_noticia2)
		{
			//Nueva noticia inactiva
			$this->session->set_userdata('es_nueva_noticia2', true);
			$noticia_objeto = $this->objetoNoticia();
			$this->session->set_userdata('noticia_nueva2', []);
			$this->session->set_userdata('noticia_nueva2', $noticia_objeto);
			$noticia = $this->session->noticia_nueva1;
			$data['noticia'] = $noticia;
		}else{
			//Nueva noticia activa
			$noticia = $this->session->noticia_nueva2;
			$data['noticia'] = $noticia;
		}
		/*
		 * DATOS DE LLENADO DE FORMULARIO
		 */
		//Informacion del usuario logueado
		$usuario = $this->ion_auth->user()->row();
		//Temas
		$this->Cuestionario_model->setCuestionarioID($this->_idformulario);
		$tema = $this->Cuestionario_model->leerTema();

		//Informacion para poblar el formulario
		$data['tema'] = $this->Cuestionario_model->leerTodosTiposMedio();
		$data['idformulario'] = $this->_idformulario;
		$data['idusuario'] = $usuario->id;
		$data['tipo_medio'] = $this->Cuestionario_model->leerTodosTiposMedio();
		$data['actor'] = $this->Cuestionario_model->leerActor();
		$data['tema'] = $tema;

		/*
		 * CARGA DE VISTAS
		 */
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vcenso', $data);
		$this->load->view('html/pie');
		

	}
	
	private function fecha_unix($fecha)
	{
		list($anio, $mes, $dia) = explode('-', $fecha);
		$fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
		return $fecha_unix;
	}


	private function objetoNoticia()
	{
		$noticia = new stdClass;
		$noticia->idnoticia = '';
		$noticia->fecha_registro = '';
		$noticia->fecha_noticia = '';
		$noticia->titular = '';
		$noticia->resumen = '';
		$noticia->url_noticia = '';

		$noticia->rel_idmedio = '';
		$noticia->rel_idcuestionario = '';
		$noticia->rel_idusuario = '';

		$noticia->iddepartamento = '';

		$noticia->actores = [];
		$noticia->temas = [];
		$noticia->subtemas = [];
		$noticia->medio = [];
		$noticia->tipo_medio = [];

		$noticia->es_segundo_paso = false;
		$noticia->es_preenvio = false;

		return $noticia;
	}

	public function subtemas()
	{
		//Extraer la variable de session nueva noticia
		$noticia = $this->session->noticia_nueva2;
		//var_dump($noticia);
		if(!$noticia->es_segundo_paso)
		{
			//Capturar actores
			$actores = $this->input->post('idactor[]');
			$noticia->actores = $actores;
			//Capturar temas
			$temas = $this->input->post('idtema[]');
			$noticia->temas = $temas;

			//Datos generales
			$noticia->fecha_noticia = $this->fecha_unix($this->input->post('fecha')) ;
			$noticia->titular = $this->input->post('titular');
			$noticia->resumen = $this->input->post('resumen') ;
			$noticia->url_noticia = $this->input->post('url') ;
			$noticia->rel_idusuario = $this->input->post('idusuario');
			$noticia->rel_idcuestionario = $this->input->post('idformulario');

			//Capturar la informacion del medio
			$idmedio = $this->input->post('idmedio');
			$idtipomedio = $this->input->post('idtipomedio');
			//Extraer la informacion de la base de datos
			$medio = $this->MedioComunicacion_model->leerMedioPorId($idmedio);
			$tipo = $this->MedioComunicacion_model->leerTipoMedioPorId($idtipomedio);

			//Actualizar los valores de la noticia
			$noticia->rel_idmedio = $medio->idmedio;
			/** @noinspection PhpLanguageLevelInspection */
			$noticia->medio = [
				'id'=>$medio->idmedio,
				'nombre' =>$medio->nombre_medio,

			];
			/** @noinspection PhpLanguageLevelInspection */
			$noticia->tipo_medio = [
				'id'=> $tipo->idtipomedio,
				'nombre' => $tipo->nombre_tipo,
			];

			$otro_tema = $this->input->post('tema0');
			$noticia->otro_tema = $otro_tema;
			$noticia->es_segundo_paso= true;

			//Actualizar la variable de session
			$this->session->set_userdata('noticia_nueva2', []);
			$this->session->set_userdata('noticia_nueva2', $noticia);

		}else{
			$noticia = $this->session->noticia_nueva2;
		}
		$data['noticia'] = $noticia;
		$this->Cuestionario_model->setTemaIDs($noticia->temas);
		$temas_sel = $this->Cuestionario_model->leerTemasPorIDs();
		$subtemas_sel = $this->Cuestionario_model->leerSubtemasPorIDs();
		$actores_sel = $this->Cuestionario_model->leerActoresPorIDs($noticia->actores);



		$data['temas_sel'] = $temas_sel;
		$data['subtemas_sel'] = $subtemas_sel;
		$data['actores_sel'] = $actores_sel;
		/*
		 * CARGA DE VISTAS
		 */
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vnoticia_subtemas2', $data);
		$this->load->view('html/pie');
	}
	public function preenvio()
	{
		//Extraer la variable de session nueva noticia
		$noticia = $this->session->noticia_nueva2;
		//var_dump($noticia);
		if(!$noticia->es_preenvio)
		{
			//Definir la fecha de registro de la noticia

			$noticia->fecha_registro = now();
			//definir los identificadores de los subtemas
			$idtemas = array_filter($noticia->temas) ;
			//Capturar subtemas
			$subtemas = [];
			foreach ($idtemas as $t)
			{
				$subtemas[$t] = $this->input->post('tema'.$t);
			}
			$noticia->subtemas = $subtemas; //Guardar los subtemas
			//Capturar otros subtemas
			$otros_subtemas = [];
			foreach ($idtemas as $t)
			{
				$otros_subtemas[$t] = $this->input->post('otrosubtema'.$t);
			}
			$noticia->otros_subtemas = $otros_subtemas; //Guardar otros subtemas
			//Actualizar la bandera de cambio
			$noticia->es_preenvio = true;

			//Colocar la noticia en la pila de insercion
			$this->session->set_userdata('noticia_insert', []);
			$this->session->set_userdata('noticia_insert', $noticia);
			//Actualizar la variable de session
			$this->session->set_userdata('noticia_nueva1', []);
			$this->session->set_userdata('noticia_nueva1', $noticia);

		}else{
			$noticia = $this->session->noticia_nueva2;

		}
		$this->Cuestionario_model->setTemaIDs($noticia->temas);
		$temas_sel = $this->Cuestionario_model->leerTemasPorIDs();
		$subtemas_sel = $this->Cuestionario_model->leerSubtemasPorIDs();
		$actores_sel = $this->Cuestionario_model->leerActoresPorIDs($noticia->actores);


		$datos['temas_sel'] = $temas_sel;
		$datos['subtemas_sel'] = $subtemas_sel;
		$datos['actores_sel'] = $actores_sel;
		$datos['noticia'] = $noticia;


		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vcenso_preenvio',$datos);
		$this->load->view('html/pie');

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
*/



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






}
