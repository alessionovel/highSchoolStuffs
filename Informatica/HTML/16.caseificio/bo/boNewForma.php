<?php ob_start();
session_start() ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$(document).ready(function() {
  $('#addProdBody').on('submit', function(e) {
    e.preventDefault();

    theDate = document.getElementById('theDate').value;;
    annoProd = <?php echo $_REQUEST['anno'] ?>;
    meseProd = <?php echo $_REQUEST['mese'] ?>;
    progr = document.getElementById('progr_forma_bar').value;
    scelta = document.getElementById('sc_forma_bar').value;

    $.ajax({
      url: 'boNewFormaForm.php',
      type: "POST",
      data: {
        theDate: theDate,
        annoProd: annoProd,
        meseProd: meseProd,
        progr: progr,
        scelta: scelta
      },
      success: function(data) {
        alert(data);
        $("#boBody").empty();
      },
      error: function(jXHR, textStatus, errorThrown) {
        alert(errorThrown + "banana");
      }
    });
  });
});
</script>
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
<strong> Data di produzione : </strong>
<?php  echo $_REQUEST['date'] ?>
</br><br>
<strong>Scelta della forma:</strong>
<select name="sc_forma_bar" id="sc_forma_bar">
  <option value="1" >Prima scelta</option>
  <option value="2" >Seconda scelta</option>
</select>
</br><br>
<strong>Progressivo della forma:</strong>
<input class="inputBar" type="text" id="progr_forma_bar" name="progr_forma_bar"  required value="" placeholder="Inserisci il progressivo della forma " />
</br>
<input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="INSERISCI" />
<input type="hidden" id="theDate" name="theDate" value="<?php  echo $_REQUEST['date'] ?>" />
</br> </br>
</form>

<div id="prod_form_output"></div>
