<?php
$data = $_POST['data'];
$campo = $_POST['campo'];
$ora = $_POST['ora'];
session_start();
$user = $_POST['user'];
$luci=$_POST['luci'];
$totale=0;

$conn = new mysqli("localhost","root","","tennisNovel");
			if($conn->connect_errno) {
				echo "Problemi";
			}
      $query= "SELECT * FROM prenotazione WHERE userid='".$user."'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $count = mysqli_num_rows($result);
      $row = mysqli_fetch_array($result);
      if ($count<2 && $ora!=0){
      $query= "SELECT * FROM socio WHERE userid='".$user."'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $infoSocio = mysqli_fetch_array($result);
      $query= "SELECT * FROM campo WHERE numCampo='".$campo."'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $infoCampo = mysqli_fetch_array($result);
      if ($luci==1){
        $totale=$infoCampo['prezzoOra']+$infoCampo['prezzoLuci'];
      }else{
        $totale=$infoCampo['prezzoOra'];
      }

      $query = "INSERT INTO `prenotazione` (`data`, `ora`, `luci`, `totPagam`, `pagare`, `numTessera`, `userid`, `numCampo`) VALUES ('$data', '$ora', '$luci', '$totale', '0', '".$infoSocio['numTessera']."', '".$infoSocio['userid']."', '".$infoCampo['numCampo']."')";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      if($_SESSION['ruolo']=='socio'){
    		header("Location:menuSocio.php?mex=Prenotazione effettuata");
    	    exit();
    	}else if ($_SESSION['ruolo']=='segretaria'){
    		header("Location:menuSeg.php?mex=Prenotazione effettuata");
    	    exit();
    	}
    }else{
      if($_SESSION['ruolo']=='socio'){
    		header("Location:menuSocio.php?mex=Errore nella prenotazione");
    	    exit();
    	}else if ($_SESSION['ruolo']=='segretaria'){
    		header("Location:menuSeg.php?mex=Errore nella prenotazione");
    	    exit();
    	}
    }
?>
