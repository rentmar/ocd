<?php

class Graficos extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->library('session');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Graficos_model');

	}
	public function index()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('graficos/vgraficosinicio');
		$this->load->view('html/pie');
	}
	public function graficouno()
	{
		echo "primer grafico";
	}
}
