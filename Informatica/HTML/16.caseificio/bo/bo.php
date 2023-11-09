<?php ob_start();
session_start(); ?>
<!doctype HTML>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="boStyle.css">
  <link rel="icon" href="img/Icon.png">
  <?php
  if($_SESSION['codiceBo']==0){
    ?>
    <title>Back office - consorzio</title>
    <?php
  }else{
    ?>
    <title>Back office - <?php require "connectDb.php";
    $query = "SELECT indirizzo FROM ferroCaseificio WHERE codice='" . $_SESSION['codiceBo'] . "'";
    $result = mysqli_query($mysqli, $query);
    echo $result->fetch_assoc()['indirizzo']; ?></title>
    <?php
  }
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<script>
$(document).ready(function() { //Esegue quando la pagina è caricata
  $("#btnImm").click(function() { //gestisce immagini
    $("#boBody").empty();
    $("#boBody").load("boImmagini.php");
  });
  $("#btnRegLatte").click(function() { //raccolta latte giornaliera
    $("#boBody").empty();
    $("#boBody").load("boRegLatteData.php");
  });
  $("#btnNewForma").click(function() { //inserisce nuova forma di formaggio
    $("#boBody").empty();
    $("#boBody").load("boNewFormaData.php");
  });
  $("#btnNewCliente").click(function() { //registra cliente
    $("#boBody").empty();
    $("#boBody").load("boRegCliente.php");
  });
  $("#btnModifica").click(function() { //registra cliente
    $("#boBody").empty();
    $("#boBody").load("boEditForma.php");
  });
  $("#btnVendi").click(function() { //registra cliente
    $("#boBody").empty();
    $("#boBody").load("boVendiForma.php");
  });
  $("#btnStats").click(function() { //registra cliente
    $("#boBody").empty();
    $("#boBody").load("boStatsData.php");
  });

  $("#btnNewCaseificio").click(function() { //registra cliente
    $("#boBody").empty();
    $("#boBody").load("boNewCaseificio.php");
  });
  $("#btnVendiCons").click(function() { //registra cliente
    $("#boBody").empty();
    $("#boBody").load("boVendiFormaCons.php");
  });

  $("#btnLogout").click(function() { //Esegue logout
    $("#boBody").empty();
    $("#boBody").load("boLogout.php");
    location.reload(true);
  });

});
</script>

<body>
  <?php
  if (!isset($_SESSION['codiceBo'])) {
    ?>
    <div id="loginBo">
      <form method="post" action="">
        <div class="inputBox">
        </br>
        <strong>Email:</strong>
        <input class="inputBar" type="text" id="username_bar" name="username_bar" required value="" placeholder="Inserisci la email" />
      </br>
      <strong>Password:</strong>
      <input class="inputBar" type="password" id="password_bar" name="password_bar" required value="" placeholder="Inserisci la password" />
    </br>
    <input class="inputSub" type="submit" id="login_submit_bar" name="login_submit_bar" value="Sign in" />
  </br>
</br>

<?php
if (isset($_REQUEST['login_submit_bar'])) {
  $username = $_REQUEST['username_bar'];
  $password = $_REQUEST['password_bar'];
  require "connectDb.php";

  $query = "SELECT codice FROM ferroUtente WHERE email='" . $username . "' AND psw='" . $password . "'";
  $result = mysqli_query($mysqli, $query);

  if ($result->num_rows > 0) {
    $_SESSION['codiceBo'] = $result->fetch_assoc()['codice'];
    header("location:bo.php");
  } else {
    echo '<p class="errore">email o password incorretti</p>';
  }
  $mysqli->close();
}
?>
</div>
</form>
</div>
<?php
} else {
  if($_SESSION['codiceBo']==0){
    require "boMenuCons.php";
  }else{
    require "boMenu.php";
  }
  ?>
  <div id="boBody" class="contBox"></div>
  <?php
}
?>
</body>

</html>
