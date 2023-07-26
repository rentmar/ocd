<div class="form-group">
	<?php //var_dump($respuesta); ?>
	<label for=""><?php echo $pregunta->ordinal_pregunta.')'.$pregunta->pregunta;?></label>

	<?php if($respuesta->respuesta == 'si'): ?>
		<div class="custom-control custom-radio">
			<input checked type="radio" class="custom-control-input" id="<?php echo 'opcion1'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="si">
			<label class="custom-control-label" for="<?php echo 'opcion1'.$pregunta->idpregunta; ?>">Si</label>
		</div>
		<div class="custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="<?php echo 'opcion2'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="no" >
			<label class="custom-control-label" for="<?php echo 'opcion2'.$pregunta->idpregunta; ?>">No</label>
		</div>
		<div class="custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="<?php echo 'opcion1'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="algunos">
			<label class="custom-control-label" for="<?php echo 'opcion1'.$pregunta->idpregunta; ?>">Algunos</label>
		</div>
	<?php elseif ($respuesta->respuesta == 'no'): ?>
		<div class="custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="<?php echo 'opcion1'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="si">
			<label class="custom-control-label" for="<?php echo 'opcion1'.$pregunta->idpregunta; ?>">Si</label>
		</div>
		<div class="custom-control custom-radio">
			<input checked type="radio" class="custom-control-input" id="<?php echo 'opcion2'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="no" >
			<label class="custom-control-label" for="<?php echo 'opcion2'.$pregunta->idpregunta; ?>">No</label>
		</div>
		<div class="custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="<?php echo 'opcion1'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="algunos">
			<label class="custom-control-label" for="<?php echo 'opcion1'.$pregunta->idpregunta; ?>">Algunos</label>
		</div>
	<?php elseif($respuesta->respuesta == 'algunos'):?>
		<label for=""><?php echo $pregunta->ordinal_pregunta.')'.$pregunta->pregunta;?></label>
		<div class="custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="<?php echo 'opcion1'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="si">
			<label class="custom-control-label" for="<?php echo 'opcion1'.$pregunta->idpregunta; ?>">Si</label>
		</div>
		<div class="custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="<?php echo 'opcion2'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="no" >
			<label class="custom-control-label" for="<?php echo 'opcion2'.$pregunta->idpregunta; ?>">No</label>
		</div>
		<div class="custom-control custom-radio">
			<input checked type="radio" class="custom-control-input" id="<?php echo 'opcion1'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="algunos">
			<label class="custom-control-label" for="<?php echo 'opcion1'.$pregunta->idpregunta; ?>">Algunos</label>
		</div>
	<?php else:?>
		<label for=""><?php echo $pregunta->ordinal_pregunta.')'.$pregunta->pregunta;?></label>
		<div class="custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="<?php echo 'opcion1'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="si">
			<label class="custom-control-label" for="<?php echo 'opcion1'.$pregunta->idpregunta; ?>">Si</label>
		</div>
		<div class="custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="<?php echo 'opcion2'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="no" >
			<label class="custom-control-label" for="<?php echo 'opcion2'.$pregunta->idpregunta; ?>">No</label>
		</div>
		<div class="custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="<?php echo 'opcion1'.$pregunta->idpregunta; ?>" name="<?php echo 'pregunta'.$pregunta->codigo_pregunta; ?>" value="algunos">
			<label class="custom-control-label" for="<?php echo 'opcion1'.$pregunta->idpregunta; ?>">Algunos</label>
		</div>
	<?php endif; ?>
</div>
