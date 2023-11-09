<?php
session_start();
require 'db_connection.php';
if (isset($_SESSION['cf'])) {
  header("location:index.php?#stazione-0");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Smart Biking® - Login</title>
  <link rel="icon" type="image/png" href="img/favicon.png" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/loginStyle.css" rel="stylesheet" type="text/css" media="all" />
  <!-- load CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>

<body>


  <div class="wrapper d-flex align-items-stretch">

    <div id="content" class="p-4 p-md-5 pt-5">
      <div id="prova"></div>

      <div class="signupform">
        <!--  <input style="margin-left: 5%;padding:20px;border-color:purple;border-radius:10px;color:purple;background:#fff;" type="submit" name="" value="Indietro">-->
        <a href="index.php?#stazione-0"><img src="img/back2.png" alt="" style="margin-left: 5%;width:60px"></a>

        <div class="container">
          <!-- main content -->
          <div class="agile_info">
            <div class="w3l_form">
              <div class="left_grid_info">
                <img style="padding-top: 10%" src="img/logo.png" alt="">
                <p>Donec dictum nisl nec mi lacinia, sed maximus tellus eleifend. Proin molestie cursus sapien ac eleifend.</p>
                <img style="margin-top:5px;" src="img/slogan.jpg" alt="" />
              </div>
            </div>
            <div class="w3_info">
              <h2>Accedi Al Tuo Account</h2>
              <p>Inserisci i tuoi dati.</p>
              <form id="login" action="#" method="post">
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
                <input type="checkbox" id="check">

                <div style="color:#FF8C00;margin-bottom:10px" id="login-check" class="output-check">

                </div>
                <button name="btnLogin" id="btnLogin" class="btn btn-danger btn-block" type="submit">Login</button>
              </form>
              <p style="text-align:right; font-size:15px" class="account1">Non hai un Account? <a style="font-size:15px" href="registrazione.php">Registrati qui</a></p>
            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>
  $(document).ready(function() {
    $('#login').on('submit', function(e) {
      $("#login-check").html("");
      e.preventDefault();
      var email = document.getElementById("email_bar").value;
      var password = document.getElementById("password_bar").value;
      $.ajax({
        url: 'webservice/login_serv.php',
        type: "POST",
        data: {
          email: email,
          password: password
        },
        success: function(data) {
          const risultato = JSON.parse(data);
          if (risultato.risultato != 0) {
            $("#login-check").html("Credenziali errate");
          } else {
            var cf = risultato.cf;
            $.ajax({
              url: 'webservice/login_serv.php',
              type: "POST",
              data: {
                cf: cf
              },
              success: function(risposta) {
                location.reload();
              },
              error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown + "banana 1");
              }
            });
          }
        },
        error: function(jXHR, textStatus, errorThrown) {
          alert(errorThrown + "banana 2");
        }
      });
    });

    $('#check').click(function() {
      if (document.getElementById('check').checked) {
        $('#password_bar').get(0).type = 'text';
      } else {
        $('#password_bar').get(0).type = 'password';
      }
    });
  });
</script>