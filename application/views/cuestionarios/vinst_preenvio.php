<main role="main">
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="card">
					<div class="card-header cuest2" >
						Institucionalidad democrática
					</div>
					<div class="card-body" >
						<div class="list-group">
							<a href="#" class="list-group-item disabled">
								Fecha Registro:
								<?php echo ' '.$noticia->fecha_registro; ?>
							</a>
							<a href="#" class="list-group-item disabled">
								Fecha:
								<?php echo ' '.$noticia->fecha_noticia; ?>
							</a>
							<a href="#" class="list-group-item disabled">
								Titular:
								<?php echo ' '.$noticia->titular; ?>
							</a>
							<a href="#" class="list-group-item disabled">
								Resumen:
								<?php echo ' '.$noticia->resumen; ?>
							</a>
							<a href="#" class="list-group-item disabled">
								URL:
								<?php echo ' '.$noticia->url_noticia; ?>
							</a>
							<a href="#" class="list-group-item disabled">
								Medio:
								<?php echo ' '; ?>
							</a>
							<a href="#" class="list-group-item disabled">
								Actor:
								<?php echo ' '; ?>
							</a>
							<a href="#" class="list-group-item disabled">
								Tema:
								<?php echo ' '; ?>
							</a>
							<a href="#" class="list-group-item disabled">
								Subtema:
								<?php
								echo ' ';
								?>
							</a>
						</div>

					</div>
					<div class="card-footer" >
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Enviar</button>
						<a href="<?php echo site_url('inicio') ?>" class="btn btn-danger" role="button">Cancelar</a>

					</div>

				</div>
			</div>

		</div>

	</div>



</main>


<!-- The Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Modal Heading</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="<?php echo base_url().'index.php/Noticia/registrarNoticia'; ?>" method="post">
					<p>
						Registrar la noticia?
					</p>
				<!--<input type="hidden" id="idcuestionario" name="idcuestionario" value="<?php /*echo $idcuestionario; */?>" >
				<input type="hidden" id="fecha_registro" name="fecha_registro" value="<?php /*echo $fecha_registro; */?>" >
				<input type="hidden" id="fecha_noticia" name="fecha_noticia" value="<?php /*echo $fecha_noticia;*/?>" >
				<input type="hidden" id="titular" name="titular" value="<?php /*echo $titular; */?>" >
				<input type="hidden" id="resumen" name="resumen" value="<?php /*echo $resumen;*/?>" >
				<input type="hidden" id="url_noticia" name="url_noticia" value="<?php /*echo $url_noticia;*/?>" >
				<input type="hidden" id="idactor" name="idactor" value="<?php /*echo $idactor;*/?>" >
				<input type="hidden" id="idmedio" name="idmedio" value="<?php /*echo $idmedio;*/?>" >
				<input type="hidden" id="idtema" name="idtema" value="<?php /*echo $idtema;*/?>" >
				<input type="hidden" id="idsubtema" name="idsubtema" value="<?php /*echo $idsubtema;*/?>" >
				<input type="hidden" id="otrotema" name="otrotema" value="<?php /*echo $tema;*/?>" >
				<input type="hidden" id="otrosubtema" name="otrosubtema" value="<?php /*echo $subtema;*/?>" >
				<input type="hidden" id="idusr" name="idusr" value="<?php /*echo $idusr;*/?>" >-->

			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<!-- Al metodo de insercion -->
				<button type="submit" class="btn btn-primary">Si</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

			</div>
			<?php echo form_close(); ?>

		</div>
	</div>
</div>
