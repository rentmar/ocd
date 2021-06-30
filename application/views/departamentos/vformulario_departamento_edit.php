
<?php echo form_open('departamentos/procesarEditar')?>
	<input type="hidden" id="identificador" name="identificador" value="<?php echo $dep->iddepartamento; ?>" >
	<label for="departamento">Departamento:</label><br>
	<input type="text" id="departamento" name="departamento" value="<?php echo $dep->nombre_departamento;?>">
	<br>
	<br>
	<input type="submit" value="Submit">
<?php echo form_close(); ?>
