
<?php

$rpm = (array)$respuestas;
//var_dump($rpm);

?>
<?php if($idhoja_preguntas == 1): //Hoja 1?>
	<?php if($pregunta->restriccion_departamento == 0): //Sin restriccionn a departamento ?>

		<div class="form-group">
			<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
				   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
			>
		</div>
		<div class="form-group">
			<div class="container mt-3">
				<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta->nombre_pregunta; ?>
				<!-- Mensaje  -->
				<?php if( !empty($pregunta->info_pregunta) ): ?>
					<div class="alert alert-success">
						<strong>Informacion! </strong> <?php echo $pregunta->info_pregunta; ?>
					</div>
				<?php endif; ?>
				<!-- fin de Mensaje  -->
			</div>
			<br>
			<div class="d-flex w-100"> <!-- Rotulo -->
				<div class="col-6 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
			</div>
			<div class="d-flex w-100"> <!-- Si/no -->
				<?php for($i=1; $i<3; $i++): ?>
				<?php

					$prg = (array) $rpm[$pregunta->codigo_pregunta];
					//echo "<br>";
					//var_dump($prg);
					$valmesa = $prg['m'.$i];
					if(mb_strlen($valmesa) === 0){
							$valor='';
					}
					else{
						$valor = $prg['m'.$i];
					}

					?>
					<div class="col-6 border">
						<input class="form-control " type="time"
							   id="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   name="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   placeholder="" value="<?php echo $valor;?>" >
					</div>
				<?php endfor; ?>
			</div>
			<br>
			<div class="d-flex w-100"> <!-- Rotulo -->
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
			</div>
			<div class="d-flex w-100"> <!-- Si/no -->
				<?php for($i=3; $i<5; $i++): ?>
					<?php

					$prg = (array) $rpm[$pregunta->codigo_pregunta];
					//echo "<br>";
					//var_dump($prg);
					$valmesa = $prg['m'.$i];
					if(mb_strlen($valmesa) === 0){
						$valor='';
					}
					else{
						$valor = $prg['m'.$i];
					}

					?>
					<div class="col-6 border">
						<input class="form-control " type="time"
							   id="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   name="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   placeholder="" value="<?php echo $valor; ?>" >
					</div>
				<?php endfor; ?>
			</div>
			<br>
			<div class="d-flex w-100">
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
			</div>
			<div class="d-flex w-100"><!-- Si/No -->
				<?php for($i=5; $i<7; $i++): ?>
					<?php

					$prg = (array) $rpm[$pregunta->codigo_pregunta];
					//echo "<br>";
					//var_dump($prg);
					$valmesa = $prg['m'.$i];
					if(mb_strlen($valmesa) === 0){
						$valor='';
					}
					else{
						$valor = $prg['m'.$i];
					}

					?>
					<div class="col-6 border">
						<input class="form-control" type="time"
							   id="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   name="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   placeholder="" value="<?php echo $valor;?>">
					</div>
				<?php endfor; ?>
			</div>
			<br>
			<div class="d-flex w-100">
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
			</div>
			<div class="d-flex w-100"><!-- Si/No -->
				<?php for($i=7; $i<9; $i++): ?>
					<?php

					$prg = (array) $rpm[$pregunta->codigo_pregunta];
					//echo "<br>";
					//var_dump($prg);
					$valmesa = $prg['m'.$i];
					if(mb_strlen($valmesa) === 0){
						$valor='';
					}
					else{
						$valor = $prg['m'.$i];
					}

					?>
					<div class="col-6 border">
						<input class="form-control" type="time"
							   id="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   name="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   placeholder="" value="<?php echo $valor;?>"
						>
					</div>
				<?php endfor; ?>
			</div>
			<br>
			<div class="d-flex w-100">
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
			</div>
			<div class="d-flex w-100"><!-- Si/No -->
				<?php for($i=9; $i<11; $i++): ?>
					<?php

					$prg = (array) $rpm[$pregunta->codigo_pregunta];
					//echo "<br>";
					//var_dump($prg);
					$valmesa = $prg['m'.$i];
					if(mb_strlen($valmesa) === 0){
						$valor='';
					}
					else{
						$valor = $prg['m'.$i];
					}

					?>
					<div class="col-6 border">
						<input class="form-control" type="time"
							   id="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   name="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   placeholder="" value="<?php echo $valor;?>">
					</div>
				<?php endfor; ?>

			</div>
			<br>
			<div class="d-flex w-100">
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
			</div>
			<div class="d-flex w-100"><!-- Si/No -->
				<?php for($i=11; $i<13; $i++): ?>
					<?php

					$prg = (array) $rpm[$pregunta->codigo_pregunta];
					//echo "<br>";
					//var_dump($prg);
					$valmesa = $prg['m'.$i];
					if(mb_strlen($valmesa) === 0){
						$valor='';
					}
					else{
						$valor = $prg['m'.$i];
					}

					?>
					<div class="col-6 border">
						<input class="form-control" type="time"
							   id="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   name="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   placeholder="" value="<?php echo $valor;?>"
						>
					</div>
				<?php endfor; ?>

			</div>



		</div>




	<?php elseif ($pregunta->restriccion_departamento == 1): //Alternativa ?>

		<?php if($iddepartamento == 1): //LP?>


		<?php elseif ($iddepartamento == 2): //SCZ ?>

		<?php elseif ($iddepartamento == 3): //OR ?>

		<?php elseif ($iddepartamento == 4): //CBBA ?>


		<?php elseif ($iddepartamento == 5): //CHUQ ?>


		<?php elseif ($iddepartamento == 6): //TARIJA ?>


		<?php elseif ($iddepartamento == 7): //BENI ?>


		<?php elseif ($iddepartamento == 8): //PANDO ?>


		<?php elseif ($iddepartamento == 9): //POTOSI ?>


		<?php else: ?>

		<?php endif; ?>

	<?php endif; ?>

