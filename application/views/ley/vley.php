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
								<a href="<?php echo site_url('Ley/estadoLey/'.$l->idleyes);?>" >
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




