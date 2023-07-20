<main>
	<br><br>
	<?php echo validation_errors(); ?>
	<?php
	/** @noinspection PhpLanguageLevelInspection */
	$atr_form =[
		'id' => 'formulario_encuestador_supervisor' ,
	]
	;?>
	<?php echo form_open('plenaria/capturaDatos', $atr_form);?>
	<div class="contenedores_divididos">
		<div class="contenedor_superior1" id="contenedor_pequeño">
		</div>
		<div class="contenedor_inferior">
			<h3 id="Título_formulario"> <?php echo $formulario->nombre; ?> </h3>
		</div>
	</div>
	<br>

	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest1">
				<h4>
					Datos Generales
				</h4>
			</div>
			<div class="card-body">
				Area URBANA RURAL
			</div>
		</div>
	</div>


	<?php foreach ($secciones as $s): ?>
	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest1">
				<h4>
					<?php echo $s->nombre_seccion; ?>
				</h4>
			</div>
			<div class="card-body">
				<?php foreach ($preguntas as $p): ?>
					<?php if($s->idfvsec == $p->idseccion ):?>
						<?php if($p->tipo_pregunta == 1): ?>
							<?php echo $p->pregunta; ?>
							<?php //$this->load->view('encuesta/svencuesta_plantilla_resp_selsimple', $datos_pregunta ); ?>
						<?php elseif ($p->tipo_pregunta == 2):  ?>
							<?php echo $p->pregunta; ?>
							<?php //$this->load->view('encuesta/svencuesta_plantilla_resp_selmultiple', $datos_pregunta); ?>
						<?php elseif ($p->tipo_pregunta == 3):  ?>
							<?php //$this->load->view('encuesta/svencuesta_plantilla_resp_abiertasimple', $datos_pregunta); ?>
						<?php elseif ($p->tipo_pregunta == 4):  ?>
							<?php //$this->load->view('encuesta/svencuesta_plantilla_resp_selmultiple_otro_abierta', $datos_pregunta); ?>
						<?php elseif ($p->tipo_pregunta == 5):  ?>
							<?php //$this->load->view('encuesta/svencuesta_plantilla_resp_multiple_cuantificada', $datos_pregunta); ?>
						<?php elseif ($p->tipo_pregunta == 6):  ?>

						<?php elseif ($p->tipo_pregunta == 7):  ?>

						<?php elseif ($p->tipo_pregunta == 8):  ?>

						<?php elseif ($p->tipo_pregunta == 9):  ?>

						<?php else: ?>
							Sin definicion
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<br>
	<?php endforeach; ?>
	<?php echo form_close();?>

</main>
