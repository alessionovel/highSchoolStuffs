<?php
ob_start();
session_start();
require_once('db_connection.php');
$query = "SELECT * FROM ferroCaseificio WHERE codice='" . $_SESSION['idCaseificio'] . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$caseificio = mysqli_fetch_array($result);

$query = "SELECT * FROM ferroImmagine WHERE codice='" . $_SESSION['idCaseificio'] . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));?>
<div id="menuRes">
  <div class="infoBody corpo">
  </br></br></br></br>
  <div class="descBox">
    <strong> Caseificio di: </strong><br>
    <p> <?php echo $caseificio['nomeProprietario']; ?></p>
  </div>
</br></br>
<div class="descBox">
  <strong> In via: </strong><br>
  <p> <?php echo $caseificio['indirizzo']; ?></p>
</div>
<?php
while($immagine = $result->fetch_assoc()) {
  ?>
</br></br>
<div class="descBox" style="width:80%">
  <img class="imgBox" src="<?php echo $immagine['path'] ?>">
</div>
<div class="descBox">
  <p> <?php echo $immagine['descrizione'] . "<br/>"; ?></p>
</div>
<?php
}
?>
</div>
</div>
