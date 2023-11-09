<?php
ob_start();
session_start()
?>

<?php
require "connectDb.php";

//print_r($_REQUEST);
echo "</br>";
//print_r($_FILES);


$query = "SELECT * FROM ferroCliente WHERE cf='" . $_REQUEST['codFisc_cl_bar'] . "'";
$result = mysqli_query($mysqli, $query);
echo "</br>";
echo $query;

if ($result->num_rows == 0) {

  $query = "INSERT INTO ferroCliente (cf, nomeCl, tipologia, indirizzo, telefono) VALUES
  ('" . $_REQUEST['codFisc_cl_bar'] . "','" . $_REQUEST['nome_cl_bar'] . "','" . $_REQUEST['tipo_cl_bar'] . "',
    '" . $_REQUEST['indirizzo_cl_bar'] . "','" . $_REQUEST['numTel_cl_bar'] . "')";

    if (mysqli_query($mysqli, $query)) {
      echo "<p>Il cliente è stato aggiunto</p>";
    }
    else {
      echo "</br>Error: " . $query . " </br>" . mysqli_error($mysqli);
    }
  }

  else {
    echo "<p> È già presente questo cliente </p>";
  }

  header("location:bo.php")















  ?>
