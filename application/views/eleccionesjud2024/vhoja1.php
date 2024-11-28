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
			<label for="titular">Recinto Electoral:</label><br>
			<input type="text" id="recinto_csej" name="recinto_csej" required class="form-control"
				   value="" required
			>
		</div>
	</div>
	<br>

	<div class="contenedores">
		<div class="container mt-3">
			Identifique los números de mesas con las que trabajará durante el día.
		</div>
		<br>
		<div class="d-flex w-100">
			<div class="col-3 border border-primary "><label class="text-primary" for="">Mesa 1</label></div>
			<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 2</label></div>
			<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 3</label></div>
			<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 4</label></div>
		</div>
		<div class="d-flex w-100">
			<div class="col-3 border"><input class="form-control" type="text" id="" name="" placeholder="No de mesa"></div>
			<div class="col-3 border"><input class="form-control" type="text" id="" name="" placeholder="No de mesa"></div>
			<div class="col-3 border"><input class="form-control" type="text" id="" name="" placeholder="No de mesa"></div>
			<div class="col-3 border"><input class="form-control" type="text" id="" name="" placeholder="No de mesa"></div>
		</div>
		<br>
		<div class="d-flex w-100">
			<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 5</label></div>
			<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 6</label></div>
			<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 7</label></div>
			<div class="col-3 border border-primary"><label class="text-primary" for="">Mesa 8</label></div>
		</div>
		<div class="d-flex w-100">
			<div class="col-3 border"><input class="form-control" type="text" id="" name="" placeholder="No de mesa"></div>
			<div class="col-3 border"><input class="form-control" type="text" id="" name="" placeholder="No de mesa"></div>
			<div class="col-3 border"><input class="form-control" type="text" id="" name="" placeholder="No de mesa"></div>
			<div class="col-3 border"><input class="form-control" type="text" id="" name="" placeholder="No de mesa"></div>
		</div>

	</div>
	<br>

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4>Apertura</h4>
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

				</div>
			</div>
		</div>

	</div>
	<br>

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4>Sobre el Recinto Electoral</h4>
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
				<div class="form-group">
					<div class="form-group">
						<label for="pregunta_csej3obsn">

							Si hubo un hecho particular, anota el número de mesa y descríbelo en un pequeño párrafo.

						</label><br>
						<input class="form-control" type="text" id="pregunta_csej3obsn" name="pregunta_csej3obsn" placeholder="No de mesa"><br>
						<textarea class="form-control" rows="5" id="pregunta_csej3obsp" name="pregunta_csej3obsp"></textarea>
					</div>

				</div>

			</div>
		</div>

	</div>
	<br>


	<div id="contenedor-submit">
		<button id="BOTON" type="submit" name="action" value="1" >
			SIGUIENTE
		</button>
		<a href="<?php echo site_url('');?>">
			<input type="button" class="BOTON" value="CANCELAR">
		</a>
	</div>

	<br>
	<?php echo form_close(); ?>

</main>

<!-- The Modal -->
<div class="modal fade" id="preenvioplenaria">
	<div class="modal-dialog modal-xl modal-dialog-scrollable ">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-info text-white ">
				<h4 class="modal-title">Plenaria a Registrar</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="container">
					<?php echo form_open('plenaria/crearPlenaria', ['id' => 'formulario_plenaria_preenvio',]); ?>
					<div class="form-group">
						<input class="form-control" type="hidden" id="idcuestionario_pre" name="idcuestionario_pre">
						<input class="form-control" type="hidden" id="idusuario_pre" name="idusuario_pre" >
					</div>
					<div class="form-group">
						<label for="fecha_plenaria_pre">Fecha de la plenaria:</label>
						<input type="text" class="form-control" id="fecha_plenaria_pre" name="fecha_plenaria_pre">
						<input type="hidden" id="fecha_plenaria_unix_pre" name="fecha_plenaria_unix_pre">
					</div>
					<div class="form-group">
						<label for="instancia_seguimiento_pre">Instancia de seguimiento:</label>
						<input type="text" class="form-control" id="instancia_seguimiento_pre" name="instancia_seguimiento_pre" required>
						<input type="hidden" class="form-control" id="idinstancia_seg_pre" name="idinstancia_seg_pre" >
					</div>
					<div id="instancia_secundaria_plenaria" class="form-group">

					</div>
					<div class="form-group">
						<label for="puntos_agenda_pre">Puntos de la agenda</label>
						<textarea class="form-control" rows="5" id="puntos_agenda_pre" name="puntos_agenda_pre" required></textarea>
					</div>
					<div class="form-group">
						<label for="cumlimiento_agenda_pre">Cumplimiento de la agenda:</label>
						<input type="number" class="form-control" id="cumlimiento_agenda_pre" name="cumlimiento_agenda_pre" required >
					</div>
					<div class="form-group">
						<label for="asunto_sintratar_pre">Descripcion del asunto sin tratamiento:</label>
						<textarea class="form-control" rows="4" id="asunto_sintratar_pre" name="asunto_sintratar_pre" required></textarea>
					</div>
					<div class="form-group" >
						<label for="puntos_varios_pre" >Describa puntos varios:</label>
						<textarea class="form-control" rows="4" id="puntos_varios_pre" name="puntos_varios_pre" required ></textarea>
					</div>
					<div id="norma_extra_pre" class="form-group">

					</div>
					<div class="form-group">
						<label for="tipo_plenaria_pre" >Especificacion del tipo de plenaria:</label>
						<input type="text" class="form-control" id="tipo_plenaria_pre" name="tipo_plenaria_pre">
						<input type="hidden" class="form-control" id="id_tipo_plenaria_pre" name="id_tipo_plenaria_pre">
					</div>
					<div class="form-group">
						<label for="monitores_pre">Obervaciones:</label><br>
						<textarea class="form-control" rows="4" id="monitores_pre" name="monitores_pre"></textarea>
					</div>
					<br>
				</div>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button id="BOTON" type="submit" name="action" value="1" >
					GUARDAR
				</button>
				<button id="BOTON" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
			<?php form_close(); ?>
		</div>
	</div>
</div>


<!-- The Modal de alerta TEMAS SIN SELECCIONAR -->
<div class="modal fade" id="tipoplenariasinseleccionar">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-warning">
				<h4 class="modal-title text-white ">Alerta</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				Seleccionar el tipo de plenaria
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button id="BOTON" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>

		</div>
	</div>
</div>



