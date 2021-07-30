	<br>
	<div id="esquinas_redondeadas">		
		<div id="Caja_de_orden" class="Caja_de_datos">
			<h3 id="Título_central"> Crear Nuevo Departamento</h3>
		</div>
		<div id="Caja_de_datos" class="Caja_de_datos">
			<form action="<?php echo base_url().'index.php/Departamento/agregarDepartamento'; ?>" method="post">
				<label for="nombre_departamento" class="form-group"> Nombre de Departamento </label> 
				<span class="rojo"> * </span>
				<br>
				<input type="text" id="cuadro" name="nombre_departamento"  required>
				<br><br>
			    <input type="submit" id="BOTON" value="CREAR">
				<a href="<?php echo site_url('Departamento/');?>"><input type="button" class="BOTONROJO" value="CANCELAR"></a>
			</form>
		</div>
	</div>