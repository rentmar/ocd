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
						<th>Descripcion Ley</th>
						<th>En Tratamiento</th>
						<th>Sancionada</th>
						<th>Aprobada</th>
						<th>Con Modificacion</th>
						<th>Promulgada</th>
						<th>Accion</th>
					</tr>
					<?php if(isset($leyes)): ?>
						<?php foreach ($leyes as $l):?>
							<tr>
								<td><?php echo $l['descripcion'];?></td>
								<td>
									<?php if(empty($l['tratamiento'])): ?>
										<div class="form-check">
											<label class="form-check-label">
												<i class="far fa-square"></i>
												S/N
											</label>
										</div>
									<?php else: ?>
										<?php $estado = $l['tratamiento'];  ?>
										<div class="form-check">
											<label>
												Fecha: <?php echo mdate('%m-%d-%Y', $estado->fecha_estadoley); ?>
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<i class="far fa-check-square"></i>
												<!--											<input disabled checked type="checkbox" class="form-check-input" value="">-->
												<?php echo $estado->codigo_ley; ?>
											</label>
											<hr style="height:20px; background-color: red;"  />
										</div>
									<?php endif; ?>
								</td>
								<td>
									<?php if(empty($l['sancionado'])): ?>
										<div class="form-check">
											<label class="form-check-label">
												<i class="far fa-square"></i>
												S/N
											</label>
										</div>
									<?php else: ?>
										<?php $estado = $l['sancionado'];  ?>
										<div class="form-check">
											<label>
												Fecha: <?php echo mdate('%m-%d-%Y', $estado->fecha_estadoley); ?>
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<i class="far fa-check-square"></i>
												<?php echo $estado->codigo_ley; ?>
											</label>
											<hr class="bg-primary" />
										</div>
									<?php endif; ?>
								</td>
								<td>
									<?php if(empty($l['aprobado'])): ?>
										<div class="form-check">
											<label class="form-check-label">
												<i class="far fa-square"></i>
												S/N
											</label>
										</div>
									<?php else: ?>
										<?php $estado = $l['aprobado'];  ?>
										<div class="form-check">
											<label>
												Fecha: <?php echo mdate('%m-%d-%Y', $estado->fecha_estadoley); ?>
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<i class="far fa-check-square"></i>
												<?php echo $estado->codigo_ley; ?>
											</label>
											<hr class="bg-primary" />
										</div>
									<?php endif; ?>

								</td>
								<td>
									<?php if(empty($l['modificacion'])): ?>
										<div class="form-check">
											<label class="form-check-label">
												<i class="far fa-square"></i>
												S/N
											</label>
										</div>
									<?php else: ?>
										<?php $estado = $l['modificacion'];  ?>
										<div class="form-check">
											<label>
												Fecha: <?php echo mdate('%m-%d-%Y', $estado->fecha_estadoley); ?>
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<i class="far fa-check-square"></i>
												<?php echo $estado->codigo_ley; ?>
											</label>
											<hr style="height:20px; background-color: #00CC00;" />
										</div>
									<?php endif; ?>
								</td>
								<td>
									<?php if(empty($l['promulgada'])): ?>
										<div class="form-check">
											<label class="form-check-label">
												<i class="far fa-square"></i>
												S/N
											</label>
										</div>
									<?php else: ?>
										<?php $estado = $l['promulgada'];  ?>
										<div class="form-check">
											<label>
												Fecha: <?php echo mdate('%m-%d-%Y', $estado->fecha_estadoley); ?>
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<i class="far fa-check-square"></i>
												<?php echo $estado->codigo_ley; ?>
											</label>
											<hr  />
										</div>
									<?php endif; ?>

								</td>
								<td>
									<a href="<?php ?>" >
										<i class="fas fa-info"></i>
										Info
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</table>
			</div>
		</div>
	</div>
	<br>
</main>
