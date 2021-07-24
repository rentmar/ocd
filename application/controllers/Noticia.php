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
			$this->session->set_userdata('es_nueva_noticia', false);
			$this->session->set_userdata('noticia_nueva', []);
			$this->session->set_userdata('es_nueva_noticia1', false);
			$this->session->set_userdata('noticia_nueva1', []);
			$this->session->set_userdata('es_nueva_noticia2', false);
			$this->session->set_userdata('noticia_nueva2', []);
			redirect('/');
		}else{
			echo "Error";
		}
    }
	public function modificarNoticia($idn)
	{
		$n=$this->Noticia_model->leerNoticiaPorId($idn);
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
			$dtotrosubtemas=array();
			$subtemas=$this->Noticia_model->leerTodoSubTemas();
			$temas=$this->Noticia_model->leerTodoTemas();
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
						array_push($dtotrosubtemas,$this->input->post('otrosubtema'.$t->idtema));
					}
				}
			}
			if ($this->input->post('otrotema')=="")
			{
				echo "no hay tema";
			}
			else 
			{
				var_dump($this->input->post('otrotema'));
			}
			echo "<br><br>";
			if (count($dtotrosubtemas)==0)
			{
				echo "no hay subtemas";
			}
			else
			{
				var_dump($dtotrosubtemas);
			}
			
			//$this->Noticia_model->modificarSubTemasNoticia($idn,$dtchkboxst);
		}
		/*if ($n->rel_idcuestionario==1)
		{
			redirect('Reformaelectoral/editar');
		}
		if ($n->rel_idcuestionario==2)
		{
			redirect('instdemocratica/editar');
		}*/
	}
    //Cambiar el formato MM/DD/YY a unix timestamp
    private function fecha_unix($fecha) 
	{
        list($anio, $mes, $dia) = explode('-', $fecha);
        $fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
        return $fecha_unix;
    }
}
