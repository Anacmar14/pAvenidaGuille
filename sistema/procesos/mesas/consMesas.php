<?php
include_once '../../bd/db2.php';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$fvid = (isset($_POST['fvid'])) ? $_POST['fvid'] : '';
$mesaid = (isset($_POST['mesaid'])) ? $_POST['mesaid'] : '';
$mozoid = (isset($_POST['mozoid'])) ? $_POST['mozoid'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';

switch($opcion){
    case 0:
        $consulta = "SELECT tipo FROM facturasventas WHERE fvid = '$fvid' AND is_delete = 0 AND is_check = 0";
        $resultado= mysqli_query($conn, $consulta);
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 1:
        $consulta = "INSERT INTO mesas(mesaid, fvid, empid, mesaestado) VALUES ('$mesaid','$fvid','$mozoid',2)";
        $resultado= mysqli_query($conn, $consulta);
        $consulta = "UPDATE facturasventas SET tipo = 1, empid = '$mozoid' WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);
        break;
    case 2:
        $consulta = "SELECT mesaid, empnom FROM mesas, empleados WHERE mesaestado = 1 AND mesas.empid = empleados.empid";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 3:
        $consulta = "SELECT mesaid,fvid,mesaestado, mesadescripcion FROM mesas, tipomesaestados WHERE fvid = '$fvid' AND mesaestado = mesatipoid";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 4:
        $consulta = "UPDATE mesas SET mesaestado = '$estado', updated_at = CURRENT_TIME WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 5:
        $consulta = "DELETE FROM mesas WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);     

        $consulta = "UPDATE facturasventas SET tipo = 0, empid = 0 WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);
        break;
    case 6:
        $consulta = "UPDATE mesas SET mesaestado = '$estado', updated_at = CURRENT_TIME WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);     
        break;
    case 7:
        $consulta = "SELECT mesaid,mesas.fvid,empnom, mesadescripcion, created_at, TIMESTAMPDIFF(minute, created_at, updated_at)AS Minutos, updated_at FROM mesas, empleados, tipomesaestados, facturasventas WHERE mesas.empid = empleados.empid AND mesaestado = mesatipoid AND mesatipoid = 3 AND mesas.fvid = facturasventas.fvid";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    case 8: 
        $consulta = "DELETE FROM mesas WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);    

        $consulta = "UPDATE facturasventas SET is_check = 1 WHERE fvid = '$fvid'";
        $resultado= mysqli_query($conn, $consulta);
    case 9:
        $consulta = "SELECT mesaid,mesas.fvid,empnom, mesadescripcion, created_at, TIMESTAMPDIFF(minute, created_at, updated_at)AS Minutos, updated_at FROM mesas, empleados, tipomesaestados, facturasventas WHERE mesas.empid = empleados.empid AND mesaestado = mesatipoid AND mesatipoid = 2 AND mesas.fvid = facturasventas.fvid";
        $resultado= mysqli_query($conn, $consulta);     
        $data= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        break;
    
}


print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;