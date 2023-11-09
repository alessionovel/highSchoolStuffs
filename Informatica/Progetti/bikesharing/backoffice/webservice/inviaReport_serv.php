<?php
require('../db_connection.php');
$error = 0;

if (isset($_REQUEST['cf']) and isset($_REQUEST['oggetto']) and isset($_REQUEST['corpo'])) {

    $cf = $_REQUEST['cf'];
    $oggetto = $_REQUEST['oggetto'];
    $corpo = $_REQUEST['corpo'];
    $imgPath = "enrico.jpg";

    $queryUtente = "SELECT cf FROM gruppoCutente WHERE cf = '" . $cf . "'";
    $resultUtente = mysqli_query($conn, $queryUtente);
    $num = mysqli_num_rows($resultUtente);
    if ($num == 1) {
        $dataOra = date("Y-m-d H:i:s");
        $foto = "img/reports/".$imgPath ;
        $query = "INSERT INTO gruppoCreport (cf, foto, oggetto, corpo, dataOra) VALUES ( '" . $cf . "','" . $foto . "','" . $oggetto . "','" . $corpo . "','" . $dataOra . "');";
        $result = mysqli_query($conn, $query);

        $updates = array(
            "risultato" => ($error),
            "oggetto" => ($oggetto),
            "corpo" => ($corpo),
            "dataOra" => ($dataOra)
        );
    } else{
        $error = -1;//cf non prsente
    }
}else{
    $error = -3;
}
if($error !=0 ) {
    $updates = array(
        "risultato" => ($error),
    );
}
$arr[0] = array_map('utf8_encode', $updates);
echo json_encode($arr[0]);
