
<div class="form-group">
	<div class="container mt-3">
		<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta->nombre_pregunta; ?>
	</div>
	<?php if( !empty($pregunta->info_pregunta) ): ?>
	<div class="container mt3">
		<div class="alert alert-success">
			<strong>Informacion! </strong> <?php echo $pregunta->info_pregunta; ?>
		</div>

	</div>
	<?php endif; ?>

</div>
