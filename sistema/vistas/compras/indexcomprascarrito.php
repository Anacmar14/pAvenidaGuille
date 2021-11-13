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
    <link rel="stylesheet" href="../../../sistema/css/indexcompras.css">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../../sistema/datatables/datatables.min.css" />
    <!-- Google Icon API -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<div id="content">
    <div class="container-xl">
        <div>
            <div class="d-flex bd-highlight" style="margin-top: 100px">
            
                <div class="tab-content" id="myTabContent">
                    <p id="mensaje">AVISO: ELIJA EL PROVEEDOR PARA SELECCIONAR PRODUCTOS</p>
                    <p id="mensaje2">SI DESEA ELEGIR OTRO PROVEEDOR HAGA CLICK EN EL BOTON "CAMBIAR PROVEEDOR"<BR>(NOTA: SE BORRAN TODOS LOS PRODUCTOS DE LA LISTA DE COMPRAS)</p>
                    <div class="d-flex justify-content-prepend">
                        <button class="btn btn-info" id="btnCambiarProveedor" style="margin-bottom: 10px">CAMBIAR PROVEEDOR</button>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">PROVEEDORES</button>
                        </li>
                        <li class="nav-item" role="presentation" id="productito">
                            <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">PRODUCTOS</button>
                        </li>
                    </ul>
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="tablaProveedores" class="table table-striped" style="width:100%">

                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Email</th>
                                                    <th>Direccion</th>
                                                    <th>Telefono</th>
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
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="tablaProductosProv"
                                            class="table table-striped" style="width:100%">

                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Codigo</th>
                                                    <th>Nombre</th>
                                                    <th>Categoria</th>
                                                    <th>Stock</th>
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


                <div class="flex-grow-1 bd-highlight" style="margin-left: 10px">
                <div class="row">
                    <div class="proveedorDiv col-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text">PROVEEDOR:</span>
                        </div>
                        <label id="tablaProveedorProv" class="form-control">S/P</label>
                    </div>
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
                        <tbody id="tablaProductosComp" class="table-light">
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success" id="btnFinalizarComp">Continuar</button>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>
        <div id="backModal">
            <div class="drower">
                <div class="headerModal" >
                    <div class="d-flex justify-content-between">
                        <h3 class="tituloTicket">TICKET DE COMPRAS</h3>
                        <button id="cerrarDrawer" class="btn btn-danger">X</button>
                    </div>
                </div>
                <div class="headerDosModal">
                    <div id="facturaModal">
                    </div>
                    <div id="fechaDelDiaModal">
                    </div>
                </div>
                <div id="proveedorModal">
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
                    <div class="footerModal">
                        <div id="">
                        </div>
                        <div id="totalModal">
                        </div>
                    </div>
                </div>
                <div class="footerModalDos">
                    <div class="d-flex justify-content-end">
                        <button id="cerrarDrawerCompra" class="btn btn-danger">CANCELAR COMPRA</button>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button id="botoncModal" class="btn btn-success">FINALIZAR COMPRA</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="backModalDos">
            <div class="drower">
                <div class="headerModal" >
                    <div class="d-flex justify-content-prepend">
                        <h2 class="tituloCompraEfectuada">Compra efectuada</h2>
                    </div>
                    <p class="parrafoCompraEfectuada">¿Deseas imprimir la compra?</p>
                </div>
                <div class="footerModalTres">
                    <div class="d-flex justify-content-prepend">
                        <button id="cerrarDrawerImprimir" class="btn btn-danger">CONTINUAR SIN IMPRIMIR</button>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button id="botonImprimirModal" class="btn btn-success">IMPRIMIR</button>
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

    <script type="text/javascript" src="../../../sistema/js/compras/main.js"></script>

    <!-- Navegador costado -->
    <script src="../../../sistema/js/script.js"></script>


</html>