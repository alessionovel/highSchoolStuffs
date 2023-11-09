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
    var mese = <?php echo $_REQUEST['mese'] ?>;
    var anno = <?php echo $_REQUEST['anno'] ?>;
    var progr = <?php echo $_REQUEST['progr'] ?>;
    var theDate = document.getElementById('theDate').value;

    var d = new Date(theDate);
    var anno2;
    var mese2;

    if ( !!d.valueOf() ) {
      anno2 = d.getFullYear();
      mese2 = d.getMonth()+1;
    }
    if(mese!=mese2 || anno!=anno2){
      alert("Mese e anno non corrispondono alla forma");
    } else{
      var scelta = document.getElementById('scelta').value;
      $.ajax({
        url: 'boEditFormaForm.php',
        type: "POST",
        data: {
          mese: mese,
          anno: anno,
          progr: progr,
          theDate: theDate,
          scelta: scelta
        },
        success: function(data) {
          $("#boBody").empty();
        },
        error: function(jXHR, textStatus, errorThrown) {
          alert(errorThrown + "banana 2");
        }
      });
    }
  });
});
</script>
<?php
$query = "SELECT * FROM ferroForma WHERE anno = '".$_REQUEST['anno']."' AND mese = '".$_REQUEST['mese']."' AND progr = '".$_REQUEST['progr']."' AND codCons = '".$_SESSION['codiceBo']."'";
$result = mysqli_query($mysqli, $query);
if ($result->num_rows > 0) {
  $forma = mysqli_fetch_array($result);
  ?>
  <br>
  <br>
  <form id="editForma" class="inputBox" method="post" enctype="multipart/form-data">

  </br>
  <strong> Codice del consorzio di appartenenza :

    <?php
    require "connectDb.php";
    $query = "SELECT codice FROM ferroCaseificio ";
    $result = mysqli_query($mysqli, $query);
    while($array=$result->fetch_assoc()) {
      $codiceCons = $array['codice'];
    }
    echo " " . $codiceCons . " ";
    ?>

  </strong>
  <br>
  Forma prodotta il <?php echo $forma['mese'] ?>/<?php echo $forma['anno'] ?> con progressivo <?php echo $forma['progr'] ?>
</br><br>
<strong>Data produzione forma:</strong>
<input type="date" id="theDate" name="theDate" value="<?php echo $forma['dProd'] ?>" max="<?php echo date("Y-m-d") ?>" </input>
</br><br>
<strong>Scelta forma:</strong>
<select name="scelta" id="scelta">
  <option value="1" <?php if($forma['scelta']==1){echo "selected";}?>>Prima scelta</option>
  <option value="2" <?php if($forma['scelta']==2){echo "selected";}?>>Seconda scelta</option>
</select>
</br><br>
<input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="Avanti" />
</br> </br>

</form>
<?php
} else {
  echo 'Forma non trovata, inseriscila cliccando su "Inserisci forma"';
}

?>

<div id="boEditForma"></div>
