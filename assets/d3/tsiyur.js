var escalaColores,ucolor;
var xmlData=[];
var labelet;
function defineColores(colores)
{
	switch (colores)
	{
		case "Reforma Electoral":
			for (var k=1;k<=9;k++)
			{
				escalaColores=d3.range(9).map(function (k){
					return "#"+k+k+"C90F";
				});
			}
			labelet="Reforma Electoral";
			ucolor="#33C90F";
			break;
		case "Institucionalidad Democratica":
			for (var k=1;k<=9;k++)
			{
				escalaColores=d3.range(9).map(function (k){
					return "#CC"+k+k+"0F";
				});
			}
			labelet="Institucionalidad Democratica";
			ucolor="#CC450F";
			break;
		case "Censo":
			for (var k=1;k<=9;k++)
			{
				escalaColores=d3.range(9).map(function (k){
					return "#03A"+k+"F4";
				});
			}		
			labelet="Censo";
			ucolor="#33A7F4";
			break;
		case "Leyes":
			for (var k=1;k<=9;k++)
			{
				escalaColores=d3.range(9).map(function (k){
					return "#8F"+k+k+"85";
				});
			}	
			ucolor="#8F7585";
			break;
		case "Actor":
			for (var k=1;k<=9;k++)
			{
				escalaColores=d3.range(9).map(function (k){
					return "#8F"+k+k+"85";
				});
			}	
			ucolor="#DF1C44";
			break;
		case "TipoMedio":
			for (var k=1;k<=9;k++)
			{
				escalaColores=d3.range(9).map(function (k){
					return "#60"+k+k+"8B";
				});
			}	
			ucolor="#39A275";
			break;
		//#39A275,#FECF6A,#194A8D,#795548,#607D8B
	}
}

