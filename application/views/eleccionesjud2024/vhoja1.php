<main>
	<br><br>
	<?php echo validation_errors(); ?>
	<?php
	/** @noinspection PhpLanguageLevelInspection */
	$atr_form =[
		'id' => 'formulario_ej2024_h1' ,
	]
	;?>

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

<!-- Seccion Mesas adicionales -->
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
<?php endif; ?><!-- Fin Seccion Mesas adicionales -->


<!-- Secciones de la hoja del cuestionario -->
<?php if($hoja1->esta_iniciado == 1): ?>
	<?php foreach ($secciones as $s): ?>
	<?php endforeach; ?>
<?php endif; ?><!-- Secciones de la hoja del cuestionario -->

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


