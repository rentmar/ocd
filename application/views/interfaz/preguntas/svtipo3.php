<?php if($idhoja_preguntas == 1): //Hoja 1?>


<?php elseif ($idhoja_preguntas == 2): //Hoja 2?>

	<div class="form-group">
		<label for="pregunta_csej19">
			<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta->nombre_pregunta; ?>
		</label><br>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'a'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'a'; ?>">
			<label class="custom-control-label"
				   for="<?php  echo $pregunta->codigo_pregunta.'a'; ?>">Muy Bueno</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'b'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'b'; ?>">
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'b'; ?>">Bueno</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'c'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'c'; ?>">
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'c'; ?>">Regular</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'d'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'d'; ?>">
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'d'; ?>">Malo</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'e'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'e'; ?>">
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'e'; ?>">Pesimo</label>
		</div>
	</div>
	<br>


<?php endif;?>


