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
			<th>Nombre</th>	
			<th>Apellido</th>
			<th>Departamento</th>
                        <th>Formulario</th>
                        <!--<th>NoticiasID</th>-->
                        <th>Formularios Realizados</th>
			</tr>
			<?php foreach ($SeguimientoMonitores as $f) {?>
			<tr>
				<td><?php echo $f->first_name;?></td>
				<td><?php echo $f->last_name;?></td>
				<td><?php echo $f->nombre_departamento;?></td>
                                <td><?php echo $f->nombre_cuestionario;?></td>
				<td><?php echo $f->nombre_cuestionario1;?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</html>