<?php
ob_start();
require 'db_connection.php';
$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
if (!isset($_SESSION['cfAdmin']) || isset($_SESSION['cfAdmin']) == null) {
  header("location:login.php");
}
?>
<link rel="stylesheet" href="css/menuBootstrap.min.css">
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
    $query = "SELECT nome FROM gruppoCdipendente WHERE cf = '" . $_SESSION['cfAdmin'] . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $array = $result->fetch_assoc();
    ?>

    <a style="font-size:16px">Bentornato, <strong><?php echo $array['nome']; ?></strong></a>
    <ul class="list-unstyled components mb-5">
    <br>
      <li background-color="blue">
        <a <?php if ($curPageName != "index.php") { ?> href="index.php" <?php } else { ?> href="#overview" <?php } ?>>Overview <i style="float:right;transform:translate(0,7px)" class="fas fa-globe"></i></a>
      </li>
      <li>
        <a <?php if ($curPageName != "richiesteTessera.php") { ?> href="richiesteTessera.php" <?php } ?>>Richieste SmartCard <i style="float:right;transform:translate(0,7px)" class="fas fa-id-card"></i></a>
      </li>
      <li>
        <a <?php if ($curPageName != "reportUtenti.php") { ?> href="reportUtenti.php" <?php } ?>>Report Utenti <i style="float:right;transform:translate(0,7px)" class="fas fa-flag"></i></a>
      </li>
      <li>
        <a <?php if ($curPageName != "saldiInRosso.php") { ?> href="saldiInRosso.php" <?php } ?>>Saldi in Rosso <i style="float:right;transform:translate(0,7px)" class="fab fa-accessible-icon"></i></a>
      </li>
      <li>
        <a <?php if ($curPageName != "logout.php") { ?> href="logout.php" <?php } ?>>Logout <i style="float:right;transform:translate(0,7px)" class="fa fa-sign-out"></i></a>
      </li>
    </ul>
  </div>
</nav>