<?php
  ob_start();
  session_start();
	$conn = new mysqli("localhost","root","","articoli");
	if($conn->connect_errno) {
		echo "Problemi";
  }

  $query = "SELECT * FROM prodotti ORDER BY nome";
	$result = mysqli_query($conn,$query);
	$scarpa = 0;
	while($array = $result->fetch_assoc()) {
		if(isset($_REQUEST['compra'.$scarpa])) {
      $query2 = "SELECT * FROM carrello WHERE idProdotto='".$array['codice']."' AND token='".$_SESSION['id']."'";
    	$result2 = mysqli_query($conn,$query2);
      if($array2 = $result2->fetch_assoc()){
        $q = $array2['quantita'] + $_POST['quantita'.$scarpa];
        $query3 = "UPDATE carrello SET quantita = '".$q."' WHERE idProdotto='".$array['codice']."' AND token='".$_SESSION['id']."'";
        $result2 = mysqli_query($conn,$query3);
      }else{
			echo "<strong>".$array['nome']."</strong> € ".number_format($array['prezzo'],2)."<br/>";
			echo "<img src=\"".$array['foto']."\" width=\"150\"/><br/>";
			echo "Quantità:<input type=\"text\" name=\"quantita".$scarpa."\" value=\"".$_REQUEST['quantita'.$scarpa]."\" size=\"5\" />&nbsp;";
			echo "<br/><br/><h1>Costo del tuo ordine €".number_format($totale,2)."</h1>";
      $query = "INSERT INTO `carrello` (`token`, `idProdotto`, `quantita`) VALUES ('".$_SESSION['id']."', '".$array['codice']."', '".$_POST['quantita'.$scarpa]."')";
    }
		}
		$scarpa++;
  }
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  header("location: catalogo.php");
  exit();
?>
