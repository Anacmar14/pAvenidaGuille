<?php 
    include ("../../../sistema/bd/db2.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM proveedores WHERE provid = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result ) == 1) {
            $row = mysqli_fetch_array($result);
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $nom = $_POST['pnom'];
        $email = $_POST['pemail'];
        $dire = $_POST['pdire'];
        $tele = $_POST['ptele'];
        if ($nom != null && $email != null && $dire != null && $tele != null) {
        $query = "UPDATE proveedores set provnom = '$nom', provemail = '$email', provdire = '$dire', provtele = '$tele' WHERE provid = '$id' ";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Fila Editada correctamente';
        $_SESSION['message_type'] = 'success';
        }
        else
        {
            $_SESSION['message'] = 'ERROR: La Fila no fue editada. <br> NOTA: No deje ningún campo vacío';
            $_SESSION['message_type'] = 'danger';
        }
        header("Location: ../../../sistema/vistas/proveedores/indexproveedores.php");
    }
?>

<?php include("../../../sistema/partes/header.php") ?>

<div id="content">
    <div class="container p-4">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card card-header">
        <h6>Editar Proveedor</h6>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card card-body">
                    <form action="../edit/editproveedores.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="pnom" value="<?php echo $row['provnom']; ?>" class="form-control" placeholder="Nuevo Nombre" autofocus>
                        </div>
                        <div class="form-group">
                        <label>Email:</label>
                            <input type="text" name="pemail" value="<?php echo $row['provemail']; ?>" class="form-control" placeholder="Nuevo Email" autofocus>
                        </div>
                        <div class="form-group">
                        <label>Direccion:</label>
                            <input type="text" name="pdire" value="<?php echo $row['provdire']; ?>" class="form-control" placeholder="Nueva Direccion" autofocus>
                        </div>
                        <div class="form-group">
                        <label>Telefono:</label>
                            <input type="text" name="ptele" value="<?php echo $row['provtele']; ?>" class="form-control" placeholder="Nuevo Telefono" autofocus>
                        </div>
                        <button class="btn btn-success btn-block" name="update">
                            Actualizar
                        </button>
                    </form>
                    <a class="btn btn-danger btn-block" style="margin-top: 10px" href="../../../sistema/vistas/proveedores/indexproveedores.php">
                                Regresar
                    </a>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php include("../../../sistema/partes/footer.php") ?>