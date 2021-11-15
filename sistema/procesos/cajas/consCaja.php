<?php
date_default_timezone_set("America/Argentina/Salta");
session_start();
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$date = 0;
// $consulta = "SELECT * FROM cajas";
// $resultado = $conexion->prepare($consulta);
// $resultado->execute();        
// $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$cjid = (isset($_POST['cjid'])) ? $_POST['cjid'] : '';
$cjmontoincial = (isset($_POST['cjmontoincial'])) ? $_POST['cjmontoincial'] : '';
$cjsaldo = (isset($_POST['cjsaldo'])) ? $_POST['cjsaldo'] : '';
$cjcierre = (isset($_POST['cjcierre'])) ? $_POST['cjcierre'] : '';
$tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
$dinero = (isset($_POST['dinero'])) ? $_POST['dinero'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$movid = (isset($_POST['movid'])) ? $_POST['movid'] : '';
// Saldo de caja = Monto inicial + totting_cj – totegr_cj + movimientos

$saldo = (isset($_POST['saldo'])) ? $_POST['saldo'] : '';
$ingresos = (isset($_POST['ingresos'])) ? $_POST['ingresos'] : '';
$movingresos = (isset($_POST['movimientosingresos'])) ? $_POST['movimientosingresos'] : '';
$egresos = (isset($_POST['egresos'])) ? $_POST['egresos'] : '';
$movegresos = (isset($_POST['movimientosegresos'])) ? $_POST['movimientosegresos'] : '';
$empid = (isset($_POST['empid'])) ? $_POST['empid'] : '';

switch($opcion){//Consulta por estado de caja
    case 0;
        $date = date("Y-m-d");
        $consulta = "SELECT cjcierre FROM cajas WHERE cjfecha = '$date'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 1:   
        $date = date("Y-m-d");
        //$date = '2021-11-06';
        $consulta = "SELECT * FROM cajas WHERE cjfecha = '$date'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        $numerito = count($data);
        if ($numerito == 0) {
            $consulta = "INSERT INTO cajas (cjfecha, cjmontoincial, cjcierre, cjsaldo, cjtoting, cjtotegr,cjtotalingmov,cjtotalegrmov, cjfechahoracierre, empid) VALUES ('$date' ,0 , 0 , 0 , 0, 0, 0, 0 , 0, 1);";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
        
            $date = date("Y-m-d");
            $consulta = "SELECT * FROM cajas WHERE cjfecha = '$date'";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        break;
    
    case 2:    

        $consulta = "UPDATE cajas SET cjmontoincial = '$cjmontoincial', cjcierre = '$cjcierre', cjsaldo = '$cjsaldo'  WHERE cjid = '$cjid' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    
    case 3:  

        $consulta = "SELECT cjid, cjfecha, cjmontoincial, cjcierre, tipocajadesc, cjsaldo, cjtoting, cjtotegr, cjtotalingmov, cjtotalegrmov, cjfechahoracierre, cajas.empid, empnom FROM cajas, tipocaja, empleados WHERE cjcierre = tipocajaid AND cajas.empid = empleados.empid";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    
    case 4: 
        $consulta = "SELECT movid, movimientos.movtipo, movnombre, movdinero, movdesc, cjid FROM movimientos, tipomovimiento WHERE cjid = '$cjid' AND movimientos.movtipo = tipomovimiento.movtipo";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 5:
        $consulta = "INSERT INTO movimientos (movtipo, movdinero, movdesc, cjid) VALUES ('$tipo', '$dinero', '$descripcion', '$cjid')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 6:
        $consulta = "DELETE FROM movimientos WHERE movid = '$movid'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    
    case 7:
        $data = $_SESSION['user'];
        break;
    case 8:
        $consulta= "SELECT SUM(Fctotal) as egresos FROM facturascompras WHERE cjid = '$cjid'"; 
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
            $data[]=$row;
        }
        $consulta= "SELECT SUM(Fvtotal) as ingresos FROM facturasventas WHERE cjid = '$cjid'"; 
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
            $data[]=$row;
        }
        $consulta= "SELECT SUM(movdinero) as movimientosingresos FROM movimientos WHERE cjid = '$cjid' AND movtipo = 1"; 
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
            $data[]=$row;
        }
        $consulta= "SELECT SUM(movdinero) as movimientosegresos FROM movimientos WHERE cjid = '$cjid' AND movtipo = 0"; 
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
            $data[]=$row;
        }

        $empnom = $_SESSION['user'];
        $consulta= "SELECT empid FROM empleados WHERE empnom = '$empnom'"; 
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
            $data[]=$row;
        }
        break;
    case 9:
        $datetime = date("Y-m-d h:s");
        $consulta = "UPDATE cajas SET cjcierre = 1 , cjsaldo = '$saldo', cjtoting = '$ingresos', cjtotegr = '$egresos', cjtotalingmov = '$movingresos', cjtotalegrmov = '$movegresos', cjfechahoracierre = '$datetime', empid = '$empid' WHERE cjid = '$cjid' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;  
}


print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;