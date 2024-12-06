<main>
	<br><br>
	<?php echo validation_errors(); ?>
	<?php
	/** @noinspection PhpLanguageLevelInspection */
	$atr_form =[
		'id' => 'formulario_ej2024_h2' ,
	]
	;?>
	<?php echo form_open('EleccionesJudiciales2024/procesarHoja2', $atr_form);?>

	<div class="contenedores_divididos">
		<div class="contenedor_superior2" id="contenedor_pequeño">
		</div>
		<div class="contenedor_inferior">
			<h3 id="Título_formulario"> Cierre, Cómputo y Escrutinio </h3>
		</div>
	</div>

	<div>
		<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $usuario->id; ?>">
	</div>
	<br>

	<div class="contenedores">
		<form class="card">
			<div class="card-header cuest2">
				<h4 class="text-white">Informacion General</h4>
			</div>
			<div class="card-body font-weight-normal">
				<form id="ej-c1-secc1" name="ej-c1-secc1">
					<div class="form-group">
						<label for="departamento">Departamento:</label><br>
						<input type="text" id="" name="" class="form-control"
							   value="<?php if(isset($departamento->nombre_departamento)){ echo $departamento->nombre_departamento;} ?>" readonly required>
					</div>
					<div class="form-group">
						<label for="municipio">Municipio:</label><br>
						<input type="text" id="" name="" class="form-control"
							   value="<?php if(isset($municipio->nombre_muncipio)){ echo $municipio->nombre_muncipio;  } ?>" readonly required>
					</div>

					<div class="form-group">
						<label for="recinto">Recinto Electoral:</label><br>
						<input type="text" id="recinto" name="recinto" required class="form-control"
							   value="<?php if(isset($recinto->nombre_re)){ echo $recinto->nombre_re;} ?>" readonly >
					</div>

					<div>
						<div class="container mt-3">
							Identifique los números de mesas con las que trabajará durante el día.
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary ">
								<label class="text-primary" for="">Mesa 1</label>
							</div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<input class="form-control" type="text" id="" name=""
									   value="<?php if(isset($mesas->m1)){ echo $mesas->m1;} ?>" placeholder="No de mesa" readonly>
							</div>
						</div>
						<br>
					</div>

			</div>
			<div class="card-footer">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-c2-secgeneral">
					<i class="fas fa-save"></i>
				</button>
			</div>
		</form>
	</div>
	</div>
	<br>

<?php if($hoja2->esta_iniciado == 1): ?>
	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4 class="text-white" >Mesas Adicionales</h4>
			</div>
			<div class="card-body font-weight-normal">
				<div>
					<div class="container mt-3">
						Registre las mesas adicionales
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary ">
							<label class="text-primary" for="">Mesa 2</label>
						</div>
						<div class="col-3 border border-primary">
							<label class="text-primary" for="">Mesa 3</label>
						</div>
						<div class="col-3 border border-primary">
							<label class="text-primary" for="">Mesa 4</label>
						</div>
						<div class="col-3 border border-primary">
							<label class="text-primary" for="">Mesa 5</label>
						</div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" type="text" id="" name="" placeholder="No de mesa" >
						</div>
						<div class="col-3 border">
							<input class="form-control" type="text" id="" name="" placeholder="No de mesa" >
						</div>
						<div class="col-3 border">
							<input class="form-control" type="text" id="" name="" placeholder="No de mesa" >
						</div>
						<div class="col-3 border">
							<input class="form-control" type="text" id="" name="" placeholder="No de mesa" >
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary">
							<label class="text-primary" for="">Mesa 6</label>
						</div>
						<div class="col-3 border border-primary">
							<label class="text-primary" for="">Mesa 7</label>
						</div>
						<div class="col-3 border border-primary">
							<label class="text-primary" for="">Mesa 8</label>
						</div>
						<div class="col-3 border border-primary">
							<label class="text-primary" for="">Mesa 9</label>
						</div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" type="text" id="" name="" placeholder="No de mesa">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="text" id="" name="" placeholder="No de mesa">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="text" id="" name="" placeholder="No de mesa">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="text" id="" name="" placeholder="No de mesa">
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary">
							<label class="text-primary" for="">Mesa 10</label>
						</div>
						<div class="col-3 border border-primary">
							<label class="text-primary" for="">Mesa 11</label>
						</div>
						<div class="col-3 border border-primary">
							<label class="text-primary" for="">Mesa 12</label>
						</div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" type="text" id="" name="" placeholder="No de mesa">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="text" id="" name="" placeholder="No de mesa">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="text" id="" name="" placeholder="No de mesa">
						</div>
					</div>
				</div>

			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">
					<i class="fas fa-save"></i>
				</button>
			</div>


		</div>


	</div>
	<br>
