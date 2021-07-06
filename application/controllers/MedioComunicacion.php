<?php

class MedioComunicacion extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->library('session');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('MedioComunicacion_model');

	}
	public function index()
	{
		/*$dt['departamentos']=$this->MedioComunicacion_model->leerDepartamento();
		$dt['tipos']=$this->MedioComunicacion_model->leerTipoMedio();
		//$this->load->view('medio_comunicacion/vagregarmedio',$dt);
		// para el edit
		$idm=12;
		$dt['medio']=$this->MedioComunicacion_model->leerMedioPorId($idm);
		$dt['medio_departamento']=$this->MedioComunicacion_model->leerDepartamentoMedioId($idm);
		//echo var_dump($dt['medio_departamento']);*/
		$dt['medios']=$this->MedioComunicacion_model->leerMedioComunicacion();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('medio_comunicacion/vmediocomunicacion',$dt);
		$this->load->view('html/pie');
	}
	public function agregarMedioComunicacion()
	{
		$dtchkbox=array();
		$departamentos=$this->MedioComunicacion_model->leerDepartamento();
		$dts = array(
				'nombre_medio' => $this->input->post('nombre_medio'),
				'rel_idtipomedio'=> $this->input->post('rel_idtipomedio'));
		foreach ($departamentos as $d)
		{
			if ($this->input->post('d'.$d->iddepartamento) != NULL)
			{
				array_push($dtchkbox,$this->input->post('d'.$d->iddepartamento));
			}
		}
		$this->MedioComunicacion_model->agregarMedioComunicacion($dts,$dtchkbox);
	}
	public function modificarMedioComunicacion($idm)
	{
		$departamentos=$this->MedioComunicacion_model->leerDepartamento();
		echo count($departamentos);
		$dts = array(
				'nombre_medio' => $this->input->post('nombre_medio'),
				'rel_idtipomedio'=> $this->input->post('rel_idtipomedio'));
		$iddpto=$this->input->post('rel_iddepartamento');
		$this->MedioComunicacion_model->modificarMedioComunicacion($dts,$iddpto,$idm);
	}
}
