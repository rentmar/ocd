<?php if($idhoja_preguntas == 1): //Hoja 1?>

<?php elseif ($idhoja_preguntas == 2): //Hoja 2?>
	<?php

	$respuestas2_array = (array)$respuestas;
	$resp2sel = $respuestas2_array[$pregunta->codigo_pregunta];
	//var_dump($resp3sel);
	//echo "<br>";
	$valorOpt = $resp2sel->respuesta;

	if(mb_strlen($valorOpt) === 0){
		//echo "ninguno";
		$check1 = '';
		$check2 = '';
	}elseif ($valorOpt === $pregunta->codigo_pregunta.'-'.'1' ){
		$check1 = 'checked';
		$check2 = '';

	}elseif ($valorOpt === $pregunta->codigo_pregunta.'-'.'2' ){
		$check1 = '';
		$check2 = 'checked';

	}

	?>

	<div class="form-group">
		<label for="pregunta_csej19">
			<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta->nombre_pregunta; ?>
		</label><br>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'s'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'1'; ?>"
					<?php  echo $check1; ?>
			>
			<label class="custom-control-label"
				   for="<?php  echo $pregunta->codigo_pregunta.'s'; ?>">si</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'n'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'2'; ?>"
				<?php  echo $check2; ?>

			>
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'n'; ?>">no</label>
		</div>
	</div>
	<br>


<?php endif;?>





