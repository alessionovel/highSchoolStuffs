<?php ob_start();
session_start(); ?>
<?php
require "connectDb.php";
$query = "SELECT * FROM novelcategorie WHERE idCat=" . $_REQUEST['but'] . "";
$result = mysqli_query($mysqli, $query);
$array = $result->fetch_assoc();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#boEditProd').on('submit', function(e) {
            e.preventDefault();
            but = <?php echo $_REQUEST['but'] ?>;
            $.ajax({
                url: 'boEditProdForm.php',
                type: "POST",
                data: {
                    but: but,
                    dataForm: $(this).serializeArray()
                },
                success: function(data) {
                    $("#boEditProdOut").html(data);
                    //$("#confirmBody").html("");
                    //$("#confirmBody").html("<p>Ye, hai modificato il nome</p>");
                    //$("#catBody").load("boVisCat.php");
                },
                error: function(jXHR, textStatus, errorThrown) {
                    alert(errorThrown + "banana");
                }
            });
        });

        $("#editNome").click(function() {
            if (!$('#editNome').is(":checked")) {
                $("#nome_prod_bar").prop('disabled', true);
            } else {
                $("#nome_prod_bar").prop('disabled', false);
            }
        });
        $("#editDesc").click(function() {
            if (!$('#editDesc').is(":checked")) {
                $("#desc_prod_bar").prop('disabled', true);
            } else {
                $("#desc_prod_bar").prop('disabled', false);
            }
        });
        $("#editFile").click(function() {
            if (!$('#editFile').is(":checked")) {
                $("#file_prod_bar").prop('disabled', true);
            } else {
                $("#file_prod_bar").prop('disabled', false);
            }
        });
        $("#editPrezzo").click(function() {
            if (!$('#editPrezzo').is(":checked")) {
                $("#prezzo_prod_bar").prop('disabled', true);
            } else {
                $("#prezzo_prod_bar").prop('disabled', false);
            }
        });
        $("#editCat").click(function() {
            if (!$('#editCat').is(":checked")) {
                $("#idCat_bar").prop('disabled', true);
            } else {
                $("#idCat_bar").prop('disabled', false);
            }
        });
    });
</script>

<?php
$query = "SELECT * FROM novelcategorie WHERE idRist=" . $_SESSION['idRist'] . "";
$result2 = mysqli_query($mysqli, $query);
while ($cat = $result2->fetch_assoc()) {
    $query = "SELECT * FROM novelprodotti WHERE idCat=" . $cat['idCat'] . " AND idProd=" . $_REQUEST['but'] . "";
    $result = mysqli_query($mysqli, $query);
    if ($prod = $result->fetch_assoc()) {
?>

        <form id="boEditProd" class="inputBox" method="post" enctype="multipart/form-data">
            </br>
            <strong>MODIFICANDO UN PRODOTTO</strong>
            </br>
            </br>
            <span>Deseleziona la checkbox accanto</br>ad un dato se non lo si desidera cambiare</span>
            </br>
            </br>
            <span>NOME PRODOTTO: </span></br>
            <input class="inputBar" type="text" id="nome_prod_bar" name="nome_prod_bar" required value="" placeholder="<?php echo $prod['nome'] ?>" style="display:inline-block" />

            <input id="editNome" type="checkbox" checked="checked">
            </br>
            </br>
            <span>DESCRIZIONE: </span>
            </br>
            <textarea class="descInputBar" type="text" id="desc_prod_bar" name="desc_prod_bar" required value="" placeholder="<?php echo $prod['descrizione'] ?>"></textarea>

            <input id="editDesc" type="checkbox" checked="checked">

            </br> </br>
            <span>SELEZIONARE LA NUOVA IMMAGINE:</span>
            </br>
            <input class="inputBar" type="file" id="file_prod_bar" name="file_prod_bar" required accept="image/*" style="display:inline-block" />

            <input id="editFile" type="checkbox" checked="checked">
            </br>
            </br>
            <span>PREZZO: </span></br>
            <input class="inputBar" style="display:inline-block;" type="number" step="0.01" id="prezzo_prod_bar" name="prezzo_prod_bar" required value="" placeholder="<?php echo $prod['prezzo'] ?>" />
            <strong> €</strong>

            <input id="editPrezzo" type="checkbox" checked="checked">

            </br> </br>
            <span>CATEGORIA: </span></br>
            <select id="idCat_bar" name="idCat_bar" class="selectBar">
                <?php
                require "connectDb.php";
                //
                $query3 = "SELECT * FROM novelcategorie WHERE idRist=" . $_SESSION['idRist'] . "";
                $result3 = mysqli_query($mysqli, $query3);
                while ($array3 = $result3->fetch_assoc()) {
                    echo "<option value=\"" . $array3['idCat'] . "\">" . $array3['nome'] . "</option>";
                }
                ?>
            </select>

            <input id="editCat" type="checkbox" checked="checked">

            </br> </br>
            <input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="INSERISCI" />
            </br> </br>
        </form>
        <div id="boEditProdOut"></div>
<?php
    }
}
?>