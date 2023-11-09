<?php ob_start();
session_start(); ?>
<!doctype HTML>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="boStyle.css">
    <link rel="icon" href="img/Icon.png">
    <title>Back office - <?php require "connectDb.php";
                            $query = "SELECT nome FROM novelristoranti WHERE idRist='" . $_SESSION['idRist'] . "'";
                            $result = mysqli_query($mysqli, $query);
                            echo $result->fetch_assoc()['nome']; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<script>
    $(document).ready(function() { //Esegue quando la pagina è caricata
        $("#btnCatBo").click(function() { //Visualizza ordini
            $("#boBody").empty();
            $("#boBody").load("boCategorie.php");
        });
        $("#btnProdBo").click(function() { //Visualizza ordini
            $("#boBody").empty();
            $("#boBody").load("boProdotti.php");
        });
        $("#btnOrdBo").click(function() { //Visualizza ordini
            $("#boBody").empty();
            $("#boBody").load("boMenuOrdini.php");
        });
        $("#btnLogout").click(function() { //Visualizza ordini
            $("#boBody").empty();
            $("#boBody").load("boLogout.php");
            location.reload(true);
        });
    });
</script>

<body>
    <?php
    if (!isset($_SESSION['idRist'])) {
    ?>
        <div id="loginBo">
            <form method="post" action="">
                <div class="inputBox">
                    </br>
                    <input class="inputBar" type="text" id="username_bar" name="username_bar" required value="" placeholder="username" />
                    </br>
                    <input class="inputBar" type="password" id="password_bar" name="password_bar" required value="" placeholder="password" />
                    </br>
                    <input class="inputSub" type="submit" id="login_submit_bar" name="login_submit_bar" value="Sign in" />
                    </br>
                    </br>

                    <?php
                    if (isset($_REQUEST['login_submit_bar'])) {
                        $username = $_REQUEST['username_bar'];
                        $password = $_REQUEST['password_bar'];
                        require "connectDb.php";

                        $query = "SELECT idRist FROM novelristoranti WHERE username='" . $username . "' AND password='" . $password . "'";
                        $result = mysqli_query($mysqli, $query);

                        if ($result->num_rows > 0) {
                            $_SESSION['idRist'] = $result->fetch_assoc()['idRist'];
                            header("location:bo.php");
                        } else {
                            echo '<p class="errore">username o password incorretti</p>';
                        }
                        $mysqli->close();
                    }
                    ?>
                </div>
            </form>
        </div>
    <?php
    } else {
        require "boMenu.php";
    ?>
        <div id="boBody" class="contBox"></div>
    <?php
    }
    ?>
</body>

</html>