<?php
session_start();
require 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Smart Biking® - Registrazione</title>
  <link rel="icon" type="image/png" href="img/favicon.png" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/loginStyle.css" rel="stylesheet" type="text/css" media="all"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <div class="signupform" >
      <a href="index.php"><img src="img/back2.png" alt="" style="margin-left: 5%;width:60px"></a>

      <!--  <input style="margin-left: 5%;padding:20px;border-color:purple;border-radius:10px;color:purple;background:#fff;" type="submit" name="" value="Indietro">-->
      <div class="container">
        <!-- main content -->
        <div class="agile_info" >
          <div class="w3l_form">
            <div class="left_grid_info">
              <img style="padding-top: 10%" src="img/logo.png" alt="">
              <p>Donec dictum nisl nec mi lacinia, sed maximus tellus eleifend. Proin molestie cursus sapien ac eleifend.</p>
              <img style="margin-top:5px;" src="img/slogan.jpg" alt="" />
            </div>
          </div>
          <div class="w3_info" >
            <div id="fineReg" >
            <h2>Crea Il Tuo Account</h2>
            <p>Inserisci i tuoi dati.</p>
            <div id="campi">
              <form id="primaReg" action="" method="post">
                <label>Email</label>
                <div class="input-group">
                  <span class="fa fa-envelope" aria-hidden="true"></span>
                  <input id="email_bar" name="email_bar" type="email" placeholder="Inserisci L'Email" required="">
                </div>
                <label>Password</label>
                <div class="input-group">
                  <span class="fa fa-lock" aria-hidden="true"></span>
                  <input id="password_bar" name="password_bar" type="Password" placeholder="Inserisci la Password" required="">
                </div>
                <label>Codice Fiscale</label>
                <div class="input-group">
                  <span class="fa fa-id-card" aria-hidden="true"></span>
                  <input id="cf_bar" name="email_bar" type="text" placeholder="Inserisci il Codice Fiscale" required="">
                </div>
                <div style="color:#FF8C00;margin-bottom:10px" id="registrazione-check" class="output-check"> </div>
                  <button name="btnLogin" id="btnAvanti" class="btn btn-danger btn-block" type="submit">Avanti</button >
                  </form>
                </div>
                </div>
                <p style="text-align:right"class="account1">Hai già un Account? <a href="login.php">Fai il Login qui</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- .container -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>

    </body>

    </html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    $(document).ready(function() {
      $('#primaReg').on('submit', function(e) {
        e.preventDefault();
        var email = document.getElementById("email_bar").value;
        var password = document.getElementById("password_bar").value;
        var cf = document.getElementById("cf_bar").value;
        $.ajax({
          url: 'webservice/presenzaUtente_serv.php',
          type: "POST",
          data: {
            email: email,
            cf: cf
          },
          success: function(data) {
            const risultato = JSON.parse(data);
            if (risultato.risultato != 0) {
              $("#registrazione-check").html("Email o codice fiscale già presenti");
            } else {
              $.ajax({
                url: 'registrazione2.php',
                type: "POST",
                data: {
                  email: email,
                  password: password,
                  cf: cf
                },
                success: function(data) {
                  $("#campi").html(data);
                },
                error: function(jXHR, textStatus, errorThrown) {
                  alert(errorThrown + "banana 2");
                }
              });
            }
          },
          error: function(jXHR, textStatus, errorThrown) {
            alert(errorThrown + "banana 2");
          }
        });
      });

    });

    </script>
