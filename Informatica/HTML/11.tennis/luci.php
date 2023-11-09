<html>
	<head>
		<meta charset="UTF-8">
		<title>Menù</title>
		<link rel="stylesheet" href="style/stile.css">
	</head>
	<body leftmargin="0" topmargin="0">
		<div id="header">
	      <h1>Menù</h1>
		</div>
    <?php
		include 'menuSoc.php';
		?>

		<div id="corpo">
      <form action="serverPrenota.php" method="post">
      <?php
      $data = $_POST['data'];
      $campo = $_POST['campo'];
      $ora = $_POST['ora'];
      $user = $_POST['user'];

        echo "<input type=\"hidden\" id=\"campo\" name=\"campo\" value=".$_POST['campo'].">";
        echo "<input type=\"hidden\" id=\"data\" name=\"data\" value=".$_POST['data'].">";
        echo "<input type=\"hidden\" id=\"user\" name=\"user\" value=".$_POST['user'].">";
        echo "<input type=\"hidden\" id=\"ora\" name=\"ora\" value=".$_POST['ora'].">";
				echo "Si vogliono accendere le luci?(+5€)<br>";
        echo '<input type="radio" id="luci" name="luci" value="0">';
        echo "si";
        echo '<input type="radio" id="luci" name="luci" value="1">';
        echo "no";
        ?>
        <input type="submit" value="Prenota">
        </form>
        <?php
      session_start();
      $conn = new mysqli("localhost","root","","tennisNovel");
      			if($conn->connect_errno) {
      				echo "Problemi";
      			}
            $query= "SELECT * FROM socio WHERE userid='".$_SESSION['user']."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $row = mysqli_fetch_array($result);
      ?>
		</div>
	</body>
</html>
