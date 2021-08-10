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
		$this->load->helper('date');
		$this->load->model('Departamento_model');
		$this->load->model('MedioComunicacion_model');
		$this->load->model('Cuestionario_model');
		$this->load->model('Actor_model');
		$this->load->model('Universidad_model');
		$this->load->model('Tema_model');
		$this->load->model('SubTema_model');
		$this->load->model('Noticia_model');
		$this->load->model('Formulario_model');
		//Comprobacion de session
		if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}
	}
	public function index()
	{




		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('manejodb/viniciodb');
		$this->load->view('html/pie');
	}




	public function reportesSimples()
	{
		$usuario = $this->ion_auth->user()->row();
		//Poblar el formulario
		$forms = $this->Formulario_model->leerCuestionarios();
		$depas = $this->Departamento_model->leerDepartamentos();
		$tipo_medio = $this->MedioComunicacion_model->leerTipoMedio();
		$medio = $this->MedioComunicacion_model->leerMedioComunicacion();
		$actor = $this->Actor_model->leerActores();
		$universidad = $this->Universidad_model->leerUniversidades();
		$tema = $this->Tema_model->leerTemas();
		$stema = $this->SubTema_model->leerSubTemas();
		$un = $this->Universidad_model->leerUniversidadId($usuario->rel_iduniversidad);



		$data['dep'] = $depas;
		$data['forms'] = $forms;
		$data['tipo_medio'] = $tipo_medio;
		$data['medio'] = $medio;
		$data['actor'] = $actor;
		$data['universidad'] = $universidad;
		$data['tema'] = $tema;
		$data['stema'] = $stema;
		$data['un'] = $un;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('manejodb/vmanejodb_repsimples', $data);
		$this->load->view('html/pie');
	}


	public function reportesCompuestos()
	{
		$usuario = $this->ion_auth->user()->row();
		//Poblar el formulario
		$forms = $this->Formulario_model->leerCuestionarios();
		$depas = $this->Departamento_model->leerDepartamentos();
		$tipo_medio = $this->MedioComunicacion_model->leerTipoMedio();
		$medio = $this->MedioComunicacion_model->leerMedioComunicacion();
		$actor = $this->Actor_model->leerActores();
		$universidad = $this->Universidad_model->leerUniversidades();
		$tema = $this->Tema_model->leerTemas();
		$stema = $this->SubTema_model->leerSubTemas();
		$un = $this->Universidad_model->leerUniversidadId($usuario->rel_iduniversidad);



		$data['dep'] = $depas;
		$data['forms'] = $forms;
		$data['tipo_medio'] = $tipo_medio;
		$data['medio'] = $medio;
		$data['actor'] = $actor;
		$data['universidad'] = $universidad;
		$data['tema'] = $tema;
		$data['stema'] = $stema;
		$data['un'] = $un;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('manejodb/vmanejodb_repcomp', $data);
		$this->load->view('html/pie');

	}




	public function download()
	{
		//Extraer la noticia y sus datos
		$consulta = $this->session->consulta;

		$noticia = $this->Noticia_model->reporteNoticias($consulta);
		$noticia_datos = $this->Noticia_model->reportesNoticiasDatos($consulta);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		//Encabezado
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'FECHA REGISTRO');
		$sheet->setCellValue('C1', 'FECHA NOTICIA');
		$sheet->setCellValue('D1', 'TITULAR');
		$sheet->setCellValue('E1', 'RESUMEN');
		$sheet->setCellValue('F1', 'URL');
		$sheet->setCellValue('G1', 'MEDIO' );
		$sheet->setCellValue('H1', 'TIPO MEDIO' );
		$sheet->setCellValue('I1', 'FORMULARIO' );
		$sheet->setCellValue('J1', 'USUARIO');
		$sheet->setCellValue('K1', 'UNIVERSIDAD');
		$sheet->setCellValue('L1', 'DEPARTAMENTO');
		$sheet->setCellValue('M1', 'ACTOR');
		$sheet->setCellValue('N1', 'TEMA');
		$sheet->setCellValue('O1', 'SUBTEMA');



		//Eje X
		$eje_x = 1;
		//Eje Y
		$eje_y = 1;

		//Bordes del encabezado

		$sheet->getStyle('A1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('A1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('A1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('A1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('B1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('B1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('B1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('B1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('C1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('C1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('C1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('C1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('D1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('D1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('D1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('D1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('E1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('E1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('E1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('E1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('F1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('F1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('F1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('F1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('G1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('G1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('G1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('G1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('H1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('H1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('H1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('H1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('I1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('I1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('I1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('I1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('J1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('J1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('J1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('J1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('K1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('K1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('K1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('K1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('L1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('L1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('L1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('L1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('M1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('M1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('M1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('M1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('N1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('N1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('N1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('N1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

		$sheet->getStyle('O1')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('O1')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('O1')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
		$sheet->getStyle('O1')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


		//Color del encabezado
		$spreadsheet->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('C1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('F1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('G1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('J1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('K1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('L1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('M1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('N1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$spreadsheet->getActiveSheet()->getStyle('O1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');


		$eje_y++;
		$eje_y_actor = 1;
		$eje_y_tema = 1;
		$eje_y_stema = 1;
		foreach ($noticia_datos as $n):
			$sheet->setCellValue('A'.$eje_y, $n->idnoticia);
			$sheet->setCellValue('B'.$eje_y, mdate('%m-%d-%Y', $n->fecha_registro));
			$sheet->setCellValue('C'.$eje_y, mdate('%m-%d-%Y', $n->fecha_noticia));
			$sheet->setCellValue('D'.$eje_y, $n->titular);
			$sheet->setCellValue('E'.$eje_y, $n->resumen);
			$sheet->setCellValue('F'.$eje_y, $n->url_noticia);
			$sheet->setCellValue('G'.$eje_y, $n->nombre_medio );
			$sheet->setCellValue('H'.$eje_y, $n->nombre_tipo );
			$sheet->setCellValue('I'.$eje_y, $n->nombre_cuestionario );
			$sheet->setCellValue('J'.$eje_y, $n->username);
			$sheet->setCellValue('K'.$eje_y, $n->nombre_universidad);
			$sheet->setCellValue('L'.$eje_y, $n->nombre_departamento);
			$sheet->setCellValue('M'.$eje_y, $n->nombre_actor);
			$sheet->setCellValue('N'.$eje_y, $n->nombre_tema);
			$sheet->setCellValue('O'.$eje_y, $n->nombre_subtema);
			$eje_y++;
		endforeach;

		//Autosize de las columnas
		foreach (range('A', 'P') as $col ){
			$sheet->getColumnDimension($col)->setAutoSize(true);
		}

		$writer = new Xlsx($spreadsheet);

		$filename = 'reporte';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');


		/*$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hola Mundo');

		$writer = new Xlsx($spreadsheet);

		$filename = 'name-of-the-generated-file';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output'); // download file*/

	}

	public function downloadUniveridad()
	{
		$filename = "reporte-universidad.xlsx";
		$ruta = 'assets/info/';
		$plantilla = $ruta.'plantilla-tipomedio.xlsx';
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
		header('Content-Disposition: attachment; filename="' . $filename. '"');
		header('Cache-Control: max-age=0');

		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
		$worksheet = $spreadsheet->getActiveSheet();
		$worksheet->setTitle("Noticias Universidad");




		$worksheet->getCell("B4")->setValue("El Perfume");
		$worksheet->getCell("B5")->setValue("La Virgen de los sicarios");
		$worksheet->getCell("B6")->setValue("Angeles y Demonios");
		$worksheet->getCell("B7")->setValue("The Killer inside me");

		$worksheet->getCell("C4")->setValue("Patrick Suskind");
		$worksheet->getCell("C5")->setValue("Fernando Vallejo");
		$worksheet->getCell("C6")->setValue("Dan Brown");
		$worksheet->getCell("C7")->setValue("Jim Thompson");

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save("php://output");

	}

	public function downloadTipomedio()
	{
		$consulta = $this->session->consulta_tipomedio;
		$this->session->unset_userdata("consulta_tipomedio");
		$noticias = $this->Noticia_model->noticiaPorTipomedio($consulta);

		if(!empty($consulta))
		{
			$filename = "reporte-universidad.xlsx";
			$ruta = 'assets/info/';
			$plantilla = $ruta.'plantilla-tipomedio.xlsx';
			header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
			header('Content-Disposition: attachment; filename="' . $filename. '"');
			header('Cache-Control: max-age=0');

			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
			$sheet = $spreadsheet->getActiveSheet();
			$worksheet = $spreadsheet->getActiveSheet();
			$eje_y = 6;
			foreach ($noticias as $n):
				$sheet->setCellValue('A'.$eje_y, $n->idnoticia);
				$sheet->setCellValue('B'.$eje_y, mdate('%m-%d-%Y', $n->fecha_registro));
				$sheet->setCellValue('C'.$eje_y, mdate('%m-%d-%Y', $n->fecha_noticia));
				$sheet->setCellValue('D'.$eje_y, $n->titular);
				$sheet->setCellValue('E'.$eje_y, $n->resumen);
				$sheet->setCellValue('F'.$eje_y, $n->url_noticia);
				$sheet->setCellValue('G'.$eje_y, $n->nombre_medio );
				$sheet->setCellValue('H'.$eje_y, $n->nombre_tipo );
				$sheet->setCellValue('I'.$eje_y, $n->nombre_cuestionario );
				$sheet->setCellValue('J'.$eje_y, $n->username);
				$sheet->setCellValue('K'.$eje_y, $n->nombre_universidad);
				$sheet->setCellValue('L'.$eje_y, $n->nombre_departamento);

				$eje_y++;
			endforeach;

			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save("php://output");
		}else{
			$this->mensaje('No existen datos', 'warning');
			redirect('ManejoDB/reportesSimples');
		}
	}

	public function downloadCuestionario()
	{
		$consulta = $this->session->consulta_cuestionario;
		$this->session->unset_userdata("consulta_cuestionario");
		$noticias = $this->Noticia_model->noticiaPorCuestionario($consulta);

		if(!empty($consulta))
		{
			$filename = "reporte-cuestionario.xlsx";
			$ruta = 'assets/info/';
			$plantilla = $ruta.'plantilla-cuestionario.xlsx';
			header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
			header('Content-Disposition: attachment; filename="' . $filename. '"');
			header('Cache-Control: max-age=0');

			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
			$sheet = $spreadsheet->getActiveSheet();
			$worksheet = $spreadsheet->getActiveSheet();
			$eje_y = 6;
			foreach ($noticias as $n):
				$sheet->setCellValue('A'.$eje_y, $n->idnoticia);
				$sheet->setCellValue('B'.$eje_y, mdate('%m-%d-%Y', $n->fecha_registro));
				$sheet->setCellValue('C'.$eje_y, mdate('%m-%d-%Y', $n->fecha_noticia));
				$sheet->setCellValue('D'.$eje_y, $n->titular);
				$sheet->setCellValue('E'.$eje_y, $n->resumen);
				$sheet->setCellValue('F'.$eje_y, $n->url_noticia);
				$sheet->setCellValue('G'.$eje_y, $n->nombre_medio );
				$sheet->setCellValue('H'.$eje_y, $n->nombre_tipo );
				$sheet->setCellValue('I'.$eje_y, $n->nombre_cuestionario );
				$sheet->setCellValue('J'.$eje_y, $n->username);
				$sheet->setCellValue('K'.$eje_y, $n->nombre_universidad);
				$sheet->setCellValue('L'.$eje_y, $n->nombre_departamento);

				$eje_y++;
			endforeach;

			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save("php://output");
		}else{
			$this->mensaje('No existen datos', 'warning');
			redirect('ManejoDB/reportesSimples');
		}
	}
	public function downloadDepartamento()
	{
		$consulta = $this->session->consulta_departamento;
		$this->session->unset_userdata("consulta_departamento");
		$noticias = $this->Noticia_model->noticiaPorDepartamento($consulta);

		if(!empty($consulta))
		{
			$filename = "reporte-departamento.xlsx";
			$ruta = 'assets/info/';
			$plantilla = $ruta.'plantilla-departamento.xlsx';
			header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
			header('Content-Disposition: attachment; filename="' . $filename. '"');
			header('Cache-Control: max-age=0');

			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
			$sheet = $spreadsheet->getActiveSheet();
			$worksheet = $spreadsheet->getActiveSheet();
			$eje_y = 6;
			foreach ($noticias as $n):
				$sheet->setCellValue('A'.$eje_y, $n->idnoticia);
				$sheet->setCellValue('B'.$eje_y, mdate('%m-%d-%Y', $n->fecha_registro));
				$sheet->setCellValue('C'.$eje_y, mdate('%m-%d-%Y', $n->fecha_noticia));
				$sheet->setCellValue('D'.$eje_y, $n->titular);
				$sheet->setCellValue('E'.$eje_y, $n->resumen);
				$sheet->setCellValue('F'.$eje_y, $n->url_noticia);
				$sheet->setCellValue('G'.$eje_y, $n->nombre_medio );
				$sheet->setCellValue('H'.$eje_y, $n->nombre_tipo );
				$sheet->setCellValue('I'.$eje_y, $n->nombre_cuestionario );
				$sheet->setCellValue('J'.$eje_y, $n->username);
				$sheet->setCellValue('K'.$eje_y, $n->nombre_universidad);
				$sheet->setCellValue('L'.$eje_y, $n->nombre_departamento);

				$eje_y++;
			endforeach;

			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save("php://output");
		}else{
			$this->mensaje('No existen datos', 'warning');
			redirect('ManejoDB/reportesSimples');
		}
	}
	public function downloadActor()
	{
		$consulta = $this->session->consulta_actor;
		$this->session->unset_userdata("consulta_actor");
		$noticias = $this->Noticia_model->noticiaPorActor($consulta);

		if(!empty($consulta))
		{
			$filename = "reporte-actor.xlsx";
			$ruta = 'assets/info/';
			$plantilla = $ruta.'plantilla-actor.xlsx';
			header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
			header('Content-Disposition: attachment; filename="' . $filename. '"');
			header('Cache-Control: max-age=0');

			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
			$sheet = $spreadsheet->getActiveSheet();
			$worksheet = $spreadsheet->getActiveSheet();
			$eje_y = 6;
			foreach ($noticias as $n):
				$sheet->setCellValue('A'.$eje_y, $n->idnoticia);
				$sheet->setCellValue('B'.$eje_y, mdate('%m-%d-%Y', $n->fecha_registro));
				$sheet->setCellValue('C'.$eje_y, mdate('%m-%d-%Y', $n->fecha_noticia));
				$sheet->setCellValue('D'.$eje_y, $n->titular);
				$sheet->setCellValue('E'.$eje_y, $n->resumen);
				$sheet->setCellValue('F'.$eje_y, $n->url_noticia);
				$sheet->setCellValue('G'.$eje_y, $n->nombre_medio );
				$sheet->setCellValue('H'.$eje_y, $n->nombre_tipo );
				$sheet->setCellValue('I'.$eje_y, $n->nombre_cuestionario );
				$sheet->setCellValue('J'.$eje_y, $n->username);
				$sheet->setCellValue('K'.$eje_y, $n->nombre_universidad);
				$sheet->setCellValue('L'.$eje_y, $n->nombre_departamento);

				$eje_y++;
			endforeach;

			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save("php://output");
		}else{
			$this->mensaje('No existen datos', 'warning');
			redirect('ManejoDB/reportesSimples');
		}
	}
	public function procesarConsultasimple()
	{
		/*
		 *
		 * Redireccion a reportes simples
		 *
		 */
		$consulta = $this->objetoConsulta();
//                echo "<pre>";var_dump($consulta);echo "</pre>";
		if($consulta->fecha_inicio > $consulta->fecha_fin) //Comprobacion del intervalo de fechas
		{
			$this->mensaje('Intervalo de fechas incorrecto', 'warning');
			redirect('ManejoDB/reportesSimples');
		}
		else{
			/** @noinspection PhpLanguageLevelInspection */
			//Reporte por cuestionario
			if(!empty($this->input->post('cuestionario')))
			{
				if($consulta->idcuestionario == 0)
				{
					$this->mensaje('Sin seleccion', 'warning');
					redirect('ManejoDB/reportesSimples');
				}else{
                                    $cuestionario = $this->Noticia_model->noticiaPorCuestionario($consulta);
					if(empty($cuestionario))
					{
						//Si la consulta esta vacia no se genera reporte
						$this->mensaje('No existen resultados', 'info');
						redirect('ManejoDB/reportesSimples');
					}
					else{
						//Cargar los datos a las session
						$this->session->set_userdata('consulta_cuestionario', []);
						$this->session->set_userdata('consulta_cuestionario', $consulta);
						redirect('ManejoDB/downloadCuestionario');
					}
                                    //Redireccion a rutina de reporte
//					echo "cuestionario";
				}
			}
			elseif (!empty($this->input->post('departamento')))  //Reporte por departamento
			{
				if($consulta->iddepartamento == 0)
				{
					$this->mensaje('Sin seleccion', 'warning');
					redirect('ManejoDB/reportesSimples');
				}else{
                                    $departamento = $this->Noticia_model->noticiaPorDepartamento($consulta);
					if(empty($departamento))
					{
						//Si la consulta esta vacia no se genera reporte
						$this->mensaje('No existen resultados', 'info');
						redirect('ManejoDB/reportesSimples');
					}
					else{
						//Cargar los datos a las session
						$this->session->set_userdata('consulta_departamento', []);
						$this->session->set_userdata('consulta_departamento', $consulta);
						redirect('ManejoDB/downloadDepartamento');
					}
					//Redireccion a rutina de reporte
				}
			}
			elseif (!empty($this->input->post('tipomedio'))) //Reporte por tipo de medio
			{
				if($consulta->idtipomedio == 0)
				{
					$this->mensaje('Sin seleccion', 'warning');
					redirect('ManejoDB/reportesSimples');
				}else{
					//Rutina de reporte
					$noticias = $this->Noticia_model->noticiaPorTipomedio($consulta);
					if(empty($noticias))
					{
						//Si la consulta esta vacia no se genera reporte
						$this->mensaje('No existen resultados', 'info');
						redirect('ManejoDB/reportesSimples');
					}
					else{
						//Cargar los datos a las session
						$this->session->set_userdata('consulta_tipomedio', []);
						$this->session->set_userdata('consulta_tipomedio', $consulta);
						redirect('ManejoDB/downloadTipomedio');
					}
				}
			}
			elseif (!empty($this->input->post('medio'))) //Reporte por medio
			{
				if($consulta->idmedio == 0)
				{
					$this->mensaje('Sin seleccion', 'warning');
					redirect('ManejoDB/reportesSimples');
				}else{
					//Redireccion a rutina de reporte

				}
			}
			elseif (!empty($this->input->post('actor'))) //Reporte por actor
			{
				if($consulta->idactor == 0)
				{
					$this->mensaje('Sin seleccion', 'warning');
					redirect('ManejoDB/reportesSimples');
				}else{
                                    $actor = $this->Noticia_model->noticiaPorActor($consulta);
					if(empty($actor))
					{
						//Si la consulta esta vacia no se genera reporte
						$this->mensaje('No existen resultados', 'info');
						redirect('ManejoDB/reportesSimples');
					}
					else{
						//Cargar los datos a las session
						$this->session->set_userdata('consulta_actor', []);
						$this->session->set_userdata('consulta_actor', $consulta);
						redirect('ManejoDB/downloadActor');
					}
					//Redireccion a rutina de reporte
				}
			}
			elseif (!empty($this->input->post('universidad'))) //Reporte por universidad
			{
				if($consulta->iduniversidad == 0)
				{
					$this->mensaje('Sin seleccion', 'warning');
					redirect('ManejoDB/reportesSimples');
				}else{
					//Redireccion a rutina de reporte
				}
			}
			elseif (!empty($this->input->post('tema'))) //Reporte por tema
			{
				if($consulta->idtema == 0)
				{
					$this->mensaje('Sin seleccion', 'warning');
					redirect('ManejoDB/reportesSimples');
				}else{
					//Redireccion a rutina de reporte
				}
			}
			elseif (!empty($this->input->post('subtema'))) //Reporte por subtema
			{
				if($consulta->idsubtema == 0)
				{
					$this->mensaje('Sin seleccion', 'warning');
					redirect('ManejoDB/reportesSimples');
				}else{
					//Redireccion a rutina de reporte
				}
			}
			else{
				$this->mensaje('Error', 'danger');
				redirect('ManejoDB/reportesSimples');
			}

		}
	}

	public function prueba($consulta)
	{
		echo $consulta->fecha_inicio;
		echo $consulta->fecha_fin;
	}


	public function procesarConsulta()
	{
		//Primer validador
		$consulta = $this->objetoConsulta();

		if($consulta->fecha_inicio > $consulta->fecha_fin)
		{
			$this->mensaje('Intervalo de fechas incorrecto', 'warning');
			redirect('ManejoDB');
		}else{
			//var_dump($consulta);
			$noticias = $this->Noticia_model->reporteNoticias($consulta);
			$noticias_datos = $this->Noticia_model->reportesNoticiasDatos($consulta);
			if(empty($noticias))
			{
				//Si la consulta esta vacia no se genera reporte
				$this->mensaje('No existen resultados', 'info');
				redirect('ManejoDB/reportesCompuestos');
			}
			else{
				//Cargar los datos a las session
				$this->session->set_userdata('consulta', []);
				$this->session->set_userdata('consulta', $consulta);


				redirect('ManejoDB/download');
			}







			/*$noticias = $this->Noticia_model->reporteNoticias($consulta);
			$noticias_datos = $this->Noticia_model->reportesNoticiasDatos($consulta);

			//var_dump($idnoticias);

			$data['idnoticias'] = $noticias;
			$data['noticias'] = $noticias_datos;



			$this->load->view('html/encabezado');
			$this->load->view('html/navbar');
			$this->load->view('manejodb/vexportar_fecha', $data);
			$this->load->view('html/pie');*/

		}
	}



	private function objetoConsulta()
	{
		$ids = new stdClass();
		$ids->fecha_inicio = '';
		$ids->fecha_fin = '';
		$ids->idcuestionario = '';
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
		$ids->idcuestionario = $this->input->post('idcuestionario');
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
		$fecha_std = str_replace('/', '-', $fecha);
		$fecha_unix = strtotime($fecha_std);
		return $fecha_unix;
	}

	//Metodos de respuestas json
	public function getMedios()
	{
		$json = array();
		$this->Cuestionario_model->setTipoMedioID($this->input->post('tipomedioID'));
		$this->Cuestionario_model->setDepartamentoID($this->session->iddepartamento);
		$json = $this->Cuestionario_model->leerMedios();
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	//Metodo de respuestas json
	public function getsubtema()
	{
		$json = array();
		$this->Cuestionario_model->setTemaID($this->input->post('temaID'));
		$this->Cuestionario_model->setDepartamentoID(1);
		$json = $this->Cuestionario_model->leerSubtema();
		header('Content-Type: application/json');
		echo json_encode($json);
	}





}
