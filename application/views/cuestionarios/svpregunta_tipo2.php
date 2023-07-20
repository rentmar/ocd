<div class="form-group">
	<label for=""><?php echo $pregunta->pregunta;?></label>
	<div class="custom-control custom-radio">
		<input type="radio" class="custom-control-input" id="<?php echo 'opcion1'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" >
		<label class="custom-control-label" for="<?php echo 'opcion1'.$pregunta->idpregunta; ?>">Si</label>
	</div>
	<div class="custom-control custom-radio">
		<input type="radio" class="custom-control-input" id="<?php echo 'opcion2'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" >
		<label class="custom-control-label" for="<?php echo 'opcion2'.$pregunta->idpregunta; ?>">No</label>
	</div>
</div>
