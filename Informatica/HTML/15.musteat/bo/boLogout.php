<?php ob_start() ?>
<?php
session_start();
unset($_SESSION['idRist']);
header("location:bo.php");
?>