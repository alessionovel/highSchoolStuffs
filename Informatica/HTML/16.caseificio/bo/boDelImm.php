<?php ob_start();
session_start();
?>
<?php
require "connectDb.php";

$query = "DELETE FROM ferroImmagine WHERE codice=" . $_SESSION['codiceBo'] . " AND progr=" . $_POST['codice'] . "";
$result = mysqli_query($mysqli, $query);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$("#prodBody").load(aggiornato);
</script>
