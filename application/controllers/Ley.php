<?php

class Ley extends CI_Controller
{
	protected $_idformulario;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cuestionario_model');
		$this->load->model('Noticia_model');
		$this->load->model('MedioComunicacion_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->library('ion_auth');
		$this->_idformulario = 4;
        $this->load->library('form_validation');
		//Comprobacion de session
		if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}

	}

	public function index()
	{

		

	}
	
	private function fecha_unix($fecha)
	{
		list($anio, $mes, $dia) = explode('-', $fecha);
		$fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
		return $fecha_unix;
	}


	public function crearley()
	{
		//Variables de sesion
		var_dump($this->session->userdata());
		//echo "<br><br>";

		/*
		 * COMPROBAR SI SE CREA NUEVA NUEVA NOTICIA
		 */
		if(!$this->session->es_nueva_ley)
		{
			//Nueva noticia inactiva
			$this->session->set_userdata('es_nueva_ley', true);
			$ley_objeto = $this->objetoLey();
			$this->session->set_userdata('ley_nueva', []);
			$this->session->set_userdata('ley_nueva', $ley_objeto);
			$ley = $this->session->ley_nueva;
			$data['ley'] = $ley;
		}else{
			//Nueva noticia activa
			$ley = $this->session->ley_nueva;
			$data['ley'] = $ley;
		}

		/*
		 * DATOS PARA LLENADO DE FORMULARIO
		 */
		//Informacion del usuario logueado
		$usuario = $this->ion_auth->user()->row();
		//Temas
		$this->Cuestionario_model->setCuestionarioID($this->_idformulario);
		$tema = $this->Cuestionario_model->leerTema();
		var_dump($tema);
		$data['tema'] = $tema;
		$data['estado_ley'] = $this->Cuestionario_model->leerEstadosDeLey();
		$data['idformulario'] = $this->_idformulario;
		$data['idusuario'] = $usuario->id;




		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vleyes_form', $data);
		$this->load->view('html/pie');

	}

	public function subtemas()
	{

	}

	private function objetoLey()
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


	
}
