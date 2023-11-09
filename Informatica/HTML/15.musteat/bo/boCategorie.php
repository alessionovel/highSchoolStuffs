<?php ob_start();
session_start() ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#addCat").click(function() {
            $("#catBody").empty();
            $("#catBody").load("boAddCat.php");
        });
        $("#visCat").click(function() {
            $("#catBody").empty();
            $("#catBody").load("boVisCat.php");
        });
    });
</script>
<?php
require "connectDb.php";
?>
<div id="subMenu">
    <button id="addCat" class="btnSelector">Aggiungi categoria
    </button><button id="visCat" class="btnSelector">Visualizza categorie</button>
</div>
<div id="catBody">
    <?php include "boVisCat.php"; ?>
</div>