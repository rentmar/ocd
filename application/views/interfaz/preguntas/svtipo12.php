<?php if($idhoja_preguntas == 1): //Hoja 1?>



<?php elseif ($idhoja_preguntas == 2): //Hoja 2?>
<?php
	$respuestas2_array = (array)$respuestas;
	$respnum = $respuestas2_array[$pregunta->codigo_pregunta];
	//var_dump($respnum);
	//echo "<br>";
	$valorOpt = $respnum->respuesta;
	//echo $valorOpt;


	?>


	<div class="form-group">
		<label for="<?php echo $pregunta->codigo_pregunta; ?>"><?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta->nombre_pregunta; ?></label>
		<input type="number"  class="form-control"
			   id="<?php echo $pregunta->codigo_pregunta; ?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
			   value="<? echo $valorOpt; ?>"
		>
	</div>
	<br>
<?php endif;?>


