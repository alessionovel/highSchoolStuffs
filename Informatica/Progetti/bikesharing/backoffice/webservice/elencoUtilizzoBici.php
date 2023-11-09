<?php
require '../db_connection.php';
$error = 0;
$operazione = -1;
$result;

if (isset($_REQUEST['idBici'])) {
    $idBici = $_REQUEST['idBici'];

    $query = "SELECT gruppoCnoleggio.cf,dataOraArrivo,gruppoCutente.nome,gruppoCutente.cognome 
    FROM gruppoCnoleggio,gruppoCutente WHERE idBici = '".$idBici."' AND gruppoCnoleggio.cf = gruppoCutente.cf order by  dataOraArrivo DESC";
    $resultNoleggi = mysqli_query($conn, $query);
    if (mysqli_num_rows($resultNoleggi) == 0) {
        $error = -1; //non cerano noleggi con quel id bici
    }
} else {
    $error = -3; //id non inserite
}
if ($error == 0) {
    $i = 0;
    while ($array = mysqli_fetch_array($resultNoleggi)) {
        $updates = array(
            "risultato" => ($error),
            "dataOraRestituzione" => $array['dataOraArrivo'],
            "cf" => $array['cf'],
            "nome" => $array['nome'],
            "cognome" => $array['cognome']
        );
        $arr[$i] = array_map('utf8_encode', $updates);
        $i++;
    }
    $risultato = array($arr);
    echo json_encode($risultato);
} else {
    $updates = array(
        "risultato" => ($error)
    );
    $arr[0] = array_map('utf8_encode', $updates);
    echo json_encode($arr[0]);
}
