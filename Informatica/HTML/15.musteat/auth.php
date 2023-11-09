<?php ob_start();
session_start() ?>
<?php
if (isset($_SESSION['username'])) {
    header("location:checkout.php");
} else {
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() { //Esegue quando la pagina è caricata
            $("#btnLog").click(function() {
                $("#authForm").load("authLogin.php");
            });
            $("#btnReg").click(function() {
                $("#authForm").load("authReg.php");
            });
        });
    </script>
    <div id="menuRes">
        <div class="infoBody corpo">
            <div id="">
                </br>
                <button id="btnLog" class="addSub" style="border-right:none;">LOGIN
                </button><button id="btnReg" class="addSub">REGISTRATI
                </button>
            </div>
            <div id="authForm"></div>
        </div>
    </div>
<?php
}
?>