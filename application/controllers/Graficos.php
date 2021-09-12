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
		$this->load->model('Actor_model');
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
	private function fecha_unix($fecha)
	{
		list($anio, $mes, $dia) = explode('-', $fecha);
		$fecha_unix = mktime(0, 0, 0, $mes, $dia, $anio);
		return $fecha_unix;
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
		$actores=$this->Graficos_model->leerActores();
		$dt['actores']=$actores;
		$cuestionarios=$this->Graficos_model->leerCuestionarios();
		$dt['cuestionarios']=$cuestionarios;
		$dt['tiposmedio']=$this->Graficos_model->leerTiposMedio();
		$fi=$this->fecha_unix($this->input->post('fecha_inicio'));
		$ff=$this->fecha_unix($this->input->post('fecha_fin'));
		$dt['fi']=$this->input->post("fecha_inicio");
		$dt['ff']=$this->input->post("fecha_fin");
		$a=$this->input->post('accion');
		$dt['accion']=$a;
		if ($a==1)
		{	
			$titulo="Formularios";
			$docXml="<root>\n";
			foreach ($cuestionarios as $c)
			{
				$opcion=$c->idcuestionario;
				if ($c->idcuestionario!=4)
				{
					$cantidades=array();
					foreach ($departamentos as $d)
					{
						array_push($cantidades,$this->Graficos_model->leerNumCuestionarioDepartamento($fi,$ff,$d->iddepartamento,$c->idcuestionario));
					}
					foreach($departamentos as $d)
					{
						$cant=$this->Graficos_model->leerNumCuestionarioDepartamento($fi,$ff,$d->iddepartamento,$c->idcuestionario);
						$val=0;
						if (max($cantidades)!=0)
						{
							$val=round(($cant*10/max($cantidades)));
						}
						$docXml=$docXml."\t<element>\n\t\t<iddepartamento".$opcion.">".$d->iddepartamento."</iddepartamento".$opcion.">\n\t\t";
						$docXml=$docXml."<nombre_departamento".$opcion.">".$d->nombre_departamento."</nombre_departamento".$opcion.">\n\t\t";
						$docXml=$docXml."<cantidad".$opcion.">".$cant."</cantidad".$opcion.">\n\t\t";
						$docXml=$docXml."<radio".$opcion.">".$val."</radio".$opcion.">\n\t</element>\n";
					}
				}
				else
				{
					$cantidades=array();
					foreach ($departamentos as $d)
					{
						array_push($cantidades,$this->Graficos_model->leerNumLeyDepartamento($fi,$ff,$d->iddepartamento,$c->idcuestionario));
					}
					foreach($departamentos as $d)
					{
						$cant=$this->Graficos_model->leerNumLeyDepartamento($fi,$ff,$d->iddepartamento,$c->idcuestionario);
						$val=0;
						if (max($cantidades)!=0)
						{
							$val=round(($cant*10/max($cantidades)));
						}
						$docXml=$docXml."\t<element>\n\t\t<iddepartamento".$opcion.">".$d->iddepartamento."</iddepartamento".$opcion.">\n\t\t";
						$docXml=$docXml."<nombre_departamento".$opcion.">".$d->nombre_departamento."</nombre_departamento".$opcion.">\n\t\t";
						$docXml=$docXml."<cantidad".$opcion.">".$cant."</cantidad".$opcion.">\n\t\t";
						$docXml=$docXml."<radio".$opcion.">".$val."</radio".$opcion.">\n\t</element>\n";
					}
				}
			}
			$docXml=$docXml."</root>\n";
			if (!write_file('datos/cuestionariobubble.xml',$docXml))
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
			$titulo="Temas";
			$docXml="<root>\n";
			foreach ($cuestionarios as $c)
			{
				$cuest=$c->idcuestionario;
				if ($c->idcuestionario!=4)
				{
					$temas=$this->Graficos_model->leerTemasIdCuestionaro($c->idcuestionario);
					foreach($temas as $t)
					{
						$docXml=$docXml."\t<element>\n\t\t<cuest".$cuest."_nomtema>".$t->nombre_tema."</cuest".$cuest."_nomtema>\n\t</element>\n";
					}
					foreach($temas as $t)
					{
						$tem=$t->idtema;
						$cantidades=array();
						foreach ($departamentos as $d)
						{
							array_push($cantidades,$this->Graficos_model->leerNumTemaDepartamento($fi,$ff,$d->iddepartamento,$t->idtema));
						}
						foreach($departamentos as $d)
						{
							$cant=$this->Graficos_model->leerNumTemaDepartamento($fi,$ff,$d->iddepartamento,$t->idtema);
							$valor=0;
							if (max($cantidades)!=0)
							{
								$valor=round(($cant*10/max($cantidades)));
							}
							//$docXml=$docXml."\t<element>\n\t\t<iddepartamento".$opcion.">".$d->iddepartamento."</iddepartamento".$opcion.">\n\t\t";
							$docXml=$docXml."\t<element>\n\t\t<cuest".$cuest."_departamento>".$d->nombre_departamento."</cuest".$cuest."_departamento>\n\t\t";
							$docXml=$docXml."<cuest".$cuest."_tema>".$t->nombre_tema."</cuest".$cuest."_tema>\n\t\t";
							$docXml=$docXml."<cuest".$cuest."_canttema>".$cant."</cuest".$cuest."_canttema>\n\t\t";
							$docXml=$docXml."<cuest".$cuest."_radiotema>".$valor."</cuest".$cuest."_radiotema>\n\t</element>\n";
						}
					}//*/
				}
			}
			$docXml=$docXml."</root>\n";
			if (!write_file('datos/temabubble.xml',$docXml))
			{
				$cargado=false;
			}
			else
			{
				$cargado=true;
			}		
		}
		else if ($a==3)
		{
			$titulo="Actores";
			$docXml="<root>\n";
			foreach ($actores as $a)
			{
				$cantidades=array();
				foreach ($departamentos as $d)
				{
					array_push($cantidades,$this->Graficos_model->leerNumActorDepartamento($fi,$ff,$d->iddepartamento,$a->idactor));
				}
				foreach($departamentos as $d)
				{
					$cant=$this->Graficos_model->leerNumActorDepartamento($fi,$ff,$d->iddepartamento,$a->idactor);
					$val=0;
					if (max($cantidades)!=0)
					{
						$val=round(($cant*10/max($cantidades)));
					}
					$docXml=$docXml."\t<element>\n\t\t<actor".$a->idactor.">".$a->nombre_actor."</actor".$a->idactor.">\n\t\t";
					$docXml=$docXml."<nombre_departamento".$a->idactor.">".$d->nombre_departamento."</nombre_departamento".$a->idactor.">\n\t\t";
					$docXml=$docXml."<cantidad".$a->idactor.">".$cant."</cantidad".$a->idactor.">\n\t\t";
					$docXml=$docXml."<radio".$a->idactor.">".$val."</radio".$a->idactor.">\n\t</element>\n";
				}
			}
			$docXml=$docXml."</root>\n";
			if (!write_file('datos/actorbubble.xml',$docXml))
			{
				$cargado=false;
			}
			else
			{
				$cargado=true;
			}	
		}
		/*else if ($a==4)
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
		}*/
		else 
		{
			
		}
		//------------------------------------------------ carga datos
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
			$titulo="Nacional";
			$opcion=0;
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
			$docXml=$docXml."\t<cuestionarios".$opcion.">\n";
			$docXml=$docXml."\t\t<element>\n\t\t\t<cant_cuest".$opcion.">".count($cuestionarios)."</cant_cuest".$opcion.">\n\t\t</element>\n";
			foreach ($cuestionarios as $c)
			{
				$temas=$this->Graficos_model->leerTemasIdCuestionaro($c->idcuestionario);
				
				$docXml=$docXml."\t\t<element>\n\t\t\t<idcuestionario".$opcion.">".$c->idcuestionario."</idcuestionario".$opcion.">\n\t\t\t";
				$docXml=$docXml."<nombre_cuestionario".$opcion.">".$c->nombre_cuestionario."</nombre_cuestionario".$opcion.">\n\t\t\t";
				$docXml=$docXml."<numero_temas".$opcion.">".count($temas)."</numero_temas".$opcion.">\n\t\t\t";
				if ($c->nombre_cuestionario!="Leyes")
				{
					$valor=0;
					$num=$this->Graficos_model->leerNumCuestionarioNoticia($c->idcuestionario);
					if (max($cantidades)!=0)
					{
						$valor=round($num*100/max($cantidades));
					}
					$docXml=$docXml."<cantidad".$opcion.">".$num."</cantidad".$opcion.">\n\t\t\t";
					$docXml=$docXml."<valor".$opcion.">".$valor."</valor".$opcion.">\n\t\t</element>\n";
				}
				else
				{
					$valor=0;
					$num=$this->Graficos_model->leerNumLeyes();
					if (max($cantidades)!=0)
					{
						$valor=round($num*100/max($cantidades));
					}
					$docXml=$docXml."<cantidad".$opcion.">".$num."</cantidad".$opcion.">\n\t\t\t";
					$docXml=$docXml."<valor".$opcion.">".$valor."</valor".$opcion.">\n\t\t</element>\n";
				}
			}
			$docXml=$docXml."\t</cuestionarios".$opcion.">\n";
			//---------------------------------------temas
			$docXml=$docXml."\t<temas".$opcion.">\n";
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
						$docXml=$docXml."\t\t<element>\n\t\t<idc".$opcion.">".$c->idcuestionario."</idc".$opcion.">\n\t\t\t";
						$docXml=$docXml."<idtema".$opcion.">".$t->idtema."</idtema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<nombre_tema".$opcion.">".$t->nombre_tema."</nombre_tema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<cant_subtemas".$opcion.">".$cantsubtemas."</cant_subtemas".$opcion.">\n\t\t\t";
						$docXml=$docXml."<cantidadportema".$opcion.">".$num."</cantidadportema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<valorportema".$opcion.">".$valor."</valorportema".$opcion.">\n\t\t</element>\n";	
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
						$docXml=$docXml."\t\t<element>\n\t\t<idc".$opcion.">".$c->idcuestionario."</idc".$opcion.">\n\t\t\t";
						$docXml=$docXml."<idtema".$opcion.">".$t->idtema."</idtema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<nombre_tema".$opcion.">".$t->nombre_tema."</nombre_tema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<cant_subtemas".$opcion.">".$cantsubtemas."</cant_subtemas".$opcion.">\n\t\t\t";
						$docXml=$docXml."<cantidadportema".$opcion.">".$num."</cantidadportema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<valorportema".$opcion.">".$valor."</valorportema".$opcion.">\n\t\t</element>\n";	
					}
				}
			}
			$docXml=$docXml."\t</temas".$opcion.">\n";
			//-------------------------------------------subtemas
			$docXml=$docXml."\t<subtemas".$opcion.">\n";
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
							$docXml=$docXml."\t<element>\n\t\t<idt".$opcion.">".$st->rel_idtema."</idt".$opcion.">\n\t\t";
							$docXml=$docXml."<idsubtema".$opcion.">".$st->idsubtema."</idsubtema".$opcion.">\n\t\t";
							$docXml=$docXml."<nombre_subtema".$opcion.">".$st->nombre_subtema."</nombre_subtema".$opcion.">\n\t\t";
							$docXml=$docXml."<cantidadporsubtema".$opcion.">".$numsubtemas."</cantidadporsubtema".$opcion.">\n\t\t";
							if (max($cantsubtemas)!=0)
							{
								$docXml=$docXml."<valorporsubtema".$opcion.">".round($numsubtemas*100/max($cantsubtemas))."</valorporsubtema".$opcion.">\n\t</element>\n";	
							}
							else
							{
								$docXml=$docXml."<valorporsubtema".$opcion.">".max($cantsubtemas)."</valorporsubtema".$opcion.">\n\t</element>\n";	
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
							$docXml=$docXml."\t<element>\n\t\t<idt".$opcion.">".$st->rel_idtema."</idt".$opcion.">\n\t\t";
							$docXml=$docXml."<idsubtema".$opcion.">".$st->idsubtema."</idsubtema".$opcion.">\n\t\t";
							$docXml=$docXml."<nombre_subtema".$opcion.">".$st->nombre_subtema."</nombre_subtema".$opcion.">\n\t\t";
							$docXml=$docXml."<cantidadporsubtema".$opcion.">".$numsubtemas."</cantidadporsubtema".$opcion.">\n\t\t";
							if (max($cantsubtemas)!=0)
							{
								$docXml=$docXml."<valorporsubtema".$opcion.">".round($numsubtemas*100/max($cantsubtemas))."</valorporsubtema".$opcion.">\n\t</element>\n";	
							}
							else
							{
								$docXml=$docXml."<valorporsubtema".$opcion.">".max($cantsubtemas)."</valorporsubtema".$opcion.">\n\t</element>\n";	
							}
						}
					}
				}
			}
			$docXml=$docXml."\t</subtemas".$opcion.">\n";
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
		else //--------------------------------------------------------------------- departamental datos
		{
			$titulo="Departamental";
			$cargado=true;
			$dptos = $this->Graficos_model->leerDepartamentos();
			$dt['departamentos'] = $dptos;
			$docXml="<root>\n";
			foreach ($dptos as $d)
			{//---------------------------------inicio
			$opcion=$d->iddepartamento;
			$cantidades=array();
			$cuestionarios=$this->Graficos_model->leerCuestionarios();
			foreach($cuestionarios as $c) //------------------- max cuestionarios
			{
				if ($c->nombre_cuestionario!="Leyes")
				{
					$num=$this->Graficos_model->leerNumCuestionarioNoticiaDepto($c->idcuestionario,$d->iddepartamento);
				}
				else
				{
					$num=$this->Graficos_model->leerNumLeyesDpto($d->iddepartamento);
				}
				array_push($cantidades,$num);
			}
			$docXml=$docXml."\t<cuestionarios".$opcion.">\n";
			$docXml=$docXml."\t\t<element>\n\t\t\t<cant_cuest".$opcion.">".count($cuestionarios)."</cant_cuest".$opcion.">\n\t\t</element>\n";
			foreach ($cuestionarios as $c)
			{
				$temas=$this->Graficos_model->leerTemasIdCuestionaro($c->idcuestionario);
				
				$docXml=$docXml."\t\t<element>\n\t\t\t<idcuestionario".$opcion.">".$c->idcuestionario."</idcuestionario".$opcion.">\n\t\t\t";
				$docXml=$docXml."<nombre_cuestionario".$opcion.">".$c->nombre_cuestionario."</nombre_cuestionario".$opcion.">\n\t\t\t";
				$docXml=$docXml."<numero_temas".$opcion.">".count($temas)."</numero_temas".$opcion.">\n\t\t\t";
				if ($c->nombre_cuestionario!="Leyes")
				{
					$valor=0;
					$num=$this->Graficos_model->leerNumCuestionarioNoticiaDepto($c->idcuestionario,$d->iddepartamento);
					if (max($cantidades)!=0)
					{
						$valor=round($num*100/max($cantidades));
					}
					$docXml=$docXml."<cantidad".$opcion.">".$num."</cantidad".$opcion.">\n\t\t\t";
					$docXml=$docXml."<valor".$opcion.">".$valor."</valor".$opcion.">\n\t\t</element>\n";
				}
				else
				{
					$valor=0;
					$num=$this->Graficos_model->leerNumLeyesDpto($d->iddepartamento);
					if (max($cantidades)!=0)
					{
						$valor=round($num*100/max($cantidades));
					}
					$docXml=$docXml."<cantidad".$opcion.">".$num."</cantidad".$opcion.">\n\t\t\t";
					$docXml=$docXml."<valor".$opcion.">".$valor."</valor".$opcion.">\n\t\t</element>\n";
				}
			}
			$docXml=$docXml."\t</cuestionarios".$opcion.">\n";
			//---------------------------------------temas
			$docXml=$docXml."\t<temas".$opcion.">\n";
			foreach ($cuestionarios as $c)
			{
				$cantidadesTema=array();
				$temas=$this->Graficos_model->leerTemasIdCuestionaro($c->idcuestionario);
				
				if ($c->nombre_cuestionario!="Leyes")
				{
					foreach ($temas as $t)
					{
						$num=$this->Graficos_model->leerNumTemaNoticiaDepto($t->idtema,$d->iddepartamento); 
						array_push($cantidadesTema,$num);
					}
					foreach ($temas as $t)
					{
						$num=$this->Graficos_model->leerNumTemaNoticiaDepto($t->idtema,$d->iddepartamento);
						$cantsubtemas=$this->Graficos_model->leerCantSubTemasIdTema($t->idtema);
						$valor=0;
						if (max($cantidadesTema)!=0)
						{
							$valor=round($num*100/max($cantidadesTema));
						}
						$docXml=$docXml."\t\t<element>\n\t\t<idc".$opcion.">".$c->idcuestionario."</idc".$opcion.">\n\t\t\t";
						$docXml=$docXml."<idtema".$opcion.">".$t->idtema."</idtema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<nombre_tema".$opcion.">".$t->nombre_tema."</nombre_tema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<cant_subtemas".$opcion.">".$cantsubtemas."</cant_subtemas".$opcion.">\n\t\t\t";
						$docXml=$docXml."<cantidadportema".$opcion.">".$num."</cantidadportema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<valorportema".$opcion.">".$valor."</valorportema".$opcion.">\n\t\t</element>\n";	
					}
				}
				else
				{
					foreach ($temas as $t)
					{
						$num=$this->Graficos_model->leerNumTemaLeyDpto($t->idtema,$d->iddepartamento);
						array_push($cantidadesTema,$num);
					}
					foreach ($temas as $t)
					{
						$cantsubtemas=$this->Graficos_model->leerCantSubTemasIdTema($t->idtema);
						$num=$this->Graficos_model->leerNumTemaLeyDpto($t->idtema,$d->iddepartamento);
						$valor=0;
						if (max($cantidadesTema)!=0)
						{
							$valor=round($num*100/max($cantidadesTema));
						}
						$docXml=$docXml."\t\t<element>\n\t\t<idc".$opcion.">".$c->idcuestionario."</idc".$opcion.">\n\t\t\t";
						$docXml=$docXml."<idtema".$opcion.">".$t->idtema."</idtema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<nombre_tema".$opcion.">".$t->nombre_tema."</nombre_tema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<cant_subtemas".$opcion.">".$cantsubtemas."</cant_subtemas".$opcion.">\n\t\t\t";
						$docXml=$docXml."<cantidadportema".$opcion.">".$num."</cantidadportema".$opcion.">\n\t\t\t";
						$docXml=$docXml."<valorportema".$opcion.">".$valor."</valorportema".$opcion.">\n\t\t</element>\n";	
					}
				}
			}
			$docXml=$docXml."\t</temas".$opcion.">\n";
			//-------------------------------------------subtemas
			$docXml=$docXml."\t<subtemas".$opcion.">\n";
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
							$numsubtemas=$this->Graficos_model->leerNumSubTemaNoticiaDpto($st->idsubtema,$d->iddepartamento);
							array_push($cantsubtemas,$numsubtemas);
						}
						foreach ($subtemas as $st)
						{
							$numsubtemas=$this->Graficos_model->leerNumSubTemaNoticiaDpto($st->idsubtema,$d->iddepartamento);
							$docXml=$docXml."\t<element>\n\t\t<idt".$opcion.">".$st->rel_idtema."</idt".$opcion.">\n\t\t";
							$docXml=$docXml."<idsubtema".$opcion.">".$st->idsubtema."</idsubtema".$opcion.">\n\t\t";
							$docXml=$docXml."<nombre_subtema".$opcion.">".$st->nombre_subtema."</nombre_subtema".$opcion.">\n\t\t";
							$docXml=$docXml."<cantidadporsubtema".$opcion.">".$numsubtemas."</cantidadporsubtema".$opcion.">\n\t\t";
							if (max($cantsubtemas)!=0)
							{
								$docXml=$docXml."<valorporsubtema".$opcion.">".round($numsubtemas*100/max($cantsubtemas))."</valorporsubtema".$opcion.">\n\t</element>\n";	
							}
							else
							{
								$docXml=$docXml."<valorporsubtema".$opcion.">".max($cantsubtemas)."</valorporsubtema".$opcion.">\n\t</element>\n";	
							}
						}
					}
					else
					{
						$subtemas=$this->Graficos_model->leerSubTemasIdTema($t->idtema);
						foreach ($subtemas as $st)
						{
							$numsubtemas=$this->Graficos_model->leerNumSubTemaLeyDepto($st->idsubtema,$d->iddepartamento);
							array_push($cantsubtemas,$numsubtemas);
						}
						foreach ($subtemas as $st)
						{
							$numsubtemas=$this->Graficos_model->leerNumSubTemaLeyDepto($st->idsubtema,$d->iddepartamento);
							$docXml=$docXml."\t<element>\n\t\t<idt".$opcion.">".$st->rel_idtema."</idt".$opcion.">\n\t\t";
							$docXml=$docXml."<idsubtema".$opcion.">".$st->idsubtema."</idsubtema".$opcion.">\n\t\t";
							$docXml=$docXml."<nombre_subtema".$opcion.">".$st->nombre_subtema."</nombre_subtema".$opcion.">\n\t\t";
							$docXml=$docXml."<cantidadporsubtema".$opcion.">".$numsubtemas."</cantidadporsubtema".$opcion.">\n\t\t";
							if (max($cantsubtemas)!=0)
							{
								$docXml=$docXml."<valorporsubtema".$opcion.">".round($numsubtemas*100/max($cantsubtemas))."</valorporsubtema".$opcion.">\n\t</element>\n";	
							}
							else
							{
								$docXml=$docXml."<valorporsubtema".$opcion.">".max($cantsubtemas)."</valorporsubtema".$opcion.">\n\t</element>\n";	
							}
						}
					}
				}
			}
			$docXml=$docXml."\t</subtemas".$opcion.">\n";
			}//---------------------------------fin
			$docXml=$docXml."</root>\n";
			if (!write_file('datos/cuestionariobar.xml',$docXml))
			{
				$cargado=false;
			}
			else
			{
				$cargado=true;
			}//*/
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
		$dt['actores'] = $this->Actor_model->leerActores();

		if ($cargado==false)
		{
			$this->load->view('graficos/vgraficosinicio');
		}
		else
		{
			$this->load->view('graficos/vgraficochord',$dt);
		}
	}
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
		public function getMCcanalDtv()
	{
//		$json = array();
		$fecha = json_decode($this->input->post('fecha')) ;
		$respuesta = $this->Radial_model->leerMCcanalDtv($fecha);
//		header('Content-Type: application/json');
		echo json_encode($respuesta);
	}
		public function getMCemisoraRadial()
	{
//		$json = array();
		$fecha = json_decode($this->input->post('fecha')) ;
		$respuesta = $this->Radial_model->leerMCemisoraRadial($fecha);
//		header('Content-Type: application/json');
		echo json_encode($respuesta);
	}
		public function getMCprensaEscrita()
	{
//		$json = array();
		$fecha = json_decode($this->input->post('fecha')) ;
		$respuesta = $this->Radial_model->leerMCprensaEscrita($fecha);
//		header('Content-Type: application/json');
		echo json_encode($respuesta);
	}
		public function getMCtvRural()
	{
//		$json = array();
		$fecha = json_decode($this->input->post('fecha')) ;
		$respuesta = $this->Radial_model->leerMCtvRural($fecha);
//		header('Content-Type: application/json');
		echo json_encode($respuesta);
	}

	//Genera la matriz en el intervalo de fecha_inicial y fecha_final
	public function matrizCuerdasActorFormulario($fecha_inicial, $fecha_final, $idactor)
	{
		//fecha_minima ------- fecha_inicial ------- $fecha_final
		$fecha_minima = $this->Graficos_model->fechaMinimaNoticia();
		$datoRef_t0 = $this->Graficos_model->datoActorCuestionario($fecha_minima, $fecha_inicial, $idactor, 1);
		$datoIns_t0 = $this->Graficos_model->datoActorCuestionario($fecha_minima, $fecha_inicial, $idactor, 2);
		$datoCenso_t0 = $this->Graficos_model->datoActorCuestionario($fecha_minima, $fecha_inicial, $idactor, 3);;
		$datoRef_tf = $this->Graficos_model->datoActorCuestionario($fecha_minima, $fecha_final, $idactor, 1) - $datoRef_t0;
		$datoIns_tf = $this->Graficos_model->datoActorCuestionario($fecha_minima, $fecha_final, $idactor, 2) - $datoIns_t0;
		$datoCenso_tf = $this->Graficos_model->datoActorCuestionario($fecha_minima, $fecha_final, $idactor, 3) - $datoCenso_t0;

		/** @noinspection PhpLanguageLevelInspection */
		$matriz = [
			[0, 0, 0, $datoRef_tf, 0, 0],
			[0, 0, 0, 0, $datoIns_tf, 0],
			[0, 0, 0, 0, 0, $datoCenso_tf],
			[$datoRef_t0, 0, 0, 0, 0, 0],
			[0, $datoIns_t0, 0, 0, 0, 0],
			[0, 0, $datoCenso_t0, 0, 0, 0],
		];

		return $matriz;

	}

	//Procedimiento ajax para adquision de datos
	//Matriz de adyacencia actor-formulario en un intervalo de tiempo
	public function getmatrizactor()
	{
		$json = array();
		$datos = json_decode($this->input->post('datos')) ;
		$matriz = $this->matrizCuerdasActorFormulario($datos->fecha_inicio, $datos->fecha_fin, $datos->idactor);
		header('Content-Type: application/json');
		echo json_encode($matriz);
		//$matriz = $this->matrizCuerdasActorFormulario();
	}

}
