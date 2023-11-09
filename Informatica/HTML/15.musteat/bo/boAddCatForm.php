<?php ob_start();
session_start() ?>
<?php
require "connectDb.php";

$query = "SELECT * FROM novelcategorie WHERE idRist='" . $_SESSION['idRist'] . "' AND nome='" . $_REQUEST['addCat_bar'] . "'";
$result = mysqli_query($mysqli, $query);

if ($result->num_rows == 0) {
    $query = "INSERT INTO novelcategorie (nome,idRist) VALUES ('" . $_REQUEST['addCat_bar'] . "','" . $_SESSION['idRist'] . "')";

    if (mysqli_query($mysqli, $query)) {
        echo "<p>La categoria è stata aggiunta</p>";
    } else {
        echo "Error: " . $query . " " . mysqli_error($mysqli);
    }
} else {
    echo "<p>È già presente una categoria con questo nome</p>";
}
?>