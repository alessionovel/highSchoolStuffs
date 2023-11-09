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
    <link rel="stylesheet" href="css/profiloUtente.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Templatemo style -->
</head>

<body>
    <?php
    $query = "SELECT nome,cognome,email,telefono,indirizzo FROM gruppoCutente WHERE cf='" . $_SESSION['cf'] . "' "; //
    $result = mysqli_query($conn, $query);
    while ($array = $result->fetch_assoc()) {
        $nome = $array['nome'];
        $cognome = $array['cognome'];
        $email = $array['email'];
        $telefono = $array['telefono'];
        $indirizzo = $array['indirizzo'];
    }
    ?>

    <div class="wrapper d-flex align-items-stretch">
        <!-- Sidebar/menu -->
        <?php include 'menu.php'; ?>
        <script>
            $('#sidebar').removeClass('active');
        </script>
        <div id="content" class="p-4 p-md-5 pt-5">
            <section id="contenitore_profilo">
                <div id="textbox" style="width: 100%;height:25%;" >
                    <p class="alignleft" style="color: white;font-weight:bold;font-size:24px;padding:0%">PROFILO</p>
                    <button type="button" onclick="change()" id="myButton2" class="alignright">Modifica Profilo</button>
                    <button onclick="change()" id="myButtonAnnulla" class="alignright">Annulla</button>
                </div>
                <section id="datiPersonali">
                    <div class="dati">
                        <div class="nomeDati">
                            <label>Nome</label>
                        </div>
                        <div class="valoreDati">
                            <input id="myInput1" minlength="1" type="text" readonly="readonly" required />
                        </div>
                    </div>
                    <div class="dati">
                        <div class="nomeDati">
                            <label>Cognome</label>
                        </div>
                        <div class="valoreDati">
                            <input id="myInput2" type="text" readonly="readonly" required />
                        </div>
                    </div>
                    <div class="dati">
                        <div class="nomeDati">
                            <label>Indirizzo</label>
                        </div>
                        <div class="valoreDati">
                            <input id="myInput3" type="text" readonly="readonly" required />
                        </div>
                    </div>
                    <div class="dati">
                        <div class="nomeDati">
                            <label>Telefono</label>
                        </div>
                        <div class="valoreDati">
                            <input id="myInput4" maxlength="10" type="number" readonly="readonly" required />
                        </div>
                    </div>
                    <div class="dati">
                        <div class="nomeDati">
                            <label>Email</label>
                        </div>
                        <div class="valoreDati">
                            <input id="myInput5" type="email" readonly="readonly" required />
                        </div>
                    </div>
                    <div class="dati">
                        <div class="nomeDati">
                            <label>Password</label>
                        </div>
                        <div class="valoreDati">
                            <input id="myInput6" type="text" readonly="readonly" placeholder="Password Attuale" />
                        </div>
                    </div>
                    <div class="dati" id="dati" hide>
                        <div class="nomeDati">
                            <input id="myInput7" type="text" placeholder="Nuova Password" />
                        </div>
                        <div class="valoreDati">
                            <input id="myInput8" type="text" placeholder="Conferma Password" />
                        </div>
                    </div>
                </section>
            </section>
            <center><br><strong>
                    <div id="risultato" style="align-self:center;color:#826dbd;font-size:20px"></div><br>
                    <div id="risultato2" style="align-self:center;color:#826dbd;font-size:20px"></div>
                </strong></center>
        </div>
    </div>
    <div style="clear: both;"></div>


    <!-- .container -->

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'webservice/getDatiUtente.php',
            type: "POST",
            data: {
                cf: <?php echo $_SESSION['cf'] ?>,
            },
            success: function(data) {
                const risultato = JSON.parse(data);

                x = risultato.nome;
                $("#myInput1").get(0).value = x;
                x = risultato.cognome;
                $("#myInput2").get(0).value = x;
                x = risultato.indirizzo;
                $("#myInput3").get(0).value = x;
                x = risultato.telefono;
                $("#myInput4").get(0).value = x;
                x = risultato.email;
                $("#myInput5").get(0).value = x;

            },
            error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown + "banana 2");
            }
        });
    });
</script>

<script>
    // ANNULLA
    $("#myButtonAnnulla").click(function() {
        $(document).ready(function() {
            $.ajax({
                url: 'webservice/getDatiUtente.php',
                type: "POST",
                data: {
                    cf: <?php echo $_SESSION['cf'] ?>,
                },
                success: function(data) {
                    const risultato = JSON.parse(data);

                    x = risultato.nome;
                    $("#myInput1").get(0).value = x;
                    x = risultato.cognome;
                    $("#myInput2").get(0).value = x;
                    x = risultato.indirizzo;
                    $("#myInput3").get(0).value = x;
                    x = risultato.telefono;
                    $("#myInput4").get(0).value = x;
                    x = risultato.email;
                    $("#myInput5").get(0).value = x;
                    $("#myButton2").html("Modifica Profilo");
                    document.getElementById('myInput6').value = "";
                    document.getElementById('myInput7').value = "";
                    document.getElementById('myInput8').value = "";
                    document.getElementById('myInput1').readOnly = true;
                    document.getElementById('myInput2').readOnly = true;
                    document.getElementById('myInput3').readOnly = true;
                    document.getElementById('myInput4').readOnly = true;
                    document.getElementById('myInput5').readOnly = true;
                    document.getElementById('myInput6').readOnly = true;
                    $("#dati").hide();
                    $("#myButtonAnnulla").hide();
                },
                error: function(jXHR, textStatus, errorThrown) {
                    alert(errorThrown + "banana 2");
                }
            });
        });
    });
