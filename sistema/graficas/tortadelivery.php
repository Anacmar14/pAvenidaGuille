<?php
	require_once "php/conexion.php";
	$conexion=conexion();
	$fechas= $_GET['fechas'];
	$fechas = json_decode($fechas,true);
	$desde= $fechas['desde'];
	$hasta= $fechas['hasta'];
	$sql="SELECT created_at as fecha, COUNT(empid) as empleados FROM delivery WHERE created_at BETWEEN '$desde' AND '$hasta' GROUP BY month(created_at)";
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
		var data = [{
		values: datosY,
		labels: datosX,
		type: 'pie'
	}];

	var layout = {
		title: 'ENTREGAS DE DELIVERY POR MES'
	};

	var config = {
	showEditInChartStudio: true,
	plotlyServerURL: "https://chart-studio.plotly.com"
	};

	Plotly.plot( cargaBarras, data, layout );

	// Plotly.newPlot('graficaBarras', data);
</script>