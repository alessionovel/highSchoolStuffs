<?php
ob_start();
require_once "connectDb.php";
?>
<?php
$query = "SELECT * FROM ferroCliente WHERE cf='" . $_REQUEST['cf'] . "'";
$result = mysqli_query($mysqli, $query);
if ($result->num_rows > 0) {
  $query = "SELECT * FROM ferroForma WHERE anno = '".$_REQUEST['anno']."' AND mese = '".$_REQUEST['mese']."' AND progr = '".$_REQUEST['progr']."' AND codCons = '".$_REQUEST['codiceBo']."'";
  $result = mysqli_query($mysqli, $query);
  if ($result->num_rows > 0) {
    $forma = mysqli_fetch_array($result);
    if($forma['dVend']==null){
      $query = "UPDATE ferroForma SET dVend = '" . $_REQUEST['theDate'] . "', cf =  '" . $_REQUEST['cf'] . "' WHERE progr = '".$_REQUEST['progr']."' AND codCons = '".$_REQUEST['codiceBo']."' AND anno = '".$_REQUEST['anno']."' AND mese = '".$_REQUEST['mese']."'";
      if (mysqli_query($mysqli, $query)) {
        $updates = array(
          "risultato"       => "1",
        );
        $con[0] = $updates;
        $risultato = array(
          "UpdateList" => $con
        );
      }
      else {
        $updates = array(
          "risultato"       => "0",
        );
        $con[0] = $updates;
        $risultato = array(
          "UpdateList" => $con
        );
      }
    }else{
      $updates = array(
        "risultato"       => "-3",
      );
      $con[0] = $updates;
      $risultato = array(
        "UpdateList" => $con
      );
    }
  }else{
    $updates = array(
      "risultato"       => "-2",
    );
    $con[0] = $updates;
    $risultato = array(
      "UpdateList" => $con
    );
  }

} else {
  $updates = array(
    "risultato"       => "-1",
  );
  $con[0] = $updates;
  $risultato = array(
    "UpdateList" => $con
  );

}

echo json_encode($risultato);

?>
