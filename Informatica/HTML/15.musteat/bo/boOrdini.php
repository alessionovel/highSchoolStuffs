<?php
ob_start();
session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        <?php
        require "connectDb.php";
        $query = "SELECT * FROM novelordini WHERE idRist='" . $_SESSION['idRist'] . "' AND consegnato=0";
        $result = mysqli_query($mysqli, $query);
        while ($array = $result->fetch_assoc()) {
        ?>
            $('#btnConf<?php echo $array['idOrd'] ?>').click(function() {
                but = <?php echo $array['idOrd'] ?>;
                $.ajax({
                    url: 'boConfOrdine.php',
                    type: "POST",
                    data: {
                        but: but,
                    },
                    success: function(data) {
                        $("#btnConf<?php echo $array['idOrd'] ?>").prop('disabled', true);
                        $("#btnConf<?php echo $array['idOrd'] ?>").html('CONSEGNATO');
                        $("#result").html(data);
                    },
                    error: function(jXHR, textStatus, errorThrown) {
                        alert(errorThrown + "banana");
                    }
                });
            });
        <?php
        }
        ?>
    });
</script>
<div>
    <div id="result"></div>
    <div class="">
        <?php
        require "connectDb.php";
        $query = "SELECT * FROM novelordini WHERE idRist='" . $_SESSION['idRist'] . "'";
        if (isset($_REQUEST['cons'])) {
            $query = $query . "and consegnato = 0";
        }
        $result = mysqli_query($mysqli, $query);
        if ($result->num_rows > 0) {
            while ($ordine = $result->fetch_assoc()) {
        ?>
                <table id="table" class="domande">
                    <tbody>
                        <tr>
                            <th style="width: 10%;">Ordine: <?php echo $ordine['idOrd'] ?></th>
                            <th style="width: 25%;">Prodotto</th>
                            <th style="width: 5%;">Quantità</th>
                            <th style="width: 10%;">Prezzo</th>
                            <th style="width: 10%;">Sub-totale</th>
                            <th style="width: 30%;">Indirizzo</th>
                            <th style="width: 5%;">Civico</th>
                            <?php
                            if (isset($_REQUEST['cons'])) {
                                if ($ordine['consegnato'] == 0) {

                            ?>
                                    <th id="btnConfTh<?php echo $ordine['idOrd'] ?>" class="forButton" style="width: 5%;"><button id="btnConf<?php echo $ordine['idOrd'] ?>" class="btnForm" style="height: 100%; width: 100%; color:white; font-weight:bold; display:inline-block;"><span> </span>CONSEGNA<span> </span></button></th>
                                <?php
                                }
                            } else {
                                ?>
                                <th style="width: 5%;"><span>CONSEGNATO</span></th>
                            <?php
                            }
                            ?>
                        </tr>
                        <?php
                        $query = "SELECT * FROM novelcontordine WHERE idOrd='" . $ordine['idOrd'] . "'";
                        $result2 = mysqli_query($mysqli, $query);

                        $query = "SELECT indirizzo,civico FROM novelclienti WHERE username='" . $ordine['username'] . "'";
                        $result4 = mysqli_query($mysqli, $query);
                        $username = $result4->fetch_assoc();

                        while ($contOrdine = $result2->fetch_assoc()) { // "tr" are  to open/close a table - "td" are for columns
                            $query = "SELECT * FROM novelprodotti WHERE idProd='" . $contOrdine['idProd'] . "'";
                            $result3 = mysqli_query($mysqli, $query);
                            $prodotti = $result3->fetch_assoc();

                            echo "<tr><td></td><td>" . $prodotti['nome'] . "</td><td>" . $contOrdine['quantita'] . "</td>
                        <td>" . $prodotti['prezzo'] . "</td><td>" . number_format(($contOrdine['quantita'] * $prodotti['prezzo']), 2) . "</td>
                        <td>" . $username['indirizzo'] . "</td><td>" . $username['civico'] . "</td></td><td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
        <?php
            }
        } else {
            echo "<p>Non è stato trovato nessun ordine</p>";
        }
        ?>
    </div>
</div>