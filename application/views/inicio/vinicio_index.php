<main role="main" >
<?php if($this->ion_auth->in_group(3)): ?>
	<br>
	<div class="container">

		<div class="row">
			<?php //if(!empty($this->session->flashdata())): ?>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >

					<div id="mensaje-error">
						<div class="alert alert-<?php echo $this->session->flashdata('clase')?>">
							<?php echo $this->session->flashdata('mensaje') ?>
						</div>
					</div>
			</div>
			<?php //endif; ?>

			<?php if($this->ion_auth->is_admin()): ?>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header cuest1">
						Reforma<br>Electoral
					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/reforma.svg'; ?>" alt="Card image">
					<div class="card-body">


						<a href="<?php echo site_url('reformaelectoral');?>" class="btn btn-info" role="button" style="background-color:#93C90F; color:black;" >
							Nuevo
						</a>


						<a href="<?php echo site_url('reformaelectoral/editar/') ?>" class="btn btn-info" role="button" style="background-color:#93C90F;color:black;">
							Editar
						</a>

					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header cuest2 ">
						Institucionalidad<br>Democrática
					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/institucionalidad.svg'; ?>" alt="Card image">
					<div class="card-body">


						<a href="<?php echo site_url('instdemocratica/');?>" class="btn btn-info" role="button" style="background-color:#EF9600; color:black;">
							Nuevo
						</a>


						<a href="<?php echo site_url('instdemocratica/editar/');?>" class="btn btn-info" role="button" style="background-color:#EF9600; color:black;">
							Editar
						</a>

					</div>

				</div>
			</div>
			<?php endif; ?>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header cuest3 ">
						Censo
						<br><br>

					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/censo.svg'; ?>" alt="Card image">
					<div class="card-body">
						<a href="<?php echo site_url('censo/');?>" class="btn btn-info text-body" role="button" style="background-color:#00A3E1;">
							Nuevo
						</a>
						<a href="<?php echo site_url('censo/editar/');?>" class="btn btn-info text-body " role="button" style="background-color:#00A3E1;">
							Editar
						</a>
					</div>
				</div>
			</div>


			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header cuest2 ">
						Produccion<br>Normativa
					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/institucionalidad.svg'; ?>" alt="Card image">
					<div class="card-body">
						<div class="btn-group ">
							<button type="button" class="btn  cuest2">Nuevo</button>
							<button type="button" class="btn dropdown-toggle dropdown-toggle-split cuest2" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<div class="dropdown-menu">
								<?php foreach ($instancia as $i): ?>
									<a class="dropdown-item" href="<?php echo site_url('normativa/normativaSeleccion/'.$i->idinsseg); ?>"><?php echo $i->instancia; ?></a>
								<?php endforeach; ?>
							</div>
						</div>



						<a href="<?php echo site_url('normativa/editar/');?>" class="btn btn-info" role="button" style="background-color:#EF9600; color:black;">
							Editar
						</a>

					</div>

				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header cuest3 ">
						Seg. Agenda Legislativa
						<br><br>

					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/censo.svg'; ?>" alt="Card image">
					<div class="card-body">
						<a href="<?php echo site_url('plenaria');?>" class="btn btn-info text-body" role="button" style="background-color:#00A3E1;">
							Nuevo
						</a>
						<a href="<?php echo site_url('plenaria/editar/');?>" class="btn btn-info text-body " role="button" style="background-color:#00A3E1;">
							Editar
						</a>
					</div>
				</div>
			</div>
			
			<?php if($this->ion_auth->in_group(4)): ?>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header cuest4 ">
						Leyes
						<br><br>

					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/leyes.svg'; ?>" alt="Card image">
					<div class="card-body">
						<a href="<?php echo site_url('Ley');?>" class="btn btn-info text-body" role="button" style="background-color:#7c5295;">
							Nuevo
						</a>
						<a href="<?php echo site_url('ley/editar/');?>" class="btn btn-info text-body " role="button" style="background-color:#7c5295;">
							Editar
						</a>
					</div>
				</div>
			</div>
			<?php endif; ?>

		</div>

	</div>

<?php endif; ?>

