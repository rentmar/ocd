<main>
	<br><br>
	<?php echo validation_errors(); ?>
	<?php
	/** @noinspection PhpLanguageLevelInspection */
	$atr_form =[
		'id' => 'formulario_ej2024_h2' ,
	]
	;?>
	<?php //echo form_open('EleccionesJudiciales2024/procesarHoja2', $atr_form);?>

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
		<div class="card">
			<div class="card-header cuest2">
				<h4 class="text-white">Informacion General</h4>
			</div>
			<div class="card-body font-weight-normal">
				<!--<form id="ej-c1-secc1" name="ej-c1-secc1">-->
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
							<div class="col-6 border border-primary ">
								<label class="text-primary" for="">Mesa 1</label>
							</div>
						</div>
						<div class="d-flex w-100">
							<div class="col-6 border">
								<input class="form-control" type="text" id="" name=""
									   value="<?php if(isset($mesas->m1)){ echo $mesas->m1;} ?>" placeholder="No de mesa" readonly>
							</div>
						</div>
						<br>
					</div>

			</div>
			<div class="card-footer">
				<?php if($hoja2->esta_iniciado == 0): ?>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-c2-secgeneral">
						<i class="fas fa-power-off"></i>
						Iniciar
					</button>
				<?php else:?>
					<div class="alert alert-success">
						Formulario Iniciado
					</div>
				<?php endif; ?>
			</div>
		</div>
		<br>
		<br>

		<?php if($hoja2->esta_iniciado == 1): ?>

		<div class="card">
			<div class="card-header cuest2">
				<h4 class="text-white" >Mesas Adicionales</h4>
			</div>
			<div class="card-body font-weight-normal">
				<div>

					<div class="d-flex w-100">
						<div class="col-6 border border-primary ">
							<label class="text-primary" for="">Mesa 2</label>
						</div>
						<div class="col-6 border border-primary">
							<label class="text-primary" for="">Mesa 3</label>
						</div>
					</div>
					<div class="d-flex w-100">
						<div class="col-6 border">
							<input class="form-control" type="text"
								   id="" name="" placeholder=""
								   value="<?php if (isset($mesas->m2)) { echo $mesas->m2; } ?>"
								   readonly
							>
						</div>
						<div class="col-6 border">
							<input class="form-control" type="text"
								   id="" name="" placeholder=""
								   value="<?php if (isset($mesas->m3)) { echo $mesas->m3; } ?>"
								   readonly
							>
						</div>
					</div>
					<br>
					<div class="d-flex w-100">
						<div class="col-6 border border-primary">
							<label class="text-primary" for="">Mesa 4</label>
						</div>
					</div>
					<div class="d-flex w-100">

						<div class="col-6 border">
							<input class="form-control" type="text"
								   id="" name="" placeholder=""
								   value="<?php if (isset($mesas->m4)) { echo $mesas->m4; } ?>"
								   readonly
							>
						</div>

					</div>
					<br>
				</div>
			</div>
			<div class="card-footer">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#editmesasc2">
					<i class="fas fa-save"></i> Agregar Mesas
				</button>
			</div>
		</div>
	<?php endif;?>


	</div>
	<br>

<?php if($hoja2->esta_iniciado == 1): ?>

<?php endif;?>

<?php if($hoja2->esta_iniciado == 1): ?>
	<?php echo $seccionesUI; ?>
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
					<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $usuario->id; ?>">
					<input type="hidden" id="idhoja2" name="idhoja2" value="<?php echo $hoja2->idfrhoja2; ?>">
				</div>
				<div class="form-group">
					<div class="alert alert-warning">
						<strong>Atencion! </strong>
						Una vez enviados los datos, no se podran cambiar.
					</div>
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
						<input type="text" class="form-control"
							   id="c2-mesa1" name="c2-mesa1" placeholder="No de mesa" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<hr>
					</div>
					<div class="form-group col-md-12">
						<h5 class="text-dark">MESAS OPCIONALES</h5>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="c2-mesa2">Mesa 2:</label>
						<input type="text" class="form-control" id="c2-mesa2" name="c2-mesa2"
							   placeholder="No de mesa" >
					</div>
					<div class="form-group col-md-3">
						<label for="c2-mesa3">Mesa 3:</label>
						<input type="text" class="form-control" id="c2-mesa3" name="c2-mesa3"
							   placeholder="No de mesa" >
					</div>
					<div class="form-group col-md-3">
						<label for="c2-mesa4">Mesa 4:</label>
						<input type="text" class="form-control" id="c2-mesa4" name="c2-mesa4"
							   placeholder="No de mesa" >
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



<!-- The Modal -->
<div class="modal fade" id="editmesasc2">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Mesas Adicionales</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<?php echo form_open('eleccionesJudiciales2024/updateMesasAdicionalesH2',['id'=>'mesas_h2',]);?>
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $usuario->id; ?>">
					<input type="hidden" id="idhoja2" name="idhoja2" value="<?php echo $hoja2->idfrhoja2; ?>">
				</div>
				<div class="form-group">
					<?php //var_dump($mesas);?>
				</div>


				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="c2-mesa2">Mesa 2:</label>
						<input type="text" class="form-control" id="c2-mesa2"
							   name="c2-mesa2" placeholder=""
							   value = "<?php if (isset($mesas->m2)) { echo $mesas->m2; } ?>"
						>
					</div>
					<div class="form-group col-md-3">
						<label for="c2-mesa3">Mesa 3:</label>
						<input type="text" class="form-control" id="c2-mesa3"
							   name="c2-mesa3" placeholder=""
							   value = "<?php if (isset($mesas->m3)) { echo $mesas->m3; } ?>"
						>
					</div>
					<div class="form-group col-md-3">
						<label for="c2-mesa4">Mesa 4:</label>
						<input type="text" class="form-control" id="c2-mesa4"
							   name="c2-mesa4" placeholder=""
							   value = "<?php if (isset($mesas->m4)) { echo $mesas->m4; } ?>"
						>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="mesas-adicionales" type="submit" class="btn btn-primary">
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


