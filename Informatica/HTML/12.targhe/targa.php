<html>
	<head>
		<meta charset="UTF-8">
		<title>Cerca Targa</title>
		<link rel="stylesheet" href="styles/stile.css">
    <script>

	function controllo(){
		var targa = document.getElementById("targa").value;
		if(targa.length<1){
			alert("Inserisci la targa");
			return false;
    }
		return true;
	}

</script>
	</head>
	<body leftmargin="0" topmargin="0">
		<div id="header">

	      <h1><img src="images/logo.png" alt="Logo" height="42" width="42">Cerca Targa</h1>
		</div>
    <?php
		include 'menu.php';
		?>

		<div id="corpo">
        <?php
        session_start();
          if(isset($_SESSION['user'])){
            echo "Benvenuto, ".$_SESSION['user'];

          if(isset($_GET['mex'])){
            echo "<br>".$_GET['mex'];
          }

         ?>
         <form action="mostraTarga.php" method="post" onsubmit="return controllo()">
         <p>
        <label>Inserire la targa nel formato LLNNNLL</label><br>
          <input type="text" name="targa" id="targa" class="targa" placeholder="Targa">
      </p>
          <input type="submit" name="btn">
          </form>
          <?php
        }else{
          echo "Per questa funzione è necessario il login";
        }
        ?>
		</div>
	</body>
</html>
