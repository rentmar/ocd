<?php

class Usuarios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('Departamento_model');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		echo "Lista de Usuarios";
	}

	public function crearUsuario()
	{
		$data['grupos'] = $this->ion_auth->groups()->result();
		$data['departamentos'] = $this->Departamento_model->leerDepartamentos();
		$this->load->view('usuarios/vformulario_usuario', $data);
	}

	public function procesarCrear()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usuario', 'Nombre de usuario', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('carnet', 'Carnet de Identidad', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password1', 'Confirmar Password', 'required|matches[password]');

		if($this->form_validation->run()==false)
		{
			$data['grupos'] = $this->ion_auth->groups()->result();
			$data['departamentos'] = $this->Departamento_model->leerDepartamentos();
			$this->load->view('usuarios/vformulario_usuario', $data);
		}else{
			//echo "Valido";
			$usuario = $this->input->post('usuario');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$datos_extra = [
				'first_name' => $this->input->post('nombre'),
				'last_name' => $this->input->post('apellido'),
				'carnet_identidad' => $this->input->post('carnet'),
				'geolocalizacion' => $this->input->post('ubicacion'),
				'rel_iddepartamento' => $this->input->post('departamento'),
				'direccion' => $this->input->post('direccion'),
			];
			$grupo = [$this->input->post('grupo'),];

			if(!$this->ion_auth->register($usuario, $password, $email, $datos_extra, $grupo)){
				echo "Error de creacion";
			}else{
				echo "Usuario Creado";
			}
		}

	}

	public function editarUsuario($idusuario)
	{
		$usuario = $this->ion_auth->user($idusuario)->row();
		$data['usuario'] = $usuario;
		$data['grupos'] = $this->ion_auth->groups()->result();
		$data['departamentos'] = $this->Departamento_model->leerDepartamentos();
		$this->load->view('usuarios/vformulario_usuario_editar', $data);
	}

	public function editarUsrLog()
	{
		//echo "editar usuario logeado";
		//echo "<br><br>";
		$usuario = $this->ion_auth->user()->row();
		$data['usuario'] = $usuario;
		$data['grupos'] = $this->ion_auth->groups()->result();
		$data['departamentos'] = $this->Departamento_model->leerDepartamentos();

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('usuarios/vformulario_monitor_editar', $data);
		$this->load->view('html/pie');
	}

	public function procesarUsrLog()
	{
		$idusuario = $this->input->post('idusuario');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('carnet', 'Carnet de Identidad', 'numeric');
		if($this->form_validation->run()==false)
		{
			$usuario = $this->ion_auth->user($idusuario)->row();
			$data['usuario'] = $usuario;
			$data['grupos'] = $this->ion_auth->groups()->result();
			$data['departamentos'] = $this->Departamento_model->leerDepartamentos();
			$this->load->view('usuarios/vformulario_monitor_editar', $data);
		}else{
			/** @noinspection PhpLanguageLevelInspection */
			$datos_extra = [
				'first_name' => $this->input->post('nombre'),
				'last_name' => $this->input->post('apellido'),
				'carnet_identidad' => $this->input->post('carnet'),
				'geolocalizacion' => $this->input->post('ubicacion'),
				'direccion' => $this->input->post('direccion'),
			];

			if($this->ion_auth->update($idusuario, $datos_extra)){
				echo "Usuario modificado";
			}else{
				echo "Usuario no modificado";
			}
		}

	}

	public function procesarEditar()
	{
		$idusuario = $this->input->post('idusuario');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('carnet', 'Carnet de Identidad', 'required|numeric');

		if($this->form_validation->run()==false)
		{
			$usuario = $this->ion_auth->user($idusuario)->row();
			$data['usuario'] = $usuario;
			$data['grupos'] = $this->ion_auth->groups()->result();
			$data['departamentos'] = $this->Departamento_model->leerDepartamentos();
			$this->load->view('usuarios/vformulario_usuario_editar', $data);
		}else{
			/** @noinspection PhpLanguageLevelInspection */
			$datos_extra = [
				'first_name' => $this->input->post('nombre'),
				'last_name' => $this->input->post('apellido'),
				'carnet_identidad' => $this->input->post('carnet'),
				'geolocalizacion' => $this->input->post('ubicacion'),
				'rel_iddepartamento' => $this->input->post('departamento'),
				'direccion' => $this->input->post('direccion'),
			];

			if($this->ion_auth->update($idusuario, $datos_extra)){
				echo "Usuario modificado";
			}else{
				echo "Usuario no modificado";
			}
		}


	}

	public function editarPwd()
	{
		$usuario = $this->ion_auth->user()->row();
		$data['usuario'] = $usuario;

		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('usuarios/vformulario_pwd', $data);
		$this->load->view('html/pie');

	}

	public function procesarEditPwd()
	{
		$idusuario = $this->input->post('idusuario');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pass', 'Contraseña', 'required');
		$this->form_validation->set_rules('pass1', 'Confirmar Contraseña', 'required|matches[pass]');


		if($this->form_validation->run()==false)
		{
			$usuario = $this->ion_auth->user($idusuario)->row();
			$data['usuario'] = $usuario;
			$this->load->view('html/encabezado');
			$this->load->view('html/navbar');
			$this->load->view('usuarios/vformulario_pwd', $data);
			$this->load->view('html/pie');
		}else{
			/** @noinspection PhpLanguageLevelInspection */
			$datos_extra = [
				'password' => $this->input->post('pass'),
			];

			if($this->ion_auth->update($idusuario, $datos_extra)){
				//echo "Contraseña modificada";
				redirect('inicio');
			}else{
				//echo "Contraseña no modificado";
			}
		}

	}


	public function administradores()
	{
		$data['titulo'] = 'Administradores';

		//Solo administradores
		$usuarios = $this->ion_auth->users('admin')->result();
		var_dump($usuarios);


		/*$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('usuarios/vusuarios_lista', $data);
		$this->load->view('html/pie');*/

	}





}
