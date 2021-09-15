<main role="main">
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<div id="esquinas_redondeadas">
					<div id="Caja_de_orden" class="Caja_de_datos">
						<h3 id="Título_central"> Editar Pregunta</h3>
					</div>
					<div id="Caja_de_datos" class="Caja_de_datos">
						<?php echo site_url('Encuesta/modificarPreguntaUI/'.$pregunta->iduipregunta);?>
						<form action="<?php echo site_url('Encuesta/modificarPreguntaUI/'.$pregunta->iduipregunta);?>" method="post">
							<label for="idseccion" class="form-group"> Elegir Seccion </label>
							<span class="rojo"> * </span>
							<br>
							<select name="idseccion" id="idseccion">
								<option value="">Elegir Seccion</option>
								<?php foreach ($secciones as $s) {?>
									<?php if($pregunta->rel_iduiseccion==$s->iduiseccion) {?>
										<option selected="true" value="<?php echo $s->iduiseccion;?>">
										<?php echo "Encuesta: ".$s->uinombre_encuesta.",Modulo:".$s->rel_iduimodulo.",Seccion".$s->iduiseccion;?>
										</option>
									<?php } ?>
									<?php if($pregunta->rel_iduiseccion!=$s->iduiseccion) {?>
										<option value="<?php echo $s->iduiseccion;?>">
										<?php echo "Encuesta: ".$s->uinombre_encuesta.",Modulo:".$s->rel_iduimodulo.",Seccion".$s->iduiseccion;?>
										</option>
									<?php } ?>
								<?php } ?>
							</select>
							<br><br>
							<label for="nombre_pregunta" class="form-group"> Pregunta </label>
							<span class="rojo"> * </span>
							<br>
							<input type="text" id="cuadro" name="nombre_pregunta" value="<?php echo $pregunta->uipregunta_nombre;?>" required>
							<br><br>
							<label for="ordenpregunta" class="form-group">Orden Pregunta en la Seccion</label>
							<span class="rojo"> * </span>
							<br>
							<input type="number" id="cuadro" name="ordenpregunta" value="<?php echo $pregunta->uiorden_pregunta;?>" required>
							<br><br>
							<input type="submit" id="BOTON" value="EDITAR">
							<a href="<?php echo site_url('Encuesta/preguntaUI');?>"><input type="button" class="BOTONROJO" value="CANCELAR"></a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</main>


