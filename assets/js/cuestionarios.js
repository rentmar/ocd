
/*Funcion para la carga de medios de comunicacion segun al tipo de medio seleccionado*/
jQuery(document).on('change', 'select#tipo-medio', function (e) {
	e.preventDefault();
	var tipomedioID = jQuery(this).val();
	getMediosList(tipomedioID);
});

//Funcion para desplegar
jQuery(document).on('change', 'select#tema', function (e) {
	e.preventDefault();
	var idtemas = [];
	var titulo;
	var color;
	var subtemas = '';
	var subtema = '';

	//Capturar valores del select
	idtemas = $('select#tema').val();
	titulo = 'Titulo';
	getSubtema(idtemas);



	/*
	* Rutina de prueba
	**/
	/*var valores = $('select#tema').val();
	alert('identificadores: '+ valores);
	alert('longitud del array: '+ valores.length);*/
	/*e.preventDefault();
	var temaID = jQuery(this).val();
	var color ;
	if($('#idformulario').val()==1){
		color = '8cc63f';

	}else if($('#idformulario').val()==2){
		color = 'EF9600';
	}
	$("#otrotemac").removeClass("contenedores");
	$('#otrotemac').empty();
	$('#subtemac').removeClass('contenedores');
	$('#subtemac').empty();
	$('#otrosubtema').removeClass('contenedores');
	$('#otrosubtema').empty();

	if(temaID == ' ' ){
		$("#otrotemac").removeClass("contenedores");
		$('#otrotemac').empty();
		$('#subtemac').removeClass('contenedores');
		$('#subtemac').empty();
		$('#otrosubtema').removeClass('contenedores');
		$('#otrosubtema').empty();
		//$('#subtemacard').empty();
		//$('#otrotemacard').empty();
		//$('#cajatexto').empty();

	}
	else if (temaID == 0){

		$('#otrotemac').addClass("contenedores");
		//Agregar el contenido
		var textot = ' ';
		textot += '<label for="otrotema" >Especifique  otra :</label><br>';
		textot += '<input type="text" id="otrotema" name="otrotema" placeholder="Otro tema" class="form-control" >';
		$('#otrotemac').html(textot);
		$('#subtemac').removeClass('contenedores');
		$('#subtemac').empty();
		$('#otrosubtema').removeClass('contenedores');
		$('#otrosubtema').empty();



	}else{
		$("#otrotemac").removeClass("contenedores");
		$('#otrotemac').empty();
		$('#otrosubtema').removeClass('contenedores');
		$('#otrosubtema').empty();
		var temaTitulo = 'Subtema - ' + $('#tema option:selected').html();
		$('#subtemac').addClass('contenedores');
		getSubtemaList(temaID, temaTitulo, color);
	}*/
});

$('#subtemac').click(function () {
	var valor;
	var texto='';
	valor = $('input[name=idsubtema]:checked').val();
	if(valor==0)
	{
		//Agregar contenido a #cajatexto
		texto += '<label>Especifique otra :</label><br>';
		texto += '<input type="text" id="otrosubtema" name="otrossubtema" placeholder="Otro Subtema" >';
		$('#otrosubtema').addClass('contenedores');
		$('#otrosubtema').html(texto);
	}else {
		//Vaciar contenido de #cajatexto
		$('#otrosubtema').removeClass('contenedores');
		$('#otrosubtema').empty();
	}
});



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

function getSubtema(temaID) {
	var identificadores = temaID;
	var texto_otro = '';
	var temaHtml = '';
	var subtema = '';
	//Limpiar Otro tema
	$("#otrotemac").removeClass("contenedores");
	$('#otrotemac').empty();
	$.ajax({
		url: baseurl + "/reformaelectoral/getprueba",
		type: 'post',
		data: {temaID: JSON.stringify(temaID) },
		dataType: 'json',
		beforeSend: function () {
			console.log("Antes de la peticion");
		} ,
		success: function (json) {
			console.log(json);
			$
			for (var i = 0; i < identificadores.length; i++) {
				if(identificadores[i] == 0)
				{
					texto_otro += '<label for="otrotema" >Especifique  otra :</label><br>';
					texto_otro += '<input type="text" id="otrotema" name="otrotema" placeholder="Otro tema" class="form-control" >';
					$('#otrotemac').html(texto_otro);
					$('#otrotemac').addClass('contenedores');
					console.log('Identificador 0: ' + identificadores[i]);

				}else {
					console.log('Identificador distinto de cero; ' + identificadores[i]);
					//Imprimir una tarjeta de tema
				}

			}


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
			tarjeta += '</div>';
			tarjeta += '</div>';

			//jQuery("#subtemac").html(tarjeta);
			return "Hola ";

		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}

$(document).ready(function() {
	$('.selector-multiple').select2({
		placeholder: "Seleccione un tema"
	});
});


