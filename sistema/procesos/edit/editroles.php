<?php 

    include ("../../../sistema/bd/db2.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM roles WHERE rolid = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result ) == 1) {
            $row = mysqli_fetch_array($result);
        }
    }

    if (isset($_POST['update'])) {
            $id = $_GET['id'];
            $rol = $_POST['rolnombre'];
            if ($rol != null) {
            $query = "UPDATE roles set rolnom = '$rol' WHERE rolid = '$id' ";
            mysqli_query($conn, $query);

            $_SESSION['message'] = 'Fila Editada correctamente';
            $_SESSION['message_type'] = 'success';
            }
            else
            {
                $_SESSION['message'] = 'ERROR: La Fila no fue editada. <br> NOTA: No deje ningún campo vacío';
                $_SESSION['message_type'] = 'danger';
            }
            header("Location: ../../../sistema/vistas/roles/indexroles.php");
    }
?>

<?php include("../../../sistema/partes/header.php") ?>

<div id="content">
    <div class="container p-4">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card card-header">
        <h6>Editar Rol</h6>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card card-body">
                    <form action="../edit/editroles.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="form-group">
                            <label>ROL:</label>
                            <input type="text" name="rolnombre" value="<?php echo $row['rolnom']; ?>" class="form-control" placeholder="Nuevo ROL" autofocus>
                        </div>
                        <button class="btn btn-success btn-block" name="update">
                            Actualizar
                        </button>
                    </form>
                    
                    <a class="btn btn-danger btn-block" style="margin-top: 10px" href="../../../sistema/vistas/roles/indexroles.php">
                            Regresar
                    </a>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php include("../../../sistema/partes/footer.php") ?>