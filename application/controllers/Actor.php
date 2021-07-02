<?php

class Actor extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->library('session');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Actor_model');

	}
	public function index()
	{
	    $this->load->view('actor/vactor');		
	}
	public function agregarActor()
	{
		$dts = array(
				'nombre_actor' => $this->input->post('nombre_actor'));
		$this->Actor_model->agregarActor($dts);
	}
	public function modificarActor($ida)
	{
		$dts = array(
				'nombre_actor' => $this->input->post('nombre_actor'));
		$this->Actor_model->modificarActor($dts,$ida);
		
	}
}
