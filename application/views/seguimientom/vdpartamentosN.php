<html>
	
<!--	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
		<div id="caja_boton">
			<div id="contenedor-submit">
				<a href="<?php //echo site_url('formulario/crearformulario');?>"><input type="submit" class="BOTON" value="CREAR"></a>
				<a href=""><input type="button" class="BOTON" value="CANCELAR"></a>
			</div>
		</div>
	</div>-->
	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
		<table>
			<tr id="datos">
			<th>Departamento</th>	
			<th>Cuestionarios</th>

			</tr>
			<?php foreach ($Departamentos as $f) {?>
			<tr>
				<td><?php echo $f->nombre_departamento;?></td>
				<td><?php echo $f->ndepartamento;?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</html>