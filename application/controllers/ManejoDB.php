<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ManejoDB extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->library('session');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Departamento_model');
		$this->load->model('MedioComunicacion_model');
		$this->load->model('Cuestionario_model');
		$this->load->model('Actor_model');
		$this->load->model('Universidad_model');
		$this->load->model('Tema_model');
		$this->load->model('SubTema_model');
	}
	public function index()
	{
		//Poblar el formulario
		$depas = $this->Departamento_model->leerDepartamentos();
		$tipo_medio = $this->MedioComunicacion_model->leerTipoMedio();
		$medio = $this->MedioComunicacion_model->leerMedioComunicacion();
		$actor = $this->Actor_model->leerActores();
		$universidad = $this->Universidad_model->leerUniversidades();
		$tema = $this->Tema_model->leerTemas();
		$stema = $this->SubTema_model->leerSubTemas();



		$data['dep'] = $depas;
		$data['tipo_medio'] = $tipo_medio;
		$data['medio'] = $medio;
		$data['actor'] = $actor;
		$data['universidad'] = $universidad;
		$data['tema'] = $tema;
		$data['stema'] = $stema;



		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('manejodb/viniciodb', $data);
		$this->load->view('html/pie');
	}


	public function reportesPorFecha()
	{

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('manejodb/vexportar_fecha');
		$this->load->view('html/pie');
	}
	public function procesarReportesPorFecha(){

	}

	public function download()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hola Mundo');

		$writer = new Xlsx($spreadsheet);

		$filename = 'name-of-the-generated-file';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output'); // download file

	}




	public function procesarConsulta()
	{
		//Primer validador
		$consulta = $this->objetoConsulta();
		var_dump($consulta);
		if($consulta->fecha_inicio > $consulta->fecha_fin)
		{
			$this->mensaje('Intervalo incorrecto', 'warning');
			redirect('manejoDB');
		}else{

		}
	}

	private function objetoConsulta()
	{
		$ids = new stdClass();
		$ids->fecha_inicio = '';
		$ids->fecha_fin = '';
		$ids->iddepartamento = '';
		$ids->idtipomedio = '';
		$ids->idmedio = '';
		$ids->idactor = '';
		$ids->iduniversidad = '';
		$ids->idtema = '';
		$ids->idsubtema = '';

		//Capturar datos
		$ids->fecha_inicio = $this->fecha_unix($this->input->post('fecha_inicio'));
		$ids->fecha_fin = $this->fecha_unix($this->input->post('fecha_fin')) ;
		$ids->iddepartamento = $this->input->post('iddepartamento');
		$ids->idtipomedio = $this->input->post('idtipomedio');
		$ids->idmedio = $this->input->post('idmedio');
		$ids->idactor = $this->input->post('idactor');
		$ids->iduniversidad = $this->input->post('iduniversidad');
		$ids->idtema = $this->input->post('idtema');
		$ids->idsubtema = $this->input->post('idsubtema');


		return $ids;
	}

	//Despliegue de mensaje
	public function mensaje($mensaje, $clase){
		/** @noinspection PhpLanguageLevelInspection */
		$this->session->set_flashdata([
			'mensaje' => $mensaje,
			'clase' => $clase,
		]);
	}

	private function fecha_unix($fecha)
	{
		list($anio, $mes, $dia) = explode('-', $fecha);
		$fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
		return $fecha_unix;
	}

}
