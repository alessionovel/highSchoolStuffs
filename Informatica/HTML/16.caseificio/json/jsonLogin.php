<?php
ob_start();
require_once "connectDb.php";
?>
<?php
$query = "SELECT * FROM ferroUtente WHERE email=".$_REQUEST['username']." AND psw=".$_REQUEST['password']."";
$result = mysqli_query($mysqli, $query);
if ($result->num_rows > 0 && $_REQUEST['username']!="0") {
  $utente = mysqli_fetch_array($result);
  $query = "SELECT * FROM ferroCaseificio WHERE codice=".$utente['codice']."";
  $result = mysqli_query($mysqli, $query);
  if ($result->num_rows > 0) {
    $caseificio = mysqli_fetch_array($result);
    $updates = array(
      "codice"       => $caseificio['codice'],
      "via"       => $caseificio['indirizzo'],
      "risultato"       => "1",
    );
    $con[0] = $updates;
    $risultato = array(
      "UpdateList" => $con
    );
  }
}else{
  $updates = array(
    "codice"       => "-1",
    "via"       => "-1",
    "risultato"       => "-1",
  );
  $con[0] = $updates;
  $risultato = array(
    "UpdateList" => $con
  );
}
echo json_encode($risultato);

?>
