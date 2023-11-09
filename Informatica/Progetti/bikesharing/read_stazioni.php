<?php
ob_start(); ?>
<?php

require_once('db_connection.php');
require_once('library2_0.php');

$query = "SELECT * FROM gruppoCstazione";
$rec = mysqli_query($conn, $query) or die($query . "<br>" . mysqli_error($conn));
$num = mysqli_num_rows($rec);
if ($num == 0) {
  $updates = array(
    "id"       => -1,
    "indirizzo"     => "",
    "lat"      => 0,
    "lon"      => 0,
  );
  $con[0] = $updates;
  $risultato = array(
    "UpdateList" => $con
  );
  echo json_encode($risultato);
} else {
  $i = 0;
  while ($array = mysqli_fetch_array($rec)) {
    $queryOccupati = "SELECT COUNT(idSlot) as slotOccupati FROM gruppoCslot WHERE idStazione = '" . $array['idStazione'] . "' AND idBici != 0 AND stato = 1";
    $resultOccupati = mysqli_query($conn, $queryOccupati);
    $queryLiberi = "SELECT COUNT(idSlot) as slotLiberi FROM gruppoCslot WHERE idStazione = '" . $array['idStazione'] . "' AND idBici = 0 AND stato = 1";
    $resultLiberi = mysqli_query($conn, $queryLiberi);
    $liberi = $resultLiberi->fetch_assoc()['slotLiberi'];
    $occupati = $resultOccupati->fetch_assoc()['slotOccupati'];
    
    $updates = array(
      "id"       => $array['idStazione'],
      "indirizzo"     => $array['indirizzo'],
      "lat"      => $array['latitudine'],
      "lon"      => $array['longitudine'],
      "slotLiberi"      => $liberi,
      "slotOccupati"      =>  $occupati
    );
    $con[$i] = array_map('utf8_encode', $updates);
    $i++;
  }
}
$risultato = array(
  "UpdateList" => $con
);
echo json_encode($risultato);
?>
