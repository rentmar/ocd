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
		
                
    }
	public function editarNoticia()
	{
		

		
	}


    //Cambiar el formato MM/DD/YY a unix timestamp
    private function fecha_unix($fecha) 
	{
        list($anio, $mes, $dia) = explode('-', $fecha);
        $fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
        return $fecha_unix;
    }
}
