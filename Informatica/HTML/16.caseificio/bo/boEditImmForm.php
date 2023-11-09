<?php ob_start();
session_start(); ?>
<?php
require "connectDb.php";

$query = "UPDATE ferroImmagine SET descrizione = '" . $_REQUEST['descrizione'] . "' WHERE codice=" . $_SESSION['codiceBo'] . " AND progr=" . $_POST['codice'] . "";
if (mysqli_query($mysqli, $query)) {
  echo "Immagine modificata con successo";
} else {
  echo "Errore nella modifica dell'immagine";
}
?>
