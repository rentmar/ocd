<?php
class Noticia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');
		$this->load->model('Noticia_model');
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
		$idtema=$this->input->post('idtema');
		if ($idtema==0)
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
		/*$this->form_validation->set_rules('titular', 'Titular', 'required');
        $this->form_validation->set_rules('resumen', 'Resumen', 'required');
        //$this->form_validation->set_rules('url', 'urlNoticia', 'required');
        $this->form_validation->set_rules('idactor', 'relIdActor', 'required');
        $this->form_validation->set_rules('isdubtema', 'relIdSubtema', 'required');
        $this->form_validation->set_message('required','El campo %s es obligatorio');
        $this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
        $this->form_validation->set_message('min_length[3]','El campo %s debe tener mas de 3 caracteres');
        $this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
        if ($this->form_validation->run() == FALSE)
        {
            //echo "Validacion incorrecta";
            $this->load->view('cuestionarios/vprueba.php');
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


;

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
