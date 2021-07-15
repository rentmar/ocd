<?php

class Seguimientomonitores extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->model('SeguimientoMonitores_model');
    }
    public function index()
    {
        $this->load->view('html/encabezado');
        $this->load->view('html/navbar');
        $this->load->view('seguimientom/vseguimientoMonitores');
        $this->load->view('html/pie');
    }
    public function EstadoObservacionElectoral()
    {
        $DatosSeguimientoM['SeguimientoMonitores']=$this->SeguimientoMonitores_model->leerSeguimientoMonitores();
        $DatosSeguimientoM['NumeroDeCuestionarios']=$this->SeguimientoMonitores_model->leerCuestionarios();
//        $DatosSeguimientoM['nCuestionariosPorMonitor']=$this->SeguimientoMonitores_model->leerCuestionariosPorMonitor();
//        $DatosSeguimientoM['UsuariosMonitor']=$this->SeguimientoMonitores_model->leerUsuariosMonitor();
        //var_dump($DatosSeguimientoM);
        $this->load->view('html/encabezado');
        $this->load->view('html/navbar');
        $this->load->view('seguimientom/vseguimientoMonitoresTabla',$DatosSeguimientoM);
        $this->load->view('html/pie');
    }
}



