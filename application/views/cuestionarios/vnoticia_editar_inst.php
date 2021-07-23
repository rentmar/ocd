<main role="main" >
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
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
								<input type="date" id="fecha" name="fecha" class="form-control" disabled="true"
									   value="<?php echo mdate('%Y-%m-%d', $noticia->fecha_noticia);?>" >
							</div>
							<div class="col-2">
								<button type="submit" data-toggle="modal" data-target="#fechamodal" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
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
									<label for="rel_idtipomedio" >
										Tipo Medio
									</label>
									<select class="combo" id='cuadro' name='rel_idtipomedio' disabled="true" required>
										<option value="0"></option>
										<?php foreach ($tipos as $tm) {?>
											<?php if ($tm->idtipomedio == $medio->rel_idtipomedio) {?>
											<option selected='true' value='<?php echo $tm->idtipomedio;?>'><?php echo $tm->nombre_tipo;?></option>
											<?php } ?>
											<?php if ($tm->idtipomedio != $medio->rel_idtipomedio) {?>
											<option value='<?php echo $tm->idtipomedio;?>'><?php echo $tm->nombre_tipo;?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-2">
								<button type="submit" data-toggle="modal" data-target="#mediomodal" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
									Cambiar Medio Comunicacion
								</button>
							</div>
						</div>
						<div class="form-row">
							<div class="col-10">
								<div class="form-group">
									<label for="medio" >
										Medio de Comunicacion
									</label>
									<select class="combo" id='cuadro' name='medio' disabled="true" required>
										<option value="0"></option>
										<?php foreach ($medios as $m) {?>
											<?php if ($m->idmedio == $medio->idmedio) {?>
											<option selected='true' value='<?php echo $m->idmedio;?>'><?php echo $m->nombre_medio;?></option>
											<?php } ?>
											<?php if ($m->idmedio != $medio->idmedio) {?>
											<option value='<?php echo $m->idmedio;?>'><?php echo $m->nombre_medio;?></option>
											<?php } ?>
										<?php } ?>
									</select>
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
									<label for="titular" >
										Titular:
									</label>
									<input type="text" id="titular" name="titular" class="form-control" disabled="true"
										   value="<?php echo $noticia->titular; ?>" required>
								</div>
							</div>
							<div class="col-2">
								<button type="submit" data-toggle="modal" data-target="#datosmodal" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
									Cambiar Datos Noticia
								</button>
							</div>
						</div>
						<div class="form-row">
							<div class="col-10">
								<div class="form-group">
									<label for="resumen" >
										Resumen:
									</label>
									<textarea id="resumen" name="resumen" required class="form-control" disabled="true">
										<?php echo $noticia->resumen; ?>
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
									<input id="url" name="url" class="form-control" disabled="true" value="<?php echo $noticia->url_noticia; ?>" >
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

									<label>
										Seleccionar Actor/es:
									</label><br>
									<?php foreach ($actores as $a ) { ?>
										<?php foreach ( $na as $n) { ?>
											<?php if ($a->idactor==$n->rel_idactor) { ?>
												<input disabled="true" type="checkbox" checked="true" id="a<?php echo $a->idactor; ?>" name="a<?php echo $a->idactor; ?>" value="<?php echo $a->idactor; ?>">
												<label for="a<?php echo $a->idactor; ?>"><?php echo $a->nombre_actor; ?></label><br>
											<?php break; } ?>
										<?php } ?>
										<?php if ($a->idactor!=$n->rel_idactor) { ?>
											<input disabled="true" type="checkbox" id="a<?php echo $a->idactor; ?>" name="a<?php echo $a->idactor; ?>" value="<?php echo $a->idactor; ?>">
											<label for="a<?php echo $a->idactor; ?>"><?php echo $a->nombre_actor; ?></label><br>
										<?php } ?>
									<?php } ?>

								</div>
							</div>
							<div class="col-2">
								<button type="submit" data-toggle="modal" data-target="#actormodal" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
									Cambiar Actor/es
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
									<label>
										Seleccionar Tema/s:
									</label><br>
									<?php foreach ($temas as $tema) { ?>
										<?php foreach ( $temase as $temaelegido) { ?>
											<?php if ($tema->idtema==$temaelegido->idtema) { ?>
												<input disabled="true" type="checkbox" checked="true" id="t<?php echo $tema->idtema; ?>" name="t<?php echo $tema->idtema; ?>" value="<?php echo $tema->idtema; ?>">
												<label for="t<?php echo $tema->nombre_tema; ?>"><?php echo $tema->nombre_tema; ?></label><br>
											<?php break; } ?>
										<?php } ?>
										<?php if ($tema->idtema!=$temaelegido->idtema) { ?>
											<input disabled="true" type="checkbox"  id="t<?php echo $tema->idtema; ?>" name="t<?php echo $tema->idtema; ?>" value="<?php echo $tema->idtema; ?>">
											<label for="t<?php echo $tema->nombre_tema; ?>"><?php echo $tema->nombre_tema; ?></label><br>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
							<div class="col-2">
								<button type="submit" data-toggle="modal" data-target="#temamodal" style="background-color:#474142; color:#ffffff">
									Cambiar Tema/s
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
									<?php foreach ($temase as $te) { ?>
										<label>
											Seleccionar SubTema/s para <?php echo $te->nombre_tema;?>:
										</label><br>
										<?php foreach ($subtemas[$te->idtema] as $st) {?>
											<?php foreach ( $subtemase as $subtemaelegido) { ?>
											<?php if ($st->idsubtema==$subtemaelegido->idsubtema) { ?>
												<input disabled="true" type="checkbox" checked="true" id="st<?php echo $st->idsubtema; ?>" name="st<?php echo $st->idsubtema; ?>" value="<?php echo $st->idsubtema; ?>">
												<label for="st<?php echo $st->nombre_subtema; ?>"><?php echo $st->nombre_subtema; ?></label><br>
											<?php break; } ?>
											<?php } ?>
											<?php if ($st->idsubtema!=$subtemaelegido->idsubtema) { ?>
												<input disabled="true" type="checkbox"  id="st<?php echo $st->idsubtema; ?>" name="st<?php echo $st->idsubtema; ?>" value="<?php echo $st->idsubtema; ?>">
												<label for="st<?php echo $st->nombre_subtema; ?>"><?php echo $st->nombre_subtema; ?></label><br>
											<?php } ?>
											<?php } ?>
											<div class="form-row">
												<div class="col">
													<hr>
												</div>
											</div>
									<?php } ?>
									<div class="form-row">
										<div class="col">
											<hr>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<div class="modal" id="fechamodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Editar Fecha</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('noticia/modificarNoticia/'.$noticia->idnoticia);?>
			<div class="modal-body">
				<div class="form-group">
					<label>Fecha de la Noticia:</label><br>
					<input type="date" id="fecha" name="fecha" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" name="accion" value="1" class="btn btn-primary" style="background-color:#474142; color:#ffffff">Editar</button>
			<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="mediomodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Editar Medio de Comunicacion</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('instdemocratica/editarMedio');?>
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" id="idnoticia" name="idnoticia"
						value="<?php echo $noticia->idnoticia; ?>">
				</div>
				<div class="form-group">
					<label for="rel_idtipomedio" >
						Seleccionar Tipo Medio
					</label>
					<select class="combo" id='cuadro' name='rel_idtipomedio' required>
						<option value="0"></option>
						<?php foreach ($tipos as $tm) {?>
						<option value='<?php echo $tm->idtipomedio;?>'><?php echo $tm->nombre_tipo;?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" name="accion" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
					Continuar
				</button>
			<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="datosmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Editar Datos de la Noticia</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('noticia/modificarNoticia/'.$noticia->idnoticia);?>
			<div class="modal-body">
				<div class="form-group">
					<label for="titular" >
						Titular:
					</label>
					<input type="text" id="titular" name="titular" class="form-control" value="<?php echo $noticia->titular; ?>"
						 required>
				</div>
				<div class="form-group">
					<label for="resumen" >
						Resumen:
					</label>
					<textarea id="resumen" name="resumen" required class="form-control">
						<?php echo $noticia->resumen; ?>
					</textarea>
				</div>
				<div class="form-group">
					<label for="url" >
						url:
					</label>
					<input id="url" name="url" class="form-control" value="<?php echo $noticia->url_noticia; ?>">			
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" name="accion" value="3" class="btn btn-primary" style="background-color:#474142; color:#ffffff">Editar</button>
			<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="actormodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Editar Actor/es</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('noticia/modificarNoticia/'.$noticia->idnoticia);?>
			<div class="modal-body">
				<div class="form-group">
					<label>
						Seleccionar Actor/es:
					</label><br>
					<?php foreach ($actores as $a ) { ?>
						<input type="checkbox" id="a<?php echo $a->idactor; ?>" name="a<?php echo $a->idactor; ?>" value="<?php echo $a->idactor; ?>">
						<label for="a<?php echo $a->idactor; ?>"><?php echo $a->nombre_actor; ?></label><br>
					<?php } ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" name="accion" value="4" class="btn btn-primary" style="background-color:#474142; color:#ffffff">Editar</button>
			<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="temamodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Editar Tema/s</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('instdemocratica/editarTemas');?>
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" id="idnoticia" name="idnoticia"
						value="<?php echo $noticia->idnoticia; ?>">
				</div>
				<div class="form-group">
					<label>
						Seleccionar Tema/s:
					</label><br>
					<?php foreach ($temas as $tema) { ?>
						<input type="checkbox" id="t<?php echo $tema->idtema; ?>" name="t<?php echo $tema->idtema; ?>" value="<?php echo $tema->idtema; ?>">
						<label for="t<?php echo $tema->nombre_tema; ?>"><?php echo $tema->nombre_tema; ?></label><br>
					<?php } ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" name="accion" class="btn btn-primary" style="background-color:#474142; color:#ffffff">Continuar</button>
			<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>