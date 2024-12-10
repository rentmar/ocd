<?php if($pregunta->restriccion_departamento == 0): ?>


	<div class="form-group">
		<input type="hidden" class="form-control" id="codigopregunta" name="codigopregunta"
			   value="<?php echo $pregunta->codigo_pregunta; ?>" />
	</div>

	<div class="form-group">
		<div class="form-group">
			<?php $ra = (array) $respuestas; ?>
			<?php $r = $ra[$pregunta->codigo_pregunta]; ?>
		</div>
		<!-- Mensaje  -->
		<?php if( !empty($pregunta->info_pregunta) ): ?>
		<div class="alert alert-success">
			<strong>Informacion! </strong> <?php echo $pregunta->info_pregunta; ?>
		</div>
		<?php endif; ?>
		<!-- fin de Mensaje  -->

		<label for="<?php echo $pregunta->codigo_pregunta;?>">
			<?php echo $pregunta->etiqueta_pregunta.'. '.$pregunta->nombre_pregunta; ?>

		</label><br>
		<textarea class="form-control" rows="5"
				  id="<?php echo $pregunta->codigo_pregunta;?>"
				  name="<?php echo $pregunta->codigo_pregunta;?>"><?php if( !empty($r->respuesta)){ echo $r->respuesta; } ?></textarea>
	</div>
	<br>
<?php elseif ($pregunta->restriccion_departamento == 1):?>

	<?php echo "Despliegue alternativo"; ?>

<?php endif; ?>
