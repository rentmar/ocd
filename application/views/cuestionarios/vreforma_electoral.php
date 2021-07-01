<!DOCTYPE html>
<html>
<head>
	<title>odcdev</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>

<h1>Formulario REFORMA ELECTORAL</h1>

<div class="container">

	<form action="<>">
		<label for="fecha">Introduzca la fecha de publicación/difusión de la noticia:</label><br>
		<input type="date" id="fecha" name="fecha" required ><br><br>

		<label for="tipo-medio">Tipo de Medio:</label><br>
		<select id="tipo-medio" name="tipo-medio">
			<option value="" >Seleccione el Tipo de Medio</option>
			<?php foreach ($tipo_medio as $key=>$element): ?>
				<option value="<?php echo $element['tipo_id']; ?>" ><?php echo $element['tipo_nombre']; ?></option>
			<?php endforeach; ?>
		</select>
		<br><br>

		<label>Escoja el medio al cual hizo el seguimiento:</label><br>
		<select id="medio" name="medio" >
			<option value="0" >Seleccione medio</option>
		</select>
		<br><br>


		<label>Escriba el titular de la noticia:</label><br>
		<input type="text" id="titular" name="titular" >
		<br><br>

		<label>Escriba un pequeño párrafo que resuma la noticia:</label><br>
		<input type="text" id="resumen" name="resumen" >
		<br><br>

		<label>Pegue el link donde se encuentra la noticia:</label><br>
		<input type="text" id="url" name="url" >
		<br><br>


		<label>Escoja el tipo de actor que es la fuente de la noticia:</label><br>
		<?php $contador = 0; ?>
		<?php foreach ($actor as $key => $element): ?>
			<?php if($contador == 0): ?>
				<input type="radio" id="radio<?php echo $element['idactor']; ?>" name="actor_nombre" value="<?php echo $element['idactor']; ?>" checked >
				<label for="radio<?php echo $element['idactor']; ?>"><?php echo $element['nombre_actor']; ?></label><br>
				<?php $contador++; ?>
			<?php else: ?>
				<input type="radio" id="radio<?php echo $element['idactor']; ?>" name="actor_nombre" value="<?php echo $element['idactor']; ?>" >
				<label for="radio<?php echo $element['idactor']; ?>"><?php echo $element['nombre_actor']; ?></label><br>
			<?php endif; ?>
		<?php endforeach; ?>

		<br><br>


		<label>Escoge el tema al que está referido la nota :</label><br>
		<select id="tema" name="tema" >
			<option value=" " >Seleccione Tema</option>
			<?php foreach ( $tema as $key => $element): ?>
				<option value="<?php echo $element['idtema']; ?>" >
					<?php echo $element['nombre_tema']; ?>
				</option>
			<?php endforeach; ?>
				<option value="0" >Otro</option>
		</select>
		<br>
		<div id="otrotemacard">

		</div>
		<br><br>



		<div id="subtemacard" >


		</div>
		<div id="cajatexto" >

		</div>
		<br><br>


		<input type="submit" value="Enviar">
	</form>

</div>

<script>var baseurl = "<?php echo site_url(); ?>";</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/cuestionarios.js"></script>


</body>
</html>
