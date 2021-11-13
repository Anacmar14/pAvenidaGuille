<!DOCTYPE html>
<html lang="en">

<?php
include ("../../../sistema/bd/db.php");
?>

<?php
include ("../../../sistema/partes/header.php");
?>

<?php
include ("../../procesos/check/check.php");
?>

<head>
        <!-- Cosas del sistema -->
    <!-- <script src="https://kit.fontawesome.com/0f99dae2f5.js" crossorigin="anonymous"></script>
    <link href="../../../sistema/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="../../../sistema/js/icons.js"></script> 


    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="index.css">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
    <!-- Google Icon API -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<div id="content">
    <div class="container-xl">
        <h2>HISTORIAL DE COMPRAS</h2>
        <BR>
        <div class="table-responsive">
            <table id="tablaHistorialVentas"
                class="table table-striped" style="width:100%">
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


<div id="backModalVentas">
            <div class="drowerVentas">
                <div class="headerModalVentas" >
                    <div class="d-flex justify-content-between">
                        <h3 class="tituloVentas">DETALLE DE VENTA</h3>
                        <button id="cerrarDrawerVentas" class="btn btn-danger">X</button>
                    </div>
                </div>
                <div class="p-3 flex-grow-1 bd-highlight">
                    <div class="table-responsive">
                        <table id="tablaHistorialVentasDos"
                            class="table table-striped" style="width:100%">
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script> -->
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>

    <script type="text/javascript" src="main.js"></script>

    <!-- Navegador costado -->
    <script src="../../../sistema/js/script.js"></script>


</html>