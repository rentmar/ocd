<?php


class Departamento extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->library('session');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Departamento_model');
	}

	public function index()
	{
		$dt['departamentos']=$this->Departamento_model->leerDepartamentos();
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
	    $this->load->view('departamentos/vdepartamento',$dt);
		$this->load->view('html/pie');
	}

	public function crearDepartamento()
	{
		$this->load->view('departamentos/vformulario_departamento');
	}

	public function procesarCrear()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('departamento', 'Departamento', 'required|is_unique[departamento.nombre_departamento]');
		if($this->form_validation->run()==false){
			$this->load->view('departamentos/vformulario_departamento');
		}else{
			$dep = $this->capturarDatos();
			unset($dep['iddepartamento']);
			if($this->Departamento_model->crearDepartamento($dep)){
				echo "Dep creado";
			}else{
				echo "dep no crado";
			}
		}
	}

	public function editarDepartamento($identificador)
	{
		$data['dep'] = $this->Departamento_model->leerDepartamento($identificador);
		$this->load->view('departamentos/vformulario_departamento_edit', $data);

	}

	public function procesarEditar()
	{
		$dep = $this->capturarDatos();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('departamento', 'Departamento', 'required|is_unique[departamento.nombre_departamento]');
		if($this->form_validation->run()==false){
			$data['dep'] = $this->Departamento_model->leerDepartamento($dep['iddepartamento']);
			$this->load->view('departamentos/vformulario_departamento_edit', $data);
		}else{
			$iddep = $dep['iddepartamento'];
			unset($dep['iddepartamento']);
			if($this->Departamento_model->updateDepartamento($iddep, $dep)) {
				echo "Dep modificado";
			}else{
				echo "dep no modificado";
			}
		}
	}

	private function capturarDatos(){
		$datos = [
			'iddepartamento' => $this->input->post('identificador'),
			'nombre_departamento' => $this->input->post('departamento'),
		];
		return $datos;
	}
}
