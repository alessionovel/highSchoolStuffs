<?php
$id = $_POST['id'];
session_start();

$conn = new mysqli("localhost","root","","tennisNovel");
			if($conn->connect_errno) {
				echo "Problemi";
			}

      $query = "DELETE FROM prenotazione WHERE idPrenot='".$_POST['id']."'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      if($_SESSION['ruolo']=='socio'){
    		header("Location:menuSocio.php?mex=Prenotazione eliminata");
    	    exit();
    	}else if ($_SESSION['ruolo']=='segretaria'){
    		header("Location:menuSeg.php?mex=Prenotazione eliminata");
    	    exit();
    	}
?>
