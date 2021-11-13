<?php 

    include ("../../../sistema/bd/db2.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM categorias WHERE caid = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result ) == 1) {
            $row = mysqli_fetch_array($result);
        }
    }

    if (isset($_POST['update'])) {
            $id = $_GET['id'];
            $nom = $_POST['nnom'];
            if ($nom != null) {
            $query = "UPDATE categorias set canom = '$nom' WHERE caid = '$id' ";
            mysqli_query($conn, $query);

            $_SESSION['message'] = 'Fila Editada correctamente';
            $_SESSION['message_type'] = 'success';
            }
            else
            {
                $_SESSION['message'] = 'ERROR: La Fila no fue editada. <br> NOTA: No deje ningún campo vacío';
                $_SESSION['message_type'] = 'danger';
            }
            header("Location: ../../../sistema/vistas/categorias/indexcategorias.php");
    }
?>

<?php include("../../../sistema/partes/header.php") ?>

<div id="content">
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="../edit/editcategorias.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="form-group">
                            <h6>EDITAR NOMBRE DE LA CATEGORIA DE PRODUCTO</h6>
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="nnom" value="<?php echo $row['canom']; ?>" class="form-control" placeholder="Nuevo Nombre" autofocus>
                        </div>
                        <button class="btn btn-success btn-block" name="update">
                            Actualizar
                        </button>
                    </form>
                    
                    <a class="btn btn-danger btn-block" style="margin-top: 10px" href="../../../sistema/vistas/categorias/indexcategorias.php">
                            Regresar
                    </a>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php include("../../../sistema/partes/footer.php") ?>