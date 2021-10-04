$('#formencuesta').submit(function (e) {
	var pregunta_seleccionada;
	for(var i=0; i<preguntas.length; i++)
	{
		pregunta_seleccionada =  $('input[name="pregunta'+preguntas[i]+'[]"]:checked').length;
		if(pregunta_seleccionada == 0)
		{
			e.preventDefault();
			$('#cuestionarioincompleto').modal("show");
			break;
		}
	}
});
