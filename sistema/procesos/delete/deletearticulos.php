<?php 

    include ("../../../sistema/bd/db2.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM productos WHERE proid = $id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Error Query");
        }

        $_SESSION['message'] = 'Fila Eliminada correctamente';
        $_SESSION['message_type'] = 'info';
        header("Location: ../../../sistema/vistas/articulos/indexarticulos.php");
    }
?>