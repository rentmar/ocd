<html>
	Medio:
	<?php $opciones = 0;$ver=base_url()."MedioComunicacion/agregarMedioComunicacion";?>
	<?php //$ida=2;$ver=base_url()."MedioComunicacion/modificarMedioComunicacion/".$ida;?>
	<?php echo $ver;?>
	<form action="<?php echo $ver;?>" method='POST'>
		<label for="nombre_medio"> MedioComunicacion:</label><br>
		<input type="text" id="nombre_medio" name="nombre_medio"><br>
		<select class="combo" id='rel_idtipomedio' name='rel_idtipomedio'>
			<option value="0">Seleccionar</option>
		<?php foreach ($tipos as $tm) {?>
			<option value='<?php echo $tm->idtipomedio;?>'><?php echo $tm->nombre_tipo;?></option>
		<?php } ?>
		<?php if ($opciones == 0) {?>
			</select>
			<?php foreach ($departamentos as $d) {?>
				<input type="checkbox" id='<?php echo "d".$d->iddepartamento; ?>' name='<?php echo "d".$d->iddepartamento; ?>' value='<?php echo $d->iddepartamento; ?>'>
				<label for='<?php echo "d".$d->iddepartamento; ?>'> <?php echo $d->nombre_departamento;?></label><br>
			<?php } ?>
		<?php } ?>
		<?php if ($opciones == 1) {?>
			</select>
			<?php foreach ($departamentos as $d) {?>
				<input type="checkbox" checked='true' id='<?php echo "d".$d->iddepartamento; ?>' name='<?php echo "d".$d->iddepartamento; ?>' value='<?php echo $d->iddepartamento; ?>'>
				<label for='<?php echo "d".$d->iddepartamento; ?>'> <?php echo $d->nombre_departamento;?></label><br>
			<?php } ?>
		<?php } ?>
		<input type="submit" value="accion">
	</form>
	
</html>