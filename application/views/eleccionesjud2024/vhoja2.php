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

						</div>
						<div class="d-flex w-100">
							<div class="col-3 border">
								<input class="form-control" type="text" id="" name="" placeholder="No de mesa" readonly>
							</div>

						</div>

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
						2. ¿Se quedaron ciudadanos sin votar después del cierre de la mesa?
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
						3. ¿Cuántos ciudadanos estaban habilitados para votar? (Ver padrón de la mesa)
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
						4. ¿Cuántos ciudadanos emitieron su voto? (Ver padrón de la mesa)
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
				<h4 class="text-white">Cómputo y Escrutinio</h4>
			</div>
			<div class="card-body font-weight-normal">
				<div class="form-group">
					<div class="container mt-3">
						5. ¿El número de papeletas en ánfora de cada franja coincidió con el número de ciudadanos cuya votación se registró?
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
						6. ¿La suma de votos nulos, blancos y válidos de cada franja coincidió con el total de ciudadanos que votaron?
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
						7. ¿La suma de votos nulos, blancos y válidos coincidió con el número de papeletas de cada franja?
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
						8. ¿Se realizó el conteo separado e independiente y en el orden que corresponde de las papeletas del Consejo de la Magistratura?
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
						9. ¿Se realizó el conteo separado e independiente y en el orden que corresponde de las papeletas del Tribunal Agroambiental?
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
						10. ¿Se realizó el conteo separado e independiente y en el orden que corresponde de las papeletas del Tribunal Constitucional?
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
						11. ¿Se realizó el conteo separado e independiente y en el orden que corresponde de las papeletas del Tribunal Supremo de Justicia?
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
						12. ¿El secretario de mesa llenó los datos en el Acta?
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
						13. ¿Hubo problemas en el llenado del Acta?
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
						14. ¿Se utilizó la casilla de observaciones por causa de error en datos en el acta?
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
						15. Si no hubo observaciones, ¿se anuló esta casilla con una línea transversal?
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
						16. ¿Se llenaron con X en los lugares vacíos en el Acta electoral?
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
						17. ¿Firmaron los jurados y pusieron su huella dactilar en el Acta?
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
						18. ¿El notario corrigió el acta electoral? (explicación de la corrección directa)
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
						19. ¿El Notario encontró fallas?
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
						20. ¿Solicitó la corrección al jurado?
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
						21. ¿El secretario o presidente colocó el adhesivo de seguridad que se coloca encima de los resultados?
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
						22. ¿El Sobre A fue correctamente llenado y sellado? (Acta original, lista de habilitados de la mesa y hojas de trabajo)
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
						23. ¿El Sobre B fue correctamente llenado y cerrado? (papeletas de sufragio utilizadas)
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
						24. ¿El Sobre C fue correctamente llenado y cerrado? (Papeletas de sufragio y certificados no utilizados)
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
						25. ¿Se entregó la primera copia del Acta al Notario Electoral?
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
						26. ¿Se entregó la segunda copia del Acta al presidente de mesa?
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
						27. ¿El presidente entregó el sobre A y la maleta al notario?
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
						28. ¿El notario llevó el sobre A y la maleta con un custodio?
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
						29. ¿Alguien impugnó el acta?
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
						30. Indique la hora en que terminó el conteo de votos.
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
						31. ¿El Notario o jurados permitieron sacar foto del Acta?
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
				<br>
				<div class="form-group">
					<label for="pregunta_csej32">
						32. ¿Hubo observadores (nacionales o internacionales) durante el escrutinio y conteo de votos?
					</label><br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej32a" name="pregunta_csej32" value="1">
						<label class="custom-control-label" for="pregunta_csej32a">Si</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="pregunta_csej32b" name="pregunta_csej32" value="0">
						<label class="custom-control-label" for="pregunta_csej32b">No</label>
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
<div class="modal fade" id="modal-c2-secgeneral">
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
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>



