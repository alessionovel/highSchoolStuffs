<?php
session_start();
$password= $_POST['password'];

$conn = new mysqli("localhost","root","","tennisNovel");
			if($conn->connect_errno) {
				echo "Problemi";
			}

$query = "UPDATE utente SET psw = '".$password."' WHERE userid='".$_SESSION['user']."'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if($_SESSION['ruolo']=='socio'){
		header("Location:menuSocio.php?mex=Password cambiata correttamente");
	    exit();
	}else if ($_SESSION['ruolo']=='segretaria'){
		header("Location:menuSeg.php?mex=Password cambiata correttamente");
	    exit();
	}
 ?>
