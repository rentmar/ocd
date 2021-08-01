<?php

class Ley extends CI_Controller
{
//    protected $_idformulario;
    public function __construct()
    {
        	parent::__construct();
                $this->settings = new stdClass();
                $this->load->model('Ley_model');
                
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
        $DatosLeyes['Leyes']=$this->Ley_model->leerLeyes();       
        $DatosLeyes['nEstadoDeLeyes']=$this->Ley_model->leerEstadoDeLeyes();
        $TablaAuxiliarLey=new stdClass();
        $TablaAuxiliarLey->nombre='xxxxxxx';
        foreach ($DatosLeyes['Leyes'] as $f)
        {
            if($f->nombre_ley == $TablaAuxiliarLey->nombre)
            {
                foreach($DatosLeyes['nEstadoDeLeyes'] as $nDc0)
                {
                    if($f->nombre_estadoley == $nDc0->nombre_estadoley)
                    {
                        $cuestionarioA=$nDc0->nombre_estadoley;
                        $TablaAuxiliarLey->$cuestionarioA=$f->codigo_ley;
                    }
                }
            }
            else
            {
                $TablaAuxiliarLey=new stdClass();
                $TablaAuxiliarLey->nombre=$f->nombre_ley;
                foreach($DatosLeyes['nEstadoDeLeyes'] as $ndc1)
                {
                    $cuestionario1=$ndc1->nombre_estadoley;
                    $TablaAuxiliarLey->$cuestionario1=0;
                }
                foreach($DatosLeyes['nEstadoDeLeyes'] as $nDc)
                {
                    if($f->nombre_estadoley == $nDc->nombre_estadoley)
                    {
                        $cuestionarioA=$nDc->nombre_estadoley;
                        $TablaAuxiliarLey->$cuestionarioA=$f->codigo_ley;
                    }
                }
                $Leyes[]=$TablaAuxiliarLey;
            }
        }
//        echo "<pre>";var_dump($Leyes);echo "</pre>";
        $tablaLey['Leyes1']=$Leyes;
//        $tablaLey['NumeroDeCuestionarios']=$DatosLeyes['nEstadoDeLeyes'];
        if(empty($tablaLey))
        {
        redirect('Ley');
        }
         else
         {
        $this->load->view('html/encabezado');
        $this->load->view('html/navbar');
        $this->load->view('ley/vley0',$tablaLey);
        $this->load->view('html/pie');
        }
    }

}
