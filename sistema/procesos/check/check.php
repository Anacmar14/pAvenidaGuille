<?php
if (isset($_SESSION['rol'])){
    $num = $_SESSION['rol'];
    
    switch ($num) {
        case 0:
            include ('../../partes/ocultarusuarios.php');
            break;
        case 3:
            include ('../../partes/ocultardeposito.php');
            break;
        case 2:
            include ('../../partes/ocultarcajeros.php');
            break;
    }
}
?>