<?php endif;?>

<?php if($hoja2->esta_iniciado == 1): ?>
	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4 class="text-white">Cierre</h4>
			</div>
			<div class="card-body font-weight-normal">
				<div class="form-group">
					<div class="container mt-3">
						1. ¿A qué hora cerró la mesa de votación?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>

					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>

					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" type="time" id="" name="" placeholder="">
						</div>
					</div>


				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						2. ¿Se quedaron ciudadanos sin votar después del cierre de la mesa?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio9">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio210">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio212">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio214">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio216">no</label>
							</div>


						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio17">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio218">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio220">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio222">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio224">no</label>
							</div>

						</div>
					</div>


				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						3. ¿Cuántos ciudadanos estaban habilitados para votar? (Ver la lista de persona habilitadas)
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>

					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>

					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>

					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						4. ¿Cuántos ciudadanos emitieron su voto? (Ver la lista de persona habilitadas)
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>

					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>

					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>

					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="0" max="100" step="1" value="0" type="number" id="" name="" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">
					<i class="fas fa-save"></i>
				</button>
			</div>
		</div>

	</div>
	<br>
<?php endif;?>
<?php if($hoja2->esta_iniciado == 1): ?>
	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4 class="text-white">Escrutinio</h4>
			</div>
			<div class="card-body font-weight-normal">
				<div class="form-group">
					<div class="container mt-3">
						5. ¿Se anularon las papeletas de sufragio no utilizadas escribiendo en ellas la palabra “ANULADO”?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio9">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio210">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio212">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio214">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio216">no</label>
							</div>


						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio17">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio218">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio220">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio222">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio224">no</label>
							</div>

						</div>
					</div>

				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						6. ¿Se anularon los certificados de sufragio no entregados con el sello “NO VOTÓ”?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio9">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio210">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio212">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio214">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio216">no</label>
							</div>


						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio17">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio218">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio220">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio222">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio224">no</label>
							</div>

						</div>
					</div>




				</div>
				<br><br>

				<div class="form-group">
					<div class="container mt-3">
						7. ¿El presidente de la mesa vació el ánfora DEPARTAMENTAL y contó las papeletas (con ayuda del secretario) sin desdoblarlas?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio9">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio210">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio212">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio214">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio216">no</label>
							</div>


						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio17">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio218">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio220">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio222">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio224">no</label>
							</div>

						</div>
					</div>




				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						8. ¿El presidente de la mesa enumeró las papeletas DEPARTAMENTALES en el espacio en blanco del reverso?

					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio9">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio210">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio212">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio214">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio216">no</label>
							</div>


						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio17">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio218">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio220">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio222">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio224">no</label>
							</div>

						</div>
					</div>




				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						9. ¿El número de papeletas en el ánfora DEPARTAMENTAL coincidió con el número de ciudadanos que votaron?

						<div class="alert alert-info">
							<strong>Info!</strong> En caso de respuesta negativa explicar cómo se procedió en la casilla de observaciones indicando el número de mesa
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio9">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio210">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio212">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio214">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio216">no</label>
							</div>


						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio17">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio218">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio220">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio222">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio224">no</label>
							</div>

						</div>
					</div>




				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						10. ¿El presidente de la mesa vació el ánfora NACIONAL y contó las papeletas (con ayuda del secretario) sin desdoblarlas?

					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio9">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio210">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio212">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio214">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio216">no</label>
							</div>


						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio17">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio218">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio220">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio222">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio224">no</label>
							</div>

						</div>
					</div>




				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						11. ¿El presidente de la mesa enumeró las papeletas NACIONAL en el espacio en blanco del reverso?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio9">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio210">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio212">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio214">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio216">no</label>
							</div>


						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio17">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio218">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio220">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio222">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio224">no</label>
							</div>

						</div>
					</div>




				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						12. ¿El número de papeletas en el ánfora NACIONAL coincidió con el número de ciudadanos que votaron?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio9">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio210">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio212">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio214">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio216">no</label>
							</div>


						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio17">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio218">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio220">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio222">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio224">no</label>
							</div>

						</div>
					</div>




				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						13. ¿El número de papeletas en el ánfora NACIONAL coincidió con el número de ciudadanos que votaron?
						<div class="alert alert-info">
							<strong>Info!</strong> En caso de respuesta negativa explicar cómo se procedió en la casilla de observaciones indicando el número de mesa
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio9">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio210">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio212">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio214">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio216">no</label>
							</div>


						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio17">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio218">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio220">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio222">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio224">no</label>
							</div>

						</div>
					</div>




				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						14. ¿Se encontraron papeletas en el ánfora que no correspondía?
						<div class="alert alert-info">
							<strong>Info!</strong> En caso de respuesta positiva explicar cómo se procedió en la casilla de observaciones indicando el número de mesa
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio9">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio210">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio212">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio214">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio216">no</label>
							</div>


						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio17">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio218">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio220">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio222">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio224">no</label>
							</div>

						</div>
					</div>





				</div>
				<br><br>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">
					<i class="fas fa-save"></i>
				</button>
			</div>
		</div>

	</div>
	<br>
