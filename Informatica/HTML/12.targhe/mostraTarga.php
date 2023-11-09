<html>
	<head>
		<meta charset="UTF-8">
		<title>Mostra Targa</title>
		<link rel="stylesheet" href="styles/stile.css">
	</head>
	<body leftmargin="0" topmargin="0">
		<div id="header">

	      <h1><img src="images/logo.png" alt="Logo" height="42" width="42">Mostra targa</h1>
		</div>
    <?php
		include 'menu.php';
		?>

		<div id="corpo">
        <?php
        session_start();
          if(isset($_SESSION['user'])){
            echo "Benvenuto, ".$_SESSION['user'];
          }
          $conn = new mysqli("localhost","root","","targaNovel");
          			if($conn->connect_errno) {
          				echo "Problemi";
          			}
          echo "<br>Informazioni targa: ".$_POST['targa']."<br>";
            $query= "SELECT * FROM ttarghe WHERE targa='".$_POST['targa']."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $count = mysqli_num_rows($result);
            if ($count == 0){
              header("Location:targa.php?mex=Targa non trovata");
                exit();
            }else{
              $row = mysqli_fetch_array($result);
              echo "<br>Marca: ".$row['marca'];
              echo "<br>Modello: ".$row['modello'];
              echo "<br>Prezzo: ".$row['prezzo'];
              echo "<br>Cilindrata: ".$row['cilindrata'];
              if($row['bolloPagato']=='n'){
                echo "<form method=\"POST\" action=\"serverPaga.php\">";
                echo "<input type=\"hidden\" id=\"targa\" name=\"targa\" value=".$row['targa'].">";
                echo "<input type=\"submit\" name=\"submit\" value=\"Paga\" /><br/><br/>";
                echo "</form>";
              }
            }
            while($array = $result->fetch_assoc()) {
              echo "<form method=\"POST\" action=\"serverCancella.php\">";
              echo "<input type=\"hidden\" id=\"id\" name=\"id\" value=".$array['idPrenot'].">";
              echo "<div id=\"articolo\">";
              echo "Data: ".$array['data']." Ora: ".$array['ora']." Campo: ".$array['numCampo'];
              echo "<input type=\"submit\" name=\"submit\" value=\"Elimina\" /><br/><br/>";
              echo "</div>";
              echo "</form>";
              }
         ?>
		</div>
	</body>
</html>
