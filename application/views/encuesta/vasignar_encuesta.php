
<main role="main">
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores Caja_de_datos">
				<div id="esquinas_redondeadas">
					<div id="Caja_de_orden" class="Caja_de_datos">
						<h3 id="Título_central"> Asignacion Encuestas a Usuario </h3>
					</div>
					<div id="Caja_de_datos" class="Caja_de_datos">
						<?php echo form_open('Encuesta/agregarAsignacion/'.$usuario->id)?>
						<input type="hidden" id="cuadro" class="form-control" name="idusuario" value="<?php echo $usuario->id;?>">
						<div class="form-group">
							<label for="usuario" >
								Nombre de usuario
								<span class="text-danger"> * </span>
							</label>
							<input type="text" id="cuadro" class="form-control" name="usuario" value="<?php echo $usuario->username;?>">
						</div>
						<div class="form-group">
							<label for="carnet" >
								Carnet de identidad
								<span class="text-danger"> * </span>
							</label>
							<input type="text" id="cuadro" name="carnet"  class="form-control" value="<?php echo $usuario->carnet_identidad;?>">
						</div>
						<div class="form-group">
							<label for="departamento" >Departamento</label>
							<input type="text" id="cuadro" class="form-control" name="usuario" value="<?php echo $usuario->nombre_departamento;?>">
						</div>
						<div class="form-group">
							<label for="ubicacion">Ubicacion </label>
							<input type="text" id="ubicacion" name="ubicacion"  class="form-control cuadro" value="<?php echo $usuario->geolocalizacion;?>">
								    
						</div>
						<div class="form-group">
							<input type="submit" id="BOTON" value="ASIGNAR">
							<a href="<?php echo site_url('Encuesta/encuestaAusuarios');?>">
								<input type="button" class="BOTONROJO" value="CANCELAR">
							</a>
						</div>
						<?php echo form_close()?>
					</div>
				</div>
			</div>

		</div>
	</div>
	<br>



</main>

