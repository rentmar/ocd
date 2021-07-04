<!DOCTYPE html>
<html lang="es">
<head>
	
</head>
	<body>
		<div>
			<form action="<?php echo base_url().'index.php/Noticia/registrarNoticia'; ?>" method="post">
				<div class="contenedores_divididos">
					<div class="contenedor_superior" id="contenedor_pequeño">
					</div>
					<div class="contenedor_inferior">
						<h3 id="Título_formulario"> Reformas electorales </h3>
					</div>
				</div>
				<br></br>
				<div>
					<label for="fecha">Introduzca la fecha de publicación/difusión de la noticia:</label><br>
					<input type="date" id="fecha" name="fecha" required ><br></br>
					<input type="hidden" id="idformulario" name="idformulario" value="1" >
					titular
					<input type="text" id="titular" name="titular" required class="form-control" ><br></br>
					resumen
					<input type="text" id="resumen" name="resumen" required  class="form-control" ><br></br>
					url
					<input type="text" id="url" name="url" required class="form-control" ><br></br>
					idactor
					<input type="text" id="idactor" name="idactor" required class="form-control" ><br></br>
					idtema
					<input type="text" id="idtema" name="idtema" required class="form-control" ><br></br>
					otrotema
					<input type="text" id="otrotema" name="otrotema" required class="form-control" ><br></br>
					idsubtema
					<input type="text" id="idsubtema" name="idsubtema" required class="form-control" ><br></br>
					otrosubtema
					<input type="text" id="otrosubtema" name="otrosubtema" required class="form-control" ><br></br>
					idmedio
					<input type="text" id="idmedio" name="idmedio" required class="form-control" <br></br>
				</div>
				<br>
				<div id="contenedor-submit">
					<input type="submit" id="BOTON" value="ENVIAR">
				</div>
			</form>
		</div>
	</body>
</html>
