<?php
require '../db_connection.php';
$error = 0;
$operazione = -1;
$result;

if (isset($_REQUEST['idStazione'])) {
    $idStazione = $_REQUEST['idStazione'];
    $query = "SELECT * FROM gruppoCstazione WHERE idStazione = '" . $idStazione . "'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) != 1) {
        $error = -4; //nun ce sta
    } else {
        $queryOccupati = "SELECT COUNT(idSlot) as slotOccupati FROM gruppoCslot WHERE idStazione = '" . $idStazione . "' AND idBici != 0 AND stato = 1";
        $resultOccupati = mysqli_query($conn, $queryOccupati);
        $queryLiberi = "SELECT COUNT(idSlot) as slotLiberi FROM gruppoCslot WHERE idStazione = '" . $idStazione . "' AND idBici = 0 AND stato = 1";
        $resultLiberi = mysqli_query($conn, $queryLiberi);
    }
} else {
    $error = -3; //id non inserite
}
if ($error == 0) {
    $liberi = $resultLiberi->fetch_assoc()['slotLiberi'];
    $occupati = $resultOccupati->fetch_assoc()['slotOccupati'];
    $luogo = $result->fetch_assoc()['indirizzo'];

    $updates = array(
        "risultato" => ($error),
        "slotLiberi" => ($liberi),
        "slotOccupati" => ($occupati),
        "luogo" => ($luogo)
    );

    $arr[0] = array_map('utf8_encode', $updates);
    echo json_encode($arr[0]);
} else {
    $updates = array(
        "risultato" => ($error)
    );
    $arr[0] = array_map('utf8_encode', $updates);
    echo json_encode($arr[0]);
}
