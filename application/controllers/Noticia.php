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
		$idusr=1;
        $DatosNoticia=[
            'fecha_registro'=>$this->fecha_unix(date("Y-m-d")),
            'fecha_noticia'=>$this->fecha_unix($this->input->post('fecha')),
            'titular'=>$this->input->post('titular'),
            'resumen'=>$this->input->post('resumen'),
            'url_noticia'=>$this->input->post('url'),
            'rel_idactor'=>$this->input->post('idactor'),
			'rel_idmedio'=>$idmedio=$this->input->post('idmedio'),
			'rel_idusr'=>$idusr
            ];
		//  otro tema 
		if ($this->input->post('idtema')==0)
		{
			$dtot= array ('nombre_tema'=>$this->input->post('otrotema'),
						  'rel_idcuestionario'=>$this->input->post('idformulario'),
						  'rel_idusuario'=>$idusr
							);
			$ost='Nodef usr '.$idusr;
			$DatosNoticia['rel_idsubtema']=$this->Noticia_model->insertarOtroTema($dtot,$ost);
		}
		else
		{
			$DatosNoticia['rel_idsubtema']=$this->input->post('idsubtema');
		}
		//otro subtema
		if ($this->input->post('idsubtema')==0)
		{
			$dtot= array ('nombre_tema'=>$idtema,
						  'rel_idcuestionario'=>$this->input->post('idformulario'),
						  'rel_idusuario'=>$idusr
							);
			$ost=$this->input->post('otrosubtema');
			$DatosNoticia['rel_idsubtema']=$this->Noticia_model->insertarOtroTema($dtot,$ost);
		}
        var_dump($DatosNoticia);
		$this->form_validation->set_rules('titular', 'Titular', 'required');
        $this->form_validation->set_rules('resumen', 'Resumen', 'required');
        //$this->form_validation->set_rules('url', 'urlNoticia', 'required');
        $this->form_validation->set_rules('actor_nombre', 'relIdActor', 'required');
        $this->form_validation->set_rules('tema', 'relIdSubtema', 'required');
        $this->form_validation->set_message('required','El campo %s es obligatorio');
        $this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
        $this->form_validation->set_message('min_length[3]','El campo %s debe tener mas de 3 caracteres');
        $this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
        if ($this->form_validation->run() == FALSE)
        {
            //echo "Validacion incorrecta";
            $this->load->view('cuestionarios/vreforma_electoral.php');
        }
        else
        {
            //echo "Validacion correcta";
            $idnoticia=$this->Noticia_model->insertarNoticia($DatosNoticia);
       }
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