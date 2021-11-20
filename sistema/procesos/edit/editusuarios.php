<?php 

    include ("../../../sistema/bd/db2.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM empleados WHERE empid = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result ) == 1) {
            $row = mysqli_fetch_array($result);
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $nom= $_POST['unom'];
        $email= $_POST['uemail'];
        $tag= $_POST['utag'];
        $clave= md5($_POST['ukey']);
        $rol= $_POST['urol'];
        if ($nom != null && $email != null && $tag != null && $clave != null && $rol != null ) {
        $query = "UPDATE empleados set empnom = '$nom', empemail = '$email', emptag = '$tag', empkey = '$clave', emprol = '$rol'  WHERE empid = '$id' ";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Fila Editada correctamente';
        $_SESSION['message_type'] = 'success';
        }
        else
        {
            $_SESSION['message'] = 'ERROR: La Fila no fue editada. <br> NOTA: No deje ningún campo vacío';
            $_SESSION['message_type'] = 'danger';
        }
        header("Location: ../../../sistema/vistas/usuarios/indexusuarios.php");
    }
?>

<?php include("../../../sistema/partes/header.php") ?>

<div id="content">
    <div class="container p-4">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card card-header">
        <h6>Editar Usuario</h6>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card card-body">
                    <form action="../edit/editusuarios.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="unom" value="<?php echo $row['empnom']; ?>" class="form-control" placeholder="Nuevo Nombre" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" name="uemail" value="<?php echo $row['empemail']; ?>" class="form-control" placeholder="Nuevo Email" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Usuario:</label>
                            <input type="text" name="utag" value="<?php echo $row['emptag']; ?>" class="form-control" placeholder="Nuevo Usuario" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Clave:</label>
                            <input type="text" name="ukey" value="<?php echo $row['empkey']; ?>" class="form-control" placeholder="Nueva Clave" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Rol:</label>
                            <input type="text" name="urol" value="<?php echo $row['emprol']; ?>" class="form-control" placeholder="Nuevo Rol" autofocus>
                        </div>
                        <button class="btn btn-success btn-block" name="update">
                            Actualizar
                        </button>
                    </form>
                    <a class="btn btn-danger btn-block" style="margin-top: 10px" href="../../../sistema/vistas/usuarios/indexusuarios.php">
                                Regresar
                        </a>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php include("../../../sistema/partes/footer.php") ?>