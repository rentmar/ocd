<main role="main" >
<?php if($this->ion_auth->in_group(3)): ?>
	<br>
	<div class="container">

		<div class="row">

			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header cuest1">
						Reforma<br>Electoral
					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/democracia.svg'; ?>" alt="Card image">
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

			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header cuest3 ">
						Censo
						<br><br>

					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/censo.jpg'; ?>" alt="Card image">
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
					<div class="card-header cuest4 ">
						Leyes
						<br><br>

					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/leyes.jpg'; ?>" alt="Card image">
					<div class="card-body">
						<a href="<?php echo site_url('ley/');?>" class="btn btn-info text-body" role="button" style="background-color:#AFA3E1;">
							Nuevo
						</a>
						<a href="<?php echo site_url('ley/editar/');?>" class="btn btn-info text-body " role="button" style="background-color:#AFA3E1;">
							Editar
						</a>
					</div>
				</div>
			</div>

		</div>

	</div>

<?php endif; ?>
</main>

