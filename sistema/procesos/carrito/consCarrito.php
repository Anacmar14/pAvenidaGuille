<?php
date_default_timezone_set("America/Argentina/Salta");
include_once '../cajas/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "SELECT p.pronombre, p.proprecio, p.proid FROM productos p JOIN categorias c ON p.caid = c.caid WHERE c.caid = 3";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
        $consulta = "SELECT p.pronombre, p.proprecio, p.proid FROM productos p JOIN categorias c ON p.caid = c.caid WHERE c.caid = 4";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:
        $consulta = "SELECT p.pronombre, p.proprecio, p.proid FROM productos p JOIN categorias c ON p.caid = c.caid WHERE c.caid = 1;";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;