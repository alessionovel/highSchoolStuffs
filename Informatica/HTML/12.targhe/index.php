<html>
	<head>
		<meta charset="UTF-8">
		<title>Home Page</title>
		<link rel="stylesheet" href="styles/stile.css">
	</head>
	<body leftmargin="0" topmargin="0">
		<div id="header">

	      <h1><img src="images/logo.png" alt="Logo" height="42" width="42">Home</h1>
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
         ?>
		</div>
	</body>
</html>
