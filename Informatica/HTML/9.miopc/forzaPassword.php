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
      <form action="forzaPasswordDB.php" method="post" onsubmit="return controlla()">
        <p>Inserisci dati</p>
        <p>
          <label>Email</label><br>
            <input type="text" name="email" id="email" class="email" placeholder="Email">
        </p>
        <p>
          <label>Password</label><br>
            <input type="password" name="password" id="password" class="password" placeholder="Password">
        </p>
						<input type="submit" name="btn">
			</form>
		</div>
	</body>
</html>
