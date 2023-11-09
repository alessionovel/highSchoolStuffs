<?php ob_start();
session_start() ?>
<?php
require "connectDb.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() { //Esegue quando la pagina è caricata
  $("#addImm").click(function() { //Carica la pagina per aggiunge categorie
    $("#prodBody").empty();
    $("#prodBody").load("boAddImm.php");
  });
  $("#visImm").click(function() { //Carica la pagina per visualizzare le categorie presenti
    $("#prodBody").empty();
    $("#prodBody").load("boVisImm.php");
  });
});
</script>
<div id="subMenu">
  <button id="addImm" class="btnSelector">Aggiungi immagine
  </button><button id="visImm" class="btnSelector">Visualizza immagini</button>
</div>
<div id="prodBody" class="contBox">
  <?php include "boVisImm.php";
  ?>
</div>
