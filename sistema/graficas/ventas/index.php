<!DOCTYPE html>
<html>
<head>
	<title>Sistema</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.3.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js"></script>
</head>
<body style='background: grey'>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
					<div class="panel panel-heading">
						Grafica de Ventas
					</div>
					<button id='volverAtras' class="btn btn-danger" style='margin-left: 20px;'>Volver</button>
					<div class="panel panel-body">
						<div class="row">
							<!-- <div class="col-sm-6">
								<div id="cargaLineal"></div>
							</div> -->
							<div class="col-sm-12">
								<div id="cargaBarras"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		// $('#cargaLineal').load('lineal.php');
		$('#cargaBarras').load('barras.php?fechas=<?php echo $_GET['fechas'] ?>');

		$(document).on("click", "#volverAtras", function () {
			window.location.href = 'http://localhost/proyecto/sistema/vistas/ventas/indexventashistorial.php';
			});
	});
</script>