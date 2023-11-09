<?php
require '../db_connection.php';
$error = 0; //l utente era richiedente e il cf esisteva davvero
$operazione = -1;
$result;


if (isset($_REQUEST['idReport'])) {
  $idReport = $_REQUEST['idReport'];
  $queryCard = "DELETE FROM gruppoCreport WHERE idReport = '" . $idReport . "' ";
  $resultCard = mysqli_query($conn, $queryCard);
} else {
  $error = -3; //credenziali non inserite
}
$updates = array(
  "risultato" => ($error)
);
$arr[0] = array_map('utf8_encode', $updates);
echo json_encode($arr[0]);
