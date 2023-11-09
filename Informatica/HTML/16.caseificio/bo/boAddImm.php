<?php ob_start();
session_start() ?>
<form id="addImmBody" class="inputBox" action="boAddImmForm.php" method="post" enctype="multipart/form-data">
</br>
<strong>Descrizione foto:</strong>
<input class="inputBar" type="text" id="descrizione_prod_bar" name="descrizione_prod_bar" required value="" placeholder="Inserisci descrizione foto..." />
</br>
<strong>Caricare l'immagine da usare:</strong>
<input class="inputBar" type="file" id="file_prod_bar" name="file_prod_bar" required accept="image/*" />
</br>
<input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="INSERISCI" />
</br> </br>
</form>
<div id="prod_form_output"></div>
