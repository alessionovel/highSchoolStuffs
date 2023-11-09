<?php
ob_start();
session_start();
if (!isset($_SESSION['cfAdmin'])) {
  //header("location:login.php");
}

?>

<head>
  <title>Smart Biking® - Admin</title>
  <link rel="icon" type="image/png" href="img/favicon.png" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- load CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>

  <!-- Google web font "Open Sans" -->

  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/overview.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Templatemo style -->
</head>

<body>


  <div class="wrapper d-flex align-items-stretch">
    <!-- Sidebar/menu -->
    <?php include 'menu.php'; ?>
    <script>
      $('#sidebar').removeClass('active');
    </script>
    <div style="align-items: center;" id="content" class="p-4 p-md-5 pt-5">
      <center>
        <h1>Overview <i class="fas fa-globe" style="color:#4d61b8;"></i></h1>
      </center>
      <center>
        <section name="" id="contenitore_info" style="align-self: center;">
          <div style="width: 70%; ">
            <canvas id="myChart" width="70%" height="30%"></canvas>
          </div>
      </center>


      </section>
    </div>



  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>


</body>

<script>
  var array = [];
  $(document).ready(function() {
    $.ajax({
      url: 'webservice/getNoleggiAnnuali.php',
      type: "POST",

      success: function(data) {
        var x = "",
          i;
        const risultato = JSON.parse(data);

        for (i in risultato.dati) {
          array.push(risultato.dati[i]);
        }
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio'],
            datasets: [{
              label: 'Numero di Bici Noleggiate durante il <?php echo date('Y') ?>',
              data: [array[0], array[1], array[2], array[3], array[4]],
              backgroundColor: [
                '#4d61b8',

              ],
              borderColor: [
                '#4d61b8',

              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      },
      error: function(jXHR, textStatus, errorThrown) {
        alert(errorThrown + "banana 2");
      }
    });
  });
</script>