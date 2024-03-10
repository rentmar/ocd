<?php

class ControlCensal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->model('Encuesta_model');
		$this->load->model('Instanciaseguimiento_model');
		$this->load->model('Cuestionario_model');
		$this->load->model('Departamento_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');


		//Identificador del formulario - Ajustar
		$this->_idformulario = 8;

		if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}

		date_default_timezone_set("America/La_Paz");
	}

	public function index(){

	}

	public function nuevo(){
		//Datos para el formulario
		$usuario = $this->ion_auth->user()->row();
		$departamentos = $this->Departamento_model->leerDepartamentos();


		$datos['usuario'] = $usuario;
		$datos['departamentos'] = $departamentos;
		$datos['idformulario'] = $this->_idformulario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vcontrolcensal', $datos);
		$this->load->view('html/pie');

	}

	public function editar(){
		//Datos para el formulario
		$usuario = $this->ion_auth->user()->row();

		$datos['usuario'] = $usuario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vcontrolcensal_edit', $datos);
		$this->load->view('html/pie');
	}

	private function infoGeneral()
	{
		$controlcensal = new stdClass();
		$controlcensal->fecha_registro = time();
		$controlcensal->fecha_registro_literal = '';
		$controlcensal->iddepartamento = '';

		return $controlcensal;
	}

	public function reporteControlCensal(){
		//$form_veeduria = $this->Veeduria_model->leerFormularios();
		$form_veeduria = 1;

		$datos['forms_veeduria'] = $form_veeduria;


		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('controlcensal/vcontrolcensal_reportes', $datos);
		$this->load->view('html/pie');
	}

	//Datos json Preguntas del formulario CSJC
	public function getPreguntas()
	{
		$json = array();
		//$instancia = $this->input->post('instancia');
		$json = $this->Cuestionario_model->leerPreguntasCSJC();
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	//Procesar el formulario, insercion a la base de datos
	public function procesarform()
	{
		$respuesta = new stdClass();
		//$formulario_respuestas = array();
		$formulario_respuestas = new stdClass();
		$informaciongeneral = $this->informacionGeneral();

		//var_dump($informaciongeneral);

		$preguntas = $this->Cuestionario_model->leerPreguntasCSJC();

		/*echo '<br>';
		echo '<br>';
		echo '<br>';
		var_dump($preguntas);
		echo '<br>';
		echo '<br>';
		echo '<br>';*/
		$i=1;


		foreach ($preguntas as $p){
			if($p->tipo == 1){
				//echo "tipo radius<br>";
				$preg_lit = 'pregunta_cjs'.$p->ordinal.'_pre';
				$resp_tmp = $this->respuestaTipo1($p->idfcsjcp, $p->tipo, $p->codigo, $p->ordinal, $preg_lit);
			}elseif ($p->tipo == 2){
				//echo "tipo text area <br>";
				$preg_lit = 'pregunta_cjs'.$p->ordinal.'_pre';
				$resp_tmp = $this->respuestaTipo2($p->idfcsjcp, $p->codigo, $p->ordinal, $preg_lit);
			}
			$formulario_respuestas->{$i} = $resp_tmp;
			$i++;
		}

		/*echo '<br><br><br>';
		var_dump($formulario_respuestas);
		echo '<br><br><br>';
		$formulario_respuestas_json = json_encode($formulario_respuestas);
		var_dump($formulario_respuestas_json);
		echo '<br><br><br>';
		$f = json_decode($formulario_respuestas_json);
		var_dump($f);*/
		if($this->Cuestionario_model->registrarFormCSJC($informaciongeneral, $formulario_respuestas))
		{
			//Informacion guardada con exito
			redirect('inicio/');
		}

	}

	//Capturar informacion general
	private function informacionGeneral()
	{
		date_default_timezone_set('America/La_Paz');
		$controlcensal = new stdClass();
		$fecha_actual = new DateTime();
		$controlcensal->fecha_registro = now('America/La_Paz');
		$controlcensal->fecha_registro_literal = $fecha_actual->format("d/m/Y");
		$controlcensal->iddepartamento = $this->input->post('iddep_pre');
		$controlcensal->idusuario = $this->input->post('idusuario_pre');
		$controlcensal->idformulario = $this->input->post('idcuestionario_pre');

		return $controlcensal;
	}

	//Capturar respuestas del cuestionario


	//Pregunta tipo 1 - radius
	private function respuestaTipo1($idpregunta, $tipo, $codigo, $ordinal, $respuesta){
		$objetoResp = new stdClass();
		$objetoResp->id = $idpregunta;
		$objetoResp->tipo = $tipo;
		$objetoResp->codigo = $codigo;
		$objetoResp->ordinal = $ordinal;
		$objetoResp->respuesta = $this->input->post($respuesta);

		return $objetoResp;
	}

	//Pregunta tipo 2 - textarea
	private function respuestaTipo2($idpregunta, $codigo, $ordinal, $respuesta){
		$objetoResp = new stdClass();
		$objetoResp->id = $idpregunta;
		$objetoResp->tipo = 2;
		$objetoResp->codigo = $codigo;
		$objetoResp->ordinal = $ordinal;
		$objetoResp->respuesta = $this->input->post($respuesta);

		return $objetoResp;
	}

	//Reporte General
	public function reporteGeneral()
	{
		$filename = "reporte-general-jornada-censal.xlsx";
		$ruta = 'assets/info/';
		$plantilla = $ruta.'plantilla-veeduria.xlsx';
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
		header('Content-Disposition: attachment; filename="' . $filename. '"');
		header('Cache-Control: max-age=0');
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
		$sheet = $spreadsheet->getSheet(0)->setTitle('Formularios');

		$worksheet = $spreadsheet->getActiveSheet();
		$eje_y = 6;



		//Primer libro por defecto
		$sheet = $spreadsheet->setActiveSheetIndex(0);

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save("php://output");

	}

	//Reporte Grafico
	public function reporteGrafico(){
		$filename = "reporte-grafico-jornada-censal.xlsx";
		$ruta = 'assets/info/';
		$plantilla = $ruta.'plantilla-reporte-jornada-censal-graficas.xlsx';
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
		header('Content-Disposition: attachment; filename="' . $filename. '"');
		header('Cache-Control: max-age=0');
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
		


		
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save("php://output");

	}









}
