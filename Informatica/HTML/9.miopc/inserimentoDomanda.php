<?php
$dispositivo = $_POST['dispositivo'];
$isee = $_POST['isee'];
$importo = $_POST['importo'];
$stato=0;
$data=date("Y-m-d H:i:s");
session_start();

$conn = new mysqli("localhost","root","","contributi");
			if($conn->connect_errno) {
				echo "Problemi";
			}
      $query = "INSERT INTO `domanda` (`email`, `dispositivo`, `importo`, `tipoISEE`, `data`, `stato`) VALUES ('".$_SESSION['email']."', '$dispositivo', '$importo', '$isee', '$data', '$stato')";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
			if($_SESSION['ruolo']=='user'){
				header("Location:homeuser.php?mex=Campo Prenotato");
			    exit();
			}else if ($_SESSION['ruolo']=='dipen'){
				header("Location:homedipen.php?mex=Campo Prenotato");
			    exit();
			}else if ($_SESSION['ruolo']=='admin'){
			}
?>
