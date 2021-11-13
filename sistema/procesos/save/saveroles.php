<?php

include ("../../../sistema/bd/db2.php");

if (isset($_POST['save_task']))
{
    $rol= $_POST['textrol'];
    if ($rol != null) {
        $query = "INSERT INTO roles(rolnom) VALUES ('$rol')";
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
    header("Location: ../../../sistema/vistas/roles/indexroles.php");
}
?>