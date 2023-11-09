<?php
require '../db_connection.php';
$error = 0;
$operazione = -1;
$result;

if (isset($_REQUEST['idRegione'])) {
    $idRegione = $_REQUEST['idRegione'];

    $stmt = $conn->prepare('SELECT idProvincia,nome,sigla FROM gruppoCutente WHERE cf = ? ');
    $stmt->bind_param('s', $cf); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

     
        $query = "SELECT dataOraPartenza, dataOraArrivo,stazionePartenza,stazioneArrivo,costoViaggio FROM gruppoCnoleggio WHERE cf = '" . $cf . "'";
        $resultNoleggio = mysqli_query($conn, $query);
        if (mysqli_num_rows($resultNoleggio) == 0) {
            $error = -4; //non aveva noleggi
        }
        
    
} else {
    $error = -3; //credenziali non inserite
}
if ($error == 0) {
    $i = 0;
    while ($array = mysqli_fetch_array($resultNoleggio)) {
        $query = "SELECT indirizzo FROM gruppoCstazione WHERE idStazione = '" . $array['stazionePartenza'] . "'";
        $resultPartenza = mysqli_query($conn, $query);
        $partenza = $resultPartenza->fetch_assoc()['indirizzo'];
        $query2 = "SELECT indirizzo FROM gruppoCstazione WHERE idStazione = '" . $array['stazioneArrivo'] . "'";
        $resultArrivo = mysqli_query($conn, $query2);
        $arrivo = $resultArrivo->fetch_assoc()['indirizzo'];

        $dataOraPartenza = $array['dataOraPartenza'];
        $dataOraArrivo = $array['dataOraArrivo'];
        $to_time = strtotime($dataOraArrivo);
        $from_time = strtotime($dataOraPartenza);
        $tempo = round(abs($to_time - $from_time) , 2);
        $costoViaggio = round(($tempo * 0.001),2);

        if ($arrivo == null) {
            $dataOra = date("Y-m-d H:i:s");
            $arrivo = "In Corso...";
            $dataOraArrivo = "In Corso...";
            $to_time = strtotime($dataOra);
            $from_time = strtotime($dataOraPartenza);
            $tempo = round(abs($to_time - $from_time) , 2);
            $costoViaggio = round(($tempo * 0.001),2);
        }
       

        $updates = array(
            "dataOraPartenza" => $array['dataOraPartenza'],
            "dataOraArrivo" => $dataOraArrivo,
            "stazionePartenza" => $partenza,
            "stazioneArrivo" => $arrivo,
            "costoViaggio" => $costoViaggio,
            "tempo" => $tempo
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
