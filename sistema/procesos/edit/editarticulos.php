<?php 

    include ("../../../sistema/bd/db2.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM productos WHERE proid = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result ) == 1) {
            $row = mysqli_fetch_array($result);
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $codigo = $_POST['codigo'];
        $nom = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $stock = $_POST['stockactual'];
        $precio = $_POST['precio'];
        if ( $codigo != null && $nom != null && $stock != null && $precio != null && $categoria != null ) {
        $query = "UPDATE productos set procodigo = '$codigo', pronombre = '$nom', caid = '$categoria', prostockactual = '$stock', proprecio = '$precio' WHERE proid = '$id' ";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Fila Editada correctamente';
        $_SESSION['message_type'] = 'success';
        }
        else
        {
            $_SESSION['message'] = 'ERROR: La Fila no fue editada. <br> NOTA: No deje ningún campo vacío';
            $_SESSION['message_type'] = 'danger';
        }
        header("Location: ../../../sistema/vistas/articulos/indexarticulos.php");
    }
?>

<?php include("../../../sistema/partes/header.php") ?>

<div id="content">
    <div class="container p-4">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card card-header">
        <h6>Editar Producto</h6>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card card-body">
                    <form action="../edit/editarticulos.php?id=<?php echo $_GET['id'] ?>" method="POST">

                        <div class="form-group">
                            <label>Codigo:</label>
                            <input type="text" name="codigo" value="<?php echo $row['procodigo']; ?>" class="form-control" placeholder="Nuevo Codigo" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" value="<?php echo $row['pronombre']; ?>" class="form-control" placeholder="Nuevo Nombre" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Categoria Producto:</label>
                            <input type="text" name="categoria" value="<?php echo $row['caid']; ?>" class="form-control" placeholder="Nueva Marca" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Stock:</label>
                            <input type="text" name="stockactual" value="<?php echo $row['prostockactual']; ?>" class="form-control" placeholder="Nuevo Stock" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Precio:</label>
                            <input type="text" name="precio" value="<?php echo $row['proprecio']; ?>" class="form-control" placeholder="Nuevo Precio" autofocus>
                        </div>
                        <button class="btn btn-success btn-block" name="update">
                            Actualizar
                        </button>
                    </form>
                    <a class="btn btn-danger btn-block" style="margin-top: 10px" href="../../../sistema/vistas/articulos/indexarticulos.php">
                            Regresar
                    </a>
                </div>
            </div> 
        </div>   </div>
</div>
<?php include("../../../sistema/partes/footer.php") ?>