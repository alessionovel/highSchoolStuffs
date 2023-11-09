<?php
require '../db_connection.php';

if (isset($_REQUEST['idReport'])) {
    $idReport = $_REQUEST['idReport'];

    $query = "SELECT email,foto FROM gruppoCreport,gruppoCutente WHERE idReport = '" . $idReport . "' AND gruppoCreport.cf = gruppoCutente.cf  ";
    $result = mysqli_query($conn, $query);
    $array = $result->fetch_assoc();
    $email = $array['email'];
    $path = $array['foto'];
}

?>

<script>
    $(document).ready(function() {

        var idReport = <?php echo $idReport; ?>;
        $.ajax({
            url: 'webservice/getSingoloReport.php',
            type: "POST",
            data: {
                idReport: idReport
            },
            success: function(data) {
                const risultato = JSON.parse(data);
                $("#oggetto").html(risultato.oggetto);
                $("#nomeCognome").html(risultato.nome + " " + risultato.cognome);
                $("#corpo").html(risultato.corpo);
                $("#data").html("Data e Ora: " + risultato.dataOra);

            },
            error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown + "banana 2");
            }
        });
    });
</script>

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
                <h1>Oggetto: <strong id="oggetto"></strong>
                </h1>
            </div>
            <div class="details-modal-content">
                <p>
                    Messaggio dall'utente: <strong id="nomeCognome"></strong><br><br>
                <p id="corpo"></p>
                <center><img id="allegato" src="<?php echo $path ?>" alt="allegato" style="width:300px;box-shadow:2px 2px 7px #000" /></center>
                <br>
                <strong id="data"></strong> <br>
                <strong><a href="<?php echo "https://mail.google.com/mail/u/0/?fs=1&to=" . $email . "&tf=cm" ?>" target="_blank" rel="noopener noreferrer" style="text-decoration:none;color:darkcyan">Contatta per E-mail</a></strong>
                </p>
                <button id="btnClose" style="z-index:100; float:right;" onclick="closePopUp();" class="fas fa-times"></button>
            </div>
            </details>
        </div>
</body>

</html>