<?php if($r->iduipregunta==$p->iduipregunta): ?>
<div class="form-check">
	<label class="form-check-label" for="radio">
		<input  type="radio" class="form-check-input" id="radio" name="pregunta<?php echo $p->iduipregunta; ?>[]" value="<?php echo $r->iduirespuesta; ?>">
		<?php echo $r->uinombre_respuesta; ?>
	</label>
</div>
<?php endif; ?>

