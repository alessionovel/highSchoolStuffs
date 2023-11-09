<?php
require '../db_connection.php';

if (isset($_REQUEST['cf'])) {
    $cf = $_REQUEST['cf'];

    $query = "SELECT indirizzo, saldo, cf, telefono, email, nome, cognome, ban FROM gruppoCutente WHERE cf = '" . $cf . "'";
    $result = mysqli_query($conn, $query);
    $array = $result->fetch_assoc();
    $cf = $array['cf'];
    $indirizzo = $array['indirizzo'];
    $saldo = $array['saldo'];
    $telefono = $array['telefono'];
    $email = $array['email'];
    $nome = $array['nome'];
    $cognome = $array['cognome'];
    $ban = $array['ban'];
}

?>

<script>
    function closePopUp() {
        $("#popUp").html("");
    }
</script>

<html>

<head>
    <link rel="stylesheet" href="css/popUpReportStyle.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<!--class="fas fa-times"-->

<body>
    <div class="container">
        <div class="details-modal">
            <div class="details-modal-close">

            </div>
            <div class=" details-modal-title">
                <h1>Oggetto: <strong id="oggetto">Dati Utente</strong>
                </h1>
            </div>
            <div class="details-modal-content">
                <p>
                    Nome: <strong id="nomeCognome"><?php echo $nome ?></strong><br>
                    Cognome: <strong id="nomeCognome"><?php echo $cognome ?></strong><br>
                    Codice fiscale: <strong id="nomeCognome"> <?php echo $cf ?></strong><br>
                    Saldo: <strong id="nomeCognome"><?php echo $saldo ?> €</strong><br>
                    Indirizzo: <strong id="nomeCognome"><?php echo $indirizzo ?></strong><br>
                    Telefono: <strong id="nomeCognome"><?php echo $telefono ?></strong><br>
                    <?php if ($ban == 1) { ?>
                        <br>BAN: <strong id="nomeCognome"><?php echo "UTENTE TEMPORANEMANTE BLOCCATO" ?></strong><br>
                    <?php } ?>
                <p id="corpo"></p>
                <strong id="data"></strong> <br>
                <strong><a href="<?php echo "https://mail.google.com/mail/u/0/?fs=1&to=" . $email . "&tf=cm" ?>" target="_blank" rel="noopener noreferrer" style="text-decoration:none;color:darkcyan">Contatta per E-mail</a></strong>
                </p>
                <button id="btnClose" style="z-index:100; float:right;" onclick="closePopUp();" class="fas fa-times"></button>
            </div>
            </details>
        </div>
</body>

</html>