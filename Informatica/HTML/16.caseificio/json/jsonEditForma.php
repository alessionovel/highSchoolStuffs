<?php
ob_start();
require_once "connectDb.php";
?>
<?php
$query = "UPDATE ferroForma SET dProd = '" . $_REQUEST['theDate'] . "', scelta =  '" . $_REQUEST['scelta'] . "' WHERE progr = '".$_REQUEST['progr']."' AND codCons = '".$_REQUEST['codiceBo']."' AND anno = '".$_REQUEST['anno']."' AND mese = '".$_REQUEST['mese']."'";
if (mysqli_query($mysqli, $query)) {
  $updates = array(
      "risultato"       => "1",
  );
  $con[0] = $updates;
  $risultato = array(
      "UpdateList" => $con
  );
}
else {
  $updates = array(
      "risultato"       => "0",
  );
  $con[0] = $updates;
  $risultato = array(
      "UpdateList" => $con
  );
}
echo json_encode($risultato);

?>
