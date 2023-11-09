<?php ob_start();
session_start(); ?>
<?php
require "connectDb.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('#boEditImm').on('submit', function(e) {
    e.preventDefault();
    codice = <?php echo $_REQUEST['codice'] ?>;
    var descrizione = document.getElementById("descrizione").value;
    $.ajax({
      url: 'boEditImmForm.php',
      type: "POST",
      data: {
        codice: codice,
        descrizione: descrizione
      },
      success: function(data) {
        alert(data);
        $("#boBody").load("boImmagini.php");
      },
      error: function(jXHR, textStatus, errorThrown) {
        alert(errorThrown + "banana 2");
      }
    });
  });
});
</script>
<?php
$query = "SELECT * FROM ferroImmagine WHERE codice=" . $_SESSION['codiceBo'] . " AND progr=" . $_POST['codice'] . "";
$result = mysqli_query($mysqli, $query);
$imm = mysqli_fetch_array($result);
?>
<form id="boEditImm" class="inputBox" method="post">
  <br>
  <img src="../<?php echo $imm['path']; ?>" width="300" ><br>
  <br>
  <strong>Descrizione foto:</strong>
  <input class="inputBar" type="text" id="descrizione" name="descrizione" value="<?php echo $imm['descrizione'] ?>"></input><br>
  <input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="Avanti" />
  <br><br>
</form>
<div id="boEditProdOut1"></div>
