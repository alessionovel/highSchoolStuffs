<html>
	<head>
		<meta charset="UTF-8">
		<title>Categoria</title>
		<link rel="stylesheet" href="style/catalogo.css">
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
<?php
			$query = "SELECT * FROM categorie ORDER BY categoria";
			$result = mysqli_query($conn,$query);
			$categoria = 0;
			while($array = $result->fetch_assoc()) {
				if($categoria==$_GET['cat']) {
					echo "<h2>".$array['categoria']."</h2>";
					$query2 = "SELECT * FROM prodotti ORDER BY nome";
					$result2 = mysqli_query($conn,$query2);
					echo "<form method=\"POST\" action=\"aggiungicarrello.php\">";
					$scarpa = 0;
					while($array2 = $result2->fetch_assoc()) {
						if($array2['codCat']==$array['codCat']){
							echo "<div id=\"articolo\">";
							echo "<strong>".$array2['nome']."</strong> € ".number_format($array2['prezzo'],2)."<br/>";
							echo "<img src=\"".$array2['foto']."\" width=\"150\" height=\"150\"/><br/>";
							echo "Quantità:<input type=\"text\" name=\"quantita".$scarpa."\" value=\"1\" size=\"5\" />&nbsp;";
							echo "<input type=\"submit\" name=\"compra".$scarpa."\" value=\"Aggiungi al carrello\" /><br/><br/>";
							echo "</div>";
						}
						$scarpa++;
					}
					echo "</form>";
				}
				$categoria++;
			}
			echo "</form>";
?>
		</div>
	</body>
</html>
