	<br>
	<div id="esquinas_redondeadas">		
		<div id="Caja_de_orden" class="Caja_de_datos">
			<h3 id="Título_central"> Crear Nueva Universidad</h3>
		</div>
		<div id="Caja_de_datos" class="Caja_de_datos">
			<form action="<?php echo base_url().'index.php/Universidad/agregarUniversidad'; ?>" method="post">
				<label for="nombre_universidad" class="form-group"> Nombre de Universidad </label> 
				<span class="rojo"> * </span>
				<br>
				<input type="text" id="cuadro" name="nombre_universidad"  required>
				<br><br>
			    <input type="submit" id="BOTON" value="CREAR">
				<a href="<?php echo site_url('Universidad/');?>"><input type="button" class="BOTONROJO" value="CANCELAR"></a>
			</form>
		</div>
	</div>