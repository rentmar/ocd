<main>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="card">
					<div class="card-header cuest1" >
						Reforma Electoral
					</div>
					<div class="card-body" >
						fecha:<?php echo $fecha_noticia;?><br></br>
						fecha registro:<?php echo $fecha_registro;?><br></br>
						titular:<?php echo $titular;?><br></br>
						resumen:<?php echo $resumen;?><br></br>
						url:<?php echo $url_noticia;?><br></br>
						medio:<?php echo $medio;?><br></br>
						actor:<?php echo $actor;?><br></br>
						tema:<?php echo $tema;?><br></br>
						subtema:<?php echo $subtema;?><br></br>
					</div>
					<div class="card-footer" >
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Enviar</button>
						<a href="#" class="btn btn-info" role="button">Cancelar</a>
					</div>

				</div>
			</div>

		</div>

	</div>



</main>


<!-- The Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Modal Heading</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="<?php echo base_url().'index.php/Noticia/registrarNoticia'; ?>" method="post">
				Enviar Informacion
				<?php echo $tema;?>
				<?php echo $subtema;?>
				<input type="hidden" id="idcuestionario" name="idcuestionario" value="<?php echo $idcuestionario; ?>" >
				<input type="hidden" id="fecha_registro" name="fecha_registro" value="<?php echo $fecha_registro; ?>" >
				<input type="hidden" id="fecha_noticia" name="fecha_noticia" value="<?php echo $fecha_noticia;?>" >
				<input type="hidden" id="titular" name="titular" value="<?php echo $titular; ?>" >
				<input type="hidden" id="resumen" name="resumen" value="<?php echo $resumen;?>" >
				<input type="hidden" id="url_noticia" name="url_noticia" value="<?php echo $url_noticia;?>" >
				<input type="hidden" id="idactor" name="idactor" value="<?php echo $idactor;?>" >
				<input type="hidden" id="idmedio" name="idmedio" value="<?php echo $idmedio;?>" >
				<?php if(isset($idtema)): ?>
				<input type="hidden" id="idtema" name="idtema" value="<?php echo $idtema;?>" >
				<?php endif; ?>
				<?php if(isset($idsubtema)): ?>
				<input type="hidden" id="idsubtema" name="idsubtema" value="<?php echo $idsubtema;?>" >
				<?php endif; ?>
				<?php if(isset($otrotema)): ?>
				<input type="hidden" id="otrotema" name="otrotema" value="<?php echo $otrotema;?>" >
				<?php endif; ?>
				<?php if(isset($otrosubtema)): ?>
				<input type="hidden" id="otrosubtema" name="otrosubtema" value="<?php echo $otrosubtema;?>" >
				<?php endif; ?>

				<input type="hidden" id="idusr" name="idusr" value="<?php echo $idusr;?>" >
				
				<input type="submit" id="BOTON" value="ENVIAR">
				</form>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<!-- Al metodo de insercion -->
				
			</div>
				
		</div>
	</div>
</div>
