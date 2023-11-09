<?php
session_start();
$email= $_POST['email'];
$stato= $_POST['risposta'];
$contributo= $_POST['contributo'];

$conn = new mysqli("localhost","root","","contributi");
			if($conn->connect_errno) {
				echo "Problemi";
			}

$query = "UPDATE domanda SET stato = '".$stato."',contributo = '".$contributo."' WHERE email='".$email."'";
  $result = mysqli_query($conn,$query);
  header("Location:homedipen.php?mex=Stato domanda aggiornato");
    exit();
 ?>
