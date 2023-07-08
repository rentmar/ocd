<main>
	<br><br>
	<?php echo validation_errors(); ?>
	<?php
	/** @noinspection PhpLanguageLevelInspection */
	$atr_form =[
		'id' => 'formulario_norma_plurinacional_lp' ,
	]
	;?>
	<?php echo form_open('normativa/capturaDatos', $atr_form);?>

	<div class="contenedores_divididos">
		<div class="contenedor_superior2" id="contenedor_pequeño">
		</div>
		<div class="contenedor_inferior">
			<h3 id="Título_formulario"> Produccion Normativa - Ley Promulgada (LP) </h3>
		</div>
	</div>
	<br>


	<div class="contenedores">
		<label for="instanciaseguimientonorma">Instancia de seguimiento:</label><br>
		<input type="text" id="instancia_plu_lp" name="instancia_plu_lp" class="form-control" readonly="readonly"
			   value="<?php echo $instancia->instancia;?>">
		<input type="hidden" id="idinstancia_plu_lp" name="idinstancia_plu_lp" class="form-control"
			   value="<?php echo $instancia->idinsseg; ?>" >

	</div>
	<br>



	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4>
					Datos Generales
				</h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="codigo_plu_lp">Codigo:</label>
					<input class="form-control" type="text" id="codigo_plu_lp" name="codigo_plu_lp">
				</div>
				<div class="form-group">
					<label for="nombre_plu_lp">Nombre de la norma:</label>
					<textarea rows="3" class="form-control" id="nombre_plu_lp" name="nombre_plu_lp"></textarea>
				</div>
				<div class="form-group">
					<label for="objeto_plu_lp">Objeto de la norma:</label>
					<textarea rows="5" class="form-control" id="objeto_plu_lp" name="objeto_plu_lp"></textarea>
				</div>
			</div>
		</div>
		<div class="contenedores">
			<div class="card">
				<div class="card-header cuest2">
					<h4>
						TEMA 1
					</h4>
				</div>
				<div class="card-body">
					<label>Escoge el tema:</label><br>
					<?php $contador = 0; ?>
					<?php foreach ($tema as $a): ?>
						<?php if($contador == 0): ?>
							<div class="custom-control custom-radio">
								<input id="checktema1norma<?php echo $a['idtema']; ?>" name="idtema" type="radio" value="<?php echo $a['idtema']; ?>" class="custom-control-input" checked>
								<label class="custom-control-label" for="checktema1norma<?php echo $a['idtema']; ?>" >
									<?php echo $a['nombre_tema']; ?>
								</label>
							</div>
							<?php $contador++; ?>
						<?php else: ?>
							<div class="custom-control custom-radio">
								<input id="checktema1norma<?php echo $a['idtema']; ?>" name="idtema" type="radio" value="<?php echo $a['idtema']; ?>" class="custom-control-input">
								<label class="custom-control-label" for="checktema1norma<?php echo $a['idtema']; ?>" >
									<?php echo $a['nombre_tema']; ?>
								</label>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
					<div class="custom-control custom-radio">
						<input id="checktema1norma0" name="idtema" type="radio" value="0" class="custom-control-input">
						<label class="custom-control-label" for="checktema1norma0" >
							Otro
						</label>
					</div>
					<div id="otrotema1normadatos">

					</div>
				</div>
			</div>
		</div>

		<div class="contenedores">
			<div class="card">
				<div class="card-header cuest2">
					<h4>
						TEMA 2
					</h4>
				</div>
				<div class="card-body">
					<label>Escoge el tema:</label><br>
					<?php $contador2 = 0; ?>
					<?php foreach ($tema as $a): ?>
						<?php if($contador2 == 0): ?>
							<div class="custom-control custom-radio">
								<input id="checktema2norma<?php echo $a['idtema']; ?>" name="idtema2" type="radio" value="<?php echo $a['idtema']; ?>" class="custom-control-input" checked>
								<label class="custom-control-label" for="checktema2norma<?php echo $a['idtema']; ?>" >
									<?php echo $a['nombre_tema']; ?>
								</label>
							</div>
							<?php $contador2++; ?>
						<?php else: ?>
							<div class="custom-control custom-radio">
								<input id="checktema2norma<?php echo $a['idtema']; ?>" name="idtema2" type="radio" value="<?php echo $a['idtema']; ?>" class="custom-control-input">
								<label class="custom-control-label" for="checktema2norma<?php echo $a['idtema']; ?>" >
									<?php echo $a['nombre_tema']; ?>
								</label>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
					<div class="custom-control custom-radio">
						<input id="checktema2norma0" name="idtema2" type="radio" value="0" class="custom-control-input">
						<label class="custom-control-label" for="checktema2norma0" >
							Otro
						</label>
					</div>
					<!-- Informacion Otro tema 2 -->
					<div id="otrotema2normadatos">

					</div>
				</div>
			</div>
		</div>
	</div>
	<br>

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4>
					Antecedentes de Ley:
				</h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="">Introduzca codigo de proyecto de ley:</label>
					<input class="form-control"  type="text" id="codigo_plu_lp" name="codigo_plu_lp">
				</div>
				<div class="form-group">
					<label for="observaciones_plu">Comentarios:</label>
					<textarea class="form-control" rows="2" id="comentarios_plu" name="comentarios_plu"></textarea>
				</div>
			</div>
		</div>
	</div>
	<br>


	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4>
					Otros:
				</h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="observaciones_plu">Observaciones:</label>
					<textarea class="form-control" rows="2" id="observaciones_plu" name="observaciones_plu"></textarea>
				</div>
				<div class="form-group">
					<label for="enlace_plu">Enlace/URL:</label>
					<textarea class="form-control" rows="2" id="enlace_plu" name="enlace_plu"></textarea>
				</div>

			</div>
		</div>
	</div>
	<br>
	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest2">
				<h4>
					Datos del registro:
				</h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="observaciones_met_plu">Observaciones metodologicas:</label>
					<textarea class="form-control" rows="2" id="observaciones_met_plu" name="observaciones_met_plu"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="hidden" id="idcuestionario" name="idcuestionario" value="<?php echo $idformulario; ?>">
					<input class="form-control" type="hidden" id="idusuario" name="idusuario" value="<?php echo $usuario->id; ?>">
				</div>
			</div>
		</div>
	</div>
	<div id="contenedor-submit">
		<button id="BOTON" type="submit" name="action" value="1" >
			SIGUIENTE
		</button>
		<a href="<?php echo site_url('');?>">
			<input type="button" class="BOTON" value="CANCELAR">
		</a>
	</div>

	<br>
	<?php echo form_close(); ?>

