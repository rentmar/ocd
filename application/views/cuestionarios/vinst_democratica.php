<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title> Institucionalidad democrática </title>
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
			background:#662d91;
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
			background-color:#f7941d;
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
		<div id="header">
			<img src="/img/logo-sin-fondo.png" alt="Logo CD">
			<h4 id="Título_cabecera"> Elecciones subnacionales 2021 - Bolivia </h4>
		</div>
		<div>
		</div>
		<br>
		<main>
			<div class="contenedores_divididos">
				<div class="contenedor_superior" id="contenedor_pequeño">
				</div>
				<div class="contenedor_inferior">
					<h3 id="Título_formulario"> Institucionalidad democrática </h3>
				</div>
			</div>
			<br>
			<div class="contenedores">
				<h4> Introduzca la fecha de publicación/difusión de la noticia </h4>
				<p> Fecha </p>
				<input type="date">
			</div>
			<br>
			<div class="contenedores">
				<h4> Tipo de medio </h4>
				<form>
					<select name="medio" value="Seleccionar el Tipo de Medio">
						<option>Seleccione el Tipo de medio</option>
						<option>Página de Red Social</option>
						<option>Canal de televisión</option>
					</select>
				</form>
			</div>
			<br>
			<div class="contenedores">
				<h4> Escoja el medio al cual hizo el seguimiento </h4>
				<form>
					<select name="medio" value="Seleccionar canal">
						<option>Seleccione el medio</option>
						<option>Red UNITEL</option>
						<option>Red UNO</option>

					</select>
			</div>
			<br>
			<div class="contenedores">
				<h4> Escriba el titular de la noticia </h4>
				<input type="text" class="texto" value="Tu respuesta">
			</div>
			<br>
			<div class="contenedores">
				<h4> Escriba un pequeño párrafo que resuma la noticia </h4>
				<textarea id="Párrafo_pequeño">Tu respuesta</textarea>
			</div>
			<br>
			<div class="contenedores">
				<h4> Pegue el link donde se encuentra la noticia </h4>
				<input type="text" class="texto" value="Tu respuesta">
			</div>
			<br>
			<div class="contenedores">
				<h4> Escoja el tipo de actor que es la fuente de la noticia </h4>
				<form>
					<input type="radio" id="opción_1" name="actor">
					<label for="opción_1" class="form-group">Pertenece al Órgano Legislativo</label><br>
					<input type="radio" id="opción_2" name="actor">
					<label for="opción_2" class="form-group">Pertenece al Órgano Ejecutivo</label><br>
				</form>
			</div>
			<br>
			<div class="contenedores">
				<h4> Escoge el tema al que está referido la nota </h4>
				<form>
					<input type="radio" id="opción_1" name="tema">
					<label for="opción_1" class="form-group">Presentación de estatutos de organizaciones políticas</label><br>
					<input type="radio" id="opción_2" name="tema">
					<label for="opción_2" class="form-group">Competencias jurisdiccionales del TSE</label><br>
				</form>
			</div>
			<br>
			<div class="contenedores">
				<h4> Especifique otra </h4>
				<input type="text" class="texto" value="Tu respuesta">
			</div>
			<br>
			<div class="contenedores_divididos">
				<div class="contenedor_superior" id="contenedor_mediano">
					<h4 id="Subtemas"> Subtemas - Presentación de estatutos de organizaciones políticas </h4>
				</div>
				<div class="contenedor_inferior">
					<h4> Sobre qué versa la noticia </h4>
					<form>
						<input type="radio" id="opción_1" name="noticia">
						<label for="opción_1" class="form-group">Estatutos de organizaciones políticas - Ley 1096</label><br>
						<input type="radio" id="opción_2" name="noticia">
						<label for="opción_2" class="form-group">Otra</label><br>
					</form>
				</div>
			</div>
			<br>
			<div class="contenedores">
				<h4> Especifique otra </h4>
				<input type="text" class="texto" value="Tu respuesta">
			</div>
			<br>
			<div id="contenedor-submit">
				<input type="submit" id="BOTON" value="ENVIAR">
			</div>
	</div>
	</main>
</body>
</html>
