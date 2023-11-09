<?php
ob_start();
session_start()
?>

<?php
require "connectDb.php";

//print_r($_REQUEST);
echo "</br>";
//print_r($_FILES);

$query = "SELECT * FROM ferroCaseificio WHERE codice='" . $_REQUEST['cod_bar'] . "'";
$result = mysqli_query($mysqli, $query);

if ($result->num_rows == 0) {

  $query2 = "SELECT * FROM ferroUtente WHERE email='" . $_REQUEST['email_bar'] . "'";
  $result2 = mysqli_query($mysqli, $query2);

  if ($result2->num_rows == 0) {
    $query3 = "INSERT INTO ferroCaseificio (`codice`, `ragSociale`, `nomeProprietario`, `partIva`, `indirizzo`, `lat`, `long`, `tel`, `email`, `siglaProv`) VALUES
    ('" . $_REQUEST['cod_bar'] . "','" . $_REQUEST['rag_bar'] . "','" . $_REQUEST['prop_bar'] . "','" . $_REQUEST['iva_bar'] . "',
      '" . $_REQUEST['indirizzo_bar'] . "','" . $_REQUEST['lat_bar'] . "',
      '" . $_REQUEST['lon_bar'] . "','" . $_REQUEST['tel_bar'] . "','" . $_REQUEST['email_bar'] . "','" . $_REQUEST['prov_bar'] . "')";
      echo $query3;
      if (mysqli_query($mysqli, $query3)) {
        echo "<p>Il cliente è stato aggiunto</p>";
      }else {
        echo "</br>Error: " . $query3 . " </br>" . mysqli_error($mysqli);
      }

      $query4 = "INSERT INTO ferroUtente (`email`, `nome`, `cognome`, `psw`, `codice`) VALUES
      ('" . $_REQUEST['email_bar'] . "','" . $_REQUEST['nome_bar'] . "','" . $_REQUEST['cognome_bar'] . "',
        '" . $_REQUEST['psw_bar'] . "','" . $_REQUEST['cod_bar'] . "')";

        if (mysqli_query($mysqli, $query4)) {
          echo "<p>Il cliente è stato aggiunto</p>";
          header("location : bo.php");
        }
        else {
          echo "</br>Error: " . $query4 . " </br>" . mysqli_error($mysqli);
        }
      }
    }


    ?>
