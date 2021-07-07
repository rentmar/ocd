<html>
	
	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
		<div id="caja_boton">
			<div id="contenedor-submit">
				<a href="<?php echo site_url('formulario/crearformulario');?>"><input type="submit" class="BOTON" value="CREAR"></a>
				<a href=""><input type="button" class="BOTON" value="CANCELAR"></a>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
		<table>
			<tr id="datos">	
			<th>Nro</th>	
			<th>Formulario</th>
			<th>Accion</th>
			</tr>
			<?php foreach ($formularios as $f) {?>
			<tr>
				<td><?php echo $f->idcuestionario;?></td>
				<td><?php echo $f->nombre_cuestionario;?></td>
				<td><a href="<?php echo site_url('formulario/editarformulario/'.$f->idcuestionario);?>">Editar</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</html>