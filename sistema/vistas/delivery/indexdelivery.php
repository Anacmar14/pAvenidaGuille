
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
<link rel="stylesheet" type="text/css" href="../../../sistema/datatables/datatables.min.css">
<link rel="stylesheet" href="../../../sistema/css/indexdelivery.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <div id="content">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card">
            <div class="card-header">
                <h4>Gestor de Delivery</h4>
            </div>
                <div class="card card-body">
                    <div class="abiertoCaja">
                        <div class="form-group">
                            <h6>Asignar pedido</h6>
                        </div>
                        <div class="form-group">
                            <label>Seleccionar Repartidor</label>
                            <select name="idDelivery" id="idDelivery" class="form-control">  
                            <option value='0'></option>
                            <?php 
                            $query = "SELECT empid, emptag FROM empleados WHERE emprol = 8 ";
                            $resultado= mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($resultado)) { ?>    
                            <option value='<?php echo $row['empid'] ?>'><?php echo $row['emptag'] ?></option>
                            <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Direccion:</label>
                            <input type="type" name="deliveryDireccion" id="deliveryDireccion" class="form-control"autofocus>
                        </div>
                        <div class="form-group">
                            <label>Numero de Venta:</label>
                            <input type="number" name="deliveryFactura" id="deliveryFactura" value='<?php echo $_GET['factura'] ?>' class="form-control"autofocus>
                        </div>
                        <button type="submit" id="addPedidoDelivery" class="btn btn-success">Enviar</button>
                        <br><br>
                        <div class="form-group" style="text-align: center">
                            <h3>TABLA DE PEDIDOS POR DELIVERY</h3>
                        </div>

                        <div class="tab-content" id="myTabContent">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">EN PROCESO</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">FINALIZADAS</button>
                                    </li>
                                </ul>
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <div class="row">
                                            <div class="col">
                                                <div class="table-responsive">
                                                    <table id="tablaDeliveryEnProceso" class="table table-striped" style="width:100%">

                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Factura de Venta</th>
                                                                <th>Repartidor</th>
                                                                <th>Direccion</th>
                                                                <th>Estado</th>
                                                                <th>Creacion de Pedido</th>
                                                                <th>Tiempo de Creacion</th>
                                                                <th>Tiempo Entre Creacion y Modificacion</th>
                                                                <th>Ultima Modificacion</th>
                                                                <th>Tiempo Ultima Modificacion</th>
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
                                                    <table id="tablaDeliveryFinalizada" class="table table-striped" style="width:100%">

                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Factura de Venta</th>
                                                                <th>Repartidor</th>
                                                                <th>Direccion</th>
                                                                <th>Estado</th>
                                                                <th>Creacion de Pedido</th>
                                                                <th>Ultima Modificacion</th>
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


                        <!-- JavaScript Bundle with Popper -->
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
                            </script>

                        <script src="../../../sistema/jquery/jquery-3.3.1.min.js"></script>
                        <script src="../../../sistema/popper/popper.min.js"></script>
                        <script src="../../../sistema/bootstrap/js/bootstrap.min.js"></script>

                        <!-- datatables JS -->
                        <script type="text/javascript" src="../../../sistema/datatables/datatables.min.js"></script>

                        <script type="text/javascript" src="../../../sistema/js/delivery/main.js"></script>

                            <!-- Navegador costado -->
                        <script src="../../../sistema/js/script.js"></script>
                    </div>
                    <div class="mensajeCajaCerrada">
                        <div class="card card-body">
                                <div class="form-group">
                                    <h6>LA CAJA DE HOY SE ENCUENTRA CERRADA</h6>
                                </div>
                        </div>
                    </div>
                </div>
                <div id="DeliveryModal">
        <div class="drowerDelivery">
            <div class="headerModal" >
                <div class="d-flex justify-content-end">
                    <button id="cerrarDelivery" class="btn btn-danger">X</button>
                </div>
            </div>
            <div class="d-flex justify-content-center">
            <div class="card card-body">
                <div class="form-group">
                <h6>Editar Estado de la factura numero <label id="numeroDePedido"></label></h6>
                </div>
                <div class="form-group">
                    <label>Estado Actual:</label>
                    <input type="type" name="numeroDeFactura" id="numeroDeFactura" class="form-control" style='display:none;' disabled>
                    <input type="type" name="deliveryEstadoActual" id="deliveryEstadoActual" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Estado Nuevo:</label>
                    <select name="deliveryEstadoNuevo" id="deliveryEstadoNuevo" class="form-control">  
                    <?php 
                    $query = 'SELECT * FROM deliverytiposestados';
                    $resultado= mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($resultado)) { ?>    
                    <option value='<?php echo $row['deliverytipo'] ?>'><?php echo $row['deliverydescripcion'] ?></option>
                    <?php }?>
                    </select>
                </div>
                <div class="form-group">
                <button id="TerminarDeEditarPedido" class="btn btn-success">Editar</button>
                </div>
            </div>
            </div>

        </div>
    </div>
            </div>
        </div>
    </div>
  </div>
</body>