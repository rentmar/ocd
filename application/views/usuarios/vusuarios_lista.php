<main role="main">
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<div id="caja_boton">
					<div id="contenedor-submit">
						<a href=""><input type="submit" class="BOTON" value="CREAR"></a>
						<a href=""><input type="submit" class="BOTON" value="CANCELAR"></a>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<h4></h4>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<table>
				</table>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<table>
					<tr id="datos">
						<th>Nro</th>
						<th>Departamento</th>
						<th>Accion</th>
					</tr>
					<?php foreach ($departamentos as $d) {?>
						<tr>
							<td><?php echo $d->iddepartamento;?></td>
							<td><?php echo $d->nombre_departamento;?></td>
							<td><a href="#">editar</a></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	<br>
</main>
