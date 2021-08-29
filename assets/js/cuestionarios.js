
/*Funcion para la carga de medios de comunicacion segun al tipo de medio seleccionado*/
jQuery(document).on('change', 'select#tipo-medio', function (e) {
	e.preventDefault();
	var tipomedioID = jQuery(this).val();
	getMediosList(tipomedioID);
});

/*Funcion para la carga de medios de comunicacion segun al tipo de medio seleccionado*/
jQuery(document).on('change', 'select#idtipomedio', function (e) {
	e.preventDefault();
	var tipomedioID = jQuery(this).val();
	//alert(tipomedioID);
	getMediosReport(tipomedioID);
});

/*Funcion para la carga de medios de comunicacion segun al tipo de medio seleccionado*/
jQuery(document).on('change', 'select#idtema', function (e) {
	e.preventDefault();
	var temaID = jQuery(this).val();
	//alert(temaID);
	getSubtemaReport(temaID)
});


//Funcion para desplegar
jQuery(document).on('click', '#checktema', function (e) {
	//alert('Presionado');
	var texto_otro = '';
	if(this.checked)
	{
		console.log('CHECKED');
		console.log(this.value);
		if(this.value == 0){

			texto_otro += '<label for="otrotema" >Especifique  otra :</label><br>';
			texto_otro += '<input type="text" id="otrotema" name="tema0" placeholder="Otro tema" class="form-control" required >';
			$('#otrotemac').html(texto_otro);
			$('#otrotemac').addClass('contenedores');
		}
	}else{
		console.log('NO CHECKED');
		console.log(this.value);
		if(this.value == 0){
			$("#otrotemac").removeClass("contenedores");
			$('#otrotemac').empty();

		}
	}

});



jQuery(document).on('click', '#tipomedio', function (e) {
	e.preventDefault();
	$('#modalmediocomm').modal("show");
});
jQuery(document).on('click', '#mediocomunicacion', function (e) {
	e.preventDefault();
	$('#modalmediocomm').modal("show");
});

jQuery(document).on('click', '#cardtemas', function (e) {
	e.preventDefault();
	$('#modalmediocomm').modal("show");
});



jQuery(document).on('change', '#seleccionartema----cc', function (e) {
	e.preventDefault();
	var tms = $('#tema').select2('data');
	console.log(tms);



	e.preventDefault();
	var fecha = $('#fecha').val();
	var titular = $('#titular').val();
	var resumen = $('#resumen').val();
	var url = $('#url').val();
	var formulario = $('#idformulario').val();
	var usuario = $('#idusuario').val();

	var noticia = new Noticia();
	noticia.fecha_noticia = fecha;
	noticia.titular = titular;
	noticia.resumen = resumen;
	noticia.url_noticia = url;
	noticia.idformulario = formulario;
	noticia.rel_idusuario = usuario;

	//Recolectar el Tipo de medio
	var id = $('select#tipo-medio').val();
	var tipo = $('select#tipo-medio option:selected').text();
	var tipomedio = new Tipomedio(id, tipo);

	noticia.tipo_medio = tipomedio;

	//Recolectar el medio de comunicacion
	var idmedio = $('select#medio').val();
	var medioname = $('select#medio option:selected').text();
	var medio = new Medio(idmedio, medioname, id);

	noticia.medio_comunicacion = medio;

	//Recolectar a los actores de la noticia
	var actores = [];
	$('input[name="idactor[]"]:checked').each(function () {
		actores.push(this.value);
	});

	noticia.actores = [];
	noticia.actores = actores;

	//Capturar los temas de la noticia
	var temas = [];
	$('input[name="idtema[]"]:checked').each(function () {
		temas.push(this.value);
	});

	/*$('#tema option:selected').each(function () {
		temas.push(this.value);
	});*/
	noticia.temas = [];
	noticia.temas = temas;



	console.log(noticia);
	//$('#modaltemas').modal("show");
});

//Definir el objeto Noticia
function Noticia() {
	this.fecha_registro = '';
	this.titular = '';
	this.parrafo = '';
	this.url = '';
	this.rel_idusuario = '';
	this.idformulario = '';
	this.actores = [];
	this.temas = [];
}


//Definimos el obj tipo de medio
function Tipomedio(identificador, nombre) {
	this.idtipomedio = identificador;
	this.nombre_tipo = nombre;
}


