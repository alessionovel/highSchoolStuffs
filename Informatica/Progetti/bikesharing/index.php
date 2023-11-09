<?php
session_start();
require 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Smart Biking®</title>
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
    <script>
      $('#sidebar').removeClass('active');
    </script>
    <div id="content" class="p-4 p-md-5 pt-5">

      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <header class="text-center tm-site-header">

              <img src="img/logo.png" alt="" style="height:45px;">
              <h1 id="mappa" class="pl-4 tm-site-title">Mappa Stazioni</h1>
            </header>
          </div>
        </div>
        <div style="box-shadow:10px 10px 10px;border-style: groove;border-width: 4px;border-color:#866ec7;z-index:99" class="row">
          <div id="dvMap" style="height: 50em; width: 100%;" class="map"></div>
        </div>
      </div>
      <div class="container tm-container-2">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="tm-welcome-text">Stazioni Disponibili</h2>
          </div>
        </div>
        <div class="row tm-section-mb">
          <div class="col-lg-12">

            <?php
            $nStazioni = 0;
            $queryBiciDisponibili = "SELECT
            gruppoCstazione.idStazione, gruppoCstazione.indirizzo, gruppoCstazione.img,gruppoCstazione.latitudine,gruppoCstazione.longitudine,
            COUNT(
              CASE WHEN gruppoCslot.idBici = 0 THEN 1
              END
            ) AS slotLiberi,
            COUNT(
              CASE WHEN gruppoCslot.idBici != 0 THEN 1
              END
            ) AS slotOccupati
            FROM
            gruppoCslot,
            gruppoCstazione
            WHERE
            gruppoCslot.idStazione = gruppoCstazione.idStazione
            AND gruppoCslot.stato = 1
            GROUP BY
            gruppoCstazione.idStazione";

            $resultBiciDisponibili = mysqli_query($conn, $queryBiciDisponibili) or die(mysqli_error($conn));

            while ($arrayBiciDisponibili = $resultBiciDisponibili->fetch_assoc()) {
              $slotDisponibili = $arrayBiciDisponibili['slotLiberi'];
              $biciDisponibili = $arrayBiciDisponibili['slotOccupati'];
              $lat = $arrayBiciDisponibili['latitudine'];
              $lon = $arrayBiciDisponibili['longitudine'];
            ?>
              <div class=" tm-timeline-item">
                <?php if ($nStazioni != 0) {
                  echo "<div class=\"tm-timeline-connector-vertical\"></div>";
                } ?>
                <div class="tm-timeline-item-inner">
                  <img src="img/<?php echo $arrayBiciDisponibili['img']; ?>" data-tilt data-tilt-reverse="true" data-tilt-glare data-tilt-max-glare="0.4" data-tilt-reset="false" alt=" Image" class="rounded-circle tm-img-timeline" style="box-shadow:3px 4px 10px #000">
                  <div class="tm-timeline-connector">
                    <p class="mb-0">&nbsp;</p>
                  </div>
                  <div class="tm-timeline-description-wrap" data-tilt-glare data-tilt-max-glare="0.4" data-tilt-scale="1.05">
                    <div id="stazione-<?php echo $arrayBiciDisponibili['idStazione'] ?>" style="color: red" class="tm-bg-blue tm-timeline-description">
                      <h3 id="1" class="tm-text-white tm-font-400 tm-text-shadow" style="transform: translateZ(20px)"><?php echo $arrayBiciDisponibili['indirizzo'] ?></h3>
                      <p class="tm-text-gray">Slot Liberi: <strong><?php echo $slotDisponibili ?></strong>
                        <br>Bici Disponibili: <strong><?php echo $biciDisponibili ?></strong>
                      </p>
                      <p class="tm-text-white float-right mb-0">
                        <a id="portamiQui" href="<?php echo "http://www.google.com/maps/place/" . $lat . "," . $lon ?> " target="_blank" rel="noopener noreferrer">Portami Qui</a>
                      </p>
                    </div>
                  </div>
                </div>
                <?php
                $nStazioni = 1;
                ?>
              </div>
            <?php
            }
            ?>
          </div>

        </div>
      </div>
      <!--  row -->
      <hr>
      <div class="row tm-section-mb tm-section-mt">
        <div class="col-lg-4 col-md-4 col-sm-12 pr-lg-5 mb-md-0 mb-4">
          <h3 class="mt-2 mb-3 tm-text-gray">Il nostro Progetto</h3>
          <p>Integer imperdiet aliquet lobortis. In in metus risus. Pellentesque pulvinar venenatis dui id rutrum. In
            pharetra neque et eleifend venenatis.</p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 pr-lg-5 mb-md-0 mb-4">
          <h3 class="mt-2 mb-3 tm-text-gray">Chi Siamo</h3>
          <p>Integer imperdiet aliquet lobortis. In in metus risus. Pellentesque pulvinar venenatis dui id rutrum. In
            pharetra neque et eleifend venenatis.</p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <h3 class="mt-2 mb-3 tm-text-gray">Come Trovarci</h3>
          <p>Integer imperdiet aliquet lobortis. In in metus risus. Pellentesque pulvinar venenatis dui id rutrum. In
            pharetra neque et eleifend venenatis.</p>
        </div>
      </div>

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
  <script type="text/javascript" src="js/vanilla-tilt.js"></script>
  <script type="text/javascript">
    VanillaTilt.init(document.querySelectorAll(".tm-timeline-description-wrap"), {
      max: 5,
      speed: 300,
      glare: true
    });
  </script>

</body>

</html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8FMoY4gz60f4V55gKN1cjvkeAI6mRnfc"></script>

<script>
  var shape = {
    type: 'poly'
  };
  var map;
  $(document).ready(function() {
    latitudine = 45.652893;
    longitudine = 13.780324;
    mapOptions = {
      center: new google.maps.LatLng(latitudine, longitudine),
      zoom: 13.9,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map($("#dvMap")[0], mapOptions);
    /*marker = new google.maps.Marker({
      position: new google.maps.LatLng(latitudine, longitudine),
      map: map
    });*/
    var image = {
      url: "img/marker.png",
      scaledSize: new google.maps.Size(25, 25)
    };
    $.ajax({
      url: "read_stazioni.php",
      success: function(result) {
        var imp = JSON.parse(result);
        for (i = 0; i < imp.UpdateList.length; i++) {
          myLatLng = new google.maps.LatLng(imp.UpdateList[i].lat, imp.UpdateList[i].lon);
          var image = {
            url: "img/marker.png",
            scaledSize: new google.maps.Size(50, 50)
          };
          marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            shape: shape,
            optimized: false,
            zIndex: 100,
            title: imp.UpdateList[i].indirizzo,
            icon: image,
            id: imp.UpdateList[i].id,
            url: "http://www.appalo.it/5E/GruppoC/bikesharing/index.php?#stazione-" + imp.UpdateList[i].id
          });
          google.maps.event.addListener(marker, 'click', function() {
            $('#stazione-' + this.id).get(0).style.transition = "all 2s";
            $('#stazione-' + this.id).get(0).style.backgroundColor = '#1c39bb ';
            window.location.href = this.url;
            demo(this.id);
          });
        }
      }
    });
  });

  function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

  async function demo(id) {
    await sleep(1700);
    $('#stazione-' + id).get(0).style.transition = "all 2s";
    $('#stazione-' + id).get(0).style.backgroundColor = '#866ec6';
  }
</script>