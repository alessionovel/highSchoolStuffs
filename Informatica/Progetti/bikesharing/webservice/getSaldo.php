<?php
require '../db_connection.php';
$error = 0;
$operazione = -1;

if (isset($_REQUEST['cf'])) {
    $cf = $_REQUEST['cf'];

    $stmt = $conn->prepare('SELECT * FROM gruppoCutente WHERE cf = ? ');
    $stmt->bind_param('s', $cf); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num == 1) {
        $query = "SELECT saldo FROM gruppoCutente WHERE cf = '" . $cf . "'";
        $resultSaldo = mysqli_query($conn, $query);
        $operazione = $resultSaldo->fetch_assoc()['saldo'];
    } else {
        $error = -1; //cf non presente
    }
} else {
    $error = -3; //credenziali non inserite
}
if ($error == 0) {
    $updates = array(
        "risultato" => ($operazione)
    );
    $arr[0] = array_map('utf8_encode', $updates);
    echo json_encode($arr[0]);
} else {
    $updates = array(
        "risultato" => ($error)
    );
    $arr[0] = array_map('utf8_encode', $updates);
    echo json_encode($arr[0]);
}
