<main role="main">
	<br><br>
	<div class="container"  >
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
				<br>
				<div class="card">
					<div class="card-header bg-primary">
						<h4>REGISTRAR</h4>
					</div>
					<?php
					/** @noinspection PhpLanguageLevelInspection */
					$attrs_part = [
						'id' => 'formregpart',
						'name' => 'formregpart',
					];
					?>
					<?php echo form_open('libro/updateLibro', $attrs_part); ?>
					<div class="card-body">
						<div class = "form-row">
							<div class = "form-group col-12">
								<label for = "num_libro">Libro:</label>
								<input type = "number" class =" form-control"
									   id = "num_libro" name="num_libro"
									   placeholder = "Numero de Libro"
									   value="<?php
									   		echo $libro_info->numero_libro;
									   ?>"
									   required>
							</div>

						</div>

						<div class="form-row">
							<div class="col">
								<hr>
							</div>
						</div>

						<div class = "form-row">
							<div class = "form-group col-6">
								<label for = "fecha_apertura">Fecha de Apertura:</label>
								<input type = "date" class =" form-control"
									   id = "fecha_apertura" name="fecha_apertura"
									   required
									   value="<?php
									   		echo $libro_info->fecha_apertura;
									   ?>">
							</div>
							<div class = "form-group col-6">
								<label for = "fecha_cierre">Fecha de Cierre:</label>
								<input type = "date" class = "form-control"
									   id = "fecha_cierre" name="fecha_cierre"
									   required
									   value="<?php
									   		echo $libro_info->fecha_cierre;
									   ?>">
							</div>
						</div>

						<div class="form-row">
							<div class="col">
								<hr>
							</div>
						</div>

						<div class="form-row">

							<div class="form-group col-6">
								<div class="form-group">
									<label for="departamento" >Departamento:</label>
									<select id="departamento" name="departamento" class="form-control" required>
										<option value="" >Seleccione un Departamento</option>
										<?php if(isset($departamentos)): ?>
											<?php foreach ($departamentos as $d): ?>
												<?php if($d->iddepartamento == $libro_info->iddepartamento): ?>
													<option value="<?php echo  $d->iddepartamento;?>"  selected >
														<?php echo $d->nombre_departamento;  ?>
													</option>
												<?php else: ?>
													<option value="<?php echo  $d->iddepartamento;?>"  >
														<?php echo $d->nombre_departamento;  ?>
													</option>
												<?php endif;?>
											<?php  endforeach;  ?>
										<?php endif; ?>
									</select>
								</div>
							</div>

							<div class="form-group col-6">
								<label for = "municipio">Municipio:</label>
								<input type = "text" class = "form-control"
									   id = "municipio" name="municipio"
									   placeholder = ""  required
									   value="<?php
									   		echo $libro_info->municipio;
									   ?>" >
							</div>
						</div>
						<div class="form-row">
							<div class="col">
								<hr>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-4">
								<label for = "partida_valida">Partidas validas:</label>
								<input type = "number" class = "form-control"
									   id = "partida_valida" name="partida_valida"
									   min="0"  max="100" value="<?php echo $libro_info->partidas_validas;?>">
							</div>
							<div class="form-group col-4">
								<label for = "partida_nula">Partidas nulas:</label>
								<input type = "number" class = "form-control"
									   id = "partida_nula" name="partida_nula"
									   min="0"  max="100" value="<?php echo $libro_info->partidas_nulas;?>">
							</div>
							<div class="form-group col-4">
								<label for = "partida_blanca">Partidas blancas:</label>
								<input type = "number" class = "form-control"
									   id = "partida_blanca" name="partida_blanca"
									   min="0"  max="100" value="<?php echo $libro_info->partidas_blancas;?>" >
							</div>
						</div>
						<div class="form-row">
							<div class="col">
								<hr>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-12">
								<label for = "observaciones">Obervaciones:</label>
								<textarea class="form-control" id="observaciones" name="observaciones" rows="5"><?php echo $libro_info->observaciones; ?></textarea>
							</div>
						</div>

						<div class="form-row">
							<div class="col">
								<hr>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-12">
								<input id="idusuario" name="idusuario" type="hidden"
									   class="form-control"
									   value="<?php
									   if(isset($usuario)){
										   echo $usuario->id;
									   }
									   ?>">
							</div>
							<div class="form-group col-12">
								<input id="idlibro" name="idlibro" type="hidden"
									   class="form-control"
									   value="<?php
									   if(isset($libro)){
										   echo $libro->idlibro;
									   }
									   ?>">
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type = "submit" class = "btn btn-primary">Enviar</button>
					</div>
					<?php echo form_close();?>

				</div>
			</div>
		</div>
	</div>
</main>
