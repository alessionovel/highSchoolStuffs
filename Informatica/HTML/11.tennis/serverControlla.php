<?php
$user = $_POST['user'];
$password= $_POST['password'];

$conn = new mysqli("localhost","root","","tennisNovel");
			if($conn->connect_errno) {
				echo "Problemi";
			}
      $query= "SELECT * FROM utente WHERE userid='$user' and psw='$password'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
if ($count == 0){
  header("Location:index.php?mex=Credenziali sconosciute");
    exit();
}else{
  session_start();
  $row = mysqli_fetch_array($result);
  $_SESSION['user']=$row['userid'];
	$query= "SELECT * FROM socio WHERE userid='$user'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);
	if ($count != 0){
		$_SESSION['ruolo']="socio";
		header("Location:menuSocio.php");
	    exit();
	}else{
		$query= "SELECT * FROM segretaria WHERE userid='$user'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		$count = mysqli_num_rows($result);
		if ($count != 0){
			$_SESSION['ruolo']="segretaria";
			header("Location:menuSeg.php");
		    exit();
		}
	}
}
?>
