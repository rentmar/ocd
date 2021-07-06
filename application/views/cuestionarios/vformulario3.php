
		<main>
			<br><br>
            <?php echo validation_errors(); ?>
			<?php echo form_open('formulario3/preenvio');?>

			<div class="contenedores_divididos">
				<div class="contenedor_superior3" id="contenedor_pequeño">
				</div>
				<div class="contenedor_inferior">
					<h3 id="Título_formulario">Formulario3 </h3>
				</div>
			</div>
			<br>
			<div class="contenedores">
				<label for="fecha">Introduzca la fecha de publicación/difusión de la noticia:</label><br>
				<input type="date" id="fecha" name="fecha" required >
				<input type="hidden" id="idformulario" name="idformulario" value="<?php echo $idformulario; ?>" >
				<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $idusuario;?>" >

			</div>
			<br>
			<div class="contenedores">

				<label for="tipo-medio">Tipo de Medio:</label><br>
				<select id="tipo-medio" name="idtipomedio" class="form-control">
					<option value=" " >Seleccione el Tipo de Medio</option>
					<?php foreach ($tipo_medio as $key=>$element): ?>
						<option value="<?php echo $element['tipo_id']; ?>" ><?php echo $element['tipo_nombre']; ?></option>
					<?php endforeach; ?>
				</select>

			</div>
			<br>
			<div class="contenedores">

				<label>Escoja el medio al cual hizo el seguimiento:</label><br>
				<select id="medio" name="idmedio" class="form-control" >
					<option value=" " >Seleccione medio</option>
				</select>
			</div>
			<br>
			<div class="contenedores">
				<label for="titular">Escriba el titular de la noticia:</label><br>
				<input type="text" id="titular" name="titular" required class="form-control" >

			</div>
			<br>
			<div class="contenedores">
				<label>Escriba un pequeño párrafo que resuma la noticia:</label><br>
				<input type="text" id="resumen" name="resumen" required  class="form-control" >

			</div>
			<br>
			<div class="contenedores">
				<label>Pegue el link donde se encuentra la noticia:</label><br>
				<input type="text" id="url" name="url" class="form-control" >
			</div>
			<br>
			<div class="contenedores">
				<label>Escoja el tipo de actor que es la fuente de la noticia:</label><br>
				<?php $contador = 0; ?>
				<?php foreach ($actor as $key => $element): ?>
					<?php if($contador == 0): ?>
						<input type="radio" id="radio<?php echo $element['idactor']; ?>" name="idactor" value="<?php echo $element['idactor']; ?>"  checked >
						<label for="radio<?php echo $element['idactor']; ?>"><?php echo $element['nombre_actor']; ?></label><br>
						<?php $contador++; ?>
					<?php else: ?>
						<input type="radio" id="radio<?php echo $element['idactor']; ?>" name="idactor" value="<?php echo $element['idactor']; ?>" >
						<label for="radio<?php echo $element['idactor']; ?>"><?php echo $element['nombre_actor']; ?></label><br>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<br>
			<div class="contenedores">
				<label>Escoge el tema al que está referido la nota :</label><br>
				<select id="tema" name="idtema" class="form-control" >
					<option value=" " >Seleccione Tema</option>
					<?php foreach ( $tema as $key => $element): ?>
						<option value="<?php echo $element['idtema']; ?>" >
							<?php echo $element['nombre_tema']; ?>
						</option>
					<?php endforeach; ?>
					<option value="0" >Otro</option>
				</select>
			</div>
			<br>
			<div id="otrotemac"  >

			</div>
			<br><br>
			<div id="subtemac" >

			</div>
			<br>
			<div id="otrosubtema">

			</div>
			<br><br>
			<div id="contenedor-submit">
				<input type="submit" id="BOTON" value="ENVIAR">
			</div>
	</main>
