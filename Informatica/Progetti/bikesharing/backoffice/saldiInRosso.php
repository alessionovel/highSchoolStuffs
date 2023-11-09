<!DOCTYPE html>
<html lang="en">

<head>
  <title>Smart Biking® - Amministrazione</title>
  <link rel="icon" type="image/png" href="img/favicon.png" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- load CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
  <!-- Google web font "Open Sans" -->
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/bodyStyle.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Templatemo style -->
</head>

<body>
  <div class="wrapper d-flex align-items-stretch" id="tutto">
    <!-- Sidebar/menu -->
    <?php include 'menu.php'; ?>

    <div id="content" class="p-4 p-md-5 pt-5">

      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <header class="text-center tm-site-header">
              <img src="img/logo.png" alt="" style="height:45px;">
              <h1 id="titolo" class="pl-4 tm-site-title">Saldi in Rosso & BAN</h1>
            </header>
            <label for="blocca" style="float:right;"><i id="blocca" class="fas fa-ban" style="color:red;"></i> = BLOCCA</label>
            <label for="sblocca" style="float:right;"><i id="sblocca" class="fas fa-unlock-alt" style="color:green;"></i> = SBLOCCA &nbsp</label>
            <label for="visual" style="float:right;"><i id="visual" class="far fa-eye" style="color:blue;"></i> = VISUALIZZA &nbsp</label>

          </div>
        </div>
        <div id=" tab">
          <table id="example" class="display table table-striped" cellspacing="0" width="100%">
            <thead>
              <tr class="bg">
                <th>#</th>
                <th>Saldo</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Azioni</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Saldo</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Azioni</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              $query = "SELECT cf,ban,saldo FROM gruppoCutente WHERE saldo < 0 OR ban = 1 ORDER BY saldo"; //trovare tot utenti richiedenti
              $result = mysqli_query($conn, $query);
              $numRighe = mysqli_num_rows($result);

              for ($i = 0; $i < $numRighe; $i++) {
                $array = $result->fetch_assoc();
              ?>
                <tr id="rigaTabella-<?php echo $i ?>">
                  <td id="valTabella-0"><strong><?php echo $i + 1 ?></strong></td>
                  <td id="valTabella-1<?php echo $i ?>"></td>
                  <td id="valTabella-2<?php echo $i ?>"></td>
                  <td id="valTabella-3<?php echo $i ?>"></td>
                  <td id="valTabella-4<?php echo $i ?>">

                    <button onclick="showUtente('<?php echo $i ?>');" value="<?php echo $array['cf'] ?>" id="btnShow-<?php echo $i ?>" class="far fa-eye" style="color:blue; transform:translate(0px,0px); border:none; background:none;"></button>
                    <div id="azioni-<?php echo $i ?>" style="display: inline">
                      <?php if ($array['ban'] == 0) { ?>
                        <button onclick="bloccaUtente('<?php echo $i ?>');" value="<?php echo $array['cf'] ?>" id="btnBlocca-<?php echo $i ?>" class="fas fa-ban" style="color:red; transform:translate(18px,0px); border:none; background:none;"></button>
                      <?php } else { ?>
                        <button onclick="sbloccaUtente('<?php echo $i ?>','<?php echo $array['saldo'] ?>');" value="<?php echo $array['cf'] ?>" id="btnSblocca-<?php echo $i ?>" class="fas fa-unlock-alt" style="color:green; transform:translate(18px,0px); border:none; background:none;"></button>
                      <?php } ?>
                    </div>
                  </td>
                </tr>
              <?php
              }
              ?>

            </tbody>
          </table>
        </div>
        <br>
        <center>
          <strong>
            <div id="risultato" style="font-size:20px; color:#4d61b8 !important; text-shadow: 0 0 5px 5px #CCCCCC;">
          </strong>
      </div>
      </center>
      <br>

      <!-- Footer -->
      <footer class=" row mt-5 mb-5">
        <div class="col-lg-12">
          <p class="text-center tm-text-gray tm-copyright-text mb-0">Copyright &copy;
            <span class="tm-current-year">2021</span> Smart Biking®
          </p>
        </div>
      </footer>
    </div>
  </div>
  </div>
  <!-- .container -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <link rel="stylesheet" href="css/dataTables.min.css">
  <script src="js/dataTables.min.js"></script>
  <div id="popUp" style="display:block"></div>
