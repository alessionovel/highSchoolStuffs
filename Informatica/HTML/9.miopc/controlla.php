<?php
$email = $_POST['email'];
$password= $_POST['password'];

$conn = new mysqli("localhost","root","","contributi");
			if($conn->connect_errno) {
				echo "Problemi";
			}
      $query= "SELECT * FROM `utente` WHERE email='$email' and password='$password'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
if ($count == 0){
  header("Location:index.php?mex=Credenziali sconosciute");
    exit();
}else{
  session_start();
  $row = mysqli_fetch_array($result);
  $_SESSION['email']=$row['email'];
	$_SESSION['ruolo']=$row['ruolo'];
	if($row['ruolo']==user){
  	header("Location:homeuser.php");
    exit();
	}else if ($row['ruolo']==dipen){
		header("Location:homedipen.php");
    exit();
	}else if ($row['ruolo']==admin){

	}
}
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
