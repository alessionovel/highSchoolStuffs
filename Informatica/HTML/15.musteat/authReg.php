<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() { //Esegue quando la pagina è caricata
        $("#auth").on('submit', function(e) { //Visualizza ordini
            e.preventDefault();
            $.ajax({
                url: 'authRegForm.php',
                type: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    if (data == "POG") {
                        $("#regMex").html("Account registrato con successo, verrai reindirizzato fra un paio di secondi!");
                        setTimeout(function() {
                            $("#authForm").load("authLogin.php");
                        }, 4000);
                    } else {
                        $("#regMex").html(data);
                        setTimeout(function() {
                            $("#regMex").empty();
                        }, 4000);
                    }
                },
                error: function(jXHR, textStatus, errorThrown) {
                    alert(errorThrown + "banana");
                }
            });
        });
    });
</script>
<form method="post" id="auth" class="inputBox">
    <div>
        <input class="inputBar" style="margin-top:0;" type="text" id="username_bar" name="username_bar" required value="" placeholder="Username" />
        <input class="inputBar" type="password" id="password_bar" name="password_bar" required value="" placeholder="Password" />
        <input class="inputBar" type="text" id="indirizzo_bar" name="indirizzo_bar" required value="" placeholder="Indirizzo" />
        <input class="inputBar" type="text" id="civico_bar" name="civico_bar" required value="" placeholder="Civico" />
        <input class="inputSub" type="submit" id="submit_bar" name="submit_bar" value="REGISTRATI" />
    </div>
    </br>
    <div id="regMex"></div>
</form>