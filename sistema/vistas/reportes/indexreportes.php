
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
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card">
            <div class="card-header">
              <h4>Reportes Gráficos</h4>
            </div>
            <div class="card-body">
              <div class="row">
              <div class="col-md-3 ov"></div>
            <div class="col-md-6 ov">
        <div class="card card-body">
              <div class="form-group">
                  <h6>Seleccione los datos que desea visualizar</h6>
              </div>
              <div class="form-group">
                  <label>Gráficos:</label>
                  <select name="tipoGrafico" id="tipoGrafico" class="form-control">      
                    <option value="1">Total de ingresos de ventas por mes</option>
                    <option value="2">Entregas de Delivery por mes</option>
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
            </div>
 
            </div>

        <script src="../../../sistema/jquery/jquery-3.3.1.min.js"></script>
        <script src="../../../sistema/popper/popper.min.js"></script>
        <script src="../../../sistema/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="../../graficas/main.js"></script>

        <!-- Navegador costado -->
        <script src="../../../sistema/js/script.js"></script>
  </div>
</body>