<?php
session_start ();
// Se fija el rol de usuario para ocultar la caja y el boton para anular ventas
if ($_SESSION['rol'] == 2){
    $data = 1;
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;