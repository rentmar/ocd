<main role="main">
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
				<h3 class="text-center" >
					Formularios Veedurias
				</h3>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores ">
				<div>
					<table id="normas-tabla" class="table table-striped table-hoover">
						<thead>
						<tr id="datos">
							<th>No</th>
							<th>Fecha</th>
							<th>Formulario</th>
							<th>Usuario</th>
							<th>Estado</th>
							<th>Accion</th>
						</tr>
						</thead>
						<tbody>
						<?php if(isset($veedurias)): ?>
							<?php foreach ($veedurias as $n): ?>
								<tr>
									<td><?php echo $n->idfvresp; ?></td>
									<td><?php echo mdate('%m-%d-%Y', $n->fecha_registro); ?></td>
									<td><?php echo $n->nombre; ?></td>
									<td><?php echo $n->username;?></td>
									<?php if($n->es_valido): ?>
										<td class="table-info" >Activa</td>
									<?php else: ?>
										<td class="table-danger" >Inactiva</td>
									<?php endif; ?>

									<td>
										<?php if($n->es_valido): ?>
											<a href="<?php echo site_url('manejoDB/cambiarEstadoVeeduria/'.$n->idfvresp);?>" data-toggle="tooltip" title="Activa/Desactiva">
												<i class="fas fa-toggle-on"></i>
											</a>
										<?php else: ?>
											<a href="<?php echo site_url('manejoDB/cambiarEstadoVeeduria/'.$n->idfvresp);?>" data-toggle="tooltip" title="Activa/Desactiva" >
												<i class="fas fa-toggle-off"></i>
											</a>
										<?php endif; ?>
										<a href="<?php echo site_url('veeduria/editar/'.$n->idfvresp); ?>">
											Editar<i class="fas fa-edit"></i>
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
	</div>
	<br>
</main>



