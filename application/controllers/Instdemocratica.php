<?php

class Instdemocratica extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{

		$this->load->view('cuestionarios/vinst_democratica');
	}

}
