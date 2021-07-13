
			<br>
			<div id="esquinas_redondeadas">		
				<div id="Caja_de_orden" class="Caja_de_datos">
					<h3 id="Título_central"> Editar Datos de  Usuario </h3>
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
                                <?php if($d->iddepartamento == $usuario->rel_iddepartamento): ?>
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

						<label for="direccion" class="form-group">Direccion </label>
						<span class="red">  </span>
						<input type="text" id="direccion" name="direccion" value="<?php echo $usuario->direccion; ?>"  >
						<br><br>

						<label for="ubicacion" class="form-group">Ubicacion </label>
						<span class="red">  </span>
						<input type="text" id="ubicacion" name="ubicacion"  value="<?php echo $usuario->geolocalizacion; ?>"  >
						<br><br>



						<input type="submit" id="BOTON" value="EDITAR USUARIO">
						<a href="<?php echo site_url('usuarios/listar/'.$grupo->group_id);?>"><input type="button" class="BOTON" value="CANCELAR"></a>
						<?php echo form_close()?>
				</div>
			</div>
		