//DEfinimos el obj medio
function Medio(identificador, nombre, idtipo) {
	this.idmedio = identificador;
	this.nombre_medio = nombre;
	this.rel_idtipomedio = idtipo;
}

//Definimos el objeto tema
function Tema(idtema, nombre, idcuestionario, idusuario) {
	this.idtema = idtema; //Identificador del tema
	this.nombre_tema = nombre; //Nombre del tema
	this.rel_idcuestionario = idcuestionario; //Identificador del cuestionario al q el tema pertenece
	this.rel_usuario = idusuario; //Identificador del usuario  q creo el tema
}

//Definimos el objeto subtema
function Subtemas(idsubtema, nombre, idtema) {
	this.idsubtema = idsubtema; //identificador del subtema
	this.nombre_subtema = nombre; //Nombre del subtema
	this.rel_idtema = idtema; //Identificador del tema al que pertenece el subtema
}

//Obj Otro tema
function Otrotema(nombre, idcuestionario, idusuario) {
	this.nombre_otrotema = nombre; //Nombre del otro tema
	this.rel_idcuestionario = idcuestionario; //Cuestionario al que pertenece
	this.rel_idusuario = idusuario //Usuario que crea el otro tema
}

//Obf Otro subtema
function Otrosubtema(nombre, idtema) {
	this.nombre_otrosubtema = nombre; //Nombre del otro subtema definido
	this.rel_idtema = idtema; //Identificador del tema al que pertence
}

