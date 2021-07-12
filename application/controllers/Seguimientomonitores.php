<?php

class Seguimientomonitores extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
    }
    public function index()
    {
        $this->load->view('html/encabezado');
        $this->load->view('html/navbar');
        $this->load->view('seguimientom/vseguimientoMonitores');
        $this->load->view('html/pie');
    }
}



