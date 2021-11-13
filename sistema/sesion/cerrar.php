<?php
session_start();

$_SESSION['user'] = null;
$_SESSION['pas'] = null;
header('location:../../sistema/index.php');
?>