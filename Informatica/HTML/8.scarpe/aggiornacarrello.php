<?php
  ob_start();
  session_start();
	$conn = new mysqli("localhost","root","","articoli");
	if($conn->connect_errno) {
		echo "Problemi";
  }

  $query = "SELECT * FROM carrello WHERE token='".$_SESSION['id']."'";
	$result = mysqli_query($conn,$query);
	$scarpa = 0;
	while($array = $result->fetch_assoc()) {
		if(isset($_REQUEST['compra'.$scarpa])) {
      $query2 = "SELECT * FROM carrello WHERE idProdotto='".$array['idProdotto']."' AND token='".$_SESSION['id']."'";
    	$result2 = mysqli_query($conn,$query2);
      if($array2 = $result2->fetch_assoc()){
        $q = $_POST['quantita'.$scarpa];
        $query3 = "UPDATE carrello SET quantita = '".$q."' WHERE idProdotto='".$array['idProdotto']."' AND token='".$_SESSION['id']."'";
        $result2 = mysqli_query($conn,$query3);
      }
    }

    if(isset($_REQUEST['elimina'.$scarpa])) {
    $query2 = "DELETE FROM carrello WHERE idProdotto='".$array['idProdotto']."' AND token='".$_SESSION['id']."'";
    $result2 = mysqli_query($conn,$query2);
		}
		$scarpa++;
	}

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  header("location: carrello.php");
  exit();
?>
