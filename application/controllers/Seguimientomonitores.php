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

        $TablaAuxiliarSm=new stdClass();
        $TablaAuxiliarSm->nombre=0;
        foreach ($DatosSeguimientoM['SeguimientoMonitores'] as $f)
        {
            if($f->first_name === $TablaAuxiliarSm->nombre)
            {
                foreach($DatosSeguimientoM['NumeroDeCuestionarios'] as $nDc0)
                {
                    $cuestionarioA=$nDc0->nombre_cuestionario;
                    $feechaa='fecha '.$cuestionarioA;
                    if($f->nombre_cuestionario == $nDc0->nombre_cuestionario)
                    {
                        $TablaAuxiliarSm->$feechaa=date('d-m-Y',$f->fecha_registro);
                        $TablaAuxiliarSm->$cuestionarioA=$f->ncuestionario;
                    }
                    else
                    {
                        //var_dump($TablaAuxiliarSm->$feechaa);
                        if(/*$TablaAuxiliarSm->$feechaa == 0 &&*/ $TablaAuxiliarSm->$cuestionarioA == 0)
                        {
                            $TablaAuxiliarSm->$feechaa=0;
                            $TablaAuxiliarSm->$cuestionarioA=0;
                        }
                    }
                }
            }
            else
            {
                $TablaAuxiliarSm=new stdClass();
                $TablaAuxiliarSm->nombre=$f->first_name;
                $TablaAuxiliarSm->apellido=$f->last_name;
                $TablaAuxiliarSm->departamento=$f->nombre_departamento;
                foreach($DatosSeguimientoM['NumeroDeCuestionarios'] as $ndc1)
                {
                    $cuestionario1=$ndc1->nombre_cuestionario;
                    $TablaAuxiliarSm->$cuestionario1=0;
                }
                foreach($DatosSeguimientoM['NumeroDeCuestionarios'] as $nDc)
                {
                    $cuestionarioA=$nDc->nombre_cuestionario;
                    $feecha='fecha '.$cuestionarioA;
                    if($f->nombre_cuestionario == $nDc->nombre_cuestionario)
                    {
                        $TablaAuxiliarSm->$feecha=date('d-m-Y',$f->fecha_registro);
                        $TablaAuxiliarSm->$cuestionarioA=$f->ncuestionario;
                    }
                    else
                    {
                        //var_dump($TablaAuxiliarSm->$feechaa);
                        if(/*$TablaAuxiliarSm->$feecha == 0 &&*/ $TablaAuxiliarSm->$cuestionarioA == 0)
                        {
                            $TablaAuxiliarSm->$feecha=0;
                            $TablaAuxiliarSm->$cuestionarioA=0;
                        }
                    }
                }
                $SeguimientoM[]=$TablaAuxiliarSm;
            }
        }
        $tablaSm['SeguimientoM1']=$SeguimientoM;
        $tablaSm['NumeroDeCuestionarios']=$DatosSeguimientoM['NumeroDeCuestionarios'];
/*        echo "<pre>";
        var_dump($tablaSm);
        echo "</pre>";*/
 /*       echo "<pre>";
        var_dump($DatosSeguimientoM['SeguimientoMonitores']);
        echo "</pre>";*/
        if(empty($tablaSm))
        {
        redirect('Seguimientomonitores');
        
        }
         else
         {
        //var_dump($DatosSeguimientoM);
        $this->load->view('html/encabezado');
        $this->load->view('html/navbar');
        $this->load->view('seguimientom/vseguimientoMonitoresTabla',$tablaSm);
        $this->load->view('html/pie');
        }
    }
}



