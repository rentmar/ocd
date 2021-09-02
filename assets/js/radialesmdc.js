//Detectar la presion del boton
jQuery(document).on('click', '#mcomunicacion', function (e) {
	var fechas = new Fechas();
	console.log("Boton presionado");
	//Capturar el valor del primer input date
	fechas.fecha_inicio = $("input#fecha_inicio").val();
	//Capturar el valor del segundo input date
	fechas.fecha_fin = $("input#fecha_fin").val();
	console.log(fechas);
	console.log(JSON.stringify(fechas));
	getActores(fechas);
});
//Funcion para extraer actores
function getActores(fecha) {
	$.ajax({
		url: baseurl + "/Graficos/getMedioDcomunicacion",
		type: 'post',
		data: {fecha: JSON.stringify(fecha) },
		dataType: 'json',
		beforeSend: function () {
			jQuery('select#medio').find("option:eq(0)").html("Please wait..");
		},
		complete: function () {
			// code
		},
		success: function (json) {
			console.log("Exito");
			console.log(json);
			grafRadial(json);
		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}
function grafRadial(matriz)
{
    $("#my_dataviz").empty();
    var matrix = matriz;
    var dibujo = radialChart(matrix);
    
    dibujo.lienzo();
}
//Definir el objeto fechas
function Fechas(){
	this.fecha_inicio = '';
	this.fecha_fin = '';
}
function radialChart(matrix)
{
    var _chart = {};    //chart es un objeto
    var _b = 1050;       //b es la base de svg
    var _h = 1050;       //h es la altura de svg
    var margenizqu = margendere = 20;
    var margenarri = margenabaj = 20;
    var _margen = {arriba:margenarri,derecha:margendere,abajo:margenabaj,izquierda:margenizqu}; //margen es el margen interno
    var _svg;
    var _bodyV;
    
    _chart.h = function(e)
    {
        if(!arguments.length)
        {
            return _h;
        }
        else
        {
            _h = e;
        }
        return _chart;
    }
    _chart.margen = function(e)
    {
        if(!arguments.length)
        {
            return _margen;
        }
        else
        {
            _margen = e;
        }
        return _chart;
    }
    _chart.b = function(e)
    {
        if(!arguments.length)
        {
            return _b;
        }
        else
        {
            _b = e;
        }
        return _chart;
    }
    _chart.lienzo = function()
    {
//        console.log(matrix);
        console.log("estoy en lienzo");
        _svg = d3.select("#my_dataviz")     //d3.select("body")
                .append("svg")
                .attr("width",_b)
                .attr("height",_h);
//                .style("background-color", "black");
        _svg.append("defs") //definicion de area.
                .append("clipPath")
                .attr("id","ventana")
                .append("rect")
                .attr("x",0)
                .attr("y",0)
                .attr("width",_b - _margen.derecha - _margen.izquierda)
                .attr("height",_h - _margen.arriba - _margen.abajo);
        _bodyV = _svg.append("g")
                .attr("class","body")
                .attr("transform","translate("+_margen.izquierda+","+_margen.arriba+")")
                .attr("clip-path","url(#ventana)");
        grafica(_b,_h,matrix);
        
    }
    function grafica(bc,hc,matrix)
    {
        console.log('estoy graficando');
        var mymat = [];
        var myobj = {};//new Object();
        var tamanoMatriz = matrix.length;
        var colorRE = '#93C90F';
        var colorID = '#EF9600';
        var colorC = '#00A3E1';
        var colorL = '#7c5295';
        var nactor = (matrix[tamanoMatriz - 1 ].idactor-1);

        var valorMax = Math.max(...matrix.map(function(d) {return d.ncuestionario;}));
//        var porcentajeDvalorMax = 100/valorMax;
        
        var escalaDgrafica = 3;//para escalar grafica en area de dibujo
        var escalado =escalaDgrafica * (100/valorMax);

        var rI = 100;//radio interno
        var radioInt = rI;
        var radioExt = radioInt + matrix[0].ncuestionario*escalado;
        var anguloIni = 0;
        var anguloFin = (2*Math.PI)/(nactor);
        
        for (var i = 0; i < matrix.length-1 ; i++)
        {
            var n = i + 1;
            var arc = d3.arc().innerRadius(radioInt).outerRadius(radioExt).startAngle(anguloIni).endAngle(anguloFin-0.06);
            myobj.actor = matrix[i].nombre_actor;

            if(matrix[i].nombre_cuestionario == "Reforma Electoral")
            {
                _bodyV.append('path').attr('transform','translate('+bc/2+','+hc/2+')').attr('d',arc()).attr('fill',colorRE);
                myobj.RE = matrix[i].ncuestionario;
            }
            if(matrix[i].nombre_cuestionario == "Institucionalidad Democratica")
            {
                _bodyV.append('path').attr('transform','translate('+bc/2+','+hc/2+')').attr('d',arc()).attr('fill',colorID);
                myobj.ID = matrix[i].ncuestionario;
            }
            if(matrix[i].nombre_cuestionario == "Censo")
            {
                _bodyV.append('path').attr('transform','translate('+bc/2+','+hc/2+')').attr('d',arc()).attr('fill',colorC);
                myobj.Censo = matrix[i].ncuestionario;
            }
            if(matrix[i].idactor != matrix[n].idactor)
            {
                anguloIni = anguloFin;
                anguloFin = anguloIni + (2*Math.PI)/nactor;
                radioInt = rI;
                radioExt = radioInt + matrix[n].ncuestionario*escalado
                
                mymat[i] = myobj;
                console.log(myobj);
                var myobj = {};
            }
            else
            {
                radioInt = radioExt;
                radioExt = radioInt + matrix[n].ncuestionario*escalado;

                mymat[i] = myobj;

            }
            console.log(myobj); 
        }

        console.log(mymat);

        _bodyV.append("circle").attr("cx",(bc/2)-60).attr("cy",(hc/2)-20).attr("r", 6).style("fill", colorRE)
        _bodyV.append("circle").attr("cx",(bc/2)-60).attr("cy",(hc/2)).attr("r", 6).style("fill", colorID)
        _bodyV.append("circle").attr("cx",(bc/2)-60).attr("cy",(hc/2)+20).attr("r", 6).style("fill", colorC)
        _bodyV.append("text").attr("x", (bc/2)-45).attr("y", (hc/2)-20).text("Reforma Electoral").style("font-size", "15px").attr("alignment-baseline","middle")
        _bodyV.append("text").attr("x", (bc/2)-45).attr("y", (hc/2)).text("Inst. Democratica").style("font-size", "15px").attr("alignment-baseline","middle")
        _bodyV.append("text").attr("x", (bc/2)-45).attr("y", (hc/2)+20).text("Censo").style("font-size", "15px").attr("alignment-baseline","middle")

        var x = d3.scaleBand()
                    .range([0, 2 * Math.PI])
                    .align(0);
        x.domain(mymat.map(function(d) { return d.actor; }));

        var label = _bodyV.append("g")
                        .selectAll("g")
                        .data(mymat)
                        .enter().append("g")
                        .attr("transform","translate(" + bc/2 +"," + hc/2 + ")")
                        .append("text")
                        .attr("transform", function(d) { return "rotate(" + ((x(d.actor) + x.bandwidth() / 2) * 180 / Math.PI - 90) + ")translate(" + radioInt + ",0)"; })
                        .text(function(d) { return d.actor; });

    }
        
    return _chart;
}