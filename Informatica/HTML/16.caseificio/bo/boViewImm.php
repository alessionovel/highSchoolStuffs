<?php ob_start();
session_start(); ?>
<?php
require "connectDb.php";

$query = "SELECT * FROM ferroImmagine WHERE codice=" . $_SESSION['codiceBo'] . " AND progr=" . $_POST['codice'] . "";
$result = mysqli_query($mysqli, $query);
$imm = mysqli_fetch_array($result);
?>
<form id="boEditImm" class="inputBox" method="post">
  <br>
  <img src="../<?php echo $imm['path']; ?>" width="300" ><br>
  <br>
  <strong>Descrizione foto: <?php echo $imm['descrizione'] ?></strong>
  <br><br>
</form>
<div id="boEditProdOut1"></div>
