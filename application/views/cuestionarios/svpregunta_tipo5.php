<div class="form-group">
	<label for="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>"><?php echo $pregunta->pregunta; ?>:</label>
	<input id="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" type="number" class="form-control" placeholder="En minutos" min="0" max="100" step="1">
</div>