<?php elseif ($idhoja_preguntas == 2): //Hoja 2?>

	<?php if($pregunta->restriccion_departamento == 0): //Sin restriccionn a departamento ?>


		<div class="form-group">
			<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
				   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
			>
		</div>
		<div class="form-group">
			<div class="container mt-3">
				<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta->nombre_pregunta; ?>
				<!-- Mensaje  -->
				<?php if( !empty($pregunta->info_pregunta) ): ?>
					<div class="alert alert-success">
						<strong>Informacion! </strong> <?php echo $pregunta->info_pregunta; ?>
					</div>
				<?php endif; ?>
				<!-- fin de Mensaje  -->
			</div>
			<br>
			<div class="d-flex w-100"> <!-- Rotulo -->
				<div class="col-6 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
			</div>
			<div class="d-flex w-100"> <!-- Si/no -->
				<?php for($i=1; $i<3; $i++): ?>
					<?php

					$prg = (array) $rpm[$pregunta->codigo_pregunta];
					//echo "<br>";
					//var_dump($prg);
					$valmesa = $prg['m'.$i];
					if(mb_strlen($valmesa) === 0){
						$valor='';
					}
					else{
						$valor = $prg['m'.$i];
					}

					?>
					<div class="col-6 border">
						<input class="form-control " type="time"
							   id="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   name="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   placeholder="" value="<?php echo $valor;?>" >
					</div>
				<?php endfor; ?>
			</div>
			<br>
			<div class="d-flex w-100"> <!-- Rotulo -->
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
				<div class="col-6 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
			</div>
			<div class="d-flex w-100"> <!-- Si/no -->
				<?php for($i=3; $i<5; $i++): ?>
					<?php

					$prg = (array) $rpm[$pregunta->codigo_pregunta];
					//echo "<br>";
					//var_dump($prg);
					$valmesa = $prg['m'.$i];
					if(mb_strlen($valmesa) === 0){
						$valor='';
					}
					else{
						$valor = $prg['m'.$i];
					}

					?>
					<div class="col-6 border">
						<input class="form-control " type="time"
							   id="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   name="<?php echo $pregunta->codigo_pregunta."-mesa".$i; ?>"
							   placeholder="" value="<?php echo $valor; ?>" >
					</div>
				<?php endfor; ?>
			</div>
			<br>



		</div>



	<?php elseif ($pregunta->restriccion_departamento == 1): //Alternativa ?>

		<?php if($iddepartamento == 1): //LP?>


		<?php elseif ($iddepartamento == 2): //SCZ ?>

		<?php elseif ($iddepartamento == 3): //OR ?>

		<?php elseif ($iddepartamento == 4): //CBBA ?>


		<?php elseif ($iddepartamento == 5): //CHUQ ?>


		<?php elseif ($iddepartamento == 6): //TARIJA ?>


		<?php elseif ($iddepartamento == 7): //BENI ?>


		<?php elseif ($iddepartamento == 8): //PANDO ?>


		<?php elseif ($iddepartamento == 9): //POTOSI ?>


		<?php else: ?>

		<?php endif; ?>

	<?php endif; ?>



<?php endif;?>
