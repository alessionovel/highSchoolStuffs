<div id="menu">
    <div id="header">
        <p class="header">BACK OFFICE</p>
    </div>
    <div class="benvenuto">
        <span id="benvenuto">
            <?php session_start();
            require "connectDb.php";
            ?>
            <p>
            <?php
            echo "Home page Consorzio"
            ?>
            </p>        
        </span>
    </div>
    <div id="btnMenu">
        <button id="btnLogout" class="btnSelector">Logout
        </button><button id="btnNewCaseificio" class="btnSelector">Registra nuovo caseificio
        </button><button id="btnVendiCons" class="btnSelector">Vendi forma
        </button><button id="btnNewCliente" class="btnSelector">Registra cliente
        </button>
    </div>
</div>