</main>



<!-- The Modal Preenvio de Normas -->
<div class="modal fade" id="preenvionormaplurinacionallp">
	<div class="modal-dialog modal-xl modal-dialog-scrollable ">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-info text-white ">
				<h4 class="modal-title">Norma a Registrar - Ley Promulgada</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="container">
					<?php echo form_open('normativa/crearNorma', ['id' => 'formulario_norma_pluricaional_preenvio',]); ?>

					<div class="card">
						<div class="card-header bg-info">
							<h4>
								Datos Generales
							</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="codigo_plu_pre">Codigo:</label>
								<input class="form-control" type="text" id="codigo_plu_pre" name="codigo_plu_pre">
							</div>
							<div class="form-group">
								<label for="nombre_plu_pre">Nombre de la norma:</label>
								<textarea rows="3" class="form-control" id="nombre_plu_pre" name="nombre_plu_pre"></textarea>
							</div>
							<div class="form-group">
								<label for="objeto_plu_pre">Objeto de la norma:</label>
								<textarea rows="5" class="form-control" id="objeto_plu_pre" name="objeto_plu_pre"></textarea>
							</div>
							<div id="tema1desp" class="form-group">
							</div>
							<div id="tema2desp" class="form-group">
							</div>
							<div id="propdesp" class="form-group">

							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header bg-info">
							<h4>
								Antecedentes de ley:
							</h4>
						</div>
						<div class="card-body">

							<div class="form-group">
								<label for="">Introduzca codigo de proyecto de ley:</label>
								<input class="form-control"  type="text" id="codigo_plu_lp_pre" name="codigo_plu_lp_pre">
							</div>
							<div class="form-group">
								<label for="observaciones_plu">Comentarios:</label>
								<textarea class="form-control" rows="2" id="comentarios_plu_pre" name="comentarios_plu_pre"></textarea>
							</div>

						</div>
					</div>
					<div class="card">
						<div class="card-header bg-info">
							<h4>
								Otros:
							</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="observaciones_plu_pre">Observaciones:</label>
								<textarea class="form-control" rows="2" id="observaciones_plu_pre" name="observaciones_plu_pre"></textarea>
							</div>
							<div class="form-group">
								<label for="enlace_plu_pre">Enlace/URL:</label>
								<textarea class="form-control" rows="2" id="enlace_plu_pre" name="enlace_plu_pre"></textarea>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header bg-info">
							<h4>
								Datos del registro:
							</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="observaciones_met_plu_pre">Observaciones metodologicas:</label>
								<textarea class="form-control" rows="2" id="observaciones_met_plu_pre" name="observaciones_met_plu_pre"></textarea>
							</div>
							<div class="form-group">
								<input class="form-control" type="hidden" id="idcuestionario_pre" name="idcuestionario_pre" value="<?php echo $idformulario; ?>">
								<input class="form-control" type="hidden" id="idusuario_pre" name="idusuario_pre" value="<?php echo $usuario->id; ?>">
								<input class="form-control" type="hidden" id="idinstancia_seg_pre" name="idinstancia_seg_pre" value="1">

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button id="BOTON" type="submit" name="action" value="1" >
					GUARDAR
				</button>
				<button id="BOTON" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
			<?php form_close(); ?>
		</div>
	</div>
</div>

