<html>
	<head>
		<meta charset="UTF-8">
		<title>Cambio Password</title>
		<link rel="stylesheet" href="style/stile.css">
	</head>
	<body leftmargin="0" topmargin="0">
		<div id="header">
	      <h1>Cambio Password</h1>
		</div>
				<?php
				session_start();
				if($_SESSION['ruolo']=='socio'){
					include 'menuSoc.php';
				}else if ($_SESSION['ruolo']=='segretaria'){
					include 'menuSegr.php';
				}
				 ?>

		<div id="corpo">
      <form action="serverPw.php" method="post" onsubmit="return controlla()">
				<p>Inserisci la tua nuova password</p>
        <p>
          <label>Password</label><br>
            <input type="password" name="password" id="password" class="password" placeholder="Password">
        </p>
						<input type="submit" name="btn">
			</form>
		</div>
	</body>
</html>
