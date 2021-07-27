<main role="main">
	<br>
	<div class="container ">
		<div class="table-responsive">

				<table class="table table-striped ">
					<thead>
						<tr>
							<th>Fecha Registro</th>
							<th>Fecha Noticia</th>
							<th>Titular</th>
							<th>Resumen</th>
							<th>Medio</th>
							<th>Tipo de Medio</th>
							<th>Formulario</th>
							<th>Usuario</th>
							<th>Universidad</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($noticias as $n): ?>
						<tr>
							<td><?php echo mdate('%m-%d-%Y', $n->fecha_registro); ?></td>
							<td><?php echo mdate('%m-%d-%Y', $n->fecha_noticia); ?></td>
							<td><?php echo $n->titular; ?></td>
							<td><?php echo $n->resumen; ?></td>
							<td><?php echo $n->nombre_medio; ?></td>
							<td><?php echo $n->nombre_tipo; ?></td>
							<td><?php echo $n->nombre_cuestionario;?></td>
							<td><?php echo $n->username;?></td>
							<td><?php echo $n->nombre_universidad; ?></td>
						</tr>
						<?php endforeach; ?>

					</tbody>

				</table>

		</div>
	</div>
	<br>

</main>
