<?php ob_start(); ?>
<?php
 require('db_connection.php');

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$data = $_POST['data'];
$id = $_POST['id'];

$query = "UPDATE utenti SET nome='$nome', cognome='$cognome', email='$email', data='$data' WHERE id='$id'";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  header("location: index.php");
  exit();
?>
