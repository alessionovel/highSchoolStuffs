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
			<a href=homeuser.php>Home</a>
			<a href=domanda.php>Esegui domanda</a>
      <a href=stato.php>Stato domanda</a>
      <a href=password.php>Cambia Password</a>
			<a href=logout.php>Logout</a>
			</div>
 		</div>

		<div id="corpo">
      <?php
      session_start();
      $conn = new mysqli("localhost","root","","contributi");
      			if($conn->connect_errno) {
      				echo "Problemi";
      			}
      $query = "SELECT * FROM domanda WHERE email='".$_SESSION['email']."'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $count = mysqli_num_rows($result);
      if ($count == 0){
        echo "Non hai ancora fatto nessuna domanda";
      }else{
        $row = mysqli_fetch_array($result);
        if($row['stato']==0){
          echo "Domanda in lavorazione";
        }
        if($row['stato']==1){
          echo "Domanda accettata";
        }
        if($row['stato']==2){
          echo "Domanda rifiutata";
        }
        if($row['stato']==3){
          echo "Domanda liquidata";
        }
      }
       ?>
		</div>
	</body>
</html>
