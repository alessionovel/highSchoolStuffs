<?php
ob_start();
require 'db_connection.php';
if (!isset($_SESSION['cf']) || isset($_SESSION['cf']) == null) {
  $log = 0;
} else {
  $log = 1;
}
$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
if($curPageName!="login.php"&&$curPageName!="index.php"){
  if (!isset($_SESSION['cf']) || isset($_SESSION['cf']) == null) {
    header("location:login.php");
  }
}
?>
<link rel="stylesheet" href="css/menuStyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav id="sidebar" class="bu">
  <div class="custom-menu">
    <button type="button" id="sidebarCollapse" class="btn btn-primary">
      <i class="fa fa-bars"></i>
      <span class="sr-only">Toggle Menu</span>
    </button>
  </div>
  <div class="p-4 pt-5">
    <h1 style="text-shadow:3px 2px 10px #000; "><a href="index.php" class="logo">Smart Biking®</a></h1>
    <?php
    if ($log == 1) {
      $query = "SELECT nome FROM gruppoCutente WHERE cf = '" . $_SESSION['cf'] . "'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $array = $result->fetch_assoc();
    ?>
      <a style="font-size:16px" >Bentornato, </a><a name="sopraNome" href="profiloUtente.php"><strong href="profiloUtente.php"><?php echo $array['nome']; ?></strong></a>
    <?php
    }
    ?>
    <ul class="list-unstyled components mb-5">
      <li background-color="blue">
        <a <?php if ($curPageName != "index.php") { ?> href="index.php?#stazione-0" <?php } else { ?> href="#mappa" <?php } ?>>Mappa <i style="float:right;transform:translate(0,7px)" class="fa fa-map-o"></i></a>
      </li>
      <?php if ($log == 0) {
      ?>
        <li>
          <a <?php if ($curPageName != "login.php") { ?> href="login.php" <?php } ?>>Login <i style="float:right;transform:translate(0,7px)" class="fa fa-sign-in"></i></a>
        </li>
      <?php
      }
      if ($log == 1) {
      ?>
        <li>
          <a <?php if ($curPageName != "registroNoleggi.php") { ?> href="registroNoleggi.php" <?php } else { ?> href="#registro" <?php } ?>>Registro noleggi <i style="float:right;transform:translate(0,7px)" class="fas fa-list-ul"></i></a>
        </li>
      <?php
      }
      if ($log == 1) {
      ?>
        <li>
          <a <?php if ($curPageName != "gestisciSaldo.php") { ?> href="gestisciSaldo.php" <?php } else { ?> href="#Saldo" <?php } ?>>Gestisci saldo <i style="float:right;transform:translate(0,7px)" class="fas fa-wallet"></i></a>
        </li>
      <?php
      }
      if ($log == 1) {
      ?>
        <li>
          <a <?php if ($curPageName != "logout.php") { ?> href="logout.php" <?php } ?>>Logout <i style="float:right;transform:translate(0,7px)" class="fa fa-sign-out"></i></a>
        </li>
      <?php
      } ?>
    </ul>

    <a style="font-size:18px">Info e Smart Card</a>
    <ul class="list-unstyled components mb-5">
      <li>
        <?php if ($log == 1) { ?><a <?php if ($curPageName != "smartCard.php") { ?> href="smartCard.php" <?php } else { ?> href="#Saldo" <?php } ?>>Richiedi Smart Card <i style="float:right;transform:translate(0,7px)" class="fas fa-id-card"></i></a><?php }; ?>
        <a href="https://mail.google.com/mail/u/0/?fs=1&to=smartbiking.co@gmail.com&tf=cm" target="_blank" rel="noopener noreferrer">Contattaci<i style="float:right;transform:translate(0,7px)" class="fa Example of envelope fa-envelope"></i></a>
        <!--<a href="mailto:smartbiking.co@gmail.com">Contattaci via App<i style="float:right;transform:translate(0,7px)" class="fa Example of envelope fa-envelope"></i></a>...-->
      </li>
    </ul>



  </div>
</nav>
