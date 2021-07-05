<?php
class Noticia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');
		$this->load->model('Noticia_model');
		$this->load->model('Actor_model');
		$this->load->model('Cuestionario_model');
        $this->load->helper('date');        
        $this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('session');
    }
    public function index()
    {
		$this->load->view('cuestionarios/vprueba.php');
    }
    public function registrarNoticia()
    {
		$idusr=$this->input->post("idusr");
        $DatosNoticia=[
            'fecha_registro'=>$this->input->post("fecha_registro"),
            'fecha_noticia'=>$this->input->post('fecha_noticia'),
            'titular'=>$this->input->post('titular'),
            'resumen'=>$this->input->post('resumen'),
            'url_noticia'=>$this->input->post('url_noticia'),
            'rel_idactor'=>$this->input->post('idactor'),
			'rel_idmedio'=>$this->input->post('idmedio'),
			'rel_idusuario'=>$idusr
            ];
		$dtot= array ('nombre_tema'=>$this->input->post('otrotema'),
						  'rel_idcuestionario'=>$this->input->post('idcuestionario'),
						  'rel_idusuario'=>$idusr
							);
		//  otro tema 
		if ($this->input->post('idtema')==0)
		{
			$ost=$this->input->post('otrosubtema');
			$DatosNoticia['rel_idsubtema']=$this->Noticia_model->insertarOtroTema($dtot,$ost);
		}
		elseif ($this->input->post('idsubtema')==0)
		{
			$ost=$this->input->post('otrosubtema');
			$DatosNoticia['rel_idsubtema']=$this->Noticia_model->insertarOtroTema($dtot,$ost);
		}
		else
		{
			$DatosNoticia['rel_idsubtema']=$this->input->post('idsubtema');
		}
		//otro subtema
		$this->Noticia_model->insertarNoticia($DatosNoticia);
                
                
/*        $this->form_validation->set_rules('titular', 'Titular', 'required');
        $this->form_validation->set_rules('resumen', 'Resumen', 'required');
        $this->form_validation->set_rules('url', 'urlNoticia', 'required');
        $this->form_validation->set_rules('idactor', 'relIdActor', 'required');
        $this->form_validation->set_rules('isdubtema', 'relIdSubtema', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            //echo "Validacion incorrecta";
            $this->load->view('ReformaElectoral');
        }
        else
        {
            //echo "Validacion correcta";
            $idnoticia=$this->Noticia_model->insertarNoticia($DatosNoticia);
	}*/
    }
	public function editarNoticia()
	{
		$accion = $this->input->post('accion');
		if($accion == 2)
		{
			//Datos generales Cuestionario 1
			$noticia_edicion = $this->session->noticia;
			$noticia_edicion->titular = $this->input->post('titular');
			$noticia_edicion->resumen = $this->input->post('resumen');
			$noticia_edicion->url_noticia = $this->input->post('url');
			$this->session->set_userdata('noticia', []);
			$this->session->set_userdata('noticia', $noticia_edicion);
			if($this->input->post('idcuestionario')==1)
			{
				redirect('reformaelectoral/editarNoticia/'.$noticia_edicion->idnoticia);
			}
			elseif ($this->input->post('idcuestionario')==2)
			{
				redirect('instdemocratica/editarNoticia/'.$noticia_edicion->idnoticia);
			}

		}
		elseif ($accion==1)
		{
			$noticia_edicion = $this->session->noticia;
			$noticia_edicion->fecha_noticia = strtotime(trim($this->input->post('fecha')));
			$this->session->set_userdata('noticia', []);
			$this->session->set_userdata('noticia', $noticia_edicion);
			if($this->input->post('idcuestionario')==1)
			{
				redirect('reformaelectoral/editarNoticia/'.$noticia_edicion->idnoticia);
			}
			elseif ($this->input->post('idcuestionario')==2)
			{
				redirect('instdemocratica/editarNoticia/'.$noticia_edicion->idnoticia);
			}
		}
		elseif ($accion==3)
		{
			$noticia_edicion = $this->session->noticia;
			//echo $this->input->post('idactor');
			$nuevo_actor = $this->Actor_model->leerActorID($this->input->post('idactor'));

			$noticia_edicion->idactor = $nuevo_actor->idactor ;
			$noticia_edicion->nombre_actor = $nuevo_actor->nombre_actor;
			$this->session->set_userdata('noticia', [ ]);
			$this->session->set_userdata('noticia', $noticia_edicion);
			if($this->input->post('idcuestionario')==1)
			{
				redirect('reformaelectoral/editarNoticia/'.$noticia_edicion->idnoticia);
			}
			elseif ($this->input->post('idcuestionario')==2)
			{
				redirect('instdemocratica/editarNoticia/'.$noticia_edicion->idnoticia);
			}

		}
		elseif ($accion == 4)
		{
			//echo "Editar medio";
			$noticia_edicion = $this->session->noticia;
			$tipo_medio_nuevo = $this->Cuestionario_model->leerTipoMedio($this->input->post('idtipomedio'));
			$medio_nuevo = $this->Cuestionario_model->leerMedioPorId($this->input->post('idmedio'));

			$noticia_edicion->idtipomedio = $tipo_medio_nuevo->idtipomedio;
			$noticia_edicion->nombre_tipo = $tipo_medio_nuevo->nombre_tipo;

			$noticia_edicion->idmedio = $medio_nuevo->idmedio;
			$noticia_edicion->nombre_medio = $medio_nuevo->nombre_medio;
			$noticia_edicion->rel_idtipomedio = $medio_nuevo->idtipomedio;

			$this->session->set_userdata('noticia', [ ]);
			$this->session->set_userdata('noticia', $noticia_edicion);
			if($this->input->post('idcuestionario')==1)
			{
				redirect('reformaelectoral/editarNoticia/'.$noticia_edicion->idnoticia);
			}
			elseif ($this->input->post('idcuestionario')==2)
			{
				redirect('instdemocratica/editarNoticia/'.$noticia_edicion->idnoticia);
			}

		}
		elseif ($accion == 5)
		{
			//echo "Editar tema subtema";
			$noticia_edicion = $this->session->noticia;
			$tema_nuevo = $this->Cuestionario_model->leerTemaPorId($this->input->post('idtema'));
			$subtema_nuevo = $this->Cuestionario_model->leerSubTemaPorId($this->input->post('idsubtema'));

			/*var_dump($tema_nuevo);
			echo "<br><br><br><br><br>";
			var_dump($subtema_nuevo);*/

			$noticia_edicion->idtema = $tema_nuevo->idtema;
			$noticia_edicion->nombre_tema = $tema_nuevo->nombre_tema;

			$noticia_edicion->idsubtema = $subtema_nuevo->idsubtema;
			$noticia_edicion->nombre_subtema = $subtema_nuevo->nombre_subtema;
			$noticia_edicion->rel_idtema = $subtema_nuevo->rel_idtema;

			$this->session->set_userdata('noticia', [ ]);
			$this->session->set_userdata('noticia', $noticia_edicion);
			if($this->input->post('idcuestionario')==1)
			{
				redirect('reformaelectoral/editarNoticia/'.$noticia_edicion->idnoticia);
			}
			elseif ($this->input->post('idcuestionario')==2)
			{
				redirect('instdemocratica/editarNoticia/'.$noticia_edicion->idnoticia);
			}

		}
		elseif ($accion == 'cancelar')
		{
			//echo "Cancelar edicion";
			//Desactivar la edicion
			$this->session->set_userdata('edicion_activa', false);
			//Limpiar la variable de session
			$this->session->set_userdata('noticia', []);
			redirect('inicio/');
		}
		elseif ($accion=='cambiar')
		{
			echo "Recibir todo";
			//Extraer la noticia
			$noticia_edicion = $this->session->noticia;
			//Desactivar la edicion
			$this->session->set_userdata('edicion_activa', false);
			//Limpiar la variable de session
			$this->session->set_userdata('noticia', []);
			//Array resultado
			$datos_noticia = [
				'idnoticia' => $noticia_edicion->idnoticia,
				'fecha_noticia' => $noticia_edicion->fecha_noticia,
				'titular' => $noticia_edicion->titular,
				'resumen' => $noticia_edicion->resumen,
				'url_noticia' => $noticia_edicion->url_noticia,
				'rel_idactor' => $noticia_edicion->idactor,
				'rel_idsubtema' => $noticia_edicion->idsubtema,
				'rel_idmedio' => $noticia_edicion->idmedio,
				];

			var_dump($datos_noticia);

			//Rutina de insercion aqui
		}
		/*$dts['noticia']=$this->Noticia_model->leerNoticiaPorId($idn);
		$dts['noticia_medio']=$this->Noticia_model->leerNoticiaMedioPorId($idn);
		$dts['tema']=$this->Noticia_model->leerTemaPorSubtema($dts['noticia']->rel_idsubtema);
		echo var_dump($dts);*/
	}


    //Cambiar el formato MM/DD/YY a unix timestamp
    private function fecha_unix($fecha) {
        list($anio, $mes, $dia) = explode('-', $fecha);
        $fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
        return $fecha_unix;
    }
}
