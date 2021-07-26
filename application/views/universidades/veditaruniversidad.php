	<br>
	<div id="esquinas_redondeadas">		
		<div id="Caja_de_orden" class="Caja_de_datos">
			<h3 id="Título_central"> Editar Universidad</h3>
		</div>
		<div id="Caja_de_datos" class="Caja_de_datos">
			<form action="<?php echo base_url().'index.php/Universidad/modificarUniversidad/'.$u->iduniversidad; ?>" method="post">
				<label for="nombre_universidad" class="form-group"> Nombre de Universidad </label> 
				<span class="rojo"> * </span>
				<br>
				<input type="text" id="cuadro" name="nombre_universidad" value="<?php echo $u->nombre_universidad;?>" required>
				<br><br>
			    <input type="submit" id="BOTON" value="EDITAR">
				<a href="<?php echo site_url('Universidad/');?>"><input type="button" class="BOTON" value="CANCELAR"></a>
			</form>
		</div>
	</div>