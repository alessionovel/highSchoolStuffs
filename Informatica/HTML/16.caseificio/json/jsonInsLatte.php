<?php
ob_start();
require_once "connectDb.php";
?>
<?php
if($_POST['tipo']==1){
  $query = "UPDATE ferroRacLatte SET qtaLavorata = '" . $_REQUEST['rac'] . "', qtaFormaggio =  '" . $_REQUEST['lav'] . "' WHERE data = '".$_REQUEST['data']."' AND codCons = '".$_REQUEST['codiceBo']."'";
}else{
  $query = "INSERT INTO ferroRacLatte (codCons, data, qtaLavorata, qtaFormaggio) VALUES
  ('" . $_REQUEST['codiceBo'] . "','" . $_REQUEST['data'] . "',
    '" . $_REQUEST['rac'] . "','" . $_REQUEST['lav'] . "')";
  }
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

echo json_encode($risultato);

?>
