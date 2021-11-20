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

    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h4>Administrador de Roles</h4>
                    </div>
                    <div class="col-md-3">
                        <a href="../../pdf/roles_completo.php?web" class="btn btn-secondary">
                            <i class="far fa-window-maximize"> <strong
                                    style="font-family: Arial, Helvetica, sans-serif;">Web</strong></i>
                        </a>
                        <a href="../../pdf/roles_completo.php?pdf" class="btn btn-secondary">
                            <i class="far fa-file-pdf"> <strong
                                    style="font-family: Arial, Helvetica, sans-serif;">PDF</strong></i>
                        </a>
                        <a href="../../pdf/roles_completo.php?excel" class="btn btn-secondary">
                            <i class="far fa-file-excel"> <strong
                                    style="font-family: Arial, Helvetica, sans-serif;">Excel</strong></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 ov">
                    </div>
                    <div class="col-md-8 p-3">
                    </div>
                    <div class="col-md-4 ov">

                        <?php if(isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show"
                            role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php  }?>

                        <?php
                    include ("../../../sistema/sesion/alerta.php");
                ?>
                        <div class="shadow-lg p-3 mb-5 bg-white rounded">
                            <div class="card card-body">
                                <form action="../../../sistema/procesos/save/saveroles.php" method="POST">
                                    <div class="form-group">
                                        <h6>AGREGAR UNA NUEVO ROL</h6>
                                    </div>
                                    <div class="form-group">
                                        <label>ROL:</label>
                                        <input type="text" name="textrol" class="form-control" placeholder="Ej: Miembro"
                                            autofocus>
                                    </div>
                                    <input type="submit" name="save_task" class="btn btn-success btn-block"
                                        value="Enviar">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-striped" style="text-align: center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Rol</th>
                                    <th class="ov">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                <?php 
                    $query = "SELECT * FROM roles";
                    $resultado= mysqli_query($conn, $query);
                    $b=1;
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                                <tr>
                                    <td>
                                        <?php echo $row['rolid'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['rolnom'] ?>
                                    </td>
                                    <td class="ov">
                                        <a href="../../../sistema/procesos/edit/editroles.php?id=<?php echo $row['rolid'] ?>"
                                            class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="../../../sistema/procesos/delete/deleteroles.php?id=<?php echo $row['rolid'] ?>"
                                            class="btn btn-danger">
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
    </div>

</div>

</div>
<?php
include ("../../../sistema/partes/footer.php");
?>