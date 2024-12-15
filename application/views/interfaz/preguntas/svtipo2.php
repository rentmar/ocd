<?php if($idhoja_preguntas == 1): //Hoja 1?>

<?php elseif ($idhoja_preguntas == 2): //Hoja 2?>

<?php
	$respuestas2_array = (array)$respuestas;
	$resp3sel = $respuestas2_array[$pregunta->codigo_pregunta];
	//var_dump($resp3sel);
	//echo "<br>";
	$valorOpt = $resp3sel->respuesta;

	if(mb_strlen($valorOpt) === 0){
		//echo "ninguno";
		$acheck = '';
		$bcheck = '';
		$ccheck = '';
	}elseif ($valorOpt === $pregunta->codigo_pregunta.'-'.'1' ){
		$acheck = 'checked';
		$bcheck = '';
		$ccheck = '';
		//echo "A";
	}elseif ($valorOpt === $pregunta->codigo_pregunta.'-'.'2' ){
		$acheck = '';
		$bcheck = 'checked';
		$ccheck = '';
		//echo "B";

	}elseif ($valorOpt === $pregunta->codigo_pregunta.'-'.'3' ){
		$acheck = '';
		$bcheck = '';
		$ccheck = 'checked';
		//echo "C";

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
				   <?php  echo $acheck; ?>
			>
			<label class="custom-control-label"
				   for="<?php  echo $pregunta->codigo_pregunta.'s'; ?>">si</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'n'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'2'; ?>"
					<?php echo $bcheck; ?>
			>
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'n'; ?>">no</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'no'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'3'; ?>"
					<?php echo $ccheck;?>
			>
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'no'; ?>">no se observaron casos</label>
		</div>
	</div>
	<br>


<?php endif;?>

