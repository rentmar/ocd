<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<title> Datos de usuario </title>
			<style>
				body {
					background-color:#d3d3d3;
				}
				
				#Cabecera {
					background-color:#7f182b;
					padding:1px;
				}
				
				div #contenedor_vacío{
					background-color:#ffffff;
					color:#ffffff;
					width:100%;
					height:40px;
				}
				
				div #Caja_de_orden {
					padding-top:5px;
					padding-bottom:50px;
				}
				
				div .Caja_de_datos {
					background-color:#ffffff;
					max-width:750px;
					margin-left:auto;
					margin-right:auto;
					padding-right:40px; 
					padding-left:20px;
				}
				
				p {
					text-align:center;
					font-family: Helvetica;
					line-height:120%;
				}
				
				div #Caja_de_datos{	
					border-radius:5px;
					margin-top:1px;
					padding-top:40px;
					padding-bottom:20px;
				}
				
				#Título_cabecera {
					color:#ffffff;
				}
				
				h3 {
					font-family: Verdana;
					line-height:140%;
					text-align:center;
				}
				
				input {
					padding:10px;
				}
				.form-group{
					font-family: Verdana;
					font-weight: Bold;
					font-size:12px;
				}
				#cuadro {
					width:100%;
					background-color:#e6edf7;
				}
				#BOTON {
					background-color:#474142;
					color:#ffffff;
					font-family: Verdana;
					border-radius:10px;
				}
				.red {
					color:#ff0000;
				}
			</style>
		</head>
		<body>
			<div>
				<div id="Cabecera">
					<img src="<?php echo base_url('assets/img/logo/LogoCD.jpg');?>" alt="Logo CD">
					<h3 id="Título_cabecera"> Elecciones subnacionales 2021 - Bolivia </h3>
				</div>
				<div id="contenedor_vacío"></div>
			</div>
			<br>
			<div id="esquinas_redondeadas">		
				<div id="Caja_de_orden" class="Caja_de_datos">
					<h3 id="Título_central"> Editar Datos de  Usuario: <?php echo $usuario->username; ?> </h3>
					<p></p>
				</div>
				<div id="Caja_de_datos" class="Caja_de_datos">
					<?php echo form_open('usuarios/procesarEditar')?>
                        <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $usuario->id; ?>" >

                      <label for="nombre" class="form-group"> Nombre </label>
                        <span class="red"> * </span>
                        <br>
                        <input type="text" id="cuadro" name="nombre" value="<?php echo $usuario->first_name; ?>" >
                        <br><br>
                        <label for="apellido" class="form-group"> Apellido </label>
                        <span class="red"> * </span>
                        <br>
                        <input type="text" id="cuadro" name="apellido" value="<?php echo $usuario->last_name; ?>" >
                        <br><br>
						<label for="carnet" class="form-group"> Carnet de identidad </label>
						<span class="red"> * </span>
						<br>
						<input type="text" id="cuadro" name="carnet" value="<?php echo $usuario->carnet_identidad;?>" >
						<br><br>

                        <label for="departamento" class="form-group">Departamento</label>
                        <select id="departamento" name="departamento">
                            <?php foreach ($departamentos as $d): ?>
                                <?php if($d->iddepartamento == $usuario->departamento): ?>
                                    <option value="<?php echo  $d->iddepartamento;?>" selected  >
                                        <?php echo $d->nombre_departamento;  ?>
                                    </option>
                                <?php else: ?>
                                    <option value="<?php echo  $d->iddepartamento;?>"  >
                                        <?php echo $d->nombre_departamento;  ?>
                                    </option>
                                <?php endif; ?>

                            <?php  endforeach;  ?>
                        </select>
                        <br><br>
                        <label for="ubicacion" class="form-group">Ubicacion </label>
                        <span class="red">  </span>
                        <input type="text" id="latitud" name="latitud"  placeholder="latitud"
                               value="<?php echo $usuario->latitud; ?>"  >
                        <input type="text" id="longitud" name="longitud" placeholder="longitud"
                               value="<?php echo $usuario->longitud; ?>" >
                        <br><br>

						<input type="submit" id="BOTON" value="EDITAR USUARIO">
						<input type="submit" id="BOTON" value="CANCELAR">
					<?php echo form_close()?>
				</div>
			</div>
		</body>