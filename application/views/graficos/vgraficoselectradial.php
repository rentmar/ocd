<br>
	<div class="container">

			<div class="card-header">
				<h4>Representacion Grafica Tipo Radiales Por:</h4>
<!--			</div>
			<div class="card-footer">-->
				<input type="hidden" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
				<input type="hidden" id="fecha_fin" name="fecha_fin" class="form-control" required>
				<button id="actores"  type="button" class="btn btn-secondary">Actores</button>
				<button id="mcomunicacion"  type="button" class="btn btn-secondary">Medio de Comunicacion</button>
			</div>
                    	<div class="card-body">
				<div id="my_dataviz"></div>
			</div>

	</div>
    
    <script>var baseurl = "<?php echo site_url(); ?>";</script>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/radialesa.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/radialesmdc.js') ?>"></script>
    <script type="text/javascript">
        
    </script>