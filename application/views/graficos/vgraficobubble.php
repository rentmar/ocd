<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			
			<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
			<script type="text/javascript" src="<?php echo base_url().'assets/d3/d3.js';?>"></script>
			<script type="text/javascript" src="<?php echo base_url().'assets/d3/tsiyur.js';?>"></script>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/d3/gestilo.css';?>">
			<title> Grafico BubleMap Bolivia </title>
			
		</head>
		<body>
			<header>
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="container-fluid">
						<div class="navbar-header">
						  <a class="navbar-brand" href="#">OCD</a>
						</div>
						<div class="visible-xs">
							<a href="">	<span id="label" class="text-info">Analisis Graficos <b></b></span></a>
						</div>
					</div>
				</nav>
			</header>
			<br>
			<main>
				<nav class="menu">
					<ul>
						<li><a href="<?php echo site_url('Graficos'); ?>">Volver</a></li>
					</ul>
				</nav>
				<br>
				<div class="contenedor_graficas">
					<div class="contenedor_superior" id="bublemap">
						<h5><b> <?php echo "Grafico de ".$titulo;?> </b></h5>
					</div>
					<div class="grafico">
						<div>
							<?php if($accion==1) { ?>
							<?php foreach ($cuestionarios as $c) { ?>
							<?php $direccion="render ('".base_url()."datos/cuestionario".$c->idcuestionario.".xml"."','".$c->nombre_cuestionario."','".$c->nombre_cuestionario."')";?>
							<button onclick="<?php echo $direccion;?>" class="btn btn-info" style="background-color:#474142;"><?php echo $c->nombre_cuestionario;?></button>
							<?php } ?>
							<?php } ?>
							<?php if ($accion==2) {?>
							<button type="button" data-toggle="modal" data-target="#actormodal" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
								Actores
							</button>
							<?php } ?>
							<?php if ($accion==3) {?>
							<button type="button" data-toggle="modal" data-target="#actormodal" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
								Actores
							</button>
							<?php $direccion="render ('".base_url()."datos/actor.xml','Actor','".$actor->nombre_actor."')";?>
							<button onclick="<?php echo $direccion;?>" class="btn btn-info" style="background-color:#474142;">Graficar</button>
							<?php } ?>
							<?php if ($accion==4) {?>
							<button type="button" data-toggle="modal" data-target="#tipomodal" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
								Tipo Medio
							</button>
							<?php } ?>
							<?php if ($accion==5) {?>
							<button type="button" data-toggle="modal" data-target="#tipomodal" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
								Tipo Medio
							</button>
							<?php $direccion="render ('".base_url()."datos/tipomedio.xml','TipoMedio','".$tipomedio->nombre_tipo."')";?>
							<button onclick="<?php echo $direccion;?>" class="btn btn-info" style="background-color:#474142;">Graficar</button>
							<?php } ?>
							<a class="btn btn-danger" href="<?php echo site_url('Graficos/seleccionBubble'); ?>">Atras</a>		
						</div>
						<br>
						<div id="contenedor-chart">
							<!-- aqui el chart -->
						</div>
						<br>
					</div>
					<br>
				</div>
<div class="modal" id="actormodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Grafico Actores</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('Graficos/llenarDatosBubbleXml');?>
			<div class="modal-body">
				<div class="form-group">
					<label for="idactor">
						Seleccionar Actor
					</label>
					<select class="combo" id="cuadro" name="idactor" required>
						<option></option>
						<?php foreach ($actores as $a) {?>
						<option value="<?php echo $a->idactor;?>"><?php echo $a->nombre_actor;?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" name="accion" value="3" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
					Elegir
				</button>
			<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal" id="tipomodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Grafico Tipo Medio</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('Graficos/llenarDatosBubbleXml');?>
			<div class="modal-body">
				<div class="form-group">
					<label for="idtipomedio">
						Seleccionar Tipo Medio
					</label>
					<select class="combo" id="cuadro" name="idtipomedio" required>
						<option></option>
						<?php foreach ($tiposmedio as $tm) {?>
						<option value="<?php echo $tm->idtipomedio;?>"><?php echo $tm->nombre_tipo;?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" name="accion" value="5" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
					Elegir
				</button>
			<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
			</main>

		</body>
</html>