<?php 

    include ("../../../sistema/bd/db2.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM clientes WHERE clid = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result ) == 1) {
            $row = mysqli_fetch_array($result);
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $nom = $_POST['cnom'];
        $email = $_POST['cemail'];
        $dire = $_POST['cdire'];
        $tele = $_POST['ctele'];
        if ($nom != null && $email != null && $dire != null && $tele != null ) {
        $query = "UPDATE clientes set clnom = '$nom', clemail = '$email', cldire = '$dire', cltele = '$tele' WHERE clid = '$id' ";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Fila Editada correctamente';
        $_SESSION['message_type'] = 'success';
        }
        else
        {
            $_SESSION['message'] = 'ERROR: La Fila no fue editada. <br> NOTA: No deje ningún campo vacío';
            $_SESSION['message_type'] = 'danger';
        }
        header("Location: ../../../sistema/vistas/clientes/indexclientes.php");
    }
?>

<?php include("../../../sistema/partes/header.php") ?>

<div id="content">
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="../edit/editclientes.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="form-group">
                            <h6>EDITAR EL CLIENTE</h6>
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="cnom" value="<?php echo $row['clnom']; ?>" class="form-control" placeholder="Nuevo Nombre" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" name="cemail" value="<?php echo $row['clemail']; ?>" class="form-control" placeholder="Nuevo Email" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Direccion:</label>
                            <input type="text" name="cdire" value="<?php echo $row['cldire']; ?>" class="form-control" placeholder="Nueva Direccion" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Telefono:</label>
                            <input type="text" name="ctele" value="<?php echo $row['cltele']; ?>" class="form-control" placeholder="Nuevo Telefono" autofocus>
                        </div>
                        <button class="btn btn-success btn-block" name="update">
                            Actualizar
                        </button>
                    </form>
                    <a class="btn btn-danger btn-block" style="margin-top: 10px" href="../../../sistema/vistas/clientes/indexclientes.php">
                                Regresar
                    </a>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php include("../../../sistema/partes/footer.php") ?>