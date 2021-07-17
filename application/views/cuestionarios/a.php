<main role="main" >
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
				<?php echo form_open('#'); ?>
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
								<input type="date" id="fecha" name="fecha" class="form-control"
									   value="<?php echo mdate('%Y-%m-%d', $noticia->fecha_noticia);?>" >
								<input type="hidden" id="idnoticia" name="idnoticia"
									   value="<?php echo $noticia->idnoticia; ?>">
								<input type="hidden" id="idcuestionario" name="idcuestionario"
									   value="<?php echo $noticia->rel_idcuestionario; ?>" >

							</div>
							<div class="col-2">
								<button type="submit" name="accion" value="1" class="btn btn-primary">
									Cambiar Fecha
								</button>
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
										Cambiar Datos
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
						<!--
						<div class="form-row">
							<div class="col-10">
								<div class="form-group">
									<label for="nombre_actor" >
										Actor:
									</label>
									<input type="text" id="nombre_actor" name="nombre_actor" class="form-control"
										   value="<?php //echo $noticia->nombre_actor; ?>" readonly>
									<input type="hidden" id="idactor" name="idactor"
										   value="<?php //echo $noticia->idactor; ?>" >
								</div>
							</div>
							<div class="col-2">
								<div class="form-group">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#actormodal">
										Cambiar Actor
									</button>
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
										   value="<?php //echo $noticia->nombre_tipo; ?>" readonly>
									<input type="hidden" id="idtipomedio" name="idtipomedio"
										   value="<?php //echo $noticia->idtipomedio; ?>" >
								</div>
							</div>
							<div class="col-2">
								<div class="form-group">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mediomodal"">
										Cambiar Medio
									</button>
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
										   value="<?php //echo $noticia->nombre_medio; ?>" readonly>
									<input type="hidden" id="idmedio" name="idmedio"
										   value="<?php //echo $noticia->idmedio; ?>" >
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
										   value="<?php //echo $noticia->nombre_tema; ?>" readonly>
									<input type="hidden" id="idtema" name="idtema"
										   value="<?php //echo $noticia->idtema; ?>" >
								</div>
							</div>
							<div class="col-2">
								<div class="form-group">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#temamodal">
											Cambiar Tema
									</button>
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
										   value="<?php //echo $noticia->nombre_subtema; ?>" readonly>
									<input type="hidden" id="idsubtema" name="idsubtema"
										   value="<?php //echo $noticia->idsubtema; ?>" >
								</div>
							</div>
						</div>
				
					</div>
					<div class="card-footer">
						<button type="submit" name="accion" value="cambiar" class="btn btn-primary">
							Confirmar Edicion
						</button>
						<button type="submit" name="accion" value="cancelar" class="btn btn-danger">
							Cancelar edicion
						</button>
					</div>
				</div>
				<br>
				<?php echo form_close();?>
			</div>


		</div>
	</div>

</main>


<!-- Modal Edicion de Actor -->
<div class="modal" id="actormodal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h1 class="modal-title">Editar Actor</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('noticia/editarNoticia');?>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" id="idnoticia" name="idnoticia"
						   value="<?php echo $noticia->idnoticia; ?>">
					<input type="hidden" id="idcuestionario" name="idcuestionario"
						   value="<?php echo $idcuestionario; ?>" >
				</div>
				<div class="form-group">
					<label>Escoja el tipo de actor que es la fuente de la noticia:</label><br>
					<?php $contador = 0; ?>
					<?php foreach ($actor as $key => $element): ?>
						<?php if($contador == 0): ?>
							<input type="radio" id="radio<?php echo $element['idactor']; ?>" name="idactor" value="<?php echo $element['idactor']; ?>"  checked >
							<label for="radio<?php echo $element['idactor']; ?>"><?php echo $element['nombre_actor']; ?></label><br>
							<?php $contador++; ?>
						<?php else: ?>
							<input type="radio" id="radio<?php echo $element['idactor']; ?>" name="idactor" value="<?php echo $element['idactor']; ?>" >
							<label for="radio<?php echo $element['idactor']; ?>"><?php echo $element['nombre_actor']; ?></label><br>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>



			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" name="accion" value="3" class="btn btn-primary" >Editar</button>
			<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>

		</div>
	</div>
</div>



<!-- Modal Edicion de Medio -->
<div class="modal" id="mediomodal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h1 class="modal-title">Editar Medio</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('noticia/editarNoticia');?>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" id="idnoticia" name="idnoticia"
						   value="<?php echo $noticia->idnoticia; ?>">
					<input type="hidden" id="idcuestionario" name="idcuestionario"
						   value="<?php echo $idcuestionario; ?>" >
				</div>
				<div class="form-group">
					<label for="tipo-medio">Tipo de Medio:</label><br>
					<select id="tipo-medio" name="idtipomedio" class="form-control" required>
						<option value="" >Seleccione el Tipo de Medio</option>
						<?php foreach ($tipo_medio as $key=>$element): ?>
							<option value="<?php echo $element['tipo_id']; ?>" ><?php echo $element['tipo_nombre']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label>Escoja el medio al cual hizo el seguimiento:</label><br>
					<select id="medio" name="idmedio" class="form-control" required >
						<option value="" >Seleccione medio</option>
					</select>
				</div>



			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" name="accion" value="4" class="btn btn-primary" >Editar</button>
				<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>

		</div>
	</div>
</div>

<!-- Modal Edicion de Tema/Subtema -->
<div class="modal" id="temamodal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h1 class="modal-title">Editar Tema</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('noticia/editarNoticia');?>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" id="idnoticia" name="idnoticia"
						   value="<?php echo $noticia->idnoticia; ?>">
					<input type="hidden" id="idcuestionario" name="idcuestionario"
						   value="<?php echo $idcuestionario; ?>" >
				</div>
				<div class="form-group">
					<label>Escoge el tema al que está referido la nota :</label><br>
					<select id="tema" name="idtema" class="form-control" required >
						<option value="" >Seleccione Tema</option>
						<?php foreach ( $tema as $key => $element): ?>
							<option value="<?php echo $element['idtema']; ?>" >
								<?php echo $element['nombre_tema']; ?>
							</option>
						<?php endforeach; ?>
						<option value="0" >Otro</option>
					</select>
				</div>
				<div class="form-group ">
					<div id="otrotemac"  >

					</div>
				</div>
				<div class="form-group">
					<div id="subtemac" >

					</div>
				</div>
				<div class="form-group">
					<div id="otrosubtema">

					</div>
				</div>

			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" name="accion" value="5" class="btn btn-primary" >Editar</button>
				<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>

		</div>
	</div>
</div>






