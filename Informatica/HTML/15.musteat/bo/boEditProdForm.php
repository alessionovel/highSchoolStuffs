<?php ob_start();
session_start(); ?>
<?php
require "connectDb.php";
//$result = mysqli_query($mysqli, $query);
print_r($_REQUEST);

$query = "UPDATE novelprodotti SET";
$openRequest = ($_REQUEST['dataForm']);
$checkFirst = false;

$values = array(
    "nome_prod_bar" => "nome",
    "desc_prod_bar" => "descrizione",
    "file_prod_bar" => "img",
    "prezzo_prod_bar" => "prezzo",
    "idCat_bar" => "idCat"
);
//Dobbiamo controllare ($openRequest[n])['name'] se combacia con un valore di array
//Se combacia si aggiunge la parte di stringa corretta tipo nome='".($openRequest[n])['value']."'
//per tutti tranne il primo avremo una virgola
//controlliamo qual'è il primo con una boolean

$tempToQuery = "";
//echo "</br>Values: ";
//print_r($values);
//echo "</br></br>";
$checkCicle = false;

for ($i = 0; $i < count($values); $i++) {
    $checkCicle = false;
    if (($openRequest[$i])['name'] == 'nome_prod_bar') {
        $tempToQuery = $tempToQuery . "" . $values['nome_prod_bar'] . "='" . ($openRequest[$i])['value'] . "'";
        $checkCicle = true;
    } elseif (($openRequest[$i])['name'] == 'desc_prod_bar') {
        $tempToQuery = $tempToQuery . "" . $values['desc_prod_bar'] . "='" . ($openRequest[$i])['value'] . "'";
        $checkCicle = true;
    } elseif (($openRequest[$i])['name'] == 'file_prod_bar') {
        $tempToQuery = $tempToQuery . "" . $values['file_prod_bar'] . "='" . ($openRequest[$i])['value'] . "'";
        $checkCicle = true;

        $uploadfile2 = "../images/" . $_FILES['file_prod_bar']['name'];
        //echo "<br/>" . $uploadfile2;
        if (move_uploaded_file($_FILES['file_prod_bar']['tmp_name'], $uploadfile2)) {
            //echo "<br/>File Trasferito<br/>";
            //echo $_FILES['file_prod_bar']['name'];
        } else {
            echo "errore";
        }
    } elseif (($openRequest[$i])['name'] == 'prezzo_prod_bar') {
        $tempToQuery = $tempToQuery . "" . $values['prezzo_prod_bar'] . "='" . ($openRequest[$i])['value'] . "'";
        $checkCicle = true;
    } elseif (($openRequest[$i])['name'] == 'idCat_bar') {
        $tempToQuery = $tempToQuery . "" . $values['idCat_bar'] . "='" . ($openRequest[$i])['value'] . "'";
        $checkCicle = true;
    }
    if ($checkCicle)
        $tempToQuery = $tempToQuery . ",";
}
$tempToQuery = substr($tempToQuery, 0, strlen($tempToQuery) - 1);
//echo "</br>QueryAdd: " . $tempToQuery;
$query = $query . " " . $tempToQuery . " WHERE idProd=" . $_REQUEST['but'] . "";
if (mysqli_query($mysqli, $query)) {
    echo "<p>Il prodotto è stato modificato</p>";
?>
    <script>
        $(document).ready(function() {
            alert("Prodotto modificato con successo");
            $("#boBody").load("boProdotti.php");
        });
    </script>
<?php
} else {
    echo "</br>Error: " . $query . " </br>" . mysqli_error($mysqli);
}
?>