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
		$tema = $this->Tema_model->leerTemasForms();
		$stema = $this->SubTema_model->leerSubtemasForms();
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
		$tema = $this->Tema_model->leerTemasForms();
		$stema = $this->SubTema_model->leerSubtemasForms();
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
		$consulta = $this->session->consulta;
		$noticia = $this->Noticia_model->reporteNoticias($consulta);
		$noticia_datos = $this->Noticia_model->reportesNoticiasDatos($consulta);
		if(!empty($consulta))
		{
			$filename = "reporte.xlsx";
			$ruta = 'assets/info/';
			$plantilla = $ruta.'plantilla-reportes.xlsx';
			header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
			header('Content-Disposition: attachment; filename="' . $filename. '"');
			header('Cache-Control: max-age=0');
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
			$sheet = $spreadsheet->getActiveSheet();
			$worksheet = $spreadsheet->getActiveSheet();
			$eje_y = 6;

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

			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save("php://output");

		}else{
			$this->mensaje('No existen datos', 'warning');
			redirect('ManejoDB/reportesCompuestos');

		}

	}

	public function downloadUniversidad()
	{
		$consulta = $this->session->consulta_universidad;
		$this->session->unset_userdata("consulta_universidad");
		$noticias = $this->Noticia_model->noticiaPorUniversidad($consulta);

		if(!empty($consulta))
		{
			$filename = "reporte-universidad.xlsx";
			$ruta = 'assets/info/';
			$plantilla = $ruta.'plantilla-universidad.xlsx';
			header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
			header('Content-Disposition: attachment; filename="' . $filename. '"');
			header('Cache-Control: max-age=0');

			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
			$sheet = $spreadsheet->getActiveSheet();
			$worksheet = $spreadsheet->getActiveSheet();
			$eje_y = 6;

			//Colocar el tipo de medio
			$universidad = $this->Universidad_model->leerUniversidadId($consulta->iduniversidad);
			$sheet->setCellValue('E3', $universidad->nombre_universidad);

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

	public function downloadTema()
	{

		$consulta = $this->session->consulta_tema;
		$this->session->unset_userdata("consulta_tema");
		$noticias = $this->Noticia_model->noticiaPorTemas($consulta);

		if(!empty($consulta)){
			$filename = "reporte-tema.xlsx";
			$ruta = 'assets/info/';
			$plantilla = $ruta.'plantilla-tema.xlsx';
			header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
			header('Content-Disposition: attachment; filename="' . $filename. '"');
			header('Cache-Control: max-age=0');
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
			$sheet = $spreadsheet->getActiveSheet();
			$worksheet = $spreadsheet->getActiveSheet();
			$eje_y = 6;

			//Colocar el tipo de medio
			$tema = $this->Cuestionario_model->leerTemaPorId($consulta->idtema);
			$sheet->setCellValue('E3', $tema->nombre_tema);

			foreach ($noticias as $n):

				$nt = $this->Noticia_model->noticiaPorId($n->idnoticia);
				$sheet->setCellValue('A'.$eje_y, $nt->idnoticia);
				$sheet->setCellValue('B'.$eje_y, mdate('%m-%d-%Y', $nt->fecha_registro));
				$sheet->setCellValue('C'.$eje_y, mdate('%m-%d-%Y', $nt->fecha_noticia));
				$sheet->setCellValue('D'.$eje_y, $nt->titular);
				$sheet->setCellValue('E'.$eje_y, $nt->resumen);
				$sheet->setCellValue('F'.$eje_y, $nt->url_noticia);
				$sheet->setCellValue('G'.$eje_y, $nt->nombre_medio );
				$sheet->setCellValue('H'.$eje_y, $nt->nombre_tipo );
				$sheet->setCellValue('I'.$eje_y, $nt->nombre_cuestionario );
				$sheet->setCellValue('J'.$eje_y, $nt->username);
				$sheet->setCellValue('K'.$eje_y, $nt->nombre_universidad);
				$sheet->setCellValue('L'.$eje_y, $nt->nombre_departamento);

				$eje_y++;
			endforeach;



			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save("php://output");
		}else{
			$this->mensaje('No existen datos', 'warning');
			redirect('ManejoDB/reportesSimples');
		}

		/*if(!empty($consulta))
		{
			$filename = "reporte-tema.xlsx";
			$ruta = 'assets/info/';
			$plantilla = $ruta.'plantilla-universidad.xlsx';
			header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
			header('Content-Disposition: attachment; filename="' . $filename. '"');
			header('Cache-Control: max-age=0');

			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
			$sheet = $spreadsheet->getActiveSheet();
			$worksheet = $spreadsheet->getActiveSheet();
			$eje_y = 6;

			//Colocar el tipo de medio
			$tema = $this->Universidad_model->leerTemaPorId($consulta->idtema);
			$sheet->setCellValue('E3', $tema->nombre_tema);

			foreach ($noticias as $n):

				$nt = $this->Noticia_model->noticiaPorId($n->idnoticia);

				$sheet->setCellValue('B'.$eje_y, mdate('%m-%d-%Y', $nt->fecha_registro));
				$sheet->setCellValue('C'.$eje_y, mdate('%m-%d-%Y', $nt->fecha_noticia));
				$sheet->setCellValue('D'.$eje_y, $nt->titular);
				$sheet->setCellValue('E'.$eje_y, $nt->resumen);
				$sheet->setCellValue('F'.$eje_y, $nt->url_noticia);
				$sheet->setCellValue('G'.$eje_y, $nt->nombre_medio );
				$sheet->setCellValue('H'.$eje_y, $nt->nombre_tipo );
				$sheet->setCellValue('I'.$eje_y, $nt->nombre_cuestionario );
				$sheet->setCellValue('J'.$eje_y, $nt->username);
				$sheet->setCellValue('K'.$eje_y, $nt->nombre_universidad);
				$sheet->setCellValue('L'.$eje_y, $nt->nombre_departamento);

				$eje_y++;
			endforeach;

			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save("php://output");
		}else{
			$this->mensaje('No existen datos', 'warning');
			redirect('ManejoDB/reportesSimples');
		}*/
	}

	public function downloadTipomedio()
	{
		$consulta = $this->session->consulta_tipomedio;
		$this->session->unset_userdata("consulta_tipomedio");
		$noticias = $this->Noticia_model->noticiaPorTipomedio($consulta);

		if(!empty($consulta))
		{
			$filename = "reporte-tipo-medio.xlsx";
			$ruta = 'assets/info/';
			$plantilla = $ruta.'plantilla-tipomedio.xlsx';
			header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
			header('Content-Disposition: attachment; filename="' . $filename. '"');
			header('Cache-Control: max-age=0');

			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
			$sheet = $spreadsheet->getActiveSheet();
			$worksheet = $spreadsheet->getActiveSheet();
			$eje_y = 6;

			//Colocar el tipo de medio
			$tipo_medio = $this->Cuestionario_model->leerTipoMedioPorId($consulta->idtipomedio);
			$sheet->setCellValue('E3', $tipo_medio->nombre_tipo);

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
		$cuestionario = $this->Cuestionario_model->leerCuestionario($consulta->idcuestionario);

		if(!empty($consulta))
		{
			$filename = "reporte-cuestionario.xlsx";
			$ruta = 'assets/info/';
			$plantilla = $ruta.'plantilla-formulario.xlsx';
			header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet‌​ml.sheet");
			header('Content-Disposition: attachment; filename="' . $filename. '"');
			header('Cache-Control: max-age=0');

			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($plantilla);
			$sheet = $spreadsheet->getActiveSheet();
			$worksheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('E3', $cuestionario->nombre_cuestionario);
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
		$departamento = $this->Departamento_model->leerDepartamento($consulta->iddepartamento);

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
			$sheet->setCellValue('E3', $departamento->nombre_departamento);
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
		$actor = $this->Actor_model->leerActorID($consulta->idactor);

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
			$sheet->setCellValue('E3', $actor->nombre_actor );
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
					$noticias = $this->Noticia_model->noticiaPorUniversidad($consulta);
					if(empty($noticias))
					{
						//Si la consulta esta vacia no se genera reporte
						$this->mensaje('No existen resultados', 'info');
						redirect('ManejoDB/reportesSimples');
					}
					else{
						//Cargar los datos a las session
						$this->session->set_userdata('consulta_universidad', []);
						$this->session->set_userdata('consulta_universidad', $consulta);
						redirect('ManejoDB/downloadUniversidad');
					}
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
					$noticias = $this->Noticia_model->noticiaPorTemas($consulta);
					if(empty($noticias))
					{
						//Si la consulta esta vacia no se genera reporte
						$this->mensaje('No existen resultados', 'info');
						redirect('ManejoDB/reportesSimples');
					}
					else{
						//Cargar los datos a las session
						$this->session->set_userdata('consulta_tema', []);
						$this->session->set_userdata('consulta_tema', $consulta);
						redirect('ManejoDB/downloadTema');
					}
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

	//
	public function noticiasAdministrador()
	{
		//$usuario = $this->ion_auth->user()->row();
		//$cantidad_noticia = $this->session->noticia_editable;


		$dt['noticias'] =$this->Noticia_model->leerTodasLasNoticias();
		//$dt['cuestionario'] = $this->Cuestionario_model->leerCuestionario($this->_idformulario);
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('manejodb/vmanejodb_listanot', $dt);
		$this->load->view('html/pie');

	}

	public function cambiarEstado($identificador)
	{
		$idnoticia = $identificador;
		$noticia = $this->Noticia_model->noticiaPorId($idnoticia);
		if($noticia->esta_activa)
		{
			//Esta activa, funcion complementaria
			$estado = 0;
		}else{
			//No esta activa, funcion complementaria
			$estado = 1;
		}
		$this->Noticia_model->cambiarEstado($idnoticia, $estado);
		redirect('manejoDB/noticiasAdministrador');
	}





}
