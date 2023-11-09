<?php ob_start();
session_start() ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<br><br>

<form id="addProdBody" class="inputBox" action="boRegLatteForm.php" method="post" enctype="multipart/form-data">

</br>
<strong> Codice del consorzio di appartenenza :

  <?php
  require "connectDb.php";
  $codiceCons = $_SESSION['codiceBo'];

  echo " " . $codiceCons . " ";
  ?>

</strong>
</br>
<strong> Data di raccolta : </strong>
<?php  echo $_REQUEST['date'] ?>
</br><br>
<input type="hidden" id="theDate" name="theDate" value="<?php  echo $_REQUEST['date'] ?>">
<?php
$query = "SELECT * FROM ferroRacLatte WHERE data = '".$_REQUEST['date']."' AND codCons = '".$_SESSION['codiceBo']."'";
$result = mysqli_query($mysqli, $query);
if ($result->num_rows > 0) {
  $dati = mysqli_fetch_array($result);
  ?>
  <strong>Quantità latte raccolta (litri):</strong>
  <input class="inputBar" type="text" id="rac_latte_bar" name="rac_latte_bar" value="<?php echo $dati['qtaLavorata'] ?>" required value="" placeholder="Inserisci quantità di latte raccolta " />
</br><br>
<strong>Quantità latte lavorata (litri):</strong>
<input class="inputBar" type="text" id="qta_form_bar" name="qta_form_bar" value="<?php echo $dati['qtaFormaggio'] ?>" required value="" placeholder="Inserisci quantità usata per il formaggio " />
</br>
<input type="hidden" id="tipo" name="tipo" value="1">


<?php
} else {
  ?>
  <strong>Quantità latte raccolta (litri):</strong>
  <input class="inputBar" type="text" id="rac_latte_bar" name="rac_latte_bar" required value="" placeholder="Inserisci quantità di latte raccolta " />
</br><br>
<strong>Quantità latte lavorata (litri):</strong>
<input class="inputBar" type="text" id="qta_form_bar" name="qta_form_bar" required value="" placeholder="Inserisci quantità usata per il formaggio " />
</br>
<input type="hidden" id="tipo" name="tipo" value="2">
<?php
}
?>


</br></br>

<input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="INSERISCI" />
</br> </br>

</form>

<div id="prod_form_output"></div>
