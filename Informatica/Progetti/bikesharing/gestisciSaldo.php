<!DOCTYPE html>
<html lang="en">

<head>
    <title>Smart Biking® - Gestione Saldo</title>
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- load CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/bodyStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/saldo-style.css">
    <!-- Templatemo style -->
</head>

<?php

?>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <!-- Sidebar/menu -->
        <?php include 'menu.php'; ?>

        <div id="content" class="p-4 p-md-5 pt-5">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <header class="text-center tm-site-header">
                            <img src="img/logo.png" alt="" style="height:45px;">
                            <h1 id="mappa" class="pl-4 tm-site-title">Gestione Saldo</h1>
                        </header>
                    </div>
                </div>
                <form id="paga" action="">
                    <div class="group card-name">
                        <label for="name" style="font-size:30px; color:#866ec7; text-shadow: 0 0 5px 5px #CCCCCC;">SALDO ATTUALE: <a style="font-weight:bold" id="saldo-attuale"></a> €</label><br>
                        <label for="name">Inserisci la somma da Caricare</label><br>
                        <input type="number" id="amount" class="payment_amount" type="text" placeholder="Inserisci Somma" required>
                        €
                    </div>
                    <div class="wrapper" style="background-color: white !important; width:800px; border: 1px solid #CCCCCC;padding: 10px;box-shadow: 3px 3px 10px #000">
                        <div class="container">
                            <article class="part card-details">
                                <h1>
                                    <b>Dettagli Carta di Credito</b>
                                </h1>
                                <div class="form" action="" if="cc-form" autocomplete="off" id="dati-carta">
                                    <div class="group card-number">
                                        <label for="first">Numero sulla Carta</label>
                                        <input type="text" required id="first" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;">
                                        <input type="text" required id="second" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;">
                                        <input type="text" required id="third" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;">
                                        <input type="text" required id="fourth" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;">
                                    </div>
                                    <div class="group card-name">
                                        <label for="name">Nome sulla Carta</label>
                                        <input type="text" required id="name" class="" type="text" maxlength="20" placeholder="Nome e Cognome">
                                    </div>
                                    <div class="group card-expiry">
                                        <div class="input-item expiry">
                                            <label for="expiry">Data di Scadenza</label>
                                            <input type="text" required class="month" id="expiry" placeholder="02">
                                            <input type="text" required class="year" id="" placeholder="2017">
                                        </div>
                                        <div class="input-item csv">
                                            <label for="csv">CCV.</label><a href="#what">?</a>
                                            <input type="text" required class="csv">
                                        </div>
                                    </div>
                                    <div class="grup submit-group">
                                        <span class="arrow"></span>
                                        <button type="submit" class="button_payment" value="PAGA" id="btnPaga">PAGA</button>
                                    </div>
                                </div>
                            </article>
                </form>
                <div class="part bg" style="background-color: aqua; width: 200px"></div>
            </div>
        </div>
        <label id="risultato" style="font-size:20px; color:#866ec7; text-shadow: 0 0 5px 5px #CCCCCC;"></label><br>

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
    <script type="text/javascript">
        $(".cc-num").keyup(function() {
            if (this.value.length == this.maxLength) {
                var $next = $(this).next('.cc-num');
                if ($next.length)
                    $(this).next('.cc-num').focus();
                else
                    $(this).blur();
            }
        });
        $('.cc-num').on("focusin", function() {
            $('.cc-num').attr('type', 'password')
            $(this).attr('type', 'text');
            $('.card-number').addClass('focused');
        });
        $('.cc-num').on("focusout", function() {
            $('.card-number').removeClass('focused');
        });
        $('.dropdown').click(function() {
            $(this).next('ul').stop().slideToggle();
            $(this).toggleClass('selected');
        });
        $('.card-number').on('keydown', '.cc-num', function(e) {
            -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/.test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
        });
        $('.submit').hover(function() {
            $('.arrow').addClass('rotate');
        }, function() {
            $('.arrow').removeClass('rotate');
        });
        $('.part.bg').mousemove(function(e) {
            var amountMovedX = (e.pageX * -1 / 30);
            var amountMovedY = (e.pageY * -1 / 9);
            $(this).css('background-position', amountMovedX + 'px ' + amountMovedY + 'px');
        });
    </script>
</body>

</html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8FMoY4gz60f4V55gKN1cjvkeAI6mRnfc"></script>


<script>
    $(document).ready(function() {
        $.ajax({
            url: 'webservice/getSaldo.php',
            type: "POST",
            data: {
                cf: <?php echo $_SESSION['cf'] ?>,
            },
            success: function(data) {
                const risultato = JSON.parse(data);
                $("#saldo-attuale").html(risultato.risultato);
            },
            error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown + "banana 2");
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#paga').on('submit', function(e) {
            e.preventDefault();
            var somma = document.getElementById("amount").value;
            var cf = <?php echo $_SESSION['cf'] ?>;
            $.ajax({
                url: 'webservice/caricaSoldi_serv.php',
                type: "POST",
                data: {
                    somma: somma,
                    cf: cf
                },
                success: function(data) {
                    const risultato = JSON.parse(data);
                    if (risultato.risultato != 0) {
                        $("#risultato").html("Errore");
                    } else {
                        $("#risultato").html("Somma caricata con successo: <strong>" + risultato.sommaCaricata + "</strong> €");
                        $("#saldo-attuale").html(risultato.saldoAttuale);
                        $("#dati-carta").load(window.location.href + " #dati-carta");
                    }
                },
                error: function(jXHR, textStatus, errorThrown) {
                    alert(errorThrown + "banana 2");
                }
            });
        });
    });
</script>
