<main>
	<br><br>
	<?php echo validation_errors(); ?>
	<?php
	/** @noinspection PhpLanguageLevelInspection */
	$atr_form =[
		'id' => 'formulario_ej2024_h1' ,
	]
	;?>
	<?php echo form_open('EleccionesJudiciales2024/procesarHoja1', $atr_form);?>

	<div class="contenedores_divididos">
		<div class="contenedor_superior2" id="contenedor_pequeño">
		</div>
		<div class="contenedor_inferior">
			<h3 id="Título_formulario"> Apertura y Funcionamiento de Recintos </h3>
		</div>
	</div>
	<br>

	<div>
		<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $usuario->id; ?>">
		<input type="hidden" id="idhoja1" name="idhoja1" value="<?php echo $hoja1->idfrhoja1; ?>">

	</div>

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
							<div class="col-3 border border-primary">
								<label class="text-primary" for="">Mesa 2</label>
							</div>
							<div class="col-3 border border-primary">
								<label class="text-primary" for="">Mesa 3</label>
							</div>
							<div class="col-3 border border-primary">
								<label class="text-primary" for="">Mesa 4</label>
							</div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<input class="form-control" type="text" id="" name=""
									   value="<?php if(isset($mesas->m1)){ echo $mesas->m1;} ?>" placeholder="No de mesa" readonly>
							</div>
							<div class="col-3 border">
								<input class="form-control" type="text" id="" name=""
									   value="<?php if(isset($mesas->m2)){ echo $mesas->m2;} ?>" placeholder="No de mesa" readonly>
							</div>
							<div class="col-3 border">
								<input class="form-control" type="text" id="" name=""
									   value="<?php if(isset($mesas->m3)){ echo $mesas->m3;} ?>" placeholder="No de mesa" readonly>
							</div>
							<div class="col-3 border">
								<input class="form-control" type="text" id="" name=""
									   value="<?php if(isset($mesas->m4)){ echo $mesas->m4;} ?>" placeholder="No de mesa" readonly>
							</div>
						</div>
						<br>
						<div class="d-flex w-100">
							<div class="col-3 border border-primary">
								<label class="text-primary" for="">Mesa 5</label>
							</div>
						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<input class="form-control" type="text" id="" name=""
									   value="<?php if(isset($mesas->m5)){ echo $mesas->m5;} ?>" placeholder="No de mesa" readonly>
							</div>
						</div>
					</div>

			</div>
			<div class="card-footer">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-c1-secgeneral">
					<i class="fas fa-save"></i>
				</button>
			</div>
				</form>
		</div>
	</div>
	<br>
