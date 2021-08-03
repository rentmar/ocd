<main role="main"><br>
	<div class="container">
		<div class="row">

			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<div id="caja_boton">
					<div id="contenedor-submit">
						<a href="<?php echo site_url('Ley/crearLey');?>">
							<input type="submit" class="BOTON" value="CREAR">
						</a>
						<a href="<?php echo site_url('/'); ?>">
							<input type="button" class="BOTONROJO" value="CANCELAR">
						</a>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<p>
				<table>
					<tr id="datos">
						<th>Ley</th>
						<th>En Tratamiento</th>
						<th>Sancionada</th>
						<th>Aprobada</th>
						<th>Con Modificacion</th>
						<th>Promulgada</th>
						<th>Accion</th>
					</tr>
					<?php foreach ($leyes as $l) {?>
						<tr>
							<td><?php echo $l->resumen;?></td>
							<td><?php echo "Ley en Tratamiento"; ?></td>
							<td><?php echo "";?></td>
							<td><?php echo "";?></td>
							<td><?php echo "";?></td>
							<td><?php echo "";?></td>
							<td>
								<a href="#" data-toggle="modal"
								   data-target="<?php echo "#datosmodal".$l->idleyes;?>">
									Actualizar
								</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	<br>
</main>


<?php foreach ($leyes as $l) {?>
<div class="modal" id="<?php echo "datosmodal".$l->idleyes;?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Estado Ley</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('Ley/actualizarLey/'.$l->idleyes);?>
			<div class="modal-body">
				<select class="combo" id='cuadro' name='rel_idfuente' required>
					<option value="">Elegir Estado</option>
					<?php foreach ($estados as $e): ?>
					<option value="<?php echo $e->idestadoley; ?>">
						<?php echo $e->nombre_estadoley; ?>
					</option>
					<?php endforeach; ?>
				</select>
				<div class="form-row">
					<div class="col">
						<hr>
					</div>
				</div>
				<div class="form-group">
					<label>Titulo de la Ley:</label><br>
					<input type="text" id="titulo" name="titulo" class="form-control" required >
				</div>
				<div class="form-group">
					<label>Codigo de la Ley:</label><br>
					<input type="text" id="titulo" name="titulo" class="form-control" required>
				</div>
				<div class="form-group">
					<label>URL de la Ley:</label><br>
					<input type="text" id="titulo" name="titulo" class="form-control" required>
				</div>
			</div>
			<div class="modal-footer">
				<button  type="submit" name="accion" id="BOTON" >
					Actualizar
				</button>
			<?php echo form_close();?>
				<button type="button" class="BOTONROJO" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<?php } ?>


