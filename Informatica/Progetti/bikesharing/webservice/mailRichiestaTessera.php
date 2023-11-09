<?php
require '../db_connection.php';
use PHPMailer\PHPMailer\PHPMailer;
$error = 0; 
$result;
$status = "not sent";

if (isset($_REQUEST['cf'])) {
    $cf = $_REQUEST['cf'];

    $stmt = $conn->prepare('SELECT statoRichiesta FROM gruppoCutente WHERE cf = ? ');
    $stmt->bind_param('s', $cf); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $stmt->bind_result($statoRichiesta);
    $stmt->store_result();
    $num = $stmt->num_rows;
    while ($stmt->fetch()) {
        $statoRichiesta = $statoRichiesta;
    }

    if($num != 1){
        $error = -1; //cf non presente
        
    }else if ($statoRichiesta == 0) {
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

        $mail->Subject = 'Richiesta Tessera Ricevuta!';
        $message = '<html><body>';
        $message .= '<h1 style="color:#866ec6">Buone Notizie</h1><br>
            Salve,<b>' . $nome . ' ' . $cognome . '</b> la tua richiesta per ricevere la <b>Smart Card</b> è stata presa in considerazione,</br> riceverai aggiornamenti sull accettazione nei prossimi giorni!
            <br><br><i>Utleriori Informazioni su: http://www.appalo.it/5E/GruppoC/bikesharing/smartCard.php</i>';
        $message .= '</body></html>';
        $mail->Body = $message;

        if($mail->send()){//invio
            $status = "success"; 
        }else{
            $status = "failed";
        }

        //update stato richiesta
        $dataRichiesta = date("Y-m-d H:i:s");
        $queryCard = "UPDATE gruppoCutente SET statoRichiesta = '".$dataRichiesta."' WHERE cf = '" . $cf . "' ";
        $resultCard = mysqli_query($conn, $queryCard);
    } else if($statoRichiesta != 0 && $statoRichiesta != 2) {
        $error = -2; //era gia richiedente
    } else if ($statoRichiesta == 2) {
        $error = -3; //era gia richiedente
    }
} else {
    $error = -4; //credenziali non inserite
}
$updates = array(
    "risultato" => ($error),
    "mail" => ($status)
);
$arr[0] = array_map('utf8_encode', $updates);
echo json_encode($arr[0]);
