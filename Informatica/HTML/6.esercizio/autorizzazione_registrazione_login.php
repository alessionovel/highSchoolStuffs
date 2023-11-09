<?php ob_start(); ?>
<?php
 require('db_connect.php');

if (isset($_POST['matricola']) and isset($_POST['user']) and isset($_POST['pass']) and isset($_POST['name']) and isset($_POST['ruolo']) ){

$id = $_POST['matricola'];
$username = $_POST['user'];
$password = $_POST['pass'];
$name = $_POST['name'];
$ruolo = 'user';


$query = "INSERT INTO `users` (`matricola`, `username`, `password`, `nome`, `ruolo`) VALUES ('$id', '$username', '$password', '$name', '$ruolo')";
//$query = "INSERT INTO `users` (`matricola`, `username`, `password`, `nome`, 'ruolo') VALUES (NULL, '$username', '$password', 'pino', 'user')";
//$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
//$query = "INSERT INTO 'users' (username, email, password)   VALUES ('$username', '$email', '$password')";
//$query = 'INSERT INTO tbl_member (username, password, email) VALUES (?, ?, ?)';
//$query    = "INSERT into `users` (username, password, email, create_datetime) VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
//$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";


$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
/*$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($count == 1){

  //echo "<script type='text/javascript'>alert('Benvenuto')</script>";
  header("location: home.php");
  exit();

}else{*/
  //echo "Login fallito";
  //echo "<script type='text/javascript'>alert('Username e Password Errate')</script>";
  header("location: registration.php");
  exit();

//}
/*if ($row['username'] == $username && $row['password'] == $password) {
      echo "Login con successo !!! Benvenuto ".$row[username];
    } else {
      echo "Login fallito";
    }*/
}
?>
