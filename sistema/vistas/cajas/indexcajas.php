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
    <link rel="stylesheet" href="../../../sistema/css/indexcajas.css">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../../sistema/datatables/datatables.min.css" />
    <!-- Google Icon API -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<div id="content">

    <div class="container p-4"> 
        <div class="form-group" style="text-align: center">
            <h3>DATOS DE LA CAJA DE HOY</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                        <div class="form-group">
                                <h6>INFORMACION</h6>
                        </div>
                        <div class="form-group">
                            <div class="justify-content-end">
                                <div class="justify-content-between" style="display: flex; flex-direction: row;">
                                        <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text'>Fecha y Hora:</span>
                                            </div>
                                            <input type="text" class="form-control inputFecha" disabled style='width: auto;'>
                                        </div>
                                        <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text'>Cajero:</span>
                                            </div>
                                            <input type="text" class="form-control inputCajero" disabled style='width:100px;'>
                                        </div>
                                        <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text'>Monto Inicial:</span>
                                            </div>
                                            <input type="text" class="form-control inputMontoInicial" disabled style='width:100px;'>
                                        </div>
                                        <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text'>Saldo:</span>
                                            </div>
                                            <input type="text" class="form-control inputSaldo" placeholder="Saldo" disabled>
                                        </div>
                                </div>
                                <div class="justify-content-between" style="display: flex; flex-direction: row;">
                                        <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text'>Ingresos Ventas:</span>
                                            </div>
                                            <input type="text" class="form-control inputIngVen" placeholder="0" disabled style='width: 100px;'>
                                        </div>
                                        <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text'>Egresos Compras:</span>
                                            </div>
                                            <input type="text" class="form-control inputEgrComp" placeholder="0" disabled style='width:100px;'>
                                        </div>
                                        <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text'>Ingresos Movimientos:</span>
                                            </div>
                                            <input type="text" class="form-control inputIngMov" placeholder="0" disabled style='width:100px;'>
                                        </div>
                                        <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text'>Egresos Movimientos:</span>
                                            </div>
                                            <input type="text" class="form-control inputEgrMov" placeholder="0" disabled>
                                        </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                        <div class="form-group">
                                <h6>MOVIMIENTOS</h6>
                        </div>
                        <div class="form-group">
                            <div class="justify-content-end">
                                <div class="justify-content-prepend" style="display: flex; flex-direction: row;">
                                    <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' style="margin-right: 10px">Opcion:</span>
                                        </div>
                                        <div class="form-check form-check-inline" style="display: flex;">
                                            <input class="form-check-input" type="radio" name="tipoMovimientoName" id="tipoMovimiento" value="1">
                                            <label class="form-check-label" for="inlineRadio1" style='margin-bottom: 0px'>Ingreso</label>
                                        </div>
                                        <div class="form-check form-check-inline" style="display: flex;">
                                            <input class="form-check-input" type="radio" name="tipoMovimientoName" id="tipoMovimiento" value="0">
                                            <label class="form-check-label" for="inlineRadio2">Egreso</label>
                                        </div>
                                    </div>
                                    <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>Dinero:</span>
                                        </div>
                                        <input type="text" name="dineroMovimientoName" id="dineroMovimiento" class="form-control" placeholder="Ej: 20000">
                                    </div>
                                    <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>Descripcion:</span>
                                        </div>
                                        <input type="text" name="descripcionMovimientoName" id="descripcionMovimiento" class="form-control" placeholder="Ej: El dueño retira 20000">
                                    </div>
                                    <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                        <button id="addMovimiento" class="btn btn-success">Añadir Movimiento</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                        <div class="form-group">
                                <h6>OPCIONES</h6>
                        </div>
                        <div class="form-group">
                                <div class="justify-content-prepend" style="display: flex; flex-direction: row;">
                                        <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                            <button id="cajaDetalle" class="btn btn-secondary">VER ARQUEO DE CAJA</button>
                                        </div>
                                        <div class='totalDivCol' style="display: flex; align-items: center; margin-right: 0px; padding: 5px;">
                                            <button id="cajaCerrado" class="btn btn-danger">CERRAR CAJA</button>
                                        </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>

        <br>
        <div class="form-group" style="text-align: center">
            <h3>TABLA DE MOVIMIENTOS DIARIOS DE HOY</h3>
        </div>
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="p-2 flex-grow-1 bd-highlight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="tablaMovimientos"
                                class="table table-striped" style="width:100%; text-align: center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Id</th>
                                        <th>Tipo</th>
                                        <th>Dinero</th>
                                        <th>Descripcion</th>
                                        <th style="width: 10px">Acciones</th>
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
        <div class="card card-body oc">
                <div class="form-group">
                    <h6>LA CAJA DE HOY SE ENCUENTRA CERRADA</h6>
                </div>
        </div>
    </div>
