<?php ob_start();
session_start();
?>
<?php
require "connectDb.php";
$query = "DELETE FROM novelcategorie WHERE idRist=" . $_SESSION['idRist'] . " AND idCat=" . $_POST['but'] . "";
$result = mysqli_query($mysqli, $query);

$query = "DELETE FROM novelprodotti WHERE idCat=" . $_POST['but'] . "";
$result = mysqli_query($mysqli, $query);

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("#confirmBody").html("");
    //$("#confirmBody").html("<p>Ye, hai modificato il nome</p>");
    $("#catBody").load("boVisCat.php");
</script>