<?php if($hoja1->esta_iniciado == 1): ?>
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
<?php endif; ?>
<?php if($hoja1->esta_iniciado == 1): ?>

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4 class="text-white" >Apertura</h4>
			</div>
			<div class="card-body font-weight-normal">
				<div class="form-group">
					<div class="container mt-3">
						1. ¿El precinto de la maleta electoral estaba intacto?
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
								<input type="radio" class="custom-control-input" id="customRadio1" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio1">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio2">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio3">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio4" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio4">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio5" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio5">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio6" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio6">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio7" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio7">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio8" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio8">no</label>
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
								<input type="radio" class="custom-control-input" id="customRadio10" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio10">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio11" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio11">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio12" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio12">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio13" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio13">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio14" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio14">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio15" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio15">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio16" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio16">no</label>
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
								<input type="radio" class="custom-control-input" id="customRadio18" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio18">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio19" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio19">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio20" name="example5" value="customEx">
								<label class="custom-control-label" for="customRadio20">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio21" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio21">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio22" name="example6" value="customEx">
								<label class="custom-control-label" for="customRadio22">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio23" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio23">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio24" name="example7" value="customEx">
								<label class="custom-control-label" for="customRadio24">no</label>
							</div>

						</div>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						2. ¿Se reportó algún caso en el que el precinto de la maleta estaba dañado?
						<div class="alert alert-info">
							<strong>Info!</strong> En caso de respuesta afirmativa explicar en la casilla de observaciones indicando el número de mesa
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
								<input type="radio" class="custom-control-input" id="customRadio25" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio25">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio26" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio26">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio27" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio27">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio28" name="example1" value="customEx">
								<label class="custom-control-label" for="customRadio28">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio29" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio29">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio30" name="example20" value="customEx">
								<label class="custom-control-label" for="customRadio30">no</label>
							</div>
						</div>
						<div class="col-3 border">

							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio31" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio31">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio33" name="example355" value="customEx">
								<label class="custom-control-label" for="customRadio33">no</label>
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
								<input type="radio" class="custom-control-input" id="customRadio34" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio34">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio35" name="example47" value="customEx">
								<label class="custom-control-label" for="customRadio35">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio36" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio36">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio37" name="example15" value="customEx">
								<label class="custom-control-label" for="customRadio37">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio38" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio38">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio40" name="example2" value="customEx">
								<label class="custom-control-label" for="customRadio40">no</label>
							</div>

						</div>
						<div class="col-3 border">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio41" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio41">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio42" name="example3" value="customEx">
								<label class="custom-control-label" for="customRadio42">no</label>
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
								<input type="radio" class="custom-control-input" id="customRadio43" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio43">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio44" name="example4" value="customEx">
								<label class="custom-control-label" for="customRadio44">no</label>
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
						3. La maleta electoral contenía el siguiente material:
					</div>



				</div>
				<br>
				<div class="form-group">
					<div class="container mt-3">
						a) 1 Acta electoral original y 3 copias
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
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
				<br>
				<div class="form-group">
					<div class="container mt-3">
						b) 2 juego de papeletas de sufragio nacional y departamental (según corresponda en cada departamento)
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
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
				<br>
				<div class="form-group">
					<div class="container mt-3">
						c) Certificados de sufragio
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
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
				<br>
				<div class="form-group">
					<div class="container mt-3">
						d) 2 ánforas de sufragio y su adhesivo (según corresponda en cada departamento)
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
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
				<br>
				<div class="form-group">
					<div class="container mt-3">
						e) Sobres de seguridad A, B y C
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
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
				<br>
				<div class="form-group">
					<div class="container mt-3">
						f) Lista de índice de personas habilitadas e inhabilitadas
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
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
				<br>
				<div class="form-group">
					<div class="container mt-3">
						g) Hojas de trabajo
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
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
				<br>

				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						4. Al momento del inicio de la votación ¿cuántos jurados estaban presentes?
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
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
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
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
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
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
					</div>


				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						5. ¿Fue necesaria la participación de votantes para desempeñar el papel de jurados?
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
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
						6. ¿Cuántos votantes fueron llamados a desempeñarse como jurados?
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
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
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
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
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
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
					</div>

				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						7. ¿Se mostró al público que las ánforas estaban vacías antes de cerrarse?
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
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
						8. ¿Cuántos jurados firmaron las papeletas de sufragio?
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
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
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
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
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
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
						<div class="col-3 border">
							<input class="form-control" min="1" max="6" step="1" value="1" type="number" id="" name="" placeholder="">
						</div>
					</div>


				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						9. ¿Se llenó el Acta de apertura antes del inicio de la votación?
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
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
						10. ¿Se instaló la mesa de votación?
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
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
						11. ¿A qué hora se instaló la mesa de votación?
					</div>

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
						12. ¿La lista de habilitados para votar en las mesas está a la vista de los electores?
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
								<input type="radio" class="custom-control-input" id="customradio1" name="example" value="customEx">
								<label class="custom-control-label" for="customradio1">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
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
<?php if($hoja1->esta_iniciado == 1): ?>
	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4 class="text-white" >Sobre el Recinto Electoral</h4>
			</div>
			<div class="card-body font-weight-normal">
				<div class="form-group">
					<div class="container mt-3">
						13. El recinto electoral cuenta con afiches o carteles sobre:
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-9 border "><label class="" for="">14 - a) Ubicación de las mesas de sufragio</label></div>
						<div class="col-3 border ">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio-p11-a" name="p11" value="customEx">
								<label class="custom-control-label" for="customRadio-p11-a">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio-p11-b" name="p11" value="customEx">
								<label class="custom-control-label" for="customRadio-p11-b">no</label>
							</div>
						</div>
					</div>
					<div class="d-flex w-100">
						<div class="col-9 border "><label class="" for="">15 - b) Puntos de información</label></div>
						<div class="col-3 border ">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio-p12-a" name="p12" value="customEx">
								<label class="custom-control-label" for="customRadio-p12-a">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio-p12-b" name="p12" value="customEx">
								<label class="custom-control-label" for="customRadio-p12-b">no</label>
							</div>
						</div>
					</div>
					<div class="d-flex w-100">
						<div class="col-9 border "><label class="" for="">16 - c) Procedimiento de votación, escrutinio y conteo de votos</label></div>
						<div class="col-3 border ">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio-p13-a" name="p13" value="customEx">
								<label class="custom-control-label" for="customRadio-p13-a">si</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio-p13-b" name="p13" value="customEx">
								<label class="custom-control-label" for="customRadio-p13-b">no</label>
							</div>
						</div>
					</div>



				</div>

				<br>
				<div class="form-group">
					<label for="pregunta_csej12">17. ¿Cuántos guías electorales había en su recinto?</label>
					<input type="number" value="0" class="form-control" id="pregunta_csej12" name="pregunta_csej12" >
				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej13">
						18. ¿Se dio preferencia a mujeres embarazadas?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej13a" name="pregunta_csej13" value="1">
						<label class="custom-control-label" for="pregunta_csej13a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej13b" name="pregunta_csej13" value="0">
						<label class="custom-control-label" for="pregunta_csej13b">No</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej13c" name="pregunta_csej13" value="2">
						<label class="custom-control-label" for="pregunta_csej13c">No se observaron casos</label>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej14">
						19. ¿Se dio preferencia a adultos mayores?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej14a" name="pregunta_csej14" value="1">
						<label class="custom-control-label" for="pregunta_csej14a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej14b" name="pregunta_csej14" value="0">
						<label class="custom-control-label" for="pregunta_csej14b">No</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej14c" name="pregunta_csej14" value="2">
						<label class="custom-control-label" for="pregunta_csej14c">No se observaron casos</label>
					</div>

				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej15">
						20. ¿Se practicó el voto asistido?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej15a" name="pregunta_csej15" value="1">
						<label class="custom-control-label" for="pregunta_csej15a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej15b" name="pregunta_csej15" value="0">
						<label class="custom-control-label" for="pregunta_csej15b">No</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej15c" name="pregunta_csej15" value="2">
						<label class="custom-control-label" for="pregunta_csej15c">No se observaron casos</label>
					</div>

				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej15">
						21. ¿Se utilizaron idiomas originarios para orientar a los electores en caso necesario?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej15a" name="pregunta_csej15" value="1">
						<label class="custom-control-label" for="pregunta_csej15a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej15b" name="pregunta_csej15" value="0">
						<label class="custom-control-label" for="pregunta_csej15b">No</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej15c" name="pregunta_csej15" value="2">
						<label class="custom-control-label" for="pregunta_csej15c">No se observaron casos</label>
					</div>

				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej16">
						22. ¿Hubo ciudadanos inscritos en el recinto observado a quienes no se les permitió votar?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej16a" name="pregunta_csej16" value="1">
						<label class="custom-control-label" for="pregunta_csej16a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej16b" name="pregunta_csej16" value="0">
						<label class="custom-control-label" for="pregunta_csej16b">No</label>
					</div>

				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej17">
						23. ¿Hubo filas durante la votación?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej17a" name="pregunta_csej17" value="1">
						<label class="custom-control-label" for="pregunta_csej17a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej17b" name="pregunta_csej17" value="0">
						<label class="custom-control-label" for="pregunta_csej17b">No</label>
					</div>

				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej18">
						24. ¿Había propaganda electoral en el recinto?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej18a" name="pregunta_csej18" value="1">
						<label class="custom-control-label" for="pregunta_csej18a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej18b" name="pregunta_csej18" value="0">
						<label class="custom-control-label" for="pregunta_csej18b">No</label>
					</div>

				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej19">
						25. ¿Hubo actos de proselitismo?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej19a" name="pregunta_csej19" value="1">
						<label class="custom-control-label" for="pregunta_csej19a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej19b" name="pregunta_csej19" value="0">
						<label class="custom-control-label" for="pregunta_csej19b">No</label>
					</div>

				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej20">
						26. ¿Hubo incidentes de violencia?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej20a" name="pregunta_csej20" value="1">
						<label class="custom-control-label" for="pregunta_csej20a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej20b" name="pregunta_csej20" value="0">
						<label class="custom-control-label" for="pregunta_csej20b">No</label>
					</div>

				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej21">
						27. ¿Hubo interrupciones en la votación?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej21a" name="pregunta_csej21" value="1">
						<label class="custom-control-label" for="pregunta_csej21a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej21b" name="pregunta_csej21" value="0">
						<label class="custom-control-label" for="pregunta_csej21b">No</label>
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
<?php if($hoja1->esta_iniciado == 1): ?>
	<div class="contenedores">
		<div class="card-header cuest2">
			<h4 class="text-white" >Observaciones</h4>
		</div>
		<div class="card-body font-weight-normal">
			<div class="form-group">
				<div class="form-group">
					<label for="pregunta_csej3obsn">

						Si hubo un hecho particular, anota el número de mesa y descríbelo en un pequeño párrafo.

					</label><br>
					<textarea class="form-control" rows="5" id="pregunta_csej3obsp" name="pregunta_csej3obsp"></textarea>
				</div>

			</div>


		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-success">
				<i class="fas fa-save"></i>
			</button>
		</div>

	</div>

