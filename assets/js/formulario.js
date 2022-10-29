/*$('#formencuesta').submit(function (e) {
	var pregunta_seleccionada;
	var formulario_correcto;
	formulario_correcto = true;
	for(var i=0; i<preguntas.length; i++) {
		pregunta_seleccionada = $('input[name="pregunta' + preguntas[i] + '[]"]:checked').length;
		if (pregunta_seleccionada == 0) {
			e.preventDefault();
			$('#cuestionarioincompleto').modal("show");
			formulario_correcto = false;
			break;
		}
	}
	if(formulario_correcto)
	{
		$("#enviarencuesta").html("Encuesta Enviada");
		$("#enviarencuesta").attr("disabled", true);
	}
});*/
