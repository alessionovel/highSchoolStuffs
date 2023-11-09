<?php ob_start();
session_start(); ?>
<?php
//print_r($_SESSION);
require "db_connection.php";

$array = $_SESSION['carrello'];

//insert in ordine
//  -> insert in novelordini
$query = "INSERT INTO novelordini (consegnato,idRist,username) VALUES (FALSE,'" . $_SESSION['id'] . "','" . $_SESSION['username'] . "')";
if ($result = mysqli_query($conn, $query)) {
    $last_id = mysqli_insert_id($conn);
    //echo $last_id;
    for ($i = 0; $i < count($array); $i++) {
        //  -> insert di tutti i prodotti + quantità in novelcontordine
        //[$i])['idProd']
        //[$i])['quantita']
        $query2 = "INSERT INTO novelcontordine (idProd,idOrd,quantita) VALUES ('" . ($array[$i])['idProd'] . "','" . $last_id . "','" . ($array[$i])['quantita'] . "')";
        if ($result2 = mysqli_query($conn, $query2)) {
        } else {
            echo "Error: " . $query . " " . mysqli_error($conn);
        }
    }
} else {
    echo "Error: " . $query . " " . mysqli_error($conn);
}

$id = $_SESSION['id'];
$user = $_SESSION['username'];
session_destroy();
session_start();
$_SESSION['id'] = $id;
$_SESSION['username'] = $user;
?>