</script>

<script>
    $("#dati").hide();
    $("#myButtonAnnulla").hide();

    function change() // no ';' here
    {
        var elem = document.getElementById("myButton2");
        if (elem.value == "Modifica Profilo") elem.value = "Open Curtain";
        else elem.value = "Modifica Profilo";
    }
    $(document).ready(function() {
        $("#myButton2").click(function() {
            var fired_button = $(this).prop("value");
            if (fired_button == "Modifica Profilo") {
                $("#myButton2").html("Salva Modifiche");
                document.getElementById('myInput1').readOnly = false;
                document.getElementById('myInput2').readOnly = false;
                document.getElementById('myInput3').readOnly = false;
                document.getElementById('myInput4').readOnly = false;
                document.getElementById('myInput5').readOnly = false;
                document.getElementById('myInput6').readOnly = false;
                $("#dati").show();
                $("#myButtonAnnulla").show();
            } else {
                if (($("#myInput1").val()) == "" || ($("#myInput2").val()) == "" || ($("#myInput3").val()) == "" || ($("#myInput4").val()) == "" || ($("#myInput5").val()) == "") {
                    alert("ERRORE : COMPILA TUTTI I CAMPI");
                } else {
                    $("#myButton2").html("Modifica Profilo");
                    document.getElementById('myInput1').readOnly = true;
                    document.getElementById('myInput2').readOnly = true;
                    document.getElementById('myInput3').readOnly = true;
                    document.getElementById('myInput4').readOnly = true;
                    document.getElementById('myInput5').readOnly = true;
                    document.getElementById('myInput6').readOnly = true;
                    $("#dati").hide();
                    $("#myButtonAnnulla").hide();
                    $.ajax({
                        url: 'webservice/modificaDati.php',
                        type: "POST",
                        data: {
                            cf: <?php echo $_SESSION['cf'] ?>,
                            nome: $("#myInput1").val(),
                            cognome: $("#myInput2").val(),
                            indirizzo: $("#myInput3").val(),
                            telefono: $("#myInput4").val(),
                            email: $("#myInput5").val()
                        },
                        success: function(data) {
                            const risultato = JSON.parse(data);

                            x = risultato.risultato;
                            if (x == 0 && risultato.modifiche == 1) {
                                $('#risultato').html("DATI PERSONALI MODIFICATI CON SUCCESSO ");
                            } else if (x != 0) {
                                $('#risultato').html("Errore");
                            }
                        },
                        error: function(jXHR, textStatus, errorThrown) {
                            alert(errorThrown + "banana 2");
                        }
                    });
                    if ($("#myInput6").val() != "" && $("#myInput8").val() != "") {
                        if ($("#myInput7").val() != $("#myInput8").val()) {
                            $('#risultato2').html("ERRORE : LA NUOVA PASSWORD NON COINCIDE CON LA CONFERMA");
                        } else {
                            $.ajax({
                                url: 'webservice/cambioPassword_serv.php',
                                type: "POST",
                                data: {
                                    cf: <?php echo $_SESSION['cf'] ?>,
                                    vecchiaPw: $("#myInput6").val(),
                                    nuovaPw: $("#myInput8").val(),
                                },
                                success: function(data) {
                                    const risultato = JSON.parse(data);

                                    x = risultato.risultato;
                                    if (x == 0) {
                                        $('#risultato2').html("PASSWORD MODIFICATA CON SUCCESSO ");
                                    } else if (x == -4) {
                                        $('#risultato2').html("ERRORE : LA PASSWORD VECCHIA CORRISPONDE CON LA NUOVA");
                                    } else if (x == -1) {
                                        $('#risultato2').html("ERRORE : LA PASSWORD VECCHIA ERRATA");
                                    } else if (x == -1) {
                                        $('#risultato2').html("ERRORE : SCONOSCIUTO, CONTATTACI PER INFO");
                                    }
                                },
                                error: function(jXHR, textStatus, errorThrown) {
                                    alert(errorThrown + "banana 2");
                                }
                            });
                        }
                    }
                    document.getElementById('myInput6').value = "";
                    document.getElementById('myInput7').value = "";
                    document.getElementById('myInput8').value = "";
                }
            }
        });
    });
</script>