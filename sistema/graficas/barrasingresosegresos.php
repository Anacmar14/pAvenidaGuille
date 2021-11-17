<?php
	require_once "php/conexion.php";
	$conexion=conexion();
	$fechas= $_GET['fechas'];
	$fechas = json_decode($fechas,true);
	$desde= $fechas['desde'];
	$hasta= $fechas['hasta'];
	$sql="SELECT cjfecha as fecha, SUM(cjtoting) as totalingresos, SUM(cjtotegr) as totalegresos FROM cajas WHERE cjfecha BETWEEN '$desde' AND '$hasta' GROUP BY month(cjfecha)";
	$result=mysqli_query($conexion,$sql);
	$valoresY=array();//montos
	$valoresX=array();//fechas

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
		$valoresD[]=$ver[2];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);
	$datosD=json_encode($valoresD);
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
	datosD=crearCadenaBarras('<?php echo $datosD ?>');

	console.log(datosX)
	console.log(datosY)
	console.log(datosD)
	var Ingresos = {
	x: datosX,
	y: datosY,
	type: 'bar',
	name: 'Ingresos'
	};

	var Egresos = {
	x: datosX,
	y: datosD,
	type: 'bar',
	name: 'Egresos'
	};

	var data = [Ingresos, Egresos];

	var layout = {
	title:'Ingresos y Egresos de las cajas por mes',
	height: 550,
	font: {
		family: 'Lato',
		size: 16,
		color: 'rgb(100,150,200)'
	},
	plot_bgcolor: 'rgba(200,255,0,0.1)',
	margin: {
		pad: 10
	},
	xaxis: {
		title: 'FECHAS',
		titlefont: {
		color: 'black',
		size: 24
		},
		rangemode: 'tozero'
	},
	yaxis: {
		title: 'CANTIDAD',
		titlefont: {
		color: 'black',
		size: 24
		},
		rangemode: 'tozero'
	}
	};

	Plotly.plot( cargaBarras, data, layout );

	// Plotly.newPlot('graficaBarras', data);
</script>