<?php

include ("../../../sistema/bd/db2.php");

if (isset($_POST['save_task']))
{
    $radio= $_POST['Radio'];
    $dinero= $_POST['textdinero'];
    $desc= $_POST['textdesc'];
    if ($radio != null && $dinero != null && $desc != null) {
    $query = "INSERT INTO movimientos(movtipo,movdinero,movdesc,cjid) VALUES ('$radio','$dinero','$desc',0)";
    $result = mysqli_query($conn,$query);

    if (!$result)
    {
        die("Error Query");
    }
    else
    {
    $_SESSION['message'] = 'Fila Guardada correctamente';
    $_SESSION['message_type'] = 'success';
    }
}
else
{
    $_SESSION['message'] = 'ERROR: La Fila no fue Agregada. <br> NOTA: No deje ningún campo vacío';
    $_SESSION['message_type'] = 'danger';
}
    header("Location: ../../../sistema/vistas/movimientos/indexmovimientos.php");
}
?>