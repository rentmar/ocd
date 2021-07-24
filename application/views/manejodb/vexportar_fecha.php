<main role="main">
	<br>
	<div class="container">
		<div class="row">
			<div class="contenedores">
				<div class="form-group">
					<h4>Generar reporte por Intervalo de fecha</h4>
				</div>
				<?php echo form_open();?>
				<div class="form-group">
					<label for="fecha">Fecha Inicial:</label>
					<input id="fechainicial" name="fechainicial" type="date" required class="form-control">
				</div>
				<div class="form-group">
					<label for="fecha">Fecha Final:</label>
					<input id="fechafinal" name="fechafinal" type="date" required class="form-control">
				</div>

				<div class="form-group">
					<button type="submit" id="BOTON">
						Exportar
					</button>

				</div>

				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
	<br>

</main>
