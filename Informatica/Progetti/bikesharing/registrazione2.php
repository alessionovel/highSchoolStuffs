<form id="reg2" action="" method="post">
  <input id="email_bar" name="email_bar" type="hidden" value="<?php echo $_REQUEST['email'] ?>" required="">
  <input id="cf_bar" name="email_bar" type="hidden" value="<?php echo $_REQUEST['cf'] ?>" required="">
  <input id="password_bar" name="email_bar" type="hidden" value="<?php echo $_REQUEST['password'] ?>" required="">
  <label>Nome</label>
  <div class="input-group">
    <span class="fa fa-user" aria-hidden="true"></span>
    <input id="nome_bar" name="email_bar" type="text" placeholder="Inserisci il tuo nome" required="">
  </div>
  <label>Cognome</label>
  <div class="input-group">
    <span class="fa fa-user" aria-hidden="true"></span>
    <input id="cognome_bar" name="password_bar" type="text" placeholder="Inserisci il tuo cognome" required="">
  </div>
  <label>Telefono</label>
  <div class="input-group">
    <span class="fa fa-phone" aria-hidden="true"></span>
    <input id="telefono_bar" name="email_bar" type="tel" placeholder="Inserisci numero di telefono" required="">
  </div>
  <label>Indirizzo</label>
  <div class="input-group">
    <span class="fa fa-map-marker" aria-hidden="true"></span>
    <input id="indirizzo_bar" name="password_bar" type="street-address" placeholder="Inserisci il tuo indirizzo" required="">
  </div>
  <button name="btnLogin" id="btnRegistra" class="btn btn-danger btn-block" type="submit">Registrati</button>
</form>

<script>
  $(document).ready(function() {
    $('#reg2').on('submit', function(e2) {
      e2.preventDefault();
      var email = document.getElementById("email_bar").value;
      var password = document.getElementById("password_bar").value;
      var cf = document.getElementById("cf_bar").value;
      var nome = document.getElementById("nome_bar").value;
      var cognome = document.getElementById("cognome_bar").value;
      var indirizzo = document.getElementById("indirizzo_bar").value;
      var telefono = document.getElementById("telefono_bar").value;
      $.ajax({
        url: 'webservice/registra_utente_serv.php',
        type: "POST",
        data: {
          email: email,
          password: password,
          cf: cf,
          nome: nome,
          cognome: cognome,
          indirizzo: indirizzo,
          telefono: telefono
        },
        success: function(data) {
          const risultato = JSON.parse(data);
          if (risultato.risultato != 0) {
            $("#registrazione-check").html("Errore");
          } else {
            $("#fineReg").html("<strong  style=\"color: white; font-style: italic; font-size: 2em\">Registrazione effettuata con successo, vai alla pagina di Login per autenticarti</strong>");
          }
        },
        error: function(jXHR, textStatus, errorThrown) {
          alert(errorThrown + "banana 2");
        }
      });
    });
  });
</script>