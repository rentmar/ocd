<?php

class Formulario extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->library('session');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Formulario_model');

	}
	public function index()
	{
		$dt['formularios']=$this->Formulario_model->leerCuestionarios();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('formularios/vcuestionario',$dt);
		$this->load->view('html/pie');
	}
	public function crearFormulario()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('formularios/vcrearcuestionario');
		$this->load->view('html/pie');
	}
	public function editarFormulario($idf)
	{
		$dt['editform']=$this->Formulario_model->leerCuestionarioPorId($idf);
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('formularios/veditarcuestionario',$dt);
		$this->load->view('html/pie');
	}
	public function agregarFormulario()
	{
		$dts = array(
				'nombre_cuestionario'=>$this->input->post('nombre_cuestionario'));
		$this->Formulario_model->agregarFormulario($dts);
		redirect ('Formulario');
	}
	public function modificarFormulario($idf)
	{
		$dts = array(
				'nombre_cuestionario'=>$this->input->post('nombre_cuestionario'));
		$this->Formulario_model->modificarFormulario($dts,$idf);
		redirect ('Formulario');
	}
}
