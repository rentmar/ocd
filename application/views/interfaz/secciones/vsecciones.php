<?php foreach ($secciones as $s): ?>
	<?php
		$datos_seccion['nombre_seccion'] = $s->nombre_seccion;
		$datos_seccion['color_encabezado'] = $color_encabezado;
		$datos_seccion['preguntasSeccion'] = $this->Interfaz_model->preguntasPorSeccion($s->idseccion);
		$datos_seccion['mesas'] = $mesas;
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
