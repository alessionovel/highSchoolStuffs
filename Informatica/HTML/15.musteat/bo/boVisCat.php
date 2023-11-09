<?php ob_start();
session_start() ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        <?php
        require "connectDb.php";
        $query = "SELECT * FROM novelcategorie WHERE idRist=" . $_SESSION['idRist'] . "";
        $result = mysqli_query($mysqli, $query);
        while ($cat = $result->fetch_assoc()) {
        ?>
            $('#btnDel<?php echo $cat['idCat']; ?>').click(function() {
                but = <?php echo $cat['idCat'] ?>;
                nome = '<?php echo $cat['nome'] ?>'
                $.ajax({
                    url: 'boConfirm.php',
                    type: "POST",
                    data: {
                        array: $(this).serializeArray(),
                        but: but,
                        toLink: "boDelCat.php",
                        nome: nome,
                        command: "DELETE: ",
                        warn: "CANCELLARE UNA CATEGORIA CANCELLA TUTTI I PRODOTTI AL SUO INTERNO"
                    },
                    success: function(data) {
                        $("#confirmBody").html(data);
                    },
                    error: function(jXHR, textStatus, errorThrown) {
                        alert(errorThrown + "banana");
                    }
                });
            });
            $('#btnEdit<?php echo $cat['idCat']; ?>').click(function() {
                but = <?php echo $cat['idCat'] ?>;
                nome = '<?php echo $cat['nome'] ?>'
                $.ajax({
                    url: 'boConfirm.php',
                    type: "POST",
                    data: {
                        array: $(this).serializeArray(),
                        but: but,
                        toLink: "boEditCat.php",
                        nome: nome,
                        command: "EDIT: "
                    },
                    success: function(data) {
                        $("#confirmBody").html(data);
                    },
                    error: function(jXHR, textStatus, errorThrown) {
                        alert(errorThrown + "banana 2");
                    }
                });
            });
        <?php
        }
        ?>
    });
</script>
<?php

$query = "SELECT * FROM novelcategorie WHERE idRist=" . $_SESSION['idRist'] . "";
$result = mysqli_query($mysqli, $query);

if ($result->num_rows > 0) {
?>
    <table id="table">
        <tr>
            <th>Nome categoria </th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        <?php
        while ($cat = $result->fetch_assoc()) {
            //Visualizza le categorie
            echo "<tr><td><span>" . $cat['nome'] . "</span></td>";
            //Accando a ogni cat 
            //-> Bottone di modifica (rende editabile il testo e cambia il tasto in un tasto di conferma (poi torna normale))
            //-> Bottone di eliminazione (con richiesta (a pop-up) di conferma - reload aggiornato delle categorie con AJAX)
            //      -Se una categoria viene eliminata anche i prodotti al proprio interno vengono cancellati
        ?>
            <td><button id="btnEdit<?php echo $cat['idCat'] ?>" class="btnForm">EDIT</button></td>
            <td><button id="btnDel<?php echo $cat['idCat'] ?>" class="btnForm">DELETE</button></td>
        <?php
        }
        ?>
        </tr>
    </table>
    <div id="confirmBody"></div>
<?php
} else {
    echo "<p>Non è stato trovata nessuna categoria</p>";
}
?>