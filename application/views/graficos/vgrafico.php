<html>
	<head>
		<title>Graficos</title>
		<script type="text/javascript" src="<?php echo base_url().'/assets/d3/d3.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'/assets/d3/tsiyur.js';?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/d3/gestilo.css';?>">
	</head>
	<body>
		<svg>
			
		</svg>
		<script>
			var a = 600;
			var h = 600;
			const svg = d3.select("svg")
					.attr("width",a)
					.attr("height",h)
					.attr("viewBox",[-a/2,-h/2,a,h]);
		</script>
	</body>
</html>
