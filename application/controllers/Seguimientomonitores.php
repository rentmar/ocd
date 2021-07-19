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
            echo"<pre>";echo 'foreach1***********';echo"</pre>";
            echo ($f->first_name);
            echo ($TablaAuxiliarSm->nombre);
            if($f->first_name === $TablaAuxiliarSm->nombre)
            {
                echo"<pre>";echo'if1si***********';echo"</pre>";
                foreach($DatosSeguimientoM['NumeroDeCuestionarios'] as $nDc0)
                {
                    echo"<pre>";echo'foreach2***********';echo"</pre>";
                    $cuestionarioA=$nDc0->nombre_cuestionario;
//                    $feecha='fecha '.$cuestionarioA;
                    if($f->nombre_cuestionario === $nDc0->nombre_cuestionario)
                    {
                        echo"<pre>";echo'if2si***********';echo"</pre>";
//                        $TablaAuxiliarSm->$feecha=$f->fecha_registro;
                        $TablaAuxiliarSm->$cuestionarioA=$f->ncuestionario;
                    }
                    else
                    {
                        echo"<pre>";echo'if2no***********';echo"</pre>";
                        if(/*$TablaAuxiliarSm->$feecha === 0 &&*/ $TablaAuxiliarSm->$cuestionarioA === 0)
                        {
                            echo"<pre>";echo 'if3no***********';echo"</pre>";
//                            $TablaAuxiliarSm->$feecha=0;
                            $TablaAuxiliarSm->$cuestionarioA=0;
                        }
                    }
                }
            }
            else
            {
                echo"<pre>";echo 'if1no*********** CREA TABLA';echo"</pre>";
                $TablaAuxiliarSm=new stdClass();
                $TablaAuxiliarSm->nombre=$f->first_name;
                $TablaAuxiliarSm->apellido=$f->last_name;
                $TablaAuxiliarSm->departamento=$f->nombre_departamento;
//                echo"<pre>";var_dump($TablaAuxiliarSm);echo"</pre>";
                foreach($DatosSeguimientoM['NumeroDeCuestionarios'] as $ndc1)
                {
                    echo"<pre>";echo 'foreach3***********';echo"</pre>";
                    $cuestionario1=$ndc1->nombre_cuestionario;
                    $TablaAuxiliarSm->$cuestionario1=0;
                }
                foreach($DatosSeguimientoM['NumeroDeCuestionarios'] as $nDc)
                {
                    echo"<pre>";echo 'foreach4***********';echo"</pre>";
                    $cuestionarioA=$nDc->nombre_cuestionario;
//                    $feecha='fecha '.$cuestionarioA;
                    if($f->nombre_cuestionario === $nDc->nombre_cuestionario)
                    {
                        echo"<pre>";echo 'if4si***********';echo"</pre>";
//                        $TablaAuxiliarSm->$feecha=$f->fecha_registro;
                        $TablaAuxiliarSm->$cuestionarioA=$f->ncuestionario;
                    }
                    else
                    {
                        echo"<pre>"; echo 'if4no***********'; echo"</pre>";
                        if(/*$TablaAuxiliarSm->$feecha === 0 &&*/ $TablaAuxiliarSm->$cuestionarioA === 0)
                        {
                            echo"<pre>"; echo 'if5no***********'; echo"</pre>";
//                            $TablaAuxiliarSm->$feecha=0;
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
//        var_dump($DatosSeguimientoM['SeguimientoMonitores']);

        //var_dump($DatosSeguimientoM);
        $this->load->view('html/encabezado');
        $this->load->view('html/navbar');
        $this->load->view('seguimientom/vseguimientoMonitoresTabla',$tablaSm);
        $this->load->view('html/pie');
    }
}



