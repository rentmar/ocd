//----------------------------------definicion datos
var numSeries=1,numDataPoint=11,data=[];
data.push(d3.range(numDataPoint).map(function () {
	return {x: randomData(), y:randomData(), r:randomData() };
}));
var series = data[0];
//----------------------------------
function randomData()
{
	return Math.random()*9;
}
function render ()
{	
	console.log("http://localhost/ocd//assets/d3/mapaBoliviablanco.svg");
	d3.selectAll("h1").remove();
	d3.selectAll("svg").remove();
	//d3.selectAll("circle").remove();
	d3.select("body").append("h1").text("Iniciando");
	
	var chart = bubbleChart()
					.x(d3.scaleLinear().domain([0,10]).range([30,600]))
					.y(d3.scaleLinear().domain([0,10]).range([30,300]))
					.r(d3.scalePow().exponent(2).domain([0,10]));
	data.forEach(function (series){
		chart.addSeries(series);
	})
	chart.render();
}
function bubbleChart ()
{
	//---------------------------propiedades
	var _chart = {};
	var _ancho=600, _alto=600,
		_margenes={top:30,left:30,right:30,bottom:30},
		_data=[],
		_x,_y,_r,
		_colores= d3.schemeCategory10,
		_svg,
		_bodyG;
	//------------------------ set y get propiedad objeto chart y metodo render objeto chart
	//--------------------------atributos del atributo objeto chart
	_chart.ancho = function (w)
	{
		if (!arguments.length) return _ancho; _ancho=w;
		return _chart;
	}
	_chart.alto = function (h)
	{
		if(!arguments.length) return _alto; _alto=h;
		return _chart;
	}
	_chart.margenes = function (m)
	{
		if (!arguments.length) return _margenes; _margenes=m;
		return _chart;
	}
	_chart.colores = function (c)
	{
		if(!arguments.length) return _colores; _colores=c;
		return _chart;
	}
	_chart.x = function (x)
	{
		if(!arguments.length) return _x; _x=x;
		return _chart;
	}
	_chart.y = function (y)
	{
		if(!arguments.length) return _y; _y=y;
		return _chart;
	}
	_chart.r = function (r)
	{
		if(!arguments.length) return _r; _r=r;
		return _chart;
	}
	//--------------------------metodos del atributo objeto chart
	_chart.render = function (){
		if(!_svg)
		{
			_svg = d3.select("body").append("svg")
					.style("background-image","url('http://localhost/ocd//assets/d3/mapaBoliviablanco.svg')")
					.style("background-repeat","no-repeat")
					.attr("width",_ancho)
					.attr("height",_alto);
				
			defineBodyMascara(_svg);
		}
		renderBody(_svg);
	}
	_chart.addSeries = function (series)
	{
		_data.push(series);
		return _chart;
	}
	//---------------------------------- funciones internas 
	function defineBodyMascara(svg)
	{
		var padding=0;
		svg.append("defs")
			.append("clipPath")
			.attr("id","body-mascara")
			.append("rect")
			.attr("x",0)
			.attr("y",0)
			.attr("width",anchoMascara() + 2*padding)
			.attr("height",altoMascara());
	}
	
	function anchoMascara()
	{
		return _ancho - _margenes.left - _margenes.right;
	}
	function altoMascara()
	{
		return _alto - _margenes.top - _margenes.bottom;
	}
	
	function renderBody(svg)
	{
		if (!_bodyG)
		{
			_bodyG = svg.append("g")
						.style("fill-opacity",0.25)
						.attr("class","body")
						.attr("transform","translate("+xStart()+","+yStart()+")")
						.attr("clip-path","url(#body-mascara)");
		}
		renderBubbles();
	}
	function renderBubbles()
	{
		_r.range([10,100]);
		_data.forEach(function (d,i){
			_bodyG.selectAll("circle")
				.data(d)
				.enter()
				.append("circle")
				.attr("class","bubble");
			_bodyG.selectAll("circle")
				.data(d)
				.style("stroke",function (d,j){
					return _colores[j];
				})
				.style("fill",function (d,j){
					return _colores[j];
				})
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
		});
	}
	function xStart()
	{
		return _margenes.left;
	}
	function yStart()
	{
		return _margenes.top;
	}
	function xEnd()
	{
		return _margenes.right;
	}
	function yEnd()
	{
		return _margenes.bottom;
	}
	
	return _chart;
}



