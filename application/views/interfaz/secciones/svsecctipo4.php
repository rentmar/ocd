<!-- Seccion matricial mesas --->
<div class="contenedores">
	<div class="card">
		<?php echo form_open('', [ 'id' =>'formulario_'.$codigo_seccion,])?>
		<div class="card-body font-weight-normal">
			<div class="form-group">
				<?php if($rel_idhoja ==1): ?>
					<?php echo "hoja1 respuestas"."<br>"; ?>
					<?php  var_dump($hoja1)?>
				<?php elseif ($rel_idhoja ==2): ?>
					<?php echo "hoja2 respuestas"."<br>"; ?>
					<?php  var_dump($hoja2)?>
				<?php endif;?>
			</div>
			<br>
			<div class="form-group">
				<?php if($rel_idhoja ==1): ?>
					<h6>idhoja1</h6>
					<input type="text" id="idfrhoja1" name="idfrhoja1" class="form-control"
						   value="<?php echo $hoja1->idfrhoja1; ?>"
					>
				<?php elseif ($rel_idhoja ==2): ?>
					<h6>idhoja2</h6>
					<input type="text" id="idfrhoja2" name="idfrhoja2" class="form-control"
						   value="<?php echo $hoja2->idfrhoja2; ?>"
					>
				<?php endif;?>
			</div>
			<div class="form-group">
				<input type="text" id="idseccion" name="idseccion" class="form-control"
					   value="<?php echo $idsecccion; ?>"
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
