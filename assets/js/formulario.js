$('#formencuesta').submit(function (e) {
	e.preventDefault();
	console.log("Sin envio");
	console.log(preguntas);
	console.log("Recorrer los elementos de la matriz:");
	for(var i = 0; i < preguntas.length; i++)
	{
		console.log(preguntas[i]);
	}

	var pregunta_seleccionada;
	pregunta_seleccionada =  $('input[name="pregunta2[]"]:checked').length;
	if(pregunta_seleccionada == 0)
	{
		alert("Pregunta sin llenar");
	}



	//Comprobar cada pregunta



	/*var numero_temas_seleccionados;
	numero_temas_seleccionados = $('input[name="idtema[]"]:checked').length;
	if(numero_temas_seleccionados==0){
		e.preventDefault();
		$('#temasinseleccionar').modal("show");
	}*/
});
