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
                        <th>Resumen</th>
                        <th>Ley en Tratamiento</th>
                        <th>Ley Sancionada</th>
                        <th>Ley Aprobada</th>
                        <th>Ley con Modificacion</th>
                        <th>Ley Promulgada</th>
                        <th>Accion</th>
                    </tr>
                    <?php foreach ($usuarios as $u) {?>
                    <tr>
                            <td><?php echo $u->idusuario;?></td>
                            <td><?php echo $u->username;?></td>
                            <td><?php echo $u->first_name;?></td>
                            <td><?php echo $u->last_name;?></td>
                            <td><?php echo $u->nombre_departamento;?></td>
                            <td><a href="<?php echo site_url('Usuarios/editarUsuario/'.$u->idusuario);?>">editar</a></td>
                    </tr>
                    <?php } ?>
		</table>
	</div>
</html>