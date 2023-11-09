<?php
session_start();
require '../db_connection.php';
$error = 0;

if (isset($_REQUEST['email']) && isset($_REQUEST['cf'])) {
    $email = $_REQUEST['email'];
    $cf = $_REQUEST['cf'];

    $query = "SELECT cf FROM gruppoCutente WHERE email = ? || cf= ? ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $email,$cf); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $stmt->bind_result($cf);
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num != 0) {
        $error = -1;//utente gia presente (email o cf gia registrati)
    } else {
        $error = 0; //utente giustamente non presente
    }
} else {
    $error = -3; //credenziali non inserite
}
$updates = array(
    "risultato" => ($error)
);

$arr[0] = array_map('utf8_encode', $updates);
echo json_encode($arr[0]);
