<!-- Seccion matricial mesas --->



<?php $datos_pregunta['iddepartamento'] = $iddepartamento;?>
<?php if($idhoja_preguntas == 1):  ?>
	<div class="contenedores">
		<div class="card">
			<div class="card-header  <?php echo $color_encabezado; ?> ">
				<h4 class="text-white" ><?php echo $nombre_seccion; ?></h4>
			</div>
			<?php echo form_open('', [ 'id' =>'formulario_'.$codigo_seccion,])?>
			<div class="card-body font-weight-normal">

				<div class="form-group">
					<!--<h6>idseccion:</h6>-->
					<input type="hidden" id="idseccion" name="idseccion" class="form-control"
						   value="<?php echo $idsecccion; ?>"
					>
				</div>
				<div class="form-group">
<!--					<labe>Codigo de seccion</labe>-->
					<input type="hidden" id="codigo_secion" name="codigo_seccion" class="form-control"
						   value="<?php echo $codigo_seccion; ?>"
					>
				</div>
				<?php foreach ($preguntasSeccion as $p ): ?>
					<?php if($p->rel_tipo_pregunta == 1): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo2', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 2):  ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo2', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 3): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo3', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 4): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo4', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 5): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo5', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 6): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo6', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 7): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo7', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 8): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo8', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 9): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo9', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 10): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo10', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 11): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo11', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 12): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo12', $datos_pregunta ); ?>
					<?php else:?>
					<?php endif;?>
				<?php endforeach; ?>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">
					<i class="fas fa-save"></i>
				</button>
			</div>
			</form>
		</div>
	</div>
	<br>
	<br>
<?php elseif ($idhoja_preguntas == 2):?>

	<div class="contenedores">
		<div class="card">
			<div class="card-header  <?php echo $color_encabezado; ?> ">
				<h4 class="text-white" ><?php echo $nombre_seccion; ?></h4>
			</div>
			<?php echo form_open('', [ 'id' =>'formulario2_'.$codigo_seccion,])?>
			<div class="card-body font-weight-normal">

				<div class="form-group">
					<!--<h6>idseccion:</h6>-->
					<input type="hidden" id="idseccion" name="idseccion" class="form-control"
						   value="<?php echo $idsecccion; ?>"
					>
				</div>
				<div class="form-group">
					<!--					<labe>Codigo de seccion</labe>-->
					<input type="hidden" id="codigo_secion" name="codigo_seccion" class="form-control"
						   value="<?php echo $codigo_seccion; ?>"
					>
				</div>
				<?php foreach ($preguntasSeccion as $p ): ?>
					<?php if($p->rel_tipo_pregunta == 1): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo2', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 2):  ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo2', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 3): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo3', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 4): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo4', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 5): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo5', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 6): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo6', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 7): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo7', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 8): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo8', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 9): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo9', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 10): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo10', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 11): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo11', $datos_pregunta ); ?>
					<?php elseif ($p->rel_tipo_pregunta == 12): ?>
						<?php $datos_pregunta['mesas'] = $mesas;  ?>
						<?php $datos_pregunta['respuestas'] = $respuestas; ?>
						<?php $datos_pregunta['pregunta']= $p ;?>
						<?php $datos_pregunta['idhoja_preguntas'] = $idhoja_preguntas; ?>
						<?php $this->load->view('interfaz/preguntas/svtipo12', $datos_pregunta ); ?>
					<?php else:?>
					<?php endif;?>
				<?php endforeach; ?>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">
					<i class="fas fa-save"></i>
				</button>
			</div>
			</form>
		</div>
	</div>
	<br>
	<br>

<?php endif;?>
