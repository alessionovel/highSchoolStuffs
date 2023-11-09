<?php ob_start();
session_start() ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  <?php
  require "connectDb.php";
  $query = "SELECT * FROM ferroImmagine WHERE codice=" . $_SESSION['codiceBo'] . "";
  $result = mysqli_query($mysqli, $query);
  while ($imm = $result->fetch_assoc()) {
    ?>
    $('#btnDel<?php echo $imm['progr']; ?>').click(function() {
      codice = <?php echo $imm['progr'] ?>;
      $.ajax({
        url: 'boDelImm.php',
        type: "POST",
        data: {
          codice: codice
        },
        success: function(data) {
          $("#prodBody").load("boVisImm.php");
        },
        error: function(jXHR, textStatus, errorThrown) {
          alert(errorThrown + "banana");
        }
      });
    });
    $('#btnEdit<?php echo $imm['progr']; ?>').click(function() {
      codice = <?php echo $imm['progr'] ?>;
      $.ajax({
        url: 'boEditImm.php',
        type: "POST",
        data: {
          codice: codice
        },
        success: function(data) {
          $("#prodBody").html(data);
        },
        error: function(jXHR, textStatus, errorThrown) {
          alert(errorThrown + "banana 2");
        }
      });
    });
    $('#btnView<?php echo $imm['progr']; ?>').click(function() {
      codice = <?php echo $imm['progr'] ?>;
      $.ajax({
        url: 'boViewImm.php',
        type: "POST",
        data: {
          codice: codice
        },
        success: function(data) {
          $("#prodBody").html(data);
        },
        error: function(jXHR, textStatus, errorThrown) {
          alert(errorThrown + "banana 2");
        }
      });
    });
    <?php
  }
  ?>
});
</script>
<?php
require "connectDb.php";

$query = "SELECT * FROM ferroImmagine WHERE codice=" . $_SESSION['codiceBo'] . "";
$result = mysqli_query($mysqli, $query);

if ($result->num_rows > 0) {
  ?>

  <table id="table">
    <tr>
      <th>Nome immagine</th>
      <th>EDIT</th>
      <th>DELETE</th>
      <th>VEDI INFO</th>
    </tr>
    <?php
    while ($imm = $result->fetch_assoc()) {
      echo "<tr><td><span>" . $imm['path'] . "</span></td>";
      ?>
      <td class="forButton"><button id="btnEdit<?php echo $imm['progr'] ?>" class="btnForm">EDIT</button></td>
      <td class="forButton"><button id="btnDel<?php echo $imm['progr'] ?>" class="btnForm">DELETE</button></td>
      <td class="forButton"><button id="btnView<?php echo $imm['progr'] ?>" class="btnForm">VEDI INFO</button></td>
      <?php
    }
    ?>
  </tr>
</table>
<?php
} else {
  echo "<p>Non è stato trovata nessuna immagine</p>";
}
?>
<div id="confirmBody"></div>
