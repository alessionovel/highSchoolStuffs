<?php
ob_start();
session_start()
?>

<?php
require "connectDb.php";
//print_r($_REQUEST);
echo "</br>";

echo "update";
$query = "UPDATE ferroForma SET dProd = '" . $_REQUEST['theDate'] . "', scelta =  '" . $_REQUEST['scelta'] . "' WHERE progr = '".$_REQUEST['progr']."' AND codCons = '".$_SESSION['codiceBo']."' AND anno = '".$_REQUEST['anno']."' AND mese = '".$_REQUEST['mese']."'";

if (mysqli_query($mysqli, $query)) {
  echo "<p> I dati sono stati raccolti correttamente </p>";
}
else {
  echo "</br>Error: " . $query . " </br>" . mysqli_error($mysqli);
}



header("location: bo.php");














?>
