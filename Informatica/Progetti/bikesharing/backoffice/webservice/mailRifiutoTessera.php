<?php
require '../db_connection.php';
use PHPMailer\PHPMailer\PHPMailer;

$error = 0; //l utente era richiedente e il cf esisteva davvero
$result;
$status = "not sent";


if (isset($_REQUEST['cf'])) {
    $cf = $_REQUEST['cf'];
    $motivazione = $_REQUEST['motivazione'];

    $stmt = $conn->prepare('SELECT statoRichiesta FROM gruppoCutente WHERE cf = ? ');
    $stmt->bind_param('s', $cf); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $stmt->bind_result($statoRichiesta);
    $stmt->store_result();
    $num = $stmt->num_rows;
    while ($stmt->fetch()) {
        $statoRichiesta = $statoRichiesta;
    }

    if ($num != 1) {
        $error = -1;
    } else if ($statoRichiesta != 0 && $statoRichiesta != 2) {
        $query = "SELECT email, nome, cognome FROM gruppoCutente WHERE cf = '" . $cf . "'";
        $resultUtente = mysqli_query($conn, $query);
        $array = $resultUtente->fetch_assoc();
        $email = $array['email'];
        $nome = $array['nome'];
        $cognome = $array['cognome'];

        require_once 'PHPMailer/PHPMailer.php';
        require_once 'PHPMailer/SMTP.php';
        require_once 'PHPMailer/Exception.php';
        $mail = new PHPMailer(); //link al mailer che permette di usare gmail
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "smartbiking.co@gmail.com";
        $mail->Password = "Smartbiking69";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        $mail->isHTML(true);
        $mail->setFrom("smartbiking.co@gmail.com");
        $mail->addAddress($email);

        $mail->Subject = 'Richiesta Tessera Rifiutata.';
        $message = '<html><body>';
        $message .= '<h1 style="color:#866ec6">Brutte Notizie!</h1><br>
            Salve,<b>' . $nome . ' ' . $cognome . '</b> la richiesta per la tua <b>Smart Card</b> e stata <br>rifiutata</br>, per la seguente motivazione:<br>'.$motivazione.'
            <br><br><i>Utleriori Informazioni su: http://www.appalo.it/5E/GruppoC/bikesharing/smartCard.php</i>';
        $message .= '</body></html>';
        $mail->Body = $message;

        if ($mail->send()) { //invio
            $status = 0;
        } else {
            $status = -1;
        }

        //update stato richiesta
        $queryCard = "UPDATE gruppoCutente SET statoRichiesta = 0 WHERE cf = '" . $cf . "' ";
        $resultCard = mysqli_query($conn, $queryCard);

    } else {
        $error = -2; //non era richidente
    }
} else {
    $error = -3; //credenziali non inserite
}
$updates = array(
    "risultato" => ($error),
    "mailStatus" => ($status),
    "indirizzo" => ($email)
);
$arr[0] = array_map('utf8_encode', $updates);
echo json_encode($arr[0]);