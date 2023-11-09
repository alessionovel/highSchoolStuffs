<html>
	<head>
		<meta charset="UTF-8">
		<title>Home Page</title>
		<link rel="stylesheet" href="style/miopc.css">
	</head>
	<body leftmargin="0" topmargin="0">
		<div id="header">
	      <h1>Mio Pc Scuola</h1>
		</div>
		<div id="menu">
      <div id="menuverticale">
			<a href=homedipen.php>Home</a>
			<a href=istruttoria.php>Istruttoria domanda</a>
      <a href=graduatoria.php>Graduatoria</a>
      <a href=password.php>Cambia Password</a>
      <a href=forzaPassword.php>Forza Password</a>
			<a href=logout.php>Logout</a>
			</div>
 		</div>

		<div id="corpo">
      <?php
      $conn = new mysqli("localhost","root","","contributi");
    if($conn->connect_errno) {
      echo "Problemi";
    }
    $query = "SELECT * FROM domanda WHERE stato=0 ORDER BY data ASC";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if ($count==0){
      echo "Non ci sono domande in attesa";
    }else{
$contributo=0;
      	echo "<form method=\"POST\" action=\"aggiornaDomanda.php\" onsubmit=\"return controlla()\">";
        echo "Email: ".$row['email'];
        echo "<input type = \"hidden\" name = \"email\" value = ".$row['email']." />";
        echo "<br/>Dispositivo: ".$row['dispositivo'];
        echo "<br/>ISEE: ";
        if ($row['tipoISEE']==0){
					$contributo=($row['importo']/100)*75;
          echo "Importo inferiore 15.000";
        }else if ($row['tipoISEE']==1){
					$contributo=($row['importo']/100)*60;
          echo "Importo compreso tra 15.000 e 25.000";
        }else if ($row['tipoISEE']==2){
					$contributo=($row['importo']/100)*15;
          echo "Importo maggiore di 25.000";
        }
				echo "<input type = \"hidden\" name = \"contributo\" value = ".$contributo." />";
        echo "<br/>Importo speso: ".$row['importo'];
        echo "<br/><input type=\"radio\" name=\"risposta\" value=\"1\" />Accetta<br />
        <input type=\"radio\" name=\"risposta\" value=\"2\" />Rifiuta<br />";
        echo "<br/><input type=\"submit\" value=\"Invia dati\" />";
    }
    ?>
		</div>
	</body>
</html>
