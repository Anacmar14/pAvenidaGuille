<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
switch($opcion){
    case 1: //alta
        // $consulta = "INSERT INTO productos (codigo, nombre, idMarca, precio) VALUES('$codigo', '$nombre', '$idMarca', '$precio') ";			
        // $resultado = $conexion->prepare($consulta);
        // $resultado->execute(); 

        // $consulta = "SELECT id, codigo, nombre, idMarca, precio FROM productos ORDER BY id DESC LIMIT 1";
        // $resultado = $conexion->prepare($consulta);
        // $resultado->execute();
        // $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        // break;
    case 2: //modificación
        // $consulta = "UPDATE productos SET codigo='$codigo', nombre='$nombre', idMarca='$idMarca', precio='$precio' WHERE id='$id' ";		
        // $resultado = $conexion->prepare($consulta);
        // $resultado->execute();        
        
        // $consulta = "SELECT id, codigo, nombre, idMarca, precio FROM productos WHERE id='$id' ";       
        // $resultado = $conexion->prepare($consulta);
        // $resultado->execute();
        // $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        // break;        
    case 3://baja
        // $consulta = "DELETE FROM productos WHERE id='$id' ";		
        // $resultado = $conexion->prepare($consulta);
        // $resultado->execute();                           
        // break;        

    case 4:    
        $consulta = "SELECT * FROM proveedores";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;