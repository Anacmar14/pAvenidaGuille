<?php

include ("../../../sistema/bd/confirm.php");

if (isset($_POST['save_task']))
{
    $nom= $_POST['textunom'];
    $email= $_POST['textuemail'];
    $tag= $_POST['textutag'];
    $clave= md5($_POST['textukey']);
    
    $condi = "SELECT * FROM empleados WHERE emptag = '$tag'";
    $re = mysqli_query($conn,$condi);
    $fi = mysqli_fetch_array($re);

    if (strtolower($fi['emptag']) == strtolower($tag)) {
        $_SESSION['message'] = 'ERROR: La Cuenta no fue Registrada porque ya existe un empleado con ese nombre de usuario<br>';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../../../sistema/vistas/resto/registrarse.php");
    }
    else
    {
        if ($nom != null && $email != null && $tag != null && $clave != null ) {
        $query = "INSERT INTO empleados(empnom,empemail,emptag,empkey) VALUES ('$nom','$email','$tag','$clave',4)";
        $result = mysqli_query($conn,$query);

        if (!$result)
        {
            die("Error Query");
        }
        else
        {
        $_SESSION['message'] = 'Cuenta Creada correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location: ../../../sistema/vistas/resto/index.php");
        }
        }
        else
        {
            $_SESSION['message'] = 'ERROR: La Cuenta no fue Registrada. <br> NOTA: No deje ningún campo vacío';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../../../sistema/vistas/resto/registrarse.php");
        }
    }
}
?>