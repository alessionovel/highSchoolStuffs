<?php ob_start(); ?>
<?php
require('db_connect.php');

if (isset($_POST['matricola']) and isset($_POST['user']) and isset($_POST['pass']) ){

  $id = $_POST['matricola'];
  $username = $_POST['user'];
  $password = $_POST['pass'];

  $query = "DELETE FROM `users` WHERE matricola='$id' and username='$username' and password='$password'";

  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

  header("location: admin.php");
  exit();

}
?>
