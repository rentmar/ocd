<main role="main">
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
				<h3 class="text-center" >
					Formularios Control Social en la Jornada Censal
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
							<?php if(isset($jornadaCensal)): ?>
								<?php foreach($jornadaCensal as $jc): ?>
									<tr>
										<td><?php echo $jc->idfcsjc; ?></td>
										<td><?php echo $jc->fecha_reg_lit; ?></td>
										<td><?php echo $jc->nombre_cuestionario; ?></td>
										<td><?php echo $jc->username; ?></td>
										<?php if($jc->activo): ?>
											<td class="table-info" >Activa</td>
										<?php else: ?>
											<td class="table-danger" >Inactiva</td>
										<?php endif; ?>
										<td>
											<?php if($jc->activo): ?>
												<a href="<?php echo site_url('manejoDB/cambiarEstadoControlJornada/'.$jc->idfcsjc);?>" data-toggle="tooltip" title="Activa/Desactiva">
													<i class="fas fa-toggle-on"></i>
												</a>
											<?php else: ?>
												<a href="<?php echo site_url('manejoDB/cambiarEstadoControlJornada/'.$jc->idfcsjc);?>" data-toggle="tooltip" title="Activa/Desactiva" >
													<i class="fas fa-toggle-off"></i>
												</a>
											<?php endif; ?>											
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
