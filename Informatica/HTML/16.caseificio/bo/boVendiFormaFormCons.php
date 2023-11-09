<?php
ob_start();
session_start()
?>

<?php
require "connectDb.php";
//print_r($_REQUEST);
echo "</br>";

echo "update";
$query = "UPDATE ferroForma SET dVend = '" . $_REQUEST['theDateVend'] . "', cf =  '" . $_REQUEST['cliente'] . "' WHERE progr = '".$_REQUEST['progr']."' AND codCons = '".$_REQUEST['codice']."' AND anno = '".$_REQUEST['anno']."' AND mese = '".$_REQUEST['mese']."'";

if (mysqli_query($mysqli, $query)) {
  echo "<p> Forma venduta correttamente </p>";
}
else {
  echo "</br>Error: " . $query . " </br>" . mysqli_error($mysqli);
}



header("location: bo.php");














?>
