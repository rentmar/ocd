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
			<th>Nombre</th>	
			<th>Apellido</th>
			<th>Departamento</th>
<!--                         <th>Cuestionario</th>
                         <th>Numero de Cuestionarios</th>-->
                        <?php foreach ($NumeroDeCuestionarios as $nC) {?>
                        <th><?php echo "fecha ".$nC->nombre_cuestionario;?></th>
                        <th><?php echo $nC->nombre_cuestionario;?></th>
                        <?php } ?>
                        

			</tr>
			<?php foreach ($SeguimientoM1 as $f) {?>
			<tr>
				<td><?php echo $f->nombre;?></td>
				<td><?php echo $f->apellido;?></td>
				<td><?php echo $f->departamento;?></td>
                                <?php foreach ($NumeroDeCuestionarios as $NDC) {?>
                                    <?php $cuestionarios=$NDC->nombre_cuestionario; ?>
                                        <?php $auxiliar="fecha ".$NDC->nombre_cuestionario; ?>
                                <td><?php echo $f->$auxiliar;?></td>
                                <td><?php echo $f->$cuestionarios; ?></td>
                                <?php } ?>
			</tr>
			<?php } ?>
		</table>
	</div>
</html>