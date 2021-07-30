//----------------------------------definicion datos
var tiempo=1000;id=0,data=[],alto=100,ancho=680;
for (var i=0;i<20;++i){poner(data);}
function load ()
{	
	setInterval(function () {
		data.shift();
		poner(data);
		render();
	}, 2000);
	/*render();
	d3.select("body")
		.append("div")
		.attr("class", "baseline")
		.style("position", "fixed")
		.style("top", alto + "px")
		.style("left", "0px")
		.style("width", ancho + "px");*/
}
function render ()
{	
	//console.log(data);
	barras=d3.select("body").selectAll("div.column").data(data);
	barras.enter().append("div")
			.attr("class","column")
			.style("position","fixed")
			.style("top",alto+"px")
			.style("left", function (d,i) {
				return barLeft(i+1)+"px";
			})
			.style("height","2px")
		.append("span");	
	barras.transition().duration(tiempo)
			.style("top", function (d,i) {
				return alto - barHeight(d) +"px";
			})
			.style("left", function (d,i) {
				return barLeft(i)+"px";
			})
			.style("height",function (d){
				return barHeight(d)+"px";
			})
		.select("span")
			.text( function (d){
				return d.valor;
			});
	barras.exit()
			.transition().duration(tiempo)
			.style("left", function (d,i){
				return barLeft(-1)+"px";
			})
			.remove();
}
function poner(data){
	data.push({id:++id,valor:randomValor()});
}
function randomValor() {
return Math.round(Math.random() * 100);
}
function barLeft (i) {
	return i*20 +2;
}
function barHeight (d){
	return d.valor;
}
