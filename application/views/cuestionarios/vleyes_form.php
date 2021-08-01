<main role="main">
	<br><br>
	<?php echo validation_errors(); ?>
	<?php
	/** @noinspection PhpLanguageLevelInspection */
	$atr_form =[
		'id' => 'formulario' ,
	]
	;?>
	<?php echo form_open('ley/subtemas', $atr_form);?>

	<div class="contenedores_divididos">
		<div class="contenedor_superior4" id="contenedor_pequeño">
		</div>
		<div class="contenedor_inferior">
			<h3 id="Título_formulario"> Ley </h3>
		</div>
	</div>
	<br>
	<div class="contenedores">
		<label for="fecha">Introduzca la fecha:</label><br>
		<input type="date" id="fecha" name="fecha"
			   value="<?php
			   /*if(isset($noticia) && !empty($noticia->fecha_registro))
			   {
				   echo mdate('%Y-%m-%d', $noticia->fecha_registro);
			   };*/
			   ?>" required >
		<input type="hidden" id="idformulario" name="idformulario" value="<?php //echo $idformulario; ?>" >
		<input type="hidden" id="idusuario" name="idusuario" value="<?php //echo $idusuario;?>" >
	</div>
	<br>
	<div class="contenedores">
		<label>Escoja la fuente:</label><br>
		<select id="" name="" class="form-control" required >
			<option value="" selected >Seleccione medio</option>
		</select>
	</div>
	<br>

	<div class="contenedores">
		<label>Estado de la ley:</label>
		<div class="card">
			<div class="card-body">
				<div class="form-check">
					<label class="form-check-label">
						<input checked type="radio" class="form-check-input" value="">Option 2
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="radio" class="form-check-input" value="" >Option 3
					</label>
				</div>
			</div>
		</div>
	</div>
	<br>

	<div class="contenedores">
		<label for="titular">Escriba el codigo de la ley:</label><br>
		<input type="text" id="" name="" required class="form-control"
			   value="<?/*php
			   if(isset($noticia) && !empty($noticia->titular) )
			   {
				   echo $noticia->titular;
			   }*/

			   ?>"
		>
	</div>
	<br>
	<div class="contenedores">
		<label for="titular">Escriba el titulo de la ley:</label><br>
		<input type="text" id="" name="" required class="form-control"
			   value="<?/*php
			   if(isset($noticia) && !empty($noticia->titular) )
			   {
				   echo $noticia->titular;
			   }*/

			   ?>"
		>
	</div>
	<br>
	<div class="contenedores">
		<label for="titular">Escriba un pequeño párrafo que resuma la ley:</label><br>
		<input type="text" id="" name="" required class="form-control"
			   value="<?/*php
			   if(isset($noticia) && !empty($noticia->titular) )
			   {
				   echo $noticia->titular;
			   }*/

			   ?>"
		>
	</div>
	<br>
	<div class="contenedores">
		<label>Pegue el link donde se encuentra la ley:</label><br>
		<input type="text" id="" name="" class="form-control"
			   value="<?php
			   /*if(isset($noticia) && !empty($noticia->url_noticia) )
			   {
				   echo $noticia->url_noticia;
			   }*/
			   ?>"
		>
	</div>


	<div class="contenedores">
		<div class="card">
			<div class="card-header cuest3">
				<h4 class="text-white">
					TEMAS
				</h4>
			</div>
			<div class="card-body">
				<label>Escoge el tema al que está referida la ley :</label><br>
				<?php foreach ($tema as $a): ?>
					<div class="form-check">
						<label class="form-check-label">
							<input id="checktema" name="idtema[]" type="checkbox" class="form-check-input"
								   value="<?php echo $a['idtema']; ?>"   >
							<?php echo $a['nombre_tema']; ?>
						</label>
					</div>
				<?php endforeach; ?>
				<div class="form-check">
					<label class="form-check-label">
						<input id="checktema" name="idtema[]" type="checkbox" class="form-check-input"
							   value="0"   >
						Otro
					</label>
				</div>
			</div>
		</div>
	</div>

	<br>
	<div id="otrotemac">

	</div>

	<br>
	<div id="contenedor-submit">
		<button id="BOTON" type="submit" name="action" value="1" >
			SIGUIENTE
		</button>
		<a href="<?php echo site_url('ley/cancelarNuevo/');?>">
			<input type="button" class="BOTON" value="CANCELAR">
		</a>
	</div>





	<?php echo form_close();?>







	<br>
</main>
