<main>
	<br><br>
	<?php echo validation_errors(); ?>
	<?php
	/** @noinspection PhpLanguageLevelInspection */
	$atr_form =[
		'id' => 'formulario_controlcensal' ,
	]
	;?>
	<?php echo form_open('', $atr_form);?>

	<div class="contenedores_divididos">
		<div class="contenedor_superior3" id="contenedor_pequeño">
		</div>
		<div class="contenedor_inferior">
			<h3 id="Título_formulario"> CONTROL SOCIAL EN LA JORNADA CENSAL</h3>
		</div>
	</div>
	<br>

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest3">
				<h4>
					Informacion General
				</h4>
			</div>
			<div class="card-body">
				<div id="departamento">
					<label>Escoja el Departamento:</label><br>
					<select id="departamento_csjc" name="departamento_csjc" class="simple" style="width: 100%"  required>
						<option value="" selected >Sin seleccion</option>
						<?php if(isset($departamentos)):?>
							<?php foreach ($departamentos as $a): ?>
								<option value="<?php echo $a->iddepartamento; ?>"><?php echo $a->nombre_departamento; ?></option>
							<?php endforeach; ?>
						<?php endif;?>
					</select>
				</div>
				<div id="otrotema1normadatos">

				</div>
			</div>
		</div>

	</div>
	<br>

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest3">
				<h4>A.</h4>
			</div>
			<div class="card-body font-weight-normal">
				<div class="form-group">
					<label for="pregunta_cjs1">
						1. ¿El censista se presentó mencionando su nombre y apellido?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs1a" name="pregunta_cjs1" value="1">
						<label class="custom-control-label" for="pregunta_cjs1a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs1b" name="pregunta_cjs1" value="0">
						<label class="custom-control-label" for="pregunta_cjs1b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs2">
						2. ¿El censista mostró su credencial y/o la tenía a la vista?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs2a" name="pregunta_cjs2" value="1">
						<label class="custom-control-label" for="pregunta_cjs2a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs2b" name="pregunta_cjs2" value="0">
						<label class="custom-control-label" for="pregunta_cjs2b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs3">
						3. ¿El censista explicó los objetivos del Censo?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs3a" name="pregunta_cjs3" value="1">
						<label class="custom-control-label" for="pregunta_cjs3a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs3b" name="pregunta_cjs3" value="0">
						<label class="custom-control-label" for="pregunta_cjs3b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs4">
						4.¿El censista solicitó la presencia de la o el jefe de hogar?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs4a" name="pregunta_cjs4" value="1">
						<label class="custom-control-label" for="pregunta_cjs4a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs4b" name="pregunta_cjs4" value="0">
						<label class="custom-control-label" for="pregunta_cjs4b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs5">
						5. ¿El censista solicitó que todas las personas que pasaron la noche anterior estén presentes durante la entrevista?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs5a" name="pregunta_cjs5" value="1">
						<label class="custom-control-label" for="pregunta_cjs5a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs5b" name="pregunta_cjs5" value="0">
						<label class="custom-control-label" for="pregunta_cjs5b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs6">
						6. ¿El censista no inició la entrevista hasta que todas las personas que pasaron la noche anterior en la vivienda estuvieron presentes?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs6a" name="pregunta_cjs6" value="1">
						<label class="custom-control-label" for="pregunta_cjs6a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs6b" name="pregunta_cjs6" value="0">
						<label class="custom-control-label" for="pregunta_cjs6b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs7">
						7. ¿El censista mencionó que toda la información proporcionada será de carácter confidencial?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs7a" name="pregunta_cjs7" value="1">
						<label class="custom-control-label" for="pregunta_cjs7a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs7b" name="pregunta_cjs7" value="0">
						<label class="custom-control-label" for="pregunta_cjs7b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs8">
						8. ¿El censista solicitó ingresar a la vivienda para realizar la entrevista?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs8a" name="pregunta_cjs8" value="1">
						<label class="custom-control-label" for="pregunta_cjs8a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs8b" name="pregunta_cjs8" value="0">
						<label class="custom-control-label" for="pregunta_cjs8b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs9">
						9. Si la familia o jefe de hogar invitó al censista a ingresar a la vivienda y este aceptó, ¿se comunicó con su supervisor para indicar que realizaría la entrevista dentro de la vivienda?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs9a" name="pregunta_cjs9" value="1">
						<label class="custom-control-label" for="pregunta_cjs9a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs9b" name="pregunta_cjs9" value="0">
						<label class="custom-control-label" for="pregunta_cjs9b">No</label>
					</div>
				</div>
				<div class="form-group ">
					<label for="pregunta_cjs10">
						10. ¿El censista realizó la entrevista en compañía de algún acompañante (familiar, amistad u otra persona ajena al operativo censal)?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs10a" name="pregunta_cjs10" value="1">
						<label class="custom-control-label" for="pregunta_cjs10a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs10b" name="pregunta_cjs10" value="0">
						<label class="custom-control-label" for="pregunta_cjs10b">No</label>
					</div>
				</div>
			</div>
		</div>

	</div>
	<br>

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest3">
				<h4>B. Durante la Entrevista</h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="pregunta_cjs11">
						11. ¿Sonó el celular del censista, interrumpiendo la entrevista?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs11a" name="pregunta_cjs11" value="1">
						<label class="custom-control-label" for="pregunta_cjs11a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs11b" name="pregunta_cjs11" value="0">
						<label class="custom-control-label" for="pregunta_cjs11b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs12">
						12. ¿El censista atendió llamadas personales o se le vio enviando mensajes, interrumpiendo la entrevista?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs12a" name="pregunta_cjs12" value="1">
						<label class="custom-control-label" for="pregunta_cjs12a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs12b" name="pregunta_cjs12" value="0">
						<label class="custom-control-label" for="pregunta_cjs12b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs13">
						13. ¿El censista leyó las preguntas o enunciados de forma clara y pausada, sin prisa?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs13a" name="pregunta_cjs13" value="1">
						<label class="custom-control-label" for="pregunta_cjs13a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs13b" name="pregunta_cjs13" value="0">
						<label class="custom-control-label" for="pregunta_cjs13b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs14">
						14. ¿El censista se confundió con el orden de las preguntas?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs14a" name="pregunta_cjs14" value="1">
						<label class="custom-control-label" for="pregunta_cjs14a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs14b" name="pregunta_cjs14" value="0">
						<label class="custom-control-label" for="pregunta_cjs14b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs15">
						15. ¿El censista cuidó sus expresiones corporales y tono de voz, evitando mostrar sorpresa, asombro, aprobación o desaprobación?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs15a" name="pregunta_cjs15" value="1">
						<label class="custom-control-label" for="pregunta_cjs15a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs15b" name="pregunta_cjs15" value="0">
						<label class="custom-control-label" for="pregunta_cjs15b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs16">
						16. ¿El censista hizo comentarios sobre las respuestas y/o se puso a conversar de otros temas?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs16a" name="pregunta_cjs16" value="1">
						<label class="custom-control-label" for="pregunta_cjs16a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs16b" name="pregunta_cjs16" value="0">
						<label class="custom-control-label" for="pregunta_cjs16b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs17">
						17. ¿El censista entrevistó a cada persona para llenar el “Capítulo G Características de cada persona”?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs17a" name="pregunta_cjs17" value="1">
						<label class="custom-control-label" for="pregunta_cjs17a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs17b" name="pregunta_cjs17" value="0">
						<label class="custom-control-label" for="pregunta_cjs17b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs18">
						18. En la pregunta 5, ¿El censista solo leyó la pregunta sin mencionar las opciones para las respuestas?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs18a" name="pregunta_cjs18" value="1">
						<label class="custom-control-label" for="pregunta_cjs18a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs18b" name="pregunta_cjs18" value="0">
						<label class="custom-control-label" for="pregunta_cjs18b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs19">
						19. En la pregunta 10, ¿El censista leyó las 10 opciones de la pregunta para responder sí o no a cada una?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs19a" name="pregunta_cjs19" value="1">
						<label class="custom-control-label" for="pregunta_cjs19a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs19b" name="pregunta_cjs19" value="0">
						<label class="custom-control-label" for="pregunta_cjs19b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs20">
						20. En la pregunta 25, ¿El censista respondió con seguridad a dudas planteadas por alguna persona que vive en la vivienda?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs20a" name="pregunta_cjs20" value="1">
						<label class="custom-control-label" for="pregunta_cjs20a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs20b" name="pregunta_cjs20" value="0">
						<label class="custom-control-label" for="pregunta_cjs20b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs21">
						21. En las preguntas 49 y 51, ¿El censista dialogó y pidió aclaraciones para identificar adecuadamente las respuestas?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs21a" name="pregunta_cjs21" value="1">
						<label class="custom-control-label" for="pregunta_cjs21a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs21b" name="pregunta_cjs21" value="0">
						<label class="custom-control-label" for="pregunta_cjs21b">No</label>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest3">
				<h4>C. Cierre de la Entrevista</h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="pregunta_cjs22">
						22. ¿El censista verificó que la información del formulario está completa antes de retirarse?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs22a" name="pregunta_cjs22" value="1">
						<label class="custom-control-label" for="pregunta_cjs22a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs22b" name="pregunta_cjs22" value="0">
						<label class="custom-control-label" for="pregunta_cjs22b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs23">
						23. ¿El censista informó que pegará el adhesivo de “CENSADA” en la puerta de la vivienda?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs23a" name="pregunta_cjs23" value="1">
						<label class="custom-control-label" for="pregunta_cjs23a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs23b" name="pregunta_cjs23" value="0">
						<label class="custom-control-label" for="pregunta_cjs23b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs24">
						24. ¿El censista agradeció por la colaboración y se despidió con cortesía?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs24a" name="pregunta_cjs24" value="1">
						<label class="custom-control-label" for="pregunta_cjs24a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs24b" name="pregunta_cjs24" value="0">
						<label class="custom-control-label" for="pregunta_cjs24b">No</label>
					</div>
				</div>

			</div>
		</div>
	</div>
	<br>

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest3">
				<h4>D. Aspectos Posteriores a la Entrevista y Valoración Personal </h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="pregunta_cjs25">
						25. ¿El censista respondió a las preguntas realizadas durante la entrevista, aclarando todas tus dudas?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs25a" name="pregunta_cjs25" value="1">
						<label class="custom-control-label" for="pregunta_cjs25a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs25b" name="pregunta_cjs25" value="0">
						<label class="custom-control-label" for="pregunta_cjs25b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs26">
						26. ¿El censista volvió a la vivienda con su supervisor para corregir o completar el cuestionario?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs26a" name="pregunta_cjs26" value="1">
						<label class="custom-control-label" for="pregunta_cjs26a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs26b" name="pregunta_cjs26" value="0">
						<label class="custom-control-label" for="pregunta_cjs26b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs27">
						27. ¿El censista utilizó el lápiz proporcionado por el INE y no bolígrafo?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs27a" name="pregunta_cjs27" value="1">
						<label class="custom-control-label" for="pregunta_cjs27a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs27b" name="pregunta_cjs27" value="0">
						<label class="custom-control-label" for="pregunta_cjs27b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs28">
						28. En caso de que en la vivienda alguien hable un idioma originario ¿El censista pudo comunicarse en ese idioma?*
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs28a" name="pregunta_cjs28" value="1">
						<label class="custom-control-label" for="pregunta_cjs28a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs28b" name="pregunta_cjs28" value="0">
						<label class="custom-control-label" for="pregunta_cjs28b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs29">
						29. ¿Si el censista no habla ese idioma, solicitó que alguien del hogar sea interlocutor?*
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs29a" name="pregunta_cjs29" value="1">
						<label class="custom-control-label" for="pregunta_cjs29a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs29b" name="pregunta_cjs29" value="0">
						<label class="custom-control-label" for="pregunta_cjs29b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs30">
						30. ¿Si el censista no habla ese idioma y nadie en el hogar puede ser interlocutor, coordinó con su supervisora/or para recurrir a un vecino o vecina?*
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs30a" name="pregunta_cjs30" value="1">
						<label class="custom-control-label" for="pregunta_cjs30a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs30b" name="pregunta_cjs30" value="0">
						<label class="custom-control-label" for="pregunta_cjs30b">No</label>
					</div>
				</div>
				<div class="form-group">
					<label for="pregunta_cjs31">
						31. Otros aspectos no abordados en las preguntas del cuestionario, indicar el tiempo de llenado de la boleta censal de toda la familia (pregunta abierta)
					</label><br>
					<textarea class="form-control" rows="5" id="pregunta_cjs31" name="pregunta_cjs31" required></textarea>
				</div>

			</div>
			<div class="card-footer">
				<p class="small">* Preguntas no obligatorias</p>
			</div>
		</div>
	</div>
	<br>

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest3">
				<h4>E. Verificación del adhesivo “CENSADA” en las viviendas del manzano (pregunta del día siguiente)</h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="pregunta_cjs32">
						32. ¿Todas las puertas de las viviendas de tu manzano tienen el adhesivo “CENSADA”?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs32a" name="pregunta_cjs32" value="1">
						<label class="custom-control-label" for="pregunta_cjs32a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_cjs32b" name="pregunta_cjs32" value="0">
						<label class="custom-control-label" for="pregunta_cjs32b">No</label>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>


	<div id="contenedor-submit">
		<button id="BOTON" type="submit" name="action" value="1" >
			SIGUIENTE
		</button>
		<a href="<?php echo site_url('');?>">
			<input type="button" class="BOTON" value="CANCELAR">
		</a>
	</div>

	<br>
	<?php echo form_close(); ?>

