<main role="main" >
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
				<?php echo form_open(site_url('Reformaelectoral/editarSiguiente')); ?>
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
										Tipo Medio
									</label>
									<select class="combo" id='cuadro' name='rel_idtipomedio' required>
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
									<label for="url" >
										Seleccionar Actor/es:
									</label><br>
									<?php foreach ($actores as $a ) { ?>
										<?php foreach ( $na as $n) { ?>
											<?php if ($a->idactor==$n->rel_idactor) { ?>
												<input type="checkbox" checked="true" id="a.<?php echo $a->idactor; ?>" name="a.<?php echo $a->idactor; ?>" value="<?php echo $a->idactor; ?>">
												<label for="a.<?php echo $a->idactor; ?>"><?php echo $a->nombre_actor; ?></label><br>
											<?php break; } ?>
										<?php } ?>
										<?php if ($a->idactor!=$n->rel_idactor) { ?>
											<input type="checkbox" id="a.<?php echo $a->idactor; ?>" name="a.<?php echo $a->idactor; ?>" value="<?php echo $a->idactor; ?>">
											<label for="a.<?php echo $a->idactor; ?>"><?php echo $a->nombre_actor; ?></label><br>
										<?php } ?>
									<?php } ?>
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
									<label for="url" >
										<button type="submit" class="BOTON" >Siguiente</button>
									</label><br>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</main>






