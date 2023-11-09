<html>
	<head>
		<meta charset="UTF-8">
		<title>Menù</title>
		<link rel="stylesheet" href="style/stile.css">
	</head>
	<body leftmargin="0" topmargin="0">
		<div id="header">
	      <h1>Menù</h1>
		</div>
		<?php
		include 'menuSoc.php';
		?>

		<div id="corpo">
      <?php
      session_start();
      $conn = new mysqli("localhost","root","","tennisNovel");
      			if($conn->connect_errno) {
      				echo "Problemi";
      			}
            echo "Prenotazioni:<br>";
            $query= "SELECT * FROM prenotazione WHERE userid='".$_SESSION['user']."' AND pagare=0";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            while($array = $result->fetch_assoc()) {
              echo "<div id=\"articolo\">";
              echo "Da pagare ";
              echo "Data: ".$array['data']." Ora: ".$array['ora']." Campo: ".$array['numCampo'];
              echo "</div>";
              }
      ?>
		</div>
	</body>
</html>
