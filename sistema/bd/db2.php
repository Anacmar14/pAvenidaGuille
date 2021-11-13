<?php 
    session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['pas'])) {
        header('location:../../../sistema/index.php');
    }
else
{
    $conn = mysqli_connect (
        'localhost',
        'root',
        '',
        'avenida'
    );
}
?>