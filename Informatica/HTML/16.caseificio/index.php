<?php
//require_once('declaresKIT.php');
//require_once('library2_0.php');

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="styles/style.css">

  <title>Consorzio - Mappa</title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">

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
    latitudine = 45.649739;
    longitudine = 13.777547;
    mapOptions = {
      center: new google.maps.LatLng(latitudine, longitudine),
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map($("#dvMap")[0], mapOptions);
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(latitudine, longitudine),
      map: map
    });
    var image = {
      url: "images/punt.png",
      scaledSize: new google.maps.Size(25, 25)
    };
    $.ajax({
      url: "read_caseifici.php",
      success: function(result) {
        var imp = JSON.parse(result);
        for (i = 0; i < imp.UpdateList.length; i++) {
          myLatLng = new google.maps.LatLng(imp.UpdateList[i].lat, imp.UpdateList[i].lon);
          var image = {
            url: 'https://www.voltahosting.it/5E/caseificioFerro/images/punt.png',
            scaledSize: new google.maps.Size(70, 70)
          };
          marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            shape: shape,
            optimized: false,
            zIndex: 100,
            title: imp.UpdateList[i].indirizzo,
            icon: image,
            url: "https://www.voltahosting.it/5E/caseificioFerro/homeCaseificio.php?idCaseificio=" + imp.UpdateList[i].id
          });
          google.maps.event.addListener(marker, 'click', function() {
            //alert(this.url);
            window.location.href = this.url;
          });
        }
      }
    });
  });
  </script>
</head>

<body>
  <div id="header">
    <p class="header"> NoFe Dairies Corporated ® </p>
    <br>

    <p2><style="text-align:center"> Il consorzio più grande del FVG !! </style></p2>
    <br><br>
    <p3><style="text-align:center"> Scegli uno dei caseifici membri del consorzio </style></p3>

  </div>
  <div id="dvMap" style="height: 40em; width: 100%;" class="map"></div>

</body>

</html>
