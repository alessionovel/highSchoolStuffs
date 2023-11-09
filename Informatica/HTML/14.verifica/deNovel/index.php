<script>

	function controllo(){
		var nome = document.getElementById("nome").value;
		if(nome.length<3){
			alert("Il nome deve avere almeno 3 caratteri");
			return false;
		}
    var cognome = document.getElementById("cognome").value;
		if(cognome.length<3){
			alert("Il cognome deve avere almeno 3 caratteri");
			return false;
		}
    var email = document.getElementById("email").value;
    var lunghezza = email.length;
    var pos = email.indexOf("@");
    if (pos<3){
      alert("Ci devono almeno 3 caratteri prima della @");
			return false;
    }
    var post = lunghezza - pos;
    if (post<6){
      alert("Ci devono almeno 6 caratteri dopo la @");
			return false;
    }
    var last = email.lastIndexOf("@");
    if (pos!=last){
      alert("Ci deve essere solo una @");
			return false;
    }

		return true;
	}

</script>
<?php
  require('db_connection.php');
  $query= "SELECT * FROM utenti ORDER BY cognome";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  $count = mysqli_num_rows($result);
  if ($count == 0){
    ?>
    <form action="aggiungi.php" method="POST" onsubmit="return controllo()">
      <input type="submit" value="Salva"><br>
      <label>Nome</label>
      <input type="text" id="nome" name="nome"><br>
      <label>Cognome</label>
      <input type="text" id="cognome" name="cognome"><br>
      <label>Email</label>
      <input type="text" id="email" name="email"><br>
      <label>Data</label>
      <input type="date" id="data" name="data">
    </form>
    <?php
  }else{
    echo "<form method=\"POST\" action=\"index.php\">";
    ?>
    <select name="id" id="id">
      <?php
    while($array = $result->fetch_assoc()) {
        echo "<option value=".$array['id'].">".$array['cognome']."</option>";
    }
    echo "<input type=\"submit\" value=\"Cerca\"><br>";
    echo "</form>";
    echo "<form method=\"POST\" action=\"nuovo.php\">";
    echo "<input type=\"submit\" value=\"Nuovo\"><br>";
    echo "</form>";
    if (isset($_POST['id'])){
      $id = $_POST['id'];
      $query2= "SELECT * FROM utenti WHERE id='$id'";
      $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
      $row = mysqli_fetch_array($result2);
    }else{
      $query2= "SELECT * FROM utenti ORDER BY cognome";
      $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
      $row = mysqli_fetch_array($result2);
    }
    echo "<form method=\"POST\" action=\"elimina.php\">";
    echo "<input type=\"hidden\" name=\"id\" value=\"".$row['id']."\" />";
    echo "<input type=\"submit\" value=\"Elimina\"><br>";
    echo "</form>";
    ?>
    <form action="update.php" method="POST">
      <input type="submit" value="Modifica"><br>
      <label>Nome</label>
      <input type="text" id="nome" name="nome" <?php echo "value=".$row['nome'].""?>><br>
      <label>Cognome</label>
      <input type="text" id="cognome" name="cognome" <?php echo "value=".$row['cognome'].""?>><br>
      <label>Email</label>
      <input type="text" id="email" name="email" <?php echo "value=".$row['email'].""?>><br>
      <label>Data</label>
      <input type="date" id="data" name="data" <?php echo "value=".$row['data'].""?>><br>
      <label>Identificativo</label>
      <?php
        echo "<input type=\"hidden\" name=\"id\" value=\"".$row['id']."\" />";
        echo $row['id'];
       ?>
    </form>
    <?php
  }
?>
