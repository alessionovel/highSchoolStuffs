<?php
ob_start();
require_once "connectDb.php";
?>
<?php
$query = "SELECT * FROM ferroCliente WHERE cf='" . $_REQUEST['cf'] . "'";
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
  $query = "INSERT INTO ferroCliente (cf, nomeCl, tipologia, indirizzo, telefono) VALUES
  ('" . $_REQUEST['cf'] . "','" . $_REQUEST['nome'] . "','" . $_REQUEST['tipo'] . "',
    '" . $_REQUEST['indirizzo'] . "','" . $_REQUEST['telefono'] . "')";

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
