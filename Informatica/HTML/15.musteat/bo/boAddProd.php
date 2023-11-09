<?php ob_start();
session_start() ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    /*$(document).ready(function() {
        var formData = new FormData();
        $('#addProdBody').on('submit', function(e) {
            e.preventDefault();
            formData.append('nome_prod_bar', $("#nome_prod_bar").val);
            formData.append('desc_prod_bar', $("#desc_prod_bar").val);
            formData.append('prezzo_prod_bar', $("#prezzo_prod_bar").val);
            formData.append('idCat_bar', $("#idCat_bar").val);
            formData.append('file_prod_bar', $('#file_prod_bar').get(0).files[0]);

            $.ajax({
                url: "boAddProdForm.php",
                type: "POST",
                enctype: "multipart/form-data",
                data: $(this).serialize(),
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#prod_form_output").html(data);
                },
                error: function(jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
    });*/
</script>
<form id="addProdBody" class="inputBox" action="boAddProdForm.php" method="post" enctype="multipart/form-data">
    </br>
    <input class="inputBar" type="text" id="nome_prod_bar" name="nome_prod_bar" required value="" placeholder="Inserisci nome prodotto..." />
    </br>
    <textarea class="descInputBar" type="text" id="desc_prod_bar" name="desc_prod_bar" required value="" placeholder="Inserisci una descrizione..."></textarea>
    </br> </br>
    <strong>Caricare l'immagine da usare:</strong>
    <input class="inputBar" type="file" id="file_prod_bar" name="file_prod_bar" required accept="image/*" />
    </br>
    <input class="inputBar" style="display:inline-block;" type="number" step="0.01" id="prezzo_prod_bar" name="prezzo_prod_bar" required value="" placeholder="Prezzo" />
    <strong> €</strong>
    </br> </br>
    <select id="idCat_bar" name="idCat_bar" class="selectBar">
        <?php
        require "connectDb.php";
        $query = "SELECT * FROM novelcategorie WHERE idRist=" . $_SESSION['idRist'] . "";
        $result = mysqli_query($mysqli, $query);
        while ($array = $result->fetch_assoc()) {
            echo "<option value=\"" . $array['idCat'] . "\">" . $array['nome'] . "</option>";
        }
        ?>
    </select>
    </br> </br>
    <input class="inputSub" type="submit" id="submit_addProd_bar" name="submit_addProd_bar" value="INSERISCI" />
    </br> </br>
</form>
<div id="prod_form_output"></div>