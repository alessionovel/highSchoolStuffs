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
      <form method="post" action="inserimentoDomanda.php" onsubmit="return controlla()">
        Tipo dispositivo:<br />
            <input type="radio" name="dispositivo" value="pc" />PC<br />
            <input type="radio" name="dispositivo" value="tablet" />Tablet<br />
        ISEE:<br />
            <input type="radio" name="isee" value="0" />Importo inferiore 15.000<br />
            <input type="radio" name="isee" value="1" />Importo compreso tra 15.000 e 25.000<br />
            <input type="radio" name="isee" value="2" />Importo maggiore di 25.000<br />
        Importo speso(€):<br />
            <input type="text" name="importo" /><br />
            <input type="submit" value="Invia dati" />
        </form>
		</div>
	</body>
</html>
