<?php
$targa = $_POST['targa'];

$conn = new mysqli("localhost","root","","targaNovel");
			if($conn->connect_errno) {
				echo "Problemi";
			}
      $query = "UPDATE ttarghe SET bolloPagato='s' WHERE targa='".$_POST['targa']."'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

      header("Location:index.php");
        exit();
?>
