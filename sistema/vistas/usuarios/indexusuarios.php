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
<div class="container p-0"> 
    <div class="row">
    <div class="col-md-3 ov">
            </div>
            <div class="col-md-8 p-3">
            <!-- <form action="../pdf/usuarios_completo.php">
                <input type="submit"  name="nPdf" value="PDF">
                <input type="submit"  name="nExcel" value="Excel">
            </form> -->
            <a href="../../pdf/usuarios_completo.php?web" class="btn btn-secondary">
                <i class="far fa-window-maximize"> <strong style="font-family: Arial, Helvetica, sans-serif;">Web</strong></i>
            </a>
            <a href="../../pdf/usuarios_completo.php?pdf" class="btn btn-secondary">
                <i class="far fa-file-pdf"> <strong style="font-family: Arial, Helvetica, sans-serif;">PDF</strong></i>
            </a>
            <a href="../../pdf/usuarios_completo.php?excel" class="btn btn-secondary">
                <i class="far fa-file-excel"> <strong style="font-family: Arial, Helvetica, sans-serif;">Excel</strong></i>
            </a>
            </div>
        <div class="col-md-3 ov">

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
                <form action="../../../sistema/procesos/save/saveusuarios.php" method="POST">
                    <div class="form-group">
                            <h6>AGREGAR NUEVO EMPLEADO</h6>
                        </div>
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" name="textunom" class="form-control" placeholder="Ej: Alvin Delgado" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="textuemail" class="form-control" placeholder="Ej: alvindelgado@gmail.com" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Usuario:</label>
                        <input type="text" name="textutag" class="form-control" placeholder="Ej: AlvinD" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Clave:</label>
                        <input type="text" name="textukey" class="form-control" placeholder="Ej: abv123" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Rol:</label>
                        <input type="text" name="texturol" class="form-control" placeholder="Ej: 1" autofocus>
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
                    <th>Usuario</th>
                    <th class="ov">Clave</th>
                    <th>Rol</th>
                    <th class="ov">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                <?php 
                $query = "SELECT empleados.empid, empnom, empemail, emptag ,empkey, rolnom FROM empleados INNER JOIN roles ON emprol = rolid";
                $resultado= mysqli_query($conn, $query);
                
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                    <td><?php echo $row['empid'] ?></td>
                    <td><?php echo $row['empnom'] ?></td>
                    <td><?php echo $row['empemail'] ?></td>
                    <td><?php echo $row['emptag'] ?></td>
                    <td class="ov"><?php echo $row['empkey'] ?></td>
                    <td><?php echo $row['rolnom'] ?></td>
                    <td class="ov">
                        <a href="../../../sistema/procesos/edit/editusuarios.php?id=<?php echo $row['empid'] ?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="../../../sistema/procesos/delete/deleteusuarios.php?id=<?php echo $row['empid'] ?>" class="btn btn-danger">
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
