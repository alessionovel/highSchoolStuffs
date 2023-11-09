<?php
require '../db_connection.php';
$error = 0;
$operazione = -1;
$result;
if (isset($_REQUEST['cf'])) {
}

$query = "SELECT cf, nome, cognome, statoRichiesta FROM gruppoCutente WHERE statoRichiesta!=0 AND statoRichiesta!=2 ORDER BY statoRichiesta";
$resultNoleggi = mysqli_query($conn, $query);
if (mysqli_num_rows($resultNoleggi) == 0) {
    $error = -1; //non cerano richiesta 
}

if ($error == 0) {
    $i = 0;
    while ($array = mysqli_fetch_array($resultNoleggi)) {
        $updates = array(
            "dataRichiesta" => $array['statoRichiesta'],
            "cf" => $array['cf'],
            "nome" => $array['nome'],
            "cognome" => $array['cognome'],
            "cf" => $array['cf']
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
