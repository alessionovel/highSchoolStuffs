<div id="menu">
  <div id="header">
    <p class="header">BACK OFFICE</p>
  </div>
  <div class="benvenuto">
    <span id="benvenuto">
      <?php session_start();
      require "connectDb.php";
      $query = "SELECT indirizzo FROM ferroCaseificio WHERE codice='" . $_SESSION['codiceBo'] . "'";
      $result = mysqli_query($mysqli, $query);
      ?>
      <p>
      <?php
      echo "Caseificio in : " . $result->fetch_assoc()['indirizzo'];
      ?>
    </p>
    </span>
  </div>
  <div id="btnMenu">
    <button id="btnLogout" class="btnSelector">Logout
    </button><button id="btnImm" class="btnSelector">Gestisci immagini
    </button><button id="btnRegLatte" class="btnSelector">Registra quantità latte
    </button><button id="btnNewForma" class="btnSelector">Registra nuova forma di formaggio
    </button><button id="btnModifica" class="btnSelector">Modifica forma
    </button><button id="btnVendi" class="btnSelector">Vendi forma
    </button><button id="btnNewCliente" class="btnSelector">Registra cliente
    </button><button id="btnStats" class="btnSelector">Statistiche
    </button>
  </div>
</div>
