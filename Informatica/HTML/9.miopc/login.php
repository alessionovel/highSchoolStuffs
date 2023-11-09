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
      <a href=login.php>Login</a>
      <a href=registrazione.php>Registrati</a>
			</div>
 		</div>

		<div id="corpo">
      <form action="controlla.php" method="post" onsubmit="return controlla()">
				<p>Inserisci le tue credenziali</p>
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
