<?php
require '../db_connection.php';
$error = 0;
$modifiche=0;


if (isset($_REQUEST['cf']) && isset($_REQUEST['nome']) && isset($_REQUEST['cognome']) && isset($_REQUEST['indirizzo'])  && isset($_REQUEST['telefono']) && isset($_REQUEST['email'])) {
    $cf = $_REQUEST['cf'];
    $nomeNew = $_REQUEST['nome'];
    $cognomeNew = $_REQUEST['cognome'];
    $indirizzoNew = $_REQUEST['indirizzo'];
    $telefonoNew = $_REQUEST['telefono'];
    $emailNew = $_REQUEST['email'];

    $query = "SELECT nome, cognome, indirizzo, telefono, email FROM gruppoCutente WHERE cf = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $cf); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $stmt->bind_result($nome, $cognome, $indirizzo, $telefono, $email);
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt->fetch();

    if ($num == 1) {
        if($nomeNew!=$nome){ //nome
            $query = "UPDATE gruppoCutente SET nome = '" . $nomeNew . "' WHERE cf = '" . $cf . "'";
            $result = mysqli_query($conn, $query);
            $modifiche=1;
        }
        if($cognomeNew!=$cognome){ //cognome
            $query = "UPDATE gruppoCutente SET cognome = '" . $cognomeNew . "' WHERE cf = '" . $cf . "'";
            $result = mysqli_query($conn, $query);
            $modifiche=1;
        }
        if ($emailNew!=$email) { //email
            $query = "UPDATE gruppoCutente SET email = '" . $emailNew . "' WHERE cf = '" . $cf . "'";
            $result = mysqli_query($conn, $query);
            $modifiche=1;
        }
        if ($indirizzoNew!=$indirizzo) { //indirizzo
            $query = "UPDATE gruppoCutente SET indirizzo = '" . $indirizzoNew . "' WHERE cf = '" . $cf . "'";
            $result = mysqli_query($conn, $query);
            $modifiche=1;
        }
        if ($telefonoNew!=$telefono) { //telefono
            $query = "UPDATE gruppoCutente SET telefono = '" . $telefonoNew . "' WHERE cf = '" . $cf . "'";
            $result = mysqli_query($conn, $query);
            $modifiche=1;
        }
        
        $updates = array(
            "risultato" => (0),
            "modifiche" => ($modifiche)// per saperese se haa modificato qualche dato personale
        );
    } else {
        $error = -2; //cf non presente
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
