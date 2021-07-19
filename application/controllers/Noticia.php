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

		if($this->session->sesion_activa ===  null){
			$this->session->sess_destroy();
			redirect('/');
		}
    }
    public function index()
    {
		$this->load->view('inicio/vinicio_index.php');
    }
    public function registrarNoticia()
    {

    	$noticia = $this->session->noticia_insert;
		//$this->Noticia_model->crearNoticia($noticia);
		if($this->Noticia_model->crearNoticia($noticia))
		{
			$this->session->set_userdata('nuevo_c1', false);
			$this->session->set_userdata('reforma', []);
			$this->session->set_userdata('nuevo_c2', false);
			$this->session->set_userdata('inst', []);
			$this->session->set_userdata('noticia_insert', []);
			redirect('/');
		}else{
			echo "Error";
		}



		/*$idusr=$this->input->post("idusr");
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

		redirect('inicio/');*/
                
    }
	public function modificarNoticia($idn)
	{
		$accion=$this->input->post('accion');
		if ($accion==1)
		{
			$fecha=$this->fecha_unix($this->input->post('fecha'));
			$this->Noticia_model->modificarFechaNoticia($idn,$fecha);
		}
		elseif ($accion==2)
		{	
			$this->Noticia_model->modificarMedioNoticia($idn,$this->input->post('idmedio'));
		}
		elseif ($accion==3)
		{	
			$dts = array(
						'titular'=>$this->input->post('titular'),
						'resumen'=>$this->input->post('resumen'),
						'url_noticia'=>$this->input->post('url')
						);
			$this->Noticia_model->modificarDatosNoticia($idn,$dts);
		}
		elseif ($accion==4)
		{	
			$dtchkbox=array();
			$actores=$this->Noticia_model->leerTodoActores();
			foreach ($actores as $a)
			{	
				if ($this->input->post('a'.$a->idactor)!=null)
				{
					array_push($dtchkbox,$this->input->post('a'.$a->idactor));
				}
			}
			$this->Noticia_model->modificarActoresNoticia($idn,$dtchkbox);
		}
		elseif ($accion==5)
		{	
			$dtchkboxst=array();
			$subtemas=$this->Noticia_model->leerTodoSubTemas();
			foreach ($subtemas as $st)
			{	
				if ($this->input->post('st'.$st->idsubtema)!=null)
				{
					array_push($dtchkboxst,$this->input->post('st'.$st->idsubtema));
				}
			}
			$this->Noticia_model->modificarSubTemasNoticia($idn,$dtchkboxst);
		}
		redirect('Reformaelectoral/editar');
	}
    //Cambiar el formato MM/DD/YY a unix timestamp
    private function fecha_unix($fecha) 
	{
        list($anio, $mes, $dia) = explode('-', $fecha);
        $fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
        return $fecha_unix;
    }
}
