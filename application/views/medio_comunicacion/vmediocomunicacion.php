<html>
	
	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
		<div id="caja_boton">
			<div id="contenedor-submit">
				<a href=""><input type="submit" class="BOTON" value="CREAR"></a>
				<a href=""><input type="submit" class="BOTON" value="CANCELAR"></a>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
		<table>
			<tr id="datos">	
			<th>Nro</th>	
			<th>Medio Comunicacion</th>
			<th>Tipo Medio</th>
			<th>Accion</th>
			</tr>
			<?php foreach ($medios as $m) {?>
			<tr>
				<td><?php echo $m->idmedio;?></td>
				<td><?php echo $m->nombre_medio;?></td>
				<td><?php echo $m->rel_idtipomedio;?></td>
				<td><a href="#">editar</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</html>