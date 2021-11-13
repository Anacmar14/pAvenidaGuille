<?php
include ("../../../sistema/bd/db2.php");

if (isset($_POST['save_task']))
{
    $nom= $_POST['textpnom'];
    $email= $_POST['textpemail'];
    $dire= $_POST['textpdire'];
    $tele= $_POST['textptele'];
    if ($nom != null && $email != null && $dire != null && $tele != null) {
    $query = "INSERT INTO proveedores(provnom,provemail,provdire,provtele) VALUES ('$nom','$email','$dire','$tele')";
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
    header("Location: ../../../sistema/vistas/proveedores/indexproveedores.php");
}
?>