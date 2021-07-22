<?php

class Censo extends CI_Controller
{
	protected $_idformulario;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Censo_model');
		$this->load->model('Noticia_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->library('ion_auth');
		$this->_idformulario = 3;
        $this->load->library('form_validation');
		//Comprobacion de session
		/*if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}*/

	}

	public function index()
	{
		

	}
	
	private function fecha_unix($fecha)
	{
		list($anio, $mes, $dia) = explode('-', $fecha);
		$fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
		return $fecha_unix;
	}

	

}
