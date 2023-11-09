<?php
ob_start(); ?>
<?php

require_once('db_connection.php');
require_once('library2_0.php');

$query = "SELECT * FROM `novelristoranti`";
$rec = mysqli_query($conn, $query) or die($query . "<br>" . mysqli_error($conn));
$num = mysqli_num_rows($rec);
if ($num == 0) {
    $updates = array(
        "id"       => -1,
        "nome"     => "",
        "lat"      => 0,
        "lon"      => 0,
    );
    $con[0] = $updates;
    $risultato = array(
        "UpdateList" => $con
    );
    echo json_encode($risultato);
} else {
    $i = 0;
    while ($array = mysqli_fetch_array($rec)) {
        $updates = array(
            "id"       => $array['idRist'],
            "nome"     => $array['nome'],
            "lat"      => $array['lat'],
            "lon"      => $array['long'],
        );
        $con[$i] = array_map('utf8_encode', $updates);
        $i++;
    }
}
$risultato = array(
    "UpdateList" => $con
);
echo json_encode($risultato);
?>