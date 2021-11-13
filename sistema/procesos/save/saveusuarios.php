<?php

include ("../../../sistema/bd/db2.php");

if (isset($_POST['save_task']))
{
    $nom= $_POST['textunom'];
    $email= $_POST['textuemail'];
    $tag= $_POST['textutag'];
    $clave= md5($_POST['textukey']);
    $rol= $_POST['texturol'];
    if ($nom != null && $email != null && $tag != null && $clave != null && $rol != null ) {
    $query = "INSERT INTO empleados(empnom,empemail,emptag,empkey,emprol) VALUES ('$nom','$email','$tag','$clave','$rol')";
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
    header("Location: ../../../sistema/vistas/usuarios/indexusuarios.php");
}
?>