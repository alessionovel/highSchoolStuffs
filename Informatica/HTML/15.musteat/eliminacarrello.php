<?php
ob_start();
session_start(); ?>
<?php
$id = 0;
$max = sizeof($_SESSION['carrello']);
for ($i = 0; $i < $max; $i++) {
  while (list($key, $val) = each($_SESSION['carrello'][$i])) {
    if ($key == 'idProd' && $val == $_POST['id']) {
      $id = $i;
    }
  }
  echo "<br>";
}
\array_splice($_SESSION['carrello'], $id, 1);
?>