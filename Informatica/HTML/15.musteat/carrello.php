<?php
session_start();
ob_start();

if (!isset($_SESSION['id'])) {
  header("location:index.php");
}
require_once('db_connection.php');

$query = "SELECT * FROM novelristoranti WHERE idRist='" . $_SESSION['id'] . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$ristorante = mysqli_fetch_array($result);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() { //Esegue quando la pagina è caricata
    $("#procedi").click(function() {
      $("#menuOut").empty();
      $("#menuOut").load("auth.php");
    });

    <?php
    $max1 = sizeof($_SESSION['carrello']);

    for ($i = 0; $i < $max1; $i++) { //per ogni prodotto del carrello
      $array = $_SESSION['carrello'][$i];
      while (list($key2, $val2) = each($array)) { //etrai i dati
        if ($key2 == 'idProd') { //controlla se è un prodotto
          $query2 = "SELECT * FROM novelprodotti WHERE idProd='$val2'";
          $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
          $prodotto2 = mysqli_fetch_array($result2);
    ?>
          //Delete
          $("#elimina<?php echo $prodotto2['idProd'] ?>").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
              url: "eliminacarrello.php",
              type: "POST",
              data: $(this).serialize(),
              success: function(data) {
                //$("#menuOut").empty();
                $("#menuOut").load("carrello.php");
              },
              error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown);
              }
            });
          });
          $("#sub<?php echo $prodotto2['idProd'] ?>").click(function() {
            id = <?php echo $prodotto2['idProd'] ?>;
            $.ajax({
              url: "newQt.php",
              type: "POST",
              data: {
                type: "-",
                id: id
              },
              success: function(data) {
                $("#quant<?php echo $prodotto2['idProd'] ?>").html(data);
              },
              error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown);
              }
            });
          });
          $("#add<?php echo $prodotto2['idProd'] ?>").click(function() {
            id = <?php echo $prodotto2['idProd'] ?>;
            $.ajax({
              url: "newQt.php",
              type: "POST",
              data: {
                type: "+",
                id: id
              },
              success: function(data) {
                $("#quant<?php echo $prodotto2['idProd'] ?>").html(data);
              },
              error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown);
              }
            });
          });
    <?php
        }
      }
    }
    ?>
  });
</script>


<div id="menuRes">
  <div class="infoBody corpo">
    <?php
    if (isset($_SESSION['carrello'])) {
      $max = sizeof($_SESSION['carrello']);
      if ($max == 0) {
    ?>
        </br></br></br>
        <div class="descBox">
          <p> Il carrello è vuoto</p>
        </div>
      <?php
      } else {
      ?>
        </br>
        <!--action="auth.php"-->
        <form id="procedi" method="POST">
          <input class="inputSub" type="submit" value="Procedi con l'ordine" />
        </form>
        <?php
        $bool = 0;
        for ($i = 0; $i < $max; $i++) {
          $carrello = $_SESSION['carrello'][$i];
          $bool = 0;
          while (list($key, $val) = each($carrello)) {
            if ($key == 'idProd') {
              $bool = 1;
        ?>
              <div id="articolo">
                <?php
                $query = "SELECT * FROM novelprodotti WHERE idProd='$val'";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                $prodotto = mysqli_fetch_array($result);
                echo "<span class=\"nomeProd\">" . $prodotto['nome'] . " € " . number_format($prodotto['prezzo'], 2) . "</span><br/>";
                echo "</br>";
                echo "<img src=\"" . $prodotto['img'] . "\" width=\"150\" height=\"150\"/><br/>";
                ?>
                <form id="elimina<?php echo $val ?>" method="POST" class="formClass">
                  <input type="hidden" name="id" value="<?php echo $val ?>" />
                  </br>
                  <input class="remBtn" type="submit" name="elimina" value="Elimina" /></br>
                <?php
              } else if (($key == 'quantita') && ($bool == 1)) {
                ?>
                  <button id="sub<?php echo $prodotto['idProd'] ?>" class="addSub">-
                    <?php echo "</button>" ?><div class="numberCarr" id="quant<?php echo $prodotto['idProd'] ?>"><?php echo $val ?>
                    </div><button id="add<?php echo $prodotto['idProd'] ?>" class="addSub">+</button>
                    </br></br>
                  <?php
                }
                  ?>
                </form>
              <?php
            } //chiusura while che controlla
              ?>
              </div>
          <?php
        } //chiusura for che scorre il carrello
      } //chiusura else se c'è qualcosa nel carrello
    } else { //else dell'isset
          ?>
          </br></br></br>
          <div class="descBox">
            <p> Il carrello è vuoto</p>
          </div>
        <?php
      }
        ?>
  </div>
</div>
<div id="tempDiv"></div>