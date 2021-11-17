
<?php
include ("../../../sistema/bd/db2.php");
?>

<?php
include ("../../../sistema/partes/header.php");
?>

<?php
include ("../../procesos/check/check.php");
?>

<head>
</head>
<body>
  <div id="content">
    <div class="col-md-4 ov">
        <div class="card card-body">
              <div class="form-group">
                  <h6>REPORTES EN GRAFICO</h6>
              </div>
              <div class="form-group">
                  <label>Graficos:</label>
                  <select name="tipoGrafico" id="tipoGrafico" class="form-control">      
                    <option value="1">Total de ingresos de ventas por mes</option>
                    <option value="2">Los tres ultimos productos con el stock minimo</option>
                    <option value="3">Ingresos y Egresos de las cajas por mes</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Desde:</label>
                  <input type="date" name="desdeFecha" id="desdeFecha" class="form-control"autofocus>
              </div>
              <div class="form-group">
                  <label>Hasta:</label>
                  <input type="date" name="hastaFecha" id="hastaFecha" class="form-control" autofocus>
              </div>
              <button type="submit" id="addGraficar" class="btn btn-success">Enviar</button>
        </div>

        <script src="../../../sistema/jquery/jquery-3.3.1.min.js"></script>
        <script src="../../../sistema/popper/popper.min.js"></script>
        <script src="../../../sistema/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="../../graficas/main.js"></script>
  </div>
</body>