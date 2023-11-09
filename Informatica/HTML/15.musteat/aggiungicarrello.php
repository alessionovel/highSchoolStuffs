<?php
ob_start();
session_start();

if (!isset($_SESSION['carrello'])) {

  $_SESSION['carrello'] = array(array("idProd" => $_POST['id'], "quantita" => $_POST['quantita']),);
  
} else {
  $bool = 0;
  $max = sizeof($_SESSION['carrello']);

  for ($i = 0; $i < $max; $i++) {//scorre il carrello
    while (list($key, $val) = each($_SESSION['carrello'][$i])) {//controlla

      if ($key == 'idProd' && $val == $_POST['id']) {
        $quantita = $_SESSION['carrello'][$i]['quantita'] + $_POST['quantita'];
        $_SESSION['carrello'][$i]['quantita'] = $quantita;
        $bool = 1;

      }
    }
  }

  if ($bool == 0) {
    $b = array("idProd" => $_POST['id'], "quantita" => $_POST['quantita']);
    array_push($_SESSION['carrello'], $b); // Items added to cart
  }
}
