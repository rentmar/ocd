<main role="main">
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
				<h3 class="text-center" >
					Cuestionario 1 - Elecciones Judiciales 2024
				</h3>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
				<a href="<?php echo site_url('manejoDB/downloadCuestionario1')?>" class="btn btn-info" role="button">
					Descargar
				</a>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores ">
				<div>
					<table id="leyes-tabla" class="table table-striped table-hoover">
						<thead>
						<tr id="datos">
							<th>No</th>
							<th>Usuario</th>
							<th>Departamento</th>
							<th>Recinto Electoral</th>
						</tr>
						</thead>
						<tbody>
						<?php if(isset($datos)): ?>
							<?php foreach ($datos as $n): ?>
								<tr>
									<td><?php echo $n->idfrhoja1; ?></td>
									<td><?php echo $n->username ?></td>
									<td><?php echo $n->nombre_departamento; ?></td>
									<td><?php  echo $n->nombre_re;  ?></td>


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