</main>

<!-- The Modal -->
<div class="modal fade" id="preenviocontrolcensal">
	<div class="modal-dialog modal-xl modal-dialog-scrollable ">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-info text-white ">
				<h4 class="modal-title">Control Social en la Jornada Censal a Registrar</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="container">
					<?php echo form_open('controlCensal/procesarform', ['id' => 'formulario_csjc_preenvio',]); ?>
					<div class="form-group">
						<input class="form-control" type="hidden" id="idcuestionario_pre" name="idcuestionario_pre" value="<?php echo $idformulario;?>">
						<input class="form-control" type="hidden" id="idusuario_pre" name="idusuario_pre" value="<?php echo $usuario->id; ?>" >
						<input class="form-control" type="hidden" id="iddep_pre" name="iddep_pre">
					</div>

					<div class="card">
						<div class="card-header cuest3">
							<h4>Informacion General</h4>
						</div>
						<div class="card-body" id="info_general">
							<ul class="list-group">
								<li id="desplegar_dep" class="list-group-item">Departamento: </li>
							</ul>
						</div>
					</div>
					<br>

					<div class="card">
						<div class="card-header cuest3" >
							<h4>A.</h4>
						</div>
						<div class="card-body" id="seccion-a">
							<div class="form-group">
								<label for="pregunta_cjs1_pre">
									1. ¿El censista se presentó mencionando su nombre y apellido?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs1a_pre" name="pregunta_cjs1_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs1a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs1b_pre" name="pregunta_cjs1_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs1b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs2_pre">
									2. ¿El censista mostró su credencial y/o la tenía a la vista?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs2a_pre" name="pregunta_cjs2_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs2a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs2b_pre" name="pregunta_cjs2_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs2b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs3_pre">
									3. ¿El censista explicó los objetivos del Censo?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs3a_pre" name="pregunta_cjs3_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs3a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs3b_pre" name="pregunta_cjs3_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs3b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs4_pre">
									4.¿El censista solicitó la presencia de la o el jefe de hogar?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs4a_pre" name="pregunta_cjs4_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs4a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs4b_pre" name="pregunta_cjs4_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs4b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs5_pre">
									5. ¿El censista solicitó que todas las personas que pasaron la noche anterior estén presentes durante la entrevista?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs5a_pre" name="pregunta_cjs5_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs5a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs5b_pre" name="pregunta_cjs5_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs5b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs6_pre">
									6. ¿El censista no inició la entrevista hasta que todas las personas que pasaron la noche anterior en la vivienda estuvieron presentes?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs6a_pre" name="pregunta_cjs6_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs6a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs6b_pre" name="pregunta_cjs6_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs6b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs7_pre">
									7. ¿El censista mencionó que toda la información proporcionada será de carácter confidencial?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs7a_pre" name="pregunta_cjs7_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs7a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs7b_pre" name="pregunta_cjs7_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs7b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs8_pre">
									8. ¿El censista solicitó ingresar a la vivienda para realizar la entrevista?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs8a_pre" name="pregunta_cjs8_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs8a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs8b_pre" name="pregunta_cjs8_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs8b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs9_pre">
									9. Si la familia o jefe de hogar invitó al censista a ingresar a la vivienda y este aceptó, ¿se comunicó con su supervisor para indicar que realizaría la entrevista dentro de la vivienda?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs9a_pre" name="pregunta_cjs9_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs9a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs9b_pre" name="pregunta_cjs9_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs9b_pre">No</label>
								</div>
							</div>
							<div class="form-group ">
								<label for="pregunta_cjs10_pre">
									10. ¿El censista realizó la entrevista en compañía de algún acompañante (familiar, amistad u otra persona ajena al operativo censal)?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs10a_pre" name="pregunta_cjs10_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs10a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs10b_pre" name="pregunta_cjs10_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs10b_pre">No</label>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="card">
						<div class="card-header cuest3">
							<h4>B. Durante la Entrevista</h4>
						</div>
						<div class="card-body" id="seccion-b">
							<div class="form-group">
								<label for="pregunta_cjs11_pre">
									11. ¿Sonó el celular del censista, interrumpiendo la entrevista?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs11a_pre" name="pregunta_cjs11_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs11a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs11b_pre" name="pregunta_cjs11_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs11b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs12_pre">
									12. ¿El censista atendió llamadas personales o se le vio enviando mensajes, interrumpiendo la entrevista?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs12a_pre" name="pregunta_cjs12_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs12a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs12b_pre" name="pregunta_cjs12_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs12b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs13_pre">
									13. ¿El censista leyó las preguntas o enunciados de forma clara y pausada, sin prisa?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs13a_pre" name="pregunta_cjs13_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs13a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs13b_pre" name="pregunta_cjs13_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs13b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs14_pre">
									14. ¿El censista se confundió con el orden de las preguntas?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs14a_pre" name="pregunta_cjs14_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs14a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs14b_pre" name="pregunta_cjs14_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs14b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs15_pre">
									15. ¿El censista cuidó sus expresiones corporales y tono de voz, evitando mostrar sorpresa, asombro, aprobación o desaprobación?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs15a_pre" name="pregunta_cjs15_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs15a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs15b_pre" name="pregunta_cjs15_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs15b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs16_pre">
									16. ¿El censista hizo comentarios sobre las respuestas y/o se puso a conversar de otros temas?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs16a_pre" name="pregunta_cjs16_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs16a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs16b_pre" name="pregunta_cjs16_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs16b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs17_pre">
									17. ¿El censista entrevistó a cada persona para llenar el “Capítulo G Características de cada persona”?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs17a_pre" name="pregunta_cjs17_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs17a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs17b_pre" name="pregunta_cjs17_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs17b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs18_pre">
									18. En la pregunta 5, ¿El censista solo leyó la pregunta sin mencionar las opciones para las respuestas?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs18a_pre" name="pregunta_cjs18_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs18a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs18b_pre" name="pregunta_cjs18_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs18b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs19_pre">
									19. En la pregunta 10, ¿El censista leyó las 10 opciones de la pregunta para responder sí o no a cada una?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs19a_pre" name="pregunta_cjs19_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs19a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs19b_pre" name="pregunta_cjs19_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs19b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs20_pre">
									20. En la pregunta 25, ¿El censista respondió con seguridad a dudas planteadas por alguna persona que vive en la vivienda?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs20a_pre" name="pregunta_cjs20_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs20a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs20b_pre" name="pregunta_cjs20_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs20b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs21_pre">
									21. En las preguntas 49 y 51, ¿El censista dialogó y pidió aclaraciones para identificar adecuadamente las respuestas?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs21a_pre" name="pregunta_cjs21_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs21a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs21b_pre" name="pregunta_cjs21_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs21b_pre">No</label>
								</div>
							</div>

						</div>
					</div>
					<br>
					<div class="card">
						<div class="card-header cuest3">
							<h4>C. Cierre de la Entrevista</h4>
						</div>
						<div class="card-body" id="seccion-c">
							<div class="form-group">
								<label for="pregunta_cjs22_pre">
									22. ¿El censista verificó que la información del formulario está completa antes de retirarse?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs22a_pre" name="pregunta_cjs22_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs22a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs22b_pre" name="pregunta_cjs22_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs22b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs23_pre">
									23. ¿El censista informó que pegará el adhesivo de “CENSADA” en la puerta de la vivienda?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs23a_pre" name="pregunta_cjs23_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs23a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs23b_pre" name="pregunta_cjs23_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs23b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs24_pre">
									24. ¿El censista agradeció por la colaboración y se despidió con cortesía?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs24a_pre" name="pregunta_cjs24_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs24a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs24b_pre" name="pregunta_cjs24_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs24b_pre">No</label>
								</div>
							</div>


						</div>
					</div>
					<br>
					<div class="card">
						<div class="card-header cuest3">
							<h4>D. Aspectos Posteriores a la Entrevista y Valoración Personal </h4>
						</div>
						<div class="card-body" id="seccion-d">
							<div class="form-group">
								<label for="pregunta_cjs25_pre">
									25. ¿El censista respondió a las preguntas realizadas durante la entrevista, aclarando todas tus dudas?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs25a_pre" name="pregunta_cjs25_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs25a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs25b_pre" name="pregunta_cjs25_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs25b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs26_pre">
									26. ¿El censista volvió a la vivienda con su supervisor para corregir o completar el cuestionario?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs26a_pre" name="pregunta_cjs26_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs26a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs26b_pre" name="pregunta_cjs26_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs26b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs27_pre">
									27. ¿El censista utilizó el lápiz proporcionado por el INE y no bolígrafo?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs27a_pre" name="pregunta_cjs27_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs27a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs27b_pre" name="pregunta_cjs27_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs27b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs28_pre">
									28. En caso de que en la vivienda alguien hable un idioma originario ¿El censista pudo comunicarse en ese idioma?*
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs28a_pre" name="pregunta_cjs28_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs28a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs28b_pre" name="pregunta_cjs28_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs28b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs29_pre">
									29. ¿Si el censista no habla ese idioma, solicitó que alguien del hogar sea interlocutor?*
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs29a_pre" name="pregunta_cjs29_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs29a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs29b_pre" name="pregunta_cjs29_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs29b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs30_pre">
									30. ¿Si el censista no habla ese idioma y nadie en el hogar puede ser interlocutor, coordinó con su supervisora/or para recurrir a un vecino o vecina?*
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs30a_pre" name="pregunta_cjs30_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs30a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs30b_pre" name="pregunta_cjs30_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs30b_pre">No</label>
								</div>
							</div>
							<div class="form-group">
								<label for="pregunta_cjs31_pre">
									31. Otros aspectos no abordados en las preguntas del cuestionario, indicar el tiempo de llenado de la boleta censal de toda la familia (pregunta abierta)
								</label><br>
								<textarea class="form-control" rows="5" id="pregunta_cjs31_pre" name="pregunta_cjs31_pre" required></textarea>
							</div>
						</div>
					</div>
					<br>
					<div class="card">
						<div class="card-header cuest3">
							<h4>E. Verificación del adhesivo “CENSADA” en las viviendas del manzano (pregunta del día siguiente) </h4>
						</div>
						<div class="card-body" id="seccion-e">
							<div class="form-group">
								<label for="pregunta_cjs32_pre">
									32. ¿Todas las puertas de las viviendas de tu manzano tienen el adhesivo “CENSADA”?
								</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs32a_pre" name="pregunta_cjs32_pre" value="1">
									<label class="custom-control-label" for="pregunta_cjs32a_pre">Si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="pregunta_cjs32b_pre" name="pregunta_cjs32_pre" value="0">
									<label class="custom-control-label" for="pregunta_cjs32b_pre">No</label>
								</div>
							</div>
						</div>
					</div>
					<br>

				</div>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button id="BOTON" type="submit" name="action" value="1" >
					GUARDAR
				</button>
				<button id="BOTON" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
			<?php form_close(); ?>
		</div>s
	</div>
</div>


<!-- The Modal de alerta para el validador -->
<div class="modal fade" id="preguntassinseleccionar">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-warning">
				<h4 class="modal-title text-white ">Alerta</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				Existen preguntas sin llenar
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button id="BOTON" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>

		</div>
	</div>
</div>



