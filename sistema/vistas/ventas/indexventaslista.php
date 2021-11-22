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
                    <h4>Transacción de Ventas</h4>
                </div>
                <div class="card-body">

                        <div class="container tab-content" id="myTabContent">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">SIN ASIGNAR</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">DELIVERY</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile2-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile2" type="button" role="tab"
                                        aria-controls="profile2" aria-selected="false">MESAS</button>
                                </li>
                            </ul>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <div class="row">
                                        <div class="col">
                                            <div class="table-responsive">
                                                <table id="tablaListaVentas" class="table table-striped" style="width:100%">

                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Folio</th>
                                                            <th>Caja</th>
                                                            <th>Fecha</th>
                                                            <th>Cliente</th>
                                                            <th>Total</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-light"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <div class="row">
                                        <div class="col">
                                            <div class="table-responsive">
                                                <table id="tablaListaVentasDelivery" class="table table-striped" style="width:100%">

                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Folio</th>
                                                            <th>Caja</th>
                                                            <th>Fecha</th>
                                                            <th>Cliente</th>
                                                            <th>Total</th>
                                                            <th>Tipo</th>
                                                            <th>Empleado</th>
                                                            <th>Estado</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-light"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile2-tab">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <div class="row">
                                        <div class="col">
                                            <div class="table-responsive">
                                                <table id="tablaListaVentasMesa" class="table table-striped" style="width:100%">

                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Folio</th>
                                                            <th>Caja</th>
                                                            <th>Fecha</th>
                                                            <th>Cliente</th>
                                                            <th>Total</th>
                                                            <th>Tipo</th>
                                                            <th>Numero</th>
                                                            <th>Empleado</th>
                                                            <th>Estado</th>
                                                            <th>Acciones</th>
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

                        <div class="mensajeCajaCerrada">
                            <div class="card card-body">
                                <div class="form-group">
                                    <h6>LA CAJA DE HOY SE ENCUENTRA CERRADA</h6>
                                </div>
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

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

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