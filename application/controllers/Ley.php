<?php

class Ley extends CI_Controller
{
    protected $_idformulario;
    public function __construct()
    {
        	parent::__construct();
                	$this->load->model('Cuestionario_model');
		$this->load->model('Noticia_model');
		$this->load->model('MedioComunicacion_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->library('ion_auth');
		$this->_idformulario = 4;
                $this->load->library('form_validation');
		//Comprobacion de session
		if($this->session->sesion_activa ===  null)
                {
                    $this->session->sess_destroy();
                    redirect('/');
		}
    }
    public function index()
    {
        
        
        $this->load->view('html/encabezado');
        $this->load->view('html/navbar');
        $this->load->view('ley/vley0');
        $this->load->view('html/pie');
    }
}
