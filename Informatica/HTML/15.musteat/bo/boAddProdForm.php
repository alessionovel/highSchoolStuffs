<?php ob_start();
session_start() ?>
<?php
require "connectDb.php";

print_r($_REQUEST);
echo "</br>";
print_r($_FILES);


$query = "SELECT * FROM novelprodotti WHERE nome='" . $_REQUEST['nome_prod_bar'] . "' AND idCat='" . $_REQUEST['idCat_bar'] . "'";
$result = mysqli_query($mysqli, $query);
echo "</br>";
echo $query;

if ($result->num_rows == 0) {
    $uploadfile2 = "../images/" . $_FILES['file_prod_bar']['name'];
    echo "<br/>" . $uploadfile2;
    if (move_uploaded_file($_FILES['file_prod_bar']['tmp_name'], $uploadfile2)) {
        echo "<br/>Trasferito<br/>";
        echo $_FILES['file_prod_bar']['name'];
    }

    $path = "images/" . $_FILES['file_prod_bar']['name'];
    $query = "INSERT INTO novelprodotti (nome, descrizione, img, prezzo, idCat) VALUES 
    ('" . $_REQUEST['nome_prod_bar'] . "','" . $_REQUEST['desc_prod_bar'] . "','" . $path . "','" . $_REQUEST['prezzo_prod_bar'] . "','" . $_REQUEST['idCat_bar'] . "')";

    if (mysqli_query($mysqli, $query)) {
        echo "<p>Il prodotto è stato aggiunto</p>";
    } else {
        echo "</br>Error: " . $query . " </br>" . mysqli_error($mysqli);
    }
} else {
    echo "<p>È già presente un prodotto con questo nome</p>";
}
header("location:bo.php")
?>