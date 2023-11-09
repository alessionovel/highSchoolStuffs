<?php
require '../db_connection.php';
$error = 0;


if (isset($_REQUEST['cf']) && isset($_REQUEST['tipoDato']) && isset($_REQUEST['nuovoDato'])) {
    $tipoDato = $_REQUEST['tipoDato'];
    $nuovoDato = $_REQUEST['nuovoDato'];
    $cf = $_REQUEST['cf'];

    $query = "SELECT cf, password FROM gruppoCutente WHERE cf = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $cf); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $stmt->bind_result($cf, $passwordInDB);
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num == 1) {
        if($tipoDato==1){ //nome
            $query = "UPDATE gruppoCutente SET nome = $nuovoDato WHERE cf = '" . $cf . "'";
            $result = mysqli_query($conn, $query);
            $dato = "Nome";
        }else if($tipoDato == 2){ //cognome
            $query = "UPDATE gruppoCutente SET cognome = $nuovoDato WHERE cf = '" . $cf . "'";
            $result = mysqli_query($conn, $query);
            $dato = "Cognome";
        } else if ($tipoDato == 3) { //email
            $query = "UPDATE gruppoCutente SET email = $nuovoDato WHERE cf = '" . $cf . "'";
            $result = mysqli_query($conn, $query);
            $dato = "Indirizzo E-Mail";
        } else if ($tipoDato == 4) { //indirizzo
            $query = "UPDATE gruppoCutente SET indirizzo = $nuovoDato WHERE cf = '" . $cf . "'";
            $result = mysqli_query($conn, $query);
            $dato = "Indirizzo";
        } else if ($tipoDato == 5) { //telefono
            $query = "UPDATE gruppoCutente SET telefono = $nuovoDato WHERE cf = '" . $cf . "'";
            $result = mysqli_query($conn, $query);
            $dato = "Num. di Telefono";
        }

        $updates = array(
            "risultato" => (0),
            "dato" => ($dato)
        );
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
