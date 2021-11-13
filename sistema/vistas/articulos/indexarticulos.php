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
            <!-- <form action="../pdf/articulos_completo.php">
                <input type="submit"  name="nPdf" value="PDF">
                <input type="submit"  name="nExcel" value="Excel">
            </form> -->
            <a href="../../pdf/articulos_completo.php?web" class="btn btn-secondary">
                <i class="far fa-window-maximize"> <strong style="font-family: Arial, Helvetica, sans-serif;">Web</strong></i>
            </a>
            <a href="../../pdf/articulos_completo.php?pdf" class="btn btn-secondary">
                <i class="far fa-file-pdf"> <strong style="font-family: Arial, Helvetica, sans-serif;">PDF</strong></i>
            </a>
            <a href="../../pdf/articulos_completo.php?excel" class="btn btn-secondary">
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
                <?php }?>

                <?php
                    include ("../../../sistema/sesion/alerta.php");
                ?>

                <div class="card card-body">
                    <form action="../../../sistema/procesos/save/savearticulos.php" method="POST">
                        <div class="form-group">
                            <h6>AGREGAR UN NUEVO PRODUCTO</h6>
                        </div>
                        <div class="form-group">
                            <label>Codigo:</label>
                            <input type="text" name="textcodigo" class="form-control" placeholder="Ej: 232183219" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="textanom" class="form-control" placeholder="Ej: Fanta 500ml" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Id Marca:</label>
                            <input type="text" name="textcategoria" class="form-control" placeholder="Ej: Bebida s/alcohol" autofocus>
                        </div>
                        <div class="form-group">
                        <label>Stock:</label>
                        <input type="text" name="textstock" class="form-control" placeholder="Ej: 40" autofocus>
                        </div>
                        <div class="form-group">
                        <label>Precio:</label>
                        <input type="text" name="textprecio" class="form-control" placeholder="Ej: 20,99" autofocus>
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
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th class="ov oc">
                            Acciones
                        </th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                    <?php 
                    $query = "SELECT proid, procodigo, pronombre, canom, prostockactual, proprecio FROM productos INNER JOIN categorias ON 
                    productos.caid = categorias.caid";
                    $resultado= mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <tr>
                        <td><?php echo $row['proid'] ?></td>
                        <td><?php echo $row['procodigo'] ?></td>
                        <td><?php echo $row['pronombre'] ?></td>
                        <td><?php echo $row['canom'] ?></td>
                        <td><?php echo $row['prostockactual'] ?></td>
                        <td><?php echo $row['proprecio'] ?></td>
                        <td class="ov oc">
                            <a href="../../../sistema/procesos/edit/editarticulos.php?id=<?php echo $row['proid'] ?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                            </a>
                            <a href="../../../sistema/procesos/delete/deletearticulos.php?id=<?php echo $row['proid'] ?>" class="btn btn-danger od">
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
