<?php
ob_start();
require_once "connectDb.php";
?>
<?php
$query = "SELECT * FROM ferroRacLatte WHERE data = '".$_REQUEST['date']."' AND codCons = '".$_REQUEST['codice']."'";
$result = mysqli_query($mysqli, $query);
$num = mysqli_num_rows($result);

if ($num == 0) {
    $updates = array(
        "qtaRac"       => "-1",
        "qtaLav"       => "-1",
    );
    $con[0] = $updates;
    $risultato = array(
        "UpdateList" => $con
    );
} else {
    $i = 0;
    while ($array = mysqli_fetch_array($result)) {
          $updates = array(
              "qtaRac"       => $array['qtaLavorata'],
              "qtaLav"       => $array['qtaFormaggio'],
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
