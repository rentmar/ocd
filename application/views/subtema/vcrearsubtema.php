	<br>
	<div id="esquinas_redondeadas">		
		<div id="Caja_de_orden" class="Caja_de_datos">
			<h3 id="Título_central"> Crear Nuevo SubTema</h3>
		</div>
		<div id="Caja_de_datos" class="Caja_de_datos">
			<form action="<?php echo base_url().'index.php/SubTema/agregarSubTema'; ?>" method="post">
				<label for="nombre_subtema" class="form-group"> Nombre de SubTema </label> 
				<span class="rojo"> * </span>
				<br>
				<input type="text" id="cuadro" name="nombre_subtema"  required>
				<br><br>
				<label for="idtema" class="form-group"> Escoger Tema al que pertenece el SubTema</label> 
				<span class="rojo"> * </span>
				<br>
				<select name="idtema" id="idtema">
					<option value="0"></option>
					<?php foreach ($temas as $t) {?>
						<option value="<?php echo $t->idtema;?>"><?php echo $t->nombre_tema;?></option>
					<?php } ?>
				</select>
				<br><br>
			    <input type="submit" id="BOTON" value="CREAR">
				<a href="<?php echo site_url('SubTema/');?>"><input type="button" class="BOTONROJO" value="CANCELAR"></a>
			</form>
		</div>
	</div>