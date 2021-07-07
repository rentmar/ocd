<html>
	
	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
		<div id="caja_boton">
			<div id="contenedor-submit">
				<a href="<?php echo site_url('subtema/crearsubtema');?>"><input type="submit" class="BOTON" value="CREAR"></a>
				<a href=""><input type="submit" class="BOTON" value="CANCELAR"></a>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
		<table>
			<tr id="datos">	
			<th>Nro</th>	
			<th>SubTema</th>
			<th>Tema</th>
			<th>Accion</th>
			</tr>
			<?php foreach ($subtemas as $st) {?>
			<tr>
				<td><?php echo $st->idsubtema;?></td>
				<td><?php echo $st->nombre_subtema;?></td>
				<td><?php echo $st->rel_idtema;?></td>
				<td><a href="<?php echo site_url('subtema/editarsubtema/'.$st->idsubtema);?>">editar</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</html>