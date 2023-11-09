<?php
session_start();
$email= $_POST['email'];
$password= $_POST['password'];

$conn = new mysqli("localhost","root","","contributi");
			if($conn->connect_errno) {
				echo "Problemi";
			}
      $query= "SELECT * FROM `utente` WHERE email='".$email."'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $count = mysqli_num_rows($result);
      if ($count == 0){
      header("Location:homedipen.php?mex=Account inesistente");
      exit();
    }else{
$query = "UPDATE utente SET password = '".$password."' WHERE email='".$email."'";
  $result = mysqli_query($conn,$query);
  if ($_SESSION['ruolo']=='dipen'){
		header("Location:homedipen.php?mex=Password cambiata correttamente");
	    exit();
	}else if ($_SESSION['ruolo']=='admin'){
	}
}
 ?>
