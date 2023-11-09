<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

$conn = new mysqli("localhost","root","","targaNovel");
			if($conn->connect_errno) {
				echo "Problemi";
			}
      $query = "INSERT INTO `tclienti` (`username`, `password`, `email`, `telefono`) VALUES ('$username', '$password', '$email', '$telefono')";
      if(@ $conn->query($query))
			   echo "Record inseriti correttamente.<br/>";
		   else
			    die("Errore nell'inserimento dei record, l'username potrebbe essere già in uso.<br/>");
      header("Location:index.php");
        exit();
?>
