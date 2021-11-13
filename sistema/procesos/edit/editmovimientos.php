<?php 

    include ("../../../sistema/bd/db2.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM movimientos WHERE movid = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result ) == 1) {
            $row = mysqli_fetch_array($result);
        }
    }

    if (isset($_POST['update'])) {
            $id = $_GET['id'];
            $movtipo = $_POST['Radio'];
            $movdinero = $_POST['textdinero'];
            $movdesc = $_POST['textdesc'];
            if ($movtipo != null && $movdinero != null && $movdesc != null) {
            $query = "UPDATE movimientos set movtipo = '$movtipo', movdinero = '$movdinero', movdesc = '$movdesc', cjid = 0 WHERE movid = '$id' ";
            mysqli_query($conn, $query);

            $_SESSION['message'] = 'Fila Editada correctamente';
            $_SESSION['message_type'] = 'success';
            }
            else
            {
                $_SESSION['message'] = 'ERROR: La Fila no fue editada. <br> NOTA: No deje ningún campo vacío';
                $_SESSION['message_type'] = 'danger';
            }
            header("Location: ../../../sistema/vistas/movimientos/indexmovimientos.php");
    }
?>

<?php include("../../../sistema/partes/header.php") ?>

<div id="content">
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="../edit/editmovimientos.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="form-group">
                            <h6>EDITAR EL MOVIMIENTO</h6>
                        </div>
                        <div class="form-group">
                         <label>Opción:</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Radio" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Ingreso</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Radio" id="inlineRadio2" value="2">
                            <label class="form-check-label" for="inlineRadio2">Egreso</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Dinero:</label>
                            <input type="text" name="textdinero" value="<?php echo $row['movdinero']; ?>"  class="form-control" placeholder="Nuevo Dinero" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Descripcion:</label>
                            <input type="text" name="textdesc" value="<?php echo $row['movdesc']; ?>"  class="form-control" placeholder="Nueva Descripcion" autofocus>
                        </div>
                        <button class="btn btn-success btn-block" name="update">
                            Actualizar
                        </button>
                    </form>
                    
                    <a class="btn btn-danger btn-block" style="margin-top: 10px" href="../../../sistema/vistas/movimientos/indexmovimientos.php">
                            Regresar
                    </a>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php include("../../../sistema/partes/footer.php") ?>