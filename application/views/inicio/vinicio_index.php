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
</main>