</body>

</html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8FMoY4gz60f4V55gKN1cjvkeAI6mRnfc"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script>
  $(document).ready(function() {
    $.ajax({
      url: 'webservice/elencoSaldiRosso.php',
      type: "POST",

      success: function(data) {
        var x = "",
          i;
        const risultato = JSON.parse(data);

        for (i in risultato.dati) {
          x = risultato.dati[i].saldo;
          $("#valTabella-1" + i).html(x + " €");
          x = risultato.dati[i].nome;
          $("#valTabella-2" + i).html(x);
          x = risultato.dati[i].cognome;
          $("#valTabella-3" + i).html(x);
        }
      },
      error: function(jXHR, textStatus, errorThrown) {
        alert(errorThrown + "banana 2");
      }
    });
  });
</script>

<script>
  function showUtente(i) {
    var cf = document.getElementById("btnShow-" + i).value;
    $.ajax({
      url: 'popUpUtente.php',
      type: "POST",
      data: {
        cf: cf
      },
      success: function(data) {
        var element = document.getElementById("tutto");
        //element.classList.add("blur");
        $("#popUp").html(data);

      },
      error: function(jXHR, textStatus, errorThrown) {
        alert(errorThrown + "banana 2");
      }
    });
  }
</script>

<script>
  function sbloccaUtente(i, saldo) {
    var cf = document.getElementById("btnSblocca-" + i).value;
    $.ajax({
      url: 'webservice/sbloccaUtente.php',
      type: "POST",
      data: {
        cf: cf
      },
      success: function(data) {
        const risultato = JSON.parse(data);
        if (risultato.risultato == 0) {
          $("#risultato").html("Utente SBLOCCATO correttamente");
          if (saldo >= 0) {
            $("#rigaTabella-" + i).remove();
          }else{
            $("#azioni-" + i).html("<button onclick=\"bloccaUtente(" + i + ");\" value=\"" + cf + "\" id=\"btnBlocca-" + i + "\" class=\"fas fa-ban\" style=\"color:red; transform:translate(18px,0px); border:none; background:none;\"></button>");
          }
        } else {
          $("#risultato").html("Errore");
        }

      },
      error: function(jXHR, textStatus, errorThrown) {
        alert(errorThrown + "banana 2");
      }
    });
  }
</script>



<script>
  function bloccaUtente(i) {
    var cf = document.getElementById("btnBlocca-" + i).value;
    $.ajax({
      url: 'webservice/bloccaUtente.php',
      type: "POST",
      data: {
        cf: cf
      },
      success: function(data) {

        const risultato = JSON.parse(data);
        if (risultato.risultato == 0) {
          $("#risultato").html("Utente BLOCCATO correttamente");
          $("#azioni-" + i).html("<button onclick=\"sbloccaUtente(" + i + ");\" value=\"" + cf + "\" id=\"btnSblocca-" + i + "\" class=\"fas fa-unlock-alt\" style=\"color:green; transform:translate(18px,0px); border:none; background:none;\"></button>");
        } else {
          $("#risultato").html("Errore");
        }

      },
      error: function(jXHR, textStatus, errorThrown) {
        alert(errorThrown + "banana 2");
      }
    });
  }
</script>

<style>
  .blur {
    filter: blur(5px);
    -webkit-filter: blur(5px);
    -moz-filter: blur(5px);
    -o-filter: blur(5px);
    -ms-filter: blur(5px);
  }
</style>