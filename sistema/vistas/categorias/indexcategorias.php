<?php
include ("../../../sistema/bd/db2.php");
?>

<?php
include ("../../../sistema/partes/header.php");
?>

<?php
include ("../../procesos/check/check.php");
?>

<div id="content">

    <div class="container p-4"> 
            <div class="row">
            <div class="col-md-4 ov">
            </div>
            <div class="col-md-8 p-3">
            <!-- <form action="../pdf/marcas_completo.php">
                <input type="submit"  name="nPdf" value="PDF">
                <input type="submit"  name="nExcel" value="Excel">
            </form> -->
            <a href="../../pdf/categorias_completo.php?web" class="btn btn-secondary">
                <i class="far fa-window-maximize"> <strong style="font-family: Arial, Helvetica, sans-serif;">Web</strong></i>
            </a>
            <a href="../../pdf/categorias_completo.php?pdf" class="btn btn-secondary">
                <i class="far fa-file-pdf"> <strong style="font-family: Arial, Helvetica, sans-serif;">PDF</strong></i>
            </a>
            <a href="../../pdf/categorias_completo.php?excel" class="btn btn-secondary">
                <i class="far fa-file-excel"> <strong style="font-family: Arial, Helvetica, sans-serif;">Excel</strong></i>
            </a>
            </div>
            <div class="col-md-4 ov">

                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <?php  }?>

                <?php
                    include ("../../../sistema/sesion/alerta.php");
                ?>

                <div class="card card-body">
                    <form action="../../../sistema/procesos/save/savecategorias.php" method="POST">
                        <div class="form-group">
                            <h6>AGREGAR UNA NUEVA CATEGORIA DE PRODUCTO</h6>
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="textcnom" class="form-control" placeholder="Ej: Bebida s/alcohol" autofocus>
                        </div>
                        <input type="submit" name="save_task" class="btn btn-success btn-block" value="Enviar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-striped" style="text-align: center">
                    <thead class="thead-dark">
                        <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th class="ov">Acciones</th>       
                        </tr>
                    </thead>
                    <tbody class="table-light">
                    <?php 
                    $query = "SELECT * FROM categorias";
                    $resultado= mysqli_query($conn, $query);
                    $b=1;
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <tr>
                        <td><?php echo $row['caid'] ?></td>
                        <td><?php echo $row['canom'] ?></td>
                        <td class="ov">
                            <a href="../../../sistema/procesos/edit/editcategorias.php?id=<?php echo $row['caid'] ?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                            </a>
                            <a href="../../../sistema/procesos/delete/deletecategorias.php?id=<?php echo $row['caid'] ?>" class="btn btn-danger od">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php
include ("../../../sistema/partes/footer.php");
?>
