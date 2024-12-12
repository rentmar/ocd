<?php if($idhoja_preguntas == 1): //Hoja 1?>

<?php elseif ($idhoja_preguntas == 2): //Hoja 2?>
	<div class="form-group">
		<label for="<?php echo $pregunta->codigo_pregunta; ?>"><?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta->nombre_pregunta; ?></label>
		<input type="number" value="" class="form-control"
			   id="<?php echo $pregunta->codigo_pregunta; ?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
		>
	</div>
	<br>
<?php endif;?>


