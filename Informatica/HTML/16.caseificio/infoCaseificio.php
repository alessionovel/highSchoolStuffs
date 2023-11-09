<?php
ob_start();
session_start(); ?>
<div id="menuRes">
  <div class="infoBody corpo">
  </br></br></br></br>
  <div class="descBox">
    <strong> Ragione Sociale: </strong><br>
    <p> <?php echo $_REQUEST['rag']; ?></p>
  </div>
</br></br>
<div class="descBox">
  <strong> Nome del proprietario: </strong><br>
  <p> <?php echo $_REQUEST['proprietario']; ?></p>
</div>
</br></br>
<div class="descBox">
  <strong> Indirizzo del caseificio: </strong><br>
  <p> <?php echo $_REQUEST['indirizzo']; ?></p>
</div>
</br></br>
<div class="descBox">
  <strong> IVA: </strong><br>
  <p> <?php echo $_REQUEST['iva']; ?></p>
</div>
</br></br>
<div class="descBox">
  <strong> Email: </strong><br>
  <p> <?php echo $_REQUEST['email']; ?></p>
</div>
</br></br>
<div class="descBox">
  <strong> Telefono: </strong><br>
  <p> <?php echo $_REQUEST['tel']; ?></p>
</div>
</div>
</div>
