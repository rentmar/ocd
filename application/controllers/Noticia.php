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
	public function editarNoticia($idn)
	{
		$dts['noticia']=$this->Noticia_model->leerNoticiaPorId($idn);
		$dts['noticia_medio']=$this->Noticia_model->leerNoticiaMedioPorId($idn);
		$dts['tema']=$this->Noticia_model->leerTemaPorSubtema($dts['noticia']->rel_idsubtema);
		echo var_dump($dts);
	}
    //Cambiar el formato MM/DD/YY a unix timestamp
    private function fecha_unix($fecha) {
        list($anio, $mes, $dia) = explode('-', $fecha);
        $fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
        return $fecha_unix;
    }
}