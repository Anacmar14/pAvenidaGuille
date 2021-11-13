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
            <!-- <form action="../pdf/usuarios_completo.php">
                <input type="submit"  name="nPdf" value="PDF">
                <input type="submit"  name="nExcel" value="Excel">
            </form> -->
            <a href="../../pdf/movimientos_completo.php?web" class="btn btn-secondary">
                <i class="far fa-window-maximize"> <strong style="font-family: Arial, Helvetica, sans-serif;">Web</strong></i>
            </a>
            <a href="../../pdf/movimientos_completo.php?pdf" class="btn btn-secondary">
                <i class="far fa-file-pdf"> <strong style="font-family: Arial, Helvetica, sans-serif;">PDF</strong></i>
            </a>
            <a href="../../pdf/movimientos_completo.php?excel" class="btn btn-secondary">
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
                <form action="../../../sistema/procesos/save/savemovimientos.php" method="POST">
                    <div class="form-group">
                            <h6>AGREGAR NUEVO MOVIMIENTO</h6>
                        </div>
                    <div class="form-group">
                         <label>Opción:</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Radio" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Ingreso</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Radio" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Egreso</label>
                            </div>
                    </div>
                    <div class="form-group">
                        <label>Dinero:</label>
                        <input type="text" name="textdinero" class="form-control" placeholder="Ej: 20000" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Descripcion:</label>
                        <input type="text" name="textdesc" class="form-control" placeholder="Ej: El dueño retira 20000" autofocus>
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
                    <th>Tipo</th>
                    <th>Dinero</th>
                    <th>Descripcion</th>
                    <th>Caja</th>
                    <th>Empleado</th>
                    <th class="ov">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                <?php 
                $query = "SELECT movid, movnombre, movdinero, movdesc, movimientos.cjid, empnom FROM movimientos INNER JOIN tipomovimiento ON movimientos.movtipo = tipomovimiento.movtipo INNER Join cajas ON cajas.cjid = movimientos.cjid INNER JOIN empleados ON empleados.empid = cajas.empid";
                $resultado= mysqli_query($conn, $query);
                
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                    <td><?php echo $row['movid'] ?></td>
                    <td><?php echo $row['movnombre'] ?></td>
                    <td><?php echo $row['movdinero'] ?></td>
                    <td><?php echo $row['movdesc'] ?></td>
                    <td><?php echo $row['cjid'] ?></td>
                    <td><?php echo $row['empnom'] ?></td>
                    <td class="ov">
                        <a href="../../../sistema/procesos/edit/editmovimientos.php?id=<?php echo $row['movid'] ?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="../../../sistema/procesos/delete/deletemovimientos.php?id=<?php echo $row['movid'] ?>" class="btn btn-danger oc">
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
