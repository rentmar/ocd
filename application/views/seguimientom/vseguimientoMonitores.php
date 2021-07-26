<main role="main" >
<br>
	<div class="container">

		<div class="row">

			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header cuest1">Cuestionarios Realizados Por Monitor</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/pol.png'; ?>" alt="Card image">
					<div class="card-body">

						<a href="<?php echo site_url('Seguimientomonitores/EstadoObservacionElectoral');?>" class="btn btn-info" role="button" style="background-color:#93C90F;">Ver</a>
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header cuest2 ">Cuestionarios Por Monitor Para Docentes</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/pul.png'; ?>" alt="Card image">
					<div class="card-body">
						<a href="<?php echo site_url('Seguimientomonitores/EstadoObservacionElectoralDocentes');?>" class="btn btn-info" role="button" style="background-color:#EF9600;">Ver</a>

					</div>

				</div>
			</div>
                    
                    	<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card">
					<div class="card-header cuest1 ">Cuestionarios Realizados Por Departamento</div>
					<img class="card-img-top" src="<?php echo base_url().'assets/img/pil.png'; ?>" alt="Card image">
					<div class="card-body">
						<a href="<?php echo site_url('Seguimientomonitores/CuestionariosPorDepartamentoUsuario');?>" class="btn btn-info" role="button" style="background-color:#93C90F;">Ver</a>
					</div>

				</div>
			</div> 
			
                    
		</div>

	</div>


</main>

