<?php ob_start();
session_start() ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
</script>

<br><br>
<form id="addCaseificio" class="inputBox" action="boNewCaseificioForm.php" method="post" enctype="multipart/form-data">

</br>
<strong>Codice:</strong>
<input class="inputBar" type="text" id="cod_bar" name="cod_bar" required value="" placeholder="Inserisci codice del caseificio " />
</br>
<strong>Ragione sociale:</strong>
<input class="inputBar" type="text" id="rag_bar" name="rag_bar" required value="" placeholder="Inserisci ragione sociale del caseificio " />
</br>
<strong>Nome Proprietario:</strong>
<input class="inputBar" type="text" id="prop_bar" name="prop_bar" required value="" placeholder="Inserisci nome del proprietario del caseificio " />
</br>
<strong>Partita IVA:</strong>
<input class="inputBar" type="text" id="iva_bar" name="iva_bar" required value="" placeholder="Inserisci partita iva del caseificio " />
</br>
<strong>Indirizzo:</strong>
<input class="inputBar" type="text" id="indirizzo_bar" name="indirizzo_bar" required value="" placeholder="Inserisci indirizzo del caseificio " />
</br>
<strong>Latitudine:</strong>
<input class="inputBar" type="text" id="lat_bar" name="lat_bar" required value="" placeholder="Inserisci latitudine del caseificio  " />
</br>
<strong>Longitudine:</strong>
<input class="inputBar" type="text" id="lon_bar" name="lon_bar" required value="" placeholder="Inserisci longitudine del caseificio " />
</br>
<strong>Telefono:</strong>
<input class="inputBar" type="text" id="tel_bar" name="tel_bar" required value="" placeholder="Inserisci il numero di telefono del caseificio " />
</br>
<strong>Sigla Provincia:</strong>
<input class="inputBar" type="text" id="prov_bar" name="prov_bar" required value="" placeholder="Inserisci la sigla della provincia del caseificio " />
</br><br><strong>Utente per il back office:</strong><br>
<strong>Email:</strong>
<input class="inputBar" type="text" id="email_bar" name="email_bar" required value="" placeholder="Inserisci l'email dell'utente " />
</br>
<strong>Password:</strong>
<input class="inputBar" type="password" id="psw_bar" name="psw_bar" required value="" placeholder="Inserisci la password dell'utente " />
</br>
<strong>Nome utente:</strong>
<input class="inputBar" type="text" id="nome_bar" name="nome_bar" required value="" placeholder="Inserisci il nome dell'utente " />
</br>
<strong>Cognome utente:</strong>
<input class="inputBar" type="text" id="cognome_bar" name="cognome_bar" required value="" placeholder="Inserisci il cognome dell'utente " />
</br>
</br></br>

<!--  <input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="INSERISCI" /> -->
<input class="inputSub" type="submit" id="submit_regCliente_bar" name="submit_regCliente_bar" value="INSERISCI CLIENTE" />

</br> </br>

</form>

<div id="prod_form_output"></div>
