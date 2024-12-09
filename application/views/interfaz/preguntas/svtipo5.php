
<div class="form-group">
	<?php echo var_dump($mesas)?>
</div>
<div class="form-group">
	<?php var_dump($pregunta);?>
</div>

<div class="form-group">
	<label for="pregunta_csej3obsn">
		<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta->nombre_pregunta; ?>


	</label><br>
	<textarea class="form-control" rows="5"
			  id="<?php echo $pregunta->codigo_pregunta;?>"
			  name="<?php echo $pregunta->codigo_pregunta;?>"></textarea>
</div>
<br>
