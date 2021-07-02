<html>
	Actor:
	<?php //$ver=base_url()."actor/agregarActor";?>
	<?php $ida=11;$ver=base_url()."actor/modificarActor/".$ida;?>
	<?php echo $ver;?>
	<form action="<?php echo $ver;?>" method='POST'>
		<label for="nombre_actor">Nombre Actor:</label><br>
		<input type="text" id="nombre_actor" name="nombre_actor"><br>
		<!--<label for="lname">Last name:</label><br>
		<input type="text" id="lname" name="lname">-->
		<input type="submit" value="accion">
	</form>
	
</html>