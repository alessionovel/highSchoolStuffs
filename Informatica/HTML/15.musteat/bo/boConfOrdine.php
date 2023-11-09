<?php ob_start();
session_start(); ?>
<?php
require "connectDb.php";
$query = "UPDATE novelordini SET consegnato=1 WHERE idOrd=" . $_REQUEST['but'];

if ($result = mysqli_query($mysqli, $query)) {
    echo "<p>Ordine segnato come consegnato</p>";
} else {
    echo "error";
}
?>