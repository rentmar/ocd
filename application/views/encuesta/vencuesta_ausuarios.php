<main role="main">
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<div id="caja_boton">
					<div id="contenedor-submit">
<!--						<a href="<?php echo site_url('encuesta/crearSeccion');?>">
							<input type="submit" class="BOTON" value="ASIGNAR ENCUESTA" style="width:190px; height:47px">
						</a>
						<a href="<?php echo site_url('/');?>">
							<input type="submit" class="BOTONROJO" value="CANCELAR">
						</a>
-->					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<table>
					<thead>
					<tr id="datos">
						<th>Nro</th>
						<th>Usuario</th>
						<th>Encuesta Asignada</th>
						<th>Asignar</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($usuariose as $e) {?>
						<tr>
							<td><?php echo $e->id;?></td>
							<td><?php echo $e->first_name.' '.$e->last_name;?></td>
							<td><?php echo $e->uinombre_encuesta;?></td>
							<td><a href="<?php echo site_url('Encuesta/asignarEncuesta/'.$e->id);?>"><i class="fas fa-edit"></i></a></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
	<br>
</main>


