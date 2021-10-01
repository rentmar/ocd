<main role="main">
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
				<div class="contenedor">
					<div id="caja_boton">
						<div id="contenedor-submit">
							<a href="<?php echo site_url('encuesta/exportarExcel') ?>"><input type="" class="BOTON" value="Excel">
							</a>
						</div><br>
						<div id="contenedor-submit">
							<a href="<?php echo site_url('encuesta/encuestaInicio');?>"><input type="" class="BOTONROJO" value="CANCELAR"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
				<h3 class="text-center" >
					Resultados de la encuesta: <?php echo $encuesta_nombre->uinombre_encuesta; ?>
				</h3>
				<?php if($edad_inicial!=0 && $edad_final !=0): ?>
				<p>
					Rango de edad: <?php echo $edad_inicial.' a '.$edad_final; ?>
				</p>
				<?php endif; ?>

				<?php if($consulta->sexo): ?>
				<p>
						Sexo: <?php echo $sexo; ?>
				</p>
				<?php endif;?>
				<?php if($consulta->area): ?>
				<p>
					Area: <?php echo $area; ?>
				</p>
				<?php endif; ?>
				<?php if($consulta->iddepartamento): ?>
				<p>
					Departamento: <?php echo $departamento->nombre_departamento; ?>
				</p>
				<?php endif; ?>

			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores ">
				<div>
					<table id="encuestas-tabla" class="table table-striped table-hoover">
						<thead>
						<tr id="datos">
							<th>No</th>
							<th>Fecha</th>
							<th>Codigo</th>
							<th>Usuario</th>
							<th>Modulo</th>
							<th>No Pregunta</th>
							<th>Pregunta</th>
							<th>Respuesta</th>
						</tr>
						</thead>
						<tbody>
						<?php if(isset($encuesta_resultado)): ?>
							<?php foreach ($encuesta_resultado as $n): ?>
								<tr>
									<td><?php echo $n->idformcomp; ?></td>
									<td><?php echo mdate('%m-%d-%Y', $n->fecha_fc); ?></td>
									<td><?php echo $n->hash_fc; ?></td>
									<td><?php echo $n->username; ?></td>
									<td><?php echo $n->uinombre_modulo; ?></td>
									<td><?php echo $n->etiqueta_seccion; ?></td>
									<td><?php echo $n->uipregunta_nombre; ?></td>
									<td><?php echo $n->uinombre_respuesta; ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
						</tbody>
					</table>
				</div>

			</div>




		</div>
	</div>
	<br>
</main>

