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

      <form action="aggiungi.php?ruolo=user" method="post" onsubmit="return controlla()">
				<p>Inserisci i tuoi dati</p>
        <p>
          <label>Nome</label><br>
            <input type="text" name="nome" id="nome" class="username" placeholder="Nome">
        </p>
        <p>
          <label>Cognome</label><br>
            <input type="text" name="cognome" id="cognome" class="username" placeholder="Cognome">
        </p>
					<p>
						<label>Email</label><br>
							<input type="text" name="email" id="email" class="email" placeholder="Email">
					</p>
          <p>
						<label>Indirizzo</label><br>
							<input type="text" name="indirizzo" id="indirizzo" class="indirizzo" placeholder="Indirizzo">
					</p>
					<p>
						<label>Codice Fiscale</label><br>
							<input type="text" name="cf" id="cf" class="cf" placeholder="Codice Fiscale">
					</p>
          <p>
						<label>Telefono</label><br>
							<input type="text" name="tel" id="tel" class="tel" placeholder="Telefono">
					</p>
						<input type="submit" name="btn">
			</form>
</form>
		</div>
	</body>
</html>
