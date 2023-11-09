<div id="menu">
    <div id="header">
        <p class="header">BACK OFFICE</p>
    </div>
    <div class="benvenuto">
        <span id="benvenuto">
            <?php session_start();
            require "connectDb.php";
            $query = "SELECT nome FROM novelristoranti WHERE idRist='" . $_SESSION['idRist'] . "'";
            $result = mysqli_query($mysqli, $query);
            echo "Ristorante, " . $result->fetch_assoc()['nome'];
            ?>
        </span>
    </div>
    <div id="btnMenu">
        <button id="btnLogout" class="btnSelector">LOGOUT
        </button><button id="btnCatBo" class="btnSelector">CATEGORIE
        </button><button id="btnProdBo" class="btnSelector">PRODOTTI
        </button><button id="btnOrdBo" class="btnSelector">ORDINI</button>
    </div>
</div>