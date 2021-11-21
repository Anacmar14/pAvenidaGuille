<!DOCTYPE html>
<html lang="en">

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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../../../sistema/css/indexventas.css">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../../sistema/datatables/datatables.min.css" />
    <!-- Google Icon API -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <div id="content">
        <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <div class="card">
                <div class="card-header">
                    <h4>Historial de Ventas</h4>
                </div>
                <div class="card-body">
                    <br>
                    <BR>
                    <div class="table-responsive">
                        <table id="tablaHistorialVentas" class="table table-striped" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Folio</th>
                                    <th>Caja</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th style="width: 48px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="table-light"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="backModalVentas">
        <div class="drowerVentas">
            <div class="headerModalVentas">
                <div class="d-flex justify-content-between">
                    <h3 class="tituloVentas">DETALLE DE VENTA</h3>
                    <button id="cerrarDrawerVentas" class="btn btn-danger">X</button>
                </div>
            </div>
            <div class="p-3 flex-grow-1 bd-highlight">
                <div class="table-responsive">
                    <table id="tablaHistorialVentasDos" class="table table-striped" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Orden</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>
                        <tbody class="table-light"></tbody>
                    </table>
                </div>
            </div>
            <div class="p-3 flex-grow-1 bd-highlight">
                <div id="subTotalModalVentas">
                </div>
                <div class="footerModalVentas">
                    <div id="descuentoModalVentas">
                    </div>
                    <div id="totalModalVentas">
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="../../../sistema/jquery/jquery-3.3.1.min.js"></script>
<script src="../../../sistema/popper/popper.min.js"></script>
<script src="../../../sistema/bootstrap/js/bootstrap.min.js"></script>
<!-- datatables JS -->
<script type="text/javascript" src="../../../sistema/datatables/datatables.min.js"></script>
<script type="text/javascript" src="../../../sistema/js/ventas/main.js"></script>
<!-- Navegador costado -->
<script src="../../../sistema/js/script.js"></script>


</html>