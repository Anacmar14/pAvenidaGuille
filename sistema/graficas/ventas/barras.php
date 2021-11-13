<?php
	require_once "php/conexion.php";
	$conexion=conexion();
	$fechas= $_GET['fechas'];
	$fechas = json_decode($fechas,true);
	$desde= $fechas['desde'];
	$hasta= $fechas['hasta'];
	$sql="SELECT fvfechahora, fvtotal from facturasventas WHERE is_delete = 0 AND fvfechahora BETWEEN '$desde' AND '$hasta' order by fvfechahora";
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

	var data = [
		{
			x: datosX,
			y: datosY,
			type: 'bar'
		}
	];

	var layout = {
	title:'Grafico de ventas',
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
		title: 'Fechas',
		titlefont: {
		color: 'black',
		size: 24
		},
		rangemode: 'tozero'
	},
	yaxis: {
		title: 'Total de la Venta',
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