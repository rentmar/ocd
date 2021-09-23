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
			<?php echo form_open('read/capturar'); ?>
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

			<div class="form-group">
				<label for="edad">Ciudad/Poblacion:</label>
				<input type="text" name="ciudad" class="form-control" id="ciudad" required >
			</div>

			<div class="form-group">
				<label for="zona">Zona:</label>
				<input type="text" name="zona" class="form-control" id="zona" required >
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
				<input type="hidden" name="iduiencuesta" id="iduiencuesta" value="<?php echo $datos_generales->rel_iduiencuesta; ?>" >
				<input type="hidden" name="numero_formh" id="numero_formh" value="<?php echo $datos_generales->hash_text; ?>" >
				<input type="hidden" name="idusuario" id="idusuario" value="<?php echo $datos_generales->rel_idusuario;?>">
				<input type="hidden" name="idencuesta_asignada" id="idencuesta_asignada" value="<?php echo $datos_generales->idencuesta?>"  >
				<input type="hidden" name="idgeolocal" id="idgeolocal" value="<?php echo $datos_generales->rel_idgeolocal;?>"  >
				<input type="hidden" name="latitud_f" id="latitud_f">
				<input type="hidden" name="longitud_f" id="longitud_f" >
			</div>
			<?php endif; ?>
			<div>
				<hr>
			</div>
			<div class="form-group">
				<?php if($no_es_vista_previa):?>
				<button type="submit" class="btn btn-primary">Enviar</button>
				<?php endif; ?>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#salirencuesta">
					Salir
				</button>
			</div>


			<?php echo form_close(); ?>

		</div>


	</div>
	</div>
</div>


<!-- The Modal -->
<div class="modal fade" id="salirencuesta">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-danger text-white">
				<h4 class="modal-title">Salir de la encuesta?</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<?php echo form_open('encuesta/formulariosEncuesta/');?>
				Esta Seguro?. Toda la informacion se perdera.
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-secondary" >Si</button>
				<?php echo form_close();?>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			</div>

		</div>
	</div>
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/js/geo.js'); ?>"></script>
</body>
</html>

