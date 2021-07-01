
jQuery(document).on('change', 'select#tipo-medio', function (e) {
	e.preventDefault();
	var tipomedioID = jQuery(this).val();
	getMediosList(tipomedioID);
});

jQuery(document).on('change', 'select#tema', function (e) {
	e.preventDefault();
	var temaID = jQuery(this).val();

	if(temaID == ' ' ){
		$('#subtemacard').empty();
		$('#otrotemacard').empty();
		$('#cajatexto').empty();

	}
	else if (temaID == 0){
		//Agregar contenido a #cajatexto
		var textot = '';
		textot += '<label>Especifique  otra :</label><br>';
		textot += '<input type="text" id="otrotema" name="otrotema" placeholder="Otro tema" >';
		$('#cajatexto').html(textot);
		$('#subtemacard').empty();
	}else{
		var temaTitulo = 'Subtema - ' + $('#tema option:selected').html();
		$('#cajatexto').empty();
		$('#otrotemacard').empty();
		getSubtemaList(temaID, temaTitulo);
	}
});

$('#subtemacard').click(function () {
	var valor;
	var texto='';
	valor = $('input[name=idsubtema]:checked').val();
	if(valor==0)
	{
		//Agregar contenido a #cajatexto
		texto += '<label>Especifique otra :</label><br>';
		texto += '<input type="text" id="otrosubtema" name="otrosubtema" >';
		$('#cajatexto').html(texto);
	}else {
		//Vaciar contenido de #cajatexto
		$('#cajatexto').empty();
	}
});




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
			options +='<option value=" ">Seleccionar Medio</option>';
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


function getSubtemaList(temaID, temaTitulo) {
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
			if(temaID != 11) {
				var contador = 0;
				var tarjeta = '';
				tarjeta += '<div class="card-header bg-info text-white">';
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
				if (temaID != 11) {
					tarjeta += '<div class="form-check">';
					tarjeta += '  <label class="form-check-label" for="radiootro">';
					tarjeta += '      <input type="radio" class="form-check-input" id="radiootro" name="idsubtema" value="0">';
					tarjeta += '       Otro';
					tarjeta += '  </label>';
					tarjeta += '</div>';
					tarjeta += '</div>';
					tarjeta += '</div>';
				}
			}
			else{
				tarjeta = '';
			}

			jQuery("#subtemacard").html(tarjeta);

		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}


