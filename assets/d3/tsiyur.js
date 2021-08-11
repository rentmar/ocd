//----------------------------------definicion datos
var a=400,h=400,fullAngle=2*Math.PI,
	colores =  d3.schemeCategory10;
//----------------------------------metodos
function load ()
{	
	d3.select("body").select("h1").text("Iniciando");
	
}
function render() 
{
	//console.log(colores);
	var misvg = d3.select("body").append("svg").attr("class","pie").attr("width",a).attr("height",h);
	function dona(radioInterno,finAngulo)
	{
		if (!finAngulo) finAngulo = fullAngle;
		var data =[
			{startAngle:0,endAngle: 0.1*finAngulo},
			{startAngle:0.1,endAngle: 0.2*finAngulo},
			{startAngle:0.2,endAngle: 0.4*finAngulo},
			{startAngle:0.4,endAngle: 0.6*finAngulo},
			{startAngle:0.6,endAngle: 0.7*finAngulo},
			{startAngle:0.7,endAngle: 0.9*finAngulo},
			{startAngle:2,endAngle: finAngulo}
		];
		var arco = d3.arc().innerRadius(radioInterno).outerRadius(200);
		misvg.select("g").remove();
		misvg.append("g").attr("transform","translate(200,200)")
			.selectAll("path.arc")
			.data(data)
			.enter()
			.append("path")
			.attr("class","arc")
			.attr("fill", function (d,i){
				return colores[i];
			})
			.attr("d", function (d,i){
				return arco(d,i);
			});
	}
	dona(100);
}




