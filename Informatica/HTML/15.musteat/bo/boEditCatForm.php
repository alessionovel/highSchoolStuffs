<?php ob_start();
session_start(); ?>
<?php
require "connectDb.php";
$query = "UPDATE novelcategorie SET nome='" . (($_REQUEST['nome'])[0])['value'] . "' WHERE idCat='" . $_REQUEST['but'] . "'";
$result = mysqli_query($mysqli, $query);
?>