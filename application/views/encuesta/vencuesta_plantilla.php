<!DOCTYPE html>
<html lang="es">
<head>
	<title>Bootstrap Example</title>
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
			<?php echo form_open('encuesta/capturarDatosEncuesta'); ?>

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
							<div class="acordeon">
							<?php foreach ($secciones as $s): ?>
							<?php if($s->iduimodulo==$m->iduimodulo):  ?>
								<h3><?php echo $s->iduiseccion; ?></h3>


							<?php endif; ?>
							<?php endforeach; ?>
							</div>
						</div>
					<?php else:  ?>
						<div id="<?php echo 'modulo'.$m->iduimodulo; ?>" class="container tab-pane fade"><br>
							<?php foreach ($secciones as $s): ?>
								<?php if($s->iduimodulo==$m->iduimodulo):  ?>
									<h3><?php echo $s->iduiseccion;?>  </h3>



								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif;  ?>
				<?php endforeach; ?>
			</div>
			<!-- Fin Despliegue de Modulos -->


			<?php echo form_close(); ?>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php echo form_open('encuesta/capturarDatosEncuesta'); ?>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div id="home" class="container tab-pane active"><br>
					<h3>HOME</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<div class="form-group">
						<input type="text" id="nombre" name="nombre" placeholder="nombre" >
					</div>

					<div id="accordion">

						<div class="card">
							<div class="card">
								<div class="card-header">
									<a class="card-link" data-toggle="collapse" href="#collapseOne">
										Collapsible Group Item #1
									</a>
								</div>
								<div id="collapseOne" class="collapse show" data-parent="#accordion">
									<div class="card-body">
										Lorem ipsum..
									</div>
								</div>
							</div>

						</div>

					</div>

					<div id="accordion">

						<div class="card">
							<div class="card-header">
								<a class="card-link" data-toggle="collapse" href="#collapseOne">
									Collapsible Group Item #1
								</a>
							</div>
							<div id="collapseOne" class="collapse show" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum..
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
									Collapsible Group Item #2
								</a>
							</div>
							<div id="collapseTwo" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum..
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
									Collapsible Group Item #3
								</a>
							</div>
							<div id="collapseThree" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum..
								</div>
							</div>
						</div>

					</div>



					<div class="panel-group" id="panels">
						<div class="panel panel-default">
							<div class="collapsed" data-toggle="collapse" data-parent="#panels" data-target="#firstPanel">
								<h4>First header</h4>
							</div>
							<div id="firstPanel" class="panel-collapse collapse">
								<div>Content.</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="collapsed" data-toggle="collapse" data-parent="#panels" data-target="#secondPanel">
								<h4>Second header</h4>

							</div>
							<div id="secondPanel" class="panel-collapse collapse">
								<div>Other content.</div>
							</div>
						</div>
					</div>



				</div>
				<div id="menu1" class="container tab-pane fade"><br>
					<h3>Menu 1</h3>
					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					<div class="form-group">
						<input type="text" id="apellido" name="apellido" placeholder="apellido" >
					</div>

				</div>
				<div id="menu2" class="container tab-pane fade"><br>
					<h3>Menu 2</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
					<div class="form-group">
						<input type="text" id="edad" name="edad" placeholder="edad" >
					</div>
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

