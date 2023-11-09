<?php
ob_start();
session_start()
?>

<?php
require "connectDb.php";
//print_r($_REQUEST);
echo "</br>";

if($_POST['tipo']==1){
  echo "update";
  $query = "UPDATE ferroRacLatte SET qtaLavorata = '" . $_REQUEST['rac_latte_bar'] . "', qtaFormaggio =  '" . $_REQUEST['qta_form_bar'] . "' WHERE data = '".$_REQUEST['theDate']."' AND codCons = '".$_SESSION['codiceBo']."'";

  if (mysqli_query($mysqli, $query)) {
    echo "<p> I dati sono stati raccolti correttamente </p>";
  }
  else {
    echo "</br>Error: " . $query . " </br>" . mysqli_error($mysqli);
  }
}else{
  $query = "INSERT INTO ferroRacLatte (codCons, data, qtaLavorata, qtaFormaggio) VALUES
  ('" . $_SESSION['codiceBo'] . "','" . $_REQUEST['theDate'] . "',
    '" . $_REQUEST['rac_latte_bar'] . "','" . $_REQUEST['qta_form_bar'] . "')";

    if (mysqli_query($mysqli, $query)) {
      echo "<p> I dati sono stati raccolti correttamente </p>";
    }
    else {
      echo "</br>Error: " . $query . " </br>" . mysqli_error($mysqli);
    }
  }

  header("location: bo.php");














  ?>
