<html>
	<head>
		<meta charset="UTF-8">
		<title>Carrello</title>
		<link rel="stylesheet" href="style/catalogo.css">
		<script>
			function controlla(pre){
				document.getElementById("prezzo").innerHTML= "<strong>Totale=</strong> €" + pre + "<br/>";
			}
		</script>
	</head>
	<body leftmargin="0" topmargin="0">
		<div id="header">
	      <h1>Negozio Vestiti Online</h1>
		</div>
		<div id="menu">
<?php
			$conn = new mysqli("localhost","root","","articoli");
			if($conn->connect_errno) {
				echo "Problemi";
			}
			session_start();
			if(!isset($_SESSION['id'])){
				do{
					$_SESSION['id']=bin2hex(random_bytes(25));
					$query = "SELECT * FROM carrello WHERE codice='".$_SESSION['id']."'";
					$result = mysqli_query($conn,$query);
				}while(mysqli_num_rows($result)!=0);
			}
			$query = "SELECT * FROM categorie ORDER BY categoria";
			$result = mysqli_query($conn,$query);
			echo "<div id=\"menuverticale\">";
			echo "<a href=catalogo.php>Home Page</a>";
			$categoria = 0;
			while($array = $result->fetch_assoc()) {
				echo "<a href=selezionacategoria.php?cat=".$categoria.">".$array['categoria']."</a>";
				$categoria++;
			}
?>
			<a href=carrello.php>Carrello</a>
			</div>
 		</div>

		<div id="corpo">
			<h2>Carrello</h2>
			<div id="prezzo">
				<strong>Totale=</strong> € <br/>
			</div>
<?php
			$query = "SELECT * FROM carrello WHERE token='".$_SESSION['id']."'";
			$result = mysqli_query($conn,$query);
			echo "<form method=\"POST\" action=\"aggiornacarrello.php\">";
			$scarpa = 0;
			$totale=0;
			while($array = $result->fetch_assoc()) {
				$query2 = "SELECT * FROM prodotti WHERE codice='".$array['idProdotto']."'";
				$result2 = mysqli_query($conn,$query2);
				while($array2 = $result2->fetch_assoc()) {
					$totale=$totale+($array2['prezzo']*$array['quantita']);
					echo "<div id=\"articolo\">";
					echo "<strong>".$array2['nome']."</strong> € ".number_format($array2['prezzo'],2)."<br/>";
					echo "<img src=\"".$array2['foto']."\" width=\"150\" height=\"150\"/><br/>";
					echo "Quantità:<input type=\"text\" name=\"quantita".$scarpa."\" value=\"".$array['quantita']."\" size=\"5\" />&nbsp;<br/><br/>";
					echo "<input type=\"submit\" name=\"compra".$scarpa."\" value=\"Aggiorna\" /><br/><br/>";
					echo "<input type=\"submit\" name=\"elimina".$scarpa."\" value=\"Elimina\" /><br/><br/>";
					$scarpa++;
					echo "</div>";
				}
			}
			echo "</form>";
			echo "<script> controlla('".number_format($totale,2)."'); </script>";
?>
		</div>
	</body>
</html>
