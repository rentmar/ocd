<?php

class Ley extends CI_Controller
{
//    protected $_idformulario;
    public function __construct()
    {

        	parent::__construct();
        $this->settings = new stdClass();
        $this->load->model('Ley_model');
		$this->load->model('Cuestionario_model');
		$this->load->model('Noticia_model');
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
    	$data['Leyes'] = $this->Ley_model->leerAllLeyes();


		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('ley/vley0',$data);
		$this->load->view('html/pie');
        /*$DatosLeyes['Leyes']=$this->Ley_model->leerLeyes();
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
        }*/
    }

	public function crearley()
	{
		//Variables de sesion
		//var_dump($this->session->userdata());
		//echo "<br><br>";

		/*
		 * COMPROBAR SI SE CREA NUEVA NUEVA NOTICIA
		 */
		if(!$this->session->es_nueva_ley)
		{
			//Nueva noticia inactiva
			$this->session->set_userdata('es_nueva_ley', true);
			$ley_objeto = $this->objetoLey();
			$this->session->set_userdata('ley_nueva', []);
			$this->session->set_userdata('ley_nueva', $ley_objeto);
			$ley = $this->session->ley_nueva;
			$data['ley'] = $ley;
		}else{
			//Nueva noticia activa
			$ley = $this->session->ley_nueva;
			$data['ley'] = $ley;
		}

		/*
		 * DATOS PARA LLENADO DE FORMULARIO
		 */
		//Informacion del usuario logueado
		$usuario = $this->ion_auth->user()->row();
		//Temas
		$this->Cuestionario_model->setCuestionarioID($this->_idformulario);
		$tema = $this->Cuestionario_model->leerTema();

		$data['tema'] = $tema;
		$data['estado_ley'] = $this->Cuestionario_model->leerEstadosDeLey();
		$data['fuente_ley'] = $this->Cuestionario_model->leerFuentesDeLey();
		$data['idformulario'] = $this->_idformulario;
		$data['idusuario'] = $usuario->id;


		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vleyes_form', $data);
		$this->load->view('html/pie');

	}

	public function subtemas()
	{
		//Extraer la variable de session
		$ley = $this->session->ley_nueva;
		//var_dump($ley);
		if(!$ley->es_segundo_paso)
		{
			//Capturar temas
			$temas = $this->input->post('idtema[]');
			$ley->temas = $temas;

			//Datos generales
			$ley->fecha_ley = $this->fecha_unix($this->input->post('fecha'));
			$ley->fuente = $this->input->post('idfuente');
			$ley->estado = $this->input->post('idestadoley');
			$ley->codigo = $this->input->post('codigo_ley');
			$ley->titulo = $this->input->post('nombreley');
			$ley->resumen = $this->input->post('resumen');
			$ley->url_ley = $this->input->post('url_ley');

			$ley->rel_idusuario = $this->input->post('idusuario');
			$ley->rel_idcuestionario = $this->input->post('idformulario');

			$otro_tema = $this->input->post('tema0');
			$ley->otro_tema = $otro_tema;
			$ley->es_segundo_paso= true;

			//Actualizar la variable de session
			$this->session->set_userdata('ley_nueva', []);
			$this->session->set_userdata('ley_nueva', $ley);
		}else{
			$ley = $this->session->ley_nueva;
		}
		$data['ley'] = $ley;
		$this->Cuestionario_model->setTemaIDs($ley->temas);
		$temas_sel = $this->Cuestionario_model->leerTemasPorIDs();
		$subtemas_sel = $this->Cuestionario_model->leerSubtemasPorIDs();
		$data['temas_sel'] = $temas_sel;
		$data['subtemas_sel'] = $subtemas_sel;
		$data['estado_ley'] = $this->Cuestionario_model->leerEstadosDeLeyID($ley->estado);

		/*
		 * CARGA DE VISTAS
		 */
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vley_subtemas', $data);
		$this->load->view('html/pie');

	}

	private function objetoLey()
	{
		$ley = new stdClass;
		$ley->idley = '';
		$ley->fecha_registro = '';
		$ley->fecha_ley = '';
		$ley->fuente = '';
		$ley->estado = '';

		$ley->codigo = '';
		$ley->titulo = '';

		$ley->resumen = '';
		$ley->url_ley = '';

		$ley->rel_idcuestionario = '';
		$ley->rel_idusuario = '';

		$ley->iddepartamento = '';

		$ley->temas = [];
		$ley->subtemas = [];

		$ley->es_segundo_paso = false;
		$ley->es_preenvio = false;

		return $ley;
	}

