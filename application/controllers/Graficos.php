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
		$this->load->model('Radial_model');

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
		$dt['tiposmedio']=$this->Graficos_model->leerTiposMedio();
		$dt['tipomedio']=null;
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
		else if ($a==4)
		{
			$titulo="Tipo Medio";
			$cargado=true;
		}
		else if ($a==5)
		{
			$titulo="Tipo Medio";
			$idtm=$this->input->post('idtipomedio');
			$dt['tipomedio']=$this->Graficos_model->leerTipoMedioId($idtm);
			$cantidades=array();
			foreach ($departamentos as $d)
			{
				array_push($cantidades,$this->Graficos_model->leerNumTipoMedioDepartamento($d->iddepartamento,$idtm));
			}
			$docXml="<root>\n";
			foreach($departamentos as $d)
			{
				$cant=$this->Graficos_model->leerNumTipoMedioDepartamento($d->iddepartamento,$idtm);
				$docXml=$docXml."\t<element>\n\t\t<iddepartamento>".$d->iddepartamento."</iddepartamento>\n\t\t";
				$docXml=$docXml."<nombre_departamento>".$d->nombre_departamento."</nombre_departamento>\n\t\t";
				$docXml=$docXml."<cantidad>".$cant."</cantidad>\n\t\t";
				if (max($cantidades)==0)
				{
					$valor=0;
					$docXml=$docXml."<radio>".$valor."</radio>\n\t</element>\n";
				}
				else
				{
					$docXml=$docXml."<radio>".round(($cant*10/max($cantidades)))."</radio>\n\t</element>\n";
				}
				
			}
			$docXml=$docXml."</root>\n";
			if (!write_file('datos/tipomedio.xml',$docXml))
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
	//------------------------------------------- barras
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
		$cargado=false;
		$a=$this->input->post('accion');
		$dt['accion']=$a;
		if ($a==1)
		{	
			$titulo="Cuestionario-Tema-Subtema";
			$docXml="<root>\n";
			$cantidades=array();
			$cuestionarios=$this->Graficos_model->leerCuestionarios();
			foreach($cuestionarios as $c) //------------------- max cuestionarios
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
			$docXml=$docXml."\t<cuestionarios>\n";
			$docXml=$docXml."\t\t<element>\n\t\t\t<cant_cuest>".count($cuestionarios)."</cant_cuest>\n\t\t</element>\n";
			foreach ($cuestionarios as $c)
			{
				$temas=$this->Graficos_model->leerTemasIdCuestionaro($c->idcuestionario);
				
				$docXml=$docXml."\t\t<element>\n\t\t\t<idcuestionario>".$c->idcuestionario."</idcuestionario>\n\t\t\t";
				$docXml=$docXml."<nombre_cuestionario>".$c->nombre_cuestionario."</nombre_cuestionario>\n\t\t\t";
				$docXml=$docXml."<numero_temas>".count($temas)."</numero_temas>\n\t\t\t";
				if ($c->nombre_cuestionario!="Leyes")
				{
					$valor=0;
					$num=$this->Graficos_model->leerNumCuestionarioNoticia($c->idcuestionario);
					if (max($cantidades)!=0)
					{
						$valor=round($num*100/max($cantidades));
					}
					$docXml=$docXml."<cantidad>".$num."</cantidad>\n\t\t\t";
					$docXml=$docXml."<valor>".$valor."</valor>\n\t\t</element>\n";
				}
				else
				{
					$valor=0;
					$num=$this->Graficos_model->leerNumLeyes();
					if (max($cantidades)!=0)
					{
						$valor=round($num*100/max($cantidades));
					}
					$docXml=$docXml."<cantidad>".$num."</cantidad>\n\t\t\t";
					$docXml=$docXml."<valor>".$valor."</valor>\n\t\t</element>\n";
				}
			}
			$docXml=$docXml."\t</cuestionarios>\n";
			//---------------------------------------temas
			$docXml=$docXml."\t<temas>\n";
			foreach ($cuestionarios as $c)
			{
				$cantidadesTema=array();
				$temas=$this->Graficos_model->leerTemasIdCuestionaro($c->idcuestionario);
				
				if ($c->nombre_cuestionario!="Leyes")
				{
					foreach ($temas as $t)
					{
						$num=$this->Graficos_model->leerNumTemaNoticia($t->idtema);
						array_push($cantidadesTema,$num);
					}
					foreach ($temas as $t)
					{
						$num=$this->Graficos_model->leerNumTemaNoticia($t->idtema);
						$cantsubtemas=$this->Graficos_model->leerCantSubTemasIdTema($t->idtema);
						$valor=0;
						if (max($cantidadesTema)!=0)
						{
							$valor=round($num*100/max($cantidadesTema));
						}
						$docXml=$docXml."\t\t<element>\n\t\t<idc>".$c->idcuestionario."</idc>\n\t\t\t";
						$docXml=$docXml."<idtema>".$t->idtema."</idtema>\n\t\t\t";
						$docXml=$docXml."<nombre_tema>".$t->nombre_tema."</nombre_tema>\n\t\t\t";
						$docXml=$docXml."<cant_subtemas>".$cantsubtemas."</cant_subtemas>\n\t\t\t";
						$docXml=$docXml."<cantidadportema>".$num."</cantidadportema>\n\t\t\t";
						$docXml=$docXml."<valorportema>".$valor."</valorportema>\n\t\t</element>\n";	
					}
				}
				else
				{
					foreach ($temas as $t)
					{
						$num=$this->Graficos_model->leerNumTemaLey($t->idtema);
						array_push($cantidadesTema,$num);
					}
					foreach ($temas as $t)
					{
						$cantsubtemas=$this->Graficos_model->leerCantSubTemasIdTema($t->idtema);
						$num=$this->Graficos_model->leerNumTemaLey($t->idtema);
						$valor=0;
						if (max($cantidadesTema)!=0)
						{
							$valor=round($num*100/max($cantidadesTema));
						}
						$docXml=$docXml."\t\t<element>\n\t\t<idc>".$c->idcuestionario."</idc>\n\t\t\t";
						$docXml=$docXml."<idtema>".$t->idtema."</idtema>\n\t\t\t";
						$docXml=$docXml."<nombre_tema>".$t->nombre_tema."</nombre_tema>\n\t\t\t";
						$docXml=$docXml."<cant_subtemas>".$cantsubtemas."</cant_subtemas>\n\t\t\t";
						$docXml=$docXml."<cantidadportema>".$num."</cantidadportema>\n\t\t\t";
						$docXml=$docXml."<valorportema>".$valor."</valorportema>\n\t\t</element>\n";	
					}
				}
			}
			$docXml=$docXml."\t</temas>\n";
			//-------------------------------------------subtemas
			$docXml=$docXml."\t<subtemas>\n";
			foreach ($cuestionarios as $c)
			{
				$temas=$this->Graficos_model->leerTemasIdCuestionaro($c->idcuestionario);
				foreach ($temas as $t)
				{
					$cantsubtemas=array();
					if ($c->nombre_cuestionario!="Leyes")
					{
						$subtemas=$this->Graficos_model->leerSubTemasIdTema($t->idtema);
						foreach ($subtemas as $st)
						{
							$numsubtemas=$this->Graficos_model->leerNumSubTemaNoticia($st->idsubtema);
							array_push($cantsubtemas,$numsubtemas);
						}
						foreach ($subtemas as $st)
						{
							$numsubtemas=$this->Graficos_model->leerNumSubTemaNoticia($st->idsubtema);
							$docXml=$docXml."\t<element>\n\t\t<idt>".$st->rel_idtema."</idt>\n\t\t";
							$docXml=$docXml."<idsubtema>".$st->idsubtema."</idsubtema>\n\t\t";
							$docXml=$docXml."<nombre_subtema>".$st->nombre_subtema."</nombre_subtema>\n\t\t";
							$docXml=$docXml."<cantidadporsubtema>".$numsubtemas."</cantidadporsubtema>\n\t\t";
							if (max($cantsubtemas)!=0)
							{
								$docXml=$docXml."<valorporsubtema>".round($numsubtemas*100/max($cantsubtemas))."</valorporsubtema>\n\t</element>\n";	
							}
							else
							{
								$docXml=$docXml."<valorporsubtema>".max($cantsubtemas)."</valorporsubtema>\n\t</element>\n";	
							}
						}
					}
					else
					{
						$subtemas=$this->Graficos_model->leerSubTemasIdTema($t->idtema);
						foreach ($subtemas as $st)
						{
							$numsubtemas=$this->Graficos_model->leerNumSubTemaLey($st->idsubtema);
							array_push($cantsubtemas,$numsubtemas);
						}
						foreach ($subtemas as $st)
						{
							$numsubtemas=$this->Graficos_model->leerNumSubTemaLey($st->idsubtema);
							$docXml=$docXml."\t<element>\n\t\t<idt>".$st->rel_idtema."</idt>\n\t\t";
							$docXml=$docXml."<idsubtema>".$st->idsubtema."</idsubtema>\n\t\t";
							$docXml=$docXml."<nombre_subtema>".$st->nombre_subtema."</nombre_subtema>\n\t\t";
							$docXml=$docXml."<cantidadporsubtema>".$numsubtemas."</cantidadporsubtema>\n\t\t";
							if (max($cantsubtemas)!=0)
							{
								$docXml=$docXml."<valorporsubtema>".round($numsubtemas*100/max($cantsubtemas))."</valorporsubtema>\n\t</element>\n";	
							}
							else
							{
								$docXml=$docXml."<valorporsubtema>".max($cantsubtemas)."</valorporsubtema>\n\t</element>\n";	
							}
						}
					}
				}
			}
			$docXml=$docXml."\t<subtemas>\n";
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
	public function seleccionCuerdas()
	{	
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('graficos/vgraficoselectchord');
		$this->load->view('html/pie');
	}
	public function llenarDatosChordXml()
	{
		$titulo="";
		$cargado=false;
		$a=$this->input->post('accion');
		$dt['accion']=$a;
		if ($a==1)
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
			$this->load->view('graficos/vgraficochord',$dt);
		}
	}
////////////////////////////will	
		public function seleccionRadial()
	{	
		$this->load->view('html/encabezado');
		$this->load->view('html/navbar');
		$this->load->view('graficos/vgraficoselectradial');
		$this->load->view('html/pie');
	}
		public function getactores()
	{
//		$json = array();
		$fecha = json_decode($this->input->post('fecha')) ;
		$respuesta = $this->Radial_model->leerMactores($fecha);
//		header('Content-Type: application/json');
		echo json_encode($respuesta);
	}
		public function getMedioDcomunicacion()
	{
//		$json = array();
		$fecha = json_decode($this->input->post('fecha')) ;
		$respuesta = $this->Radial_model->leerMmedioDcomunicacion($fecha);
//		header('Content-Type: application/json');
		echo json_encode($respuesta);
	}
}
