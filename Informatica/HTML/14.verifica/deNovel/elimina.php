<?php ob_start(); ?>
<?php
 require('db_connection.php');

$id = $_POST['id'];

$query= "DELETE FROM utenti WHERE id='$id'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>
