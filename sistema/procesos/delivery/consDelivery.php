<?php
include_once '../../bd/db2.php';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$fvid = (isset($_POST['fvid'])) ? $_POST['fvid'] : '';
$empid = (isset($_POST['deliveryid'])) ? $_POST['deliveryid'] : '';
$deliverydireccion = (isset($_POST['deliverydireccion'])) ? $_POST['deliverydireccion'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';

switch($opcion){
    case 0:
        $consulta = "SELECT tipo FROM facturasventas WHERE fvid = '$fvid' AND is_delete = 0 AND is_check = 0";
        $resultado= mysqli_query($conn, $consulta);
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 1:
        $consulta = "INSERT INTO delivery(deliverydireccion, fvid, empid, deliveryestado) VALUES ('$deliverydireccion','$fvid','$empid',1)";
        $resultado= mysqli_query($conn, $consulta);
        $consulta = "UPDATE facturasventas SET tipo = 2, empid = '$empid' WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);
        break;
    case 2:
        $consulta = "SELECT delivery.fvid,deliverydireccion,empnom, deliverydescripcion, created_at, TIMESTAMPDIFF(minute, created_at, updated_at)AS Minutos, updated_at FROM delivery, empleados, deliverytiposestados, facturasventas WHERE delivery.empid = empleados.empid AND deliveryestado = deliverytipo AND deliverytipo != 4 AND is_check = 0 AND is_delete = 0 AND delivery.fvid = facturasventas.fvid";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 3:
        $consulta = "SELECT fvid,deliveryestado, deliverydescripcion FROM delivery, deliverytiposestados WHERE fvid = '$fvid' AND deliveryestado = deliverytipo";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 4:
        $consulta = "UPDATE delivery SET deliveryestado = '$estado', updated_at = CURRENT_TIME WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 5:
        $consulta = "DELETE FROM delivery WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);     

        $consulta = "UPDATE facturasventas SET tipo = 0, empid = 0 WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);
        break;
    case 6:
        $consulta = "UPDATE delivery SET deliveryestado = '$estado', updated_at = CURRENT_TIME WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);     

        $consulta = "UPDATE facturasventas SET is_check = 1 WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);
        break;
    case 7:
        $consulta = "SELECT delivery.fvid,deliverydireccion,empnom, deliverydescripcion, created_at, TIMESTAMPDIFF(minute, created_at, updated_at)AS Minutos, updated_at FROM delivery, empleados, deliverytiposestados, facturasventas WHERE delivery.empid = empleados.empid AND deliveryestado = deliverytipo AND deliverytipo = 4 AND delivery.fvid = facturasventas.fvid";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
}


print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;