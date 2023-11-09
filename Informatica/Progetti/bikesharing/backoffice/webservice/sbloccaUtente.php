<?php
require '../db_connection.php';
$error = 0;
$operazione = -1;
$result;

if (isset($_REQUEST['cf'])) {
    $cf = $_REQUEST['cf'];

    $query = "UPDATE gruppoCutente SET ban = 0 WHERE cf = '" . $cf . "'";
    $result = mysqli_query($conn, $query);
    
} else {
    $error = -3; //id non inserite
}

$updates = array(
    "risultato" => ($error)
);

$arr[0] = array_map('utf8_encode', $updates);
echo json_encode($arr[0]);
