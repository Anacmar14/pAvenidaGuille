<?php
	require_once "php/conexion.php";
	$conexion=conexion();
	// $fechas= $_GET['fechas'];
	// $fechas = json_decode($fechas,true);
	// $desde= $fechas['desde'];
	// $hasta= $fechas['hasta'];
	$sql="SELECT pronombre as nombre, prostockactual as total from productos ORDER BY prostockactual ASC LIMIT 3";
	$result=mysqli_query($conexion,$sql);
	$valoresY=array();//montos
	$valoresX=array();//fechas

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);
 ?>

<div id="graficaBarras"></div>

<script type="text/javascript">
	function crearCadenaBarras(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX=crearCadenaBarras('<?php echo $datosX ?>');
	datosY=crearCadenaBarras('<?php echo $datosY ?>');
	a = datosX[0]; 
	b = datosX[1];
	c = datosX[2];  
		var data = [{
		values: datosY,
		labels: [a, b, c],
		type: 'pie'
	}];

	var layout = {
		title: 'LOS TRES ULTIMOS PRODUCTOS CON EL STOCK MINIMO'
	};

	var config = {
	showEditInChartStudio: true,
	plotlyServerURL: "https://chart-studio.plotly.com"
	};

	Plotly.plot( cargaBarras, data, layout );

	// Plotly.newPlot('graficaBarras', data);
</script>