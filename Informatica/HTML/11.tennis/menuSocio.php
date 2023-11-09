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
            $query= "SELECT * FROM socio WHERE userid='".$_SESSION['user']."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $row = mysqli_fetch_array($result);
            echo "Bentornato socio ".$row['nome']." ".$row['cognome']."<br>";
              if(isset($_GET['mex'])){
                echo $_GET['mex'];
              }
      ?>
		</div>
	</body>
</html>
