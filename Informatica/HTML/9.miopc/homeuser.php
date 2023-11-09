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
      if (isset($_GET['mex'])){
        echo $_GET['mex'];
      }
       ?>
		</div>
	</body>
</html>
