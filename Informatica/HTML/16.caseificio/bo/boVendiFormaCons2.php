<?php ob_start();
session_start(); ?>
<?php
require "connectDb.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('#editForma').on('submit', function(e) {
    e.preventDefault();
    var codice = <?php echo $_REQUEST['codice'] ?>;
    var mese = <?php echo $_REQUEST['mese'] ?>;
    var anno = <?php echo $_REQUEST['anno'] ?>;
    var progr = <?php echo $_REQUEST['progr'] ?>;
    var theDate = document.getElementById('theDate').value;
    var theDateVend = document.getElementById('theDateVend').value;
    var cliente = document.getElementById('cliente').value;
    $.ajax({
      url: 'boVendiFormaFormCons.php',
      type: "POST",
      data: {
        mese: mese,
        codice: codice,
        anno: anno,
        progr: progr,
        theDate: theDate,
        theDateVend: theDateVend,
        cliente: cliente
      },
      success: function(data) {
        $("#boBody").empty();
      },
      error: function(jXHR, textStatus, errorThrown) {
        alert(errorThrown + "banana 2");
      }
    });
  });
});
</script>
<?php
$query = "SELECT * FROM ferroForma WHERE anno = '".$_REQUEST['anno']."' AND mese = '".$_REQUEST['mese']."' AND progr = '".$_REQUEST['progr']."' AND codCons = '".$_REQUEST['codice']."'";
$result = mysqli_query($mysqli, $query);
if ($result->num_rows > 0) {
  $forma = mysqli_fetch_array($result);
  if($forma['dVend']==null){
    ?>
    <br>
    <br>
    <form id="editForma" class="inputBox" method="post" enctype="multipart/form-data">

    </br>
    <strong> Codice del consorzio della forma :

      <?php
      echo " " . $_REQUEST['codice'] . " ";
      ?>

    </strong>
    <br>
    Forma prodotta il <?php echo $forma['dProd'] ?> con progressivo <?php echo $forma['progr'] ?>
    <input type="hidden" id="theDate" name="theDate" value="<?php echo $forma['dProd'] ?>" />
  </br><br>
  <strong>Data vendita forma:</strong>
  <input type="date" id="theDateVend" name="theDateVend" value="<?php echo date("Y-m-d") ?>" min="<?php echo $forma['dProd'] ?>" max="<?php echo date("Y-m-d") ?>" </input>
</br><br>
<strong>Scegli cliente:</strong>
<select name="cliente" id="cliente">
  <?php
  $query2 = "SELECT * FROM ferroCliente";
  $result2 = mysqli_query($mysqli, $query2);
  if ($result2->num_rows > 0) {
    while ($cliente = $result2->fetch_assoc()) {
      ?>
      <option value="<?php echo $cliente['cf']?>"><?php echo $cliente['nomeCl']?></option>
      <?php
    }
  }else{
    echo "Registra prima un cliente";
  }
  ?>
</select>
<br><br>
<input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="Avanti" />
</br> </br>

</form>
<?php
}else{
  echo "Forma già venduta";
}
} else {
  echo 'Forma non trovata';
}

?>

<div id="boEditForma"></div>
