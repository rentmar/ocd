
	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
		<div id="caja_boton">
			<div id="contenedor-submit">
				<a href="<?php echo site_url('actor/crearactor');?>"><input type="submit" class="BOTON" value="CREAR"></a>
				<a href=""><input type="submit" class="BOTON" value="CANCELAR"></a>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
		<table>
			<tr id="datos">	
			<th>Nro</th>	
			<th>Actor</th>
			<th>Accion</th>
			</tr>
			<?php foreach ($actores as $a) {?>
			<tr>
				<td><?php echo $a->idactor;?></td>
				<td><?php echo $a->nombre_actor;?></td>
				<td><a href="<?php echo site_url('actor/editaractor/'.$a->idactor);?>">editar</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>

