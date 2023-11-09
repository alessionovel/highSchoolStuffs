<?php ob_start();
session_start() ?>
<?php
require "connectDb.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() { //Esegue quando la pagina è caricata
        $("#addProd").click(function() { //Carica la pagina per aggiunge categorie
            $("#prodBody").empty();
            $("#prodBody").load("boAddProd.php");
        });
        $("#visProd").click(function() { //Carica la pagina per visualizzare le categorie presenti
            $("#prodBody").empty();
            $("#prodBody").load("boVisProd.php");
        });
    });
</script>
<div id="subMenu">
    <button id="addProd" class="btnSelector">Aggiungi prodotto
    </button><button id="visProd" class="btnSelector">Visualizza prodotti</button>
</div>
<div id="prodBody" class="contBox">
    <?php include "boVisProd.php";
    ?>
</div>