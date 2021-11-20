<?php 

    include ("../../../sistema/bd/db2.php");

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $query = "SELECT empid, empnom, empemail, emptag ,empkey, rolnom FROM empleados, roles WHERE emprol = rolid AND empnom = '$user'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result ) > 0) {
            $row = mysqli_fetch_array($result);
        }
    }
?>

<?php
include ("../../procesos/check/check.php");
?>

<?php include("../../../sistema/partes/header.php") ?>

<div id="content">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card">
            <div class="card-header">
                <h4>Perfil del Usuario</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="card card-body">
                            <form>
                                <div class="form-group">
                                    <h6>DATOS DEL PERFIL DEL USUARIO</h6>
                                </div>
                                <div class="form-group">
                                    ID<input type="text" name="uid" value="<?php echo $row['empid']; ?>"
                                        class="form-control" placeholder="" autofocus readonly>
                                </div>
                                <div class="form-group">
                                    Nombre<input type="text" name="unom" value="<?php echo $row['empnom']; ?>"
                                        class="form-control" placeholder="" autofocus readonly>
                                </div>
                                <div class="form-group">
                                    Email<input type="text" name="uemail" value="<?php echo $row['empemail']; ?>"
                                        class="form-control" placeholder="" autofocus readonly>
                                </div>
                                <div class="form-group">
                                    Usuario<input type="text" name="utag" value="<?php echo $row['emptag']; ?>"
                                        class="form-control" placeholder="" autofocus readonly>
                                </div>
                                <div class="form-group">
                                    Rol<input type="text" name="urol" value="<?php echo $row['rolnom']; ?>"
                                        class="form-control" placeholder="" autofocus readonly>
                                </div>
                            </form>
                            <a class="btn btn-danger btn-block" style="margin-top: 10px" href="indexprincipal.php">
                                Regresar
                            </a>
                        </div>
                    </div>
                </div>
                    <div class="col-md-6 mx-auto">
                        <div class="shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="card card-body">

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

                            <form action="../../../sistema/procesos/edit/editcontra.php" method="POST">
                                <div class="form-group">
                                    <h6>CAMBIAR CONTRASEÑA</h6>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="usid" value="<?php echo $row['empid']; ?>"
                                        class="form-control" placeholder="" style="display: none;">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña Actual:</label>
                                    <input type="password" name="textcontravieja" class="form-control"
                                        placeholder="Ej: pepito123" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Contraseña Nueva:</label>
                                    <input type="password" name="textcontranueva" class="form-control"
                                        placeholder="Ej: 123pepita" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Repetir Contraseña Nueva:</label>
                                    <input type="password" name="textrepetircontranueva" class="form-control"
                                        placeholder="Ej: 123pepita" autofocus>
                                </div>
                                <input type="submit" name="save_contra" class="btn btn-success btn-block"
                                    value="Enviar">
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include("../../../sistema/partes/footer.php") ?>