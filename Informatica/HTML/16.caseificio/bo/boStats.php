<?php ob_start();
session_start() ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<br><br>

<form id="addProdBody" class="inputBox" method="post" enctype="multipart/form-data">

</br>
<strong> Codice del consorzio di appartenenza :

  <?php
  require "connectDb.php";
  $codiceCons = $_SESSION['codiceBo'];

  echo " " . $codiceCons . " ";
  ?>

</strong>
</br>
<strong> Statistiche giorno : </strong>
<?php  echo $_REQUEST['date'] ?>
</br><br>
<input type="hidden" id="theDate" name="theDate" value="<?php  echo $_REQUEST['date'] ?>">
<?php
$query = "SELECT * FROM ferroRacLatte WHERE data = '".$_REQUEST['date']."' AND codCons = '".$_SESSION['codiceBo']."'";
$result = mysqli_query($mysqli, $query);
if ($result->num_rows > 0) {
  $dati = mysqli_fetch_array($result);
  ?>
  <strong>Quantità latte raccolta (litri): <?php echo $dati['qtaLavorata'] ?></strong>
</br><br>
<strong>Quantità latte lavorata (litri): <?php echo $dati['qtaFormaggio'] ?></strong>
</br>


<?php
} else {
  ?>
  <strong>Dati sul latte non presenti sul db</strong>
  <br>
  <?php
}
?>

</br> </br>

<?php
$query = "SELECT * FROM ferroForma WHERE dProd = '".$_REQUEST['date']."' AND codCons = '".$_SESSION['codiceBo']."'";
$result = mysqli_query($mysqli, $query);
if ($result->num_rows > 0) {
  $num_rows = mysqli_num_rows($result);
  ?>
  <strong>Forme prodotte: <?php echo $num_rows ?></strong>
</br><br>
<?php
} else {
  ?>
  <strong>Non ci sono forme prodotte in questa giornata</strong>
  <br>
  <?php
}
?>

<?php
$query = "SELECT * FROM ferroForma WHERE dVend = '".$_REQUEST['date']."' AND codCons = '".$_SESSION['codiceBo']."'";
$result = mysqli_query($mysqli, $query);
if ($result->num_rows > 0) {
  $num_rows = mysqli_num_rows($result);
  ?>
  <strong>Forme vendute: <?php echo $num_rows ?></strong>
  <?php
} else {
  ?>
  <strong>Non ci sono forme vendute in questa giornata</strong>
  <?php
}
?>
<br><br>
</form>

<div id="prod_form_output"></div>