	public function preenvio()
	{
		//Extraer la variable de session nueva noticia
		$ley = $this->session->ley_nueva;
		//var_dump($ley);
		if(!$ley->es_preenvio)
		{
			//Definir la fecha de registro de la ley
			$ley->fecha_registro = now();
			//definir los identificadores de los subtemas
			$idtemas = array_filter($ley->temas) ;
			//Capturar subtemas
			$subtemas = [];
			foreach ($idtemas as $t)
			{
				$subtemas[$t] = $this->input->post('tema'.$t);
			}
			$ley->subtemas = $subtemas; //Guardar los subtemas
			//Capturar otros subtemas
			$otros_subtemas = [];
			foreach ($idtemas as $t)
			{
				$otros_subtemas[$t] = $this->input->post('otrosubtema'.$t);
			}
			$ley->otros_subtemas = $otros_subtemas; //Guardar otros subtemas
			//Actualizar la bandera de cambio
			$ley->es_preenvio = true;

			//Colocar la ley en la pila de insercion
			//Colocar la noticia en la pila de insercion
			$this->session->set_userdata('ley_insert', []);
			$this->session->set_userdata('ley_insert', $ley);

			//Actualizar la variable de session
			$this->session->set_userdata('ley_nueva', []);
			$this->session->set_userdata('ley_nueva', $ley);
		}else{
			$ley = $this->session->ley_nueva;
		}
		$this->Cuestionario_model->setTemaIDs($ley->temas);
		$temas_sel = $this->Cuestionario_model->leerTemasPorIDs();
		$subtemas_sel = $this->Cuestionario_model->leerSubtemasPorIDs();

		$datos['temas_sel'] = $temas_sel;
		$datos['subtemas_sel'] = $subtemas_sel;
		$datos['ley'] = $ley;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vley_preenvio',$datos);
		$this->load->view('html/pie');


	}

	//Registrar ley en la db
	public function registrarley()
	{
		$ley = $this->session->ley_insert;
		//$this->Noticia_model->crearNoticia($noticia);
		if($this->Noticia_model->crearLey($ley))
		{
			$this->session->set_userdata('nuevo_c1', false);
			$this->session->set_userdata('reforma', []);
			$this->session->set_userdata('nuevo_c2', false);
			$this->session->set_userdata('inst', []);
			$this->session->set_userdata('noticia_insert', []);
			$this->session->set_userdata('es_nueva_noticia', false);
			$this->session->set_userdata('noticia_nueva', []);
			$this->session->set_userdata('es_nueva_noticia1', false);
			$this->session->set_userdata('noticia_nueva1', []);
			$this->session->set_userdata('es_nueva_noticia2', false);
			$this->session->set_userdata('noticia_nueva2', []);
			$this->session->set_userdata('es_nueva_ley', false);
			$this->session->set_userdata('ley_nueva', []);
			redirect('/');
		}else{
			echo "Error";
		}

	}



	//Rutina de dd/mm/AA a unix timestamp
	private function fecha_unix($fecha)
	{
		$fecha_std = str_replace('/', '-', $fecha);
		$fecha_unix = strtotime($fecha_std);
		return $fecha_unix;
	}

