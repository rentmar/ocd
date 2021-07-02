<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<title> Reformas electorales </title>
	<style>
		body {
			background-color:#d3d3d3;
			margin:0;
		}
		.text-info{
			color:#ffffff;
			text-decoration-color:none;
		}
		header {
			background-color:#7f182b;
		}
		#btn-menu{
			display:none;
		}
		header label {
			display:none;
			width: 60px;
			height:60px;
			padding: 15px 10px 15px 10px;
		}
		header label:hover{
			cursor:pointer;
			background:rgba(0,0,0,0.2);
		}
		.menu {
			width:100%;
		}
		.menu ul {
			margin:0;
			list-style:none;
			padding:0;
			display:flex;
		}

		.menu li :hover{
			background:rgba(0,0,0,0.2);
		}
		.menu li a {
			display:block;
			padding: 15px 20px;
			color: #ffffff;
			text-decoration:none;
		}
		@media (max-width:768px) {
			header label {
				display: block;
			}
			.menu {
				position: absolute;
				background:#980025;
				height:100%;
				max-width:100%;
				margin-left:-100%;
				transition: all 1s;
			}
			.menu ul {
				flex-direction: column;
			}
			#btn-menu:checked~*.menu {
				margin:0;
			}
		}
		#header{
			background-color:#662d91;
			text-align:center;
			padding-bottom:10px;
			width:100%;

		}
		#barra{
			background-color:#343a40;
			padding:30px 15px 10px 15px;
			text-align:right;
		}
		.text-info h2{
			color: #ffffff;
			font-size:13pt;
		}
		#header img{
			max-width:280px;
			display: block;
			padding:20px 10px 0px 10px;
			margin-left: auto;
			margin-right: auto;
		}
		#Título_cabecera{
			font-family: Verdana;
			line-height:140%;
			color:#ffffff;
			font-size:14pt;
			text-align:center;
		}
		p{
			font-family: Helvetica;
			font-size:11pt;
			line-height:140%;
			letter-spacing:-0.2px;
		}
		select {
			padding:6px 2px;
			border-radius:6px;
			background-color:#d3d3d3;
		}
		.contenedor_superior{
			background-color:#8cc63f;
			border-top-left-radius:10px;
			border-top-right-radius: 10px;
			padding:20px 30px 10px 30px;
		}

		#contenedor_pequeño {
			height:25px;
		}
		div .contenedor_inferior{
			background-color:#ffffff;
			padding:20px 30px 10px 30px;
			border-bottom-left-radius:10px;
			border-bottom-right-radius: 10px;
		}
		h3 {
			font-family: Verdana;
			font-weight:bold;
			line-height:140%;
			text-align:left;
			font-size:18pt;
		}
		h4 {
			font-family: Helvetica;
			font-weight:bold;
			line-height:140%;
			text-align:left;
			font-size:14pt;
		}

		p {
			text-align:left;
			font-family: Helvetica;
			font-size:11pt;
		}

		#Subtemas {
			color:#ffffff;
		}
		.contenedores_divididos {
			max-width:740px;
			margin-left:auto;
			margin-right:auto;
		}
		.contenedores{
			background-color:#ffffff;
			max-width:740px;
			margin-left:auto;
			margin-right:auto;
			padding:20px 30px 20px 30px;
			border-radius:10px;
		}
		input[type=radio] {
			width:20px;
			height:30px;
			border:0px;
		}

		textarea {
			font-family: Verdana;
			font-size:12pt;
			line-height:120%;
			border-top:1px #cccccc;
			border-left:none;
			border-right:none;
			width:100%;
			color:#595959;
		}

		input[type=date] {
			border-top:1px #cccccc;
			border-left:none;
			border-right:none;
			font-family: Verdana;
			font-size:12pt;
			color:#595959;
		}

		input[type=text] {
			border-top:1px #cccccc;
			border-left:none;
			border-right:none;
			font-size:12pt;
			color:#595959;
		}

		#BOTON{
			background-color:#474142;
			color:#ffffff;
			font-family: Verdana;
			border-radius:10px;
			padding:10px 30px 10px 30px;
		}
		.form-group{
			font-family:Verdana;
			font-size:14px;
			vertical-align:9px;
		}

		#contenedor-submit {
			max-width:740px;
			margin-left:auto;
			margin-right:auto;
		}
	</style>
