<?php
date_default_timezone_set("America/Argentina/Salta");
include_once '../../bd/db2.php';

// Recepción de los datos enviados mediante POST desde el JS   
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$proveedor = (isset($_POST['proveedor'])) ? $_POST['proveedor'] : '';
$compraproid = (isset($_POST['id'])) ? $_POST['id'] : '';
$compraprecio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
$compracantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';
$compraorden = (isset($_POST['orden'])) ? $_POST['orden'] : '';
$factura = (isset($_POST['factura'])) ? $_POST['factura'] : '';
$total = (isset($_POST['total'])) ? $_POST['total'] : '';
$caja = (isset($_POST['cjid'])) ? $_POST['cjid'] : '';

$stockcantidadnueva = (isset($_POST['resultado'])) ? $_POST['resultado'] : '';

$proveedorid = (isset($_POST['proveedor'])) ? $_POST['proveedor'] : '';

switch($opcion){        
    case 4: //select
        $consulta = "SELECT productos.proid, procodigo, pronombre, canom, prostockactual, proprecio FROM productos INNER JOIN productosxproveedores ON productos.proid = productosxproveedores.proid AND productosxproveedores.provid = '$proveedorid' INNER JOIN proveedores ON proveedores.provid = '$proveedorid' INNER JOIN categorias ON productos.caid = categorias.caid";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;

    case 5: //agregarcompracabeza
        $fecha = new DateTime();
        $fecha = $fecha->format('Y-m-d H:i:sP');
        $consulta = "INSERT INTO facturascompras (provid, cjid, fcfechahora, fctotal) VALUES ('$proveedor','$caja','$fecha',0)";
        $resultado= mysqli_query($conn, $consulta);     

        $consulta2 = "SELECT MAX(fcid) as factura FROM facturascompras";
        $resultado2= mysqli_query($conn, $consulta2);     
        $data= mysqli_fetch_all($resultado2, MYSQLI_ASSOC);
        break;


    case 6: //agregarcompradetalle
        $preciototal = $compracantidad*$compraprecio;
        $consulta = "INSERT INTO detallescompras ( dcorden, fcid, proid, dccantidad, dcpreciounitario, dcpreciototal) VALUES ('$compraorden','$factura','$compraproid','$compracantidad','$compraprecio','$preciototal')";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;

    case 7: //actualizarcompracabeza
        $consulta = "UPDATE facturascompras SET fctotal='$total'  WHERE fcid='$factura'";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;

    case 8: //facturagenerica
        $consulta = "SELECT MAX(fcid) as factura FROM facturascompras";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;

    case 9: // sumar producto saca stock
        $consulta = "SELECT prostockactual as stock FROM productos WHERE proid ='$compraproid'";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 10: // sumar producto updatea stock nuevo
        $consulta = "UPDATE productos SET prostockactual='$stockcantidadnueva' WHERE proid='$compraproid'";
        $resultado= mysqli_query($conn, $consulta);     
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;