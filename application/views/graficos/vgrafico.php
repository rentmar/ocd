<html>
	<head>
		<title>Graficos</title>
		<script type="text/javascript" src="<?php echo base_url().'/assets/d3/d3.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'/assets/d3/tsiyur.js';?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/d3/gestilo.css';?>">
	</head>
	<body >
		<h2 class = "miclase">Message</h2>
		<div class="miclase">
			Hola Oscar
		</div>
		<script>
			d3.selectAll(".miclase").style("color","blue");
		</script>
		<!--<div class="barras"></div>
		<!--<script>
			d3.select('body').append('h1').text('Oscar Apaza Rocha');
		</script>-->
	</body>
</html>
