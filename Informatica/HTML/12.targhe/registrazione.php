<html>
	<head>
		<meta charset="UTF-8">
		<title>Registrazione</title>
		<link rel="stylesheet" href="styles/stile.css">
    <script>

	function controllo(){
		var username = document.getElementById("username").value;
		if(username.length<1){
			alert("Inserisci lo Username");
			return false;

		}
		var password = document.getElementById("password").value;
		if(password.length<1){
			alert("Inserisci la Password");
			return false;
		}

    var password2 = document.getElementById("password2").value;
		if(password2.length<1){
			alert("Inserisci la Conferma di Password");
			return false;
		}

    var email = document.getElementById("email").value;
		if(email.length<1){
			alert("Inserisci la Email");
			return false;
		}

    var telefono = document.getElementById("telefono").value;
		if(telefono.length<1){
			alert("Inserisci il Telefono");
			return false;
		}

    if (password!=password2){
      alert("Conferma password errata");
			return false;
    }

		return true;
	}

</script>
	</head>
	<body leftmargin="0" topmargin="0">
		<div id="header">

	      <h1><img src="images/logo.png" alt="Logo" height="42" width="42">Registrazione</h1>
		</div>
    <?php
		include 'menu.php';
		?>

		<div id="corpo">
        <?php
        session_start();
          if(isset($_SESSION['user'])){
            echo "Benvenuto, ".$_SESSION['user'];
          }
          if(isset($_GET['mex'])){
            echo $_GET['mex'];
          }
         ?>

      <form action="serverRegistrazione.php" method="post" onsubmit="return controllo()">
				<p>Inserisci i tuoi dati</p>
        <p>
          <label>Username</label><br>
            <input type="text" name="username" id="username" class="username" placeholder="Username">
        </p>
        <p>
          <label>Password</label><br>
            <input type="password" name="password" id="password" class="password" placeholder="Password">
        </p>
					<p>
						<label>Conferma Password</label><br>
							<input type="password" name="password2" id="password2" class="password2" placeholder="Conferma">
					</p>
          <p>
						<label>Email</label><br>
							<input type="text" name="email" id="email" class="email" placeholder="Email">
					</p>
					<p>
						<label>Telefono</label><br>
							<input type="text" name="telefono" id="telefono" class="telefono" placeholder="Telefono">
					</p>
          <input type="submit" name="btn">
			</form>
</form>
		</div>
	</body>
</html>
