<?php if($r->iduipregunta==$p->iduipregunta): ?>
	<?php $sel_multiple_cuantificada = json_decode($r->pregunta_datos) ; ?>
	<div class="form-group">
		<?php foreach ($sel_multiple_cuantificada as $rp): ?>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<div class="input-group-text">
						<input type="checkbox"
							   id="pregunta<?php echo $p->iduipregunta; ?>"
							   name="pregunta<?php echo $p->iduipregunta; ?>[]">
						<?php echo $rp->literal;?>
					</div>
				</div>
				<input type="number"
					   id="pregunta<?php echo $p->iduipregunta; ?>text"
					   name="pregunta<?php echo $p->iduipregunta; ?>text"
					   min="1" max="5" class="form-control"
					    >
			</div>
		<?php endforeach; ?>
	</div>

<?php endif; ?>
