<main role="main" >
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header" style="background-color:#7f182b;color:white">
						<h4>Reportes Simples</h4>
					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/repsimp.svg'; ?>" alt="Card image">
					<div class="card-body">
						<a href="<?php echo site_url('manejoDB/reportesSimples');?>" class="BOTON" role="button">
							Ir
						</a>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header" style="background-color:#7f182b;color:white">
						<h4>Reportes Compuestos</h4>
					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/repcomp.svg'; ?>" alt="Card image">
					<div class="card-body">
						<a href="<?php echo site_url('manejoDB/reportesCompuestos');?>" class="BOTON" role="button">
							Ir
						</a>
					</div>
				</div>
			</div>
			<?php if($this->ion_auth->is_admin()): ?>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header" style="background-color:#7f182b;color:white">
						<h4>Administrar Noticias</h4>
					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/Administrarnoticias.svg'; ?>" alt="Card image">
					<div class="card-body">
						<a href="<?php echo site_url('manejoDB/noticiasAdministrador');?>" class="BOTON" role="button">
							Ir
						</a>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header" style="background-color:#7f182b;color:white">
						<h4>Reportes Leyes</h4>
					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/repcomp.svg'; ?>" alt="Card image">
					<div class="card-body">
						<a href="<?php echo site_url('ManejoDBL/reportesLeyes');?>" class="BOTON" role="button">
							Ir
						</a>
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header" style="background-color:#7f182b;color:white">
						<h4>Reportes Leyes Compuestos</h4>
					</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/repcomp.svg'; ?>" alt="Card image">
					<div class="card-body">
						<a href="<?php echo site_url('ManejoDBL/reportesLeyescomp');?>" class="BOTON" role="button">
							Ir
						</a>
					</div>
				</div>
			</div>



		</div>
	</div>
	<br>
</main>
