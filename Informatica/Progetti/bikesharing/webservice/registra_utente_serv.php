<?php
require('../db_connection.php');
$error = 0;

if (isset($_REQUEST['email'])) {
    $nome = $_REQUEST['nome'];
    $cognome = $_REQUEST['cognome'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $cf = $_REQUEST['cf'];
    $indirizzo = $_REQUEST['indirizzo'];
    $telefono = $_REQUEST['telefono'];

    $stmt = $conn->prepare('SELECT * FROM gruppoCutente WHERE email = ? OR cf = ?');
    $stmt->bind_param('ss', $email, $cf); // 's' specifies the variable type => 'string'

    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num > 0) {
        $error = -1; //mail o cf gia presente
    }
    if ($error == 0) {
        $cryptedPW = password_hash($password, PASSWORD_DEFAULT); //criptazione password hash
        $qu = "INSERT into gruppoCutente VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($qu);

        $saldo = 0.0;
        $statoRichiesta = "0";
        $ban = 0;

        $stmt->bind_param("sssssssdsi", $cf, $nome, $cognome, $indirizzo, $telefono, $email, $cryptedPW, $saldo, $statoRichiesta, $ban);
        $stmt->execute();

        $updates = array(
            "risultato" => (0)
        );
        $arr[0] = array_map('utf8_encode', $updates);
        echo json_encode($arr[0]);
    }
} else {
    $error = -3; //mail non inserita
}
if ($error != 0) {
    $updates = array(
        "risultato" => ($error)
    );
    $arr[0] = array_map('utf8_encode', $updates);
    echo json_encode($arr[0]);
}
