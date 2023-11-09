<?php
ob_start();
require_once "connectDb.php";
?>
<?php
$query = "SELECT * FROM ferroForma WHERE anno = '".$_REQUEST['anno']."' AND mese = '".$_REQUEST['mese']."' AND progr = '".$_REQUEST['progr']."' AND codCons = '".$_REQUEST['codiceBo']."'";
$result = mysqli_query($mysqli, $query);
if ($result->num_rows > 0) {
  $updates = array(
      "risultato"       => "-1",
  );
  $con[0] = $updates;
  $risultato = array(
      "UpdateList" => $con
  );
} else {
  $query = "INSERT INTO ferroForma (codCons, anno, mese, progr, scelta, dProd) VALUES
  ('" . $_REQUEST['codiceBo'] . "','" . $_REQUEST['anno'] . "',
    '" . $_REQUEST['mese'] . "','" . $_REQUEST['progr'] . "', '" . $_REQUEST['scelta'] . "',
    '" . $_REQUEST['data'] . "')";

    if (mysqli_query($mysqli, $query)) {
      $updates = array(
          "risultato"       => "1",
      );
      $con[0] = $updates;
      $risultato = array(
          "UpdateList" => $con
      );
    }else {
      $updates = array(
          "risultato"       => "0",
      );
      $con[0] = $updates;
      $risultato = array(
          "UpdateList" => $con
      );
    }

  }

echo json_encode($risultato);

?>
