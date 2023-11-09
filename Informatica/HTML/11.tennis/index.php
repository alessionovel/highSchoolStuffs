<html>
	<head>
		<meta charset="UTF-8">
		<title>Home Page</title>
		<link rel="stylesheet" href="style/stile.css">
	</head>
	<body leftmargin="0" topmargin="0">
		<div id="header">
	      <h1>Login</h1>
		</div>
		<div id="menu">
      <div id="menuverticale">
			<a href=index.php>Home</a>
      <a href=index.php>About us</a>
			</div>
 		</div>

		<div id="corpo">
      <form action="serverControlla.php" method="post" onsubmit="return controlla()">
        <?php
          if(isset($_GET['mex'])){
            echo $_GET['mex'];
          }
         ?>
				<p>Inserisci le tue credenziali</p>
        <p>
          <label>User ID</label><br>
            <input type="text" name="user" id="user" class="user" placeholder="User ID">
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
