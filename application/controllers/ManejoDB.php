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
		//$this->load->model('ManejoDB_model');

	}
	public function index()
	{	
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('manejodb/viniciodb');
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



}
