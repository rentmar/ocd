<?php //echo "Respuesta tipo 6"; ?>
<?php //var_dump($pregunta);?>
<?php //var_dump($respuestas); ?>

<?php if($idhoja_preguntas == 1): //Hoja 1?>

	<?php
	$respuestas_array = (array) $respuestas;
	$rpt = $respuestas_array[$pregunta->codigo_pregunta];
	$rpm = (array)$respuestas;
//var_dump($rpt);
	?>
	<?php $datos_pregunta['mesas'] = $mesas;  ?>
	<?php $datos_pregunta['respuestas'] = $respuestas; ?>
	<?php $datos_pregunta['pregunta']= $pregunta ;?>
	<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>

	<?php //echo "Hoja1"; ?>

	<?php if($pregunta->restriccion_departamento == 0): //Sin restriccionn a departamento ?>
		<!--<div class="form-group">
			<?php //var_dump($pregunta);?>
			<?php  //var_dump($respuesta); ?>
			<?php echo "sin restriccion";?>
		</div>-->
		<!--- Insertar la plantilla de radio buttons --->
		<?php $this->load->view('interfaz/opciones/radio-2', $datos_pregunta ); ?>


	<?php elseif ($pregunta->restriccion_departamento == 1): //Alternativa ?>

			<?php //echo "departamento: ".$iddepartamento;?>
			<?php //echo "idpregunta: ".$pregunta->idpregunta; ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<?php $datos_pregunta['$pregunta_alt'] = $pregunta_alt; ?>
			<?php if($iddepartamento == 1): //LP?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>

						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									   <?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>

				</div>
			</div>


			<?php elseif ($iddepartamento == 2): //SCZ ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>

				</div>


			</div>



		<?php elseif ($iddepartamento == 3): //OR ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>

				</div>


			</div>


		<?php elseif ($iddepartamento == 4): //CBBA ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<?php echo "cochabamba"; ?>
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>

				</div>


			</div>
		<?php elseif ($iddepartamento == 5): //CHUQ ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>

				</div>


			</div>


		<?php elseif ($iddepartamento == 6): //TARIJA ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>

				</div>


			</div>


		<?php elseif ($iddepartamento == 7): //BENI ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>

				</div>


			</div>


		<?php elseif ($iddepartamento == 8): //PANDO ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"

									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label
									<?php echo $bcheck; ?>
								>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"

									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>

				</div>


			</div>


		<?php elseif ($iddepartamento == 9): //POTOSI ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>" <?php echo $acheck; ?> >
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>

								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
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
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>" <?php echo $acheck; ?> >
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>" <?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>

				</div>


			</div>
		<?php endif; ?>


		<?php endif;?>

<?php elseif ($idhoja_preguntas == 2): //Hoja 2?>

	<?php


	$respuestas_array = (array) $respuestas;
	$rpt = $respuestas_array[$pregunta->codigo_pregunta];
	$rpm = (array)$respuestas;
