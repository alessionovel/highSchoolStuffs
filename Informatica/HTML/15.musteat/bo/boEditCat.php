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
        $('#boEditCat').on('submit', function(e) {
            e.preventDefault();
            but = <?php echo $_REQUEST['but'] ?>;
            $.ajax({
                url: 'boEditCatForm.php',
                type: "POST",
                data: {
                    but: but,
                    nome: $(this).serializeArray()
                },
                success: function(data) {
                    $("#confirmBody").html("");
                    //$("#confirmBody").html("<p>Ye, hai modificato il nome</p>");
                    $("#catBody").load("boVisCat.php");
                },
                error: function(jXHR, textStatus, errorThrown) {
                    alert(errorThrown + "banana");
                }
            });
        });
    });
</script>
<form class="inputBox" method="post" id="boEditCat">
    </br>
    <strong>MODIFICANDO UNA CATEGORIA</strong>
    </br>
    </br>
    <span>NOME CATEGORIA: </span>
    <input class="inputBar" type="text" id="nome_prod_bar" name="nome_prod_bar" required value="" placeholder="<?php echo $array['nome'] ?>" />
    </br>
    <input class="inputSub" type="submit" id="btnConfirm<?php echo $_REQUEST['but'] ?>" id="btnConfirm<?php echo $_REQUEST['but'] ?>" value="CONFERMA" />
    </br> </br>
</form>