<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() { //Esegue quando la pagina è caricata
        $("#auth").on('submit', function(e) { //Visualizza ordini
            e.preventDefault();
            $.ajax({
                url: 'authLoginForm.php',
                type: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    if (data == "POG") {
                        $("#menuOut").load("auth.php");
                    } else {
                        $("#mex").html(data);
                        setTimeout(function() {
                            $("#mex").empty();
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
        <input class="inputSub" type="submit" id="submit_bar" name="submit_bar" value="SIGN IN" />
    </div>
    </br>
    <div id="mex"></div>
</form>