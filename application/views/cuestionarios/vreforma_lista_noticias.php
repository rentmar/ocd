<main role="main">
<br><br>
	<div class="container contenedores">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<table class="table table-striped table-hover ">
					<thead>
						<tr>
							<th>Fecha de Registro</th>
							<th>Fecha de la noticia</th>
							<th>Titular</th>
							<th>Medio</th>
							<th>Cuestionario</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
					<?php if(isset($noticias)): ?>
						<?php foreach ($noticias as $n): ?>
						<tr>
							<td><?php echo mdate('%m-%d-%Y', $n->fecha_registro); ?></td>
							<td><?php echo mdate('%m-%d-%Y', $n->fecha_noticia); ?></td>
							<td><?php echo $n->titular; ?></td>
							<td><?php echo $n->nombre_medio; ?></td>
							<td><?php echo $n->nombre_cuestionario; ?></td>
							<td>
								<a href="<?php echo site_url('reformaelectoral/editarNoticia/'.$n->idnoticia) ?>">
									Editar
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>

			</div>

		</div>
	</div>
</main>