<?php endif; ?>
	<?php if($hoja2->esta_iniciado == 1): ?>
		<div class="contenedores">
			<div class="card">
				<div class="card-header cuest2">
					<h4 class="text-white">Escrutinio</h4>
				</div>
				<div class="card-body font-weight-normal">
					<div class="form-group">
						<div class="container mt-3">
							15. ¿Se inició el conteo de votos por el Tribunal Supremo de Justicia, leyendo primero los votos en la franja de candidatas mujeres, a continuación la franja de candidatos varones y se concluyó con la lectura de los votos para el Tribunal Constitucional Plurinacional?
							<div class="alert alert-info">
								<strong>Info!</strong>En caso de respuesta negativa explicar cómo se procedió en la casilla de observaciones indicando el número de mesa
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
									<label class="custom-control-label" for="customRadio">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
									<label class="custom-control-label" for="customRadio2">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio3">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio24">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio5">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio26">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio7">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio28">no</label>
								</div>
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio9">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio210">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio11">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio212">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio13">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio214">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio15">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio216">no</label>
								</div>


							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio17">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio218">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio19">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio220">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio21">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio222">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio23">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio224">no</label>
								</div>

							</div>
						</div>

					</div>
					<br><br>
					<div class="form-group">
						<div class="container mt-3">
							16. Una vez concluido el conteo de los votos de circunscripción departamental ¿Se contaron los votos del Tribunal Agroambiental y a continuación los votos del Consejo de la Magistratura?
							<div class="alert alert-info">
								<strong>Info!</strong> En caso de respuesta negativa explicar cómo se procedió en la casilla de observaciones indicando el número de mesa
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
									<label class="custom-control-label" for="customRadio">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
									<label class="custom-control-label" for="customRadio2">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio3">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio24">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio5">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio26">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio7">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio28">no</label>
								</div>
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio9">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio210">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio11">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio212">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio13">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio214">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio15">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio216">no</label>
								</div>


							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio17">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio218">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio19">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio220">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio21">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio222">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio23">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio224">no</label>
								</div>

							</div>
						</div>




					</div>
					<br><br>
					<div class="form-group">
						<div class="container mt-3">
							17. Una vez concluido el conteo de votos para las instancias departamental y/o nacional:
							(En caso de respuesta negativa explicar cómo se procedió en la casilla de observaciones indicando el número de mesa
							)
						</div>
					</div>
					<div class="form-group">
						<div class="container mt-3">
							17-a).¿El secretario anunció en voz alta los resultados señalando el número de electores habilitados en la mesa de sufragio?
						</div>

					</div>
					<div class="form-group">
						<div class="container mt-3">
							17-b). ¿El secretario anunció en voz alta el número de ciudadanos que emitieron su voto?
						</div>

					</div>
					<div class="form-group">
						<div class="container mt-3">
							17-c).¿El secretario anunció en voz alta el número de votos en blanco en cada una de las instancias?
						</div>

					</div>
					<div class="form-group">
						<div class="container mt-3">
							17-d).¿El secretario anunció en voz alta el número de votos nulos en cada una de las instancias?
						</div>

					</div>
					<div class="form-group">
						<div class="container mt-3">
							17-e).¿El secretario anunció en voz alta la cantidad de votos válidos por cada candidato en cada una de las instancias?
						</div>

					</div>


					<div class="form-group">
						<div class="container mt-3">
							17-f) ¿El secretario anunció en voz alta los resultados señalando el número de electores habilitados en la mesa de sufragio?
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
									<label class="custom-control-label" for="customRadio">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
									<label class="custom-control-label" for="customRadio2">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio3">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio24">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio5">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio26">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio7">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio28">no</label>
								</div>
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio9">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio210">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio11">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio212">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio13">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio214">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio15">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio216">no</label>
								</div>


							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio17">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio218">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio19">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio220">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio21">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio222">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio23">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio224">no</label>
								</div>

							</div>
						</div>




					</div>
					<br><br>
					<div class="form-group">
						<div class="container mt-3">
							18. ¿La suma de votos nulos, blancos y válidos de cada instancia coincidió con el total de ciudadanos que votaron en la mesa?
							(En caso de respuesta negativa explicar en la casilla de observaciones indicando el número de mesa)

						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
									<label class="custom-control-label" for="customRadio">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
									<label class="custom-control-label" for="customRadio2">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio3">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio24">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio5">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio26">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio7">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio28">no</label>
								</div>
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio9">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio210">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio11">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio212">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio13">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio214">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio15">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio216">no</label>
								</div>


							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio17">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio218">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio19">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio220">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio21">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio222">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio23">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio224">no</label>
								</div>

							</div>
						</div>




					</div>
					<br><br>
					<div class="form-group">
						<div class="container mt-3">
							19. ¿Se llenó una hoja de trabajo por cada instancia y dos en el caso del Tribunal Supremos de Justicia, sumando un total de 5 hojas de trabajo?

							<div class="alert alert-info">
								<strong>Info!</strong> 														En caso de respuesta negativa explicar en la casilla de observaciones indicando el número de mesa

							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
									<label class="custom-control-label" for="customRadio">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
									<label class="custom-control-label" for="customRadio2">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio3">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio24">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio5">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio26">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio7">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio28">no</label>
								</div>
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio9">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio210">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio11">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio212">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio13">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio214">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio15">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio216">no</label>
								</div>


							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio17">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio218">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio19">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio220">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio21">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio222">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio23">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio224">no</label>
								</div>

							</div>
						</div>




					</div>
					<br><br>
					<div class="form-group">
						<div class="container mt-3">
							10. ¿El presidente de la mesa vació el ánfora NACIONAL y contó las papeletas (con ayuda del secretario) sin desdoblarlas?

						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
									<label class="custom-control-label" for="customRadio">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
									<label class="custom-control-label" for="customRadio2">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio3">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio24">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio5">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio26">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio7">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio28">no</label>
								</div>
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio9">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio210">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio11">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio212">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio13">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio214">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio15">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio216">no</label>
								</div>


							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio17">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio218">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio19">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio220">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio21">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio222">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio23">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio224">no</label>
								</div>

							</div>
						</div>




					</div>
					<br><br>
					<div class="form-group">
						<div class="container mt-3">
							11. ¿El presidente de la mesa enumeró las papeletas NACIONAL en el espacio en blanco del reverso?
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
									<label class="custom-control-label" for="customRadio">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
									<label class="custom-control-label" for="customRadio2">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio3">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio24">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio5">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio26">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio7">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio28">no</label>
								</div>
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio9">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio210">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio11">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio212">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio13">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio214">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio15">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio216">no</label>
								</div>


							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio17">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio218">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio19">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio220">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio21">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio222">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio23">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio224">no</label>
								</div>

							</div>
						</div>




					</div>
					<br><br>
					<div class="form-group">
						<div class="container mt-3">
							12. ¿El número de papeletas en el ánfora NACIONAL coincidió con el número de ciudadanos que votaron?
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
									<label class="custom-control-label" for="customRadio">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
									<label class="custom-control-label" for="customRadio2">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio3">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio24">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio5">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio26">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio7">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio28">no</label>
								</div>
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio9">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio210">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio11">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio212">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio13">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio214">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio15">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio216">no</label>
								</div>


							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio17">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio218">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio19">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio220">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio21">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio222">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio23">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio224">no</label>
								</div>

							</div>
						</div>




					</div>
					<br><br>
					<div class="form-group">
						<div class="container mt-3">
							13. ¿El número de papeletas en el ánfora NACIONAL coincidió con el número de ciudadanos que votaron?
							<div class="alert alert-info">
								<strong>Info!</strong> En caso de respuesta negativa explicar cómo se procedió en la casilla de observaciones indicando el número de mesa
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
									<label class="custom-control-label" for="customRadio">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
									<label class="custom-control-label" for="customRadio2">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio3">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio24">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio5">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio26">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio7">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio28">no</label>
								</div>
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio9">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio210">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio11">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio212">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio13">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio214">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio15">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio216">no</label>
								</div>


							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio17">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio218">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio19">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio220">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio21">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio222">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio23">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio224">no</label>
								</div>

							</div>
						</div>




					</div>
					<br><br>
					<div class="form-group">
						<div class="container mt-3">
							14. ¿Se encontraron papeletas en el ánfora que no correspondía?
							<div class="alert alert-info">
								<strong>Info!</strong> En caso de respuesta positiva explicar cómo se procedió en la casilla de observaciones indicando el número de mesa
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1: <?php if(isset($mesas->m1)){ echo $mesas->m1;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2: <?php if(isset($mesas->m2)){ echo $mesas->m2;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3: <?php if(isset($mesas->m3)){ echo $mesas->m3;} ?> </label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4: <?php if(isset($mesas->m4)){ echo $mesas->m4;} ?> </label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio" name="" value="customEx">
									<label class="custom-control-label" for="customRadio">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio2" name="" value="customEx">
									<label class="custom-control-label" for="customRadio2">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio3">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio24" name="example1" value="customEx">
									<label class="custom-control-label" for="customRadio24">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio5">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio26" name="example20" value="customEx">
									<label class="custom-control-label" for="customRadio26">no</label>
								</div>
							</div>
							<div class="col-3 border">

								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio7">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio28" name="example355" value="customEx">
									<label class="custom-control-label" for="customRadio28">no</label>
								</div>
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5: <?php if(isset($mesas->m5)){ echo $mesas->m5;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6: <?php if(isset($mesas->m6)){ echo $mesas->m6;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7: <?php if(isset($mesas->m7)){ echo $mesas->m7;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8: <?php if(isset($mesas->m8)){ echo $mesas->m8;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio9" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio9">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio210" name="example47" value="customEx">
									<label class="custom-control-label" for="customRadio210">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio11">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio212" name="example15" value="customEx">
									<label class="custom-control-label" for="customRadio212">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio13">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio214" name="example2" value="customEx">
									<label class="custom-control-label" for="customRadio214">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio15">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio216" name="example3" value="customEx">
									<label class="custom-control-label" for="customRadio216">no</label>
								</div>


							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9: <?php if(isset($mesas->m9)){ echo $mesas->m9;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10: <?php if(isset($mesas->m10)){ echo $mesas->m10;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11: <?php if(isset($mesas->m11)){ echo $mesas->m11;} ?></label></div>
							<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12: <?php if(isset($mesas->m12)){ echo $mesas->m12;} ?></label></div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio17" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio17">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio218" name="example4" value="customEx">
									<label class="custom-control-label" for="customRadio218">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio19">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio220" name="example5" value="customEx">
									<label class="custom-control-label" for="customRadio220">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio21">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio222" name="example6" value="customEx">
									<label class="custom-control-label" for="customRadio222">no</label>
								</div>

							</div>
							<div class="col-3 border">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio23">si</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio224" name="example7" value="customEx">
									<label class="custom-control-label" for="customRadio224">no</label>
								</div>

							</div>
						</div>





					</div>
					<br><br>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success">
						<i class="fas fa-save"></i>
					</button>
				</div>
			</div>

		</div>
		<br>
	<?php endif; ?>



<?php if($hoja2->esta_iniciado == 1): ?>
	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4 class="text-white">Cierre</h4>
			</div>
			<div class="card-body font-weight-normal">
				<div class="form-group">
					<label for="pregunta_csej33">
						33. ¿El escrutinio y conteo de votos fue público?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej33a" name="pregunta_csej33" value="1">
						<label class="custom-control-label" for="pregunta_csej33a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej33b" name="pregunta_csej33" value="0">
						<label class="custom-control-label" for="pregunta_csej33b">No</label>
					</div>


				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej34">
						34. ¿Hubo algún problema en la organización y desarrollo del escrutinio y conteo de votos?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej34a" name="pregunta_csej34" value="1">
						<label class="custom-control-label" for="pregunta_csej34a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej34b" name="pregunta_csej34" value="0">
						<label class="custom-control-label" for="pregunta_csej34b">No</label>
					</div>


				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej35">
						35. ¿Hubo reclamos sobre el conteo de la votación para los diferentes candidatos?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej35a" name="pregunta_csej35" value="1">
						<label class="custom-control-label" for="pregunta_csej35a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej35b" name="pregunta_csej35" value="0">
						<label class="custom-control-label" for="pregunta_csej35b">No</label>
					</div>


				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej36">
						36. En general ¿Cómo califica el trabajo de los notarios en su centro de votación?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej36a" name="pregunta_csej36" value="1">
						<label class="custom-control-label" for="pregunta_csej36a">Muy bueno</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej36b" name="pregunta_csej36" value="2">
						<label class="custom-control-label" for="pregunta_csej36b">Bueno</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej36c" name="pregunta_csej36" value="3">
						<label class="custom-control-label" for="pregunta_csej36c">Regular</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej36d" name="pregunta_csej36" value="4">
						<label class="custom-control-label" for="pregunta_csej36d">Malo</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej36e" name="pregunta_csej36" value="5">
						<label class="custom-control-label" for="pregunta_csej36e">Pésimo</label>
					</div>

				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej37">
						37. En general ¿Cómo califica el trabajo de los jurados en su centro de votación?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej37a" name="pregunta_csej37" value="1">
						<label class="custom-control-label" for="pregunta_csej37a">Muy bueno</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej37b" name="pregunta_csej37" value="2">
						<label class="custom-control-label" for="pregunta_csej37b">Bueno</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej37c" name="pregunta_csej37" value="3">
						<label class="custom-control-label" for="pregunta_csej37c">Regular</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej37d" name="pregunta_csej37" value="4">
						<label class="custom-control-label" for="pregunta_csej37d">Malo</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej37e" name="pregunta_csej37" value="5">
						<label class="custom-control-label" for="pregunta_csej37e">Pésimo</label>
					</div>

				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej38">
						38. En general ¿Cómo califica el trabajo de los guías electorales en su centro de votación?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej38a" name="pregunta_csej38" value="1">
						<label class="custom-control-label" for="pregunta_csej38a">Muy bueno</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej38b" name="pregunta_csej38" value="2">
						<label class="custom-control-label" for="pregunta_csej38b">Bueno</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej38c" name="pregunta_csej38" value="3">
						<label class="custom-control-label" for="pregunta_csej38c">Regular</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej38d" name="pregunta_csej38" value="4">
						<label class="custom-control-label" for="pregunta_csej38d">Malo</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej38e" name="pregunta_csej38" value="5">
						<label class="custom-control-label" for="pregunta_csej38e">Pésimo</label>
					</div>

				</div>


			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">
					<i class="fas fa-save"></i>
				</button>
			</div>
		</div>
	</div>
<br>
<?php endif;?>
<?php if($hoja2->esta_iniciado == 1): ?>
	<div id="contenedor-submit">
		<button id="BOTON" type="submit" name="action" value="1" >
			ENVIAR
		</button>
		<a href="<?php echo site_url('eleccionesJudiciales2024/nuevo');?>">
			<input type="button" class="BOTON" value="CERRAR">
		</a>
	</div>
<?php endif;?>
	<br>
	<?php echo form_close(); ?>

</main>

<!-- The Modal -->
<!-- The Modal -->
<div class="modal fade" id="modal-c2-secgeneral">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Seccion General</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<?php echo form_open('eleccionesJudiciales2024/procesarSeccionGeneralH2',['id'=>'seccgral_h2',]);?>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" id="idusuario" name="idusuario" value="<?php echo $usuario->id; ?>">
					<input type="text" id="idhoja2" name="idhoja2" value="<?php echo $hoja2->idfrhoja2; ?>">
				</div>
				<div class="form-group">
					<div id="departamento">
						<label>Escoja el Departamento:</label><br>
						<select id="departamento_csej" name="departamento_csej" class="simple" style="width: 100%"  required>
							<option value="" selected >Sin seleccion</option>
							<?php if(isset($departamentos)):?>
								<?php foreach ($departamentos as $a): ?>
									<option value="<?php echo $a->iddepartamento; ?>"><?php echo $a->nombre_departamento; ?></option>
								<?php endforeach; ?>
							<?php endif;?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div id="departamento">
						<label>Escoja el Municipio:</label><br>
						<select id="municipio_csej" name="municipio_csej"  class="simple" style="width: 100%"  required>
							<option value="">Sin seleccion</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div id="departamento">
						<label>Recinto Electoral:</label><br>
						<select id="recinto_csej" name="recinto_csej"  class="simple" style="width: 100%"  required>
							<option value="">Sin seleccion</option>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="c1-mesa">Mesa 1:</label>
						<input type="text" class="form-control" id="c1-mesa1" name="c1-mesa1" placeholder="No de mesa" required>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">
					Enviar
				</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					Cancelar
				</button>
			</div>
			</form>
		</div>
	</div>
</div>


