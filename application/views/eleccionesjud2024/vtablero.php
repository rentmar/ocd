<main role="main">
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
				<h3 class="text-center" >
					ELECCIONES JUDICIALES 2024
				</h3>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<table class="table table-striped table-hover ">
					<thead>
					<tr>
						<th>id</th>
						<th>Nombre</th>
						<th>Accion</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>1</td>
						<td>Cuestionario 1 - Apertura y funcionamiento de recintos</td>
						<td>
							<?php if(!$banderaHoja1): ?>
								<a href="<?php echo site_url('EleccionesJudiciales2024/hoja1/'); ?>">
									Nuevo
								</a>
							<?php else: ?>
								<a href="">
									Editar
								</a>
								<a href="<?php echo site_url('EleccionesJudiciales2024/reset1/'.$hoja1->idfrhoja1); ?>">
									Reset
								</a>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Cuestionario 2 - Cierre, computo y escrutinio</td>
						<td>
							<?php if(!$banderaHoja2): ?>
								<a href="<?php echo site_url('EleccionesJudiciales2024/hoja2/'); ?>">
									Nuevo
								</a>
							<?php else: ?>
								<a href="?>">
									Editar
								</a>
								<a href="<?php echo site_url('EleccionesJudiciales2024/reset2/'.$hoja2->idfrhoja2); ?>">
									Reset
								</a>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Repositorio de imagenes </td>
						<td>
							<a href="<?php echo site_url(''); ?>">
								Ingresar
							</a>
						</td>
					</tr>

				</table>

			</div>

		</div>
	</div>
</main>

