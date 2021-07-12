
			<br>
			<div id="esquinas_redondeadas">		
				<div id="Caja_de_orden" class="Caja_de_datos">
					<h3 id="Título_central"> Crear Nuevo Usuario </h3>
					<p></p>
				</div>
				<div id="Caja_de_datos" class="Caja_de_datos">
					<?php echo form_open('usuarios/procesarCrear')?>
						<label for="usuario" class="form-group"> Nombre de usuario </label>
						<span class="red"> * </span>
						<br>
						<input type="text" id="cuadro" name="usuario">
						<br><br>
                      <label for="nombre" class="form-group"> Nombre </label>
                        <span class="red"> * </span>
                        <br>
                        <input type="text" id="cuadro" name="nombre" >
                        <br><br>
                        <label for="apellido" class="form-group"> Apellido </label>
                        <span class="red"> * </span>
                        <br>
                        <input type="text" id="cuadro" name="apellido" >
                        <br><br>
						<label for="carnet" class="form-group"> Carnet de identidad </label>
						<span class="red"> * </span>
						<br>
						<input type="text" id="cuadro" name="carnet" >
						<br><br>
						<label for="email" class="form-group"> Correo electrónico </label>
						<span class="red"> * </span>
						<br>
						<input type="text" id="cuadro" name="email" >
						<br><br>
						<label for="password" class="form-group"> Contraseña </label>
						<span class="red"> * </span>
						<br>
						<input type="password" id="cuadro" name="password" >
                        <br><br>
                        <label for="password1" class="form-group">Comprobar Contraseña </label>
                        <span class="red"> * </span>
                        <input type="password" id="cuadro" name="password1" >
						<br><br>
                        <label for="grupo" class="form-group">Tipo de Usuario</label>
                        <select id="grupo" name="grupo">
                            <?php foreach ($grupos as $g): ?>
                            <option value="<?php echo $g->id ?>"  >
                                <?php echo $g->name; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <br><br>
                        <label for="departamento" class="form-group">Departamento</label>
                        <select id="departamento" name="departamento">
                            <?php foreach ($departamentos as $d): ?>
                            <option value="<?php echo  $d->iddepartamento;?>"  >
                                <?php echo $d->nombre_departamento;  ?>
                            </option>
                            <?php  endforeach;  ?>
                        </select>
                        <br><br>

						<label for="direccion" class="form-group">Direccion </label>
						<span class="red">  </span>
						<input type="text" id="direccion" name="direccion"  placeholder=""  >
						<br><br>

                        <label for="ubicacion" class="form-group">Ubicacion </label>
                        <span class="red">  </span>
                        <input type="text" id="ubicacion" name="ubicacion"  placeholder="ubicacion"  >
                        <br><br>

						<input type="submit" id="BOTON" value="CREAR USUARIO">
						<a href="<?php echo site_url('usuarios/listar/'.$grupo);?>"><input type="button" class="BOTON" value="CANCELAR"></a>
					<?php echo form_close()?>
				</div>
			</div>

