<?php if($idhoja_preguntas == 1): //Hoja 1?>

<?php elseif ($idhoja_preguntas == 2): //Hoja 2?>


	<?php //echo "BASE";?>
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
					<div class="col-3 border">

						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input"
								   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
								   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
								   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
							<label class="custom-control-label"
								   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input"
								   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
								   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
								   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="checkbox" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
									<label class="custom-control-label"
										   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="checkbox" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="checkbox" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
									<label class="custom-control-label"
										   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="checkbox" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="checkbox" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
									<label class="custom-control-label"
										   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="checkbox" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="checkbox" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
									<label class="custom-control-label"
										   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="checkbox" class="custom-control-input"
										   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
										   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
										   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'1'; ?>">
								<label class="custom-control-label"
									   for="<?php  echo $pregunta->codigo_pregunta.'-'."mesa".$i.'s'; ?>">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="checkbox" class="custom-control-input"
									   id="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'n'; ?>"
									   name="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i; ?>[]"
									   value="<?php echo $pregunta->codigo_pregunta.'-'."mesa".$i.'-'.'2'; ?>">
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
