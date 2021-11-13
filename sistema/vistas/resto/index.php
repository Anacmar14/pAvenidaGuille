<?php
include ("../../../sistema/bd/confirm.php");
?>
<div id="content">

<?php
    if (isset($_POST["Ingreso"])){

        $usuario = $_POST["txtUsuario"];
        $contraseña = md5($_POST["txtContraseña"]);
        if ($usuario != null && $contraseña != null ) {
            $query = "SELECT * FROM empleados WHERE emptag= '$usuario' ";
            $result= mysqli_query($conn, $query);
            if (!$result){
                die('Error de Query');
            }
            else 
            {
                if (mysqli_num_rows($result ) == 1) {
                    $fila = mysqli_fetch_array($result);
                    if ($contraseña==$fila["empkey"])
                    {
                        $_SESSION['user'] = $fila["empnom"];
                        $_SESSION['pas'] = $contraseña;
                        $_SESSION['rol'] = $fila["emprol"];
                        header("Location: indexprincipal.php");
                    }else
                    {
                        $_SESSION['message'] = 'Error: La contraseña es incorrecta';
                        $_SESSION['message_type'] = 'danger';
                    }
                }
                else
                {
                    $_SESSION['message'] = 'Error: El usuario es incorrecto';
                    $_SESSION['message_type'] = 'danger';
                }
            }
        }
        else
        {
            $_SESSION['message'] = 'ERROR: Datos de usuario y contraseña invalidos. <br> NOTA: No deje ningún campo vacío';
            $_SESSION['message_type'] = 'danger';
        }
    }
?>

<?php
include ("../../../sistema/partes/header.php");
include ("../../../sistema/partes/loginstyle.php");
?>

<div class="container p-4"> 
        <div class="row">
            <div class="col-md-4">

                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <?php }?>

                <?php
                include ("../../../sistema/sesion/alerta.php");
                ?>


                <div class="card card-body">
                    <form action="index.php" method="POST">
                        <div class="form-group">
                            <h6>Iniciar Sesion</h6>
                        </div>
                        <div class="form-group">
                            <label>Usuario:</label>
                            <input type="text" name="txtUsuario" class="form-control" placeholder="Ej: admin" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Contraseña:</label>
                        <input type="password" name="txtContraseña" class="form-control" placeholder="Ej: password" autofocus>
                        </div>
                        <div class="form-group">
                        <a href="registrarse.php">¿No tienes cuenta? Registrate</a>
                        </div>
                        <input type="submit" name="Ingreso" class="btn btn-success btn-block" value="Ingresar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
            </div>
        </div>
    </div>

</div>

<?php
include ("../../../sistema/partes/footer.php");
?>