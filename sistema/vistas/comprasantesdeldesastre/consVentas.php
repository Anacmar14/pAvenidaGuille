<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$folio = (isset($_POST['folio'])) ? $_POST['folio'] : '';
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
    case 2:
        $consulta = "SELECT fvdescuento, fvsubtotal, fvtotal FROM facturasventas WHERE fvid = '$folio'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;   
    case 3:
        $consulta = "SELECT dvorden, pronombre, dvcantidad, dvpreciounitario, dcpreciototal FROM detallesventas INNER JOIN productos ON detallesventas.proid = productos.proid AND fvid = '$folio'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;    

    case 4:    
        $consulta = "SELECT fvid,,cjid, fvfechahora, clnom, fvtotal FROM facturasventas INNER JOIN clientes ON facturasventas.clid = clientes.clid";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;