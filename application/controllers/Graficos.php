<?php

class Graficos extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->library('session');
		$this->load->helper("html");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Graficos_model');
		$this->load->helper('file');

	}
	public function index()
	{
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('graficos/vgraficosinicio');
		$this->load->view('html/pie');
		//$this->load->view('graficos/vgraficop');
	}
	public function seleccionBubble()
	{	
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('graficos/vgraficoselectbubble');
		$this->load->view('html/pie');
	}
	public function llenarDatosBubbleXml()
	{
		$titulo="";
		$cargado=false;
		$departamentos = $this->Graficos_model->leerDepartamentos();
		$dt['actores']=$this->Graficos_model->leerActores();
		$dt['actor']=null;
		$a=$this->input->post('accion');
		$dt['accion']=$a;
		if ($a==1)
		{	
			$titulo="Formularios";
			$cuestionarios=$this->Graficos_model->leerCuestionarios();
			$dt['cuestionarios']=$cuestionarios;
			foreach ($cuestionarios as $c)
			{
				if ($c->idcuestionario!=4)
				{
					$cantidades=array();
					foreach ($departamentos as $d)
					{
						array_push($cantidades,$this->Graficos_model->leerNumCuestionarioDepartamento($d->iddepartamento,$c->idcuestionario));
					}
					$docXml="<root>\n";
					foreach($departamentos as $d)
					{
						$cant=$this->Graficos_model->leerNumCuestionarioDepartamento($d->iddepartamento,$c->idcuestionario);
						$docXml=$docXml."\t<element>\n\t\t<iddepartamento>".$d->iddepartamento."</iddepartamento>\n\t\t";
						$docXml=$docXml."<nombre_departamento>".$d->nombre_departamento."</nombre_departamento>\n\t\t";
						$docXml=$docXml."<cantidad>".$cant."</cantidad>\n\t\t";
						$docXml=$docXml."<radio>".round(($cant*10/max($cantidades)))."</radio>\n\t</element>\n";
					}
					$docXml=$docXml."</root>\n";
					if (!write_file('datos/cuestionario'.$c->idcuestionario.'.xml',$docXml))
					{
						$cargado=false;
					}
					else
					{
						$cargado=true;
					}		
				}
				else
				{
					$cantidades=array();
					foreach ($departamentos as $d)
					{
						array_push($cantidades,$this->Graficos_model->leerNumLeyDepartamento($d->iddepartamento,$c->idcuestionario));
					}
					$docXml="<root>\n";
					foreach($departamentos as $d)
					{
						$cant=$this->Graficos_model->leerNumLeyDepartamento($d->iddepartamento,$c->idcuestionario);
						$docXml=$docXml."\t<element>\n\t\t<iddepartamento>".$d->iddepartamento."</iddepartamento>\n\t\t";
						$docXml=$docXml."<nombre_departamento>".$d->nombre_departamento."</nombre_departamento>\n\t\t";
						$docXml=$docXml."<cantidad>".$cant."</cantidad>\n\t\t";
						$docXml=$docXml."<radio>".round(($cant*10/max($cantidades)))."</radio>\n\t</element>\n";
					}
					$docXml=$docXml."</root>\n";
					if (!write_file('datos/cuestionario'.$c->idcuestionario.'.xml',$docXml))
					{
						$cargado=false;
					}
					else
					{
						$cargado=true;
					}		
				}
			}
		}
		else if ($a==2)
		{
			$titulo="Actores";
			$cargado=true;
		}
		else if ($a==3)
		{
			$titulo="Actores";
			$ida=$this->input->post('idactor');
			$dt['actor']=$this->Graficos_model->leerActorId($ida);
			$cantidades=array();
			foreach ($departamentos as $d)
			{
				array_push($cantidades,$this->Graficos_model->leerNumActorDepartamento($d->iddepartamento,$ida));
			}
			$docXml="<root>\n";
			foreach($departamentos as $d)
			{
				$cant=$this->Graficos_model->leerNumActorDepartamento($d->iddepartamento,$ida);
				$docXml=$docXml."\t<element>\n\t\t<iddepartamento>".$d->iddepartamento."</iddepartamento>\n\t\t";
				$docXml=$docXml."<nombre_departamento>".$d->nombre_departamento."</nombre_departamento>\n\t\t";
				$docXml=$docXml."<cantidad>".$cant."</cantidad>\n\t\t";
				$docXml=$docXml."<radio>".round(($cant*10/max($cantidades)))."</radio>\n\t</element>\n";
			}
			$docXml=$docXml."</root>\n";
			if (!write_file('datos/actor.xml',$docXml))
			{
				$cargado=false;
			}
			else
			{
				$cargado=true;
			}		
		}
		$dt['titulo']=$titulo;
		if ($cargado==false)
		{
			$this->load->view('graficos/vgraficosinicio');
		}
		else
		{
			$this->load->view('graficos/vgraficobubble',$dt);
		}
	}
	public function seleccionBar()
	{	
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('graficos/vgraficoselectbar');
		$this->load->view('html/pie');
	}
	public function llenarDatosBarXml()
	{
		$titulo="";
		$cantidades=array();
		$cargado=false;
		$a=$this->input->post('accion');
		$dt['accion']=$a;
		if ($a==1)
		{	
			$titulo="Cuestionario-Tema-Subtema";
			$numleyes=$this->Graficos_model->leerNumLeyes();
			$cuest=$this->Graficos_model->leerCuestionarios();
			foreach($cuest as $c)
			{
				if ($c->nombre_cuestionario!="Leyes")
				{
					$num=$this->Graficos_model->leerNumCuestionarioNoticia($c->idcuestionario);
				}
				else
				{
					$num=$this->Graficos_model->leerNumLeyes();
				}
				array_push($cantidades,$num);
			}
			$docXml="<root>\n";
			$docXml=$docXml."\t<element>\n\t\t<cant_cuest>".count($cuest)."</cant_cuest>\n\t</element>\n";
			foreach ($cuest as $c)
			{
				$temas=$this->Graficos_model->leerTemasIdCuestionaro($c->idcuestionario);
				$num=$this->Graficos_model->leerNumCuestionarioNoticia($c->idcuestionario);
				$docXml=$docXml."\t<element>\n\t\t<idcuestionario>".$c->idcuestionario."</idcuestionario>\n\t\t";
				$docXml=$docXml."<nombre_cuestionario>".$c->nombre_cuestionario."</nombre_cuestionario>\n\t\t";
				$docXml=$docXml."<numero_temas>".count($temas)."</numero_temas>\n\t\t";
				if ($c->nombre_cuestionario!="Leyes")
				{
					$docXml=$docXml."<cantidad>".$num."</cantidad>\n\t\t";
					$docXml=$docXml."<valor>".round(($num*100/max($cantidades)))."</valor>\n\t</element>\n";
				}
				else
				{
					$docXml=$docXml."<cantidad>".$numleyes."</cantidad>\n\t\t";
					$docXml=$docXml."<valor>".round(($numleyes*100/max($cantidades)))."</valor>\n\t</element>\n";
				}
			}
			
			foreach ($cuest as $c)
			{
				$cantidadesTema=array();
				$temas=$this->Graficos_model->leerTemasIdCuestionaro($c->idcuestionario);
				foreach ($temas as $t)
				{
					$num=$this->Graficos_model->leerNumTemaNoticia($t->idtema);
					array_push($cantidadesTema,$num);
				}
				foreach ($temas as $t)
				{
					$num=$this->Graficos_model->leerNumTemaNoticia($t->idtema);
					$docXml=$docXml."\t<element>\n\t\t<idc>".$c->idcuestionario."</idc>\n\t\t";
					$docXml=$docXml."<idtema>".$t->idtema."</idtema>\n\t\t";
					$docXml=$docXml."<nombre_tema>".$t->nombre_tema."</nombre_tema>\n\t\t";
					if ($c->nombre_cuestionario!="Leyes")
					{
						$docXml=$docXml."<cantidadportema>".$num."</cantidadportema>\n\t\t";
						$docXml=$docXml."<valorportema>".round($num*100/max($cantidadesTema))."</valorportema>\n\t</element>\n";
					}
					else
					{
						$docXml=$docXml."<cantidadportema>".$num."</cantidadportema>\n\t\t";
						$docXml=$docXml."<valorportema>".max($cantidadesTema)."</valorportema>\n\t</element>\n";
					}
						
				}
			}
			$docXml=$docXml."</root>\n";
			if (!write_file('datos/cuestionariobar.xml',$docXml))
			{
				$cargado=false;
			}
			else
			{
				$cargado=true;
			}		
		}
		else if ($a==2)
		{
			$cargado=true;
		}
		else if ($a==3)
		{
			$cargado=true;
		}
		$dt['titulo']=$titulo;
		if ($cargado==false)
		{
			$this->load->view('graficos/vgraficosinicio');
		}
		else
		{
			$this->load->view('graficos/vgraficobar',$dt);
		}
	}
}
