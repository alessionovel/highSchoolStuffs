<?php
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$indirizzo = $_POST['indirizzo'];
$tel = $_POST['tel'];
$cf = $_POST['cf'];
$ruolo = $_GET['ruolo'];

$password=bin2hex(random_bytes(5));

$conn = new mysqli("localhost","root","","contributi");
			if($conn->connect_errno) {
				echo "Problemi";
			}
      $query = "INSERT INTO `utente` (`email`, `password`, `nome`, `cognome`, `indirizzo`, `tel`, `ruolo`, `cf`) VALUES ('$email', '$password', '$nome', '$cognome', '$indirizzo', '$tel', '$ruolo', '$cf')";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

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
			<a href=index.php>Home</a>
      <a href=index.php>Login</a>
      <a href=registrazione.php>Registrati</a>
			</div>
 		</div>

		<div id="corpo">
      <?php
echo "La tua password è ".$password.", cambiala al primo login";
       ?>
		</div>
	</body>
</html>
