<?php
session_start();
ob_start();
?>
<?php
$newQt = 0;
$index = 0;
$array = $_SESSION['carrello'];
//($array[$i])['idProd']
//($array[$i])['quantita']
$size = sizeof($array);

for ($i = 0; $i < $size; $i++) {
    if (($array[$i])['idProd'] == $_REQUEST['id']) {
        $newQt = (($_SESSION['carrello'])[$i])['quantita'];
        $index = $i;
    }
}
//echo "NewQt" . $newQt . " Index" . $index;

if ($_REQUEST['type'] == "-") {
    if ($newQt >= 2) {
        $newQt--;
        (($_SESSION['carrello'])[$index])['quantita'] = $newQt;
    }
} else if ($_REQUEST['type'] == "+") {
    $newQt++;
    (($_SESSION['carrello'])[$index])['quantita'] = $newQt;
} else {
    echo "what";
}
echo (($_SESSION['carrello'])[$index])['quantita'];
//echo "    NewQt " . $newQt . "<br />";
//print_r($_SESSION['carrello'][$index]);
?>