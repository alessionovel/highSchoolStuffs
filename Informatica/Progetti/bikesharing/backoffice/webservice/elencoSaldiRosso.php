<?php
require '../db_connection.php';
$error = 0;
$operazione = -1;
$result;

$stmt = $conn->prepare('SELECT cf FROM gruppoCutente WHERE saldo < 0 ORDER BY saldo');
$stmt->execute();
$stmt->store_result();
$num = $stmt->num_rows;

if ($num > 0 ) {
    $query = "SELECT cf, saldo, nome, cognome, ban FROM gruppoCutente WHERE saldo < 0 OR ban = 1 ORDER BY saldo";
    $resultReport = mysqli_query($conn, $query);
} else {
    $error = -1; //nessun report
}

if ($error == 0) {
    $i = 0;
    while ($array = mysqli_fetch_array($resultReport)) {
        $updates = array(
            "cf" => $array['cf'],
            "saldo" => $array['saldo'],
            "nome" => $array['nome'],
            "cognome" => $array['cognome'],
            "ban" => $array['ban']
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
