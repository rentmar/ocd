<?php
class Universidad extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->library('session');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Universidad_model');
	}

	public function index()
	{
		$dt['universidades']=0;//$this->Universidad_model->leerUniversidades();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('universidades/vuniversidad',$dt);
		$this->load->view('html/pie');
	}

	public function crearUniversidad()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('universidades/vcrearuniversidad');
		$this->load->view('html/pie');
	}
	public function editarUniversidad($idu)
	{
		$dt['u']=$this->Universidad_model->leerUniversidad($idu);
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('universidades/veditaruniversidad',$dt);
		$this->load->view('html/pie');
	}

	public function agregarUniversidad()
	{
		/*$dts = array(
				'nombre_departamento' => $this->input->post('nombre_departamento'));
		$this->Departamento_model->crearDepartamento($dts);
		redirect ('Universidad');*/
	}
	public function modificarUniversidad($idu)
	{
		/*$dts = array(
				'nombre_departamento' => $this->input->post('nombre_departamento'));
		$this->Departamento_model->updateDepartamento($idd,$dts);
		redirect ('Universidad');*/
	}
}
