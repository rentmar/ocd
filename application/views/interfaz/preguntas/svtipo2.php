<?php if($idhoja_preguntas == 1): //Hoja 1?>

<?php elseif ($idhoja_preguntas == 2): //Hoja 2?>

	<div class="form-group">
		<label for="pregunta_csej19">
			<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta->nombre_pregunta; ?>
		</label><br>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'s'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'1'; ?>">
			<label class="custom-control-label"
				   for="<?php  echo $pregunta->codigo_pregunta.'s'; ?>">si</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'n'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'2'; ?>">
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'n'; ?>">no</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'no'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'3'; ?>">
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'no'; ?>">no se observaron casos</label>
		</div>
	</div>
	<br>


<?php endif;?>

