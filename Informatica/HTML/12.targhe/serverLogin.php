<?php
$user = $_POST['user'];
$password= $_POST['password'];

$conn = new mysqli("localhost","root","","targaNovel");
			if($conn->connect_errno) {
				echo "Problemi";
			}
      $query= "SELECT * FROM tclienti WHERE username='$user' and password='$password'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
if ($count == 0){
  header("Location:login.php?mex=Credenziali sconosciute");
    exit();
}else{
  session_start();
  $row = mysqli_fetch_array($result);
  $_SESSION['user']=$row['username'];
  header("Location:index.php");
    exit();
}
?>
