<!DOCTYPE html>
<html lang="en">

<head>
  <title>Smart Biking® - Registro Noleggi</title>
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
  <div class="wrapper d-flex align-items-stretch">
    <!-- Sidebar/menu -->
    <?php include 'menu.php'; ?>

    <div id="content" class="p-4 p-md-5 pt-5">

      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <header class="text-center tm-site-header">
              <img src="img/logo.png" alt="" style="height:45px;">
              <h1 id="titolo" class="pl-4 tm-site-title">Registro Noleggi</h1>
            </header>
          </div>
        </div>
        <center>
          <table id="example" class="display table table-striped" cellspacing="0" width="100%">
            <thead>
              <tr class="bg">
                <th>#</th>
                <th>Data e Ora Partenza</th>
                <th>Data e Ora Arrivo</th>
                <th>Stazione Partenza</th>
                <th>Stazione Arrivo</th>
                <th>Costo (€)</th>
                <th>Tempo</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Data e Ora Partenza</th>
                <th>Data e Ora Arrivo</th>
                <th>Stazione Partenza</th>
                <th>Stazione Arrivo</th>
                <th>Costo (€)</th>
                <th>Tempo</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              $query = "SELECT * FROM gruppoCnoleggio WHERE cf = '" . $_SESSION['cf'] . "'";
              $result = mysqli_query($conn, $query);
              $numRighe = mysqli_num_rows($result);

              for ($i = 0; $i < $numRighe; $i++) {
              ?>
                <tr>
                  <td id="valTabella-0"><strong><?php echo $i + 1 ?></strong></td>
                  <td id="valTabella-1<?php echo $i ?>"></td>
                  <td id="valTabella-2<?php echo $i ?>"></td>
                  <td id="valTabella-3<?php echo $i ?>"></td>
                  <td id="valTabella-4<?php echo $i ?>"></td>
                  <td id="valTabella-5<?php echo $i ?>"></td>
                  <td id="valTabella-6<?php echo $i ?>"></td>
                </tr>
              <?php
              }
              ?>

            </tbody>
          </table>
          <!-- Footer -->
          <footer class="row mt-5 mb-5">
            <div class="col-lg-12">
              <p class="text-center tm-text-gray tm-copyright-text mb-0">Copyright &copy;
                <span class="tm-current-year">2021</span> Smart Biking®
              </p>
            </div>
          </footer>
      </div>
    </div>
    <!-- .container -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/dataTables.min.css">
    <script src="js/dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>
</body>

</html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8FMoY4gz60f4V55gKN1cjvkeAI6mRnfc"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $(document).ready(function() {
    $.ajax({
      url: 'webservice/noleggi_serv.php',
      type: "POST",
      data: {
        cf: <?php echo $_SESSION['cf'] ?>,
      },
      success: function(data) {
        var x = "",
          i;
        const risultato = JSON.parse(data);

        for (i in risultato.dati) {
          x = risultato.dati[i].dataOraPartenza;
          $("#valTabella-1" + i).html(x);
          x = risultato.dati[i].dataOraArrivo;
          $("#valTabella-2" + i).html(x);
          x = risultato.dati[i].stazionePartenza;
          $("#valTabella-3" + i).html(x);
          x = risultato.dati[i].stazioneArrivo;
          $("#valTabella-4" + i).html(x);
          x = risultato.dati[i].costoViaggio;
          $("#valTabella-5" + i).html(x + " Euro");
          x = risultato.dati[i].tempo;
          $("#valTabella-6" + i).html(parseFloat(x / 60).toFixed(2) + " Min.");

        }
      },
      error: function(jXHR, textStatus, errorThrown) {
        alert(errorThrown + "banana 2");
      }
    });
  });
</script>