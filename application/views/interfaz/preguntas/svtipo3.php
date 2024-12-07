<div class="form-group">
	<label for="pregunta<?php echo $idpregunta;?>">
		<?php echo $etiqueta.'. '.$pregunta; ?>
	</label><br>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" class="custom-control-input"
			   id="pregunta<?php echo $idpregunta;?>a" name="pregunta<?php echo $idpregunta;?>" value="a">
		<label class="custom-control-label" for="pregunta<?php echo $idpregunta;?>a">
			Muy bueno
		</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" class="custom-control-input"
			   id="pregunta<?php echo $idpregunta;?>b" name="pregunta<?php echo $idpregunta;?>" value="b">
		<label class="custom-control-label" for="pregunta<?php echo $idpregunta;?>b">
			Bueno
		</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" class="custom-control-input"
			   id="pregunta<?php echo $idpregunta;?>c" name="pregunta<?php echo $idpregunta;?>" value="c">
		<label class="custom-control-label" for="pregunta<?php echo $idpregunta;?>c">
			Regular
		</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" class="custom-control-input"
			   id="pregunta<?php echo $idpregunta;?>d" name="pregunta<?php echo $idpregunta;?>" value="d">
		<label class="custom-control-label" for="pregunta<?php echo $idpregunta;?>d">
			Malo
		</label>
	</div>
</div>
<br>
