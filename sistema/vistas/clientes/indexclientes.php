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
        <!-- <form action="../pdf/clientes_completo.php">
            <input type="submit"  name="nPdf" value="PDF">
            <input type="submit"  name="nExcel" value="Excel">
        </form> -->
        <a href="../../pdf/clientes_completo.php?web" class="btn btn-secondary">
            <i class="far fa-window-maximize"> <strong style="font-family: Arial, Helvetica, sans-serif;">Web</strong></i>
        </a>
        <a href="../../pdf/clientes_completo.php?pdf" class="btn btn-secondary">
            <i class="far fa-file-pdf"> <strong style="font-family: Arial, Helvetica, sans-serif;">PDF</strong></i>
        </a>
        <a href="../../pdf/clientes_completo.php?excel" class="btn btn-secondary">
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
            <?php } ?>

            <?php
                include ("../../../sistema/sesion/alerta.php");
            ?>

            <div class="card card-body">
                <form action="../../../sistema/procesos/save/saveclientes.php" method="POST">
                    <div class="form-group">
                            <h6>AGREGAR UN NUEVO CLIENTE</h6>
                        </div>
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" name="textcnom" class="form-control" placeholder="Ej: Lev Gallego" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="textcemail" class="form-control" placeholder="Ej: levgalleo@gmail.com" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Direccion:</label>
                        <input type="text" name="textcdire" class="form-control" placeholder="Ej: Av San Cristobal 303" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Telefono:</label>
                        <input type="text" name="textctele" class="form-control" placeholder="Ej: 3876223599" autofocus>
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
                    <th>Email</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th class="ov">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                <?php 
                $query = "SELECT * FROM clientes";
                $resultado= mysqli_query($conn, $query);
                
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                    <td><?php echo $row['clid'] ?></td>
                    <td><?php echo $row['clnom'] ?></td>
                    <td><?php echo $row['clemail'] ?></td>
                    <td><?php echo $row['cldire'] ?></td>
                    <td><?php echo $row['cltele'] ?></td>
                    <td class="ov">
                        <a href="../../../sistema/procesos/edit/editclientes.php?id=<?php echo $row['clid'] ?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="../../../sistema/procesos/delete/deleteclientes.php?id=<?php echo $row['clid'] ?>" class="btn btn-danger oc">
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
