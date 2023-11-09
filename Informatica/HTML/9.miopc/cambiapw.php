<?php
session_start();
$password= $_POST['password'];

$conn = new mysqli("localhost","root","","contributi");
			if($conn->connect_errno) {
				echo "Problemi";
			}

$query = "UPDATE utente SET password = '".$password."' WHERE email='".$_SESSION['email']."'";
  $result = mysqli_query($conn,$query);
	if($_SESSION['ruolo']=='user'){
		header("Location:homeuser.php?mex=Password cambiata correttamente");
	    exit();
	}else if ($_SESSION['ruolo']=='dipen'){
		header("Location:homedipen.php?mex=Password cambiata correttamente");
	    exit();
	}else if ($_SESSION['ruolo']=='admin'){
	}

 ?>
