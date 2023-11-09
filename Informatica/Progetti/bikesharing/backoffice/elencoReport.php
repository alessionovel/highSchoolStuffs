<?php
require '../db_connection.php';
$error = 0;
$operazione = -1;
$result;

$stmt = $conn->prepare('SELECT idReport FROM gruppoCreport');
$stmt->execute();
$stmt->store_result();
$num = $stmt->num_rows;

if ($num > 0 ) {
    $query = "SELECT dataOra, oggetto, idReport,nome,cognome FROM gruppoCreport,gruppoCutente WHERE gruppoCutente.cf=gruppoCreport.cf ORDER BY dataOra";
    $resultReport = mysqli_query($conn, $query);
} else {
    $error = -1; //nessun report
}

if ($error == 0) {
    $i = 0;
    while ($array = mysqli_fetch_array($resultReport)) {
        $updates = array(
            "risultato" => ($error),
            "dataOra" => $array['dataOra'],
            "oggetto" => $array['oggetto'],
            "nome" => $array['nome'],
            "cognome" => $array['cognome'],
            "idReport" => $array['idReport'],
        );
        $arr[$i] = array_map('utf8_encode', $updates);
        $i++;
    }

    $risultato = array(
        "risultato" => ($error),
        "dati" => $arr
    );
    echo json_encode($risultato);
} else {
    $updates = array(
        "risultato" => ($error)
    );
    $arr[0] = array_map('utf8_encode', $updates);
    echo json_encode($arr[0]);
}
