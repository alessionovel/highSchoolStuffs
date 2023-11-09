<?php
require '../db_connection.php';
$error = 0;
$operazione = -1;
$result;

if (isset($_REQUEST['idReport'])) {
    $idReport = $_REQUEST['idReport'];

    $query = "SELECT dataOra, oggetto, corpo, foto, email, idReport,nome,cognome FROM gruppoCreport,gruppoCutente WHERE gruppoCutente.cf=gruppoCreport.cf AND gruppoCreport.idReport = '" . $idReport . "'";
    $resultReport = mysqli_query($conn, $query);
    if (mysqli_num_rows($resultReport) == 0) {
        $error = -1; //non cerano report con quel cf
    }
} else {
    $error = -3; //id non inserite
}
if ($error == 0) {
    $array = $resultReport->fetch_assoc();
    $updates = array(
        "risultato" => ($error),
        "dataOra" => $array['dataOra'],
        "oggetto" => $array['oggetto'],
        "idReport" => $array['idReport'],
        "foto" => $array['foto'],
        "corpo" => $array['corpo'],
        "nome" => $array['nome'],
        "cognome" => $array['cognome'],
        "email" => $array['email']
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
