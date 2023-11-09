<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="styles/stile.css">
    <script>

	function controllo(){
		var username = document.getElementById("user").value;
		if(username.length<1){
			alert("Inserisci lo Username");
			return false;

		}
		var password = document.getElementById("password").value;
		if(password.length<1){
			alert("Inserisci la Password");
			return false;
		}

		return true;
	}

</script>
	</head>
	<body leftmargin="0" topmargin="0">
		<div id="header">

	      <h1><img src="images/logo.png" alt="Logo" height="42" width="42">Login</h1>
		</div>
    <?php
		include 'menu.php';
		?>

		<div id="corpo">
      <form action="serverLogin.php" method="post" onsubmit="return controllo()">
      <?php
      session_start();
        if(isset($_SESSION['user'])){
          echo "Benvenuto, ".$_SESSION['user'];
        }
        if(isset($_GET['mex'])){
          echo "<br>".$_GET['mex'];
        }
       ?>
      <p>Inserisci le tue credenziali</p>
      <p>
        <label>Username</label><br>
          <input type="text" name="user" id="user" class="user" placeholder="Username">
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
