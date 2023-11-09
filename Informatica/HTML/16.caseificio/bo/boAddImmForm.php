<?php ob_start();
session_start() ?>
<?php
require "connectDb.php";

$query = "SELECT * FROM ferroImmagine WHERE codice= '".$_SESSION['codiceBo']."' ORDER BY progr DESC";
$result = mysqli_query($mysqli, $query);
$imm = mysqli_fetch_array($result);
$progr = $imm['progr']+1;


$uploadfile2 = "../images/" . $_FILES['file_prod_bar']['name'];
echo "<br/>" . $uploadfile2;
if (move_uploaded_file($_FILES['file_prod_bar']['tmp_name'], $uploadfile2)) {
  echo "<br/>Trasferito<br/>";
  echo $_FILES['file_prod_bar']['name'];
}

$path = "images/" . $_FILES['file_prod_bar']['name'];
$query = "INSERT INTO ferroImmagine (codice, progr, path, descrizione) VALUES
('" . $_SESSION['codiceBo'] . "','" . $progr . "','" . $path . "','" . $_REQUEST['descrizione_prod_bar'] . "')";

if (mysqli_query($mysqli, $query)) {

} else {

}
header("location: bo.php");
?>
