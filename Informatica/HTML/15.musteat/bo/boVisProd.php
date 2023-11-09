<?php ob_start();
session_start() ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        <?php
        require "connectDb.php";

        $query = "SELECT * FROM novelcategorie WHERE idRist=" . $_SESSION['idRist'] . "";
        $result2 = mysqli_query($mysqli, $query);
        while ($array = $result2->fetch_assoc()) {
            $query = "SELECT * FROM novelprodotti WHERE idCat=" . $array['idCat'] . "";
            $result = mysqli_query($mysqli, $query);

            while ($cat = $result->fetch_assoc()) {
        ?>
                $('#btnDel<?php echo $cat['idProd']; ?>').click(function() {
                    but = <?php echo $cat['idProd'] ?>;
                    nome = '<?php echo $cat['nome'] ?>'
                    $.ajax({
                        url: 'boConfirm.php',
                        type: "POST",
                        data: {
                            array: $(this).serializeArray(),
                            but: but,
                            toLink: "boDelProd.php",
                            nome: nome,
                            command: "DELETE: "
                        },
                        success: function(data) {
                            $("#confirmBody").html(data);
                        },
                        error: function(jXHR, textStatus, errorThrown) {
                            alert(errorThrown + "banana");
                        }
                    });
                });
                $('#btnEdit<?php echo $cat['idProd']; ?>').click(function() {
                    but = <?php echo $cat['idProd'] ?>;
                    nome = '<?php echo $cat['nome'] ?>'
                    $.ajax({
                        url: 'boConfirm.php',
                        type: "POST",
                        data: {
                            array: $(this).serialize(),
                            but: but,
                            toLink: "boEditProd.php",
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
                $('#btnView<?php echo $cat['idProd']; ?>').click(function() {
                    but = <?php echo $cat['idProd'] ?>;
                    nome = '<?php echo $cat['nome'] ?>'
                    $.ajax({
                        url: 'boVisProdSng.php',
                        type: "POST",
                        data: {
                            but: but,
                        },
                        success: function(data) {
                            $("#confirmBody").html(data);
                        },
                        error: function(jXHR, textStatus, errorThrown) {
                            alert(errorThrown + "banana 3");
                        }
                    });
                });
        <?php
            }
        }
        ?>
    });
</script>
<?php
require "connectDb.php";

$query = "SELECT * FROM novelcategorie WHERE idRist=" . $_SESSION['idRist'] . "";
$result2 = mysqli_query($mysqli, $query);

while ($array = $result2->fetch_assoc()) {
    $query = "SELECT * FROM novelprodotti WHERE idCat=" . $array['idCat'] . "";
    $result = mysqli_query($mysqli, $query);

    echo "</br>";
    echo "<div id=\"prodCat\">";
    echo "<strong><p>" . $array['nome'] . "</p></strong>";
    echo "</div>";

    if ($result->num_rows > 0) {
?>
        <table id="table">
            <tr>
                <th>Nome prodotto </th>
                <th>EDIT</th>
                <th>DELETE</th>
                <th>VEDI INFO</th>
            </tr>
            <?php
            while ($prod = $result->fetch_assoc()) {
                echo "<tr><td><span>" . $prod['nome'] . "</span></td>";
            ?>
                <td class="forButton"><button id="btnEdit<?php echo $prod['idProd'] ?>" class="btnForm">EDIT</button></td>
                <td class="forButton"><button id="btnDel<?php echo $prod['idProd'] ?>" class="btnForm">DELETE</button></td>
                <td class="forButton"><button id="btnView<?php echo $prod['idProd'] ?>" class="btnForm">VEDI INFO</button></td>
            <?php
            }
            ?>
            </tr>
        </table>
<?php
    } else {
        echo "<p>Non è stato trovato nessun prodotto</p>";
    }
}
?>
<div id="confirmBody"></div>