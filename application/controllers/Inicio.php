<?php

class Inicio extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');

	}

	public function index()
	{
		/*$usuario = $this->ion_auth->user()->row();
		echo $usuario->first_name;
		echo "<br>";
		echo $usuario->last_name;
		echo "<br>";
		echo $usuario->email;
		echo "<br>";
		echo $usuario->carnet_identidad;
		echo "<br>";
		echo $usuario->geolocalizacion ;
		echo "<br>";
		echo $usuario->rel_iddepartamento;
		echo "<br>";
		echo $usuario->direccion;*/

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('inicio/vinicio_index');
		$this->load->view('html/pie');
	}
}
