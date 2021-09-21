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

			<!-- Seleccion de Modulos -->
			<ul class="nav nav-tabs" role="tablist" >
				<?php foreach ($modulos as $m): ?>
					<?php if($m->uiorden_modulo == $orden_mod_min): ?>
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#<?php echo 'modulo'.$m->iduimodulo; ?>">
								<?php echo $m->uinombre_modulo; ?>
							</a>
						</li>
					<?php else: ?>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#<?php echo 'modulo'.$m->iduimodulo; ?>">
								<?php echo $m->uinombre_modulo; ?>
							</a>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<!-- Seleccion de Modulos -->

			<!-- Despliegue de Modulos -->
			<div class="tab-content">
				<?php foreach ($modulos as $m): ?>
					<?php if($m->uiorden_modulo == $orden_mod_min): ?>
						<div id="<?php echo 'modulo'.$m->iduimodulo; ?>" class="container tab-pane active"><br>
							<div class="accordion<?php echo $m->iduimodulo;?>">
							<?php foreach ($secciones as $s): ?>
							<?php if($s->iduimodulo==$m->iduimodulo):  ?>
								<h3><?php echo $s->iduiseccion; ?></h3>
									<div class="card">
										<?php foreach ($preguntas as $p): ?>
											<?php if($p->iduiseccion==$s->iduiseccion): ?>
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#<?php echo 'pregunta'.$p->iduiseccion; ?>">
														<?php echo $p->uipregunta_nombre; ?>
													</a>
												</div>
												<div id="<?php echo 'pregunta'.$p->iduiseccion;?>" class="collapse show" data-parent="#accordion<?php echo $m->iduimodulo;?>">
													<div class="card-body">
														<div class="form-group">
														<?php foreach ($respuestas as $r): ?>
															<?php if($r->iduipregunta==$p->iduipregunta): ?>
															<div class="form-check">
																<label class="form-check-label" for="radio">
																	<input type="radio" class="form-check-input" id="radio" name="pregunta<?php echo $p->iduipregunta; ?>[]" value="<?php echo $r->iduirespuesta; ?>">
																	<?php echo $r->uinombre_respuesta; ?>
																</label>
															</div>
															<?php endif; ?>
														<?php endforeach; ?>
														</div>

													</div>
												</div>
											<?php endif; ?>
										<?php endforeach; ?>
									</div>
							<?php endif; ?>
							<?php endforeach; ?>
							</div>
						</div>
					<?php else:  ?>
						<div id="<?php echo 'modulo'.$m->iduimodulo; ?>" class="container tab-pane fade"><br>
							<div class="accordion<?php echo $m->iduimodulo;?>">
								<?php foreach ($secciones as $s): ?>
									<?php if($s->iduimodulo==$m->iduimodulo):  ?>
										<h3><?php echo $s->iduiseccion; ?></h3>
										<div class="card">
											<?php foreach ($preguntas as $p): ?>
												<?php if($p->iduiseccion==$s->iduiseccion): ?>
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#<?php echo 'pregunta'.$p->iduiseccion; ?>">
														<?php echo $p->uipregunta_nombre; ?>
													</a>
												</div>
												<div id="<?php echo 'pregunta'.$p->iduiseccion; ?>" class="collapse show" data-parent="#accordion<?php echo $m->iduimodulo;?>">
													<div class="card-body">
														<div class="form-group">
															<?php foreach ($respuestas as $r): ?>
																<?php if($r->iduipregunta==$p->iduipregunta): ?>
																	<div class="form-check">
																		<label class="form-check-label" for="radio">
																			<input type="radio" class="form-check-input" id="radio" name="pregunta<?php echo $p->iduipregunta; ?>[]" value="<?php echo $r->iduirespuesta; ?>">
																			<?php echo $r->uinombre_respuesta; ?>
																		</label>
																	</div>
																<?php endif; ?>
															<?php endforeach; ?>
														</div>
													</div>
												</div>
												<?php endif; ?>
											<?php endforeach; ?>
										</div>

									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif;  ?>
				<?php endforeach; ?>
			</div>
			<!-- Fin Despliegue de Modulos -->
			<div>
				<input type="text" name="iduiencuesta" id="iduiencuesta" value="<?php echo $datos_generales->rel_iduiencuesta; ?>" >
				<input lotype="text" name="numero_formh" id="numero_formh" value="<?php echo $datos_generales->hash_text; ?>" >
				<input type="text" name="idusuario" id="idusuario" value="<?php echo $datos_generales->rel_idusuario;?>">
				<input type="text" name="idencuesta_asignada" id="idencuesta_asignada" value="<?php echo $datos_generales->idencuesta?>"  >
				<input type="text" name="idgeolocal" id="idgeolocal" value="<?php echo $datos_generales->rel_idgeolocal;?>"  >
				<input type="text" name="latitud_f" id="latitud_f">
				<input type="text" name="longitud_f" id="longitud_f" >

			</div>
			<div>
				<hr>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Enviar</button>
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
</body>
</html>

