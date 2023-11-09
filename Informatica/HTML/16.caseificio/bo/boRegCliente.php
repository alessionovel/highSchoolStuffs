<?php ob_start();
session_start() ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

</script>
<br><br>
<form id="addProdBody" class="inputBox" action="boRegClienteForm.php" method="post" enctype="multipart/form-data">

</br>
<strong>Nome:</strong>
<input class="inputBar" type="text" id="nome_cl_bar" name="nome_cl_bar" required value="" placeholder="Inserisci nome del cliente " />
</br>
<strong>Codice fiscale:</strong>
<input class="inputBar" type="text" id="codFisc_cl_bar" name="codFisc_cl_bar" required value="" placeholder="Inserisci Codice Fiscale del cliente " />
</br>
<strong>Tipologia:</strong>
<input class="inputBar" type="text" id="tipo_cl_bar" name="tipo_cl_bar" required value="" placeholder="Inserisci tipologia del cliente " />
</br>
<strong>Indirizzo:</strong>
<input class="inputBar" type="text" id="indirizzo_cl_bar" name="indirizzo_cl_bar" required value="" placeholder="Inserisci indirizzo del cliente " />
</br>
<strong>Numero di telefono:</strong>
<input class="inputBar" type="text" id="numTel_cl_bar" name="numTel_cl_bar" required value="" placeholder="Inserisci il numero di telefono del cliente " />
</br>
</br></br>

<!--  <input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="INSERISCI" /> -->
<input class="inputSub" type="submit" id="submit_regCliente_bar" name="submit_regCliente_bar" value="INSERISCI CLIENTE" />

</br> </br>

</form>

<div id="prod_form_output"></div>