</div>

    <div id="backModal">
            <div class="drower">
                <div class="headerModal" >
                    <h1 class="text-secondary mt-2"><u>Caja</u></h1>

                    <h6 style="margin-top: 1%; color: gray">Recuerde que debe iniciar Caja para poder continuar</h6>
                    <hr style="color: gray">
                </div>
                <div class="inputBox" style="margin-top: 3%; margin-buttom: 2%;">
                    <span class="input-group-text" id="basic-addon1">Fecha y Hora:  </span>
                    <input type="text" class="form-control" placeholder="Monto inicial" id="fechaHora" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="inputBox"style="margin-top: 3%; margin-bottom: 2%;">
                    <span class="input-group-text" id="basic-addon1">Cajero: </span>
                    <input type="text" class="form-control" placeholder="Monto inicial" id="nombreCajero" aria-label="Cajero: cajero@cajerito.com" aria-describedby="basic-addon1">
                </div>
                <div class="inputBox">
                    <span class="input-group-text" id="basic-addon1">Monto Inicial: </span>
                    <input type="text" class="form-control" placeholder="Monto inicial" id="inputApertura" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <hr style="color: gray">
                <div class="footerModalDos">
                    <div class="d-flex justify-content-end">
                        <button id="subirCaja" class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </div>
    </div>


    <div id="arqueoCaja">
            <div class="drowerArqueo">
                <div class="headerModal" >
                    <div class="d-flex justify-content-between">
                        <h3 class="tituloTicket">ARQUEO DE CAJAS</h3>
                        <button id="cerrarArqueo" class="btn btn-danger">X</button>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="tablaCajas" role="tabpanel" aria-labelledby="home-tab">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="tablaCaja"
                                        class="table table-striped" style="width:100%; text-align: center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Id</th>
                                                <th>Fecha</th>
                                                <th>Monto Inicial</th>
                                                <th>Caja Estado</th>
                                                <th>Saldo</th>
                                                <th>Ingreso Ventas</th>
                                                <th>Egreso Compras</th>
                                                <th>Ingreso Movimientos</th>
                                                <th>Egreso Movimientos</th>
                                                <th>Hora Cierre</th>
                                                <th>Empleado</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <tbody class="table-light"></tbody>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
    </div>

    <div id="CajaCerrada">
            <div class="drowerCaja">
                <div class="headerModal" >
                    <div class="d-flex justify-content-end">
                        <button id="cerrarCajaX" class="btn btn-danger">X</button>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                <h3>¿Estas seguro de cerrar la caja actual?</h3>
                </div>
                <div class="headerModal">
                    <div class="d-flex justify-content-end">
                    <button id="cerrarCaja" class="btn btn-danger">NO</button>
                    <button id="cajaSi" class="btn btn-success">SI</button>
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

    <script type="text/javascript" src="../../../sistema/js/cajas/main.js"></script>

    <!-- Navegador costado -->
    <script src="../../../sistema/js/script.js"></script>

</html>