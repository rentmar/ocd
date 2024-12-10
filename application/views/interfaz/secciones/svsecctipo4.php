<!-- Seccion matricial mesas --->
<div class="contenedores">
	<div class="card">
		<?php echo form_open('', [ 'id' =>'formulario_'.$codigo_seccion,])?>
		<div class="card-body font-weight-normal">
			<div class="form-group">
				<input type="text" id="idseccion" name="idseccion" class="form-control"
					   value="<?php echo $idsecccion; ?>"
				>
			</div>
			<div class="form-group">
				<labe>Codigo de seccion</labe>
				<input type="text" id="codigo_secion" name="codigo_seccion" class="form-control"
					   value="<?php echo $codigo_seccion; ?>"
				>
			</div>
			<?php foreach ($preguntasSeccion as $p ): ?>
				<?php if($p->rel_tipo_pregunta == 1): ?>
					<?php $datos_pregunta['etiqueta'] = $p->etiqueta_pregunta;  ?>
					<?php $datos_pregunta['pregunta'] = $p->nombre_pregunta;  ?>
					<?php $datos_pregunta['mesas'] = $mesas;  ?>
					<?php $datos_pregunta['idpregunta'] = $p->idpregunta;  ?>
					<?php $this->load->view('interfaz/preguntas/svtipo1', $datos_pregunta ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 2):  ?>
					<?php $datos_pregunta['etiqueta'] = $p->etiqueta_pregunta;  ?>
					<?php $datos_pregunta['pregunta'] = $p->nombre_pregunta;  ?>
					<?php $datos_pregunta['mesas'] = $mesas;  ?>
					<?php $datos_pregunta['idpregunta'] = $p->idpregunta;  ?>
					<?php $this->load->view('interfaz/preguntas/svtipo2', $datos_pregunta ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 3): ?>
					<?php $datos_pregunta['etiqueta'] = $p->etiqueta_pregunta;  ?>
					<?php $datos_pregunta['pregunta'] = $p->nombre_pregunta;  ?>
					<?php $datos_pregunta['mesas'] = $mesas;  ?>
					<?php $datos_pregunta['idpregunta'] = $p->idpregunta;  ?>
					<?php $this->load->view('interfaz/preguntas/svtipo3', $datos_pregunta ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 4): ?>
					<?php //$this->load->view('interfaz/secciones/svsecctipo4', $datos_seccion ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 5): ?>
					<?php $datos_pregunta['etiqueta'] = $p->etiqueta_pregunta;  ?>
					<?php $datos_pregunta['pregunta'] = $p->nombre_pregunta;  ?>
					<?php $datos_pregunta['mesas'] = $mesas;  ?>
					<?php $datos_pregunta['idpregunta'] = $p->idpregunta;  ?>
					<?php $this->load->view('interfaz/preguntas/svtipo5', $datos_pregunta ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 6): ?>
					<?php $datos_pregunta['etiqueta'] = $p->etiqueta_pregunta;  ?>
					<?php $datos_pregunta['pregunta'] = $p->nombre_pregunta;  ?>
					<?php $datos_pregunta['mesas'] = $mesas;  ?>
					<?php $datos_pregunta['idpregunta'] = $p->idpregunta;  ?>
					<?php $this->load->view('interfaz/preguntas/svtipo6', $datos_pregunta ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 7): ?>
					<?php //$this->load->view('interfaz/secciones/svsecctipo4', $datos_seccion ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 8): ?>
					<?php //$this->load->view('interfaz/secciones/svsecctipo4', $datos_seccion ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 9): ?>
					<?php //$this->load->view('interfaz/secciones/svsecctipo4', $datos_seccion ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 10): ?>
					<?php $datos_pregunta['etiqueta'] = $p->etiqueta_pregunta;  ?>
					<?php $datos_pregunta['pregunta'] = $p->nombre_pregunta;  ?>
					<?php $datos_pregunta['mesas'] = $mesas;  ?>
					<?php $datos_pregunta['idpregunta'] = $p->idpregunta;  ?>
					<?php $this->load->view('interfaz/preguntas/svtipo10', $datos_pregunta ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 11): ?>
					<?php //$this->load->view('interfaz/secciones/svtipo4', $datos_seccion ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 12): ?>
					<?php $datos_pregunta['etiqueta'] = $p->etiqueta_pregunta;  ?>
					<?php $datos_pregunta['pregunta'] = $p->nombre_pregunta;  ?>
					<?php $datos_pregunta['mesas'] = $mesas;  ?>
					<?php $datos_pregunta['idpregunta'] = $p->idpregunta;  ?>
					<?php $this->load->view('interfaz/preguntas/svtipo12', $datos_pregunta ); ?>
				<?php elseif ($p->rel_tipo_pregunta == 13): ?>
					<?php $datos_pregunta['etiqueta'] = $p->etiqueta_pregunta;  ?>
					<?php $datos_pregunta['pregunta'] = $p->nombre_pregunta;  ?>
					<?php $datos_pregunta['mesas'] = $mesas;  ?>
					<?php $datos_pregunta['idpregunta'] = $p->idpregunta;  ?>
					<?php $this->load->view('interfaz/preguntas/svtipo13', $datos_pregunta ); ?>
				<?php else:?>
				<?php endif;?>
			<?php endforeach; ?>

		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-success">
				<i class="fas fa-save"></i>
			</button>
		</div></form>
	</div>
</div>
<br>
<br>
