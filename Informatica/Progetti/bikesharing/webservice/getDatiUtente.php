<?php
require '../db_connection.php';
$error = 0;
$operazione = -1;

if (isset($_REQUEST['cf'])) {
    $cf = $_REQUEST['cf'];

    $query = "SELECT nome,cognome,indirizzo,telefono,email FROM gruppoCutente WHERE cf = '" . $cf . "'";
    $resultDati = mysqli_query($conn, $query);
    if (mysqli_num_rows($resultDati) == 0) {
        $error = -1; //non cerano noleggi con quel id bici
    }
} else {
    $error = -3; //id non inserite
}
if ($error == 0) {
    while ($array = mysqli_fetch_array($resultDati)) {
        $updates = array(
            "risultato" => ($error),
            "nome" => $array['nome'],
            "cognome" => $array['cognome'],
            "indirizzo" => $array['indirizzo'],
            "telefono" => $array['telefono'],
            "email" => $array['email']
        );
        $arr[0] = array_map('utf8_encode', $updates);
    }
    echo json_encode($arr[0]);
} else {
    $updates = array(
        "risultato" => ($error)
    );
    $arr[0] = array_map('utf8_encode', $updates);
    echo json_encode($arr[0]);
}