<?php if($this->ion_auth->in_group(5)): ?>
	<br>
	<div class="container">
		<div class="row">
			<?php if(!empty($this->session->flashdata())): ?>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >

					<div id="mensaje-error">
						<div class="alert alert-<?php echo $this->session->flashdata('clase')?>">
							<?php echo $this->session->flashdata('mensaje') ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">

			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores table-responsive">
				<h4>Usuario: <?php echo $usuario->username; ?></h4>
				<table>
					<thead>
					<tr id="datos">
						<th>Nro</th>
						<th>Encuesta</th>
						<th>URL</th>
						<th>Estado</th>
						<th>Accion</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($encuestas as $e) {?>
						<tr>
							<td><?php echo $e->idencuesta;?></td>
							<td><?php echo $e->uinombre_encuesta; ?></td>
							<td>
								<a href="<?php echo site_url('read/url/'.$e->hash_text); ?>"  >
									<?php echo site_url('read/url/'.$e->hash_text); ?>
								</a>
							</td>
							<?php if(!$e->usado): ?>
								<td class="text-success">
									<p>Vigente</p>
								</td>
							<?php else: ?>
								<td class="text-danger">
									<p>Expirado</p>
								</td>
							<?php endif; ?>
							<td>
								<button class="btn btn-light clipboard " data-clipboard-text="<?php echo site_url('read/url/'.$e->hash_text); ?>" >
									<i class="far fa-copy"></i>
								</button>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
	<br>

	<script type="text/javascript">
		/*function actualizar() {
			location.reload(true);
        }*/
        //setInterval("actualizar()", 10000);
	</script>
<?php endif; ?>
<?php if($this->ion_auth->in_group(7)): ?>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8" >
				<iframe style="width: 100%; height: 800px;" title="yoparticipo" src="https://yoparticipo.oep.org.bo/"></iframe>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4" >
				<div id="esquinas_redondeadas">
					<div id="Caja_de_datos" class="Caja_de_datos">
						<?php
						/** @noinspection PhpLanguageLevelInspection */
						$att_ci = [
							'id' => 'formcomp_ci',
							'name' => 'formcomp_ci',
						]; ?>
						<?php echo form_open('', $att_ci); ?>
						<div class="form-group">
							<label for="carnet_identidad">COMPROBAR CI:</label>
							<input type="text" class="form-control" id="carnet_identidad" name="carnet_identidad" pattern="[0-9]+" placeholder="Numero de Carnet de identidad" required>
						</div>
						<div class="form-group">
							<input type="submit" id="BOTON" value="Comprobar">
						</div>
						<?php echo form_close(); ?>
					</div>
			</div>
		</div>
	</div>
<?php endif; ?>
</main>

<!-- The Modal de alerta PERSONA YA REGISTRADA -->
<div class="modal fade" id="personaregistrada">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-warning">
				<h4 class="modal-title text-white ">Alerta</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				El numero de carnet ya se encuentra registrado.
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button id="BOTON" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>

		</div>
	</div>
</div>

<!-- The Modal de alerta PERSONA NO REGISTRADA -->
<div class="modal fade" id="personanoregistrada">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-info">
				<h4 class="modal-title text-white ">Registrar?</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				El numero de carnet no se encuentra registrado.
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<a  href="<?php echo site_url('padron/crearPartida') ?>" id="BOTON" role="button" >
					Proceda
				</a>
				<button id="BOTON" type="button" class="btn btn-secondary" data-dismiss="modal">
					Cerrar
				</button>
			</div>

		</div>
	</div>
</div>


<!-- The Modal de alerta PERSONA NO REGISTRADA -->
<div class="modal fade" id="personanoregistradaci">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<?php
			/** @noinspection PhpLanguageLevelInspection */
			$att_ci = [
				'id' => 'formregistrar_ci',
				'name' => 'formregistrar_ci',
			]; ?>
			<?php echo form_open(site_url('padron/crearRegistro/'), $att_ci); ?>
			<!-- Modal Header -->
			<div class="modal-header bg-info">
				<h4 class="modal-title text-white ">Registrar?</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">

				<div class = "form-row">
					<div class = "form-group col-6">
						<label for = "num_libro">Libro:</label>
						<input type = "number" class =" form-control"
							   id = "num_libro" name="num_libro"
							   placeholder = "Numero de Libro" pattern="[0-9]+" required>
					</div>

					<div class = "form-group col-6">
						<label for = "num_partida">Partida:</label>
						<input type = "number" class = "form-control" min="1" max="100"
							   id = "num_partida" name="num_partida"
							   placeholder = "Numero de Partida" pattern="[0-9]+" required>
					</div>
				</div>

				<div class="form-row">
					<div class="col">
						<hr>
					</div>
				</div>

				<div class="form-row">
					<div class = "form-group col-6">
						<label for = "num_docid">Numero de CI:</label>
						<input type = "text" class = "form-control"
							   id = "num_docid" name="num_docid"
							   placeholder = "Numero de documento de identidad" required>
					</div>
					<div class = "form-group col-6">
						<label for = "fecha_nac" >Fecha de nacimiento:</label>
						<input type = "date" class = "form-control"
							   id = "fecha_nacimiento" name="fecha_nacimiento" required>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<hr>
					</div>
				</div>

				<div class = "form-row">
					<div class = "form-group col-4">
						<label for = "nombres" >Nombres:</label>
						<input type = "text" class =" form-control"
							   id = "nombres" name="nombres"
							   placeholder = "Nombres"  required>
					</div>
					<div class = "form-group col-4">
						<label for = "primer_apellido">Primer Apellido:</label>
						<input type = "text" class = "form-control"
							   id = "primer_apellido" name="primer_apellido"
							   placeholder = "Primer apellido"  required>
					</div>
					<div class = "form-group col-4">
						<label for = "segundo_apellido">Segundo Apellido:</label>
						<input type = "text" class = "form-control"
							   id = "segundo_apellido" name="segundo_apellido"
							   placeholder = "Segundo apellido"  required>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<hr>
					</div>
				</div>


			</div>


			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-secondary" id="BOTON">Registrar</button>
				<button id="BOTON" type="button" class="btn btn-secondary" data-dismiss="modal">
					Cerrar
				</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<!-- The Modal de alerta Insercion exitosa -->
<div class="modal fade" id="insertcorrecto">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-succcess">
				<h4 class="modal-title text-white ">Exito</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				El numero de carnet se ha registrado.
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button id="BOTON" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>

		</div>
	</div>
</div>

<!-- The Modal de alerta Insercion fallida -->
<div class="modal fade" id="inserterror">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-danger">
				<h4 class="modal-title text-white ">Error</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				El numero de carnet no se pudo registrar.
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button id="BOTON" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>

		</div>
	</div>
</div>

