<?php
ob_start();
session_start()
?>

<?php
require "connectDb.php";


$query = "SELECT * FROM ferroForma WHERE anno = '".$_REQUEST['annoProd']."' AND mese = '".$_REQUEST['meseProd']."' AND progr = '".$_REQUEST['progr']."' AND codCons = '".$_SESSION['codiceBo']."'";
$result = mysqli_query($mysqli, $query);
if ($result->num_rows > 0) {
  echo 'Forma già inserita, se si vuole modificarla cliccare su "Modifica forma"';
} else {
  $query = "INSERT INTO ferroForma (codCons, anno, mese, progr, scelta, dProd) VALUES
  ('" . $_SESSION['codiceBo'] . "','" . $_REQUEST['annoProd'] . "',
    '" . $_REQUEST['meseProd'] . "','" . $_REQUEST['progr'] . "', '" . $_REQUEST['scelta'] . "',
    '" . $_REQUEST['theDate'] . "')";

    if (mysqli_query($mysqli, $query)) {
      echo "Forma inserita correttamente";
    }
    else {
      echo "Errore nell'inserimento della forma";
    }

  }
  ?>
