<?php

class Repositorio extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');

	}
	public function index()
	{

		$this->load->view('repositorio/encabezado');
		$this->load->view('repositorio/navbar');
		$this->load->view('repositorio/vrepositorio_inicio');
		$this->load->view('repositorio/pie');

	}
}