//var_dump($rpt);
	?>

	<?php if($pregunta->restriccion_departamento == 0): //Sin restriccionn a departamento ?>
		<!--<div class="form-group">
			<?php /*var_dump($pregunta);*/?>
		</div>-->
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
				<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
				<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
				<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
				<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
			</div>
			<div class="d-flex w-100"> <!-- Si/no -->
				<?php for($i=1; $i<5; $i++): ?>
					<?php
					$prg = (array) $rpm[$pregunta->codigo_pregunta];
					//echo "<br>";
					//var_dump($prg);
					$valmesa = $prg['m'.$i];
					if(mb_strlen($valmesa) === 0){
						$acheck = '';
						$bcheck = '';
					}
					else{

						//echo $valmesa;
						if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
						{
							$acheck = 'checked';
							$bcheck ='';
						}else {
							$acheck = '';
							$bcheck ='checked';
						}
					}
					?>
					<div class="col-3 border">
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input"
								   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
								   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
								   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
							>
							<label class="custom-control-label"
								   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input"
								   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
								   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
								   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
								<?php echo $bcheck;?>
							>
							<label class="custom-control-label"
								   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
						</div>
					</div>
				<?php endfor; ?>
			</div>
			<br>

		</div>



	<?php elseif ($pregunta->restriccion_departamento == 1): //Alternativa ?>
		<?php //echo "departamento: ".$iddepartamento;?>
		<?php //echo "idpregunta: ".$pregunta->idpregunta; ?>
		<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>

		<?php if($iddepartamento == 1): //LP?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck;?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>
				</div>
				<br>
			</div>


		<?php elseif ($iddepartamento == 2): //SCZ ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
										<?php echo $bcheck;?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>
				</div>
			</div>



		<?php elseif ($iddepartamento == 3): //OR ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>
				</div>
				<br>


			</div>


		<?php elseif ($iddepartamento == 4): //CBBA ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
										<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>
				</div>
				<br>
			</div>

		<?php elseif ($iddepartamento == 5): //CHUQ ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
										<?php echo $bcheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>
				</div>
				<br>

			</div>


		<?php elseif ($iddepartamento == 6): //TARIJA ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck;?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>
				</div>
				<br>

			</div>


		<?php elseif ($iddepartamento == 7): //BENI ?>

			<?php echo $pregunta->idpregunta;?>
			<?php if($pregunta->idpregunta == 43): ?>

				<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
				<div class="form-group">
					<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
						   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
					>
				</div>
				<div class="form-group">
					<div class="container mt-3">
						<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100"> <!-- Si/no -->
						<?php for($i=1; $i<5; $i++): ?>
							<?php
							$prg = (array) $rpm[$pregunta->codigo_pregunta];
							//echo "<br>";
							//var_dump($prg);
							$valmesa = $prg['m'.$i];
							if(mb_strlen($valmesa) === 0){
								$acheck = '';
								$bcheck = '';
							}
							else{

								//echo $valmesa;
								if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
								{
									$acheck = 'checked';
									$bcheck ='';
								}else {
									$acheck = '';
									$bcheck ='checked';
								}
							}
							?>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
										<?php echo $acheck; ?>
									>
									<label class="custom-control-label"
										   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
										<?php echo $bcheck;?>
									>
									<label class="custom-control-label"
										   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
								</div>
							</div>
						<?php endfor; ?>
					</div>
					<br>

				</div>




			<?php elseif ($pregunta->idpregunta == 34): ?>

				<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
				<div class="form-group">
					<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
						   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
					>
				</div>
				<div class="form-group">
					<div class="container mt-3">
						<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100"> <!-- Si/no -->
						<?php for($i=1; $i<5; $i++): ?>
							<?php
							$prg = (array) $rpm[$pregunta->codigo_pregunta];
							//echo "<br>";
							//var_dump($prg);
							$valmesa = $prg['m'.$i];
							if(mb_strlen($valmesa) === 0){
								$acheck = '';
								$bcheck = '';
							}
							else{

								//echo $valmesa;
								if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
								{
									$acheck = 'checked';
									$bcheck ='';
								}else {
									$acheck = '';
									$bcheck ='checked';
								}
							}
							?>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
										<?php echo $acheck; ?>
									>
									<label class="custom-control-label"
										   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
										<?php echo $bcheck;?>
									>
									<label class="custom-control-label"
										   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
								</div>
							</div>
						<?php endfor; ?>
					</div>
					<br>

				</div>




			<?php else: ?>

				<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
				<div class="form-group">
					<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
						   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
					>
				</div>
				<div class="form-group">
					<div class="container mt-3">
						<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
						<!-- Mensaje  -->
						<?php if( !empty($pregunta->info_pregunta) ): ?>
							<div class="alert alert-success">
								<strong>Informacion! </strong> <?php echo $pregunta->info_pregunta; ?>
							</div>
						<?php endif; ?>
						<!-- fin de Mensaje  -->
					</div>
					<br>

				</div>
			<?php endif; ?>




		<?php elseif ($iddepartamento == 8): //PANDO ?>
			<?php if($pregunta->idpregunta == 43): ?>

				<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
				<div class="form-group">
					<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
						   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
					>
				</div>
				<div class="form-group">
					<div class="container mt-3">
						<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100"> <!-- Si/no -->
						<?php for($i=1; $i<5; $i++): ?>
							<?php
							$prg = (array) $rpm[$pregunta->codigo_pregunta];
							//echo "<br>";
							//var_dump($prg);
							$valmesa = $prg['m'.$i];
							if(mb_strlen($valmesa) === 0){
								$acheck = '';
								$bcheck = '';
							}
							else{

								//echo $valmesa;
								if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
								{
									$acheck = 'checked';
									$bcheck ='';
								}else {
									$acheck = '';
									$bcheck ='checked';
								}
							}
							?>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
										<?php echo $acheck; ?>
									>
									<label class="custom-control-label"
										   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
										<?php echo $bcheck;?>
									>
									<label class="custom-control-label"
										   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
								</div>
							</div>
						<?php endfor; ?>
					</div>
					<br>

				</div>




			<?php elseif ($pregunta->idpregunta == 34): ?>

				<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
				<div class="form-group">
					<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
						   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
					>
				</div>
				<div class="form-group">
					<div class="container mt-3">
						<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100"> <!-- Si/no -->
						<?php for($i=1; $i<5; $i++): ?>
							<?php
							$prg = (array) $rpm[$pregunta->codigo_pregunta];
							//echo "<br>";
							//var_dump($prg);
							$valmesa = $prg['m'.$i];
							if(mb_strlen($valmesa) === 0){
								$acheck = '';
								$bcheck = '';
							}
							else{

								//echo $valmesa;
								if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
								{
									$acheck = 'checked';
									$bcheck ='';
								}else {
									$acheck = '';
									$bcheck ='checked';
								}
							}
							?>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
										<?php echo $acheck; ?>
									>
									<label class="custom-control-label"
										   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
											<?php echo $bcheck;?>
									>
									<label class="custom-control-label"
										   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
								</div>
							</div>
						<?php endfor; ?>
					</div>
					<br>

				</div>




			<?php else: ?>

				<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
				<div class="form-group">
					<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
						   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
					>
				</div>
				<div class="form-group">
					<div class="container mt-3">
						<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
						<!-- Mensaje  -->
						<?php if( !empty($pregunta->info_pregunta) ): ?>
							<div class="alert alert-success">
								<strong>Informacion! </strong> <?php echo $pregunta->info_pregunta; ?>
							</div>
						<?php endif; ?>
						<!-- fin de Mensaje  -->
					</div>
					<br>

				</div>
			<?php endif; ?>
		<?php elseif ($iddepartamento == 9): //POTOSI ?>
			<?php $pregunta_alt = $this->Interfaz_model->preguntaAlternativa($pregunta->idpregunta, $iddepartamento); ?>
			<div class="form-group">
				<input type="hidden" id="<?php echo $pregunta->codigo_pregunta;?>" name="<?php echo $pregunta->codigo_pregunta; ?>"
					   class="form-control" value="<?php echo $pregunta->codigo_pregunta; ?>"
				>
			</div>
			<div class="form-group">
				<div class="container mt-3">
					<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta_alt->nombre_pregunta; ?>
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
					<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
					<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
				</div>
				<div class="d-flex w-100"> <!-- Si/no -->
					<?php for($i=1; $i<5; $i++): ?>
						<?php
						$prg = (array) $rpm[$pregunta->codigo_pregunta];
						//echo "<br>";
						//var_dump($prg);
						$valmesa = $prg['m'.$i];
						if(mb_strlen($valmesa) === 0){
							$acheck = '';
							$bcheck = '';
						}
						else{

							//echo $valmesa;
							if($valmesa == $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1')
							{
								$acheck = 'checked';
								$bcheck ='';
							}else {
								$acheck = '';
								$bcheck ='checked';
							}
						}
						?>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>"
									<?php echo $acheck; ?>
								>
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>"
									<?php echo $bcheck;?>
								>
								<label class="custom-control-label"
									   for="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>">no</label>
							</div>
						</div>
					<?php endfor; ?>
				</div>
				<br>



			</div>
		<?php endif; ?>


	<?php endif;?>




<?php endif; ?>
