
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
      <div class="container p-4">
          <div class="card card-body">
                <div class="form-group">
                    <h6>Gestor de Delivery</h6>
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
                    <input type="tpye" name="deliveryFactura" id="deliveryFactura" class="form-control"autofocus>
                </div>
                <button type="submit" id="addPedidoDelivery" class="btn btn-success">Enviar</button>
          </div>
          <br><br>
          <div class="form-group" style="text-align: center">
              <h3>TABLA DE PEDIDOS POR DELIVERY</h3>
          </div>
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="p-2 flex-grow-1 bd-highlight">
                          <div class="table-responsive">
                              <table id="tablaDelivery"
                                  class="table table-striped" style="width:100%; text-align: center">
                                  <thead class="thead-dark">
                                      <tr>
                                          <th>Factura de Venta</th>
                                          <th>Repartidor</th>
                                          <th>Direccion</th>
                                          <th>Estado</th>
                                          <th>Creacion de Pedido</th>
                                          <th>Minutos</th>
                                          <th>Ultima Modificacion</th>
                                          <th style="width: 10px">Acciones</th>
                                      </tr>
                                  </thead>
                                  <tbody class="table-light"></tbody>
                              </table>
                          </div>
              </div>

              <script src="../../../sistema/jquery/jquery-3.3.1.min.js"></script>
                <script src="../../../sistema/popper/popper.min.js"></script>
                <script src="../../../sistema/bootstrap/js/bootstrap.min.js"></script>

            <!-- datatables JS -->
            <script type="text/javascript" src="../../../sistema/datatables/datatables.min.js"></script>

            <script type="text/javascript" src="../../../sistema/js/delivery/main.js"></script>

                <!-- Navegador costado -->
    <script src="../../../sistema/js/script.js"></script>
      </div>
  </div>

  <div class="mensajeCajaCerrada">
      <div class="card card-body">
              <div class="form-group">
                  <h6>LA CAJA DE HOY SE ENCUENTRA CERRADA</h6>
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
                        $query = "SELECT * FROM deliverytiposestados";
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
</body>