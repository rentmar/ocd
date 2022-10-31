<!DOCTYPE html>
<html lang="es">
<head>
	<title>Formulario Encuesta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<div class="jumbotron">
		<h1 class="text-center"><?php echo $encuesta->uinombre_encuesta; ?></h1>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php
			/** @noinspection PhpLanguageLevelInspection */
			$form_enc = [
				'id' => 'formencuesta',
			];
			?>
			<?php echo form_open('read/capturar', $form_enc); ?>

			<h3>Informacion General</h3>
			<div class="form-group">
				<label for="edad">Edad:</label>
				<input type="number" name="edad" class="form-control" id="edad" min="0" max="100" required>
			</div>
			<div><hr></div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input checked id="sexo" name="sexo" type="radio" class="form-check-input" value="F">
					Femenino
				</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input id="sexo" name="sexo" type="radio" class="form-check-input" value="M">
					Masculino
				</label>
			</div>
			<div>
				<hr>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input checked id="area" name="area" type="radio" class="form-check-input" value="urbana">
					Urbana
				</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input id="area" name="area" type="radio" class="form-check-input" value="rural">
					Rural
				</label>
			</div>

			<div>
				<hr>
			</div>

			<div class="form-group">
				<!--
				<label for="edad">Ciudad/Poblacion:</label>
				<input type="text" name="ciudad" class="form-control" id="ciudad" required >
				-->
				<select name="ciudad" id="ciudad" class="custom-select" required>
					<option selected>Ciudad/Poblacion</option>
					<option value="La Paz">La Paz</option>
					<option value="El Alto">El Alto</option>
					<option value="Santa Cruz">Santa Cruz</option>
					<option value="Cochabamba">Cochabamba</option>
				</select>
			</div>

			<div class="form-group">
				<label for="zona">Zona:</label>
				<input type="text" name="zona" class="form-control" id="zona" required >
			</div>

			<div>
				<hr>
			</div>

			<div class="form-group">
				<label for="sit_laboral">Situacion Laboral:</label>
			</div>

			<div class="form-check-inline">
				<label class="form-check-label">
					<input checked id="sit_laboral" name="sit_laboral" type="radio" class="form-check-input" value="empleado">
					Empleado
				</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input id="sit_laboral" name="sit_laboral" type="radio" class="form-check-input" value="desempleado">
					Desempleado
				</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input id="sit_laboral" name="sit_laboral" type="radio" class="form-check-input" value="independiente">
					Independiente
				</label>
			</div>

			<div>
				<hr>
			</div>

			<div class="form-group">
				<label for="sit_educativa">Situacion Educativa:</label>
			</div>

			<div class="form-check-inline">
				<label class="form-check-label">
					<input checked id="sit_educativa" name="sit_educativa" type="radio" class="form-check-input" value="estudia">
					Estudia
				</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input id="sit_educativa" name="sit_educativa" type="radio" class="form-check-input" value="no_estudia">
					No estudia
				</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input id="sit_educativa" name="sit_educativa" type="radio" class="form-check-input" value="no_corresponde">
					No corresponde
				</label>
			</div>
			<div>
				<hr>
			</div>

			<!-- Seleccion de Modulos -->
			<?php echo $sel_modulos; ?>
			<!-- Fin Seleccion de Modulos -->

			<!-- Despliegue de Modulos -->
			<?php echo $cont_modulo; ?>
			<!-- Fin Despliegue de Modulos -->



			<?php if($no_es_vista_previa): ?>
				<div>
					<input type="text" name="iduiencuesta" id="iduiencuesta" value="<?php echo $datos_generales->rel_iduiencuesta; ?>" >
					<input type="text" name="numero_formh" id="numero_formh" value="<?php echo $datos_generales->hash_text; ?>" >
					<input type="text" name="idusuario" id="idusuario" value="<?php echo $datos_generales->rel_idusuario;?>">
					<input type="text" name="idencuesta_asignada" id="idencuesta_asignada" value="<?php echo $datos_generales->idencuesta?>"  >
					<input type="text" name="idgeolocal" id="idgeolocal" value="<?php echo $datos_generales->rel_idgeolocal;?>"  >
					<input type="text" name="latitud_f" id="latitud_f">
					<input type="text" name="longitud_f" id="longitud_f" >
					<input type="text" id="tiempoinicio" name="tiempoinicio" value="<?php echo $tiempo;?>">
				</div>
			<?php endif; ?>
			<div>
				<hr>
			</div>
			<div class="form-group">
				<?php if($no_es_vista_previa):?>
					<button id="enviarencuesta" type="submit" class="btn btn-primary">Enviar</button>
				<?php endif; ?>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#salirencuesta">
					Salir
				</button>
			</div>
			<?php echo form_close(); ?>


		</div>
	</div>
</div>

<script>
	var iduiencuesta = <?php echo $datos_generales->rel_iduiencuesta;?>;
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/js/geo.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/formulario.js'); ?>"></script>
</body>
</html>
