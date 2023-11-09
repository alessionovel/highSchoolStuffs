<?php
require('../db_connection.php');
$error = 0;

if (isset($_REQUEST['cf']) || isset($_REQUEST['idSlot'])) {

    $cf = $_REQUEST['cf'];
    $idSlot = $_REQUEST['idSlot'];
    $disponibili = 0;

    $query = "SELECT idBici,idStazione,stato FROM gruppoCslot WHERE idSlot = $idSlot";
    $result = mysqli_query($conn, $query);

    $queryUtente = "SELECT ban FROM gruppoCutente WHERE cf = '" . $cf . "'";
    $resultUtente = mysqli_query($conn, $queryUtente);
    while ($array2 = $resultUtente->fetch_assoc()) {
        $ban = $array2['ban'];
    }
    while ($array = $result->fetch_assoc()) {
        $idBici = $array['idBici'];
        $idStazione = $array['idStazione'];
        $stato = $array['stato'];
    }
    if ($ban == 0) {
        if ($stato != 0) {
            if ($idBici != 0) {
                $url = 'https://io.adafruit.com/api/v2/xx_Angelo_xx/feeds/stazione-' . $idStazione . '/data/';
                $ch = curl_init($url);
                $data = array("value" => $idSlot);

                $json = json_encode($data);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-AIO-Key:aio_YePk05bGS5BDPXIoh4vbbjWqsbRv', 'Content-Type:application/json'));
                $result = curl_exec($ch);
                //echo "<br>" . $result;
                curl_close($ch);
                $error = 0;
                $query3 = "SELECT indirizzo FROM gruppoCstazione WHERE idStazione = '" . $idStazione . "'";
                $result3 = mysqli_query($conn, $query3);
                $nomeStazione = $result3->fetch_assoc()['indirizzo'];
            } else {
                $error = -1; //slot senza bici
            }
        } else {
            $error = -5; //slot rotto
        }
    } else {
        $error = -6; //utente bannato
    }
} else {
    $output = -3; //dati non inseriti
}
if ($error == 0) {
    $dataOra = date("Y-m-d H:i:s");
    $query = "INSERT INTO gruppoCnoleggio (dataOraPartenza, stazionePartenza, cf, idBici) VALUES ( '" . $dataOra . "', $idStazione, $cf,$idBici);";
    $result = mysqli_query($conn, $query);

    $query = "UPDATE gruppoCslot SET idBici = 0 WHERE idSlot = $idSlot";
    $result = mysqli_query($conn, $query);



    $updates = array(
        "risultato" => ($error),
        "bici" => ($idBici),
        "stazione" => ($nomeStazione)
    );
} else {
    $updates = array(
        "risultato" => ($error),
    );
}
$arr[0] = array_map('utf8_encode', $updates);
echo json_encode($arr[0]);
