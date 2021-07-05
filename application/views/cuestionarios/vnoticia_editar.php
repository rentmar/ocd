<main role="main" >
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
				<?php echo form_open('noticia/editarNoticia'); ?>
				<br>
				<div class="card">
					<div class="card-header">
						<h4>Editar Noticia</h4>
					</div>
					<div class="card-body ">
						<div class="form-row">
							<div class="col-10">
								<label for="fecha" >
									Fecha:
								</label>
								<input type="date" id="fecha" name="fecha" >
								<input type="hidden" id="idnoticia" name="idnoticia"
									   value="<?php echo $noticia->idnoticia; ?>">
								<input type="hidden" id="idcuestionario" name="idcuestionario"
									   value="<?php echo $idcuestionario; ?>" >

							</div>
							<div class="col-2">
								<a href="#" class="btn btn-primary" >Cambiar</a>
							</div>
						</div>

						<div class="form-row">
							<div class="col">
								<hr>
							</div>
						</div>

						<div class="form-row">
							<div class="col-10">
								<div class="form-group">
									<label for="titular" >
										Titular:
									</label>
									<input type="text" id="titular" name="titular" class="form-control"
										   value="<?php echo $noticia->titular; ?>" required>
								</div>
							</div>
							<div class="col-2">
								<div class="form-group">
									<button type="submit" name="accion" value="2" class="btn btn-primary">
										Cambiar
									</button>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-10">
								<div class="form-group">
									<label for="resumen" >
										Resumen:
									</label>
									<textarea id="resumen" name="resumen" required class="form-control"><?php echo $noticia->resumen; ?>
									</textarea>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-10">
								<div class="form-group">
									<label for="url" >
										url:
									</label>
									<input id="url" name="url" class="form-control" value="<?php echo $noticia->url_noticia;  ?>" >
								</div>
							</div>
						</div>

						<div class="form-row">
							<div class="col">
								<hr>
							</div>
						</div>

						<div class="form-row">
							<div class="col-10">
								<div class="form-group">
									<label for="nombre_actor" >
										Actor:
									</label>
									<input type="text" id="nombre_actor" name="nombre_actor" class="form-control"
										   value="<?php echo $noticia->nombre_actor; ?>" readonly>
									<input type="hidden" id="idactor" name="idactor"
										   value="<?php echo $noticia->idactor; ?>" >
								</div>
							</div>
							<div class="col-2">
								<div class="form-group">
									<a href=""class="btn btn-primary" >Cambiar</a>
								</div>
							</div>
						</div>

						<div class="form-row">
							<div class="col">
								<hr>
							</div>
						</div>

						<div class="form-row">
							<div class="col-10">
								<div class="form-group">
									<label for="nombre_tipo" >
										Tipo de Medio:
									</label>
									<input type="text" id="nombre_tipo" name="nombre_tipo" class="form-control"
										   value="<?php echo $noticia->nombre_tipo; ?>" readonly>
									<input type="hidden" id="idtipomedio" name="idtipomedio"
										   value="<?php echo $noticia->idtipomedio; ?>" >
								</div>
							</div>
							<div class="col-2">
								<div class="form-group">
									<a href=""class="btn btn-primary" >Cambiar</a>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-10">
								<div class="form-group">
									<label for="nombre_medio" >
										Medio:
									</label>
									<input type="text" id="nombre_medio" name="nombre_medio" class="form-control"
										   value="<?php echo $noticia->nombre_medio; ?>" readonly>
									<input type="hidden" id="idmedio" name="idmedio"
										   value="<?php echo $noticia->idmedio; ?>" >
								</div>
							</div>
						</div>

						<div class="form-row">
							<div class="col">
								<hr>
							</div>
						</div>

						<div class="form-row">
							<div class="col-10">
								<div class="form-group">
									<label for="nombre_tema" >
										Tema:
									</label>
									<input type="text" id="nombre_tema" name="nombre_tema" class="form-control"
										   value="<?php echo $noticia->nombre_tema; ?>" readonly>
									<input type="hidden" id="idtema" name="idtema"
										   value="<?php echo $noticia->idtema; ?>" >
								</div>
							</div>
							<div class="col-2">
								<div class="form-group">
									<a href=""class="btn btn-primary" >Cambiar</a>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-10">
								<div class="form-group">
									<label for="nombre_subtema" >
										Subtema:
									</label>
									<input type="text" id="nombre_subtema" name="nombre_subtema" class="form-control"
										   value="<?php echo $noticia->nombre_subtema; ?>" readonly>
									<input type="hidden" id="idsubtema" name="idsubtema"
										   value="<?php echo $noticia->idsubtema; ?>" >
								</div>
							</div>
						</div>






					</div>
					<div class="card-footer">
						<button type="submit" name="accion" value="cambiar" class="btn btn-primary">
							Confirmar Edicion
						</button>

						<a href="#" class="btn btn-info" role="button">Cancelar Edicion</a>
					</div>
				</div>
				<br>
				<?php echo form_close();?>
			</div>


		</div>
	</div>

</main>
