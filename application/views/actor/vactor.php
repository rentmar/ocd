<main role="main">
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<div id="caja_boton">
					<div id="contenedor-submit">
						<a href="<?php echo site_url('actor/crearactor');?>">
							<input type="submit" class="BOTON" value="CREAR">
						</a>
						<a href="<?php echo site_url('/')?>">
							<input type="submit" class="BOTONROJO" value="CANCELAR">
						</a>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<table>
					<thead>
						<tr id="datos">
							<th>Nro</th>
							<th>Actor</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($actores as $a) {?>
						<tr>
							<td><?php echo $a->idactor;?></td>
							<td><?php echo $a->nombre_actor;?></td>
							<td><a href="<?php echo site_url('actor/editaractor/'.$a->idactor);?>">editar</a></td>
						</tr>
					<?php } ?>
					</tbody>


				</table>
			</div>

		</div>
	</div>
	<br>
</main>


