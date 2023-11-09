<?php
require '../db_connection.php';
use PHPMailer\PHPMailer\PHPMailer;
$error = 0;
$operazione = -1;
$result;
$status = "not sent";

if (isset($_REQUEST['cf'])) {
    $cf = $_REQUEST['cf'];
    $somma = $_REQUEST['somma'];
    if($somma < 0){
        $somma = $somma*-1;
    }

    $stmt = $conn->prepare('SELECT * FROM gruppoCutente WHERE cf = ? ');
    $stmt->bind_param('s', $cf); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num == 1) {
        $query = "SELECT email, nome, cognome, saldo FROM gruppoCutente WHERE cf = '" . $cf . "'";
        $resultUtente = mysqli_query($conn, $query);
        $array = $resultUtente->fetch_assoc();
        $email = $array['email'];
        $nome = $array['nome'];
        $cognome = $array['cognome'];
        $saldoAttuale = $array['saldo'];

        $query = "UPDATE gruppoCutente SET saldo = $saldoAttuale+$somma WHERE cf = '" . $cf . "'";
        $resultUpdate = mysqli_query($conn, $query);

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

        $mail->Subject = 'Ricarica Avvenuta con Successo!';
        $message = '<html><body>';
        $message .= '<h1 style="color:#866ec6">Ricarica Avvenuta con Successo</h1><br><br>
            Salve,<b>' . $nome . ' ' . $cognome . '</b> la tua ricarica di <b>' . $somma . '€ </b> al tuo saldo è avvenuta con successo <br>';
        $message .= '</body></html>';
        $mail->Body = $message;

        if($mail->send()){//invio
            $status = "success"; 
        }else{
            $status = "failed";
        }
    } else {
        $error = -1; //cf non presente
    }
} else {
    $error = -3; //credenziali non inserite
}
if ($error == 0) {
    $updates = array(
        "risultato" => ($error),
        "sommaCaricata" => $somma,
        "saldoAttuale" => $somma + $saldoAttuale
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
