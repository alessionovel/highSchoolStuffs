<?php ob_start();
session_start();
?>
<?php
require "connectDb.php";

$query = "SELECT idCat FROM novelcategorie WHERE idRist=" . $_SESSION['idRist'] . "";
$result2 = mysqli_query($mysqli, $query);


while ($array = $result2->fetch_assoc()) {
    $query = "DELETE FROM novelprodotti WHERE idCat=" . $array['idCat'] . " AND idProd=" . $_POST['but'] . "";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_affected_rows($mysqli) == 1) break;
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("#confirmBody").html("");
    //$("#confirmBody").html("<p>Ye, hai modificato il nome</p>");
    $("#prodBody").load("boVisProd.php");
</script>