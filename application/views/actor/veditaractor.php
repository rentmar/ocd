	<br>
	<div id="esquinas_redondeadas">		
		<div id="Caja_de_orden" class="Caja_de_datos">
			<h3 id="Título_central"> Editar Actor</h3>
		</div>
		<div id="Caja_de_datos" class="Caja_de_datos">
			<form action="<?php echo base_url().'index.php/actor/modificarActor/'.$a->idactor; ?>" method="post">
				<label for="nombre_actor" class="form-group"> Nombre de Actor </label> 
				<span class="rojo"> * </span>
				<br>
				<input type="text" id="cuadro" name="nombre_actor" value="<?php echo $a->nombre_actor;?>" required>
				<br><br>
			    <input type="submit" id="BOTON" value="EDITAR">
				<a href="<?php echo site_url('actor/');?>"><input type="button" class="BOTON" value="CANCELAR"></a>
			</form>
		</div>
	</div>