<div class="form-group">
	<div class="container mt-3">
		<?php echo $etiqueta.'. '.$pregunta; ?>
	</div>
	<br>
	<div class="d-flex w-100"> <!-- Rotulo -->
		<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
		<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
		<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
		<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
	</div>
	<div class="d-flex w-100"> <!-- Si/no -->
		<?php for($i=1; $i<5; $i++): ?>
			<div class="col-3 border">
				<input class="form-control" type="time" id="pregunta<?php echo $idpregunta?>" name="pregunta<?php echo $idpregunta?>" placeholder="No Mesa">
			</div>
		<?php endfor; ?>
	</div>
	<br>
	<div class="d-flex w-100">
		<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
		<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
		<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
		<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
	</div>
	<div class="d-flex w-100"><!-- Si/No -->
		<?php for($i=5; $i<9; $i++): ?>
			<div class="col-3 border">
				<input class="form-control" type="time" id="pregunta<?php echo $idpregunta?>" name="pregunta<?php echo $idpregunta?>" placeholder="No Mesa">
			</div>
		<?php endfor; ?>
	</div>
	<br>
	<div class="d-flex w-100">
		<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
		<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
		<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
		<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
	</div>
	<div class="d-flex w-100"><!-- Si/No -->
		<?php for($i=9; $i<13; $i++): ?>
			<div class="col-3 border">
				<input class="form-control" type="time" id="pregunta<?php echo $idpregunta?>" name="pregunta<?php echo $idpregunta?>" placeholder="No Mesa">
			</div>
		<?php endfor; ?>

	</div>
</div>
