<?php if($idhoja_preguntas == 1): //Hoja 1?>


<?php elseif ($idhoja_preguntas == 2): //Hoja 2?>

	<?php //echo $pregunta->codigo_pregunta ?>
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
			$dcheck = '';
			$echeck = '';
		}elseif ($valorOpt === $pregunta->codigo_pregunta.'-'.'a' ){
			$acheck = 'checked';
			$bcheck = '';
			$ccheck = '';
			$dcheck = '';
			$echeck = '';
			//echo "A";
		}elseif ($valorOpt === $pregunta->codigo_pregunta.'-'.'b' ){
			$acheck = '';
			$bcheck = 'checked';
			$ccheck = '';
			$dcheck = '';
			$echeck = '';
			//echo "B";

		}elseif ($valorOpt === $pregunta->codigo_pregunta.'-'.'c' ){
			$acheck = '';
			$bcheck = '';
			$ccheck = 'checked';
			$dcheck = '';
			$echeck = '';
			//echo "C";

		}elseif ($valorOpt === $pregunta->codigo_pregunta.'-'.'d' ){
			$acheck = '';
			$bcheck = '';
			$ccheck = '';
			$dcheck = 'checked';
			$echeck = '';
			//echo "D";

		}elseif ($valorOpt === $pregunta->codigo_pregunta.'-'.'e' ){
			$acheck = '';
			$bcheck = '';
			$ccheck = '';
			$dcheck = '';
			$echeck = 'checked';
			//echo "E";
		}


	?>

	<div class="form-group">
		<label for="pregunta_csej19">
			<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta->nombre_pregunta; ?>
		</label><br>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'a'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'a'; ?>"
					<?php echo $acheck;?>
			>
			<label class="custom-control-label"
				   for="<?php  echo $pregunta->codigo_pregunta.'a'; ?>">Muy Bueno</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'b'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'b'; ?>"
				<?php echo $bcheck;?>

			>
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'b'; ?>">Bueno</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'c'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'c'; ?>"
				<?php echo $ccheck;?>

			>
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'c'; ?>">Regular</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'d'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'d'; ?>"
				<?php echo $dcheck; ?>
			>
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'d'; ?>">Malo</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input"
				   id="<?php echo $pregunta->codigo_pregunta.'e'; ?>"
				   name="<?php echo $pregunta->codigo_pregunta; ?>"
				   value="<?php echo $pregunta->codigo_pregunta.'-'.'e'; ?>"
				<?php echo $echeck;?>

			>
			<label class="custom-control-label"
				   for="<?php echo $pregunta->codigo_pregunta.'e'; ?>">Pesimo</label>
		</div>
	</div>
	<br>


<?php endif;?>


