<?php
session_start();
require 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Smart Biking®</title>
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- load CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->

    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/smartCardStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Templatemo style -->
</head>

<body>

    <?php

    $query = "SELECT nome,cognome,statoRichiesta FROM gruppoCutente WHERE cf='" . $_SESSION['cf'] . "' "; //
    $result = mysqli_query($conn, $query);
    $numRighe = mysqli_num_rows($result);
    while ($array = $result->fetch_assoc()) {
        $statoRichiesta = $array['statoRichiesta'];
        $nome = $array['nome'];
        $cognome = $array['cognome'];
    }
    if ($statoRichiesta == 0) {
        $showStatoRichiesta = "Non Effetuata";
    } else if ($statoRichiesta != 2) {
        $showStatoRichiesta = "In Attesa di Conferma";
    }

    ?>

    <div class="wrapper d-flex align-items-stretch">
        <!-- Sidebar/menu -->
        <?php include 'menu.php'; ?>
        <div id="content" class="p-4 p-md-5 pt-5">
            <section id="sfondo">
                <h2>Smart Card</h2>
                <p style="font-style: italic;">Scomoda, Lenta & Inefficente</p>
                <ul class="actions special">
                    <?php
                    if ($statoRichiesta == 0) { ?>
                        <li><button onclick="inviaRichiesta('<?php echo $_SESSION['cf'] ?>');" style="display:block;margin-right:1em;" id="inviaRichiesta" class="button primary">Invia Richiesta</button></li>
                    <?php
                    }
                    ?>
                    <li>
                        <form action="https://youtu.be/uKtaNOUmfkQ" target="_blank"><button class="button" href="https://youtu.be/uKtaNOUmfkQ" target="_blank" rel="noopener noreferrer" class="button">Scopri di piu'</button></form>
                    </li>
                </ul>
                <div style="color: white;" id="risultato"></div>
            </section>
            <div class="contenitore">
                <section id="smart">
                    <?php
                    if ($statoRichiesta != 2) {
                        echo "<div class=\"validita\"><i if($statoRichiesta==0){ style=\"color: orange;\" }
                    class=\"fas fa-circle\"></i> Stato richiesta: <i id=\"showStatoRichiesta\" style=\"font-style: italic;\">" . $showStatoRichiesta . "</i></div>";
                    }
                    ?>
                </section>
                <section id="smart-33">
                    <div class="fette">
                        <img style="width:100%;height:auto;box-shadow:2px 2px 5px #000" src="img/smart-card-pic.jpg">
                    </div>
                    <div class="fette">
                        <?php
                        if ($statoRichiesta != 2) {     ?>
                            <div class="ginopino" style="background: #d1d1d1;box-shadow:none;border-color: #000;border-style: dashed;">
                                <!--<img src="img/logo.png" class="logo-card"><br>-->
                                <label id="loghetto"><strong>Smart<a style="color:#866ec7">Biking</a>®</strong></label><br>
                                <label>Codice Fiscale:</label><br>
                                <label style="font-size: 20px;">---</label><br>
                                <label>Nome e Cognome:</label>
                                <label><strong> --- ---</strong></label>
                                <label>Emissione:<strong> --/--/----</strong></label>
                                <label style="float:right">Scadenza:<strong> --/--/----</strong></label>
                            </div>
                        <?php   } else {
                            $query2 = "SELECT dataEmissione,dataScadenza FROM gruppoCsmartcard WHERE cf='" . $_SESSION['cf'] . "' ORDER BY dataEmissione DESC"; //
                            $result2 = mysqli_query($conn, $query2);
                            while ($array2 = $result2->fetch_assoc()) {
                                $dataEmissione = $array2['dataEmissione'];
                                $dataScadenza = $array2['dataScadenza'];
                            }
                        ?>
                            <div class="ginopino" data-tilt data-tilt-glare data-tilt-max-glare="0.45" data-tilt-scale="1.07">
                                <!--<img src="img/logo.png" class="logo-card"><br>-->
                                <label id="loghetto" style="transform: translateZ(20px)"><strong>Smart<a style="color:#866ec7">Biking</a>®</strong></label><br>
                                <label>Codice Fiscale:</label><br>
                                <label style="font-size: 20px;"><?php echo $_SESSION['cf'] ?></label><br>
                                <label>Nome e Cognome:</label>
                                <label><strong> <?php echo $nome . " " . $cognome ?></strong></label>
                                <label>Emissione:<strong> <?php echo $dataEmissione ?></strong></label>
                                <label style="float:right">Scadenza:<strong> <?php echo $dataScadenza ?></strong></label>
                            </div>
                        <?php   }   ?>
                    </div>
                    <div class="fette">
                        <h3>Migliora la tua esperienza</h3>
                        <p>Quisque ac neque lorem. In cursus ipsum eros. Ut finibus vel tellus sed mattis. Nunc facilisis justo lectus, vel ornare lorem lobortis id. Cras laoreet est ac erat lobortis faucibus. Curabitur a blandit lorem. Praesent pharetra viverra mi in commodo. Sed ut sagittis lorem. Integer id lectus lacinia, efficitur ante non, facilisis quam.</p>
                        <p>Maecenas eget accumsan risus. Fusce pulvinar turpis eros, vitae luctus ligula tristique vitae. Donec in feugiat lorem. Aliquam auctor, nunc sagittis efficitur lobortis, lorem orci ultrices nunc, in volutpat tortor leo et nibh. Aliquam erat volutpat. Fusce convallis quis sapien sed pulvinar. Ut nec aliquam nulla.</p>
                    </div>
                </section>
            </div>

            <!-- Footer -->
            <footer class="row mt-5 mb-5">
                <div class="col-lg-12">
                    <p class="text-center tm-text-gray tm-copyright-text mb-0">Copyright &copy;
                        <span class="tm-current-year">2021</span> Smart Biking®
                    </p>
                </div>
            </footer>
        </div>
    </div>


    <!-- .container -->

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/vanilla-tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelector(".ginopino"), {
            max: 25,
            speed: 400,
            glare: true,
            "max-glare": 1,
        });
    </script>
</body>

</html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8FMoY4gz60f4V55gKN1cjvkeAI6mRnfc"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script>
    function inviaRichiesta(cf) {
        var cf = cf;
        $.ajax({
            url: 'webservice/mailRichiestaTessera.php',
            type: "POST",
            data: {
                cf: cf
            },
            success: function(data) {
                const risultato = JSON.parse(data);
                if (risultato.risultato != 0) {
                    if (risultato.risultato == -2) {
                        $("#risultato").html("Errore, Richiesta gia' Effetuata");
                    } else {
                        $("#risultato").html("Errore");
                    }
                } else {
                    $("#risultato").html("Richiesta Effetuata con Successo, <p href\"https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox\" target=\"_blank\" rel=\"noopener noreferrer\">Controllla la tua casella di posta</p>");
                    $("#showStatoRichiesta").html("In Attesa di Conferma");
                    $("#inviaRichiesta").remove();
                }
            },
            error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown + "banana 2");
            }
        });
    }
</script>