<?php

class Reformaelectoral extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cuestionario_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		//Extraer de la session
		$iddepartamento = 1;
		$idformulario = 1;

		$tipo_medio = $this->Cuestionario_model->leerTodosTiposMedio();

		$data['tipo_medio'] = $tipo_medio;
		$data['actor'] = $this->Cuestionario_model->leerActor();
		$data['tema'] = $this->Cuestionario_model->leerTema();
		$data['idformulario'] = $idformulario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vreforma_electoral', $data);
		$this->load->view('html/pie');
	}

	public function getMedios()
	{
		$json = array();
		$this->Cuestionario_model->setTipoMedioID($this->input->post('tipomedioID'));
		$this->Cuestionario_model->setDepartamentoID(1);
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

	public function preenvio()
	{
		$idusr=1;
		$DatosNoticia=[
            'fecha_registro'=>$this->fecha_unix(date("Y-m-d")),
            'fecha_noticia'=>$this->fecha_unix($this->input->post('fecha')),
            'titular'=>$this->input->post('titular'),
            'resumen'=>$this->input->post('resumen'),
            'url_noticia'=>$this->input->post('url'),
            'rel_idactor'=>$this->input->post('actor_nombre'),
			'rel_idmedio'=>$this->input->post('medio'),
			'idtema'=>$this->input->post('tema'),
			'idsubtema'=>$this->input->post('subtema'),
			'rel_idcuestionario'=>$this->input->post('idformulario'),
			'otrotema'=>$this->input->post('otrotema'),
			'otrosubtema'=>$this->input->post('otrosubtema'),
			'rel_idusr'=>$idusr
            ];
		echo var_dump($DatosNoticia);

	}
	 private function fecha_unix($fecha) {
        list($anio, $mes, $dia) = explode('-', $fecha);
        $fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
        return $fecha_unix;
    }






}
