<?php
include ("../../../sistema/bd/confirm.php");
?>

<?php
include ("../../../sistema/partes/header.php");
include ("../../../sistema/partes/loginstyle.php");
?>

<div id="content">
<div class="container" style="margin-top:150px">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

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

            <div class="card card-body" style="background-color:#343a40;">
                <form action="../../../sistema/procesos/save/saveregistrarse.php" method="POST">
                    <div class="form-group">
                            <h5 style="color:white">REGISTRARSE</h5>
                        </div>
                    <div class="form-group">
                        <label style="color:white">Nombre:</label>
                        <input type="text" name="textunom" class="form-control" placeholder="Ej: Joe Filph" autofocus>
                    </div>
                    <div class="form-group">
                        <label style="color:white">Email:</label>
                        <input type="text" name="textuemail" class="form-control" placeholder="Ej: Joefilph@gmail.com" autofocus>
                    </div>
                    <div class="form-group">
                        <label style="color:white">Usuario:</label>
                        <input type="text" name="textutag" class="form-control" placeholder="Ej: JoeJF" autofocus>
                    </div>
                    <div class="form-group">
                        <label style="color:white">Clave:</label>
                        <input type="text" name="textukey" class="form-control" placeholder="Ej: 123jo" autofocus>
                    </div>
                    <input type="submit" name="save_task" class="btn btn-success btn-block" value="Registrarme">
                </form>
                <a class="btn btn-danger btn-block" style="margin-top: 10px" href="index.php">
                                Regresar
                </a>
            </div>
        </div>

        <div class="col-md-3">
        </div>
    </div>
</div>
</div>   
<?php
include ("../../../sistema/partes/footer.php");
?>