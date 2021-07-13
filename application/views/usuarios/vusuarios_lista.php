<main role="main">
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<div id="caja_boton">
					<div id="contenedor-submit">
						<a href="<?php echo site_url('usuarios/crearusuario/'.$grupo);?>"><input type="submit" class="BOTON" value="CREAR"></a>
						<a href=""><input type="submit" class="BOTON" value="CANCELAR"></a>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<h3 class="text-center">
					<?php echo "Usuarios ".$titulo; ?>
				</h3>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<table>
					<tr id="datos">
						<th>Nro</th>
						<th>Usuario</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Departamento</th>
						<th>Accion</th>
					</tr>
					<?php foreach ($usuarios as $u) {?>
						<tr>
							<td><?php echo $u->id;?></td>
							<td><?php echo $u->username;?></td>
							<td><?php echo $u->first_name;?></td>
							<td><?php echo $u->last_name;?></td>
							<td><?php echo $u->rel_iddepartamento;?></td>
							<td><a href="<?php echo site_url('usuarios/editarusuario/'.$u->id);?>">editar</a></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	<br>
</main>