</head>
<body>
<header>
	<div id="header">
		<img src="<?php echo base_url('assets/img/logo/logo-sin-fondo.png')?>" alt="Logo CD">
		<h4 id="Título_cabecera"></h4>
	</div>
	<div id="barra">
		<div class="visible-xs">
			<a href="">
				<span id="Label" class="text-info"><h2> Bienvenido, <b>Alejandro</b><h2></span>
			</a>
		</div>
	</div>
	<div>
		<input type="checkbox" id="btn-menu">
		<label for="btn-menu"><img src="/img/icono-menu.png" alt=""width="35px"></label>
		<nav class="menu">
			<ul>
				<li><a href="">Inicio</a></li>
				<li><a href="">Grafica</a></li>
				<li><a href="">Descarga de datos</a></li>
				<li><a href="">Envio en mapa</a></li>
				<li><a href="">Estado</a></li>
				<li><a href="">Instantánea</a></li>
				<li><a href="">Cerrar sesion</a></li>
			</ul>
		</nav>
	</div>
</header>
<div>
	<div>

		<div>
		</div>
		<br>
		<main>
			<form action="<?php echo base_url().'index.php/Noticia/IngresardatosAtNoticia'; ?>" method="post">
			<div class="contenedores_divididos">
				<div class="contenedor_superior" id="contenedor_pequeño">
				</div>
				<div class="contenedor_inferior">
					<h3 id="Título_formulario"> Reformas electorales </h3>
				</div>
			</div>
			<br>
			<div class="contenedores">
				<label for="fecha">Introduzca la fecha de publicación/difusión de la noticia:</label><br>
				<input type="date" id="fecha" name="fecha" required >
				<input type="hidden" id="idformulario" name="idformulario" value="<?php echo $idformulario; ?>" >
			</div>
			<br>
			<div class="contenedores">

				<label for="tipo-medio">Tipo de Medio:</label><br>
				<select id="tipo-medio" name="tipo-medio" class="form-control">
					<option value=" " >Seleccione el Tipo de Medio</option>
					<?php foreach ($tipo_medio as $key=>$element): ?>
						<option value="<?php echo $element['tipo_id']; ?>" ><?php echo $element['tipo_nombre']; ?></option>
					<?php endforeach; ?>
				</select>

			</div>
			<br>
			<div class="contenedores">

				<label>Escoja el medio al cual hizo el seguimiento:</label><br>
				<select id="medio" name="medio" class="form-control" >
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
				<input type="text" id="url" name="url" required class="form-control" >
			</div>
			<br>
			<div class="contenedores">
				<label>Escoja el tipo de actor que es la fuente de la noticia:</label><br>
				<?php $contador = 0; ?>
				<?php foreach ($actor as $key => $element): ?>
					<?php if($contador == 0): ?>
						<input type="radio" id="radio<?php echo $element['idactor']; ?>" name="actor_nombre" value="<?php echo $element['idactor']; ?>"  checked >
						<label for="radio<?php echo $element['idactor']; ?>"><?php echo $element['nombre_actor']; ?></label><br>
						<?php $contador++; ?>
					<?php else: ?>
						<input type="radio" id="radio<?php echo $element['idactor']; ?>" name="actor_nombre" value="<?php echo $element['idactor']; ?>" >
						<label for="radio<?php echo $element['idactor']; ?>"><?php echo $element['nombre_actor']; ?></label><br>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<br>
			<div class="contenedores">
				<label>Escoge el tema al que está referido la nota :</label><br>
				<select id="tema" name="tema" class="form-control" >
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
	</form>
</div>
	<script>var baseurl = "<?php echo site_url(); ?>";</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
	<script src="<?php echo base_url('assets/js')?>/offcanvas.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/cuestionarios.js"></script>


</body>
</html>
