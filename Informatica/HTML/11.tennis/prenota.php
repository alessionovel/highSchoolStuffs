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
    <form action="prenota.php" method="post">
      <label>Scegli un campo:</label>
      <select id="campo" name="campo">
        <option value="" selected disabled hidden>Scegli campo</option>
        <?php
        session_start();
        $conn = new mysqli("localhost","root","","tennisNovel");
        			if($conn->connect_errno) {
        				echo "Problemi";
        			}
              $query= "SELECT * FROM campo";
              $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  									while($array = $result->fetch_assoc()) {
  						        echo "<option value=".$array['numCampo'].">".$array['numCampo']."</option>";
  										}
    ?>
      </select>
      <input type="date" id="data" name="data" <?php echo 'min="'.date( "Y-m-d"). '"'; echo 'max="' . date ( "Y-m-d", mktime(0,0,0,date( "m"),date( "d")+14,date( "Y"))) . '"'; ?>
      </input>
      <input type="submit" value="Controlla">
    </form>
		<?php
				if(isset($_POST['campo']) || !empty($_POST['data'])){
					if(isset($_POST['campo']) && !empty($_POST['data'])){
						echo "Campo numero ".$_POST['campo']." in data ".$_POST['data'];
						$conn = new mysqli("localhost","root","","tennisNovel");
    					if($conn->connect_errno) {
      					echo "Problemi";
    					}
      $query = "SELECT * FROM prenotazione WHERE numCampo='".$_POST['campo']."' AND data='".$_POST['data']."'";
			$result = mysqli_query($conn,$query);
			$i=9;
			?>
      <form action="luci.php" method="post">
        <?php
				echo "<input type=\"hidden\" id=\"campo\" name=\"campo\" value=".$_POST['campo'].">";
				echo "<input type=\"hidden\" id=\"data\" name=\"data\" value=".$_POST['data'].">";
				echo "<input type=\"hidden\" id=\"user\" name=\"user\" value=".$_SESSION['user'].">";
			while($i<=22) {
				$bool=false;
				foreach ($result as $key => $value) {
					if($i==$value['ora']){
						echo $i." PRENOTATO<br>";
						$bool=true;
					}
				}
				if($bool==false){
					echo '<input type="radio" id="ora" name="ora" value="'.$i.'">';
					echo $i."<br>";
				}
				$i++;

				}
				?>
				<input type="submit" value="Prenota">
      </form>
      <?php
					}else if(isset($_POST['campo'])){
						echo "Campo numero ".$_POST['campo']."<br>";
						$conn = new mysqli("localhost","root","","tennisNovel");
    					if($conn->connect_errno) {
      					echo "Problemi";
    					}
      $query = "SELECT * FROM prenotazione WHERE numCampo='".$_POST['campo']."'";
			$result = mysqli_query($conn,$query);
			$j=0;
			while ($j<=14){
				$data=date ( "Y-m-d", mktime(0,0,0,date( "m"),date( "d")+$j,date( "Y")));
				echo $data."<br>";
				?>
				<form action="luci.php" method="post">
					<?php
					echo "<input type=\"hidden\" id=\"campo\" name=\"campo\" value=".$_POST['campo'].">";
					echo "<input type=\"hidden\" id=\"data\" name=\"data\" value=".$data.">";
					echo "<input type=\"hidden\" id=\"user\" name=\"user\" value=".$_SESSION['user'].">";
				$i=9;
				while($i<=22) {
					$bool=false;
					foreach ($result as $key => $value) {
						if($i==$value['ora'] && $data==$value['data']){
							echo $i." PRENOTATO<br>";
							$bool=true;
						}
					}
					if($bool==false){
						echo '<input type="radio" id="ora" name="ora" value="'.$i.'">';
						echo $i."<br>";
					}
					$i++;

					}
					$j++;
					?>
					<input type="submit" value="Prenota">
					</form>
					<?php
				}

					}else if(!empty($_POST['data'])){
						echo "Data ".$_POST['data']."<br>";
						$conn = new mysqli("localhost","root","","tennisNovel");
    					if($conn->connect_errno) {
      					echo "Problemi";
    					}
      $query = "SELECT * FROM prenotazione WHERE data='".$_POST['data']."'";
			$result = mysqli_query($conn,$query);
			$query = "SELECT * FROM campo";
			$result2 = mysqli_query($conn,$query);

				while($array = $result2->fetch_assoc()) {
				echo "Campo".$array['numCampo']."<br>";
				?>
	      <form action="luci.php" method="post">
	        <?php
					echo "<input type=\"hidden\" id=\"campo\" name=\"campo\" value=".$array['numCampo'].">";
					echo "<input type=\"hidden\" id=\"data\" name=\"data\" value=".$_POST['data'].">";
					echo "<input type=\"hidden\" id=\"user\" name=\"user\" value=".$_SESSION['user'].">";
				$i=9;
				while($i<=22) {
					$bool=false;
					foreach ($result as $key => $value) {
						if($i==$value['ora'] && $array['numCampo']==$value['numCampo']){
							echo $i." PRENOTATO<br>";
							$bool=true;
						}
					}
					if($bool==false){
						echo '<input type="radio" id="'.$i.'" name="ora" value="'.$i.'">';
						echo $i."<br>";
					}
					$i++;

					}
					?>
					<input type="submit" value="Prenota">
					</form>
					<?php
				}

					}
				}
				?>
  </div>
</body>

</html>
