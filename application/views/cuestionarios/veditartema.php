<main role="main" >
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores" >
				<?php echo form_open('noticia/modificarNoticia/'.$idnoticia); ?>
				<br>
				<h1>Editar Medio de Comunicacion</h1>
				<br>
				<div class="card">
					<div class="form-row">
						<div class="col-10">
							<div class="form-group">
								<?php if ($otrotema==null) { ?>
									<input type="hidden" id="otrotema" name="otrotema" value="">
								<?php } ?>
								<?php if ($otrotema!=null) { ?>
									<input type="hidden" id="otrotema" name="otrotema" value="<?php echo $otrotema;?>">
								<?php } ?>
								<?php foreach ($temase as $te) { ?>
									<input type="hidden" id="te<?php echo $te->idtema;?>" name="te<?php echo $te->idtema;?>" value="<?php echo $te->idtema;?>">
									<label style="font-size:20px">
										Seleccionar SubTema/s para <?php echo $te->nombre_tema;?>:
									</label><br>
									<?php foreach ( $subtemase[$te->idtema] as $st) { ?>
									<input type="checkbox" id="st<?php echo $st->idsubtema; ?>" name="st<?php echo $st->idsubtema; ?>" value="<?php echo $st->idsubtema; ?>">
									<label for="st<?php echo $st->nombre_subtema; ?>"><?php echo $st->nombre_subtema; ?></label><br>
									<?php } ?>
									<div class="form-group">
										<input type="checkbox" id="ost<?php echo $te->idtema; ?>" name="ost<?php echo $te->idtema; ?>" value="<?php echo $te->idtema; ?>">
										<label for="ost<?php echo $te->idtema; ?>">Otro SubTema</label><br>		
									</div>
									<div class="form-group">
										<label for="otrosubtema<?php echo $te->idtema; ?>">Especificar Otro SubTema</label><br>
										<input type="text" id="otrosubtema<?php echo $te->idtema; ?>" name="otrosubtema<?php echo $te->idtema; ?>" >
									</div>
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
				<div>
					<button type="submit" name="accion" value="5" class="btn btn-primary" style="background-color:#474142; color:#ffffff">Editar</button>
					<?php echo form_close();?>
					<a href="<?php echo site_url('reformaelectoral/editarNoticia/'.$idnoticia); ?>" >
						<button type="button" class="btn btn-danger" >Cancelar</button>
					</a>
				</div>
				<br>
				</div>
				<br>
			</div>
		</div>
	</div>
</main>







