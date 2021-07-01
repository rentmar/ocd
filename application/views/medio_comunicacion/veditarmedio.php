<html>
	Medio:
	<?php $ida=2;$ver=base_url()."MedioComunicacion/modificarMedioComunicacion/".$ida;?>
	<?php echo $ver;?>
	<form action="<?php echo $ver;?>" method='POST'>
		
		<label for="nombre_medio"> MedioComunicacion:</label><br>
		<input type="text" id="nombre_medio" name="nombre_medio" value='<?php echo $medio->nombre_medio;?>'><br>
		
		<select class="combo" id='rel_idtipomedio' name='rel_idtipomedio'>
			<option value="0">Seleccionar</option>
		<?php foreach ($tipos as $tm) {?>
			<?php if ($tm->idtipomedio == $medio->rel_idtipomedio) {?>
				<option selected='true' value='<?php echo $tm->idtipomedio;?>'><?php echo $tm->nombre_tipo;?></option>
			<?php } ?>
			<?php if ($tm->idtipomedio != $medio->rel_idtipomedio) {?>
				<option value='<?php echo $tm->idtipomedio;?>'><?php echo $tm->nombre_tipo;?></option>
			<?php } ?>
		<?php } ?>
		</select>
		
		<?php $h=0; foreach ($departamentos as $d) {?>
			<?php foreach ($medio_departamento as $depto) {
				$h=0;
				if ($depto->rel_iddepartamento==$d->iddepartamento) 
				{
					$h=1;
					break;
				} 
			} 
			if ($h==1) {
			?>
				<input type="checkbox" checked='true' id='<?php echo "d".$d->iddepartamento; ?>' name='<?php echo "d".$d->iddepartamento; ?>' value='<?php echo $d->iddepartamento; ?>'>
				<label for='<?php echo "d".$d->iddepartamento; ?>'> <?php echo $d->nombre_departamento;?></label><br>	
			<?php } ?>
			<?php if ($h=0) { ?>
				<input type="checkbox" id='<?php echo "d".$d->iddepartamento; ?>' name='<?php echo "d".$d->iddepartamento; ?>' value='<?php echo $d->iddepartamento; ?>'>
				<label for='<?php echo "d".$d->iddepartamento; ?>'> <?php echo $d->nombre_departamento;?></label><br>	
			<?php } ?>
		<?php } ?>
		
		<!--<input type="hidden" id="rel_iddepartamento" name="rel_iddepartamento" value="4";><br>
		<!--<label for="lname">Last name:</label><br>
		<input type="text" id="lname" name="lname">-->
		<input type="submit" value="accion">
	</form>
	
</html>