	public function cancelarNuevo()
	{
		$this->session->set_userdata('es_nueva_ley', false);
		$this->session->set_userdata('ley_nueva', []);

		//Limpiar las variables de session y colocar la bandera en su estado original
		$this->session->set_userdata('nuevo_c1', false);
		$this->session->set_userdata('reforma', []);
		//Redireccionar al inicio
		redirect('inicio/');
	}
	public function editar()
	{
		$usuario = $this->ion_auth->user()->row();
		
		$dt['leyes'] =$this->Cuestionario_model->leerLeyesIdUsuario($usuario->id);
		$dt['cuestionario'] = $this->Cuestionario_model->leerCuestionario($this->_idformulario);
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vley_lista', $dt);
		$this->load->view('html/pie');
	}
	public function editarLey($idley)
	{
		$usuario = $this->ion_auth->user()->row();
		$l=$this->Ley_model->leerLeyPorId($idley);
		$dt['fuentes']=$this->Ley_model->leerfuentes();
		$dt['ley']= $l;
		$dt['fuente']=$this->Ley_model->leerFuenteLey($idley);
		$estadosdeley=$this->Ley_model->leerEstadosDeLey($idley);
		$datosestado=array();
		foreach ($estadosdeley as $el)
		{
			$nl=$this->Ley_model->leerNombreLeyIdEstado($idley,$el->rel_idestadoley);
			$cl=$this->Ley_model->leerCodigoLeyIdEstado($idley,$el->rel_idestadoley);
			$ul=$this->Ley_model->leerUrlLeyIdEstado($idley,$el->rel_idestadoley);
			$dtestado=array(
					'idestadoley'=>$el->rel_idestadoley,
					'nombre_estadoley'=>$el->nombre_estadoley,
					'nombre_ley'=>$nl->nombre_ley,
					'codigo_ley'=>$cl->codigo_ley,
					'url_ley'=>$ul->url_ley
					);
			array_push($datosestado,$dtestado);
		}
		$dt['datosestado']=$datosestado;
		$dt['temas']=$this->Ley_model->leerTemasCuestionario($this->_idformulario);
		$dt['temase']=$this->Ley_model->leerTemasLey($idley);
		$dt['otrotema']=$this->Ley_model->leerOtroTemaLey($idley);
		$dt['otrosubtema']=$this->Ley_model->leerOtroSubTemaLey($idley);
		$dt['subtemase']=$this->Ley_model->leerSubtemasLey($idley);
		foreach ($dt['temase'] as $te)
		{
			$subtemas[$te->idtema]=$this->Ley_model->leerSubtemasPorTema($te->idtema);
		}
		$dt['subtemas']=$subtemas;
		/*$dt['na']=$this->Noticia_model->leerNoticiaActores($idnoticia);
		
		$dt['temas']=$this->Noticia_model->leerTemasCuestionario($this->_idformulario);
		$dt['temase']=$this->Noticia_model->leerTemasNoticia($idnoticia);
		$dt['otrotema']=$this->Noticia_model->leerOtroTemaNoticia($idnoticia);
		$dt['otrosubtema']=$this->Noticia_model->leerOtroSubTemaNoticia($idnoticia);
		$dt['subtemase']=$this->Noticia_model->leerSubtemasNoticia($idnoticia);
		foreach ($dt['temase'] as $te)
		{
			$subtemas[$te->idtema]=$this->Noticia_model->leerSubtemasPorTema($te->idtema);
		}
		$dt['subtemas']=$subtemas;*/
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('cuestionarios/vley_editar', $dt);
		$this->load->view('html/pie');
	}
	public function modificarLey($idley)
	{
		$l=$this->Ley_model->leerLeyPorId($idley);
		$accion=$this->input->post('accion');
		if ($accion==1)
		{
			$fecha=$this->fecha_unix($this->input->post('fecha'));
			$this->Ley_model->modificarFechaLey($idley,$fecha);
		}
		elseif ($accion==2)
		{	
			$this->Ley_model->modificarFuenteLey($idley,$this->input->post('rel_idfuente'));
		}
		elseif ($accion==3)
		{	
			/*$dts = array(
						'titular'=>$this->input->post('titular'),
						'resumen'=>$this->input->post('resumen'),
						'url_noticia'=>$this->input->post('url')
						);
			$this->Noticia_model->modificarDatosNoticia($idn,$dts);*/
		}
		elseif ($accion==4)
		{	
			/*$dtchkbox=array();
			$actores=$this->Noticia_model->leerTodoActores();
			foreach ($actores as $a)
			{	
				if ($this->input->post('a'.$a->idactor)!=null)
				{
					array_push($dtchkbox,$this->input->post('a'.$a->idactor));
				}
			}
			$this->Noticia_model->modificarActoresNoticia($idn,$dtchkbox);*/
		}
		elseif ($accion==5)
		{	
			/*$dtchkboxst=array();
			$dtotrosubtemas=array();
			$subtemas=$this->Noticia_model->leerTodoSubTemas();
			$temas=$this->Noticia_model->leerTodoTemas();
			if ($this->input->post('cnttemas')!=0)
			{
				foreach ($subtemas as $st)
				{	
					if ($this->input->post('st'.$st->idsubtema)!=null)
					{
						array_push($dtchkboxst,$this->input->post('st'.$st->idsubtema));
					}
				}
				foreach ($temas as $t)
				{
					if ($this->input->post('te'.$t->idtema)!=null)
					{
						$idte=$this->input->post('te'.$t->idtema);
						if ($this->input->post('ost'.$idte)!=null)
						{
							array_push($dtotrosubtemas,array('nombre_otrosubtema'=>$this->input->post('otrosubtema'.$t->idtema),
															'rel_idtema'=>$t->idtema));
						}
					}
				}
			}
			if ($this->input->post('otrotema')=="")
			{
				$dtsotrotema=array();
			}
			else
			{
				$dtsotrotema=array(
							'nombre_otrotema'=>$this->input->post('otrotema'),
							'rel_idcuestionario'=>$this->input->post('idcuestionario'),
							'rel_idusuario'=>$this->input->post('idusuario'));
			}
			/*echo "Numrero de Temas: ";
			echo $this->input->post('cnttemas');
			echo "<br><br>";
			echo "Numero de otro Tema: ";
			echo count($dtsotrotema);
			echo "<br><br>";
			var_dump($dtsotrotema);
			echo "<br><br>";
			echo "Numero de Sub Temas: ";
			echo count($dtchkboxst);
			echo "<br><br>";
			var_dump($dtchkboxst);
			echo "<br><br>";
			echo "Numero de otro SubTemas: ";
			echo count($dtotrosubtemas);
			echo "<br><br>";
			var_dump($dtotrosubtemas);*
			
			$this->Noticia_model->modificarSubTemasNoticia($idn,$dtchkboxst,$dtsotrotema,$dtotrosubtemas);*/
			//$this->Noticia_model->modificarSubTemasNoticia($idn,$dtchkboxst);
		}
		/*if ($n->rel_idcuestionario==1)
		{
			redirect('Reformaelectoral/editar');
		}
		elseif ($n->rel_idcuestionario==2)
		{
			redirect('Instdemocratica/editar');
		}
		elseif ($n->rel_idcuestionario==3)
		{
			redirect('Censo/editar');
		}*/
	}
}
