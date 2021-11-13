<?php 
    session_start();
    include ("../../../sistema/bd/db2.php");

     
    if (isset($_POST['save_contra'])) {

        $id = $_POST['usid'];
        $contravieja = $_POST['textcontravieja'];
        $contranueva= $_POST['textcontranueva'];
        $contranueva2= $_POST['textrepetircontranueva'];

        if ($contranueva != null && $contranueva2 != null && $contravieja != null) {

            if ($contranueva == $contranueva2) {

                if ($contranueva != $contravieja) {
                    $contravieja = md5($_POST['textcontravieja']);
                    $contranueva= md5($_POST['textcontranueva']);
                    $user = $_POST['usid'];
                    $query = "SELECT empkey FROM empleados WHERE empid = '$user'";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) == 1) {
                    $fila = mysqli_fetch_array($result);
                    }
                    else
                    {
                        die('Error de Query');
                    }

                    if ($contravieja==$fila["empkey"])
                    {
                        $query = "UPDATE empleados set empkey = '$contranueva' WHERE empid = '$id' ";
                        mysqli_query($conn, $query);
                        $_SESSION['message'] = 'Contraseña Editada correctamente';
                        $_SESSION['message_type'] = 'success';
                        $_SESSION['user'] = null;
                        $_SESSION['pas'] = null;
                        header('location:../../../sistema/index.php');
                    }
                    else
                    {
                        $_SESSION['message'] = 'ERROR: Contraseña Actual Incorrecta';
                        $_SESSION['message_type'] = 'danger';
                    }
                }
                else
                {
                    $_SESSION['message'] = 'ERROR: Contraseña Nueva es igual a la actual';
                    $_SESSION['message_type'] = 'danger';   
                }
            }
            else
            {
                $_SESSION['message'] = 'ERROR: Contraseña nueva no coinciden en el repetir esto lo hice a las 4:52 hdp';
                $_SESSION['message_type'] = 'danger';   
            }
        }
        else
        {
            $_SESSION['message'] = 'ERROR: La contraseña no fue editada. <br> NOTA: No deje ningún campo vacío';
            $_SESSION['message_type'] = 'danger';
        }
        header("Location: ../../../sistema/vistas/resto/perfil.php");
    }
?>