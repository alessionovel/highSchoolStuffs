<?php ob_start();
session_start(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('#selectData').on('submit', function(e) {
    e.preventDefault();
    date = document.getElementById('theDate').value;
    $.ajax({
      url: 'boStats.php',
      type: "POST",
      data: {
        date: date
      },
      success: function(data) {
        $("#boBody").html(data);
      },
      error: function(jXHR, textStatus, errorThrown) {
        alert(errorThrown + "banana");
      }
    });
  });
});
</script>
<br><br>
<form id="selectData" class="inputBox" method="post" enctype="multipart/form-data">

</br>
<strong> Codice del consorzio di appartenenza :

  <?php
  echo " " . $_SESSION['codiceBo'] . " ";
  ?>

</strong>
</br>
<strong> Scegli la data per le statistiche : </strong>
</br>
<input type="date" id="theDate" value="<?php echo date("Y-m-d")?>" max="<?php echo date("Y-m-d")?>">
</br>
<br>
<input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="Avanti" />
</br> </br>

</form>
