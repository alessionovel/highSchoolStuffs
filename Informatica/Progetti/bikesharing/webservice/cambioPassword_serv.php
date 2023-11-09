<?php
require '../db_connection.php';
$error = 0;


if (isset($_REQUEST['cf']) && isset($_REQUEST['vecchiaPw']) && isset($_REQUEST['nuovaPw'])) {
    $vecchiaPw = $_REQUEST['vecchiaPw'];
    $nuovaPw = $_REQUEST['nuovaPw'];
    $cf = $_REQUEST['cf'];

    $query = "SELECT cf, password FROM gruppoCutente WHERE cf = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $cf); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $stmt->bind_result($cf, $passwordInDB);
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt->fetch();
    //echo "-".$passwordInDB."-";

    if ($num == 1) {
        if (password_verify($vecchiaPw, $passwordInDB)) {
            if (!password_verify($nuovaPw, $passwordInDB)) {         //verifica se la password cryptata nel database associata al cf è uguale alla passord cryptata inserita al momento del login
                $cryptedPW = password_hash($nuovaPw, PASSWORD_DEFAULT); //criptazione password hash
                $query = "UPDATE gruppoCutente SET password = '" . $cryptedPW . "' WHERE cf = '" . $cf . "'";
                $result = mysqli_query($conn, $query);
                $updates = array(
                    "risultato" => (0)
                );
            }else
            $error = -4; // la nuova password corrisponde a quella vecchia
        } else {
            $error = -1; //password vecchia errata
        }
    } else {
        $error = -2; //mail non presente
    }
} else {
    $error = -3; //credenziali non inserite
}
if ($error != 0) {
    $updates = array(
        "risultato" => ($error)
    );
}
$arr[0] = array_map('utf8_encode', $updates);

echo json_encode($arr[0]);
