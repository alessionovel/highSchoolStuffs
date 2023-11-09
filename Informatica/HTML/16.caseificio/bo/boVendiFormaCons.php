<?php ob_start();
session_start(); ?>
<?php
require "connectDb.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('#selectForma').on('submit', function(e) {
    e.preventDefault();
    var codice = document.getElementById("cod_bar").value;
    var mese = document.getElementById("mese_bar").value;
    var anno = document.getElementById("anno_bar").value;
    var progr = document.getElementById("progr_bar").value;
    $.ajax({
      url: 'boVendiFormaCons2.php',
      type: "POST",
      data: {
        mese: mese,
        anno: anno,
        progr: progr,
        codice: codice
      },
      success: function(data) {
        $("#boEditForma").html(data);
      },
      error: function(jXHR, textStatus, errorThrown) {
        alert(errorThrown + "banana 2");
      }
    });
  });
});
</script>
<br>
<br>
<form id="selectForma" class="inputBox" method="post" enctype="multipart/form-data">

</br>
<strong> Codice del consorzio della forma:</strong>
<input class="inputBar" type="text" id="cod_bar" name="cod_bar" required value="" placeholder="Inserisci codice consorzio " />
</br>
<strong>Mese produzione forma:</strong>
<input class="inputBar" type="text" id="mese_bar" name="mese_bar" required value="" placeholder="Inserisci mese " />
</br>
<strong>Anno produzione forma:</strong>
<input class="inputBar" type="text" id="anno_bar" name="anno_bar" required value="" placeholder="Inserisci anno " />
</br>
<strong>Numero progressivo forma:</strong>
<input class="inputBar" type="text" id="progr_bar" name="progr_bar" required value="" placeholder="Inserisci progressivo " />
</br>
<input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="Avanti" />
</br> </br>

</form>
<br>
<div id="boEditForma"></div>
