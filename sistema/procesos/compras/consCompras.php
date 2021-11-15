<?php
include_once '../../bd/db2.php';

$folio = (isset($_POST['folio'])) ? $_POST['folio'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1: // cambia la anulacion de compras
        $consulta = "UPDATE facturascompras SET is_delete = 1 WHERE fcid = '$folio'";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;   
    case 2: // select de detalle de compras del modal
        $consulta = "SELECT fctotal FROM facturascompras WHERE fcid = '$folio'";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;   
    case 3: // select de detalle de compras del modal
        $consulta = "SELECT dcorden, pronombre, dccantidad, dcpreciounitario, dcpreciototal FROM detallescompras INNER JOIN productos ON detallescompras.proid = productos.proid AND fcid = '$folio'";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;    

    case 4: // select de historial de ventas
        $consulta = "SELECT fcid, cjid, fcfechahora, provnom, fctotal FROM facturascompras INNER JOIN proveedores ON facturascompras.provid = proveedores.provid AND is_delete = 0";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    
    case 5: // ver estado de compra
        $consulta = "SELECT is_check as chequeo FROM facturascompras WHERE fcid = '$folio'";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 6: // actualizar stock
        $consulta = "SELECT * FROM detallescompras WHERE fcid = '$folio'";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 7: // actualizar estado de compra
        $consulta = "UPDATE facturascompras SET is_check = 1 WHERE fcid = '$folio'";
        $resultado= mysqli_query($conn, $consulta);      
        break;

    case 8: // select de historial de ventas
        $consulta = "SELECT fcid, cjid, fcfechahora, provnom, fctotal FROM facturascompras INNER JOIN proveedores ON facturascompras.provid = proveedores.provid AND is_delete = 0 AND is_check = 1";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;