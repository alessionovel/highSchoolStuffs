<?php ob_start();
session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("#btnOrdView").click(function() { //Visualizza ordini
        $("#ordBody").empty();
        $("#ordBody").load("boOrdini.php");
    });
    $('#btnOrdCons').click(function(e) {
        $.ajax({
            url: 'boOrdini.php',
            type: "POST",
            data: {
                cons: "but"
            },
            success: function(data) {
                $("#ordBody").html("");
                $("#ordBody").html(data);
            },
            error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown + "banana");
            }
        });
    });
</script>
<div id="subMenu">
    <button id="btnOrdView" class="btnSelector">VISUALIZZA ORDINI
    </button><button id="btnOrdCons" class="btnSelector">CONTROLLA ORDINI</button>
</div>
<div id="ordBody">
    <?php include "boOrdini.php"; ?>
</div>