<?php endif;?>
<?php if($hoja1->esta_iniciado == 1): ?>

	<div id="contenedor-submit">
		<button id="BOTON" type="submit" name="action" value="1" >
			ENVIAR
		</button>
		<a href="<?php echo site_url('eleccionesJudiciales2024/nuevo');?>">
			<input type="button" class="BOTON" value="CERRAR">
		</a>
	</div>

	<br>
<?php endif; ?>
	<?php echo form_close(); ?>

</main>

<!-- The Modal -->
<div class="modal fade" id="modal-c1-secgeneral">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Seccion General</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<?php echo form_open('eleccionesJudiciales2024/procesarSeccionGeneralH1',['id'=>'seccgral_h1',]);?>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" id="idusuario" name="idusuario" value="<?php echo $usuario->id; ?>">
					<input type="text" id="idhoja1" name="idhoja1" value="<?php echo $hoja1->idfrhoja1; ?>">
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
					<div class="form-group col-md-3">
						<label for="c1-mesa">Mesa 2:</label>
						<input type="text" class="form-control" id="c1-mesa2" name="c1-mesa2" placeholder="No de mesa" required>
					</div>
					<div class="form-group col-md-3">
						<label for="c1-mesa">Mesa 3:</label>
						<input type="text" class="form-control" id="c1-mesa3" name="c1-mesa3" placeholder="No de mesa" required>
					</div>
					<div class="form-group col-md-3">
						<label for="c1-mesa">Mesa 4:</label>
						<input type="text" class="form-control" id="c1-mesa4" name="c1-mesa4" placeholder="No de mesa" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="c1-mesa">Mesa 5:</label>
						<input type="text" class="form-control" id="c1-mesa5" name="c1-mesa5" placeholder="No de mesa" required>
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