function render(direccion,clor,et)
{
	labelet=et;
	d3.selectAll("svg").remove();
	defineColores(clor);
	//var direccion="http://localhost/ocd/datos/departamentos.xml";
	d3.xml(direccion).then(function (dtxml){
			xmlData=d3.range(0,9).map(function (d,i){
				var nombreDpto;
				var valorX,valorY,valorRadio;
				nombreDpto=dtxml.documentElement.getElementsByTagName("nombre_departamento")[i].textContent;
				valorRadio=parseFloat(dtxml.documentElement.getElementsByTagName("radio")[i].textContent);
				valorNum = parseFloat(dtxml.documentElement.getElementsByTagName("cantidad")[i].textContent);
				switch (nombreDpto)
				{
					case "La Paz":
						valorX=1.5;
						valorY=4.7;
						break;
					case "Oruro":
						valorX=1.8;
						valorY=6.2;
						break;
					case "Potosi":
						valorX=2.3;
						valorY=7.6;
						break;
					case "Cochabamba":
						valorX=3.1;
						valorY=5.2;
						break;
					case "Chuquisaca":
						valorX=4.0;
						valorY=6.8;
						break;
					case "Tarija":
						valorX=4.0;
						valorY=8.0;
						break;
					case "Pando":
						valorX=1.8;
						valorY=1.4;
						break;
					case "Beni":
						valorX=3.3;
						valorY=3.2;
						break;
					case "Santa Cruz":
						valorX=5.7;
						valorY=5.4;
						break;
				}
			return {u:nombreDpto,x:valorX,y:valorY,v:valorNum,r:valorRadio};
			});
			d3.selectAll("svg").remove();
			var bChart = bubbleChart()
			.x(d3.scaleLinear().domain([0,10]).range([0,500]))
			.y(d3.scaleLinear().domain([0,10]).range([0,500]))
			.r(d3.scaleLinear().domain([0,10]).range([0,40]))
			.etiqueta(labelet)
			.colores(escalaColores)
			.uncolor(ucolor);
			bChart.datos(xmlData);
			bChart.render();
		});	
}
function bubbleChart ()
{
	//----------------atributos
	var _chart={};
	var _datos=[],
		_ancho=800, _alto=500,
		_margenes={arriba:20,derecha:30,abajo:20,izquierda:30},
		_x,_y,_r,
		//_colores=d3.schemeSet1,
		_colores,
		_uncolor,
		_etiqueta,
		_svg,
		_bodyG;
	//----------------set,get atributos del objeto chart
	_chart.ancho= function (a){
		if(!arguments.length) return _ancho; _ancho=a;
		return _chart;
	}
	_chart.alto = function (h){
		if(!arguments.length) return _alto; _alto=h;
		return _chart;
	}
	_chart.margenes = function (m){
		if (!arguments.length) return _margenes; _margenes=m;
		return _chart;
	};
	_chart.colores = function (c) {
		if (!arguments.length) return _colores; _colores=c;
		return _chart;
	}
	_chart.uncolor= function (uc){
		if (!arguments.length) return _uncolor; _uncolor=uc;
		return _chart;
	}
	_chart.x = function (x){
		if(!arguments.length) return _x; _x=x;
		return _chart;
	}
	_chart.y = function (y){
		if(!arguments.length) return _y; _y=y;
		return _chart;
	}
	_chart.r = function (r){
		if(!arguments.length) return _r; _r=r;
		return _chart;
	}
	_chart.datos = function (dts){  
		_datos.push(dts);
		return _chart;
	}
	_chart.etiqueta = function (e){
		if (!arguments.length) return _etiqueta; _etiqueta=e;
		return _chart;
	}
	//------------------ metodos del objeto chart
	_chart.render = function () {
		if (!_svg){
			_svg = d3.select("body").select("#contenedor-chart")
					.append("svg")
					.style("background-image","url('http://localhost/ocd/assets/d3/mapaBoliviablanco.svg')")
					.style("background-repeat","no-repeat")
					.attr("width",_ancho)
					.attr("height",_alto);
			defineVentana(_svg);
		}
		renderBodyChart(_svg);
	}
	//-------------------- funciones internas de clase
	function defineVentana(svg)
	{
		svg.append("defs")
			.append("clipPath")
			.attr("id","ventana")
			.append("rect")
			.attr("x",0)
			.attr("y",0)
			.attr("width",_ancho-_margenes.izquierda-_margenes.derecha)
			.attr("height",_alto-_margenes.arriba-_margenes.abajo);
	}
	function renderBodyChart(svg)
	{
		if (!_bodyG)
		{
			_bodyG = svg.append("g")
						.style("fill-opacity",0.8)
						.attr("class","body")
						.attr("transform","translate("+xInicio()+","+yInicio()+")")
						.attr("clip-path","url(#ventana)");
		}
		renderBubbles();
	}
	function xInicio()
	{
		return _margenes.izquierda;
	}
	function xFin()
	{
		return _margenes.derecha;
	}
	function yInicio()
	{
		return _margenes.arriba;
	}
	function yFin()
	{
		return _margenes.abajo;
	}
	function renderBubbles()
	{
		_datos.forEach(function (d,i){
			_bodyG.selectAll("circle")
					.data(d)
					.enter()
					.append("circle")
					.attr("class","bubble")
					.style("stroke",_uncolor)
					.style("fill",_uncolor);
			_bodyG.selectAll("circle")
					.data(d)
					/*.style("stroke",function (d,j){
						return _colores[j];
					})
					.style("fill",function (d,j){
						return _colores[j];
					})*/
					.transition().duration(3000)
					.attr("cx",function (d){
					return _x(d.x);
					})
					.attr("cy",function (d){
						return _y(d.y);
					})
					.attr("r",function (d){
						return _r(d.r);
					});
			d3.select("svg").append("text")
							.style("outline","3px solid "+_uncolor)
							.attr("class","etiqueta")
							.attr("font-size","1.2em")
							.attr("font-family","Courier New")
							.attr("x",20)
							.attr("y",30)
							.text(_etiqueta);
			d3.select("svg").selectAll("text.nombre")
							.data(d)
							.enter()
							.append("text")
							.attr("class","nombre")
							.attr("font-size","1em")
							.attr("x",500)
							.attr("y",function (d,i){
								return (100+20*i);
							})
							.text(function (d){
								return d.u+":  "+d.v;
							});
		});
	}
	
	//-------------------- objeto _chart
	return _chart;
}
//-------------------------------------------------------- barrasChart
//-------------------------------------------------
//------------------------------------------
function renderBarras(dir)
{
	d3.selectAll("svg").remove();
	var xmlCuest=[],xmlTemas=[],xmlTemaRef=[],xmlTemaInst=[],xmlTemaCenso=[],xmlTemaLey=[],xmlST=[],xmlSubTemas=[];
	var barrasChart = barChart()
			.x(d3.scaleLinear([0,750]).domain([0,100]))
			.y(d3.scaleLinear([50,700]).domain([0,100]))
			.colores(d3.scaleOrdinal(["#93C90F","#EF9600","#00A3E1","#7c5295"]).domain([0,1,2,3]));
	d3.xml(dir).then(function (dtxml){
		//console.log(dtxml.documentElement.getElementsByTagName("cant_cuest")[0].textContent);
		const cantCuestionarios=dtxml.documentElement.getElementsByTagName("cant_cuest")[0].textContent; //array[4]
		const cantTemas=dtxml.documentElement.getElementsByTagName("numero_temas"); //array[10,5,4,22]
		const i1=parseInt(cantTemas[0].textContent),i2=parseInt(cantTemas[1].textContent),
				i3=parseInt(cantTemas[2].textContent),i4=parseInt(cantTemas[3].textContent);
		var indice=0,cnt=0;
		var nombreCuest,nombre_tema;
		var numtemas,valorNum,idCuest,cant,idc,idtema,cantidadxtema,valorxtema;
		//------------------------------- cuestionarios
		idCuest=dtxml.documentElement.getElementsByTagName("idcuestionario");
		nombreCuest=dtxml.documentElement.getElementsByTagName("nombre_cuestionario");
		numtemas=dtxml.documentElement.getElementsByTagName("numero_temas");
		cant = dtxml.documentElement.getElementsByTagName("cantidad");
		valorNum = dtxml.documentElement.getElementsByTagName("valor");
		xmlCuest=d3.range(0,cantCuestionarios).map(function (d,i){
			return {id:parseInt(idCuest[i].textContent),n:nombreCuest[i].textContent,
					nt:parseInt(numtemas[i].textContent),c:parseInt(cant[i].textContent),v:parseFloat(valorNum[i].textContent)};
		});
		//------------------------------- temas
		idc=dtxml.documentElement.getElementsByTagName("idc");
		idtema=dtxml.documentElement.getElementsByTagName("idtema");
		nombre_tema=dtxml.documentElement.getElementsByTagName("nombre_tema");
		cantsubtemas=dtxml.documentElement.getElementsByTagName("cant_subtemas");
		cantidadxtema=dtxml.documentElement.getElementsByTagName("cantidadportema");
		valorxtema=dtxml.documentElement.getElementsByTagName("valorportema");
		xmlTemaRef=d3.range(0,i1).map(function (d,i){
			return {id:parseInt(idc[i].textContent),idt:parseInt(idtema[i].textContent),
					n:nombre_tema[i].textContent,cst:parseInt(cantsubtemas[i].textContent),
					c:parseInt(cantidadxtema[i].textContent),v:parseFloat(valorxtema[i].textContent)};
		});
		xmlTemaInst=d3.range(0,i2).map(function (d,i){
			return {id:parseInt(idc[i+i1].textContent),idt:parseInt(idtema[i+i1].textContent),
					n:nombre_tema[i+i1].textContent,cst:parseInt(cantsubtemas[i+i1].textContent),
					c:parseInt(cantidadxtema[i+i1].textContent),v:parseFloat(valorxtema[i+i1].textContent)};
		});
		xmlTemaCenso=d3.range(0,i3).map(function (d,i){
			return {id:parseInt(idc[i+i1+i2].textContent),idt:parseInt(idtema[i+i1+i2].textContent),
					n:nombre_tema[i+i1+i2].textContent,cst:parseInt(cantsubtemas[i+i1+i2].textContent),
					c:parseInt(cantidadxtema[i+i1+i2].textContent),v:parseFloat(valorxtema[i+i1+i2].textContent)};
		});
		xmlTemaLey=d3.range(0,i4).map(function (d,i){
			return {id:parseInt(idc[i+i1+i2+i3].textContent),idt:parseInt(idtema[i+i1+i2+i3].textContent),
					n:nombre_tema[i+i1+i2+i3].textContent,cst:parseInt(cantsubtemas[i+i1+i2+i3].textContent),
					c:parseInt(cantidadxtema[i+i1+i2+i3].textContent),v:parseFloat(valorxtema[i+i1+i2+i3].textContent)};
		});
		xmlTemas.push(xmlTemaRef);
		xmlTemas.push(xmlTemaInst);
		xmlTemas.push(xmlTemaCenso);
		xmlTemas.push(xmlTemaLey);
		//------------------------------------- subtemas
		idt=dtxml.documentElement.getElementsByTagName("idt");
		idsubtema=dtxml.documentElement.getElementsByTagName("idsubtema");
		nombre_subtema=dtxml.documentElement.getElementsByTagName("nombre_subtema");
		cantidadxsubtema=dtxml.documentElement.getElementsByTagName("cantidadporsubtema");
		valorxsubtema=dtxml.documentElement.getElementsByTagName("valorporsubtema");
		for (var k=0;k<cantsubtemas.length;k++)
		{
			cnt=0;
			xmlST=d3.range(0,parseInt(cantsubtemas[k].textContent)).map(function (d,i){
				cnt=cnt+1;
				return {idt:parseInt(idt[i+indice].textContent),idst:parseInt(idsubtema[i+indice].textContent),
						n:nombre_subtema[i+indice].textContent,c:parseInt(cantidadxsubtema[i+indice].textContent),
						v:parseFloat(valorxsubtema[i+indice].textContent)};
			});
			xmlSubTemas.push(xmlST);
			indice=indice+cnt;
		}
		
		barrasChart.datos(xmlCuest);
		barrasChart.datos1(xmlTemas);
		barrasChart.datos2(xmlSubTemas);
		barrasChart.render();
	});
	
	
}
function barChart ()
{
	//----------------atributos
	var _chart={};
	var _datos=[],_datos1=[],_datos2=[],
		_ancho=800, _alto=600, _barrasIni=20,
		_margenes={arriba:20,derecha:20,abajo:20,izquierda:20},
		_x, _y, _nivel,
		_colores,
		_uncolor,
		_etiqueta,
		_svg,
		_bodyG;
	//-------------------- objeto _chart
	_chart.ancho = function (a){
		if(!arguments.length) return _ancho; _ancho=a;
		return _chart;
	}
	_chart.alto = function (h){
		if(!arguments.length) return _alto; _alto=h;
		return _chart;
	}
	_chart.margenes = function (m){
		if(!arguments.length) return _margenes; _margenes=m;
		return _chart;
	}
	_chart.x = function (x){
		if(!arguments.length) return _x; _x=x;
		return _chart;
	}
	_chart.y = function (y){
		if(!arguments.length) return _y; _y=y;
		return _chart;
	}
	_chart.colores = function (c){
		if(!arguments.length) return _colores; _colores=c;
		return _chart;
	}
	_chart.uncolor = function (uc){
		if(!arguments.length) return _uncolor; _uncolor=uc;
		return _chart;
	}
	_chart.etiqueta = function (e){
		if (!arguments.length) return _etiqueta; _etiqueta=e;
		return _chart;
	}
	_chart.datos = function (dts){  
		if(!arguments.length) return _datos; _datos=dts;
		//_datos.push(dts);
		return _chart;
	}
	_chart.datos1 = function (dts){  
		if(!arguments.length) return _datos1; _datos1=dts;
		//_datos.push(dts);
		return _chart;
	}
	_chart.datos2 = function (dts){  
		if(!arguments.length) return _datos2; _datos2=dts;
		//_datos.push(dts);
		return _chart;
	}
	//---------------------- metodo objeto chart
	_chart.render = function () {
		if (!_svg){
			_svg = d3.select("body").select("#contenedor-chart")
					.append("svg")
					.attr("width",_ancho)
					.attr("height",_alto);
			defineVentana(_svg);
		}
		renderBodyChart(_svg);
	}
	//-------------------- funciones internas de clase
	function defineVentana(svg)
	{
		svg.append("defs")
			.append("clipPath")
			.attr("id","ventana")
			.append("rect")
			.attr("x",0)
			.attr("y",0)
			.attr("width",_ancho-_margenes.izquierda-_margenes.derecha)
			.attr("height",_alto-_margenes.arriba-_margenes.abajo);
	}
	function renderBodyChart(svg)
	{
		if (!_bodyG)
		{
			_bodyG = svg.append("g")
						.attr("class","body")
						.attr("transform","translate("+xInicio()+","+yInicio()+")")
						.attr("clip-path","url(#ventana)");
		}
		renderBars();
	}
	function xInicio()
	{
		return _margenes.izquierda;
	}
	function xFin()
	{
		return _margenes.derecha;
	}
	function yInicio()
	{
		return _margenes.arriba;
	}
	function yFin()
	{
		return _margenes.abajo;
	}
	function renderBars()
	{
		_nivel=1;
		_bodyG.append("rect")
				.attr("class","fondo")
				.attr("fill","none")
				.attr("pointer-events","all")
				.attr("width",_ancho)
				.attr("height",_alto)
				.attr("cursor","pointer")
				.on("click",(event,d) => sube(_nivel));
		barrasCuest();
	}
	function sube(n)
	{
		if (n==1) 
		{
			console.log("no seube");
		}
		else 
		{
			_nivel=1;
			_bodyG.selectAll("rect.selector")
				.remove()
			_bodyG.selectAll("rect.tema")
				.remove()
			_bodyG.selectAll("rect.subtema")
				.remove()
			_bodyG.selectAll(".etiqueta")
				.remove()
			barrasCuest();
		}
	}
	function barrasCuest()
	{
		_bodyG.selectAll("rect.selector")
			.remove()
		_bodyG.selectAll("rect.tema")
			.remove()
		_bodyG.selectAll(".etiqueta")
			.remove()
	
		_bodyG.selectAll("rect.selector")
			.data(_datos)
			.enter()
			.append("rect")
			.attr("class","selector")
			.attr("fill",function (d,i){
					return _colores(i);
				})
			.attr("x",0)
			.attr("y",function (d,i){
				return (_barrasIni+i*25);
			})
			.attr("height",20)
			.attr("width",15)
			.attr("pointer-events", "all")
			.attr("cursor","pointer")
			.on("click",(event,d)=>bajaTemas(d,_nivel+1));
		_bodyG.selectAll("rect.cuest")
			.data(_datos)
			.enter()
			.append("rect")
			.attr("class","cuest")
			.attr("fill",function (d,i){
					return _colores(i);
				})
			.attr("x",20)
			.attr("y",function (d,i){
				return (_barrasIni+i*25);
			})
			.attr("height",20)
			.transition().duration(3000)
			.attr("width",function (d,i){
				return _x(d.v);
			});
		ponerEtiquetas(_datos);
	}
	function bajaTemas(dt,n)
	{
		_bodyG.select(".titulo")
			.remove();
		_nivel=n;
		_bodyG.selectAll(".etiqueta")
			.remove();
		_bodyG.selectAll(".selector")
			.remove();
		_bodyG.selectAll(".cuest")
			.filter(function (d,i){
				return d.id != dt.id;
			})
			.remove();
		_bodyG.selectAll(".cuest")
			.transition().duration(2000)
			.on("end",function (d,i){
				barrasTema(d.id);
				return "";
			})
			.attr("x",0)
			.attr("y",_barrasIni)
			.attr("width",15)
			.attr("height",function (d){
				return (d.nt*20+d.nt*5);
			});
	}
	function barrasTema(ident)
	{
		_bodyG.select(".cuest")
			.remove();
		_bodyG.selectAll("rect.selector")
			.data(_datos1[ident-1])
			.enter()
			.append("rect")
			.attr("class","selector")
			.attr("fill",_colores(ident-1))
			.attr("pointer-events", "all")
			.attr("cursor","pointer")
			.on("click",(event,d)=>bajaSubTemas(d,_nivel+1,_colores(ident-1)))
			.attr("x",0)
			.attr("y",function (d,i){
				return (_barrasIni+i*25);
			})
			.attr("height",20)
			.attr("width",15)
			.transition().duration(2000)
			.attr("x",0)
			.attr("y",function (d,i){
				return (_barrasIni+i*25);
			})
			.attr("height",20)
			.attr("width",15)
		_bodyG.selectAll("rect.tema")
			.data(_datos1[ident-1])
			.enter()
			.append("rect")
			.attr("class","tema")
			.attr("fill",_colores(ident-1))
			.attr("x",20)
			.attr("y",function (d,i){
				return (_barrasIni+i*25);
			})
			.attr("height",20)
			.transition().duration(3000)
			//.delay(2000)
			.attr("width",function (d){
				return _x(d.v);
			});
		ponerEtiquetas(_datos1[ident-1]);
	}
	function bajaSubTemas(dt,n,tcolor)
	{
		_bodyG.select(".titulo")
			.remove();
		_nivel=n;
		_bodyG.selectAll(".etiqueta")
			.remove();
		_bodyG.selectAll(".selector")
			.remove();
		_bodyG.selectAll(".tema")
			.filter(function (d,i){
				return (d.idt!=dt.idt);
			})
			.remove();
		_bodyG.selectAll(".tema")
			.transition().duration(2000)
			.on("end",function (d,i){
				barrasSubTemas(d.idt,tcolor);
				return "";
			})
			.attr("x",0)
			.attr("y",_barrasIni)
			.attr("width",15)
			.attr("height",function (d){
				return (d.cst*20+d.cst*5);
			});
	}
	function barrasSubTemas(idt,barcolor)
	{
		_bodyG.select(".tema")
			.remove();
		_bodyG.selectAll("rect.selector")
			.data(_datos2[idt-1])
			.enter()
			.append("rect")
			.attr("class","selector")
			.attr("fill",barcolor)
			.attr("x",0)
			.attr("y",function (d,i){
				return (_barrasIni+i*25);
			})
			.attr("height",20)
			.attr("width",15)
			.transition().duration(2000)
			.attr("x",0)
			.attr("y",function (d,i){
				return (_barrasIni+i*25);
			})
			.attr("height",20)
			.attr("width",15)
		_bodyG.selectAll("rect.subtema")
			.data(_datos2[idt-1])
			.enter()
			.append("rect")
			.attr("class","subtema")
			.attr("fill",barcolor)
			.attr("x",20)
			.attr("y",function (d,i){
				return (_barrasIni+i*25);
			})
			.attr("height",20)
			.transition().duration(3000)
			//.delay(2000)
			.attr("width",function (d){
				return _x(d.v);
			});
		ponerEtiquetas(_datos2[idt-1]);
	}
	function ponerEtiquetas(dte)
	{
		_bodyG.select(".titulo")
			.remove();
		if (_nivel==1)
		{
			_etiqueta="Cuetionarios";
		}
		else if(_nivel==2)
		{
			_etiqueta="Temas";
		}
		else 
		{
			_etiqueta="SubTemas";
		}
		_bodyG.append("text")
			.attr("class","titulo")
			.attr("font-size","1em")
			.attr("font-family","Courier New")
			.attr("x",_ancho/2-70)
			.attr("y",12)
			.text(_etiqueta);
		_bodyG.selectAll("text.etiqueta")
				.data(dte)
				.enter()
				.append("text")
				.attr("class","etiqueta")
				.attr("font-size","1em")
				.attr("x",20)
				.attr("y",function (d,i){
					return (_barrasIni+15+25*i);
				})
				.text(function (d){
					return d.c+":  "+d.n;
				});
	}
	//--------------------------------- objeto
	return _chart;
}
//-------------------------------------------------------- cuerdasChart
//-------------------------------------------------
//------------------------------------------
function renderCuerdas(dir)
{
	var M = [[0,0,0,10,0,0],
			 [0,0,0,0,15,0],
			 [0,0,0,0,0,20],
			 [12,0,0,0,0,0],
			 [0,4,0,0,0,0],
			 [0,0,6,0,0,0]];
	var dts=Object.assign(M,
						{n:["R0","I0","C0","R1","I1","C1"],
						c:["#33C90F","#CC450F","#33A7F4","#33C90F","#CC450F","#33A7F4"]});
	var noms = dts.n === undefined ? d3.range(dts.length) : dts.n;
	var clrs = dts.c === undefined ? d3.quantize(d3.interpolateRainbow,nombres.length) : dts.c;
	//colr=d3.scaleOrdinal(clrs).domain(nombres);
	console.log(noms);
	var cChart = cuerdasChart();
		cChart.datosCuerdas(dts);
		cChart.colores(clrs);
		cChart.nombres(noms);
		cChart.render();
}
function cuerdasChart()
{
	var _chart={};
	var _datosCuerdas,
		_ancho=800, _alto=600,
		_margenes={arriba:20,derecha:20,abajo:20,izquierda:20},
		_ri,_rx,
		_nombres=[],
		_colores=[],
		_cintas,
		_arcos,
		_cuerdas,
		_uncolor,
		_etiqueta,
		_svg,
		_bodyG;
		
	_chart.ancho = function (a){
		if(!arguments.length) return _ancho; _ancho=a;
		return _chart;
	}
	_chart.alto = function (h){
		if(!arguments.length) return _alto; _alto=h;
		return _chart;
	}
	_chart.margenes = function (m){
		if(!arguments.length) return _margenes; _margenes=m;
		return _chart;
	}
	_chart.colores = function (c){
		if(!arguments.length) return _colores; _colores=c;
		return _chart;
	}
	_chart.uncolor = function (uc){
		if(!arguments.length) return _uncolor; _uncolor=uc;
		return _chart;
	}
	_chart.ri = function (r){
		if(!arguments.length) return _ri; _ri=r;
		return _chart;
	}
	_chart.re = function (r){
		if(!arguments.length) return _re; _re=r;
		return _chart;
	}
	_chart.etiqueta = function (e){
		if (!arguments.length) return _etiqueta; _etiqueta=e;
		return _chart;
	}
	_chart.datosCuerdas = function (m){  
		if(!arguments.length) return _datosCuerdas; _datosCuerdas=m;
		//_datos.push(dts);
		return _chart;
	}
	_chart.cuerdas = function (c){  
		if(!arguments.length) return _cuerdas; _cuerdas=c;
		//_datos.push(dts);
		return _chart;
	}
	_chart.nombres = function (n){  
		if(!arguments.length) return _nombres; _nombres=n;
		//_nombres.push();
		return _chart;
	}
	_chart.render = function () {
		if (!_svg){
			_svg = d3.select("body").select("#contenedor-chart")
					.append("svg")
					.attr("width",_ancho)
					.attr("height",_alto);
			defineVentana(_svg);
		}
		renderBodyChart(_svg);
	}
	//-------------------- funciones internas de clase
	function defineVentana(svg)
	{
		svg.append("defs")
			.append("clipPath")
			.attr("id","ventana")
			.append("rect")
			.attr("x",0)
			.attr("y",0)
			.attr("width",_ancho-_margenes.izquierda-_margenes.derecha)
			.attr("height",_alto-_margenes.arriba-_margenes.abajo);
	}
	function renderBodyChart(svg)
	{
		if (!_bodyG)
		{
			_bodyG = svg.append("g")
						.attr("class","body")
						.attr("transform","translate("+xInicio()+","+yInicio()+")")
						.attr("clip-path","url(#ventana)");
		}
		renderChords();
	}
	function xInicio()
	{
		return _margenes.izquierda;
	}
	function xFin()
	{
		return _margenes.derecha;
	}
	function yInicio()
	{
		return _margenes.arriba-_margenes.abajo;
	}
	function yFin()
	{
		return _margenes.abajo;
	}
	
	//-------------------------------------- Chord
	function renderChords()
	{
		var mapNomColor=d3.scaleOrdinal(_nombres,_colores);
		_re=Math.min((_ancho-100)/2,(_alto-100)/2);
		_ri= _re-10;
		//------------------ funciones grafico
		cints = d3.ribbon() //-------------- f()
					.radius(_ri-1)
					.padAngle(1/_ri);
		arcs = d3.arc()  //--------------f()
					.innerRadius(_ri)
					.outerRadius(_re);
		chrd = d3.chord()  //-------------- f(c)
					.padAngle(10/_ri)
					.sortSubgroups(d3.descending)
					.sortChords(d3.descending);
		_cuerdas = chrd(_datosCuerdas);
		console.log(_cuerdas);
		const grupo = _bodyG.append("g")
						.attr("transform", "translate(" + _ancho / 2 + "," + _alto / 2 + ")")
						.attr("class","grupo")
						.selectAll(".grupo")
						.data(_cuerdas.groups)
						.join("g")
						.append("path")
						.attr("fill",d=>mapNomColor(_nombres[d.index]))
						.attr("d",arcs);
		_bodyG.append("g")
			.attr("transform", "translate(" + _ancho / 2 + "," + _alto / 2 + ")")
			.attr("fill-opacity",0.7)
			.selectAll("path")
			.data(_cuerdas)
			.join("path")
			.style("mix-blend-mode","multiply")
			.attr("fill",d=>mapNomColor(_nombres[d.source.index]))
			//.attr("fill","purple")
			.attr("d",cints);
	}
	//------------------------
	return _chart;
}


