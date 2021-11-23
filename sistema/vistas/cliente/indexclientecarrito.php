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
        <!-- Cosas del sistema -->
    <!-- <script src="https://kit.fontawesome.com/0f99dae2f5.js" crossorigin="anonymous"></script>
    <link href="../../../sistema/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="../../../sistema/js/icons.js"></script> -->


    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../../../sistema/css/indexcarrito.css">
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
                <h4>Carrito De Clientes</h4>
            </div>
            <div class="card card-body">
                <div class="abiertoCaja">
                    <div class="row">
                        <div class="col">
                            <div class="tab-content" id="myTabContent">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                            type="button" role="tab" aria-controls="home" aria-selected="true"> BEBIDAS</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                            type="button" role="tab" aria-controls="profile" aria-selected="false">COMIDA RAPIDA</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="plato-tab" data-bs-toggle="tab" data-bs-target="#plato"
                                            type="button" role="tab" aria-controls="plato" aria-selected="false">COMIDA AL PLATO</button>
                                    </li>
                                </ul>
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table id="tablaProductos"
                                                        class="table table-striped" style="width:100%">

                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Precio</th>
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
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table id="tablaProductosRapidos" class="table table-striped" style="width:100%">

                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Precio</th>
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
                                <div class="tab-pane fade" id="plato" role="tabpanel" aria-labelledby="plato-tab">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table id="tablaProductosPlato" class="table table-striped" style="width:100%">

                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Precio</th>
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
                        </div>
                        <div class="col">
                            <div class="flex-grow-1 bd-highlight" style="margin-left: 10px">
                            <div class="row">
                                <div class="totalt col-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">TOTAL:</span>
                                    </div>
                                    <label id="total" class="form-control">0</label>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Numero</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaProductosComp">
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-success" id="btnFinalizarComp">Continuar</button>
                            </div>
                        </div>
                    </div>
                    <div id="backModal">
                        <div class="drower">
                            <div class="headerModal" >
                                <div class="d-flex justify-content-between">
                                    <h3 class="tituloTicket">Carrito de Compras</h3>
                                    <button id="cerrarDrawer" class="btn btn-danger">X</button>
                                </div>
                            </div>
                            <div class="headerDosModal">
                                <div id="facturaModal">
                                </div>
                                <div id="fechaDelDiaModal">
                                </div>
                            </div>
                            <div class="p-3 flex-grow-1 bd-highlight">
                                <table class="table p-3" id="idModal">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>NOMBRE</th>
                                            <th>PRECIO</th>
                                            <th>CANTIDAD</th>
                                            <th>SUBTOTAL C/U</th>
                                        </tr>
                                    </thead>
                                    <tbody id="idModalBody">
                                    </tbody>
                                </table>
                                <div id="subTotalModal">
                                </div>
                                <div id="totalModal">
                                    </div>
                            </div>
                            <div class="footerModalDos">
                                <div class="d-flex justify-content-end">
                                    <button id="cerrarDrawerVenta" class="btn btn-danger">CANCELAR</button>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button id="botoncModal" class="btn btn-success">ENVIAR</button>
                                </div>
                            </div>
                        </div>
                        <div id="backModalDos">
                            <div class="drower">
                                <div class="headerModal" >
                                    <div class="d-flex justify-content-prepend">
                                        <h2 class="tituloCompraEfectuada">Pedido efectuado</h2>
                                    </div>
                                    <p class="parrafoCompraEfectuada">Muchas Gracias</p>
                                </div>
                                <div class="footerModalTres">
                                    <div class="d-flex justify-content-end">
                                        <button id="botonImprimirModal" class="btn btn-success">Cerrar</button>
                                    </div>
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

    <script type="text/javascript" src="../../../sistema/js/carrito/main.js"></script>

    <!-- Navegador costado -->
    <script src="../../../sistema/js/script.js"></script>


</html>