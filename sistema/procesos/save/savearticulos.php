<?php

include ("../../../sistema/bd/db2.php");

if (isset($_POST['save_task']))
{
    $codigo= $_POST['textcodigo'];
    $nom= $_POST['textanom'];
    $categoria= $_POST['textcategoria'];
    $stock= $_POST['textstock'];
    $precio= $_POST['textprecio'];
    if ($nom != null && $stock != null && $precio != null && $codigo != null && $categoria != null ) {
    $query = "INSERT INTO productos(procodigo,pronombre,caid,prostockactual,proprecio) VALUES ('$codigo','$nom','$categoria','$stock','$precio')";
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
    header("Location: ../../../sistema/vistas/articulos/indexarticulos.php");
}
?>