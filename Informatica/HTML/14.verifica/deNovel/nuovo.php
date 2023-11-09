<script>

	function controllo(){
		var nome = document.getElementById("nome").value;
		if(nome.length<3){
			alert("Il nome deve avere almeno 3 caratteri");
			return false;
		}
    var cognome = document.getElementById("cognome").value;
		if(cognome.length<3){
			alert("Il cognome deve avere almeno 3 caratteri");
			return false;
		}
    var email = document.getElementById("email").value;
    var lunghezza = email.length;
    var pos = email.indexOf("@");
    if (pos<3){
      alert("Ci devono almeno 3 caratteri prima della @");
			return false;
    }
    var post = lunghezza - pos;
    if (post<6){
      alert("Ci devono almeno 6 caratteri dopo la @");
			return false;
    }
    var last = email.lastIndexOf("@");
    if (pos!=last){
      alert("Ci deve essere solo una @");
			return false;
    }

		return true;
	}

</script>
<form action="index.php" method="POST">
  <input type="submit" value="Abbandona"><br>
</form>
<form action="aggiungi.php" method="POST"  onsubmit="return controllo()">
  <input type="submit" value="Salva"><br>
  <label>Nome</label>
  <input type="text" id="nome" name="nome"><br>
  <label>Cognome</label>
  <input type="text" id="cognome" name="cognome"><br>
  <label>Email</label>
  <input type="text" id="email" name="email"><br>
  <label>Data</label>
  <input type="date" id="data" name="data">
</form>
