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
			<th>Tema</th>
			<th>Formulario</th>
			<th>Accion</th>
			</tr>
			<?php foreach ($temas as $t) {?>
			<tr>
				<td><?php echo $t->idtema;?></td>
				<td><?php echo $t->nombre_tema;?></td>
				<td><a href="#">editar</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</html>