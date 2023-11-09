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
				<?php
				session_start();
				if($_SESSION['ruolo']=='user'){
					echo "<a href=homeuser.php>Home</a>";
					echo "<a href=domanda.php>Esegui domanda</a>";
					echo "<a href=stato.php>Stato domanda</a>";
					echo "<a href=password.php>Cambia Password</a>";
				}else if ($_SESSION['ruolo']=='dipen'){
					echo "<a href=homedipen.php>Home</a>";
					echo "<a href=istruttoria.php>Istruttoria domanda</a>";
		      echo "<a href=graduatoria.php>Graduatoria</a>";
		      echo "<a href=password.php>Cambia Password</a>";
		      echo "<a href=forzaPassword.php>Forza Password</a>";
				}else if ($_SESSION['ruolo']=='admin'){
			echo "<a href=homeadmin.php>Home</a>";
				}
				 ?>
				 <a href=logout.php>Logout</a>
			</div>
 		</div>

		<div id="corpo">
      <form action="cambiapw.php" method="post" onsubmit="return controlla()">
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
