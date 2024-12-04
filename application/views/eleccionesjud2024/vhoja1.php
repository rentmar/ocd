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
						<input type="text" id="" name="" class="form-control" value="" readonly required>
					</div>
					<div class="form-group">
						<label for="municipio">Municipio:</label><br>
						<input type="text" id="" name="" class="form-control" value="" readonly required>
					</div>

					<div class="form-group">
						<label for="recinto">Recinto Electoral:</label><br>
						<input type="text" id="recinto" name="recinto" required class="form-control"
							   value="" readonly >
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
								<input class="form-control" type="text" id="" name="" placeholder="No de mesa" readonly>
							</div>
							<div class="col-3 border">
								<input class="form-control" type="text" id="" name="" placeholder="No de mesa" readonly>
							</div>
							<div class="col-3 border">
								<input class="form-control" type="text" id="" name="" placeholder="No de mesa" readonly>
							</div>
							<div class="col-3 border">
								<input class="form-control" type="text" id="" name="" placeholder="No de mesa" readonly>
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
								<input class="form-control" type="text" id="" name="" placeholder="No de mesa" readonly>
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

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4 class="text-white" >Apertura</h4>
			</div>
			<div class="card-body font-weight-normal">
				<div class="form-group">
					<div class="container mt-3">
						1. ¿El Notario Electoral entregó los materiales electorales necesarios para abrir la mesa?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
								<select class="form-control" id="" name="">
									<option value = "0">S/N</option>
									<option value = "1">Si</option>
									<option value = "0">No</option>
								</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						2. ¿Al momento del inicio de la votación, cuántos jurados estaban presentes?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4</label></div>
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
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8</label></div>
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
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12</label></div>
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
						3. ¿Se llenó el Acta de apertura?.
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>

				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						4. ¿Todos los Jurados firmaron las Papeletas de Sufragio?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
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
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
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
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4</label></div>
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
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8</label></div>
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
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12</label></div>
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
						7. ¿Se instaló la mesa de votación?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>

				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						8. ¿A qué hora instaló la mesa de votación?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4</label></div>
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
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8</label></div>
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
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12</label></div>
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
						9. ¿En el momento del inicio de la votación estaba presente el guía electoral?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>

					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>

				</div>
				<br><br>
				<div class="form-group">
					<div class="container mt-3">
						10. ¿La lista de habilitados para votar en las mesas observadas está a la vista de los electores?
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 9</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 10</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 11</label></div>
						<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 12</label></div>
					</div>
					<div class="d-flex w-100">
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
						<div class="col-3 border">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
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

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4 class="text-white" >Sobre el Recinto Electoral</h4>
			</div>
			<div class="card-body font-weight-normal">
				<div class="form-group">
					<div class="container mt-3">
						11. El recinto electoral cuenta con afiches o carteles sobre:
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-9 border "><label class="" for="">a) Ubicación de las mesas de sufragio</label></div>
						<div class="col-3 border ">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<div class="d-flex w-100">
						<div class="col-9 border "><label class="" for="">b) Puntos de información</label></div>
						<div class="col-3 border ">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>
					<div class="d-flex w-100">
						<div class="col-9 border "><label class="" for="">c) Procedimiento de votación, escrutinio y conteo de votos</label></div>
						<div class="col-3 border ">
							<select class="form-control" id="" name="">
								<option value = "0">S/N</option>
								<option value = "1">Si</option>
								<option value = "0">No</option>
							</select>
						</div>
					</div>



				</div>

				<br>
				<div class="form-group">
					<label for="pregunta_csej12">12. ¿Cuántos guías electorales había en su recinto?</label>
					<input type="number" value="0" class="form-control" id="pregunta_csej12" name="pregunta_csej12" >
				</div>
				<br>
				<div class="form-group">
					<label for="pregunta_csej13">
						13. ¿Se dio preferencia a mujeres embarazadas?
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
						14. ¿Se practicó el voto asistido?
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
						15. ¿Se utilizó idiomas originarios para orientar a los electores en caso necesario?
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
						16. ¿Hubo ciudadanos inscritos en el recinto observado a quienes no se les permitió votar?
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
						17. ¿Estaba presente en el recinto algún grupo de personas con la intención de orientar el voto ciudadano?
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
						18. ¿Hubo largas filas durante la votación?
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
						19. ¿Había propaganda electoral en el recinto?
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
						20. ¿Hubo actos de proselitismo?
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
						21. ¿Hubo incidentes de violencia?
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
				<br>
				<div class="form-group">
					<label for="pregunta_csej22">
						22. ¿Hubo interrupciones en la votación?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej22a" name="pregunta_csej22" value="1">
						<label class="custom-control-label" for="pregunta_csej22a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej22b" name="pregunta_csej22" value="0">
						<label class="custom-control-label" for="pregunta_csej22b">No</label>
					</div>

				</div>
				<br>

			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">
					<i class="fas fa-save"></i>
				</button>
			</div>
		</div>

	</div>
	<br>

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


	<div id="contenedor-submit">
		<button id="BOTON" type="submit" name="action" value="1" >
			ENVIAR
		</button>
		<a href="<?php echo site_url('eleccionesJudiciales2024/nuevo');?>">
			<input type="button" class="BOTON" value="CERRAR">
		</a>
	</div>

	<br>
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
			<form>
			<div class="modal-body">

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
						<input type="text" class="form-control" id="c1-mesa" name="c1-mesa" placeholder="No de mesa" required>
					</div>
					<div class="form-group col-md-3">
						<label for="c1-mesa">Mesa 2:</label>
						<input type="text" class="form-control" id="c1-mesa" name="c1-mesa" placeholder="No de mesa" required>
					</div>
					<div class="form-group col-md-3">
						<label for="c1-mesa">Mesa 3:</label>
						<input type="text" class="form-control" id="c1-mesa" name="c1-mesa" placeholder="No de mesa" required>
					</div>
					<div class="form-group col-md-3">
						<label for="c1-mesa">Mesa 4:</label>
						<input type="text" class="form-control" id="c1-mesa" name="c1-mesa" placeholder="No de mesa" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="c1-mesa">Mesa 5:</label>
						<input type="text" class="form-control" id="c1-mesa" name="c1-mesa" placeholder="No de mesa" required>
					</div>
					<div class="form-group col-md-3">
						<label for="c1-mesa">Mesa 6:</label>
						<input type="text" class="form-control" id="c1-mesa" name="c1-mesa" placeholder="No de mesa" required>
					</div>
					<div class="form-group col-md-3">
						<label for="c1-mesa">Mesa 7:</label>
						<input type="text" class="form-control" id="c1-mesa" name="c1-mesa" placeholder="No de mesa" required>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>


