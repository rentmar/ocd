
<?php if($idhoja_preguntas == 1): ?>

	<?php foreach ($secciones as $s): ?>
		<?php
			$datos_seccion['nombre_seccion'] = $s->nombre_seccion;
			$datos_seccion['color_encabezado'] = $color_encabezado;
			$datos_seccion['preguntasSeccion'] = $this->Interfaz_model->preguntasPorSeccion($s->idseccion);
			$datos_seccion['mesas'] = $mesas;
			$datos_seccion['codigo_seccion'] = $s->codigo_seccion;
			$datos_seccion['idsecccion'] = $s->idseccion;
			$datos_seccion['idhoja_preguntas'] = $idhoja_preguntas;
			$datos_seccion['respuestas'] = $respuestas;
			$datos_seccion['iddepartamento'] = $hoja1->rel_iddepartamento;

		?>
		<?php if($s->rel_tipo_seccion == 1): ?>
			<?php $this->load->view('interfaz/secciones/svsecctipo1', $datos_seccion ); ?>
		<?php elseif ($s->rel_tipo_seccion == 2):  ?>
			<?php $this->load->view('interfaz/secciones/svsecctipo2', $datos_seccion ); ?>
		<?php elseif ($s->rel_tipo_seccion == 3): ?>
			<?php //$this->load->view('interfaz/secciones/svsecctipo1', ' ' ); ?>
		<?php elseif ($s->rel_tipo_seccion == 4): ?>
			<?php $this->load->view('interfaz/secciones/svsecctipo4', $datos_seccion ); ?>
		<?php else:?>
		<?php endif;?>
	<?php endforeach; ?>

<?php elseif ($idhoja_preguntas == 2): ?>

	<?php foreach ($secciones as $s): ?>
		<?php
		$datos_seccion['nombre_seccion'] = $s->nombre_seccion;
		$datos_seccion['color_encabezado'] = $color_encabezado;
		$datos_seccion['preguntasSeccion'] = $this->Interfaz_model->preguntasPorSeccion($s->idseccion);
		$datos_seccion['mesas'] = $mesas;
		$datos_seccion['codigo_seccion'] = $s->codigo_seccion;
		$datos_seccion['idsecccion'] = $s->idseccion;
		$datos_seccion['idhoja_preguntas'] = $idhoja_preguntas;
		$datos_seccion['respuestas'] = $respuestas;
		$datos_seccion['iddepartamento'] = $hoja2->rel_iddepartamento;

		?>
		<?php if($s->rel_tipo_seccion == 1): ?>
			<?php $this->load->view('interfaz/secciones/svsecctipo1', $datos_seccion ); ?>
		<?php elseif ($s->rel_tipo_seccion == 2):  ?>
			<?php $this->load->view('interfaz/secciones/svsecctipo2', $datos_seccion ); ?>
		<?php elseif ($s->rel_tipo_seccion == 3): ?>
			<?php //$this->load->view('interfaz/secciones/svsecctipo1', ' ' ); ?>
		<?php elseif ($s->rel_tipo_seccion == 4): ?>
			<?php $this->load->view('interfaz/secciones/svsecctipo4', $datos_seccion ); ?>
		<?php else:?>
		<?php endif;?>
	<?php endforeach; ?>




<?php endif; ?>
