	<br>
	<div id="esquinas_redondeadas">		
		<div id="Caja_de_orden" class="Caja_de_datos">
			<h3 id="Título_central"> Crear Nuevo Tema</h3>
		</div>
		<div id="Caja_de_datos" class="Caja_de_datos">
			<form action="<?php echo base_url().'index.php/Tema/agregarTema'; ?>" method="post">
				<label for="nombre_tema" class="form-group"> Nombre de Tema </label> 
				<span class="rojo"> * </span>
				<br>
				<input type="text" id="cuadro" name="nombre_tema"  required>
				<br><br>
				<label for="cuestionario" class="form-group"> Formulario del Tema </label> 
				<span class="rojo"> * </span>
				<br>
				<select name="idcuestionario" id="idcuestionario">
					<option value="0"></option>
					<?php foreach ($cuestionarios as $c) {?>
						<option value="<?php echo $c->idcuestionario;?>"><?php echo $c->nombre_cuestionario;?></option>
					<?php } ?>
				</select>
				<br><br>
			    <input type="submit" id="BOTON" value="CREAR">
				<a href="<?php echo site_url('Tema/');?>"><input type="button" class="BOTONROJO" value="CANCELAR"></a>
			</form>
		</div>
	</div>