<?php ob_start();
session_start(); ?>
<?php
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() { //Esegue quando la pagina è caricata
        $("#btnAbb").click(function() {
            $("#checkFormOut").load("clearSession.php");
            $(location).attr('href', 'index.php');
        });
        $("#btnConf").click(function() {
            $("#menuOut").load("checkoutConf.php");
            $("#menuOut").load("ordConf.php");
        });
        $("#btnCar").click(function() {
            $("#menuOut").empty();
            $("#menuOut").load("carrello.php");
        });
    });
</script>

<div id="menuRes">
    <div class="infoBody corpo">
        <div id="">
            </br>
            <button id="btnCar" class="addSub">CARRELLO
            </button><button id="btnAbb" class="addSub" style="border-left:none; border-right:none; ">ABBANDONA ORDINE
            </button><button id="btnConf" class="addSub">CONFERMA ORDINE
            </button>
        </div>
    </div>
</div>
<div id="checkFormOut"></div>