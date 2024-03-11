<main role="main" >
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<?php echo form_open(''); ?><?php echo form_close(); ?>
				<div class="contenedor_filtros">
				</div>
				<div class="contenedor">
					<!--Mensaje de Error-->
					<?php if(!empty($this->session->flashdata())): ?>
						<br>
						<div>
							<div id="mensaje-error">
								<div class="alert alert-<?php echo $this->session->flashdata('clase')?>">
									<?php echo $this->session->flashdata('mensaje') ?>
								</div>
							</div>
						</div>
						<br>
					<?php endif; ?>


					<div>
						<h3> Reporte Formularios Control Social en la Jornada Censal</h3>

					</div>
					<br>
					<div>

						<div class="form-group">
							<a href="<?php echo site_url('manejoDB');?>"><input type="" class="BOTONROJO" value="SALIR"></a>
						</div>
					</div>
				</div>



				<br>
				<?php echo form_open('controlCensal/reporteGeneral'); ?>
				<div class="contenedor">
					<h3>Reporte General </h3>

					<div class="form-row">
						<input type="submit" class="BOTON" value="GENERAR" name="tema">
					</div>
				</div>
				<?php echo form_close(); ?>

				<br>
				
				<?php echo form_open('controlCensal/reporteGrafico'); ?>
				<div class="contenedor">
					<h3>Reporte Grafico </h3>
					<div class="form-row">
						<input type="submit" class="BOTON" value="GENERAR" name="tema">
					</div>
				</div>
				<?php echo form_close(); ?>

				<br>


			</div>
		</div>
	</div>
	<br>

</main>

