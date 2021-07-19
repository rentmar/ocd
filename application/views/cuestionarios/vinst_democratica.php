		<main>
			<br><br>
			<?php echo form_open('instdemocratica/preenvio');?>
			<div class="contenedores_divididos">
				<div class="contenedor_superior2" id="contenedor_pequeño">
				</div>
				<div class="contenedor_inferior">
					<h3 id="Título_formulario"> Institucionalidad democrática </h3>
				</div>
			</div>
			<br>
			<div class="contenedores">
				<label for="fecha">Introduzca la fecha de publicación/difusión de la noticia:</label><br>
				<input type="date" id="fecha" name="fecha"
					   value="<?php
					   if(isset($fecha))
					   {
						   echo mdate('%Y-%m-%d', $fecha);
					   };
					   ?>"
					   required >
				<input type="hidden" id="idformulario" name="idformulario" value="<?php echo $idformulario; ?>" >
				<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $idusuario;?>" >
			</div>
			<br>
			<div class="contenedores">
				<label for="tipo-medio">Tipo de Medio:</label><br>
				<select id="tipo-medio" name="idtipomedio" class="form-control" required>
					<option value="" >Seleccione el Tipo de Medio</option>
					<?php foreach ($tipo_medio as $key=>$element): ?>
						<option value="<?php echo $element['tipo_id']; ?>" ><?php echo $element['tipo_nombre']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<br>
			<div class="contenedores">
				<label>Escoja el medio al cual hizo el seguimiento:</label><br>
				<select id="medio" name="idmedio" class="form-control" required >
					<option value="" >Seleccione medio</option>
				</select>

			</div>
			<br>
			<div class="contenedores">

				<label for="titular">Escriba el titular de la noticia:</label><br>
				<input type="text" id="titular" name="titular" required class="form-control"
					   value="<?php
					   if(isset($titular)){
						   echo $titular;
					   }

					   ?>"
				>

			</div>
			<br>
			<div class="contenedores">
				<label>Escriba un pequeño párrafo que resuma la noticia:</label><br>
				<input type="text" id="resumen" name="resumen" required  class="form-control"
					   value="<?php
					   if(isset($resumen)){
						   echo $resumen;
					   }
					   ?>"
				>


			</div>
			<br>
			<div class="contenedores">
				<label>Pegue el link donde se encuentra la noticia:</label><br>
				<input type="text" id="url" name="url"  class="form-control"
					   value="<?php
					   if(isset($url))
					   {
						   echo $url;
					   }
					   ?>"
				>

			</div>
			<br>

			<?php if(!isset($idactores)): ?>
				<div class="contenedores">
					<label>Escoja el tipo de actor que es la fuente de la noticia:</label><br>
					<?php $contador = 0; ?>
					<?php foreach ($actor as $key => $element): ?>
						<?php if($contador == 0): ?>
							<div class="form-check">
								<label class="form-check-label">
									<input id="check<?php echo $element['idactor']; ?>" name="idactor[]" type="checkbox" class="form-check-input" value="<?php echo $element['idactor']; ?>" checked  >
									<?php echo $element['nombre_actor']; ?>
								</label>
							</div>
							<?php $contador++; ?>
						<?php else: ?>
							<div class="form-check">
								<label class="form-check-label">
									<input id="check<?php echo $element['idactor']; ?>" name="idactor[]" type="checkbox" class="form-check-input" value="<?php echo $element['idactor']; ?>"   >
									<?php echo $element['nombre_actor']; ?>
								</label>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php else: ?>
				<div class="contenedores">
					<label>Escoja el tipo de actor que es la fuente de la noticia:</label><br>

					<?php foreach ($actor as $key => $element): ?>

						<?php if( in_array($element['idactor'], $idactores  )  ): ?>
							<div class="form-check">
								<label class="form-check-label">
									<input id="check<?php echo $element['idactor']; ?>" name="idactor[]" type="checkbox" class="form-check-input" value="<?php echo $element['idactor']; ?>" checked  >
									<?php echo $element['nombre_actor']; ?>
								</label>
							</div>
							<?php ?>
						<?php else: ?>
							<div class="form-check">
								<label class="form-check-label">
									<input id="check<?php echo $element['idactor']; ?>" name="idactor[]" type="checkbox" class="form-check-input" value="<?php echo $element['idactor']; ?>"   >
									<?php echo $element['nombre_actor']; ?>
								</label>
							</div>
						<?php endif; ?>

					<?php endforeach; ?>
				</div>

			<?php endif; ?>


			<br>

			<?php if(!isset($idtemas)): ?>
				<div id="#temas" class="contenedores">
					<label  >Escoge el tema al que está referido la nota :</label>
					<?php $contador = 0; ?>
					<?php foreach ($tema as $key => $element): ?>
						<?php if($contador == 0): ?>
							<div class="form-check">
								<label class="form-check-label">
									<input id="checktema<?php //echo $element['idtema']; ?>" name="idtema[]" type="checkbox" class="form-check-input" value="<?php echo $element['idtema']; ?>" >
									<?php echo $element['nombre_tema']; ?>
								</label>
							</div>
							<?php $contador++; ?>
						<?php else: ?>
							<div class="form-check">
								<label class="form-check-label">
									<input id="checktema<?php //echo $element['idtema']; ?>" name="idtema[]" type="checkbox" class="form-check-input" value="<?php echo $element['idtema']; ?>"   >
									<?php echo $element['nombre_tema']; ?>
								</label>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>

					<div class="form-check">
						<label class="form-check-label" >
							<input id="checktema" name="idtema[]" type="checkbox"  class="form-check-input" value="0" >
							Otro
						</label>
					</div>
					<div class="form-group">
						<button id="BOTON" type="submit" name="action" value="0" >
							SELECCIONAR TEMAS
						</button>
					</div>
				</div>
			<?php else: ?>

				<div id="#temas" class="contenedores">
					<label  >Escoge el tema al que está referido la nota :</label>
					<?php foreach ($tema as $key => $element): ?>
						<?php if( in_array($element['idtema'], $idtemas) ): ?>
							<div class="form-check">
								<label class="form-check-label">
									<input id="checktema<?php //echo $element['idtema']; ?>" name="idtema[]" type="checkbox" class="form-check-input" value="<?php echo $element['idtema']; ?>" checked >
									<?php echo $element['nombre_tema']; ?>
								</label>
							</div>
						<?php else: ?>
							<div class="form-check">
								<label class="form-check-label">
									<input id="checktema<?php //echo $element['idtema']; ?>" name="idtema[]" type="checkbox" class="form-check-input" value="<?php echo $element['idtema']; ?>"   >
									<?php echo $element['nombre_tema']; ?>
								</label>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>

					<?php if(in_array(0, $idtemas)): ?>
						<div class="form-check">
							<label class="form-check-label" >
								<input id="checktema" name="idtema[]" type="checkbox"  class="form-check-input" value="0" checked >
								Otro
							</label>
						</div>
					<?php else: ?>
						<div class="form-check">
							<label class="form-check-label" >
								<input id="checktema" name="idtema[]" type="checkbox"  class="form-check-input" value="0" >
								Otro
							</label>
						</div>
					<?php endif; ?>


					<div class="form-group">
						<button id="BOTON" type="submit" name="action" value="0" >
							SELECCIONAR TEMAS
						</button>
					</div>
				</div>

			<?php endif; ?>









			<!--<div class="contenedores">
				<label>Escoge el tema al que está referido la nota :</label><br>
				<select id="tema" name="idtema[]" class="form-control selector-multiple" multiple="multiple" required >
										<option value="" >Seleccione Tema</option>
					<?php /*foreach ( $tema as $key => $element): */?>
						<option value="<?php /*echo $element['idtema']; */?>" >
							<?php /*echo $element['nombre_tema']; */?>
						</option>
					<?php /*endforeach; */?>
					<option value="0" >Otro</option>
				</select>
			</div>-->
			<br>

			<?php if(isset($idtemas)): ?>

				<?php foreach ($idtemas as $index=>$t): ?>
					<?php if($t==0): ?>
						<div id="otrotemac" class="contenedores" >
							<label for="otrotema" >Especifique  otra :</label><br>
							<input type="text" id="otrotema" name="tema0" placeholder="Otro tema" class="form-control" >
						</div>
					<?php endif; ?>
				<?php endforeach;?>

				<br>
			<?php endif; ?>

			<div id="subtemac" class="text-body" >
				<?php if(isset($temas_sel)): ?>
					<?php foreach ($temas_sel as $index=>$t): ?>
						<div class="contenedores">
							<div class="card" >
								<div  class="card-header  " style="background-color: #EF9600;" >
									<h4><?php echo $t['nombre_tema']; ?></h4>
								</div>
								<div class="card-body">
									<?php foreach ($subtemas_sel as $index=>$s): ?>
										<?php if($s['rel_idtema'] == $t['idtema'] ): ?>
											<div class="form-check">
												<label class="form-check-label" for="check1">
													<input type="checkbox" class="form-check-input" id="check1" name="<?php echo 'tema'.$t['idtema'].'[]';?>" value="<?php echo $s['idsubtema'];?>">
													<?php echo $s['nombre_subtema']; ?>
												</label>
											</div>
										<?php endif; ?>
									<?php endforeach; ?>
									<div class="form-check">
										<label class="form-check-label" for="check1">
											<input type="checkbox" class="form-check-input" id="check1" name="<?php echo 'tema'.$t['idtema'].'[]';?>" value="0">
											Otro Subtema
										</label>
									</div>
									<br><br>
									<div class="form-group">
										<label for="<?php echo 'otrosubtema'.$t['idtema'];?>"  >
											Especifique otro:
										</label>
										<input type="text" class="form-control" id="<?php echo 'otrosubtema'.$t['idtema'];?>" name="<?php echo 'otrosubtema'.$t['idtema'];?>" placeholder="Otro Subtema">
									</div>
								</div>
							</div>
						</div>
						<br>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<br>



			<div id="otrotemac"  >

			</div>
			<br><br>
			<div id="subtemac" >

			</div>
			<br>
			<div id="otrosubtema">

			</div>

			<br>
			<div id="contenedor-submit">
<!--				<input type="submit" id="BOTON" value="ENVIAR">-->
				<button id="BOTON" type="submit" name="action" value="1" >
					ENVIAR
				</button>
				<a href="<?php echo site_url('reformaelectoral/cancelarNuevo/');?>">
					<input type="button" class="BOTON" value="CANCELAR">
				</a>
			</div>
	</div>
	</main>

