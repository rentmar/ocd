<?php

class Seguimientomonitores extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->helper('date');
        $this->load->model('SeguimientoMonitores_model');
        $this->load->model('Cuestionario_model');
        $this->load->model('Ley_model');
        $this->load->library('session');
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
                $SeguimientoM[]=$TablaAuxiliarSm;//se guarda cada vez que se crea un fila "stdClass"
            }
        }
        if(isset($SeguimientoM)){
        $tablaSm['SeguimientoM1']=$SeguimientoM;
        }
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
    public function CuestionariosPorDepartamentoUsuario()
    {
        $DatosSeguimientoM['SeguimientoMonitores']=$this->SeguimientoMonitores_model->leerDepartamentos();
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
                    if($f->nombre_cuestionario == $nDc0->nombre_cuestionario)
                    {
                        $TablaAuxiliarSm->$cuestionarioA=$f->ncuestionario;
                    }
                    else
                    {
                        if($TablaAuxiliarSm->$cuestionarioA == 0)
                        {
                            $TablaAuxiliarSm->$cuestionarioA=0;
                        }
                    }
                }
            }
            else
            {
                $TablaAuxiliarSm=new stdClass();
                $TablaAuxiliarSm->nombre=$f->first_name;
                foreach($DatosSeguimientoM['NumeroDeCuestionarios'] as $ndc1)
                {
                    $cuestionario1=$ndc1->nombre_cuestionario;
                    $TablaAuxiliarSm->$cuestionario1=0;
                }
                foreach($DatosSeguimientoM['NumeroDeCuestionarios'] as $nDc)
                {
                    $cuestionarioA=$nDc->nombre_cuestionario;
                    if($f->nombre_cuestionario == $nDc->nombre_cuestionario)
                    {
                        $TablaAuxiliarSm->$cuestionarioA=$f->ncuestionario;
                    }
                    else
                    {
                        if($TablaAuxiliarSm->$cuestionarioA == 0)
                        {
                            $TablaAuxiliarSm->$cuestionarioA=0;
                        }
                    }
                }
                $SeguimientoM[]=$TablaAuxiliarSm;
            }
        }
        if(isset($SeguimientoM)){
        $tablaSm['SeguimientoM1']=$SeguimientoM;
        }
        $tablaSm['NumeroDeCuestionarios']=$DatosSeguimientoM['NumeroDeCuestionarios'];
/*        echo "<pre>"; var_dump($tablaSm); echo "</pre>";*/
        if(empty($tablaSm))
        {
        redirect('Seguimientomonitores');
        }
         else
         {
        $this->load->view('html/encabezado');
        $this->load->view('html/navbar');
        $this->load->view('seguimientom/vseguimientoMonitoresTabla1',$tablaSm);
        $this->load->view('html/pie');
        }
    }

    public function EstadoObservacionElectoralXuniversidad()
    {
        $log_user=$this->ion_auth->user()->row();
//        echo "<pre>";var_dump($prueba);echo "</pre>";
        $DatosSeguimientoM['SeguimientoMonitores']=$this->SeguimientoMonitores_model->leerSeguimientoMonitoresxUniversidad($log_user);
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
//                    $feechaa='fecha '.$cuestionarioA;
                    if($f->nombre_cuestionario == $nDc0->nombre_cuestionario)
                    {
//                        $TablaAuxiliarSm->$feechaa=date('d-m-Y',$f->fecha_registro);
                        $TablaAuxiliarSm->$cuestionarioA=$f->ncuestionario;
                    }
                    else
                    {
                        //var_dump($TablaAuxiliarSm->$feechaa);
                        if(/*$TablaAuxiliarSm->$feechaa == 0 &&*/ $TablaAuxiliarSm->$cuestionarioA == 0)
                        {
//                            $TablaAuxiliarSm->$feechaa=0;
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
//                    $feecha='fecha '.$cuestionarioA;
                    if($f->nombre_cuestionario == $nDc->nombre_cuestionario)
                    {
//                        $TablaAuxiliarSm->$feecha=date('d-m-Y',$f->fecha_registro);
                        $TablaAuxiliarSm->$cuestionarioA=$f->ncuestionario;
                    }
                    else
                    {
                        //var_dump($TablaAuxiliarSm->$feechaa);
                        if(/*$TablaAuxiliarSm->$feecha == 0 &&*/ $TablaAuxiliarSm->$cuestionarioA == 0)
                        {
//                            $TablaAuxiliarSm->$feecha=0;
                            $TablaAuxiliarSm->$cuestionarioA=0;
                        }
                    }
                }
                $SeguimientoM[]=$TablaAuxiliarSm;
            }
        }
         if(isset($SeguimientoM)){
        $tablaSm['SeguimientoM1']=$SeguimientoM;
         }
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
        $this->load->view('seguimientom/vseguimientoMonitoresXuniversidad',$tablaSm);
        $this->load->view('html/pie');
        }
    }

    public function leyesTabla()
	{
		$usuario = $this->ion_auth->user()->row();
		$leyes = $this->Ley_model->leerTodasLasLeyesEstado();
		$dt['leyes'] = $leyes;

		//var_dump($leyes);

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('seguimientom/vseguimientoMonitores_leyes',$dt);
		$this->load->view('html/pie');
	}
    public function editarl($idm)
    {
        $dat['leyes']=$this->SeguimientoMonitores_model->leerLey($idm);
        $this->session->set_userdata($dat);
//        echo "<pre>";var_dump($dat);echo "</pre>";
        
        $this->load->view('html/encabezado');
        $this->load->view('html/navbar');
        $this->load->view('seguimientom/vley',$dat);
        $this->load->view('html/pie');
    }
    public function actualizarLey($w1)
    {
        $prueba=date('d/m/Y',$this->input->post('fechaReg'));
        
        echo "<pre>";var_dump($prueba,$w1);echo "</pre>";
//        $this->SeguimientoMonitores_model->escribirFechReg($fR);
    }
}