function setNoticia(noticia) {
	$.ajax({
		url: baseurl + "/reformaelectoral/setvariables",
		type: 'post',
		data: {noticia: JSON.stringify(noticia) },
		dataType: 'html',
		beforeSend: function () {
		},
		complete: function () {

		},
		success: function (html) {
			console.log('RECIBIDO');
			//console.log(html);
			location.reload();
			location.reload();
			//$('#tipo-medio option[value=" "]').attr('selected', true);
			//$('#tipo-medio option:first').attr('selected','selected');
			//$('#tipo-medio option:first').prop('selected', true);
		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}

/*
Funcion para extraer la lista de medios segun su tipo
 */
function getMediosList(tipomedioID) {
	//alert(tipomedioID + ' ' + baseurl);
	$.ajax({
		url: baseurl + "/reformaelectoral/getmedios",
		type: 'post',
		data: {tipomedioID: tipomedioID},
		dataType: 'json',
		beforeSend: function () {
			jQuery('select#medio').find("option:eq(0)").html("Please wait..");
		},
		complete: function () {
			// code
		},
		success: function (json) {
			var options = '';
			options +='<option value="" selected >Seleccionar Medio</option>';
			for (var i = 0; i < json.length; i++) {
				options += '<option value="' + json[i].medio_id + '">' + json[i].medio_name + '</option>';
			}
			jQuery("select#medio").html(options);

		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}

function getMediosReport(tipomedioID) {
	//alert(tipomedioID + ' ' + baseurl);
	$.ajax({
		url: baseurl + "/manejoDB/getmedios",
		type: 'post',
		data: {tipomedioID: tipomedioID},
		dataType: 'json',
		beforeSend: function () {
			jQuery('select#idmedio').find("option:eq(0)").html("Please wait..");
		},
		complete: function () {
			// code
		},
		success: function (json) {
			var options = '';
			options +='<option value="0" selected >Seleccione una opcion</option>';
			for (var i = 0; i < json.length; i++) {
				options += '<option value="' + json[i].medio_id + '">' + json[i].medio_name + '</option>';
			}
			jQuery("select#idmedio").html(options);

		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}

function getSubtemaReport(temaID) {
	$.ajax({
		url: baseurl + "/manejoDB/getsubtema",
		type: 'post',
		data: {temaID: temaID},
		beforeSend: function () {
			jQuery('select#idsubtema').find("option:eq(0)").html("Please wait..");
		},
		complete: function () {
			// code
		},
		success: function (json) {
			var options = '';
			options +='<option value="" selected >Seleccione una opcion</option>';
			for (var i = 0; i < json.length; i++) {
				options += '<option value="' + json[i].stema_id + '">' + json[i].stema_name + '</option>';
			}
			jQuery("select#idsubtema").html(options);

		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});

}

function getSubtema(temaID) {
	var identificadores = [];
	var texto_otro = '';
	var color = '';
	var tema = ' ';
	var subtema = '';

	identificadores = temaID;
	//Limpiar Otro tema
	$("#otrotemac").removeClass("contenedores");
	$('#otrotemac').empty();
	$("#subtemac").empty();

	$.ajax({
		url: baseurl + "/reformaelectoral/getprueba",
		type: 'post',
		data: {temaID: JSON.stringify(temaID) },
		dataType: 'json',
		beforeSend: function () {
			console.log("Antes de la peticion");
		} ,
		success: function (json) {
			var identificadores = JSON.stringify(temaID);
			var contador = 0;

			for(var i = 0; i < temaID.length; i++)
			{
				//console.log(identificadores[i]);
				if(temaID[i] == 0){
					console.log("identificador 0");
					texto_otro += '<label for="otrotema" >Especifique  otra :</label><br>';
					texto_otro += '<input type="text" id="otrotema" name="otrotema" placeholder="Otro tema" class="form-control" >';
					$('#otrotemac').html(texto_otro);
					$('#otrotemac').addClass('contenedores');
				}else if(temaID != 0){
					//console.log("ide distinto de 0; " + temaID[i]);
					contador = 0
					//Color


					for(var j=0; j < json.length; j++ )
					{
						//definir el color
						if (json[i].rel_idcuestionario == 1)
						{
							color = '8cc63f';
						}else if (json[i].rel_idcuestionario == 2){
							color = 'EF9600';
						}

						if(temaID[i] == json[j].rel_idtema )
						{
							if(contador == 0)
							{
								tema += '<div class="contenedores">';
								tema += '<div class="card" >';
								tema += '<div  class="card-header  " style="background-color:#'+ color +';" >';
								tema += '<h4>' + json[j].nombre_tema + '<h4>';
								tema += '</div>';
								tema += '<div class="card-body">';
								tema += '<div class="form-check">';
								tema += '  <label class="form-check-label" for="radio1">';
								tema += '      <input type="radio" class="form-check-input" id="tema'+ temaID[i] +  '" name="tema' + temaID[i] +'idsubtema"' + json[j].idsubtema + ' value="' + json[j].idsubtema + '" checked >';
								//tema += '      <input type="radio" class="form-check-input" id="radio' + json[j].idsubtema + '" name="idsubtema" value="' + json[j].idsubtema + '" checked>';
								tema += '      ' + json[j].nombre_subtema;
								tema += '  </label>';
								tema += '</div>';
								console.log(json[j].nombre_subtema + " encabezado ");
								contador++;

							}else {
								tema += '<div class="form-check">';
								tema += '  <label class="form-check-label" for="radio1">';
								tema += '      <input type="radio" class="form-check-input" id="tema'+ temaID[i] + '" name="tema' + temaID[i] +'idsubtema"  value="' + json[j].idsubtema + '">';
								tema += '      ' + json[j].nombre_subtema;
								tema += '  </label>';
								tema += '</div>';
								console.log(json[j].nombre_subtema);
							}
						}

					}


					tema += '<div class="form-check">';
					tema += '  <label class="form-check-label" for="radio">';
					tema += '      <input type="radio" class="form-check-input" id="otrosubtema'+ temaID[i] +'" name="tema' + temaID[i] +'idsubtema"  value="0">';
					tema += '       Otro';
					tema += '  </label>';
					tema += '</div>';

					tema += '<div id="otro'+ temaID[i] +'" class="form-check">';
					tema += '</div>';

					tema += '</div>';
					tema += '</div>';
					tema += '</div>';
					tema += '<br>';

				}
			}
			$('#subtemac').html(tema);
		}
	});
}


function getSubtemaList(temaID, temaTitulo, color) {
	$.ajax({
		url: baseurl + "/reformaelectoral/getsubtema",
		type: 'post',
		data: {temaID: temaID},
		dataType: 'json',
		beforeSend: function () {
			jQuery('select#subtema').find("option:eq(0)").html("Please wait..");
		},
		complete: function () {
			// code
		},
		success: function (json) {

			var contador = 0;
			var tarjeta = '';
			tarjeta += '<div  class="card-header  " style="background-color:#'+ color +';" >';
			tarjeta += '<h4>' + temaTitulo + '<h4>';
			tarjeta += '</div>';
			tarjeta += '<div class="card-body">';
			tarjeta += '<div class="form-check">';
			for (var i = 0; i < json.length; i++) {
				if (contador == 0) {
					tarjeta += '<div class="form-check">';
					tarjeta += '  <label class="form-check-label" for="radio1">';
					tarjeta += '      <input type="radio" class="form-check-input" id="radio' + json[i].stema_id + '" name="idsubtema" value="' + json[i].stema_id + '" checked>';
					tarjeta += '      ' + json[i].stema_name;
					tarjeta += '  </label>';
					tarjeta += '</div>';
					contador++

				} else {
					tarjeta += '<div class="form-check">';
					tarjeta += '  <label class="form-check-label" for="radio1">';
					tarjeta += '      <input type="radio" class="form-check-input" id="radio' + json[i].stema_id + '" name="idsubtema" value="' + json[i].stema_id + '">';
					tarjeta += '      ' + json[i].stema_name;
					tarjeta += '  </label>';
					tarjeta += '</div>';
				}
			}

			tarjeta += '<div class="form-check">';
			tarjeta += '  <label class="form-check-label" for="radiootro">';
			tarjeta += '      <input type="radio" class="form-check-input" id="radiootro" name="idsubtema" value="0">';
			tarjeta += '       Otro';
			tarjeta += '  </label>';
			tarjeta += '</div>';

			tarjeta += '<div id="" class="form-check">';
			tarjeta += '</div>';

			tarjeta += '</div>';
			tarjeta += '</div>';

			jQuery("#subtemac").html(tarjeta);


		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}




$(document).ready(function() {
	$('.selector-multiple').select2({
		placeholder: "Seleccione un tema",
	});
	$('.selmultiple').select2({
		placeholder: {
			id: 0,
			text: 'Seleccione una opcion'
		}
	});
	$('.simple').select2();
	$('#noticias-tabla').DataTable({
		responsive: true,
		language: {
			"zeroRecords": "No se encontró ninguna noticia",
			"lengthMenu":     "Mostrar _MENU_ registros",
			'search': 'Buscar:',
			"info": "Mostrando la página _PAGE_ de _PAGES_",
			"infoEmpty": "No hay registros disponibles",
			"infoFiltered": "(filtrado de _MAX_ registros totales)",
			'paginate':{
				'next': 'Siguiente',
				'previous': 'Anterior'
			}
		}
	});
	$('#leyes-tabla').DataTable({
		responsive: true,
		language: {
			"zeroRecords": "No se encontró ninguna noticia",
			"lengthMenu":     "Mostrar _MENU_ registros",
			'search': 'Buscar:',
			"info": "Mostrando la página _PAGE_ de _PAGES_",
			"infoEmpty": "No hay registros disponibles",
			"infoFiltered": "(filtrado de _MAX_ registros totales)",
			'paginate':{
				'next': 'Siguiente',
				'previous': 'Anterior'
			}
		}
	});

	$('[data-toggle="tooltip"]').tooltip();

});

//Validador del formulario noticia
$('#formulario').submit(function (e) {
	var numero_actores_seleccionados;
	var numero_temas_seleccionados;
	numero_actores_seleccionados = $('input[name="idactor[]"]:checked').length;
	numero_temas_seleccionados = $('input[name="idtema[]"]:checked').length;
	if(numero_actores_seleccionados==0)
	{
		e.preventDefault();
		$('#actorsinseleccionar').modal("show");
	}
	if(numero_temas_seleccionados==0){
		e.preventDefault();
		$('#temasinseleccionar').modal("show");
	}

});

$('#formulario_ley').submit(function (e) {
	var numero_temas_seleccionados;
	numero_temas_seleccionados = $('input[name="idtema[]"]:checked').length;
	if(numero_temas_seleccionados==0){
		e.preventDefault();
		$('#temasinseleccionar').modal("show");
	}
});

//Validador de los subtemas

/*$('#formulariosub_ley').submit(function (e) {
	var numero_subtemas_seleccionados;
	numero_subtemas_seleccionados = $('input[name="idtema[]"]:checked').length;
	e.preventDefault();
	$('#subtemasleyessinseleccion').modal("show");
});*/




