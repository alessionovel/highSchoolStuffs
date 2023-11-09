<?php
require '../db_connection.php';
$error = 0;
$operazione = -1;
$result;


$query = "SELECT distinct extract(month from dataOraArrivo) as mese, COUNT(*) as noleggi FROM gruppoCnoleggio WHERE dataOraArrivo IS NOT NULL GROUP BY mese";
$resultNoleggi = mysqli_query($conn, $query);

if ($error == 0) {
    $i = 0;
    while ($array = mysqli_fetch_array($resultNoleggi)) {
        $arr[$i] =  $array['noleggi'];
        $i++;
    }
    $risultato = array("dati" => $arr, "tot" => $i );
    echo json_encode($risultato);
} else {
    $updates = array(
        "risultato" => ($error)
    );
    $arr[0] = array_map('utf8_encode', $updates);
    echo json_encode($arr[0]);
}
