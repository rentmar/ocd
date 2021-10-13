<main role="main">
	<br>
	<div class="container">
		<div class="row">
		<form action="<?php echo site_url('Encuesta/verTiempo'); ?>" method="post">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<div id="caja_boton">
					<div id="contenedor-submit">	
					<input type="submit" class="BOTON" value="Ver tiempo">
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
				<input type="hidden" id="inicio" name="inicio" value="<?php echo $tiempo;?>">
			</div>
		</form>
		</div>
		
	</div>
	<br>
</main>

